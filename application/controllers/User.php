<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class User extends CI_Controller{
    public function login(){
        if($this->session->user){
            $url = base_url('travel');
            header("Location: $url");
        }
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', ['required' => 'Email tidak boleh kosong!']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'Password tidak boleh kosong!']);
        if ($this->form_validation->run() == false) {
            $data['destinasi'] = $this->uri->segment(3);
            $this->load->view('login',$data);
        } else {
            $this->_untuklogin();
        }
    }

    private function _untuklogin(){
        $destinasi = $this->uri->segment(3);
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->modelUser->ambildata($email)->row_array();
        if($user){
            if (password_verify($password, $user['password'])){
                $this->session->set_userdata('user', $email);
                $this->session->set_userdata('id_user', $user['id']);
                if($destinasi == null){
                    $url = base_url('travel');
                    header("Location: $url");
                }else{
                    $url = base_url('travel/destination/') . $destinasi;
                    header("Location: $url");
                }
            }else{
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Password yang anda masukkan salah!</div>');
                if($destinasi == null){
                    $url = base_url('user/login');
                    header("Location: $url");
                }else{
                    $url = base_url('user/login/') . $destinasi;
                    header("Location: $url");
                }
            }
        }else{
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Email tidak terdaftar!</div>');
            if($destinasi == null){
                $url = base_url('user/login');
                header("Location: $url");
            }else{
                $url = base_url('user/login/') . $destinasi;
                header("Location: $url");
            }
        }
    }

    public function registrasi(){
        if($this->session->user){
            $url = base_url('travel');
            header("Location: $url");
        }
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', ['required' => 'Nama tidak boleh kosong!']);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email sudah terdaftar',
            'required' => 'Email tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('tLahir', 'Tanggal Lahir', 'trim|required', ['required' => 'Tanggal Lahir tidak boleh kosong!']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', ['required' => 'Alamat tidak boleh kosong!']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password Minimal 8 karakter!',
            'required' => 'Password tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('password2', 'Ulangi Password', 'required|trim|matches[password]');
        if ($this->form_validation->run() == false) {
            $data['provinsi'] = $this->modelUser->ambilProvinsi()->result_array();
           $this->load->view('registrasi', $data);
        } else {
            $data = array(
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'tanggal_lahir' => htmlspecialchars($this->input->post('tLahir', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat',true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'provinsi' => htmlspecialchars($this->input->post('provinsi',true)),
                'kabupaten' => htmlspecialchars($this->input->post('kabupaten', true)),
                'kecamatan' => htmlspecialchars($this->input->post('kecamatan', true)),
                'kelurahan' => htmlspecialchars($this->input->post('kelurahan',true))
            );
            $this->modelUser->masukdata($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Akun sudah berhasil terdaftar. Silahkan Login</div>');
            $url = base_url('user/login');
            header("Location: $url");
        }
    }
    public function keluar(){
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('id_user');
        $url = base_url('travel');
        header("Location: $url");
    }

    public function alamat($jenis){
        switch($jenis){
            case 'kabupaten' :
                $idprov = $this->input->post('id_provinsi');
                $data = $this->modelUser->ambilkabupaten($idprov)->result_array();
                foreach ($data as $kabupaten) {
                    echo '<option value="' . $kabupaten['id'] . '">' . $kabupaten['name'] . '</option>';
                }
            break;
            case 'kecamatan' :
                $idkab = $this->input->post('id_kabupaten');
                $data = $this->modelUser->ambilkecamatan($idkab)->result_array();
                foreach ($data as $kecamatan) {
                    echo '<option value="' . $kecamatan['id'] . '">' . $kecamatan['name'] . '</option>';
                }
            break;
            case 'kelurahan' :
                $idkec = $this->input->post('id_kecamatan');
                $data = $this->modelUser->ambilkelurahan($idkec)->result_array();
                foreach ($data as $kelurahan) {
                    echo '<option value="' . $kelurahan['id'] . '">' . $kelurahan['name'] . '</option>';
                }
            break;
        }
    }
    public function profile(){
        $id = $this->session->id_user;
        $data['user'] = $this->modelUser->ambilUser($id)->row_array();
        $data['provinsi'] = $this->modelUser->ambilProvinsi()->result_array();
        $data['kabupaten'] = $this->modelUser->ambilkabupaten($data['user']['provinsi'])->result_array();
        $data['kecamatan'] = $this->modelUser->ambilkecamatan($data['user']['kabupaten'])->result_array();
        $data['kelurahan'] = $this->modelUser->ambilkelurahan($data['user']['kecamatan'])->result_array();
        $this->load->view('templatesHome/header');
        $this->load->view('profile', $data);
        $this->load->view('templatesHome/footer');
    }
    public function updateProfile($id){
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $tanggal = $this->input->post('tlahir');
        $provinsi = $this->input->post('provinsi');
        $kabupaten = $this->input->post('kabupaten');
        $kecamatan = $this->input->post('kecamatan');
        $kelurahan = $this->input->post('kelurahan');
        $alamat = $this->input->post('alamat');
        $data = [
            'nama' => $nama,
            'email' => $email,
            'tanggal_lahir' => $tanggal,
            'provinsi' => $provinsi,
            'kabupaten' => $kabupaten,
            'kecamatan' => $kecamatan,
            'kelurahan' => $kelurahan,
            'alamat' => $alamat
        ];
        $this->db->where('id', $id);
        $this->db->update('user', $data);
        echo "Sukses";
    }
    public function ubahpass($id){
        $passlama = $this->input->post('passlama');
        $passbaru = $this->input->post('passbaru');
        $passbaru2 = $this->input->post('passbaru2');
        $user = $this->modelUser->ambildatauserbyid($id)->row_array();
        if(password_verify($passlama, $user['password'])){
            if(strcasecmp($passbaru, $passbaru2) == 0){
                $password = password_hash($passbaru, PASSWORD_DEFAULT);
                $sql = "UPDATE user SET password='$password' WHERE id='$id'";
                $this->db->query($sql);
                echo "Sukses";
            }else echo "Gagal";
        }else echo "Gagal";
    }
}