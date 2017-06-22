<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_kriteria_kredit extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
     
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('input');
        $this->load->model('M_kriteria');
        $this->load->model('M_kriteria_kredit');
    }
	public function tambah_kriteria($ID_kredit){
	   $data=array(
            'title'=>'Data Kredit',
            'active_kredit'=>'active');
    
	    $this->load->view('element/header',$data);
        $this->load->view('element/navbar_admin');
        
        $id_not = array();
        array_push($id_not, 0);
        $id = $this->M_kriteria_kredit->select_id_kriteria($ID_kredit)->result();
        foreach ($id as $kriteria) {
            array_push($id_not, $kriteria->ID_kriteria);
        }
        
        $data['daftar_kriteria'] = $this->M_kriteria->select_not_in($id_not)->result();
        $data['id'] = $ID_kredit;
		$this->load->view('Pages/V_pilih_kriteria', $data);
        $this->load->view('element/footer');
    }
    
    public function proses_tambah_kriteria($ID_kredit, $ID_kriteria){
        $data['ID_kredit'] = $ID_kredit;
        $data['ID_kriteria'] = $ID_kriteria;
        $data['bobot'] = 0;
        $this->M_kriteria_kredit->insert_kriteria_kredit($data);
        redirect(site_url('C_data_kredit/kriteria_kredit/'.$ID_kredit));
    }
    
    public function edit_kredit($ID_kredit){
        $data=array(
            'title'=>'Data Kredit',
            'active_kredit'=>'active');
    
	    $this->load->view('element/header',$data);
        $this->load->view('element/navbar_admin');
        
        $data['kredit'] = $this->M_kredit->select_by_id($ID_kredit)->row();
        $this->load->view('form/edit_kredit', $data);
        $this->load->view('element/footer');
        }
        
    public function proses_edit_kredit($ID_kredit){ 
        $data['nama_kredit'] = $this->input->post('nama_kredit');
        $this->M_kredit->update_kredit($ID_kredit, $data);
        redirect(site_url('C_halaman_admin/data_kredit'));
   }
   
   public function delete_kredit($id_kredit, $id_kriteria){
        $this->M_kriteria_kredit->delete_kriteria_kredit($id_kredit, $id_kriteria);
        redirect(site_url('C_data_kredit/kriteria_kredit/'.$id_kredit));
   }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */