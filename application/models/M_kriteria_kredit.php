<?php
//gak digawe---------------------
class M_kriteria_kredit extends CI_Model {
    function __construct(){
        parent::__construct();
    }
    function insert_kriteria_kredit($data){
        $this->db->insert('kriteria_kredit', $data);
    }
    function select_all(){
        $this->db->select('*');
        $this->db->from('kriteria_kredit');
        return $this->db->get();
    }
    function select_by_id($id_kredit, $id_kriteria){
        $this->db->select('*');
        $this->db->from('kriteria_kredit');
        $this->db->where('ID_kredit', $id_kredit);
        $this->db->where('ID_kriteria', $id_kriteria);
        return $this->db->get();
    }
    function select_id_kriteria($id_kredit){
        $this->db->select('kriteria_kredit.ID_kriteria');
        $this->db->from('kriteria_kredit');
        $this->db->join('kriteria','kriteria.ID_kriteria = kriteria_kredit.ID_kriteria');
        $this->db->where('kriteria_kredit.ID_kredit', $id_kredit);
        return $this->db->get();
    }
    function update_kriteria_kredit($id_kredit, $id_kriteria, $data){
        $this->db->where('ID_kredit', $id_kredit);
        $this->db->where('ID_kriteria', $id_kriteria);
        $this->db->update('kriteria_kredit', $data);
    }
    function delete_kriteria_kredit($id_kredit, $id_kriteria){
        $this->db->where('ID_kredit', $id_kredit);
        $this->db->where('ID_kriteria', $id_kriteria);
        $this->db->delete('kriteria_kredit');
    }
}
?>