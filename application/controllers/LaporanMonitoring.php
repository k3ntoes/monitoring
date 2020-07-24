<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LaporanMonitoring
 *
 * @author Kent-Os
 */
class LaporanMonitoring extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('LaporanMonitoring_M');
    }

    public function index() {
        if (!$this->session->has_userdata('logged')) {
            header("Location:/Login");
        }
        $ssn = json_decode($this->session->userdata('logged'));

        $this->Auth_M->menu_cek($ssn->menu, $this->router->fetch_class());

        $flash = "none";
        if (isset($this->session->flash)) {
            $flash = $this->session->flash;
        }

        $data = [
            "appHeader" => "Monitoring Tutorial UPBJJ Purwokerto",
            "appName" => "Monitoring Tutorial",
            "appColor" => "skin-blue-light",
            "gelar_d" => $ssn->gelar_d,
            "nama" => $ssn->nama,
            "gelar_b" => $ssn->gelar_b,
            "nip" => $ssn->nip,
            "base_url" => base_url(),
            "view" => $this->parser->parse('monitoring/v_lapMonitoring', ["flash" => $flash], TRUE)
        ];
        $this->parser->parse('template/template', $data);
    }

    public function ListLaporanMonitoring() {
        $ssn = json_decode($this->session->userdata('logged'));
        echo $this->LaporanMonitoring_M->ListLaporanMonitoring($ssn->nip);
    }

    public function getData($idJadwal) {
        echo $this->LaporanMonitoring_M->ListLaporanMonitoringDet($idJadwal);
    }

    public function Simpan() {
        $this->LaporanMonitoring_M->Simpan();
    }

    public function Update() {
        $this->LaporanMonitoring_M->Update();
    }

    public function Cetak($idJadwal) {
        $res = json_decode($this->LaporanMonitoring_M->ListLaporanMonitoringDet($idJadwal));
        $d = $res->response->data[0];
        $lTutor = $res->response->data2;
        $lTutorDet = $res->response->data3;

        $data = [
            "gelar_d_pm" => $d->gelar_d_pm,
            "nama_pm" => $d->nama_pm,
            "gelar_b_pm" => $d->gelar_b_pm,
            "nip_pm" => $d->nip_pm,
            "uraian" => $d->uraian,
            "program" => $d->program,
            "kabupaten" => $d->kabupaten,
            "pokjar" => $d->pokjar,
            "alamat" => $d->alamat,
            "tglBerangkat" => $d->tglBerangkat,
            "jmlHari" => $d->jmlHari,
            "lTutor" => $lTutor,
            "lTutorDet" => $lTutorDet,
            "uraianHasil" => str_replace("\n", "<br>", $d->uraianHasil),
        ];

        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'Legal',
            'size' => 'Legal',
            'margin_left' => 18,
            'margin_right' => 5,
            'margin_top' => 5,
            'margin_bottom' => 30,
        ]);

        $html = $this->parser->parse('monitoring/cetak3', $data, TRUE);
        $mpdf->WriteHTML($html);
        $mpdf->Output();

//        $this->parser->parse('monitoring/cetak3', $data);
    }

}
