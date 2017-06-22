<?php
class M_relasi_kriteria extends CI_Model {
    function __construct(){
        parent::__construct();
    }
    function insert_relasi_kriteria($data){
        $this->db->insert('relasi_kriteria', $data);
    }
    function select_by_id($id_kredit){
        $this->db->select('*');
        $this->db->from('relasi_kriteria');
        $this->db->where('ID_kredit', $id_kredit);
        return $this->db->get();
    }
    function update_bobot_relasi($id_kredit, $id_kriteria1, $id_kriteria2, $data){
        $this->db->where('ID_kredit', $id_kredit);
        $this->db->where('ID_kriteria1', $id_kriteria1);
        $this->db->where('ID_kriteria2', $id_kriteria2);
        $this->db->update('relasi_kriteria', $data);
    }
    function delete_relasi_kriteria($id_kredit, $id_kriteria1, $id_kriteria2){
        $this->db->where('ID_kredit', $id_kredit);
        $this->db->where('id_kriteria1', $id_kriteria1);
        $this->db->where('id_kriteria2', $id_kriteria2);
        $this->db->delete('relasi_kriteria');
    }
}
?>