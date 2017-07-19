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
        $this->load->model('M_kriteria_kredit');
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
        //$data['scor'] = 0;

        //==================================Mengambil hasil bobot perhitungan=============================================
        $bobot_reputasi = $this->M_kriteria_kredit->select_by_id($this->session->userdata('IDKredit'), 1)->row();
        $bobot_hargaBarang = $this->M_kriteria_kredit->select_by_id($this->session->userdata('IDKredit'), 2)->row();
        $bobot_aset = $this->M_kriteria_kredit->select_by_id($this->session->userdata('IDKredit'), 3)->row();
        $bobot_dana = $this->M_kriteria_kredit->select_by_id($this->session->userdata('IDKredit'), 4)->row();
        $bobot_mampuCicil = $this->M_kriteria_kredit->select_by_id($this->session->userdata('IDKredit'), 5)->row();

        $reputasi = ($this->cek_reputasi($this->input->post('reputasi'))) * $bobot_reputasi->bobot;
        $hargaBarang = ($this->cek_hargaBarang($this->input->post('hargaBarang'))) * $bobot_hargaBarang->bobot;
        $aset = ($this->cek_aset($this->input->post('aset'))) * $bobot_aset->bobot;
        $dana = ($this->cek_dana($this->input->post('dana'))) * $bobot_dana->bobot;
        $mampu_cicil = ($this->cek_mampuCicil($this->input->post('mampu_cicil'))) * $bobot_mampuCicil->bobot;

        $data['scor'] = $reputasi + $hargaBarang + $aset + $dana + $mampu_cicil;

        print_r($data);

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
                redirect(site_url('C_halaman_pengurus/rangking_peserta/0'));
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

    public function cek_reputasi($reputasi) {
        if ($reputasi == 5) {
            $nilai = 0.42;
        } else if ($reputasi == 4) {
            $nilai = 0.26;
        } else if ($reputasi == 3) {
            $nilai = 0.16;
        } else if ($reputasi == 2) {
            $nilai = 0.1;
        } else if ($reputasi == 1) {
            $nilai = 0.06;
        }
        return $nilai;
    }

    public function cek_hargaBarang($hargaBarang) {
        if ($hargaBarang == "> Rp 4.000.000") {
            $nilai = 0.42;
        } else if ($hargaBarang == "Rp 3.000.000 - Rp 4.000.000") {
            $nilai = 0.26;
        } else if ($hargaBarang == "Rp 2.000.000 - Rp 3.000.000") {
            $nilai = 0.16;
        } else if ($hargaBarang == "Rp 1.000.000 - Rp 2.000.000") {
            $nilai = 0.1;
        } else if ($hargaBarang == "< Rp 1.000.000") {
            $nilai = 0.06;
        }
        return $nilai;
    }

    public function cek_aset($aset) {
        if ($aset == "> Rp 4.000.000") {
            $nilai = 0.42;
        } else if ($aset == "Rp 3.000.000 - Rp 4.000.000") {
            $nilai = 0.26;
        } else if ($aset == "Rp 2.000.000 - Rp 3.000.000") {
            $nilai = 0.16;
        } else if ($aset == "Rp 1.000.000 - Rp 2.000.000") {
            $nilai = 0.1;
        } else if ($aset == "< Rp 1.000.000") {
            $nilai = 0.06;
        }
        return $nilai;
    }

    public function cek_dana($dana) {
        if ($dana == "< Rp 1.000.000") {
            $nilai = 0.42;
        } else if ($dana == "Rp 1.000.000 - Rp 2.000.000") {
            $nilai = 0.26;
        } else if ($dana == "Rp 2.000.000 - Rp 3.000.000") {
            $nilai = 0.16;
        } else if ($dana == "Rp 3.000.000 - Rp 4.000.000") {
            $nilai = 0.1;
        } else if ($dana == "> Rp 4.000.000") {
            $nilai = 0.06;
        }
        return $nilai;
    }
    
    public function cek_mampuCicil($lama_cicil) {
        if ($lama_cicil == 5) {
            $nilai = 0.42;
        } else if ($lama_cicil == 4) {
            $nilai = 0.26;
        } else if ($lama_cicil == 3) {
            $nilai = 0.16;
        } else if ($lama_cicil == 2) {
            $nilai = 0.1;
        } else if ($lama_cicil == 1) {
            $nilai = 0.06;
        }
        return $nilai;
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */