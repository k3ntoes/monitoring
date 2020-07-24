<!DOCTYPE HTML>
<html>
    <head>
        <title>Laporan Monitoring</title>
        <style>
            body{
                font-size: 9pt;
            }

            table{
                border-collapse: collapse;
            }

            table tr td{
                padding:  5px;
            }

            .cusMargin025{
                -webkit-margin-after:0.25em;
                -webkit-margin-before:0.25em;
            }

            h3{
                font-size: 18pt;
            }

            h2{
                font-size: 22pt;
            }

            h4{
                font-size: 12pt;
            }

            table.uraian td{
                padding-top:5px;
                padding-bottom:5px;
            }

            .bordered{
                border-bottom:  1px solid black;
            }
        </style>
    </head>
    <body style="width:170mm; height:294mm;">
        <div id="container" style="/*border:1px solid black; height: 100%;*/">
            <table width="100%" style="margin-top:10pt;">
                <tr>
                    <td colspan="2">
                        <h4>
                            <center>FORM Monitoring TTM/PRAKTIK/PRAKTIKUM</center>
                        </h4>
                    </td>
                </tr>
                <tr>
                    <td width="30%">NAMA PETUGAS</td>
                    <td>: {gelar_d_pm}{nama_pm},{gelar_b_pm}</td>
                </tr>
                <tr>
                    <td>URAIAN TUGAS</td>
                    <td>: MONITORING 
                        <?php
                        if ($uraian == 0) {
                            echo"TTM";
                        } elseif ($uraian == 1) {
                            echo"PRAKTIK";
                        } elseif ($uraian == 2) {
                            echo"PRAKTIKUM";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>PROGRAM</td>
                    <td>: 
                        <?php
                        if ($program == 0) {
                            echo"Pendas (PGSD/PAUD)";
                        } elseif ($program == 1) {
                            echo"NON PENDAS";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>BERANGKAT DARI</td>
                    <td>: Purwokerto</td>
                </tr>
                <tr>
                    <td>TUJUAN</td>
                    <td>: Pokjar {pokjar} Kabupaten {kabupaten}</td>
                </tr>
                <tr>
                    <td>Tanggal Berangkat</td>
                    <td>: {tglBerangkat}</td>
                </tr>
                <tr>
                    <td>JUMLAH HARI</td>
                    <td>: {jmlHari} Hari</td>
                </tr>
                <tr>
                    <td>JENIS TRANSPORTASI</td>
                    <td>: Transport darat dari Purwokerto ke {alamat}</td>
                </tr>
            </table>

            <table width="100%" style="margin-top: 20pt;">
                <tr>
                    <td>Daftar Tutor Yang dimonitoring beserta kelengkapannya</td>
                </tr>
            </table>

            <table width="100%" border="1" >
                <thead>
                    <tr>
                        <th>No.</th>
                        <th width="30%">Nama Tutor</th>
                        <th>RAT/SAT</th>
                        <th>Cat. Tut.</th>
                        <th>Surat Tugas</th>
                        <th>Lembar pengesahan Validasi</th>
                        <th>Kisi-kisi Tugas, Kriteria Penilaian Tugas, Ranc. Tugas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $chkd0 = "<td align='center'> - </td>";
                    $chkd1 = "<td align='center'><span style='font-family:helvetica'>&#10003;</span></td>";
                    for ($i = 0; $i < count($lTutor); $i++) {
                        $nipTutor = $lTutor[$i]->nipTutor;
                        ?>
                        <tr>
                            <td><?php echo $i + 1; ?></td>
                            <td><?php echo $lTutor[$i]->gelar_d . $lTutor[$i]->nama . "," . $lTutor[$i]->gelar_b; ?></td>
                            <?php
                            foreach ($lTutorDet as $lt) {
                                if ($lt->nipTutor == $nipTutor) {
                                    if ($lt->rat == 1) {
                                        echo $chkd1;
                                    } else {
                                        echo $chkd0;
                                    }
                                    if ($lt->cat == 1) {
                                        echo $chkd1;
                                    } else {
                                        echo $chkd0;
                                    }
                                    if ($lt->st == 1) {
                                        echo $chkd1;
                                    } else {
                                        echo $chkd0;
                                    }
                                    if ($lt->pengesahan == 1) {
                                        echo $chkd1;
                                    } else {
                                        echo $chkd0;
                                    }
                                    if ($lt->kisi == 1) {
                                        echo $chkd1;
                                    } else {
                                        echo $chkd0;
                                    }
                                }
                            }
                            ?>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>

            <table width="100%" style="margin-top: 20pt;">
                <tr>
                    <td>Ket. Beri tanda <span style='font-family:helvetica'>&#10003;</span> apabila ada dam sesuai, Beri randa - apabila tidak ada</td>
                </tr>
                <tr>
                    <td><b>URAIAN SINGKAT KEGIATAN/HASIL PELAKSANAAN TUGAS : </b></td>
                </tr>
                <tr>
                    <td>{uraianHasil}</td>
                </tr>
            </table>

            <table width="30%" style="margin-top: 30pt;">
                <tr>
                    <td align="center">{alamat},</td>
                </tr>
                <tr>
                    <td align="center" style="padding-bottom: 50pt;">Petugas Monitoring</td>
                </tr>
                <tr>
                    <td align="center"><u>{gelar_d_pm}{nama_pm},{gelar_b_pm}</u></td>
                </tr>
                <tr>
                    <td align="center"><u>NIP. {nip_pm}</u></td>
                </tr>
            </table>

        </div>
    </body>
</html>