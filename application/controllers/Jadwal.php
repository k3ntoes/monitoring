<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Jadwal
 *
 * @author Kent-os
 */
class Jadwal extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Jadwal_M');
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
            "view" => $this->parser->parse('jadwal/v_jadwal', ["flash" => $flash], TRUE)
        ];
        $this->parser->parse('template/template', $data);
    }

    public function ListJadwal() {
        echo $this->Jadwal_M->ListJadwal();
    }

    public function ListJadwalDet($idJadwal) {
        echo $this->Jadwal_M->ListJadwalDet($idJadwal);
    }

    public function Simpan() {
        $this->Jadwal_M->Simpan();
    }

    public function Update() {
        $this->Jadwal_M->Update();
    }

    public function Remove($idJadwal) {
        $this->Jadwal_M->Remove($idJadwal);
    }

}
