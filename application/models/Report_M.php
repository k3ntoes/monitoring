<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Report_M
 *
 * @author Kent-os
 */
class Report_M extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function listMasa() {
        $data = [];
        $this->db->select('t_jadwal.masa');
        $this->db->group_by('t_jadwal.masa');
        $this->db->order_by('t_jadwal.masa', 'DESC');
        $q = $this->db->get('t_jadwal');
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

    public function ReportMonitoring($masa) {
        $data = [];
        $this->db->select('t_jadwal.masa, '
                . 't_jadwal.nipPemonitor, '
                . 'm_usr.gelar_d, '
                . 'm_usr.nama, '
                . 'm_usr.gelar_b, '
                . 'm_pokjar.pokjar, '
                . 't_jadwal.hariLaksana, '
                . 't_jadwal.tglLaksana, '
                . 'm_pokjar.alamat, '
                . 't_bukti.sppd, '
                . 't_bukti.bap, '
                . 't_bukti.st');
        $this->db->join('t_monitoring', 't_monitoring.idJadwal = t_jadwal.idJadwal', 'inner');
        $this->db->join('m_usr', 't_jadwal.nipPemonitor = m_usr.nip', 'inner');
        $this->db->join('m_pokjar', 't_jadwal.idPokjar = m_pokjar.idPokjar', 'inner');
        $this->db->join('t_bukti', 't_jadwal.idJadwal = t_bukti.idJadwal', 'inner');
        $q = $this->db->get_where('t_jadwal', ['t_jadwal.masa' => $masa]);
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

    public function ReportHasil($masa) {
        $data = [];
        $this->db->select('t_jadwal.masa, '
                . 't_jadwal.hariLaksana, '
                . 't_jadwal.tglLaksana, '
                . 'm_pokjar.nip, '
                . 'm_pokjar.namaPengurus,'
                . 'm_pokjar.pokjar, '
                . 'm_pokjar.alamat, '
                . 'm_pokjar.kabupaten, '
                . '( t_monitoring2.tmpt + '
                . 't_monitoring2.kelas + '
                . 't_monitoring2.alat + '
                . 't_monitoring2.bahan + '
                . 't_monitoring2.jadwal + '
                . 't_monitoring2.tepatWkt + '
                . 't_monitoring2.sTugas + '
                . 't_monitoring2.rat + '
                . 't_monitoring2.catatan + '
                . 't_monitoring2.jmlMhs ) AS stat');
        $this->db->join('t_monitoring2', 't_jadwal.idJadwal = t_monitoring2.idJadwal', 'inner');
        $this->db->join('m_usr', 't_jadwal.nipPemonitor = m_usr.nip', 'inner');
        $this->db->join('m_pokjar', 't_jadwal.idPokjar = m_pokjar.idPokjar', 'inner');
        $q = $this->db->get_where('t_jadwal', ['t_jadwal.masa' => $masa]);
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

    public function ReportPetugas($masa) {
        $data = [];
        $this->db->select('t_jadwal.masa, '
                . 't_jadwal.nipPemonitor, '
                . 'm_usr.gelar_d, m_usr.nama, '
                . 'm_usr.gelar_b, '
                . 't_jadwal.hariLaksana, '
                . 't_jadwal.tglLaksana');
        $this->db->join('t_monitoring', 't_jadwal.idJadwal = t_monitoring.idJadwal', 'inner');
        $this->db->join('m_usr', 't_jadwal.nipPemonitor = m_usr.nip', 'inner');
        $q = $this->db->get_where('t_jadwal', ['t_jadwal.masa' => $masa]);
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

}
