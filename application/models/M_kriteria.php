<?php
class M_kriteria extends CI_Model {
    function __construct(){
        parent::__construct();
    }
    function insert_kriteria($data){
        $this->db->insert('kriteria', $data);
    }
    function select_all(){
        $this->db->select('*');
        $this->db->from('kriteria');
        return $this->db->get();
    }
    function select_by_id($id_kriteria){
        $this->db->select('*');
        $this->db->from('kriteria');
        $this->db->where('ID_kriteria', $id_kriteria);
        return $this->db->get();
    }
    function select_not_in($id_kriteria){
        $this->db->select('*');
        $this->db->from('kriteria');
        $this->db->where_not_in('ID_kriteria', $id_kriteria);
        return $this->db->get();
    }
    function update_kriteria($id_kriteria, $data){
        $this->db->where('ID_kriteria', $id_kriteria);
        $this->db->update('kriteria', $data);
    }
    function delete_kriteria($id_kriteria){
        $this->db->where('ID_kriteria', $id_kriteria);
        $this->db->delete('kriteria');
    }
}
?>