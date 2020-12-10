<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelTravel extends CI_Model{
    public function ambildata($limit){
        $this->db->where('destinasi > ', 0);
        $this->db->order_by('destinasi', 'DESC');
        return $this->db->get('pulau', $limit);
    }

    public function ambilsemuatempat(){
        return $this->db->get('pulau');
    }

    public function ambildatatravel($no){
        // $query = "SELECT data.id, nama_destinasi, total_review, data.gambar, loc FROM data JOIN tempat ON id_lokasi=tempat.id LIMIT 6";
        // return $this->db->query($query);
        $sql = "SELECT d.*, k.name AS kabupaten, p.name AS provinsi, pu.loc AS loc  
        FROM destinasi d 
        JOIN kabupaten k ON d.id_kabupaten = k.id 
        JOIN provinsi p ON k.id_provinsi = p.id 
        JOIN pulau pu ON p.id_pulau=pu.id 
        ORDER BY d.nama_destinasi ASC LIMIT $no,6";
        $query = $this->db->query($sql);        
        return $query;
    }

    public function ambilsemuatravel(){
        return $this->db->get('destinasi');
    }

    public function ambilsemuatravellimit($start, $end){
        $sql = "SELECT d.*, k.name AS kabupaten, p.name AS provinsi, pu.loc AS loc  
        FROM destinasi d 
        JOIN kabupaten k ON d.id_kabupaten = k.id 
        JOIN provinsi p ON k.id_provinsi = p.id 
        JOIN pulau pu ON p.id_pulau=pu.id 
        LIMIT $start, $end";
        $query = $this->db->query($sql);        
        return $query;
    }

    public function ambildataid($id, $no){
        $sql = "SELECT destinasi.id, nama_destinasi, destinasi.gambar, loc, id_pulau, harga, pulau.banner FROM destinasi JOIN pulau ON id_pulau = pulau.id WHERE id_pulau='$id' ORDER BY nama_destinasi ASC LIMIT $no,4";
        // $this->db->select('destinasi.id, nama_destinasi, destinasi.gambar, loc, id_pulau, harga, pulau.banner');
        // $this->db->from('destinasi');
        // $this->db->join('pulau', 'id_pulau = pulau.id');
        // $this->db->where('id_pulau', $id);
        // $this->db->order_by('nama_destinasi','ASC');
        return $this->db->query($sql);
    }

    public function ambilDestinasiId($id){
        $sql = "SELECT destinasi.*, loc, provinsi.name AS provinsi, kabupaten.name AS kabupaten 
        FROM destinasi 
        JOIN pulau ON id_pulau=pulau.id 
        JOIN provinsi ON id_provinsi = provinsi.id 
        JOIN kabupaten ON id_kabupaten = kabupaten.id 
        WHERE destinasi.id = $id";
        $query = $this->db->query($sql);        
        return $query;
    }

    public function ambiltransport($jenis, $idprov, $tujuan){
        $sql = "SELECT * FROM transportasi WHERE jenis='$jenis' AND dari='$idprov' AND tujuan='$tujuan'";
        return $this->db->query($sql);
    }
    

    public function ambilHarga($id, $tabel){
        $this->db->select("id, harga");
        $this->db->where("id", $id);
        return $this->db->get($tabel);
    }

    public function ambilHotel($prov, $kab){
        $sql = "SELECT * FROM hotel WHERE id_kabupaten='$kab'";
        $hasil = $this->db->query($sql)->result_array();
        if($hasil) return $hasil;
        else{ 
            $sql = "SELECT * FROM hotel WHERE id_provinsi='$prov'";
            return $this->db->query($sql)->result_array();
        }
    }

    public function ambilProvinsi($id){
        $this->db->where('id_pulau', $id);
        return $this->db->get('provinsi');
    }

    public function ambilPulaubyID($id){
        $this->db->where('id', $id);
        return $this->db->get('pulau');
    }

    public function ambilGambarDestinasi($id){
        $this->db->select('gambar, banner');
        $this->db->where('id', $id);
        return $this->db->get('destinasi');
    }
    public function ambilGambarPulau($id){
        $this->db->select('gambar, banner');
        $this->db->where('id', $id);
        return $this->db->get('pulau');
    }
    public function hitungsemuatransportasi(){
        return $this->db->get('transportasi')->num_rows();
    }
    public function ambilsemuatransportasi($start, $end){
        $sql = "SELECT transportasi.id, nama, jenis, harga, p1.name AS dari, p2.name AS tujuan FROM transportasi LEFT JOIN provinsi AS p1 ON dari=p1.id LEFT JOIN provinsi AS p2 ON tujuan=p2.id LIMIT $start, $end";
        return $this->db->query($sql);
    }
    public function ambilTransbyID($id){
        $sql = "SELECT transportasi.id, nama, jenis, harga, p1.name AS dari, p2.name AS tujuan FROM transportasi LEFT JOIN provinsi AS p1 ON dari=p1.id LEFT JOIN provinsi AS p2 ON tujuan=p2.id WHERE transportasi.id=$id";
        return $this->db->query($sql);
    }
    public function hitungsemuahotel(){
        return $this->db->get('hotel')->num_rows();
    }
    public function ambilsemuahotel($start, $end){
        $sql = "SELECT hotel.*, provinsi.name AS provinsi, kabupaten.name AS kabupaten FROM hotel JOIN provinsi ON hotel.id_provinsi=provinsi.id JOIN kabupaten ON hotel.id_kabupaten=kabupaten.id LIMIT $start, $end";
        return $this->db->query($sql);
    }
    public function ambilHotelbyID($id){
        $sql = "SELECT hotel.*, provinsi.name AS provinsi, kabupaten.name AS kabupaten FROM hotel JOIN provinsi ON hotel.id_provinsi=provinsi.id JOIN kabupaten ON hotel.id_kabupaten=kabupaten.id WHERE hotel.id='$id'";
        return $this->db->query($sql);
    }

    public function ambilinvoice($iduser){
        $this->db->where('id_user', $iduser);
        $this->db->order_by('id', 'DESC');
        return $this->db->get('invoice');
    }
    
    public function ambilinvoiceID($id){
        $sql = "SELECT inv.*, nama_destinasi, t.nama AS transportasi, h.nama AS hotel 
        FROM invoice inv 
        JOIN destinasi ON inv.id_destinasi=destinasi.id 
        JOIN transportasi t ON inv.id_transportasi=t.id 
        LEFT JOIN hotel h ON inv.id_hotel=h.id 
        WHERE inv.id=$id";
        return $this->db->query($sql);    
    }
    public function hitungsemuainvoice(){
        return $this->db->get('invoice')->num_rows();
    }
    public function ambilsemuainvoice($start, $end){
        $sql = "SELECT inv.*, u.nama AS nama_user, nama_destinasi, t.nama AS transportasi, h.nama AS hotel 
        FROM invoice inv 
        JOIN user u ON inv.id_user=u.id 
        JOIN destinasi ON inv.id_destinasi=destinasi.id 
        JOIN transportasi t ON inv.id_transportasi=t.id 
        LEFT JOIN hotel h ON inv.id_hotel=h.id LIMIT $start, $end";
        return $this->db->query($sql);
    }
}