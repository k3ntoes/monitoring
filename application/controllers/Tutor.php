<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tutor
 *
 * @author Kent-os
 */
class Tutor extends CI_Controller{
    
    public function __construct() {
	  parent::__construct();
	  $this->load->model('Tutor_M');
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
		"view" => $this->parser->parse('tutor/v_tutor', ["flash" => $flash], TRUE)
	  ];
	  $this->parser->parse('template/template', $data);
    }

    public function ListTutor() {
	  echo $this->Tutor_M->ListTutor();
    }

    public function Simpan() {
	  $this->Tutor_M->Simpan();
    }

    public function Update() {
	  $this->Tutor_M->Update();
    }

    public function Remove($idTutor) {
	  $this->Tutor_M->Remove($idTutor);
    }

}
