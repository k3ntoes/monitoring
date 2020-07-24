<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Level_ M
 *
 * @author Kent-os
 */
class Level_M extends CI_Model {

    public function __construct() {
	  parent::__construct();
    }

    public function ListLevel() {
	  $data = [];
	  $q = $this->db->get('m_level');
	  if ($q->num_rows() > 0) {
		foreach ($q->result() as $d) {
		    array_push($data, $d);
		}
		$res = $this->ResponseModel->res200(["data" => $data]);
	  } else {
		$res = $this->ResponseModel->res204(["data" => $data]);
	  }
	  return json_encode($res);
    }

    public function Simpan() {
	  $res = [];

	  $this->form_validation->set_rules('idLevel', 'ID Level', 'trim|required');
	  $this->form_validation->set_rules('level', 'Level', 'trim|required');

	  $this->form_validation->set_error_delimiters('', '');

	  $idLevel = $this->input->post('idLevel');
	  $level = $this->input->post('level');
	  $upd = $this->input->post('upd');

	  if ($this->form_validation->run === false or $upd != 0) {
		$res = $this->ResponseModel->res400(["message" => validation_errors()]);
	  } else {
		$this->db->trans_start();
		$this->db->insert('m_level', ['idLevel' => $idLevel, 'level' => $level]);
		$this->db->trans_complete();

		if ($this->db->trans_status() === true) {
		    $res = $this->ResponseModel->res201(["message" => "Data Berhasil Disimpan!"]);
		}
	  }

	  $this->session->set_flashdata('flash', json_encode($res));
	  redirect('/Level');
    }

    public function Update() {
	  $res = [];

	  $this->form_validation->set_rules('idLevel', 'ID Level', 'trim|required');
	  $this->form_validation->set_rules('level', 'Level', 'trim|required');

	  $this->form_validation->set_error_delimiters('', '');

	  $idLevel = $this->input->post('idLevel');
	  $level = $this->input->post('level');
	  $upd = $this->input->post('upd');

	  if ($this->form_validation->run === false or $upd != 1) {
		$res = $this->ResponseModel->res400(["message" => validation_errors()]);
	  } else {
		$this->db->trans_start();
		$this->db->update('m_level', ['level' => $level], ['idLevel' => $idLevel]);
		$this->db->trans_complete();

		if ($this->db->trans_status() === true) {
		    $res = $this->ResponseModel->res201(["message" => "Data Berhasil Diupdate!"]);
		}
	  }

	  $this->session->set_flashdata('flash', json_encode($res));
	  redirect('/Level');
    }

    public function Remove($idLevel) {
	  $this->db->trans_start();
	  $this->db->delete('m_level', ['idLevel' => $idLevel]);
	  $this->db->trans_complete();

	  if ($this->db->trans_status() === true) {
		$res = $this->ResponseModel->res201(["message" => "Data Berhasil Di Hapus!"]);
	  }

	  $this->session->set_flashdata('flash', json_encode($res));
	  redirect('/Level');
    }

}
