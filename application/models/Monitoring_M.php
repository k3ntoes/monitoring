<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Monitoring_M
 *
 * @author Kent-os
 */
class Monitoring_M extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function ListMonitoring($nip) {
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
                . 'IF( ISNULL(t_monitoring.idJadwal),0,1 ) AS selesai');
        $this->db->join('m_pokjar', 't_jadwal.idPokjar = m_pokjar.idPokjar', 'INNER');
        $this->db->join('m_usr', 't_jadwal.nipPemonitor = m_usr.nip', 'INNER');
        $this->db->join('m_jabatan', 'm_usr.idJabatan = m_jabatan.idJabatan', 'INNER');
        $this->db->join('t_monitoring', 't_monitoring.idJadwal = t_jadwal.idJadwal', 'LEFT');
        $this->db->join('m_usr AS pemonitor', 't_jadwal.nipPemonitor = pemonitor.nip', 'INNER');
        $this->db->join('m_usr AS penanggungjawab', 't_jadwal.nipPj = penanggungjawab.nip', 'INNER');
        $this->db->join('m_jabatan AS jabPJ', 'penanggungjawab.idJabatan = jabPJ.idJabatan', 'INNER');
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

    public function ListMonitoringDet($idJadwal) {
        $data = [];
        $this->db->select('t_jadwal.idJadwal, '
                . 't_jadwal.masa, '
                . 'm_pokjar.kabupaten, '
                . 'm_pokjar.pokjar, '
                . 'm_pokjar.alamat, '
                . 'm_usr.gelar_d AS gelar_d_pm, '
                . 'm_usr.nama AS nama_pm, '
                . 'm_usr.gelar_b AS gelar_b_pm, '
                . 'm_usr.nip AS nipPm, '
                . 'm_jabatan.jabatan AS jab_pm, '
                . 't_jadwal.hariLaksana, '
                . 'DATE_FORMAT(t_jadwal.tglLaksana,"%d-%m-%Y") AS tglLaksana, '
                . 't_monitoring.idJadwal AS idJadwalMonitoring, '
                . 't_monitoring.seleksi, '
                . 't_monitoring.persyaratan, '
                . 't_monitoring.kondisi, '
                . 't_monitoring.disposisi, '
                . 'IF( ISNULL(t_monitoring.idJadwal),0,1 ) AS selesai, '
                . 't_monitoring2.kegiatan, '
                . 't_monitoring2.jmlKelas, '
                . 't_monitoring2.tmpt, '
                . 't_monitoring2.tmpt1, '
                . 't_monitoring2.kelas, '
                . 't_monitoring2.kelas1, '
                . 't_monitoring2.alat, '
                . 't_monitoring2.alat1, '
                . 't_monitoring2.bahan, '
                . 't_monitoring2.bahan1, '
                . 't_monitoring2.jadwal, '
                . 't_monitoring2.jadwal1, '
                . 't_monitoring2.tepatWkt, '
                . 't_monitoring2.tepatWkt1, '
                . 't_monitoring2.sTugas, '
                . 't_monitoring2.sTugas1, '
                . 't_monitoring2.rat, '
                . 't_monitoring2.rat1, '
                . 't_monitoring2.catatan, '
                . 't_monitoring2.catatan1, '
                . 't_monitoring2.jmlMhs, '
                . 't_monitoring2.jmlMhs1');
        $this->db->join('m_pokjar', 't_jadwal.idPokjar = m_pokjar.idPokjar', 'INNER');
        $this->db->join('m_usr', 't_jadwal.nipPemonitor = m_usr.nip', 'INNER');
        $this->db->join('m_jabatan', 'm_usr.idJabatan = m_jabatan.idJabatan', 'INNER');
        $this->db->join('t_monitoring', 't_monitoring.idJadwal = t_jadwal.idJadwal', 'LEFT');
        $this->db->join('t_monitoring2', 't_monitoring.idJadwal = t_monitoring2.idJadwal', 'LEFT');
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
        $this->form_validation->set_rules("jmlKelas", "Jumlah Kelas", "trim|required");
        $this->form_validation->set_rules("tmpt", "Kesesuaian Tempat", "trim|required");
        $this->form_validation->set_rules("tmpt1", "Uraian Tempat", "trim|required");
        $this->form_validation->set_rules("kelas", " Jadwal Terlaksana", "trim|required");
        $this->form_validation->set_rules("kelas1", " Jadwal Terlaksana", "trim|required");
        $this->form_validation->set_rules("alat", " Peralatan Lab", "trim|required");
        $this->form_validation->set_rules("alat1", " Peralatan Lab", "trim|required");
        $this->form_validation->set_rules("bahan", " Bahan Lab", "trim|required");
        $this->form_validation->set_rules("bahan1", " Bahan Lab", "trim|required");
        $this->form_validation->set_rules("jadwal", " Jadwal yang ditetapkan", "trim|required");
        $this->form_validation->set_rules("jadwal1", " Jadwal yang ditetapkan", "trim|required");
        $this->form_validation->set_rules("tepatWkt", " Kehadiran sesuai Jadwal", "trim|required");
        $this->form_validation->set_rules("tepatWkt1", " Kehadiran sesuai Jadwal", "trim|required");
        $this->form_validation->set_rules("sTugas", " Surat tugas", "trim|required");
        $this->form_validation->set_rules("sTugas1", " Surat tugas", "trim|required");
        $this->form_validation->set_rules("rat", " membawa RAT-SAT", "trim|required");
        $this->form_validation->set_rules("rat1", " membawa RAT-SAT", "trim|required");
        $this->form_validation->set_rules("catatan", " membawa Catatan", "trim|required");
        $this->form_validation->set_rules("catatan1", " membawa Catatan", "trim|required");
        $this->form_validation->set_rules("jmlMhs", " mahasiswa melebihi 35 orang", "trim|required");
        $this->form_validation->set_rules("jmlMhs1", " mahasiswa melebihi 35 orang", "trim|required");

        $idJadwal = $this->input->post('idJadwal');

        $arrItemSeleksi = $this->input->post('itemSeleksi');
        $itemSeleksi = "";
        for ($i = 0; $i < count($arrItemSeleksi); $i++) {
            if ($i != (count($arrItemSeleksi) - 1)) {
                $itemSeleksi = $itemSeleksi . $arrItemSeleksi[$i] . "#";
            } else {
                $itemSeleksi = $itemSeleksi . $arrItemSeleksi[$i];
            }
        }

        $arrPersyaratan = $this->input->post('persyaratan');
        $itemPersyaratan = "";
        for ($i = 0; $i < count($arrPersyaratan); $i++) {
            if ($i != (count($arrPersyaratan) - 1)) {
                $itemPersyaratan = $itemPersyaratan . $arrPersyaratan[$i] . "#";
            } else {
                $itemPersyaratan = $itemPersyaratan . $arrPersyaratan[$i];
            }
        }

        $arrKondisi = $this->input->post('kondisi');
        $itemKondisi = "";
        for ($i = 0; $i < count($arrKondisi); $i++) {
            if ($i != (count($arrKondisi) - 1)) {
                $itemKondisi = $itemKondisi . $arrKondisi[$i] . "#";
            } else {
                $itemKondisi = $itemKondisi . $arrKondisi[$i];
            }
        }

        $disposisi = $this->input->post('disposisi');
        $kegiatan = $this->input->post("kegiatan");
        $jmlKelas = $this->input->post("jmlKelas");
        $tmpt = $this->input->post("tmpt");
        $tmpt1 = $this->input->post("tmpt1");
        $kelas = $this->input->post("kelas");
        $kelas1 = $this->input->post("kelas1");
        $alat = $this->input->post("alat");
        $alat1 = $this->input->post("alat1");
        $bahan = $this->input->post("bahan");
        $bahan1 = $this->input->post("bahan1");
        $jadwal = $this->input->post("jadwal");
        $jadwal1 = $this->input->post("jadwal1");
        $tepatWkt = $this->input->post("tepatWkt");
        $tepatWkt1 = $this->input->post("tepatWkt1");
        $sTugas = $this->input->post("sTugas");
        $sTugas1 = $this->input->post("sTugas1");
        $rat = $this->input->post("rat");
        $rat1 = $this->input->post("rat1");
        $catatan = $this->input->post("catatan");
        $catatan1 = $this->input->post("catatan1");
        $jmlMhs = $this->input->post("jmlMhs");
        $jmlMhs1 = $this->input->post("jmlMhs1");


        $this->form_validation->set_error_delimiters('', '');

        $sql = [
            'idJadwal' => $idJadwal,
            'seleksi' => $itemSeleksi,
            'persyaratan' => $itemPersyaratan,
            'kondisi' => $itemKondisi,
            'disposisi' => $disposisi
        ];

        $sql2 = [
            "idJadwal" => $idJadwal,
            "kegiatan" => $kegiatan,
            "jmlKelas" => $jmlKelas,
            "tmpt" => $tmpt,
            "tmpt1" => $tmpt1,
            "kelas" => $kelas,
            "kelas1" => $kelas1,
            "alat" => $alat,
            "alat1" => $alat1,
            "bahan" => $bahan,
            "bahan1" => $bahan1,
            "jadwal" => $jadwal,
            "jadwal1" => $jadwal1,
            "tepatWkt" => $tepatWkt,
            "tepatWkt1" => $tepatWkt1,
            "sTugas" => $sTugas,
            "sTugas1" => $sTugas1,
            "rat" => $rat,
            "rat1" => $rat1,
            "catatan" => $catatan,
            "catatan1" => $catatan1,
            "jmlMhs" => $jmlMhs,
            "jmlMhs1" => $jmlMhs1,
        ];

        if ($this->form_validation->run() === false) {
            $res = $this->ResponseModel->res400(["message" => validation_errors()]);
        } else {
            $this->db->trans_start();
            $this->db->insert('t_monitoring', $sql);
            $this->db->trans_complete();

            if ($this->db->trans_status() === true) {
                $this->db->insert('t_monitoring2', $sql2);
                $res = $this->ResponseModel->res201(["message" => "Data Berhasil Disimpan!"]);
            }
        }

        $this->session->set_flashdata('flash', json_encode($res));
        redirect('/Monitoring');
    }

    public function Update() {
        $res = [];

        $this->form_validation->set_rules("idJadwal", "ID Jadwal", "trim|required");
        $this->form_validation->set_rules("jmlKelas", "Jumlah Kelas", "trim|required");
        $this->form_validation->set_rules("tmpt", "Kesesuaian Tempat", "trim|required");
        $this->form_validation->set_rules("tmpt1", "Uraian Tempat", "trim|required");
        $this->form_validation->set_rules("kelas", " Jadwal Terlaksana", "trim|required");
        $this->form_validation->set_rules("kelas1", " Jadwal Terlaksana", "trim|required");
        $this->form_validation->set_rules("alat", " Peralatan Lab", "trim|required");
        $this->form_validation->set_rules("alat1", " Peralatan Lab", "trim|required");
        $this->form_validation->set_rules("bahan", " Bahan Lab", "trim|required");
        $this->form_validation->set_rules("bahan1", " Bahan Lab", "trim|required");
        $this->form_validation->set_rules("jadwal", " Jadwal yang ditetapkan", "trim|required");
        $this->form_validation->set_rules("jadwal1", " Jadwal yang ditetapkan", "trim|required");
        $this->form_validation->set_rules("tepatWkt", " Kehadiran sesuai Jadwal", "trim|required");
        $this->form_validation->set_rules("tepatWkt1", " Kehadiran sesuai Jadwal", "trim|required");
        $this->form_validation->set_rules("sTugas", " Surat tugas", "trim|required");
        $this->form_validation->set_rules("sTugas1", " Surat tugas", "trim|required");
        $this->form_validation->set_rules("rat", " membawa RAT-SAT", "trim|required");
        $this->form_validation->set_rules("rat1", " membawa RAT-SAT", "trim|required");
        $this->form_validation->set_rules("catatan", " membawa Catatan", "trim|required");
        $this->form_validation->set_rules("catatan1", " membawa Catatan", "trim|required");
        $this->form_validation->set_rules("jmlMhs", " mahasiswa melebihi 35 orang", "trim|required");
        $this->form_validation->set_rules("jmlMhs1", " mahasiswa melebihi 35 orang", "trim|required");

        $idJadwal = $this->input->post('idJadwal');

        $arrItemSeleksi = $this->input->post('itemSeleksi');
        $itemSeleksi = "";
        for ($i = 0; $i < count($arrItemSeleksi); $i++) {
            if ($i != (count($arrItemSeleksi) - 1)) {
                $itemSeleksi = $itemSeleksi . $arrItemSeleksi[$i] . "#";
            } else {
                $itemSeleksi = $itemSeleksi . $arrItemSeleksi[$i];
            }
        }

        $arrPersyaratan = $this->input->post('persyaratan');
        $itemPersyaratan = "";
        for ($i = 0; $i < count($arrPersyaratan); $i++) {
            if ($i != (count($arrPersyaratan) - 1)) {
                $itemPersyaratan = $itemPersyaratan . $arrPersyaratan[$i] . "#";
            } else {
                $itemPersyaratan = $itemPersyaratan . $arrPersyaratan[$i];
            }
        }

        $arrKondisi = $this->input->post('kondisi');
        $itemKondisi = "";
        for ($i = 0; $i < count($arrKondisi); $i++) {
            if ($i != (count($arrKondisi) - 1)) {
                $itemKondisi = $itemKondisi . $arrKondisi[$i] . "#";
            } else {
                $itemKondisi = $itemKondisi . $arrKondisi[$i];
            }
        }

        $disposisi = $this->input->post('disposisi');
        $kegiatan = $this->input->post("kegiatan");
        $jmlKelas = $this->input->post("jmlKelas");
        $tmpt = $this->input->post("tmpt");
        $tmpt1 = $this->input->post("tmpt1");
        $kelas = $this->input->post("kelas");
        $kelas1 = $this->input->post("kelas1");
        $alat = $this->input->post("alat");
        $alat1 = $this->input->post("alat1");
        $bahan = $this->input->post("bahan");
        $bahan1 = $this->input->post("bahan1");
        $jadwal = $this->input->post("jadwal");
        $jadwal1 = $this->input->post("jadwal1");
        $tepatWkt = $this->input->post("tepatWkt");
        $tepatWkt1 = $this->input->post("tepatWkt1");
        $sTugas = $this->input->post("sTugas");
        $sTugas1 = $this->input->post("sTugas1");
        $rat = $this->input->post("rat");
        $rat1 = $this->input->post("rat1");
        $catatan = $this->input->post("catatan");
        $catatan1 = $this->input->post("catatan1");
        $jmlMhs = $this->input->post("jmlMhs");
        $jmlMhs1 = $this->input->post("jmlMhs1");

        $this->form_validation->set_error_delimiters('', '');

        $sql = [
            'seleksi' => $itemSeleksi,
            'persyaratan' => $itemPersyaratan,
            'kondisi' => $itemKondisi,
            'disposisi' => $disposisi
        ];

        $sql2 = [
            "kegiatan" => $kegiatan,
            "jmlKelas" => $jmlKelas,
            "tmpt" => $tmpt,
            "tmpt1" => $tmpt1,
            "kelas" => $kelas,
            "kelas1" => $kelas1,
            "alat" => $alat,
            "alat1" => $alat1,
            "bahan" => $bahan,
            "bahan1" => $bahan1,
            "jadwal" => $jadwal,
            "jadwal1" => $jadwal1,
            "tepatWkt" => $tepatWkt,
            "tepatWkt1" => $tepatWkt1,
            "sTugas" => $sTugas,
            "sTugas1" => $sTugas1,
            "rat" => $rat,
            "rat1" => $rat1,
            "catatan" => $catatan,
            "catatan1" => $catatan1,
            "jmlMhs" => $jmlMhs,
            "jmlMhs1" => $jmlMhs1,
        ];

        $where = [
            'idJadwal' => $idJadwal,
        ];

        if ($this->form_validation->run() === false) {
            $res = $this->ResponseModel->res400(["message" => validation_errors()]);
        } else {
            $this->db->trans_start();
            $this->db->update('t_monitoring', $sql, $where);
//            echo $this->db->last_query();
            $this->db->trans_complete();

            if ($this->db->trans_status() === true) {
                $this->db->update('t_monitoring2', $sql2, $where);
                $res = $this->ResponseModel->res201(["message" => "Data Berhasil Disimpan!"]);
            }
        }

        $this->session->set_flashdata('flash', json_encode($res));
        redirect('/Monitoring');
    }

    public function Remove($idMonitoring) {
        $this->db->trans_start();
        $this->db->delete('t_monitoring', ['idMonitoring' => $idMonitoring]);
        $this->db->trans_complete();

        if ($this->db->trans_status() === true) {
            $res = $this->ResponseModel->res201(["message" => "Data Berhasil Di Hapus!"]);
        }

        $this->session->set_flashdata('flash', json_encode($res));
        redirect('/Monitoring');
    }

}
