<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Monitoring
 *
 * @author Kent-os
 */
class Report extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Report_M');
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
            "appHeader" => "Laporan Monitoring Tutorial UPBJJ Purwokerto",
            "appName" => "Monitoring Tutorial",
            "appColor" => "skin-blue-light",
            "gelar_d" => $ssn->gelar_d,
            "nama" => $ssn->nama,
            "gelar_b" => $ssn->gelar_b,
            "nip" => $ssn->nip,
            "base_url" => base_url(),
            "view" => $this->parser->parse('report/v_monitoring', ["flash" => $flash], TRUE)
        ];
        $this->parser->parse('template/template', $data);
    }

    public function ListMasa() {
        echo $this->Report_M->listMasa();
    }

    public function ListMonitoring($masa) {
        echo $this->Report_M->ReportMonitoring($masa);
    }

    public function CetakListMonitoring($masa) {
        $res = json_decode($this->Report_M->ReportMonitoring($masa));
        $data = [
            "data" => $res->response->data
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

        $html = $this->parser->parse('report/cetak_monitoring', $data, TRUE);
        $mpdf->WriteHTML($html);
        $mpdf->Output();

//        $this->parser->parse('report/cetak_monitoring', $data);
    }

    public function hasil() {
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
            "appHeader" => "Laporan Hasil Monitoring Tutorial UPBJJ Purwokerto",
            "appName" => "Monitoring Tutorial",
            "appColor" => "skin-blue-light",
            "gelar_d" => $ssn->gelar_d,
            "nama" => $ssn->nama,
            "gelar_b" => $ssn->gelar_b,
            "nip" => $ssn->nip,
            "base_url" => base_url(),
            "view" => $this->parser->parse('report/v_hasil', ["flash" => $flash], TRUE)
        ];
        $this->parser->parse('template/template', $data);
    }

    public function ListHasil($masa) {
        echo $this->Report_M->ReportHasil($masa);
    }

    public function CetakListHasil($masa) {
        $res = json_decode($this->Report_M->ReportHasil($masa));
        $data = [
            "data" => $res->response->data
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

        $html = $this->parser->parse('report/cetak_hasil', $data, TRUE);
        $mpdf->WriteHTML($html);
        $mpdf->Output();

//        $this->parser->parse('report/cetak_monitoring', $data);
    }

    public function petugas() {
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
            "appHeader" => "Laporan Petugas Monitoring Tutorial UPBJJ Purwokerto",
            "appName" => "Monitoring Tutorial",
            "appColor" => "skin-blue-light",
            "gelar_d" => $ssn->gelar_d,
            "nama" => $ssn->nama,
            "gelar_b" => $ssn->gelar_b,
            "nip" => $ssn->nip,
            "base_url" => base_url(),
            "view" => $this->parser->parse('report/v_petugas', ["flash" => $flash], TRUE)
        ];
        $this->parser->parse('template/template', $data);
    }

    public function ListPetugas($masa) {
        echo $this->Report_M->ReportPetugas($masa);
    }

    public function CetakListPetugas($masa) {
        $res = json_decode($this->Report_M->ReportPetugas($masa));
        $data = [
            "data" => $res->response->data
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

        $html = $this->parser->parse('report/cetak_petugas', $data, TRUE);
        $mpdf->WriteHTML($html);
        $mpdf->Output();

//        $this->parser->parse('report/cetak_monitoring', $data);
    }

}
