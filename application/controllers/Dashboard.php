<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dashboard
 *
 * @author Kent-os
 */
class Dashboard extends CI_Controller {

    public function __construct() {
	  parent::__construct();
    }

    public function index() {
	  if (!$this->session->has_userdata('logged')) {
		header("Location:/Login");
	  }
	  $ssn = json_decode($this->session->userdata('logged'));
	  $data = [
		"appHeader" => "Monitoring Tutorial UPBJJ Purwokerto",
		"appName" => "Monitoring Tutorial",
		"appColor" => "skin-blue-light",
		"gelar_d" => $ssn->gelar_d,
		"nama" => $ssn->nama,
		"gelar_b" => $ssn->gelar_b,
		"nip" => $ssn->nip,
		"base_url" => base_url(),
		"view"=>""
	  ];
	  $this->parser->parse('template/template', $data);
    }

}
