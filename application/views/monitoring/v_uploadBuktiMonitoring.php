<style>
    .form-control:focus, .select2-container *:focus {
        border-color: #FF0000;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6);
    }
    .select2-container {
        display: block;
    }
</style>

<section class="content-header"> 
    <h1>
        Transaksi
        <small>Monitoring</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Upload Bukti Monitoring</li>
    </ol>
</section>

<div class="content">
    <div class="row" id="lst">
        <div class="col-md-12 border pt-3 pb-3" style="padding-right: 5px; padding-left: 15px;">
            <div class="box box-warning">
                <div class="box-header">
                    <!--<button class="btn btn-warning btn-block" onclick="tambah();">TAMBAH DATA</button>-->
                    <h2>FORM UPLOAD MONITORING</h2>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped table-hover" id="listJadwal" width="100%">
                        <thead>
                            <tr>
                                <th>Aksi</th>
                                <th>Tanggal Input</th>
                                <th>Masa</th>
                                <th>Pokjar</th>
                                <th>Nip Pengurus</th>
                                <th>Pengurus</th>
                                <th>Alamat</th>
                                <th>Kabupaten</th>
                                <th>Hari, Tgl Pelaksanaan</th>
                                <th>Nip Pemonitor</th>
                                <th>Pemonitor</th>
                                <th>Jabatan Pemonitor</th>
                                <th>Nip Penanggungjawab</th>
                                <th>Penanggungjawab</th>
                                <th>Jabatan Penanggungjawab</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="inp" style="/*display: none;*/">
        <div class="col-md-12 border pt-3 pb-3" style="padding-right: 5px; padding-left: 15px;">
            <div class="box box-info">
                <div class="box-header"><h3 id="judul">INPUT DATA</h3></div>
                <div class="box-body">
                    <form method="post" id="frm" enctype='multipart/form-data'>
                        <input type="hidden" name="idJadwal" id="idJadwal">
                        <input type="hidden" name="upd" id="upd" value="0">

                        <div class="row form-group">
                            <label class="col-sm-2">Nama Petugas</label>
                            <label class="col-sm-8" id="nama">: wilayah</label>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-2">Pokjar</label>
                            <label class="col-sm-8" >: Pokjar <span id="pokjar"></span> Kabupaten <span id="kabupaten"></span></label>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-2">Tanggal Pelaksanaan</label>
                            <label class="col-sm-8" >: <span id="hariLaksana"></span>, <span id="tglLaksana"></span></label>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-2">Surat Perintah Perjalanan Dinas</label>
                            <div class="col-sm-3">
                                <input type="file" name="sppd" id="sppd" required="">
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-2">Berita Acara Penggantian Tutor</label>
                            <div class="col-sm-3">
                                <input type="file" name="bap" id="bap" required="">
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-2">Surat Tugas</label>
                            <div class="col-sm-3">
                                <input type="file" name="st" id="st" required="">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-12">
                                <span class="btn btn-danger btn-block" onclick="batal();">BATAL</span>
                                <button class="btn btn-success btn-block col-sm-12" id="bt-simpan">TAMBAH DATA</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function getting_data() {
        $.getJSON('/UploadBuktiMonitoring/ListUploadBuktiMonitoring', function (json) {
            if (json.metaData.code == 200) {
                $('#listJadwal').DataTable().destroy();
                $('#listJadwal tbody').html("");
                var str;
                $.each(json.response.data, function (index, t) {
                    var warna = "";
                    var bt_cetak = "";
                    if (t.selesai == 1) {
                        warna = "lightgreen";
                        bt_cetak = '<span class="btn btn-warning glyphicon glyphicon-print" id="cetak" onclick="cetak(\'' + t.sppd + '\',\'' + t.bap + '\',\'' + t.st + '\');"></span>';
                    }
                    var e_val = "'" + t.idJadwal + "','" + t.kabupaten + "','" + t.pokjar + "','" + t.alamat + "','" + t.nama_pm + "','" + t.nipPm + "','" + t.jab_pm + "','" + "','" + t.hariLaksana + "','" + t.tglLaksana + "'";
                    str += "<tr style='background: " + warna + ";'>"
                            + "<td nowrap style='width:45px;'>"
                            + '<div class="btn-group btn-group-xs" role="group" aria-label="Basic example" id="rst">'
                            + "<span class='btn btn-info glyphicon glyphicon-pencil' onclick=\"edit(" + t.idJadwal + ");\" id='bEdit'></span>"
                            + bt_cetak
                            + '</div>'
                            + '</td>'
                            + "<td>" + t.tglInput + "</td>"
                            + "<td>" + t.masa + "</td>"
                            + "<td>" + t.pokjar + "</td>"
                            + "<td>" + t.nipPengurus + "</td>"
                            + "<td>" + t.namaPengurus + "</td>"
                            + "<td>" + t.alamat + "</td>"
                            + "<td>" + t.kabupaten + "</td>"
                            + "<td>" + t.hariLaksana + "," + t.tglLaksana + "</td>"
                            + "<td>" + t.nipPm + "</td>"
                            + "<td>" + t.gelar_d_pm + t.nama_pm + "," + t.gelar_b_pm + "</td>" + "<td>" + t.jab_pm + "</td>"
                            + "<td>" + t.nipPj + "</td>"
                            + "<td>" + t.gelar_d_pj + t.nama_pj + "," + t.gelar_b_pj + "</td>"
                            + "<td>" + t.jab_pj + "</td>"
                            + "</tr>";
                });
                $('#listJadwal tbody').append(str);
                $('#listJadwal').DataTable();
            }
        });
    }

    function edit(idJadwal) {
        $.getJSON('/UploadBuktiMonitoring/getData/' + idJadwal, function (json) {
            if (json.metaData.code == 200) {
                $.each(json.response.data, function (index, t) {
                    $('#idJadwal').val(t.idJadwal);
                    $('#nama').html(": " + t.gelar_d + t.nama + "," + t.gelar_b);
                    $('#pokjar').html(t.pokjar);
                    $('#hariLaksana').html(t.hariLaksana);
                    $('#tglLaksana').html(t.tglLaksana);
                    if (t.selesai == 1) {
                        $('#upd').val(1);
                        $('#bt-simpan').html('UPDATE');
                        $('#frm').attr('action', '/UploadBuktiMonitoring/Update');
                    } else {
                        $('#upd').val(0);
                        $('#bt-simpan').html('SIMPAN');
                        $('#frm').attr('action', '/UploadBuktiMonitoring/Simpan');
                    }
                    $('#lst').hide(1000);
                    $('#inp').show(1000);
                });
            }
        });
    }

    function cetak(sppd, bap, st) {
        window.open("/asset/uploads/" + sppd);
        window.open("/asset/uploads/" + bap);
        window.open("/asset/uploads/" + st);
    }

    function batal() {
        getting_data();
        $('#lst').show(1000);
        $('#inp').hide(1000);
    }

    $(document).ready(function () {
        batal();
    });
</script>