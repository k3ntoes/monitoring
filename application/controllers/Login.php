<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author Kent-os
 */
class Login extends CI_Controller {

    public function __construct() {
	  parent::__construct();
    }

    public function index() {
	  if ($this->session->has_userdata('logged')) {
		redirect(base_url());
	  } else {
		$flash = "null";
		if (isset($this->session->flash)) {
		    $flash = $this->session->flash;
		}
		$data = ["flash" => $flash];
		$this->parser->parse('template/Login', $data);
	  }
    }

    public function DoLogin() {
	  $nip = $this->input->post('t_nip');
	  $pswd = base64_encode($this->input->post('t_pswd'));
	  $res = [];
	  $sesData=[];
//        $this->db->select("v_pegawai.nip, v_pegawai.gelar_d, v_pegawai.nama, v_pegawai.gelar_b, v_pegawai.stat_pns, v_pegawai.pswd");
	  $this->db->where(["m_usr.nip" => $nip]);
	  $q = $this->db->get('m_usr');
//	echo $this->db->last_query();
	  if ($q->num_rows() == 1) {
		foreach ($q->result() as $d) {
		    $this->db->select('menu');
		    $lm = $this->db->get_where('m_menu', ['idLevel' => $d->idLevel]);
		    $m = [];
		    foreach ($lm->result() as $dm) {
			  array_push($m, $dm->menu);
		    }
		    if ($d->pswd == $pswd) {
			  $sesData = [
				'logged' => json_encode([
				    'nip' => $d->nip,
				    'idJabatan' => $d->idJabatan,
				    'gelar_d' => $d->gelar_d,
				    'nama' => $d->nama,
				    'gelar_b' => $d->gelar_b,
				    'alamat' => $d->alamat,
				    'idLevel' => $d->idLevel,
				    'menu' => $m
				])
			  ];
			  $this->session->set_userdata($sesData);
			  $res = $this->ResponseModel->res200(["message" => "Login Berhasil!"]);
		    } else {
			  $res = $this->ResponseModel->res204(['message' => 'user / password tidak ditemukan!']);
		    }
		}
	  } else {
		$res = $this->ResponseModel->res204(['message' => 'user / password tidak ditemukan!']);
	  }
//	  print_r($sesData);
	  $this->session->set_flashdata('flash', json_encode($res));
	  header("Location:/Login");
    }

    public function DoLogout() {
	  $this->session->sess_destroy();
	  if ($this->session->has_userdata('logged')) {
		print_r($this->session->logged); //
		print_r($this->session->userdata());
	  } else {
		echo 'Tidak Ada Session';
	  }
	  redirect(base_url());
    }

}
