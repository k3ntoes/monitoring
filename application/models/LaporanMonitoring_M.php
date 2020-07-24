<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LaporanMonitoring_M
 *
 * @author Kent-Os
 */
class LaporanMonitoring_M extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function ListLaporanMonitoring($nip) {
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
                . 'IF( ISNULL(t_laporanMonitoring.idJadwal),0,1 ) AS selesai');
        $this->db->join('m_pokjar', 't_jadwal.idPokjar = m_pokjar.idPokjar', 'INNER');
        $this->db->join('m_usr', 't_jadwal.nipPemonitor = m_usr.nip', 'INNER');
        $this->db->join('m_jabatan', 'm_usr.idJabatan = m_jabatan.idJabatan', 'INNER');
        $this->db->join('t_monitoring', 't_monitoring.idJadwal = t_jadwal.idJadwal', 'INNER');
        $this->db->join('m_usr AS pemonitor', 't_jadwal.nipPemonitor = pemonitor.nip', 'INNER');
        $this->db->join('m_usr AS penanggungjawab', 't_jadwal.nipPj = penanggungjawab.nip', 'INNER');
        $this->db->join('m_jabatan AS jabPJ', 'penanggungjawab.idJabatan = jabPJ.idJabatan', 'INNER');
        $this->db->join('t_laporanMonitoring', 't_monitoring.idJadwal = t_laporanMonitoring.idJadwal', 'LEFT');
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

    public function ListLaporanMonitoringDet($idJadwal) {
        $data = [];
        $data2 = [];
        $data3 = [];

        $this->db->select("t_jadwal.idJadwal, "
                . "monit.nip AS nip_pm, "
                . "monit.gelar_d AS gelar_d_pm, "
                . "monit.nama AS nama_pm, "
                . "monit.gelar_b AS gelar_b_pm, "
                . "m_pokjar.pokjar, "
                . "m_pokjar.alamat, "
                . "m_pokjar.kabupaten, "
                . "IF ( ISNULL( t_laporanMonitoring.idJadwal ), t_monitoring2.kegiatan, t_laporanMonitoring.uraian) AS uraian, "
                . "t_laporanMonitoring.program, "
                . "t_laporanMonitoring.tglBerangkat, "
                . "t_laporanMonitoring.jmlHari, "
                . "t_laporanMonitoring.uraianHasil, "
                . "IF ( ISNULL( t_laporanMonitoring.idJadwal ), 0, 1 ) AS selesai");
        $this->db->join('t_monitoring2', 't_jadwal.idJadwal = t_monitoring2.idJadwal', 'INNER');
        $this->db->join('m_usr AS monit', 't_jadwal.nipPemonitor = monit.nip', 'INNER');
        $this->db->join('m_pokjar', 't_jadwal.idPokjar = m_pokjar.idPokjar', 'INNER');
        $this->db->join('t_laporanMonitoring', 't_jadwal.idJadwal = t_laporanMonitoring.idJadwal', 'LEFT');
        $q = $this->db->get_where('t_jadwal', ['t_jadwal.idJadwal' => $idJadwal]);
//        echo $this->db->last_query();

        if ($q->num_rows() > 0) {
            foreach ($q->result() as $d) {
                array_push($data, $d);
            }
            $this->db->select('t_tutor_jadwal.nipTutor,'
                    . ' m_tutor.gelar_d, m_tutor.nama, '
                    . 'm_tutor.gelar_b');
            $this->db->join('m_tutor', 't_tutor_jadwal.nipTutor = m_tutor.nip', 'INNER');
            $this->db->order_by("t_tutor_jadwal.id", "ASC");
            $q2 = $this->db->get_where('t_tutor_jadwal', ['t_tutor_jadwal.idJadwal' => $idJadwal]);
//            echo $this->db->last_query();
            foreach ($q2->result() as $d2) {
                array_push($data2, $d2);
            }
            $this->db->select('t_laporanMonitoring2.nipTutor, '
                    . 't_laporanMonitoring2.rat, '
                    . 't_laporanMonitoring2.cat, '
                    . 't_laporanMonitoring2.st, '
                    . 't_laporanMonitoring2.pengesahan, '
                    . 't_laporanMonitoring2.kisi');
            $q3 = $this->db->get_where('t_laporanMonitoring2', ['t_laporanMonitoring2.idJadwal' => $idJadwal]);
            if ($q3->num_rows() > 0) {
                foreach ($q3->result() as $d3) {
                    array_push($data3, $d3);
                }
            }
            $res = $this->ResponseModel->res200(["data" => $data, "data2" => $data2, "data3" => $data3]);
        } else {
            $res = $this->ResponseModel->res204(["data" => $data]);
        }
        return json_encode($res);
    }

    public function Simpan() {
        $res = [];

        $this->form_validation->set_rules("idJadwal", "ID Jadwal", "trim|required");
        $this->form_validation->set_rules("uraian", "Uraian Tugas", "trim|required");
        $this->form_validation->set_rules("program", "Program", "trim|required");
        $this->form_validation->set_rules("tglBerangkat", "Tanggal Berangkat", "trim|required");
        $this->form_validation->set_rules("jmlHari", "Jumlah Hari", "trim|required");
        $this->form_validation->set_rules("uraianHasil", "Uraian Singkat Kegiatan", "trim|required");

        $idJadwal = $this->input->post('idJadwal');
        $uraian = $this->input->post('uraian');
        $program = $this->input->post('program');
        $tglBerangkat = $this->input->post('tglBerangkat');
        $jmlHari = $this->input->post('jmlHari');
        $uraianHasil = $this->input->post('uraianHasil');

        $arr_nipTutor = $this->input->post('nipTutor');
        $arr_rat = $this->input->post('rat');
        $arr_cat = $this->input->post('cat');
        $arr_st = $this->input->post('st');
        $arr_pengesahan = $this->input->post('pengesahan');
        $arr_kisi = $this->input->post('kisi');

        $this->form_validation->set_error_delimiters('', '');

        $sql1 = [
            "idJadwal" => $idJadwal,
            "uraian" => $uraian,
            "program" => $program,
            "tglBerangkat" => $tglBerangkat,
            "jmlHari" => $jmlHari,
            "uraianHasil" => $uraianHasil
        ];

        $sql2 = $this->gen_sql2($idJadwal, $arr_nipTutor, $arr_rat, $arr_cat, $arr_st, $arr_pengesahan, $arr_kisi);

//        print_r($sql1);
//        echo "<br>";
//        print_r($sql2);

        if ($this->form_validation->run() === false) {
            $res = $this->ResponseModel->res400(["message" => validation_errors()]);
        } else {
            $res = $this->do_simpan($sql1, $sql2);
        }

        $this->session->set_flashdata('flash', json_encode($res));
        redirect('/LaporanMonitoring');
    }

    private function gen_sql2($idJadwal, $arr_nipTutor, $arr_rat, $arr_cat, $arr_st, $arr_pengesahan, $arr_kisi) {
        $batch_sql = [];
        $item_batch = [];

        $c = count($arr_nipTutor);

        for ($i = 0; $i < $c; $i++) {
            $item_batch = [
                "idJadwal" => $idJadwal,
                "nipTutor" => $arr_nipTutor[$i],
                "rat" => $arr_rat[$i],
                "cat" => $arr_cat[$i],
                "st" => $arr_st[$i],
                "pengesahan" => $arr_pengesahan[$i],
                "kisi" => $arr_kisi[$i]
            ];
            array_push($batch_sql, $item_batch);
        }

        return $batch_sql;
    }

    private function do_simpan($sql1, $sql2) {
        $res = [];

        $this->db->trans_start();
        $this->db->insert('t_laporanMonitoring', $sql1);
        $this->db->trans_complete();

        if ($this->db->trans_status() === true) {
            $this->db->insert_batch('t_laporanMonitoring2', $sql2);
            $res = $this->ResponseModel->res201(["message" => "Data Berhasil Disimpan!"]);
        }

        return $res;
    }

    public function Update() {
        $res = [];

        $this->form_validation->set_rules("idJadwal", "ID Jadwal", "trim|required");
        $this->form_validation->set_rules("uraian", "Uraian Tugas", "trim|required");
        $this->form_validation->set_rules("program", "Program", "trim|required");
        $this->form_validation->set_rules("tglBerangkat", "Tanggal Berangkat", "trim|required");
        $this->form_validation->set_rules("jmlHari", "Jumlah Hari", "trim|required");
        $this->form_validation->set_rules("uraianHasil", "Uraian Singkat Kegiatan", "trim|required");

        $idJadwal = $this->input->post('idJadwal');
        $uraian = $this->input->post('uraian');
        $program = $this->input->post('program');
        $tglBerangkat = $this->input->post('tglBerangkat');
        $jmlHari = $this->input->post('jmlHari');
        $uraianHasil = $this->input->post('uraianHasil');

        $arr_nipTutor = $this->input->post('nipTutor');
        $arr_rat = $this->input->post('rat');
        $arr_cat = $this->input->post('cat');
        $arr_st = $this->input->post('st');
        $arr_pengesahan = $this->input->post('pengesahan');
        $arr_kisi = $this->input->post('kisi');

        $this->form_validation->set_error_delimiters('', '');

        $sql1 = [
            "uraian" => $uraian,
            "program" => $program,
            "tglBerangkat" => $tglBerangkat,
            "jmlHari" => $jmlHari,
            "uraianHasil" => $uraianHasil
        ];
        $where1 = [
            "idJadwal" => $idJadwal
        ];

        $sql2 = $this->gen_sql2_update($idJadwal, $arr_nipTutor, $arr_rat, $arr_cat, $arr_st, $arr_pengesahan, $arr_kisi);

//        print_r($sql1);
//        echo "<br>";
//        print_r($sql2);

        if ($this->form_validation->run() === false) {
            $res = $this->ResponseModel->res400(["message" => validation_errors()]);
        } else {
            $res = $this->do_update($sql1, $where1, $sql2);
        }
//
        $this->session->set_flashdata('flash', json_encode($res));
        redirect('/LaporanMonitoring');
    }

    private function gen_sql2_update($idJadwal, $arr_nipTutor, $arr_rat, $arr_cat, $arr_st, $arr_pengesahan, $arr_kisi) {
        $before_batch = [];
        $batch_sql = [];

        $c = count($arr_nipTutor);

        for ($i = 0; $i < $c; $i++) {
            $before_batch['item_batch'] = [
                "rat" => $arr_rat[$i],
                "cat" => $arr_cat[$i],
                "st" => $arr_st[$i],
                "pengesahan" => $arr_pengesahan[$i],
                "kisi" => $arr_kisi[$i]
            ];
            $before_batch['where_batch'] = [
                "idJadwal" => $idJadwal,
                "nipTutor" => $arr_nipTutor[$i],
            ];

            array_push($batch_sql, $before_batch);
        }

        return $batch_sql;
    }

    private function do_update($sql1, $where1, $sql2) {
        $res = [];

        $this->db->trans_start();
        $this->db->update('t_laporanMonitoring', $sql1, $where1);
        $this->db->trans_complete();

        if ($this->db->trans_status() === true) {
            for ($i = 0; $i < count($sql2); $i++) {
                $this->db->update('t_laporanMonitoring2', $sql2[$i]['item_batch'], $sql2[$i]['where_batch']);
                echo $this->db->last_query() . "</br>";
            }
            $res = $this->ResponseModel->res201(["message" => "Data Berhasil Disimpan!"]);
        }

        return $res;
    }

}
