<?php
class M_kredit extends CI_Model {
    function __construct(){
        parent::__construct();
    }
    function insert_kredit($data){
        $this->db->insert('jenis_kredit', $data);
    }
    function select_all(){
        $this->db->select('*');
        $this->db->from('jenis_kredit');
        return $this->db->get();
    }
    function select_max(){
        $this->db->select('*');
        $this->db->from('jenis_kredit');
        $this->db->order_by('ID_kredit', 'desc');
        return $this->db->get();
    }
    function select_by_id($id_kredit){
        $this->db->select('*');
        $this->db->from('jenis_kredit');
        $this->db->where('ID_kredit', $id_kredit);
        return $this->db->get();
    }
    function select_by_user($id_user){
        $this->db->select('*');
        $this->db->from('jenis_kredit');
        $this->db->where('ID_User', $id_user);
        return $this->db->get();
    }
    function update_kredit($id_kredit, $data){
        $this->db->where('ID_kredit', $id_kredit);
        $this->db->update('jenis_kredit', $data);
    }
    function delete_kredit($id_kredit){
        $this->db->where('ID_kredit', $id_kredit);
        $this->db->delete('jenis_kredit');
    }
}
?>