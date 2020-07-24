<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pokjar_M
 *
 * @author Kent-os
 */
class Pokjar_M extends CI_Model {

    public function __construct() {
	  parent::__construct();
    }

    public function ListPokjar() {
	  $data = [];
	  $q = $this->db->get('m_pokjar');
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

	  $this->form_validation->set_rules("pokjar", "Pokjar", "trim|required");
	  $this->form_validation->set_rules("nip", "NIP", "trim|required");
	  $this->form_validation->set_rules("namaPengurus", "Nama Petugas", "trim|required");
	  $this->form_validation->set_rules("telp", "Telp/HP", "trim|required");
	  $this->form_validation->set_rules("alamat", "Alamat", "trim|required");
	  $this->form_validation->set_rules("kabupaten", "Kabupaten", "trim|required");

	  $this->form_validation->set_error_delimiters('', '');

	  $pokjar = $this->input->post("pokjar");
	  $nip = $this->input->post("nip");
	  $namaPengurus = $this->input->post("namaPengurus");
	  $telp = $this->input->post("telp");
	  $alamat = $this->input->post("alamat");
	  $kabupaten = $this->input->post("kabupaten");
	  $upd = $this->input->post('upd');

	  if ($this->form_validation->run === false or $upd != 0) {
		$res = $this->ResponseModel->res400(["message" => validation_errors()]);
	  } else {
		$sql = [
		    "pokjar" => $pokjar,
		    "nip" => $nip,
		    "namaPengurus" => $namaPengurus,
		    "telp" => $telp,
		    "alamat" => $alamat,
		    "kabupaten" => $kabupaten,
		];
		$this->db->trans_start();
		$this->db->insert('m_pokjar', $sql);
		$this->db->trans_complete();

		if ($this->db->trans_status() === true) {
		    $res = $this->ResponseModel->res201(["message" => "Data Berhasil Disimpan!"]);
		}
	  }

	  $this->session->set_flashdata('flash', json_encode($res));
	  redirect('/Pokjar');
    }

    public function Update() {
	  $res = [];

	  $this->form_validation->set_rules("idPokjar", "ID Pokjar", "trim|required");
	  $this->form_validation->set_rules("pokjar", "Pokjar", "trim|required");
	  $this->form_validation->set_rules("nip", "NIP", "trim|required");
	  $this->form_validation->set_rules("namaPengurus", "Nama Petugas", "trim|required");
	  $this->form_validation->set_rules("telp", "Telp/HP", "trim|required");
	  $this->form_validation->set_rules("alamat", "Alamat", "trim|required");
	  $this->form_validation->set_rules("kabupaten", "Kabupaten", "trim|required");

	  $this->form_validation->set_error_delimiters('', '');

	  $idPokjar = $this->input->post("idPokjar");
	  $pokjar = $this->input->post("pokjar");
	  $nip = $this->input->post("nip");
	  $namaPengurus = $this->input->post("namaPengurus");
	  $telp = $this->input->post("telp");
	  $alamat = $this->input->post("alamat");
	  $kabupaten = $this->input->post("kabupaten");
	  $upd = $this->input->post('upd');

	  if ($this->form_validation->run === false or $upd != 1) {
		$res = $this->ResponseModel->res400(["message" => validation_errors()]);
	  } else {
		$where = ["idPokjar" => $idPokjar];
		$sql = [
		    "pokjar" => $pokjar,
		    "nip" => $nip,
		    "namaPengurus" => $namaPengurus,
		    "telp" => $telp,
		    "alamat" => $alamat,
		    "kabupaten" => $kabupaten,
		];
		$this->db->trans_start();
		$this->db->update('m_pokjar', $sql, $where);
		$this->db->trans_complete();

		if ($this->db->trans_status() === true) {
		    $res = $this->ResponseModel->res201(["message" => "Data Berhasil Diupdate!"]);
		}
	  }

	  $this->session->set_flashdata('flash', json_encode($res));
	  redirect('/Pokjar');
    }

    public function Remove($idPokjar) {
	  $this->db->trans_start();
	  $this->db->delete('m_pokjar', ['idPokjar' => $idPokjar]);
	  $this->db->trans_complete();

	  if ($this->db->trans_status() === true) {
		$res = $this->ResponseModel->res201(["message" => "Data Berhasil Di Hapus!"]);
	  }

	  $this->session->set_flashdata('flash', json_encode($res));
	  redirect('/Pokjar');
    }

}
