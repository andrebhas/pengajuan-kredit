<?php

class M_peserta extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function No_Urut() {
        $this->db->select('id_files');
        $this->db->from('files');
        $this->db->order_by("id_files", "desc");
        $this->db->limit(1);
        return $this->db->get();
    }

    function insert_files($data) {
        $this->db->insert('files', $data);
    }

    function insert_peserta($data) {
        $this->db->insert('peserta_kredit', $data);
    }

    function insert_peserta_sementara($data) {
        $this->db->insert('view_peserta', $data);
    }

    function select_all1() {
        $this->db->select('*');
        $this->db->from('peserta_kredit');
        $this->db->group_by('hitung_ke');
        return $this->db->get();
    }

    function select_all() {
        $this->db->select('*');
        $this->db->from('peserta_kredit');
        $this->db->group_by('hitung_ke');
        $this->db->order_by("hitung_ke", "asc");
        return $this->db->get();
    }

    function select_all2() {
        $this->db->select('*');
        $this->db->from('peserta_kredit');
        $this->db->group_by('hitung_ke');
        $this->db->order_by("scor", "desc");
        return $this->db->get();
    }

    function select_rangking() {
        $this->db->select('*');
        $this->db->from('peserta_kredit');
        $this->db->order_by("hitung_ke", "desc");
        $this->db->limit(1);
        return $this->db->get();
    }

    function select_all_peserta() {
        $this->db->select('*');
        $this->db->from('peserta_kredit');
        $this->db->where('hitung_ke', 0);
        return $this->db->get();
    }
    
    function get_all_peserta() {
        $this->db->select('*');
        $this->db->from('peserta_kredit');
        $this->db->group_by('KTP_ID');
        return $this->db->get()->result();
    }

    function get_peserta_by_ktp($ktp) {
        $this->db->select('*');
        $this->db->from('peserta_kredit');
        $this->db->where('KTP_ID', $ktp);
        $this->db->group_by('KTP_ID'); 
        return $this->db->get()->row();  
    }

    function select_hitung_ke() {
        $this->db->select('hitung_ke');
        $this->db->from('peserta_kredit');
        $this->db->order_by("hitung_ke", "desc");
        $this->db->limit(1);
        return $this->db->get();
    }

    function tambah_hitung_ke($ktp, $hitung_ke) {
        $this->db->set('hitung_ke', $hitung_ke);
        $this->db->where('no', $ktp);
        $this->db->update('peserta_kredit');
    }

    function batal_hitung_ke($ktp) {
        $this->db->set('hitung_ke', 0);
        $this->db->set('status', 0);
        $this->db->where('no', $ktp);
        $this->db->update('peserta_kredit');
    }

    function select_by_tanggal($id_tanggal) {
        $this->db->select('*');
        $this->db->from('peserta_kredit');
        $this->db->where('hitung_ke', $id_tanggal);
        return $this->db->get();
    }

    function select_urut_skor($hitung_ke) {
        $this->db->select('*');
        $this->db->from('peserta_kredit');
        $this->db->where('hitung_ke', $hitung_ke);
        $this->db->order_by("scor", "desc");
        return $this->db->get();
    }

    function select_by_id($ktp) {
        $this->db->select('*');
        $this->db->from('peserta_kredit');
        $this->db->where('no', $ktp);
        return $this->db->get();
    }

    function select_by_kredit() {
        $this->db->select('*');
        $this->db->from('peserta_kredit');
        $this->db->where('ID_kredit', 1);
        return $this->db->get();
    }

    function select_by_hitung($hitung_ke) {
        $this->db->select('*');
        $this->db->from('peserta_kredit');
        $this->db->where('hitung_ke', $hitung_ke);
        return $this->db->get();
    }
    
    function select_nameFiles_by_id($ktp) {
        $this->db->select('nama_files');
        $this->db->from('files');
        $this->db->where('no', $ktp);
        return $this->db->get();
    }

    function select_limit($id_kredit) {
        $this->db->select('*');
        $this->db->from('peserta_kredit');
        $this->db->order_by("scor", "desc");
        $this->db->where('ID_kredit', $id_kredit);
        $this->db->limit(5);
        return $this->db->get();
    }

    function update_peserta($ktp, $data) {
        $this->db->where('no', $ktp);
        $this->db->update('peserta_kredit', $data);
    }

    function delete_peserta($ktp) {
        $this->db->where('no', $ktp);
        $this->db->delete('peserta_kredit');
    }
    function delete_files($ktp) {
        $this->db->where('no', $ktp);
        $this->db->delete('files');
    }
    
    function setujui_kredit($ktp){
        $this->db->set('status', 1);
        $this->db->where('no', $ktp);
        $this->db->update('peserta_kredit');
    }
    function tolak_kredit($ktp){
        $this->db->set('status', 2);
        $this->db->where('no', $ktp);
        $this->db->update('peserta_kredit');
    }
    function selesai_kredit($ktp){
        $this->db->set('status', 3);
        $this->db->where('no', $ktp);
        $this->db->update('peserta_kredit');
    }
    function get_files($ktp)
    {
        $this->db->select('*');
        $this->db->from('files');
        $this->db->where('no', $ktp);
        return $this->db->get()->row();
    }

}

?>