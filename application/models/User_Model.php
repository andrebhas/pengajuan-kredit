<?php
class User_Model extends CI_Model {
    function __construct(){
        parent::__construct();
    }
    function cek_user($username, $password){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get();
    }
    function insert_user($data){
        $this->db->insert('user', $data);
    }
    function select_all(){
        $this->db->select('*');
        $this->db->from('user');
        return $this->db->get();
    }
    function select_max(){
        $this->db->select_max('IDUser');
        return $this->db->get('user');
    }
    function select_by_id($id_user){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('IDUser', $id_user);
        return $this->db->get();
    }
    function select_not_in($id_user){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where_not_in('IDUser', $id_user);
        return $this->db->get();
    }
    function update_user($id_user, $data){
        $this->db->where('IDUser', $id_user);
        $this->db->update('user', $data);
    }
    function delete_user($id_user){
        $this->db->where('IDUser', $id_user);
        $this->db->delete('user');
    }
}
?>