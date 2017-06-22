<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_bobot_kriteria extends CI_Controller {

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
        $this->load->model('M_relasi_kriteria');
    }
	
    public function edit_bobot($ID_kredit){
        $data=array(
            'title'=>'Bobot Kriteria',
            'active_bobot'=>'active');
    
	    $this->load->view('element/header',$data);
        $this->load->view('element/navbar_admin');
        
        $data['daftar_kriteria'] = $this->M_kriteria->select_all()->result();
        $data['jumlah'] = count($data['daftar_kriteria']);
        $data['id'] = $ID_kredit;
        
        $this->load->view('form/edit_bobot', $data);
        $this->load->view('element/footer');
        }
        
    public function proses_edit_bobot($ID_kredit){ 
        
        // mengupdate bobot relasi
        // i mewakili id kriteria 1
        // j mewakili id kriteria 2
        for($i = 1; $i <= 5; $i++){
            for($j = 1; $j <= 5; $j++){
                $data['bobot'] = $this->input->post(''.$i.$j);
                $this->M_relasi_kriteria->update_bobot_relasi($ID_kredit, $i, $j, $data);
            }          
        }
        
        redirect(site_url('C_halaman_admin/bobot_kriteria/'.$ID_kredit));
   }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */