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
class Monitoring extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Monitoring_M');
        $this->load->model('Pegawai_M');
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
            "view" => $this->parser->parse('monitoring/v_monitoring', ["flash" => $flash], TRUE)
        ];
        $this->parser->parse('template/template', $data);
    }

    public function ListMonitoring() {
        $ssn = json_decode($this->session->userdata('logged'));
        echo $this->Monitoring_M->ListMonitoring($ssn->nip);
    }

    public function getData($idJadwal) {
        echo $this->Monitoring_M->ListMonitoringDet($idJadwal);
    }

    public function Simpan() {
        $this->Monitoring_M->Simpan();
    }

    public function Update() {
        $this->Monitoring_M->Update();
    }

    public function Remove($idMonitoring) {
        $this->Monitoring_M->Remove($idMonitoring);
    }

    public function Cetak($idJadwal) {
//        echo __DIR__ . '/composer/autoload_real.php';
        $res = json_decode($this->Monitoring_M->ListMonitoringDet($idJadwal));

        $d = $res->response->data[0];

        $resKa = json_decode($this->Pegawai_M->ListPegawaiDet("m_jabatan.idJabatan", 1));

        $data = [
            "kabupaten" => $d->kabupaten,
            "pokjar" => $d->pokjar,
            "alamat" => $d->alamat,
            "gelar_d_pm" => $d->gelar_d_pm,
            "nama_pm" => $d->nama_pm,
            "gelar_b_pm" => $d->gelar_b_pm,
            "nipPm" => $d->nipPm,
            "jab_pm" => $d->jab_pm,
            "hariLaksana" => $d->hariLaksana,
            "tglLaksana" => $d->tglLaksana,
            "seleksi" => explode("#", $d->seleksi),
            "persyaratan" => explode("#", $d->persyaratan),
            "kondisi" => explode("#", $d->kondisi),
            "disposisi" => $d->disposisi,
            "gelar_d_ka" => $resKa->response->data[0]->gelar_d,
            "nama_ka" => $resKa->response->data[0]->nama,
            "gelar_b_ka" => $resKa->response->data[0]->gelar_b,
            "nip_ka" => $resKa->response->data[0]->nip,
            "masa" => $d->masa,
            "kegiatan" => $d->kegiatan,
            "tglLaksana" => $d->tglLaksana,
            "jmlKelas" => $d->jmlKelas,
            "tmpt" => $d->tmpt,
            "tmpt1" => $d->tmpt1,
            "kelas" => $d->kelas,
            "kelas1" => $d->kelas1,
            "alat" => $d->alat,
            "alat1" => $d->alat1,
            "bahan" => $d->bahan,
            "bahan1" => $d->bahan1,
            "jadwal" => $d->jadwal,
            "jadwal1" => $d->jadwal1,
            "tepatWkt" => $d->tepatWkt,
            "tepatWkt1" => $d->tepatWkt1,
            "sTugas" => $d->sTugas,
            "sTugas1" => $d->sTugas1,
            "rat" => $d->rat,
            "rat1" => $d->rat1,
            "catatan" => $d->catatan,
            "catatan1" => $d->catatan1,
            "jmlMhs" => $d->jmlMhs,
            "jmlMhs1" => $d->jmlMhs1,
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

        $html1 = $this->parser->parse('monitoring/cetak1', $data, TRUE);
        $html2 = $this->parser->parse('monitoring/cetak2', $data, TRUE);
        $mpdf->WriteHTML($html1);
        $mpdf->WriteHTML($html2);
        $mpdf->Output();
//        $this->parser->parse('monitoring/cetak2', $data);
    }

}
