<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_data_kredit extends CI_Controller {

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
        $this->load->model('M_kredit');
        $this->load->model('User_Model');
        $this->load->model('M_kriteria_kredit');
        $this->load->model('M_relasi_kriteria');
    }
	public function tambah_kredit(){
	   $data=array(
            'title'=>'Data Kredit',
            'active_kredit'=>'active');
    
	    $this->load->view('element/header',$data);
        $this->load->view('element/navbar_admin');
		$this->load->view('form/tambah_kredit');
        $this->load->view('element/footer');
    }
    
    public function proses_tambah_kredit(){
        $pass1 = $this->input->post('password');
        $pass2 = $this->input->post('password2');
        
        if($pass1 == $pass2){
            $status = true;
            $username = $this->input->post('username');
            $user = $this->User_Model->select_all()->result();
            foreach ($user as $user) {
                if($user->username == $username){
                    $status = false;
                    break;
                }
            }
            if($status == true){
                $data2['username'] = $username;
                $data2['password'] = $pass1;
                $data2['level'] = 2;
                $this->User_Model->insert_user($data2);
                $id = $this->User_Model->select_max()->row();
                
                $data['nama_kredit'] = $this->input->post('nama_kredit');
                $data['deskripsi'] = $this->input->post('deskripsi');
                $data['ID_user'] = $id->IDUser;
                
                $this->M_kredit->insert_kredit($data);
                
                $id_kredit = $this->M_kredit->select_max()->row();
                $data3['ID_kredit'] = $id_kredit->ID_kredit;
                $data4['ID_kredit'] = $id_kredit->ID_kredit;
                
                //input kriteria kredit
                for($i = 1; $i <=4; $i++){
                    
                    $data3['ID_kriteria'] = $i;
                    $data3['bobot'] = 0;
                    
                    $this->M_kriteria_kredit->insert_kriteria_kredit($data3);
                }
                
                //input relasi kredit
                $data4['bobot'] = 1;
                for($j = 1; $j <=4; $j++){
                    $data4['id_kriteria1'] = $j;
                    for($k = 1; $k <=4; $k++){
                        $data4['id_kriteria2'] = $k;
                        
                        $this->M_relasi_kriteria->insert_relasi_kriteria($data4);
                    }
                }
                
                
                redirect(site_url('C_halaman_admin/data_kredit'));
            
            }else {
                redirect(site_url('C_data_kredit/tambah_kredit')."?pesan=gagal2");
            }
            
        }else{
            redirect(site_url('C_data_kredit/tambah_kredit')."?pesan=gagal");
        }   
    }
    
    public function edit_kredit($ID_kredit, $ID_user){
        $data=array(
            'title'=>'Data kredit',
            'active_kredit'=>'active');
    
	    $this->load->view('element/header',$data);
        $this->load->view('element/navbar_admin');
        
        $data['kredit'] = $this->M_kredit->select_by_id($ID_kredit)->row();
        $data['user'] = $this->User_Model->select_by_id($ID_user)->row();
        
        $this->load->view('form/edit_kredit', $data);
        $this->load->view('element/footer');
        }
        
    public function proses_edit_kredit($ID_kredit, $ID_user){ 
        $pass1 = $this->input->post('password');
        $pass2 = $this->input->post('password2');
        
        if($pass1 == $pass2){
            $status = true;
            $username = $this->input->post('username');
            $user = $this->User_Model->select_not_in($ID_user)->result();
            foreach ($user as $user) {
                if($user->username == $username){
                    $status = false;
                    break;
                }
            }
            if($status == true){
                $data2['username'] = $username;
                $data2['password'] = $pass1;
                $data2['level'] = 2;
                $this->User_Model->update_user($ID_user, $data2);
                
                $data['nama_kredit'] = $this->input->post('nama_kredit');
                $data['deskripsi'] = $this->input->post('deskripsi');
                $data['ID_user'] = $ID_user;
                
                $this->M_kredit->update_kredit($ID_kredit, $data);
                redirect(site_url('C_halaman_admin/data_kredit'));
            
            }else {
                redirect(site_url('C_data_kredit/edit_kredit/'.$ID_kredit.'/'.$ID_user)."?pesan=gagal2");
            }
            
        }else{
            redirect(site_url('C_data_kredit/edit_kredit/'.$ID_kredit.'/'.$ID_user)."?pesan=gagal");
        }
   }
   
   public function delete_kredit($id_kredit, $id_user){
        $this->M_kredit->delete_kredit($id_kredit);
        $this->User_Model->delete_user($id_user);
        
        //delete kriteria kredit
                for($i = 1; $i <=4; $i++){ 
                    $this->M_kriteria_kredit->delete_kriteria_kredit($id_kredit, $i);
                }
                
                //delete relasi kredit
                for($j = 1; $j <=4; $j++){
                    for($k = 1; $k <=4; $k++){
                        $this->M_relasi_kriteria->delete_relasi_kriteria($id_kredit, $j, $i);
                    }
                }
        
        redirect(site_url('C_halaman_admin/data_kredit'));
   }
   
   public function kriteria_kredit($ID_kredit){ 
        $data=array(
            'title'=>'Data Kredit',
            'active_kredit'=>'active');
    
	    $this->load->view('element/header',$data);
        $this->load->view('element/navbar_admin');
        
        $data['kriteria_kredit'] = $this->M_kriteria_kredit->select_by_id($ID_kredit)->result();
        $data['data_kredit'] = $this->M_kredit->select_by_id($ID_kredit)->row();
        $this->load->view('pages/V_kriteria_kredit', $data);
        $this->load->view('element/footer');
   }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */