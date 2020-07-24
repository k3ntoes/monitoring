<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UploadBuktiMonitoring_M
 *
 * @author kentoes
 */
class UploadBuktiMonitoring_M extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->library('upload');
    }

    public function ListUploadBuktiMonitoring($nip) {
        $data = [];
        $this->db->select('t_jadwal.idJadwal, '
                . 't_jadwal.tglInput, '
                . 't_jadwal.masa,'
                . 'm_pokjar.kabupaten, '
                . 'm_pokjar.pokjar, '
                . 'm_pokjar.nip AS nipPengurus, '
                . 'm_pokjar.namaPengurus, '
                . 'm_pokjar.alamat, '
                . 't_jadwal.nipPemonitor AS nipPm, '
                . 'pemonitor.gelar_d AS gelar_d_pm, '
                . 'pemonitor.nama AS nama_pm, '
                . 'pemonitor.gelar_b AS gelar_b_pm, '
                . 'm_jabatan.jabatan AS jab_pm, '
                . 't_jadwal.hariLaksana, '
                . 'DATE_FORMAT(t_jadwal.tglLaksana,"%d-%m-%Y") AS tglLaksana, '
                . 't_monitoring.idJadwal AS idJadwalMonitoring, '
                . 't_monitoring.seleksi, '
                . 't_monitoring.persyaratan, '
                . 't_monitoring.kondisi, '
                . 't_jadwal.nipPj AS nipPj, '
                . 'penanggungjawab.gelar_d AS gelar_d_pj, '
                . 'penanggungjawab.nama AS nama_pj, '
                . 'penanggungjawab.gelar_b AS gelar_b_pj, '
                . 'jabPJ.jabatan AS jab_pj, '
                . 't_bukti.sppd, '
                . 't_bukti.bap, '
                . 't_bukti.st, '
                . 'IF( ISNULL(t_bukti.idJadwal),0,1 ) AS selesai');
        $this->db->join('m_pokjar', 't_jadwal.idPokjar = m_pokjar.idPokjar', 'INNER');
        $this->db->join('m_usr', 't_jadwal.nipPemonitor = m_usr.nip', 'INNER');
        $this->db->join('m_jabatan', 'm_usr.idJabatan = m_jabatan.idJabatan', 'INNER');
        $this->db->join('t_monitoring', 't_monitoring.idJadwal = t_jadwal.idJadwal', 'INNER');
        $this->db->join('m_usr AS pemonitor', 't_jadwal.nipPemonitor = pemonitor.nip', 'INNER');
        $this->db->join('m_usr AS penanggungjawab', 't_jadwal.nipPj = penanggungjawab.nip', 'INNER');
        $this->db->join('m_jabatan AS jabPJ', 'penanggungjawab.idJabatan = jabPJ.idJabatan', 'INNER');
        $this->db->join('t_laporanMonitoring', 't_monitoring.idJadwal = t_laporanMonitoring.idJadwal', 'INNER');
        $this->db->join('t_bukti', 't_laporanMonitoring.idJadwal = t_bukti.idJadwal', 'LEFT');
        $this->db->where('t_jadwal.nipPemonitor', $nip);
        $q = $this->db->get('t_jadwal');
//        echo $this->db->last_query();
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

    public function ListUploadBuktiMonitoringDet($idJadwal) {
        $data = [];

        $this->db->select("t_jadwal.idJadwal, "
                . "m_pokjar.pokjar, "
                . "m_pokjar.kabupaten, "
                . "m_usr.gelar_d, "
                . "m_usr.nama, m_usr.gelar_b, "
                . "t_jadwal.hariLaksana, "
                . "t_jadwal.tglLaksana, "
                . "t_bukti.sppd, "
                . "t_bukti.bap, "
                . "t_bukti.st, "
                . "IF ( ISNULL(t_bukti.idJadwal), 0, 1 ) AS selesai");
        $this->db->join('m_pokjar', 't_jadwal.idPokjar = m_pokjar.idPokjar', 'INNER');
        $this->db->join('m_usr', 't_jadwal.nipPemonitor = m_usr.nip', 'INNER');
        $this->db->join('t_laporanMonitoring', 't_jadwal.idJadwal = t_laporanMonitoring.idJadwal', 'INNER');
        $this->db->join('t_bukti', 't_laporanMonitoring.idJadwal = t_bukti.idJadwal', 'LEFT');
        $q = $this->db->get_where('t_jadwal', ['t_jadwal.idJadwal' => $idJadwal]);
//        echo $this->db->last_query();

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

        $this->form_validation->set_rules("idJadwal", "ID Jadwal", "trim|required");

        $this->form_validation->set_error_delimiters('', '');

        $idJadwal = $this->input->post('idJadwal');

        $upSppd = $this->do_up('sppd', $idJadwal);
        $sppd = $upSppd['upload_data']['file_name'];
        $upBap = $this->do_up('bap', $idJadwal);
        $bap = $upBap['upload_data']['file_name'];
        $upSt = $this->do_up('st', $idJadwal);
        $st = $upSt['upload_data']['file_name'];


        $sql = [
            "idJadwal" => $idJadwal,
            "sppd" => $sppd,
            "bap" => $bap,
            "st" => $st,
        ];

        if ($this->form_validation->run() === false) {
            $res = $this->ResponseModel->res400(["message" => validation_errors()]);
        } else {
            $res = $this->do_simpan($sql);
        }

        print_r($res);

        $this->session->set_flashdata('flash', json_encode($res));
        redirect('/UploadBuktiMonitoring');
    }

    private function do_up($field_name, $idJadwal) {
        $res = [];

        $config['upload_path'] = './asset/uploads/';
        $config['allowed_types'] = 'pdf|jpg|png';
        $config['file_name'] = $field_name . "_" . $idJadwal;
        $config['max_size'] = 100;
        $config['overwrite'] = TRUE;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload($field_name)) {
            $res = array('status' => 0, 'error' => $this->upload->display_errors());
        } else {
            $res = array('status' => 1, 'upload_data' => $this->upload->data());
        }

        return $res;
    }

    private function do_simpan($sql) {
//        $this->cekData($sql['idJadwal']);
        $this->db->trans_start();
        if ($this->cekData($sql['idJadwal']) == 0) {
            $this->db->insert('t_bukti', $sql);
        } else {
            $this->db->update('t_bukti', $sql, ['idJadwal' => $sql['idJadwal']]);
        }
        $this->db->trans_complete();

        if ($this->db->trans_status() === true) {
            $res = $this->ResponseModel->res201(["message" => "Data Berhasil Disimpan!"]);
        }

        return $res;
    }

    private function cekData($idJadwal) {
        $q = $this->db->get_where('t_bukti', ["idJadwal" => $idJadwal]);

        return $q->num_rows();
    }

}
