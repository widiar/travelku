<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelUser extends CI_Model{
    public function masukdata($data){
        $this->db->insert('user', $data);
    }

    public function ambildata($data){
        $this->db->select('id, email, password');
        $this->db->where('email', $data);
        return $this->db->get('user');
    }

    public function ambildatauserbyid($data){
        $this->db->select('id, email, password');
        $this->db->where('id', $data);
        return $this->db->get('user');
    }

    public function ambilUser($id){
        $query = "SELECT u.*, p.name AS prov, k.name AS kab, ke.name AS kec, kel.name AS lurah FROM user u JOIN kelurahan kel ON u.kelurahan=kel.id JOIN kecamatan ke ON u.kecamatan=ke.id JOIN kabupaten k ON u.kabupaten=k.id JOIN provinsi p ON u.provinsi=p.id WHERE u.id='$id'";
        return $this->db->query($query);
    }

    public function ambilDataUser(){
        $email = $this->session->user;
        $query = "SELECT alamat, provinsi AS idprov, kabupaten AS idkab, p.name AS provinsi, k.name AS kabupaten FROM user JOIN provinsi AS p ON user.provinsi=p.id JOIN kabupaten AS k ON user.kabupaten=k.id WHERE user.email='$email'";
        return $this->db->query($query);
    }

    public function ambilProvinsi(){
        $this->db->order_by('name', 'ASC');
        return $this->db->get('provinsi');
    }

    public function ambilkabupaten($idprov){
        $this->db->where('id_provinsi', $idprov);
        $this->db->order_by('name', 'ASC');
        return $this->db->get('kabupaten');
    }
    public function ambilkecamatan($idkab){
        $this->db->where('id_kabupaten', $idkab);
        $this->db->order_by('name', 'ASC');
        return $this->db->get('kecamatan');
    }
    public function ambilkelurahan($idkec){
        $this->db->where('id_kecamatan', $idkec);
        $this->db->order_by('name', 'ASC');
        return $this->db->get('kelurahan');
    }
}