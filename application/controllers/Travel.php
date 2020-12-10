<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Travel extends CI_Controller{
    public function index(){
        $data['travel'] = $this->modelTravel->ambildatatravel(0)->result_array();
        $data['banner'] = $this->modelTravel->ambildata(3)->result_array();
        $data['tempat'] = $this->modelTravel->ambildata(6)->result_array();
        $this->load->view('templatesHome/header');
        $this->load->view('travel', $data);
        $this->load->view('templatesHome/footer');
    }
    
    public function dis($no){
        $data = $this->modelTravel->ambildatatravel($no)->result_array();
        foreach($data as $trv){
            echo '<div class="col-lg-4 col-md-6">
                    <div class="single_place">
                        <div class="thumb">
                            <img src="' . base_url('assets/img/place/') . $trv['gambar'] . '" alt="">
                            <a href="#" class="prise">Rp' . number_format($trv['harga'], 0, ".", ".") . '</a>
                        </div>
                        <div class="place_info">
                            <a href="' . base_url('travel/destination/') . $trv['id'] . '"><h3>' . $trv['nama_destinasi'] . '</h3></a>
                            <p>' . $trv['loc'] . '</p>
                        </div>
                    </div>
                </div>';
        }
    }
    

    public function destination($id){
        $data['travel'] = $this->modelTravel->ambilDestinasiId($id)->row_array();
        $data['provinsi'] = $this->modelUser->ambilProvinsi()->result_array();
        $data['user'] = $this->modelUser->ambilDataUser()->row_array();
        $this->load->view('templatesHome/header');
        $this->load->view('destinasi', $data);
        $this->load->view('templatesHome/footer');
    }

    public function lok($no){
        $id = $this->input->post('id_pulau');
        $data = $this->modelTravel->ambildataid($id, $no)->result_array();
        foreach($data as $trv){
            echo '<div class="col-lg-6 col-md-6">
                    <div class="single_place">
                        <div class="thumb">
                            <img src="' . base_url('assets/img/place/') . $trv['gambar'] . '" alt="">
                            <a href="#" class="prise">Rp' . number_format($trv['harga'], 0, ".", ".") . '</a>
                        </div>
                        <div class="place_info">
                            <a href="' . base_url('travel/destination/') . $trv['id'] . '"><h3>' . $trv['nama_destinasi'] . '</h3></a>
                            <p>' . $trv['loc'] . '</p>
                        </div>
                    </div>
                </div>';
        }
    }
    public function location($id){
        $data['travel'] = $this->modelTravel->ambildataid($id, 0)->result_array();
        // var_dump($data['travel']); die;
        $this->load->view('templatesHome/header');
        $this->load->view('lokasi', $data);
        $this->load->view('templatesHome/footer');
    }

    public function about(){
        $this->load->view('templatesHome/header');
        $this->load->view('about');
        $this->load->view('templatesHome/footer');
    }

    public function transportasi(){
        $jenis = $this->input->post('id_transport');
        $idprov = $this->input->post('id_prov');
        $idprovtravel = $this->input->post('travel');
        $data = $this->modelTravel->ambiltransport($jenis, $idprov, $idprovtravel)->result_array();
        if($data)
        foreach ($data as $trans) {
            echo '<option value="' . $trans['id'] . '">' . $trans['nama'] . ' - Rp ' . number_format($trans['harga'],0,'.','.') . '</option>';
        }
        else if(strcasecmp($jenis, "0")==0)
            echo "<option selected>Transportasi</option>";
        else 
            echo '<option selected>Tidak Ada Transportasi</option>';
    }
    public function ambilhotel(){
        $idprov = $this->input->post('id_provinsi');
        $idkab = $this->input->post('idkab');
        $data = $this->modelTravel->ambilHotel($idprov, $idkab);
        if($data){
            foreach($data as $hotel){
                echo '<option value="' . $hotel['id'] . '">' . $hotel['nama'] . ' - Rp ' . number_format($hotel['harga'],0,'.','.') . '</option>';
            }
        }else{
            echo '<option selected>Tidak Ada Hotel</option>';
        }
    }

    public function ambilKabupaten(){
        $idprov = $this->input->post('id_provinsi');
        $data = $this->modelUser->ambilkabupaten($idprov)->result_array();
        foreach ($data as $kabupaten) {
            echo '<option value="' . $kabupaten['id'] . '">' . $kabupaten['name'] . '</option>';
        }
    }

    public function checkout(){
        $lama = $this->input->post('hariH');
        $trans = $this->input->post('transportasi');
        $prov = $this->input->post('alamatProvinsi');
        $alamatProv = $this->db->query("SELECT * FROM provinsi WHERE id='$prov'")->row_array();
        $kab = $this->input->post('alamatKabupaten');
        $alamatKab = $this->db->query("SELECT * FROM kabupaten WHERE id='$kab'")->row_array();
        $alamatLengkap = $this->input->post('alamatLengkap');
        
        $paket = $this->input->post("paket");
        $iduser = $this->session->id_user;
        $id_dest = $this->input->post('id_dest');
        $harga_dest = $this->input->post('harga_dest');
        $transportasi = $this->modelTravel->ambilHarga($trans, "transportasi")->row_array();
        $tgl_pemesanan = $this->input->post('tgl_pemesanan');
        $tgl_berangkat = date_format(date_create($this->input->post('pilihtanggal')),"Y-m-d");
        $tgl_kembali = date("Y-m-d", strtotime($tgl_berangkat . "+" . $lama . "days"));
        $alamat = $alamatLengkap . ", " . $alamatKab['name'] . ", " . $alamatProv['name'];
        if($paket == 1){
            $hot = $this->input->post('hotel');
            $hotel = $this->modelTravel->ambilHarga($hot, "hotel")->row_array();
            $total = $transportasi['harga'] + $hotel['harga'] + $harga_dest;
            $data = [
                'paket' => $paket,
                'id_user' => $iduser,
                'id_destinasi' => $id_dest,
                'harga_destinasi' => $harga_dest,
                'id_transportasi' => $transportasi['id'],
                'harga_transportasi' => $transportasi['harga'],
                'id_hotel' => $hotel['id'],
                'harga_hotel' => $hotel['harga'],
                'tgl_pemesanan' => $tgl_pemesanan,
                'tgl_berangkat' => $tgl_berangkat,
                'tgl_pulang' => $tgl_kembali,
                'alamatPengiriman' => $alamat,
                'total' => $total
            ];
        }else{
            $total = $transportasi['harga'] + $harga_dest;
            $data = [
                'paket' => $paket,
                'id_user' => $iduser,
                'id_destinasi' => $id_dest,
                'harga_destinasi' => $harga_dest,
                'id_transportasi' => $transportasi['id'],
                'harga_transportasi' => $transportasi['harga'],
                'tgl_pemesanan' => $tgl_pemesanan,
                'tgl_berangkat' => $tgl_berangkat,
                'tgl_pulang' => $tgl_kembali,
                'alamatPengiriman' => $alamat,
                'total' => $total
            ];
        }
        $this->db->insert('invoice', $data);
        $inv = $this->modelTravel->ambilinvoice($iduser)->row_array();
        $url = base_url('travel/pembayaran/') . $inv['id'];
        header("Location: $url");
    }

    public function pembayaran($id){
        $data['invoice'] = $this->modelTravel->ambilinvoiceID($id)->row_array();
        $this->load->view('templatesHome/header');
        $this->load->view('bayar', $data);
        $this->load->view('templatesHome/footer');
    }
    public function upload_pembayaran($id){
        $file = $_FILES['buktibayar']['name'];
        if ($file) {
            $config['upload_path'] = './assets/pembayaran';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('buktibayar')) {
                echo "Gagal";
                die;
            } else $file = $this->upload->data('file_name');
        }
        $data = ['bukti_pembayaran' => $file];
        $this->db->where('id', $id);
        $this->db->update('invoice', $data);
        echo "Sukses";
    }

    public function pemberitahuan(){
        $iduser = $this->session->id_user;
        $data['invoice'] = $this->modelTravel->ambilinvoice($iduser)->result_array();
        $this->load->view('templatesHome/header');
        $this->load->view('notif', $data);
        $this->load->view('templatesHome/footer');
    }
    public function batal($id){
        $sql = "UPDATE invoice SET status_pemesanan=2 WHERE id='$id'";
        $this->db->query($sql);
        echo "Sukses";
    }
    
}