<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_data_peserta extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('input');
        $this->load->library('session');
        $this->load->model('M_peserta');
    }

    public function tambah_peserta() {
        $dt_peserta = $this->M_peserta->get_all_peserta();
        $data = array(
            'title' => 'Data peserta',
            'active_peserta' => 'active',
            'dt_peserta' => $dt_peserta ,
           );
        
        $this->load->view('element/header', $data);
        $this->load->view('element/navbar_pengurus');

        $this->load->view('form/tambah_peserta');
        $this->load->view('element/footer');
    }

    public function json_peserta($ktp=null)
    {
        if($ktp) {
            $data = $this->M_peserta->get_peserta_by_ktp($ktp);
        } else {
            $data = $this->M_peserta->get_all_peserta($ktp);
        }
        
        echo json_encode($data);
    }

    public function proses_tambah_peserta() {
        $data['tgl_pendaftaran'] = $this->input->post('tgl_pendaftaran');
        $data['KTP_ID'] = $this->input->post('KTP_ID');
        $data['nama'] = $this->input->post('nama');
        $data['alamat'] = $this->input->post('alamat');
        $data['no_tlp'] = $this->input->post('no_tlp');
        $data['reputasi'] = $this->input->post('reputasi');
        $data['hargaBarang'] = $this->input->post('hargaBarang');
        $data['brg_ditanggungkan'] = $this->input->post('brg_ditanggungkan');
        $data['aset'] = $this->input->post('aset');
        $data['aset_ukm'] = $this->input->post('aset_ukm');
        $data['dana'] = $this->input->post('dana');
        $data['dana_diajukan'] = $this->input->post('dana_diajukan');
        $data['lama_cicil'] = $this->input->post('lama_cicil');
        $data['cicil_perbulan'] = $this->input->post('cicil_perbulan');
        $data['penghasilan_perbulan'] = $this->input->post('penghasilan_perbulan');
        $data['mampu_cicil'] = $this->input->post('mampu_cicil');
        $data['ID_kredit'] = $this->session->userdata('IDKredit');
        $data['scor'] = 0;
        
        print_r($data);


//        $no_urut_file = $this->M_peserta->No_Urut()->result();
//        if (count($no_urut_file) != 0) {
//            foreach ($no_urut_file as $t) {
//                $hasil = $t->id_files + 1;
//            }
//        } else {
//            $hasil = 1;
//        }
        
        
        
        if ($this->input->post('KTP_ID') && !empty($_FILES['userFiles']['name'])) {
            $filesCount = count($_FILES['userFiles']['name']);
            for ($i = 0; $i < $filesCount; $i++) {
                $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

                $uploadPath = 'uploads/files/';
                $config['upload_path'] = $uploadPath;
                $config['file_name'] = $data['KTP_ID'] . '_' . $hasil;
                $config['allowed_types'] = 'doc|docx|pdf|jpg|jpeg|png|xls|xlsx';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                $this->upload->display_errors('<p>', '</p>');
                if ($this->upload->do_upload('userFile')) {
                    $fileData = $this->upload->data();
                    $uploadData = array(
                        'KTP_ID' => $data['KTP_ID'],
                        //'id_files' => $hasil,
                        'nama_files' => $fileData['file_name'],
                        'tanggal_upload' => date("Y-m-d H:i:s")
                    );
                    $this->M_peserta->insert_files($uploadData);
                    
                } else {
                    echo '<script>alert(GAGAL UPLOAD!!!!);</script>';
                }
                $hasil++;
            }
                $this->M_peserta->insert_peserta($data);
                redirect(site_url('C_halaman_pengurus/data_peserta'));
        }
        
        
    }

    public function edit_peserta($ID_peserta) {
        $data = array(
            'title' => 'Data peserta',
            'active_peserta' => 'active');

        $this->load->view('element/header', $data);
        $this->load->view('element/navbar_pengurus');

        $data['peserta'] = $this->M_peserta->select_by_id($ID_peserta)->row();

        $this->load->view('form/edit_peserta', $data);
        $this->load->view('element/footer');
    }

    public function proses_edit_peserta($ID_peserta) {

        $data['KTP_ID'] = $this->input->post('KTP_ID');
        $data['nama'] = $this->input->post('nama');
        $data['alamat'] = $this->input->post('alamat');
        $data['no_tlp'] = $this->input->post('no_tlp');
        $data['reputasi'] = $this->input->post('reputasi');
        $data['hargaBarang'] = $this->input->post('hargaBarang');
        $data['brg_ditanggungkan'] = $this->input->post('brg_ditanggungkan');
        $data['aset'] = $this->input->post('aset');
        $data['aset_ukm'] = $this->input->post('aset_ukm');
        $data['dana'] = $this->input->post('dana');
        $data['dana_diajukan'] = $this->input->post('dana_diajukan');
        $data['lama_cicil'] = $this->input->post('lama_cicil');
        $data['cicil_perbulan'] = $this->input->post('cicil_perbulan');
        $data['penghasilan_perbulan'] = $this->input->post('penghasilan_perbulan');
        $data['mampu_cicil'] = $this->input->post('mampu_cicil');
        $data['ID_kredit'] = $this->session->userdata('IDKredit');

        $this->M_peserta->update_peserta($ID_peserta, $data);
        redirect(site_url('C_halaman_pengurus/data_peserta'));
    }

    public function delete_peserta($id_peserta) {
        $peserta = $this->M_peserta->get_by_no_peserta($id_peserta);
        if($peserta){
             $select_name = $this->M_peserta->select_nameFiles_by_id($peserta->no)->result();
             foreach ($select_name as $name) {
                $filename = $name->nama_files;
        //      $uploadPath = 'uploads/files/';
                unlink('uploads/files/'.$filename);
             }
            $this->M_peserta->delete_files($peserta->KTP_ID);
        }
        $this->M_peserta->delete_peserta($id_peserta);
        redirect(site_url('C_halaman_pengurus/data_peserta'));
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */