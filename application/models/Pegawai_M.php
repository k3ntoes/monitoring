<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pegawai_M
 *
 * @author Kent-os
 */
class Pegawai_M extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function ListPegawai() {
        $data = [];
        $this->db->select('m_usr.nip, '
                . 'm_usr.idJabatan, '
                . 'm_usr.gelar_d, '
                . 'm_usr.nama, '
                . 'm_usr.gelar_b, '
                . 'm_usr.alamat, '
                . 'm_usr.idLevel, '
                . 'm_jabatan.jabatan, '
                . 'm_level.`level`');
        $this->db->join('m_jabatan', 'ON m_usr.idJabatan = m_jabatan.idJabatan', 'inner');
        $this->db->join('m_level', 'ON m_usr.idLevel = m_level.idLevel', 'inner');
        $q = $this->db->get('m_usr');
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

    public function ListPegawaiDet($field, $val) {
        $data = [];
        $this->db->select('m_usr.nip, '
                . 'm_usr.idJabatan, '
                . 'm_usr.gelar_d, '
                . 'm_usr.nama, '
                . 'm_usr.gelar_b, '
                . 'm_usr.alamat, '
                . 'm_usr.idLevel, '
                . 'm_jabatan.jabatan, '
                . 'm_level.`level`');
        $this->db->join('m_jabatan', 'ON m_usr.idJabatan = m_jabatan.idJabatan', 'inner');
        $this->db->join('m_level', 'ON m_usr.idLevel = m_level.idLevel', 'inner');
        $this->db->where($field, $val);
        $q = $this->db->get('m_usr');
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

        $this->form_validation->set_rules("nip", "NIP", "trim|required");
        $this->form_validation->set_rules("idJabatan", "Jabatan", "trim|required");
//	  $this->form_validation->set_rules("gelar_d", "Gelar Depan", "trim|required");
        $this->form_validation->set_rules("nama", "Nama", "trim|required");
//	  $this->form_validation->set_rules("gelar_b", "Gelar Belakang", "trim|required");
        $this->form_validation->set_rules("alamat", "Alamat", "trim|required");
//	  $this->form_validation->set_rules("pswd", "Password", "trim|required");
        $this->form_validation->set_rules("idLevel", "Level", "trim|required");


        $this->form_validation->set_error_delimiters('', '');

        $nip = $this->input->post("nip");
        $idJabatan = $this->input->post("idJabatan");
        $gelar_d = $this->input->post("gelar_d");
        $nama = $this->input->post("nama");
        $gelar_b = $this->input->post("gelar_b");
        $alamat = $this->input->post("alamat");
        $pswd = $this->input->post("pswd");
        $idLevel = $this->input->post("idLevel");

        $upd = $this->input->post('upd');

        if ($this->form_validation->run() === false or $upd != 0) {
            $res = $this->ResponseModel->res400(["message" => validation_errors()]);
        } else {
            $sql = [
                "nip" => $nip,
                "idJabatan" => $idJabatan,
                "gelar_d" => $gelar_d,
                "nama" => $nama,
                "gelar_b" => $gelar_b,
                "alamat" => $alamat,
                "pswd" => base64_encode($pswd),
                "idLevel" => $idLevel
            ];
            $this->db->trans_start();
            $this->db->insert('m_usr', $sql);
            $this->db->trans_complete();

            if ($this->db->trans_status() === true) {
                $res = $this->ResponseModel->res201(["message" => "Data Berhasil Disimpan!"]);
            }
        }

        $this->session->set_flashdata('flash', json_encode($res));
        redirect('/Pegawai');
    }

    public function Update() {
        $res = [];

        $this->form_validation->set_rules("nip", "NIP", "trim|required");
        $this->form_validation->set_rules("idJabatan", "Jabatan", "trim|required");
//	  $this->form_validation->set_rules("gelar_d", "Gelar Depan", "trim|required");
        $this->form_validation->set_rules("nama", "Nama", "trim|required");
//	  $this->form_validation->set_rules("gelar_b", "Gelar Belakang", "trim|required");
        $this->form_validation->set_rules("alamat", "Alamat", "trim|required");
//	  $this->form_validation->set_rules("pswd", "Password", "trim|required");
        $this->form_validation->set_rules("idLevel", "Level", "trim|required");

        $this->form_validation->set_error_delimiters('', '');

        $nip = $this->input->post("nip");
        $idJabatan = $this->input->post("idJabatan");
        $gelar_d = $this->input->post("gelar_d");
        $nama = $this->input->post("nama");
        $gelar_b = $this->input->post("gelar_b");
        $alamat = $this->input->post("alamat");
        $pswd = $this->input->post("pswd");
        $idLevel = $this->input->post("idLevel");

        $upd = $this->input->post('upd');

        if ($this->form_validation->run === false or $upd != 1) {
            $res = $this->ResponseModel->res400(["message" => validation_errors()]);
        } else {
            $where = ["nip" => $nip];
            if ($pswd != "") {
                $sql = [
                    "idJabatan" => $idJabatan,
                    "gelar_d" => $gelar_d,
                    "nama" => $nama,
                    "gelar_b" => $gelar_b,
                    "alamat" => $alamat,
                    "pswd" => base64_encode($pswd),
                    "idLevel" => $idLevel
                ];
            } else {
                $sql = [
                    "idJabatan" => $idJabatan,
                    "gelar_d" => $gelar_d,
                    "nama" => $nama,
                    "gelar_b" => $gelar_b,
                    "alamat" => $alamat,
                    "idLevel" => $idLevel
                ];
            }
            $this->db->trans_start();
            $this->db->update('m_usr', $sql, $where);
            $this->db->trans_complete();

            if ($this->db->trans_status() === true) {
                $res = $this->ResponseModel->res201(["message" => "Data Berhasil Diupdate!"]);
            }
        }

        $this->session->set_flashdata('flash', json_encode($res));
        redirect('/Pegawai');
    }

    public function Remove($idPegawai) {
        $this->db->trans_start();
        $this->db->delete('m_usr', ['nip' => $idPegawai]);
        $this->db->trans_complete();

        if ($this->db->trans_status() === true) {
            $res = $this->ResponseModel->res201(["message" => "Data Berhasil Di Hapus!"]);
        }

        $this->session->set_flashdata('flash', json_encode($res));
        redirect('/Pegawai');
    }

}
