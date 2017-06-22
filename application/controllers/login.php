<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

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
        $this->load->model('User_Model');
        $this->load->model('M_kredit');
    }
	public function login()
	{
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $temp_account = $this->User_Model->cek_user($username, $password)->row();
        
        // check account
        $num_account = count($temp_account);
        if ($num_account > 0){
            if($temp_account->level == "1"){
                // set session
                $array_items = array(
                'IDUser' => $temp_account->IDUser,
                'username' => $temp_account->username,
                'logged_in' => true
                );
                
                $this->session->set_userdata($array_items);
                
                redirect(site_url('C_halaman_admin'));
            }else{
                $kredit = $this->M_kredit->select_by_user($temp_account->IDUser)->row();
                
                // set session
                $array_items = array(
                'IDUser' => $temp_account->IDUser,
                'IDKredit' => $kredit->ID_kredit,
                'nama_kredit' => $kredit->nama_kredit,
                'logged_in' => true
                );
                
                $this->session->set_userdata($array_items);
                
                redirect(site_url('C_halaman_pengurus'));
            }
        } else {
            // kalau ga ada diredirect lagi ke halaman login
            redirect(base_url()."?pesan=gagal");
        }
        }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url());     
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */