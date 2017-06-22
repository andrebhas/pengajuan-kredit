<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_halaman_utama extends CI_Controller {

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
        $this->load->library('session');
        $this->load->model('M_peserta');
        $this->load->model('M_kredit');
        $this->load->model('M_relasi_kriteria');
    }
	public function index()
	{
		$data=array(
            'title'=>'DSS Calon Penerima Kredit',
            'active_home'=>'active');
    
	    $this->load->view('element/header',$data);
        $this->load->view('element/navbar_user');
        $this->load->view('form/F_login');
		$this->load->view('halaman_utama');
        $this->load->view('element/footer');
	}
	
//	public function peserta($id)
//	{
//	   $data=array(
//            'title'=>'Info Peserta',
//            'active_peserta'=>'active');
//    
//	    $this->load->view('element/header', $data);
//        $this->load->view('element/navbar_user');
//        $this->load->view('form/F_login');
//        
//        $data['daftar_peserta'] = $this->M_peserta->select_by_kredit($id)->result();
//        $data['daftar_kredit'] = $this->M_kredit->select_all()->result();
//        $data['id'] = $id;
//        
//		$this->load->view('pages/V_peserta', $data);
//        $this->load->view('element/footer');
//	}
        
                public function peserta($id)
	{
	   $data=array(
            'title'=>'Peserta',
            'active_peserta'=>'active');
    
	    $this->load->view('element/header', $data);
        $this->load->view('element/navbar_user');
        $this->load->view('form/F_login');
        
        $data['daftar_pes'] = $this->M_peserta->select_all()->result();
        $data['id'] = $id;
        $data['daftar_peserta'] = $this->M_peserta->select_urut_skor($id)->result();
       // $data['relasi_kriteria']    = $this->M_relasi_kriteria->select_by_id($this->session->userdata('IDKredit'))->result();
        
        //=======================================Mngurutkan berdasarkan nilai tertinggi====================================
        //$data['relasi_kriteria']    = $this->M_relasi_kriteria->select_by_id($this->session->userdata('IDKredit'))->result();
        
	$this->load->view('pages/V_rangking_pengaju_umum', $data);
        $this->load->view('element/footer');
	}
        
    public function kredit()
	{
	   $data=array(
            'title'=>'Info Kredit',
            'active_kredit'=>'active');
    
	    $this->load->view('element/header',$data);
        $this->load->view('element/navbar_user');
        $this->load->view('form/F_login');
        
        $data['daftar_kredit'] = $this->M_kredit->select_all()->result();
		$this->load->view('pages/V_kredit', $data);
        $this->load->view('element/footer');
	}
    public function selengkapnya($ID_kredit)
	{
	   $data=array(
            'title'=>'Info Kredit',
            'active_kredit'=>'active');
    
	    $this->load->view('element/header',$data);
        $this->load->view('element/navbar_user');
        $this->load->view('form/F_login');
        
        $data['kredit'] = $this->M_kredit->select_by_id($ID_kredit)->row();
		$this->load->view('pages/V_kredit_selengkapnya', $data);
        $this->load->view('element/footer');
	}
    public function about()
	{
	   $data=array(
            'title'=>'About',
            'active_about'=>'active');
    
	    $this->load->view('element/header',$data);
        $this->load->view('element/navbar_user');
        $this->load->view('form/F_login');
		$this->load->view('pages/V_about');
        $this->load->view('element/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */