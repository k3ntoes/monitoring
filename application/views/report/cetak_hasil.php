<!DOCTYPE HTML>
<html>
    <head>
        <title>Monitoring</title>
        <style>
            body{
                font-size: 10pt;
            }

            table{
                border-collapse: collapse;
            }

            table tr td{
                padding: 5px;
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
                padding: 5px;
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
        <table width="100%" style="margin-top:10pt;">
            <tr>
                <td colspan="2">
                    <h4>
                        <center>Report Hasil Monitoring LOKASI TUTORIAL/UJIAN</center>
                    </h4>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <h4>
                        <center>UPBJJ Universitas Terbuka Purwokerto</center>
                    </h4>
                </td>
            </tr>
        </table>

        <table width="100%" border="1" style="margin-top: 20pt;">
            <thead>
                <tr>
                    <th>Masa</th>
                    <th>Tanggal Monitoring</th>
                    <th>Pokjar</th>
                    <th>Pengurus</th>
                    <th>Alamat</th>
                    <th>Kabupaten</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sts = 0;
                foreach ($data as $d) {
                    if ($d->stat >= 8) {
                        $sts = "BAIK";
                    } else if ($d->stat >= 5 && $d->stat <= 7) {
                        $sts = "CUKUP";
                    } else {
                        $sts = "KURANG";
                    }
                    ?>
                    <tr>
                        <td><?php echo $d->masa; ?></td>
                        <td><?php echo $d->hariLaksana . ", " . $d->tglLaksana; ?></td>
                        <td><?php echo $d->pokjar; ?></td>
                        <td><?php echo $d->namaPengurus . "<br>" . $d->nip; ?></td>
                        <td><?php echo $d->alamat; ?></td>
                        <td><?php echo $d->kabupaten; ?></td>
                        <td><?php echo $sts; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </body>
</html>