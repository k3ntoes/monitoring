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
                        <center>Report Petugas Monitoring</center>
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
                    <th>Pemonitor</th>
                    <th>Tanggal Monitoring</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $d) {
                    ?>
                    <tr>
                        <td><?php echo $d->masa; ?></td>
                        <td>
                            <?php echo $d->gelar_d . $d->nama . "," . $d->gelar_b; ?>
                            <br>
                            <?php echo $d->nipPemonitor; ?>
                        </td>
                        <td><?php echo $d->hariLaksana . ", " . $d->tglLaksana; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </body>
</html>