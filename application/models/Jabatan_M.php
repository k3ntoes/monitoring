<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Jabatan_M
 *
 * @author Kent-os
 */
class Jabatan_M extends CI_Model {

    public function __construct() {
	  parent::__construct();
    }

    public function ListJabatan() {
	  $data = [];
	  $q = $this->db->get('m_jabatan');
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

	  $this->form_validation->set_rules('idJabatan', 'ID Jabatan', 'trim|required');
	  $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');

	  $this->form_validation->set_error_delimiters('', '');

	  $idJabatan = $this->input->post('idJabatan');
	  $jabatan = $this->input->post('jabatan');
	  $upd = $this->input->post('upd');

	  if ($this->form_validation->run === false or $upd != 0) {
		$res = $this->ResponseModel->res400(["message" => validation_errors()]);
	  } else {
		$this->db->trans_start();
		$this->db->insert('m_jabatan', ['idJabatan' => $idJabatan, 'jabatan' => $jabatan]);
		$this->db->trans_complete();

		if ($this->db->trans_status() === true) {
		    $res = $this->ResponseModel->res201(["message" => "Data Berhasil Disimpan!"]);
		}
	  }

	  $this->session->set_flashdata('flash', json_encode($res));
	  redirect('/Jabatan');
    }

    public function Update() {
	  $res = [];

	  $this->form_validation->set_rules('idJabatan', 'ID Jabatan', 'trim|required');
	  $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');

	  $this->form_validation->set_error_delimiters('', '');

	  $idJabatan = $this->input->post('idJabatan');
	  $jabatan = $this->input->post('jabatan');
	  $upd = $this->input->post('upd');

	  if ($this->form_validation->run === false or $upd != 1) {
		$res = $this->ResponseModel->res400(["message" => validation_errors()]);
	  } else {
		$this->db->trans_start();
		$this->db->update('m_jabatan', ['jabatan' => $jabatan], ['idJabatan' => $idJabatan]);
		$this->db->trans_complete();

		if ($this->db->trans_status() === true) {
		    $res = $this->ResponseModel->res201(["message" => "Data Berhasil Diupdate!"]);
		}
	  }

	  $this->session->set_flashdata('flash', json_encode($res));
	  redirect('/Jabatan');
    }

    public function Remove($idJabatan) {
	  $this->db->trans_start();
	  $this->db->delete('m_jabatan', ['idJabatan' => $idJabatan]);
	  $this->db->trans_complete();

	  if ($this->db->trans_status() === true) {
		$res = $this->ResponseModel->res201(["message" => "Data Berhasil Di Hapus!"]);
	  }
	  
	  $this->session->set_flashdata('flash', json_encode($res));
	  redirect('/Jabatan');
    }

}
