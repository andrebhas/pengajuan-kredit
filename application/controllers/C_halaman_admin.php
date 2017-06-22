<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_halaman_admin extends CI_Controller {

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
        $this->load->model('M_kriteria');
        $this->load->model('M_kredit');
        $this->load->model('M_kriteria_kredit');
        $this->load->model('M_relasi_kriteria');
        $this->load->model('M_peserta');
    }

    public function index() {
        $data = array(
            'title' => 'DSS Calon Penerima Kredit',
            'active_home' => 'active');

        $this->load->view('element/header', $data);
        $this->load->view('element/navbar_admin');
        $this->load->view('utama_admin');
        $this->load->view('element/footer');
    }

    public function peserta($id) {
        $data = array(
            'title' => 'Peserta',
            'active_peserta' => 'active');

        $this->load->view('element/header', $data);
        $this->load->view('element/navbar_admin');

        $data['daftar_peserta'] = $this->M_peserta->select_urut_skor($id)->result();
        $data['daftar_pes'] = $this->M_peserta->select_all()->result();
        $data['id'] = $id;

        $data['relasi_kriteria'] = $this->M_relasi_kriteria->select_by_id($this->session->userdata('IDKredit'))->result();

        $this->load->view('pages/V_rangking_pengaju_admin', $data);
        $this->load->view('element/footer');
    }

    public function data_kredit() {
        $data = array(
            'title' => 'Data Kredit',
            'active_kredit' => 'active');

        $this->load->view('element/header', $data);
        $this->load->view('element/navbar_admin');

        $data['daftar_kredit'] = $this->M_kredit->select_all()->result();
        $this->load->view('pages/V_data_kredit', $data);
        $this->load->view('element/footer');
    }

    public function data_kriteria() {
        $data = array(
            'title' => 'Data Kriteria',
            'active_kriteria' => 'active');

        $this->load->view('element/header', $data);
        $this->load->view('element/navbar_admin');

        $data['daftar_kriteria'] = $this->M_kriteria->select_all()->result();
        $this->load->view('pages/V_data_kriteria', $data);
        $this->load->view('element/footer');
    }
    
    public function batal_hitung_ke($ktp,$ke) {
        $this->M_peserta->batal_hitung_ke($ktp);
        echo '<script>
                    window.location="' . base_url() . 'index.php/C_halaman_admin/peserta/' . $ke . '";
                </script>';
    }
    
    public function setujui($ktp,$hitung_ke) {
        $this->M_peserta->setujui_kredit($ktp);
        echo '<script>
                    window.location="' . base_url() . 'index.php/C_halaman_admin/peserta/' . $hitung_ke . '";
                </script>';
    }
    public function tolak($ktp,$hitung_ke) {
        $this->M_peserta->tolak_kredit($ktp);
        echo '<script>
                    window.location="' . base_url() . 'index.php/C_halaman_admin/peserta/' . $hitung_ke . '";
                </script>';
    }
    public function selesai($ktp,$hitung_ke) {
        $this->M_peserta->selesai_kredit($ktp);
        echo '<script>
                    window.location="' . base_url() . 'index.php/C_halaman_admin/peserta/' . $hitung_ke . '";
                </script>';
    }

    public function bobot_kriteria($id) {
        $data = array(
            'title' => 'Bobot Kriteria',
            'active_bobot' => 'active');

        $this->load->view('element/header', $data);
        $this->load->view('element/navbar_admin');

        $data['daftar_kredit'] = $this->M_kredit->select_all()->result();
        $data['daftar_kriteria'] = $this->M_kriteria->select_all()->result();
        $data['relasi_kriteria'] = $this->M_relasi_kriteria->select_by_id($id)->result();

        $data['jumlahKriteria'] = count($data['daftar_kriteria']);
        $data['id'] = $id;

        //======================Menghitung Jumlah Per Kolom=============================
        $jumlah = array();
        foreach ($data['daftar_kriteria'] as $kriteria) {
            $jumlah1 = 0;
            foreach ($data['relasi_kriteria'] as $relasi) {
                //memfilter kriteria per kolom
                if ($relasi->id_kriteria2 == $kriteria->ID_kriteria) {
                    $jumlah1 = $jumlah1 + $relasi->bobot;
                }
            }
            array_push($jumlah, $jumlah1);
        }
        $data['jumlah_per_kolom'] = $jumlah;
        //=============================================================================
        //===============Menghitung nilai per cell (nilai cell / jumlah)===============
        $arrayVector = array();
        foreach ($data['daftar_kriteria'] as $kriteria) {
            $nilai = array();
            $a = 0;
            foreach ($data['relasi_kriteria'] as $relasi) {
                if ($relasi->id_kriteria1 == $kriteria->ID_kriteria) {
                    $nilai1 = $relasi->bobot / $jumlah[$a];
                    array_push($nilai, $nilai1);
                    $a++;
                }
            }
            //======================Menghitung nilai vector=============================
            $vector = 0;
            for ($i = 0; $i < count($nilai); $i++) {
                $vector = $vector + $nilai[$i];
            }

            $vector = $vector / $data['jumlahKriteria'];
            $vector = number_format($vector, 3, '.', '');
            array_push($arrayVector, $vector);
            //==========================================================================
        }
        //=============================================================================
        //===========================Menghitung Nilai Lamda============================
        $lamda = 0;
        for ($i = 0; $i < count($arrayVector); $i++) {
            $lamda = $lamda + ($arrayVector[$i] * $jumlah[$i]);
        }
        //=============================================================================
        //==========================Menghitung Nilai CI================================
        $ci = ($lamda - $data['jumlahKriteria']) / ($data['jumlahKriteria'] - 1);
        $ci = number_format($ci, 3, '.', '');
        //=============================================================================
        //==========================Menghitung Nilai CR================================
        $cr = $ci / $this->nilaiRI($data['jumlahKriteria']);
        $cr = number_format($cr, 3, '.', '');
        //=============================================================================
        //==================Merubah Nilai Bobot AHP ke Fuzzy============================
        $arrayFuzzy = array();
        foreach ($data['relasi_kriteria'] as $nilai_bobot) {
            $arrayDalamFuzzy = array();

            if ($nilai_bobot->bobot == 0.111) {
                array_push($arrayDalamFuzzy, 0.111);
                array_push($arrayDalamFuzzy, 0.111);
                array_push($arrayDalamFuzzy, 0.142);
                array_push($arrayFuzzy, $arrayDalamFuzzy);
            } else if ($nilai_bobot->bobot == 0.125) {
                array_push($arrayDalamFuzzy, 0.111);
                array_push($arrayDalamFuzzy, 0.125);
                array_push($arrayDalamFuzzy, 0.166);
                array_push($arrayFuzzy, $arrayDalamFuzzy);
            } else if ($nilai_bobot->bobot == 0.142) {
                array_push($arrayDalamFuzzy, 0.111);
                array_push($arrayDalamFuzzy, 0.142);
                array_push($arrayDalamFuzzy, 0.2);
                array_push($arrayFuzzy, $arrayDalamFuzzy);
            } else if ($nilai_bobot->bobot == 0.166) {
                array_push($arrayDalamFuzzy, 0.125);
                array_push($arrayDalamFuzzy, 0.166);
                array_push($arrayDalamFuzzy, 0.25);
                array_push($arrayFuzzy, $arrayDalamFuzzy);
            } else if ($nilai_bobot->bobot == 0.2) {
                array_push($arrayDalamFuzzy, 0.142);
                array_push($arrayDalamFuzzy, 0.2);
                array_push($arrayDalamFuzzy, 0.333);
                array_push($arrayFuzzy, $arrayDalamFuzzy);
            } else if ($nilai_bobot->bobot == 0.25) {
                array_push($arrayDalamFuzzy, 0.166);
                array_push($arrayDalamFuzzy, 0.25);
                array_push($arrayDalamFuzzy, 0.5);
                array_push($arrayFuzzy, $arrayDalamFuzzy);
            } else if ($nilai_bobot->bobot == 0.333) {
                array_push($arrayDalamFuzzy, 0.2);
                array_push($arrayDalamFuzzy, 0.333);
                array_push($arrayDalamFuzzy, 1);
                array_push($arrayFuzzy, $arrayDalamFuzzy);
            } else if ($nilai_bobot->bobot == 0.5) {
                array_push($arrayDalamFuzzy, 0.25);
                array_push($arrayDalamFuzzy, 0.5);
                array_push($arrayDalamFuzzy, 1);
                array_push($arrayFuzzy, $arrayDalamFuzzy);
            } else if ($nilai_bobot->bobot == 1) {
                array_push($arrayDalamFuzzy, 1);
                array_push($arrayDalamFuzzy, 1);
                array_push($arrayDalamFuzzy, 1);
                array_push($arrayFuzzy, $arrayDalamFuzzy);
            } else if ($nilai_bobot->bobot == 2) {
                array_push($arrayDalamFuzzy, 1);
                array_push($arrayDalamFuzzy, 2);
                array_push($arrayDalamFuzzy, 4);
                array_push($arrayFuzzy, $arrayDalamFuzzy);
            } else if ($nilai_bobot->bobot == 3) {
                array_push($arrayDalamFuzzy, 1);
                array_push($arrayDalamFuzzy, 3);
                array_push($arrayDalamFuzzy, 5);
                array_push($arrayFuzzy, $arrayDalamFuzzy);
            } else if ($nilai_bobot->bobot == 4) {
                array_push($arrayDalamFuzzy, 2);
                array_push($arrayDalamFuzzy, 4);
                array_push($arrayDalamFuzzy, 6);
                array_push($arrayFuzzy, $arrayDalamFuzzy);
            } else if ($nilai_bobot->bobot == 5) {
                array_push($arrayDalamFuzzy, 3);
                array_push($arrayDalamFuzzy, 5);
                array_push($arrayDalamFuzzy, 7);
                array_push($arrayFuzzy, $arrayDalamFuzzy);
            } else if ($nilai_bobot->bobot == 6) {
                array_push($arrayDalamFuzzy, 4);
                array_push($arrayDalamFuzzy, 6);
                array_push($arrayDalamFuzzy, 8);
                array_push($arrayFuzzy, $arrayDalamFuzzy);
            } else if ($nilai_bobot->bobot == 7) {
                array_push($arrayDalamFuzzy, 5);
                array_push($arrayDalamFuzzy, 7);
                array_push($arrayDalamFuzzy, 9);
                array_push($arrayFuzzy, $arrayDalamFuzzy);
            } else if ($nilai_bobot->bobot == 8) {
                array_push($arrayDalamFuzzy, 6);
                array_push($arrayDalamFuzzy, 8);
                array_push($arrayDalamFuzzy, 9);
                array_push($arrayFuzzy, $arrayDalamFuzzy);
            } else if ($nilai_bobot->bobot == 9) {
                array_push($arrayDalamFuzzy, 7);
                array_push($arrayDalamFuzzy, 9);
                array_push($arrayDalamFuzzy, 9);
                array_push($arrayFuzzy, $arrayDalamFuzzy);
            }
        }
        //=============================================================================
        //=====================Menghitung Jumlah Baris Fuzzy===========================
        $total1 = 0;
        $total2 = 0;
        $total3 = 0;
        $arrayJumlah = array();

        foreach ($data['daftar_kriteria'] as $kriteria) {
            $index = 0;
            $jumlah1 = 0;
            $jumlah2 = 0;
            $jumlah3 = 0;
            $arrayDalamJumlah = array();

            foreach ($data['relasi_kriteria'] as $relasi) {
                if ($relasi->id_kriteria1 == $kriteria->ID_kriteria) {
                    $jumlah1 = $jumlah1 + $arrayFuzzy[$index][0];
                    $jumlah2 = $jumlah2 + $arrayFuzzy[$index][1];
                    $jumlah3 = $jumlah3 + $arrayFuzzy[$index][2];
                }
                $index++;
            }
            array_push($arrayDalamJumlah, $jumlah1);
            array_push($arrayDalamJumlah, $jumlah2);
            array_push($arrayDalamJumlah, $jumlah3);
            array_push($arrayJumlah, $arrayDalamJumlah);

            //Menghitung jumlah total
            $total1 = $total1 + $jumlah1;
            $total2 = $total2 + $jumlah2;
            $total3 = $total3 + $jumlah3;
        }
        //=============================================================================
        //===========================Menghitung Nilai Si===============================
        $nilai_l = 0;
        $nilai_m = 0;
        $nilai_u = 0;
        $index3 = 0;
        $arraySi = array();
        foreach ($data['daftar_kriteria'] as $kriteria) {
            $arrayDalamSi = array();
            foreach ($data['daftar_kriteria'] as $kriteria) {
                $nilai_l = $arrayJumlah[$index3][0] / $total1;
                $nilai_m = $arrayJumlah[$index3][1] / $total2;
                $nilai_u = $arrayJumlah[$index3][2] / $total3;

                $nilai_l = number_format($nilai_l, 3, '.', '');
                $nilai_m = number_format($nilai_m, 3, '.', '');
                $nilai_u = number_format($nilai_u, 3, '.', '');

                array_push($arrayDalamSi, $nilai_l);
                array_push($arrayDalamSi, $nilai_m);
                array_push($arrayDalamSi, $nilai_u);
            }
            array_push($arraySi, $arrayDalamSi);
            $index3++;
        }
        //============================================================================
        //==============================Menghitung bobot fuzzy========================
        $bobot_fuzzy = array();
        $index4 = 0;
        foreach ($data['daftar_kriteria'] as $kriteria) {

            $l = $arraySi[$index4][0];
            $m = $arraySi[$index4][1];
            $u = $arraySi[$index4][2];

            $bobot = ((($u - $l) + ($m - $l)) / 3) + $l;
            $bobot = number_format($bobot, 3, '.', '');

            array_push($bobot_fuzzy, $bobot);

            $data2['bobot'] = $bobot;
            $this->M_kriteria_kredit->update_kriteria_kredit($id, $kriteria->ID_kriteria, $data2);
            $index4++;
        }
        //============================================================================

        $data['bobot_fuzzy'] = $bobot_fuzzy;
        $data['nilai_si'] = $arraySi;
        $data['jumlah_fuzzy'] = $arrayJumlah;
        $data['total_fuzzy1'] = $total1;
        $data['total_fuzzy2'] = $total2;
        $data['total_fuzzy3'] = $total3;
        $data['nilai_fuzzy'] = $arrayFuzzy;
        $data['nilai_lamda'] = $lamda;
        $data['nilai_ci'] = $ci;
        $data['nilai_cr'] = $cr;
        $data['nilai_vector'] = $arrayVector;

        $this->load->view('pages/V_bobot_kriteria', $data);
        $this->load->view('element/footer');
    }

    public function nilaiRI($jumlah) {
        $nilai2;
        if ($jumlah == '1') {
            $nilai2 = 0;
        } else if ($jumlah == '2') {
            $nilai2 = 0;
        } else if ($jumlah == '3') {
            $nilai2 = 0.58;
        } else if ($jumlah == '4') {
            $nilai2 = 0.9;
        } else if ($jumlah == '5') {
            $nilai2 = 1.12;
        } else if ($jumlah == '6') {
            $nilai2 = 1.24;
        } else if ($jumlah == '7') {
            $nilai2 = 1.32;
        } else if ($jumlah == '8') {
            $nilai2 = 1.41;
        } else if ($jumlah == '9') {
            $nilai2 = 1.45;
        } else if ($jumlah == '10') {
            $nilai2 = 1.49;
        } else if ($jumlah == '11') {
            $nilai2 = 1.51;
        } else if ($jumlah == '12') {
            $nilai2 = 1.48;
        } else if ($jumlah == '13') {
            $nilai2 = 1.56;
        } else if ($jumlah == '14') {
            $nilai2 = 1.57;
        } else if ($jumlah == '15') {
            $nilai2 = 1.59;
        }

        return $nilai2;
    }

    public function nilaiFuzzy($nilai) {
        $nilai2;
        if ($jumlah == '1') {
            $nilai2 = 0;
        } else if ($jumlah == '2') {
            $nilai2 = 0;
        }

        return $nilai2;
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */