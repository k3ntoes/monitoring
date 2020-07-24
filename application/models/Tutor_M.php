<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tutor_M
 *
 * @author Kent-os
 */
class Tutor_M extends CI_Model {

    public function __construct() {
	  parent::__construct();
    }

    public function ListTutor() {
	  $data = [];
	  $q = $this->db->get('m_tutor');
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

	  $this->form_validation->set_rules("idTutor", "ID Tutor", "trim|required");
	  $this->form_validation->set_rules("nip", "NIP", "trim|required");
	  $this->form_validation->set_rules("gelar_d", "Gelar Depan", "trim|required");
	  $this->form_validation->set_rules("nama", "Nama", "trim|required");
	  $this->form_validation->set_rules("gelar_b", "Gelar Belakang", "trim|required");
	  $this->form_validation->set_rules("alamat", "Alamat", "trim|required");
	  $this->form_validation->set_rules("telp", "Telepon", "trim|required");

	  $this->form_validation->set_error_delimiters('', '');

	  $idTutor = $this->input->post("idTutor");
	  $nip = $this->input->post("nip");
	  $gelar_d = $this->input->post("gelar_d");
	  $nama = $this->input->post("nama");
	  $gelar_b = $this->input->post("gelar_b");
	  $alamat = $this->input->post("alamat");
	  $telp = $this->input->post("telp");
	  $upd = $this->input->post('upd');

	  if ($this->form_validation->run === false or $upd != 0) {
		$res = $this->ResponseModel->res400(["message" => validation_errors()]);
	  } else {
		$sql = [
		    "nip" => $nip,
		    "gelar_d" => $gelar_d,
		    "nama" => $nama,
		    "gelar_b" => $gelar_b,
		    "alamat" => $alamat,
		    "telp" => $telp
		];
		$this->db->trans_start();
		$this->db->insert('m_tutor', $sql);
		$this->db->trans_complete();

		if ($this->db->trans_status() === true) {
		    $res = $this->ResponseModel->res201(["message" => "Data Berhasil Disimpan!"]);
		}
	  }

	  $this->session->set_flashdata('flash', json_encode($res));
	  redirect('/Tutor');
    }

    public function Update() {
	  $res = [];

	  $this->form_validation->set_rules("idTutor", "ID Tutor", "trim|required");
	  $this->form_validation->set_rules("nip", "NIP", "trim|required");
	  $this->form_validation->set_rules("gelar_d", "Gelar Depan", "trim|required");
	  $this->form_validation->set_rules("nama", "Nama", "trim|required");
	  $this->form_validation->set_rules("gelar_b", "Gelar Belakang", "trim|required");
	  $this->form_validation->set_rules("alamat", "Alamat", "trim|required");
	  $this->form_validation->set_rules("telp", "Telepon", "trim|required");

	  $this->form_validation->set_error_delimiters('', '');

	  $idTutor = $this->input->post("idTutor");
	  $nip = $this->input->post("nip");
	  $gelar_d = $this->input->post("gelar_d");
	  $nama = $this->input->post("nama");
	  $gelar_b = $this->input->post("gelar_b");
	  $alamat = $this->input->post("alamat");
	  $telp = $this->input->post("telp");
	  $upd = $this->input->post('upd');

	  if ($this->form_validation->run === false or $upd != 1) {
		$res = $this->ResponseModel->res400(["message" => validation_errors()]);
	  } else {
		$where = ["idTutor" => $idTutor];
		$sql = [
		    "nip" => $nip,
		    "gelar_d" => $gelar_d,
		    "nama" => $nama,
		    "gelar_b" => $gelar_b,
		    "alamat" => $alamat,
		    "telp" => $telp
		];
		$this->db->trans_start();
		$this->db->update('m_tutor', $sql, $where);
		$this->db->trans_complete();

		if ($this->db->trans_status() === true) {
		    $res = $this->ResponseModel->res201(["message" => "Data Berhasil Diupdate!"]);
		}
	  }

	  $this->session->set_flashdata('flash', json_encode($res));
	  redirect('/Tutor');
    }

    public function Remove($idTutor) {
	  $this->db->trans_start();
	  $this->db->delete('m_tutor', ['idTutor' => $idTutor]);
	  $this->db->trans_complete();

	  if ($this->db->trans_status() === true) {
		$res = $this->ResponseModel->res201(["message" => "Data Berhasil Di Hapus!"]);
	  }

	  $this->session->set_flashdata('flash', json_encode($res));
	  redirect('/Tutor');
    }

}
