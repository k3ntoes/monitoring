<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Jadwal_M
 *
 * @author Kent-os
 */
class Jadwal_M extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function ListJadwal() {
        $data = [];
        $q = $this->db->get('v_jadwal');
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

    public function ListJadwalDet($idJadwal) {
        $data = [];
        $lTutor = $this->listTutorJadwal($idJadwal);
        $q = $this->db->get_where('v_jadwal', ['idJadwal' => $idJadwal]);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $d) {
                array_push($data, $d);
            }
            $res = $this->ResponseModel->res200(["data" => $data, "lTutor" => $lTutor]);
        } else {
            $res = $this->ResponseModel->res204(["data" => $data, "lTutor" => $lTutor]);
        }
        return json_encode($res);
    }

    private function listTutorJadwal($idJadwal) {
        $data = [];
        $q = $this->db->get_where('t_tutor_jadwal', ['idJadwal' => $idJadwal]);
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $d) {
                array_push($data, $d);
            }
        }
        return ['data' => $data, 'count' => $q->num_rows()];
    }

    public function Simpan() {
        $res = [];

//	  $this->form_validation->set_rules("idJadwal", "ID Jadwal", "Trim|required");
//	  $this->form_validation->set_rules("tglInput", "Tanggal Input", "Trim|required");
        $this->form_validation->set_rules("masa", "Masa", "Trim|required");
        $this->form_validation->set_rules("idPokjar", "Pokjar", "Trim|required");
        $this->form_validation->set_rules("hariLaksana", "Hari Pelaksanaan", "Trim|required");
        $this->form_validation->set_rules("tglLaksana", "Tanggal Pelaksanaan", "Trim|required");
        $this->form_validation->set_rules("nipPj", "Penanggungjawab", "Trim|required");
        $this->form_validation->set_rules("nipPemonitor", "Pemonitor", "Trim|required");

        $this->form_validation->set_error_delimiters('', '');

//	  $idJadwal = $this->input->post("idJadwal");
//	  $tglInput = $this->input->post("tglInput");
        $masa = $this->input->post("masa");
        $idPokjar = $this->input->post("idPokjar");
        $hariLaksana = $this->input->post("hariLaksana");
        $tglLaksana = $this->input->post("tglLaksana");
        $nipPj = $this->input->post("nipPj");
        $nipPemonitor = $this->input->post("nipPemonitor");
        $nipTutor = $this->input->post("nipTutor");

        $upd = $this->input->post('upd');

        if ($this->form_validation->run() === false or $upd != 0) {
            $res = $this->ResponseModel->res400(["message" => validation_errors()]);
        } else {
            print_r($nipTutor);
            $sql = [
//		    "idJadwal"=>$idJadwal,
//		    "tglInput" => $tglInput,
                "masa" => $masa,
                "idPokjar" => $idPokjar,
                "hariLaksana" => $hariLaksana,
                "tglLaksana" => $tglLaksana,
                "nipPj" => $nipPj,
                "nipPemonitor" => $nipPemonitor,
            ];

            $this->db->trans_start();
            $this->db->insert('t_jadwal', $sql);
            $inserId = $this->db->insert_id();
            $this->db->trans_complete();

            if ($this->db->trans_status() === true) {
                $sqlTutor = [
                    'idJadwal' => $inserId,
                    'nipTutor' => $nipTutor
                ];
                $this->save_tutor_jadwal($sqlTutor);
                $res = $this->ResponseModel->res201(["message" => "Data Berhasil Disimpan!"]);
            }
        }

        $this->session->set_flashdata('flash', json_encode($res));
        redirect('/Jadwal');
    }

    private function save_tutor_jadwal($sqlTutor) {
        $this->db->delete('t_tutor_jadwal', ['idJadwal' => $sqlTutor['idJadwal']]);
        echo count($sqlTutor['nipTutor']);
        if (count($sqlTutor['nipTutor']) > 0 && $sqlTutor['nipTutor'][0] != "") {
            for ($i = 0; $i < count($sqlTutor['nipTutor']); $i++) {
                $this->db->insert(
                        't_tutor_jadwal',
                        [
                            'idJadwal' => $sqlTutor['idJadwal'],
                            'nipTutor' => $sqlTutor['nipTutor'][$i]
                        ]
                );
            }
        }
    }

    public function Update() {
        $res = [];

        $this->form_validation->set_rules("idJadwal", "ID Jadwal", "Trim|required");
//        $this->form_validation->set_rules("tglInput", "Tanggal Input", "Trim|required");
        $this->form_validation->set_rules("masa", "Masa", "Trim|required");
        $this->form_validation->set_rules("idPokjar", "Pokjar", "Trim|required");
        $this->form_validation->set_rules("hariLaksana", "Hari Pelaksanaan", "Trim|required");
        $this->form_validation->set_rules("tglLaksana", "Tanggal Pelaksanaan", "Trim|required");
        $this->form_validation->set_rules("nipPj", "Penanggungjawab", "Trim|required");
        $this->form_validation->set_rules("nipPemonitor", "Pemonitor", "Trim|required");

        $this->form_validation->set_error_delimiters('', '');

        $idJadwal = $this->input->post("idJadwal");
//	  $tglInput = $this->input->post("tglInput");
        $masa = $this->input->post("masa");
        $idPokjar = $this->input->post("idPokjar");
        $hariLaksana = $this->input->post("hariLaksana");
        $tglLaksana = $this->input->post("tglLaksana");
        $nipPj = $this->input->post("nipPj");
        $nipPemonitor = $this->input->post("nipPemonitor");
        $nipTutor = $this->input->post("nipTutor");

        $upd = $this->input->post('upd');

        if ($this->form_validation->run() === false or $upd != 1) {
            $res = $this->ResponseModel->res400(["message" => validation_errors()]);
        } else {
            $where = ["idJadwal" => $idJadwal];

            $sql = [
                "masa" => $masa,
                "idPokjar" => $idPokjar,
                "hariLaksana" => $hariLaksana,
                "tglLaksana" => $tglLaksana,
                "nipPj" => $nipPj,
                "nipPemonitor" => $nipPemonitor,
            ];
            $this->db->trans_start();
            $this->db->update('t_jadwal', $sql, $where);
            $this->db->trans_complete();

            if ($this->db->trans_status() === true) {
                $sqlTutor = [
                    'idJadwal' => $idJadwal,
                    'nipTutor' => $nipTutor
                ];
                $this->save_tutor_jadwal($sqlTutor);
                $res = $this->ResponseModel->res201(["message" => "Data Berhasil Diupdate!"]);
            }
        }

        $this->session->set_flashdata('flash', json_encode($res));
        redirect('/Jadwal');
    }

    public function Remove($idJadwal) {
        $this->db->trans_start();
        $this->db->delete('t_jadwal', ['idJadwal' => $idJadwal]);
        $this->db->trans_complete();

        if ($this->db->trans_status() === true) {
            $res = $this->ResponseModel->res201(["message" => "Data Berhasil Di Hapus!"]);
        }

        $this->session->set_flashdata('flash', json_encode($res));
        redirect('/Jadwal');
    }

}
