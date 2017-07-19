<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_halaman_pengurus extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('input');
        $this->load->library('session');
        $this->load->model('M_peserta');
        $this->load->model('M_kriteria');
        $this->load->model('M_kriteria_kredit');
        $this->load->model('M_relasi_kriteria');
        $this->load->model('M_kredit');
    }

    public function index() {
        $data = array(
            'title' => 'DSS Calon Penerima Kredit',
            'active_home' => 'active');

        $h = $this->M_peserta->select_rangking()->result();
        foreach ($h as $ke) {
            $hitung['id_hitung'] = $ke->hitung_ke;
        }

        $this->load->view('element/header', $data);
        $this->load->view('element/navbar_pengurus', $hitung);
        $this->load->view('utama_pengurus');
        $this->load->view('element/footer');
    }

//        public function peserta($id)
//	{
//	   $data=array(
//            'title'=>'Peserta',
//            'active_peserta'=>'active');
//    
//	    $this->load->view('element/header', $data);
//        $this->load->view('element/navbar_pengurus');
//
//        $data['daftar_peserta'] = $this->M_peserta->select_by_tanggal($id)->result();
//        $data['daftar_tgl'] = $this->M_peserta->select_all()->result();
//        $data['id'] = $id;
//                
//		$this->load->view('pages/V_peserta_1', $data);
//        $this->load->view('element/footer');
//	}


    public function data_peserta() {
//        $data = array(
//            'title' => 'Data Peserta',
//            'active_peserta' => 'active');
//
////        $h = $this->M_peserta->select_rangking()->result();
////        foreach ($h as $ke) {
////           $hitung['id_hitung'] = $ke->hitung_ke;
////        }
//        
//        $this->load->view('element/header', $data);
//        $this->load->view('element/navbar_pengurus');
//
//        $data['daftar_peserta'] = $this->M_peserta->select_by_kredit($this->session->userdata('IDKredit'))->result();
//        $this->load->view('pages/V_data_peserta', $data);
//        $this->load->view('element/footer');
//    }

        $data = array(
            'title' => 'Data Peserta',
            'active_peserta' => 'active');

        $this->load->view('element/header', $data);
        $this->load->view('element/navbar_pengurus');

        $data['daftar_peserta'] = $this->M_peserta->select_by_kredit($this->session->userdata('IDKredit'))->result();
        $this->load->view('pages/V_data_peserta', $data);
        $this->load->view('element/footer');
    }

    public function perangkingan_peserta() {
        $data = array(
            'title' => 'Data peserta',
            'active_perangkingan' => 'active');

        $htg_ke = $this->input->post('ke');
        if ($htg_ke == 0) {
            $ke = $this->M_peserta->select_hitung_ke()->result();
            foreach ($ke as $id) {
                $hitung_ke = $id->hitung_ke + 1;
            }
        } else {
            $hitung_ke = $htg_ke;
        }

//        $h = $this->M_peserta->select_rangking()->result();
//        foreach($h as $ke) {
//            $hitung['id_hitung'] = $ke->hitung_ke;
//        }

        $this->load->view('element/header', $data);
        $this->load->view('element/navbar_pengurus');

//        $ke = $this->M_peserta->select_hitung_ke()->result();
//        foreach ($ke as $id) {
//            $hitung_ke = $id->hitung_ke + 1;
//        }

        $data['hitung_ke'] = $hitung_ke;
        $data['daftar_peserta'] = $this->M_peserta->select_all_peserta()->result();

        $this->load->view('pages/V_rangking_pengaju_pengurus', $data);
        $this->load->view('element/footer');
    }

    public function tambah_hitung_ke($hitung_ke) {
        $ktp = $this->input->post('id_ktp');
        $this->M_peserta->tambah_hitung_ke($ktp, $hitung_ke);

        $data = array(
            'title' => 'Data peserta',
            'active_perangkingan' => 'active');

        $h = $this->M_peserta->select_rangking()->result();
        foreach ($h as $ke) {
            $hitung['id_hitung'] = $ke->hitung_ke;
        }

        $this->load->view('element/header', $data);
        $this->load->view('element/navbar_pengurus', $hitung);

        $data['hitung_ke'] = $hitung_ke;
        $data['daftar_peserta'] = $this->M_peserta->select_all_peserta()->result();

        $this->load->view('pages/V_rangking_pengaju_pengurus', $data);
        $this->load->view('element/footer');
    }

    public function batal_hitung_ke($ktp,$ke) {
        $this->M_peserta->batal_hitung_ke($ktp);

        echo '<script>
                    window.location="' . base_url() . 'index.php/C_halaman_pengurus/rangking_peserta/'.$ke.'";
                </script>';
    }

    public function rangking_peserta($ke) {
//        $data['daftar_peserta'] = $this->M_peserta->select_by_kredit($this->session->userdata('IDKredit'))->result();
        $data['daftar_pes'] = $this->M_peserta->select_all()->result();
        $data['id'] = $ke;
        $data['daftar_peserta'] = $this->M_peserta->select_by_hitung($ke)->result();
        $data['daftar_kriteria'] = $this->M_kriteria->select_all()->result();

        //==================================Mengambil hasil bobot perhitungan=============================================
        // $bobot_reputasi = $this->M_kriteria_kredit->select_by_id($this->session->userdata('IDKredit'), 1)->row();
        // $bobot_hargaBarang = $this->M_kriteria_kredit->select_by_id($this->session->userdata('IDKredit'), 2)->row();
        // $bobot_aset = $this->M_kriteria_kredit->select_by_id($this->session->userdata('IDKredit'), 3)->row();
        // $bobot_dana = $this->M_kriteria_kredit->select_by_id($this->session->userdata('IDKredit'), 4)->row();
        // $bobot_mampuCicil = $this->M_kriteria_kredit->select_by_id($this->session->userdata('IDKredit'), 5)->row();
        
        
        //echo $bobot_mampuCicil->bobot;
        //================================================================================================================
        //=============================Mengkalikan bobot dengan nilai masing2 mahasiswa===================================
        
        
        
        // foreach ($data['daftar_peserta'] as $peserta) {
        //     $peserta->reputasi = ($this->cek_reputasi($peserta->reputasi)) * $bobot_reputasi->bobot;
        //     $peserta->hargaBarang = ($this->cek_hargaBarang($peserta->hargaBarang)) * $bobot_hargaBarang->bobot;
        //     $peserta->aset = ($this->cek_aset($peserta->aset)) * $bobot_aset->bobot;
        //     $peserta->dana = ($this->cek_dana($peserta->dana)) * $bobot_dana->bobot;
        //     $peserta->mampu_cicil = ($this->cek_mampuCicil($peserta->mampu_cicil)) * $bobot_mampuCicil->bobot;

        //     $data2['scor'] = $peserta->reputasi + $peserta->hargaBarang + $peserta->aset + $peserta->dana + $peserta->mampu_cicil;
        //     //Mengupdate nilai mahasiswa
        //     $this->M_peserta->update_peserta($peserta->no, $data2);
            
        // }


        //=================================================================================================================
        //===============================================Membatasi Jumlah rangking=========================================
        //  $data['daftar_peserta']     = $this->M_peserta->select_limit($this->session->userdata('IDKredit'))->result();
        //=================================================================================================================
        //=======================================Mngurutkan berdasarkan nilai tertinggi====================================
        //  $data['relasi_kriteria']    = $this->M_relasi_kriteria->select_by_id($this->session->userdata('IDKredit'))->result();
        //=================================================================================================================
        $data_c = array(
            'title' => 'Info Kredit',
            'active_rangking' => 'active');

        $this->load->view('element/header', $data_c);
        $this->load->view('element/navbar_pengurus');
        $this->load->view('pages/V_rangking_peserta', $data);
        $this->load->view('element/footer');
    }

    // public function cek_reputasi($reputasi) {
    //     if ($reputasi == 5) {
    //         $nilai = 0.42;
    //     } else if ($reputasi == 4) {
    //         $nilai = 0.26;
    //     } else if ($reputasi == 3) {
    //         $nilai = 0.16;
    //     } else if ($reputasi == 2) {
    //         $nilai = 0.1;
    //     } else if ($reputasi == 1) {
    //         $nilai = 0.06;
    //     }
    //     return $nilai;
    // }

    // public function cek_hargaBarang($hargaBarang) {
    //     if ($hargaBarang == "> Rp 4.000.000") {
    //         $nilai = 0.42;
    //     } else if ($hargaBarang == "Rp 3.000.000 - Rp 4.000.000") {
    //         $nilai = 0.26;
    //     } else if ($hargaBarang == "Rp 2.000.000 - Rp 3.000.000") {
    //         $nilai = 0.16;
    //     } else if ($hargaBarang == "Rp 1.000.000 - Rp 2.000.000") {
    //         $nilai = 0.1;
    //     } else if ($hargaBarang == "< Rp 1.000.000") {
    //         $nilai = 0.06;
    //     }
    //     return $nilai;
    // }

    // public function cek_aset($aset) {
    //     if ($aset == "> Rp 4.000.000") {
    //         $nilai = 0.42;
    //     } else if ($aset == "Rp 3.000.000 - Rp 4.000.000") {
    //         $nilai = 0.26;
    //     } else if ($aset == "Rp 2.000.000 - Rp 3.000.000") {
    //         $nilai = 0.16;
    //     } else if ($aset == "Rp 1.000.000 - Rp 2.000.000") {
    //         $nilai = 0.1;
    //     } else if ($aset == "< Rp 1.000.000") {
    //         $nilai = 0.06;
    //     }
    //     return $nilai;
    // }

    // public function cek_dana($dana) {
    //     if ($dana == "< Rp 1.000.000") {
    //         $nilai = 0.42;
    //     } else if ($dana == "Rp 1.000.000 - Rp 2.000.000") {
    //         $nilai = 0.26;
    //     } else if ($dana == "Rp 2.000.000 - Rp 3.000.000") {
    //         $nilai = 0.16;
    //     } else if ($dana == "Rp 3.000.000 - Rp 4.000.000") {
    //         $nilai = 0.1;
    //     } else if ($dana == "> Rp 4.000.000") {
    //         $nilai = 0.06;
    //     }
    //     return $nilai;
    // }
    
    // public function cek_mampuCicil($lama_cicil) {
    //     if ($lama_cicil == 5) {
    //         $nilai = 0.42;
    //     } else if ($lama_cicil == 4) {
    //         $nilai = 0.26;
    //     } else if ($lama_cicil == 3) {
    //         $nilai = 0.16;
    //     } else if ($lama_cicil == 2) {
    //         $nilai = 0.1;
    //     } else if ($lama_cicil == 1) {
    //         $nilai = 0.06;
    //     }
    //     return $nilai;
    // }

}

//    public function rangking_peserta($id)
//	{
//	   $data=array(
//            'title'=>'Info Kredit',
//            'active_kredit'=>'active');
//    
////           $h = $this->M_peserta->select_rangking()->result();
////        foreach ($h as $ke) {
////           $hitung['id_hitung'] = $ke->hitung_ke;
////        }
//           
//	    $this->load->view('element/header',$data);
//        $this->load->view('element/navbar_pengurus');
//        
//              
//        $data['daftar_peserta'] = $this->M_peserta->select_by_htg($this->session->userdata('hitung_ke'))->result();
//        $data['daftar_htg'] = $this->M_peserta->select_all1()->result();
//        $data['daftar_kriteria'] = $this->M_kriteria->select_all()->result();
//        $data['id'] = $id;
//        
//        //==================================Mengambil hasil bobot perhitungan=============================================
//        $bobot_reputasi          = $this->M_kriteria_kredit->select_by_id($this->session->userdata('IDTKredit'), 1)->row();
//        $bobot_hargaBarang     = $this->M_kriteria_kredit->select_by_id($this->session->userdata('IDTKredit'), 2)->row();
//        $bobot_aset  = $this->M_kriteria_kredit->select_by_id($this->session->userdata('IDTKredit'), 3)->row();
//        $bobot_dana   = $this->M_kriteria_kredit->select_by_id($this->session->userdata('IDTKredit'), 4)->row();
//        //================================================================================================================
//        
//        
//        //=============================Mengkalikan bobot dengan nilai masing2 mahasiswa===================================
//        foreach($data['daftar_peserta'] as $peserta){
//            $peserta->reputasi              = ($this->cek_reputasi($peserta->reputasi)) * $bobot_reputasi->bobot;
//            $peserta->hargaBarang           = ($this->cek_hargaBarang($peserta->hargaBarang)) * $bobot_hargaBarang->bobot;
//            $peserta->aset                  = ($this->cek_aset($peserta->aset)) * $bobot_aset->bobot;
//            $peserta->dana                  = ($this->cek_dana($peserta->dana)) * $bobot_dana->bobot;
//            
//            $data2['scor'] = $peserta->reputasi + $peserta->hargaBarang + $peserta->aset + $peserta->dana;
//            //Mengupdate nilai mahasiswa
//            $this->M_peserta->update_peserta($peserta->KTP_ID, $data2);
//        }
//        //=================================================================================================================
//        
//        //===============================================Membatasi Jumlah rangking=========================================
//        $data['daftar_peserta']     = $this->M_peserta->select_limit($this->session->userdata('IDKredit'))->result();
//        //=================================================================================================================
//        
//        //=======================================Mngurutkan berdasarkan nilai tertinggi====================================
//        $data['relasi_kriteria']    = $this->M_relasi_kriteria->select_by_id($this->session->userdata('IDKredit'))->result();
//        //=================================================================================================================
//        
//		$this->load->view('pages/V_rangking_peserta', $data);
//        $this->load->view('element/footer');
//	}
//    
//    public function cek_reputasi($reputasi)
//	{
//	   if($reputasi > 5){
//	       $nilai = 0.42;
//	   } else if($reputasi <= 5 && $reputasi > 4){
//	       $nilai = 0.26;
//	   } else if($reputasi <= 4 && $reputasi > 3){
//	       $nilai = 0.16;
//	   } else if($reputasi <= 3 && $reputasi > 2){
//	       $nilai = 0.1;
//	   } else if($reputasi <= 2){
//	       $nilai = 0.6;
//	   }
//       return $nilai;
//	}
//    
//    public function cek_hargaBarang($hargaBarang)
//	{
//	   if($hargaBarang == "< Rp 1.000.000"){
//	       $nilai = 0.42;
//	   } else if($hargaBarang == "Rp 1.000.000 - Rp 2.000.000"){
//	       $nilai = 0.26;
//	   } else if($hargaBarang == "Rp 2.000.000 - Rp 3.000.000"){
//	       $nilai = 0.16;
//	   } else if($hargaBarang == "Rp 3.000.000 - Rp 4.000.000"){
//	       $nilai = 0.1;
//	   } else if($hargaBarang == "> Rp 4.000.000"){
//	       $nilai = 0.6;
//	   }
//       return $nilai;
//	}
//    
//    public function cek_aset($aset)
//	{
//	   if($aset == "< Rp 1.000.000"){
//	       $nilai = 0.42;
//	   } else if($aset == "Rp 1.000.000 - Rp 2.000.000"){
//	       $nilai = 0.26;
//	   } else if($aset == "Rp 2.000.000 - Rp 3.000.000"){
//	       $nilai = 0.16;
//	   } else if($aset == "Rp 3.000.000 - Rp 4.000.000"){
//	       $nilai = 0.1;
//	   } else if($aset == "> Rp 4.000.000"){
//	       $nilai = 0.6;
//	   }
//       return $nilai;
//	}
//        
//        public function cek_dana($dana)
//	{
//	   if($dana == "< Rp 1.000.000"){
//	       $nilai = 0.42;
//	   } else if($dana == "Rp 1.000.000 - Rp 2.000.000"){
//	       $nilai = 0.26;
//	   } else if($dana == "Rp 2.000.000 - Rp 3.000.000"){
//	       $nilai = 0.16;
//	   } else if($dana == "Rp 3.000.000 - Rp 4.000.000"){
//	       $nilai = 0.1;
//	   } else if($dana == "> Rp 4.000.000"){
//	       $nilai = 0.6;
//	   }
//       return $nilai;
//	}
//}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */