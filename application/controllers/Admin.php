<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        if ($this->session->admin) {
            $this->load->view('admin/templates/header');
            $this->load->view('admin/dashboard');
            $this->load->view('admin/templates/footer');
        } else {
            echo "<script> window.location.href='/basisdata/admin/login'; </script>";
        }
    }

    public function lokasi()
    {
        $data['tempat'] = $this->modelTravel->ambilsemuatempat()->result_array();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/lokasi', $data);
        $this->load->view('admin/templates/footer');
    }

    public function destinasi()
    {
        $config['base_url'] = base_url('admin/destinasi/');
        $config['total_rows'] = $this->modelTravel->ambilsemuatravel()->num_rows();
        $config['per_page'] = 5;
        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        if (!$data['start'])
            $data['start'] = 0;

        $data['travel'] = $this->modelTravel->ambilsemuatravellimit($data['start'], $config['per_page'])->result_array();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/destinasi', $data);
        $this->load->view('admin/templates/footer');
    }

    public function login()
    {
        if (!$this->session->admin)
            $this->load->view('admin/login');
        else {
            echo "<script> window.location.href='/basisdata/admin'; </script>";
        }
    }

    public function tuklogin()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $admin = $this->db->get_where('admin', ['user' => $email])->row_array();
        if ($email === $admin['user'] && $password === $admin['password']) {
            $this->session->set_userdata('admin', 'true');
            echo "<script> window.location.href='/basisdata/admin'; </script>";
        } else {
            echo "<script> alert('Password salah bre');
                            window.location.href='/basisdata/admin/login';
                  </script>";
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('admin');
        echo "<script> window.location.href='/basisdata/admin/login'; </script>";
    }

    public function tambahlokasi()
    {
        $lokasi = $this->input->post('lokasi');
        $gambar = $_FILES['gambar']['name'];
        $banner = $_FILES['banner']['name'];
        if ($gambar) {
            $config['upload_path'] = './assets/img/destination/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Gagal";
                die;
            } else $gambar = $this->upload->data('file_name');
        }
        if ($banner) {
            $config['upload_path'] = './assets/img/banner/lokasi/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('banner')) {
                echo "Gagal";
                die;
            } else $banner = $this->upload->data('file_name');
        }
        $data = [
            'loc' => $lokasi,
            'gambar' => $gambar,
            'banner' => $banner
        ];
        $this->db->insert('pulau', $data);
        echo "Sukses";
    }

    public function updateLokasi($id)
    {
        $lokasi = $this->input->post('nama');
        $gambar_lama = $this->input->post('gambar_lama');
        $gambar = $_FILES['gambar']['name'];
        $banner = $_FILES['banner']['name'];
        $banner_lama = $this->input->post('banner_lama');
        if ($gambar) {
            $config['upload_path'] = './assets/img/destination';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Gagal";
                die;
            } else {
                if ($gambar_lama) {
                    $path = FCPATH . "assets\img\destination\\" . $gambar_lama;
                    unlink($path);
                }
                $gambar = $this->upload->data('file_name');
            }
        } else $gambar = $gambar_lama;
        if ($banner) {
            $config['upload_path'] = './assets/img/banner/lokasi';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('banner')) {
                echo "Gagal";
                die;
            } else {
                if ($banner_lama) {
                    $path = FCPATH . "assets\img\banner\lokasi\\" . $banner_lama;
                    unlink($path);
                }
                $banner = $this->upload->data('file_name');
            }
        } else $banner = $banner_lama;
        $data = [
            'loc' => $lokasi,
            'gambar' => $gambar,
            'banner' => $banner
        ];
        $this->db->where('id', $id);
        $this->db->update('pulau', $data);
        echo "Sukses";
    }

    public function tambahdestinasi()
    {
        $nama = $this->input->post('nama');
        $pulau = $this->input->post('pulau');
        $kabupaten = $this->input->post('kabupaten');
        $provinsi = $this->input->post('provinsi');
        $gambar = $_FILES['gambar']['name'];
        $banner = $_FILES['banner']['name'];
        $deskripsi = $this->input->post('deskripsi');
        $harga = $this->input->post('harga');
        $hari = $this->input->post('hari');
        if ($gambar) {
            $config['upload_path'] = './assets/img/place';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Gagal";
                die;
            } else $gambar = $this->upload->data('file_name');
        }
        if ($banner) {
            $config['upload_path'] = './assets/img/banner/destinasi/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('banner')) {
                echo "Gagal";
                die;
            } else $banner = $this->upload->data('file_name');
        }
        $data = [
            'nama_destinasi' => $nama,
            'id_pulau' => $pulau,
            'id_provinsi' => $provinsi,
            'id_kabupaten' => $kabupaten,
            'gambar' => $gambar,
            'deskripsi' => $deskripsi,
            'harga' => $harga,
            'banner' => $banner,
            'hari' => $hari
        ];
        $this->db->insert('destinasi', $data);
        echo "Sukses";
    }

    public function updateDestinasi($id)
    {
        $nama = $this->input->post('nama');
        $pulau = $this->input->post('pulau');
        $kabupaten = $this->input->post('kabupaten');
        $provinsi = $this->input->post('provinsi');
        $gambar = $_FILES['gambar']['name'];
        $gambarlama = $this->input->post('gambar_lama');
        $banner = $_FILES['banner']['name'];
        $bannerlama = $this->input->post('banner_lama');
        $deskripsi = $this->input->post('deskripsi');
        $harga = $this->input->post('harga');
        $hari = $this->input->post('hari');
        if ($gambar) {
            $config['upload_path'] = './assets/img/place/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Gagal";
                die;
            } else {
                if ($gambarlama) {
                    $path = FCPATH . "assets\img\place\\" . $gambarlama;
                    unlink($path);
                }
                $gambar = $this->upload->data('file_name');
            }
        } else $gambar = $gambarlama;
        if ($banner) {
            $config['upload_path'] = './assets/img/banner/destinasi/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('banner')) {
                echo "Gagal";
                die;
            } else {
                if ($bannerlama) {
                    $path = FCPATH . "assets\img\banner\destinasi\\" . $bannerlama;
                    unlink($path);
                }
                $banner = $this->upload->data('file_name');
            }
        } else $banner = $bannerlama;
        $data = [
            'nama_destinasi' => $nama,
            'id_pulau' => $pulau,
            'id_provinsi' => $provinsi,
            'id_kabupaten' => $kabupaten,
            'gambar' => $gambar,
            'deskripsi' => $deskripsi,
            'harga' => $harga,
            'banner' => $banner,
            'hari' => $hari
        ];
        $this->db->where('id', $id);
        $this->db->update('destinasi', $data);
        echo "Sukses";
    }

    public function tDestinasi()
    {
        $data['tempat'] = $this->modelTravel->ambilsemuatempat()->result_array();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/tdes', $data);
        $this->load->view('admin/templates/footer');
    }

    public function hapuslokasi($id)
    {
        $data = $this->modelTravel->ambilGambarPulau($id)->row_array();
        $path = FCPATH . "assets\img\destination\\" . $data['gambar'];
        unlink($path);
        $path = FCPATH . "assets\img\banner\lokasi\\" . $data['banner'];
        unlink($path);
        $this->db->delete('pulau', ['id' => $id]);
        echo "<script>window.location.href='/basisdata/admin/lokasi';</script>";
    }

    public function hapusdestinasi($id)
    {
        $data = $this->modelTravel->ambilGambarDestinasi($id)->row_array();
        $path = FCPATH . "assets\img\place\\" . $data['gambar'];
        unlink($path);
        $this->db->delete('destinasi', ['id' => $id]);
        echo "<script>window.location.href='/basisdata/admin/destinasi';</script>";
    }

    public function destinasiLokasi($sip)
    {
        switch ($sip) {
            case 'provinsi':
                $id = $this->input->post('id_pulau');
                $data = $this->modelTravel->ambilProvinsi($id)->result_array();
                foreach ($data as $provinsi) {
                    echo '<option value="' . $provinsi['id'] . '">' . $provinsi['name'] . '</option>';
                }
                break;
            case 'kabupaten':
                $id = $this->input->post('id_provinsi');
                $data = $this->modelUser->ambilkabupaten($id)->result_array();
                foreach ($data as $kabupaten) {
                    echo '<option value="' . $kabupaten['id'] . '">' . $kabupaten['name'] . '</option>';
                }
                break;
        }
    }

    public function editdestinasi($id)
    {
        $data['tempat'] = $this->modelTravel->ambilDestinasiId($id)->row_array();
        $data['pulau'] = $this->modelTravel->ambilsemuatempat()->result_array();
        $data['provinsi'] = $this->modelTravel->ambilProvinsi($data['tempat']['id_pulau'])->result_array();
        $data['kabupaten'] = $this->modelUser->ambilkabupaten($data['tempat']['id_provinsi'])->result_array();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/edes', $data);
        $this->load->view('admin/templates/footer');
    }
    public function editlokasi($id)
    {
        $data['pulau'] = $this->modelTravel->ambilPulaubyID($id)->row_array();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/elok', $data);
        $this->load->view('admin/templates/footer');
    }

    public function transportasi()
    {
        $config['base_url'] = base_url('admin/transportasi/');
        $config['total_rows'] = $this->modelTravel->hitungsemuatransportasi();
        $config['per_page'] = 5;
        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        if (!$data['start'])
            $data['start'] = 0;

        $data['provinsi'] = $this->modelUser->ambilProvinsi()->result_array();
        $data['travel'] = $this->modelTravel->ambilsemuatransportasi($data['start'], $config['per_page'])->result_array();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/transportasi', $data);
        $this->load->view('admin/templates/footer');
    }

    public function tambahTransportasi()
    {
        $nama = $this->input->post('nama');
        $dari = $this->input->post('dariProv');
        $tujuan = $this->input->post('keProv');
        $harga = $this->input->post('harga');
        $jenis = $this->input->post('jenis');
        $data = [
            'nama' => $nama,
            'dari' => $dari,
            'tujuan' => $tujuan,
            'harga' => $harga,
            'jenis' => $jenis
        ];
        $this->db->insert('transportasi', $data);
        echo "Sukses";
    }

    public function edittransportasi($id)
    {
        $data['provinsi'] = $this->modelUser->ambilProvinsi()->result_array();
        $data['trans'] = $this->modelTravel->ambilTransbyID($id)->row_array();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/etrans', $data);
        $this->load->view('admin/templates/footer');
    }
    public function updateTrans($id)
    {
        $nama = $this->input->post('nama');
        $dari = $this->input->post('dariProv');
        $tujuan = $this->input->post('keProv');
        $harga = $this->input->post('harga');
        $jenis = $this->input->post('jenis');
        $data = [
            'nama' => $nama,
            'dari' => $dari,
            'tujuan' => $tujuan,
            'harga' => $harga,
            'jenis' => $jenis
        ];
        $this->db->where('id', $id);
        $this->db->update('transportasi', $data);
        echo "Sukses";
    }
    public function hapustransportasi($id)
    {
        $this->db->delete('transportasi', ['id' => $id]);
        $url = base_url('admin/transportasi');
        header("Location: $url");
    }

    public function hotel()
    {
        $config['base_url'] = base_url('admin/hotel/');
        $config['total_rows'] = $this->modelTravel->hitungsemuahotel();
        $config['per_page'] = 5;
        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        if (!$data['start'])
            $data['start'] = 0;
        $data['provinsi'] = $this->modelUser->ambilProvinsi()->result_array();
        $data['hotel'] = $this->modelTravel->ambilsemuahotel($data['start'], $config['per_page'])->result_array();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/hotel', $data);
        $this->load->view('admin/templates/footer');
    }
    public function tHotel()
    {
        $data['provinsi'] = $this->modelUser->ambilProvinsi()->result_array();
        $data['tempat'] = $this->modelTravel->ambilsemuatempat()->result_array();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/thot', $data);
        $this->load->view('admin/templates/footer');
    }
    public function tambahhotel()
    {
        $nama = $this->input->post('nama');
        $provinsi = $this->input->post('provinsi');
        $kabupaten = $this->input->post('kabupaten');
        $lokasi = $this->input->post('lokasi');
        $harga = $this->input->post('harga');
        $data = [
            'nama' => $nama,
            'id_provinsi' => $provinsi,
            'id_kabupaten' => $kabupaten,
            'lokasi' => $lokasi,
            'harga' => $harga
        ];
        //INSERT INTO HOTEL (nama, provinsi, kabupaten, lokasi, harga) VALUES ('$nama', )
        $this->db->insert('hotel', $data);
        echo "Sukses";
    }
    public function edithotel($id)
    {
        $data['provinsi'] = $this->modelUser->ambilProvinsi()->result_array();
        $data['hotel'] = $this->modelTravel->ambilHotelbyID($id)->row_array();
        $data['kabupaten'] = $this->modelUser->ambilkabupaten($data['hotel']['id_provinsi'])->result_array();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/ehot', $data);
        $this->load->view('admin/templates/footer');
    }
    public function updateHotel($id)
    {
        $nama = $this->input->post('nama');
        $provinsi = $this->input->post('provinsi');
        $kabupaten = $this->input->post('kabupaten');
        $lokasi = $this->input->post('lokasi');
        $harga = $this->input->post('harga');
        $data = [
            'nama' => $nama,
            'id_provinsi' => $provinsi,
            'id_kabupaten' => $kabupaten,
            'lokasi' => $lokasi,
            'harga' => $harga
        ];
        $this->db->where('id', $id);
        $this->db->update('hotel', $data);
        echo "Sukses";
    }
    public function hapushotel($id)
    {
        $this->db->delete('hotel', ['id' => $id]);
        $url = base_url('admin/hotel');
        header("Location: $url");
    }

    public function invoice()
    {
        $config['base_url'] = base_url('admin/invoice/');
        $config['total_rows'] = $this->modelTravel->hitungsemuainvoice();
        $config['per_page'] = 5;
        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        if (!$data['start'])
            $data['start'] = 0;
        $data['invoice'] = $this->modelTravel->ambilsemuainvoice($data['start'], $config['per_page'])->result_array();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/invoice', $data);
        $this->load->view('admin/templates/footer');
    }
    public function lihat_pembayaran($id)
    {
        $data = $this->db->query("SELECT id, bukti_pembayaran, status_pembayaran FROM invoice WHERE id='$id'")->row_array();
        $string = [];
        if ($data) {
            $string[0] = '<img src="' . base_url('assets/pembayaran/') . $data['bukti_pembayaran'] . '" alt="" width="100%">';
            if ($data['status_pembayaran'] == '0') {
                $string[1] = '
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a class="konfirm" href="' . base_url('admin/konfirmasi_bukti/') . $data['id'] . '"><button onclick="bukti()" type="button" class="btn btn-primary">Konfirmasi</button></a> 
                <a class="hapuskonfirm" href="' . base_url('admin/hapus_konfirmasi/') . $data['id'] . '"><button onclick="hapusbukti()" type="button" class="btn btn-danger">Tidak Valid</button></a>';
            } else {
                $string[1] = '
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <div class="btn btn-success">Sudah Konfirmasi</div></a>';
            }
            echo json_encode($string);
        }
    }
    public function konfirmasi_bukti($id)
    {
        $this->db->query("UPDATE invoice SET status_pembayaran=1 WHERE id='$id'");
        echo "Sukses";
    }
    public function hapus_konfirmasi($id)
    {
        $data = $this->db->query("SELECT bukti_pembayaran FROM invoice WHERE id='$id'")->row_array();
        $path = FCPATH . "assets\pembayaran\\" . $data['bukti_pembayaran'];
        unlink($path);
        $this->db->query("UPDATE invoice SET bukti_pembayaran='', status_pembayaran=0 WHERE id='$id'");
        $url = base_url('admin/invoice');
        header("Location: $url");
    }
    public function selesaikanstatus($id)
    {
        $sql = "UPDATE invoice SET status_pemesanan=1 WHERE id='$id'";
        $this->db->query($sql);
        echo "Sukses";
    }
    public function batalstatus($id)
    {
        $sql = "UPDATE invoice SET status_pemesanan=2 WHERE id='$id'";
        $this->db->query($sql);
        echo "Sukses";
    }
}
