<!DOCTYPE HTML>
<html>
    <head>
        <title>Monitoring</title>
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
                font-size: 11pt;
                margin: 5px;
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
            <table border="1" style="margin-right: 0px; margin-left: auto;">
                <tr>
                    <td style="padding-left:10pt; padding-right: 10pt; padding-top: 2pt; padding-bottom: 2pt;">BB03-RK09-RII.1</td>
                </tr>
                <tr>
                    <td style="padding-left:10pt; padding-right: 10pt; padding-top: 2pt; padding-bottom: 2pt;">13 Februari 2014</td>
                </tr>
            </table>

            <table width="100%" style="margin-top:10pt;">
                <tr>
                    <td colspan="4">
                        <h4>
                            <center>FORM Monitoring TTM/PRAKTIK/PRAKTIKUM</center>
                        </h4>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <h4>
                            <center>UPBJJ-UT PURWOKERTO</center>
                        </h4>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <h4>
                            <center>Masa Registrasi {masa}</center>
                        </h4>
                    </td>
                </tr>
                <tr>
                    <td width="30%">NAMA PETUGAS MONITORING</td>
                    <td width="20%">: {gelar_d_pm}{nama_pm},{gelar_b_pm}</td>
                    <td width="25%">KEGIATAN</td>
                    <td width="25%">: 
                        <?php
                        if ($kegiatan == 0) {
                            echo"TTM";
                        } elseif ($kegiatan == 1) {
                            echo"PRAKTIK";
                        } elseif ($kegiatan == 2) {
                            echo"PRAKTIKUM";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>TANGGAL MONITORING</td>
                    <td>: {tglLaksana}</td>
                    <td>POKJAR</td>
                    <td>: {pokjar}</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>JUMLAH KELAS</td>
                    <td>: {jmlKelas}</td>
                </tr>
                <tr>
                    <td colspan="4">PETUNJUK PENGISIAN :</td>
                </tr>
                <tr>
                    <td colspan="4">1. BERIKAN TANDA CEK LIST ( <span style='font-family:helvetica'>&#10003;</span> ) PADA KOLOM KESESUAIAN</td>
                </tr>
                <tr>
                    <td colspan="4">2. ISILAH URAIAN KESESUAIAN ATAU KETIDAKSESUAIAN</td>
                </tr>
            </table>

            <table width="100%" border="1" style="margin-top: 20pt;">
                <thead>
                    <tr>
                        <th rowspan="2" width="5%">NO.</th>
                        <th rowspan="2" width="45%">VARIABEL YANG DIAMATI</th>
                        <th colspan="2" width="25%">KESESUAIAN PROSEDUR/SISTEM</th>
                        <th colspan="2" width="25%">URAIAN</th>
                    </tr>
                    <tr>
                        <th>Ya</th>
                        <th>Tidak</th>
                        <th>KESESUAIAN</th>
                        <th>KETIDAKSESUAIAN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $chkd1 = "<td align='center'><span style='font-family:helvetica'>&#10003;</span></td><td></td>";
                    $chkd0 = "<td></td><td align='center'><span style='font-family:helvetica'>&#10003;</span></td>";
                    ?>
                    <tr>
                        <td>1.</td>
                        <td>Tempat tutorial/praktik/praktikum layak</td>
                        <?php
                        if ($tmpt == 1) {
                            echo $chkd1;
                        } else {
                            echo $chkd0;
                        }
                        if ($tmpt1 == 1) {
                            echo $chkd1;
                        } else {
                            echo $chkd0;
                        }
                        ?>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Seluruh Kelas tutorial yang terjadwal terlaksana</td>
                        <?php
                        if ($kelas == 1) {
                            echo $chkd1;
                        } else {
                            echo $chkd0;
                        }
                        if ($kelas1 == 1) {
                            echo $chkd1;
                        } else {
                            echo $chkd0;
                        }
                        ?>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>Peralatan Lab tersedia dan layak digunakan</td>
                        <?php
                        if ($alat == 1) {
                            echo $chkd1;
                        } else {
                            echo $chkd0;
                        }
                        if ($alat1 == 1) {
                            echo $chkd1;
                        } else {
                            echo $chkd0;
                        }
                        ?>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>Bahan Lab tersedia dan layak digunakan</td>
                        <?php
                        if ($bahan == 1) {
                            echo $chkd1;
                        } else {
                            echo $chkd0;
                        }
                        if ($bahan1 == 1) {
                            echo $chkd1;
                        } else {
                            echo $chkd0;
                        }
                        ?>
                    </tr>
                    <tr>
                        <td>5.</td>
                        <td>Pelaksanaan tutorial/praktik/praktikum sesuai dengan jadwal yang ditetapkan</td>
                        <?php
                        if ($jadwal == 1) {
                            echo $chkd1;
                        } else {
                            echo $chkd0;
                        }
                        if ($jadwal1 == 1) {
                            echo $chkd1;
                        } else {
                            echo $chkd0;
                        }
                        ?>
                    </tr>
                    <tr>
                        <td>6.</td>
                        <td>Seluruh tutor/pembimbing/instruktur hadir sesuai jadwal</td>
                        <?php
                        if ($tepatWkt == 1) {
                            echo $chkd1;
                        } else {
                            echo $chkd0;
                        }
                        if ($tepatWkt1 == 1) {
                            echo $chkd1;
                        } else {
                            echo $chkd0;
                        }
                        ?>
                    </tr>
                    <tr>
                        <td>7.</td>
                        <td>Seluruh tutor/pembimbing/instruktir yang hadir sesuai Surat Tugas	</td>
                        <?php
                        if ($sTugas == 1) {
                            echo $chkd1;
                        } else {
                            echo $chkd0;
                        }
                        if ($sTugas1 == 1) {
                            echo $chkd1;
                        } else {
                            echo $chkd0;
                        }
                        ?>
                    </tr>
                    <tr>
                        <td>8.</td>
                        <td>Tutor/pembimbing/instruktir membawa RAT-SAT</td>
                        <?php
                        if ($rat == 1) {
                            echo $chkd1;
                        } else {
                            echo $chkd0;
                        }
                        if ($rat1 == 1) {
                            echo $chkd1;
                        } else {
                            echo $chkd0;
                        }
                        ?>
                    </tr>
                    <tr>
                        <td>9.</td>
                        <td>Tutor/pembimbing/instruktir membawa Catatan Tutorial</td>
                        <?php
                        if ($catatan == 1) {
                            echo $chkd1;
                        } else {
                            echo $chkd0;
                        }
                        if ($catatan1 == 1) {
                            echo $chkd1;
                        } else {
                            echo $chkd0;
                        }
                        ?>
                    </tr>
                    <tr>
                        <td>10.</td>
                        <td>Terdapat kelas dengan jumlah mahasiswa melebihi 35 orang</td>
                        <?php
                        if ($jmlMhs == 1) {
                            echo $chkd1;
                        } else {
                            echo $chkd0;
                        }
                        if ($jmlMhs1 == 1) {
                            echo $chkd1;
                        } else {
                            echo $chkd0;
                        }
                        ?>
                    </tr>
                </tbody>
            </table>

            <table style="margin-top: 30pt;">
                <tr>
                    <td>Simpulan Umum</td>
                </tr>
            </table>
            <table border="1" width="45%">
                <tr>
                    <td colspan="2" align="center">TTM/Praktik/Praktikum berlangsung :</td>
                </tr>
                <tr>
                    <td>Baik</td>
                    <td>Jika 8-10 item sesuai</td>
                </tr>
                <tr>
                    <td>Cukup</td>
                    <td>Jika 5-7 item sesuai</td>
                </tr>
                <tr>
                    <td>Kurang</td>
                    <td>Jika kurang dari 5 item sesuai</td>
                </tr>
            </table>

            <table style="margin-right: 15%; margin-left: auto; margin-top: 10px">
                <tr>
                    <td align="center">{kabupaten}, {tglLaksana}</td>
                </tr>
                <tr>
                    <td align="center" style="padding-bottom: 50pt;">Petugas Monitoring</td>
                </tr>
                <tr>
                    <td align="center"><u>{gelar_d_pm}{nama_pm},{gelar_b_pm}</u></td>
                </tr>
                <tr>
                    <td align="center"><u>NIP. {nipPm}</u></td>
                </tr>
            </table>
        </div>
    </body>
</html>