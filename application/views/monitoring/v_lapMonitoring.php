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
        <li class="active">Laporan Monitoring</li>
    </ol>
</section>

<div class="content">
    <div class="row" id="lst">
        <div class="col-md-12 border pt-3 pb-3" style="padding-right: 5px; padding-left: 15px;">
            <div class="box box-warning">
                <div class="box-header">
                    <!--<button class="btn btn-warning btn-block" onclick="tambah();">TAMBAH DATA</button>-->
                    <h2>FORM LAPORAN MONITORING TTM/PRAKTIK/PRAKTIKUM</h2>
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
                    <form method="post" id="frm">
                        <input type="hidden" name="idJadwal" id="idJadwal">
                        <input type="hidden" name="upd" id="upd" value="0">

                        <div class="row form-group">
                            <label class="col-sm-2">Nama Petugas</label>
                            <label class="col-sm-8" id="nama">: wilayah</label>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-2">Uraian Tugas</label>
                            <label class="col-sm-1">:</label>
                            <div class="col-sm-3" style="margin-left: -7.9%;">
                                <select name="uraian" id="uraian" class="form-control">
                                    <option value="0">Monitoring TTM</option>
                                    <option value="1">Monitoring PRAKTIK</option>
                                    <option value="2">Monitoring PRAKTIKUM</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-2">Program</label>
                            <label class="col-sm-1">:</label>
                            <div class="col-sm-3" style="margin-left: -7.9%;">
                                <select name="program" id="program" class="form-control">
                                    <option value="0">Pendas (PGSD/PAUD)</option>
                                    <option value="1">Non Pendas</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-2">Berangkat Dari</label>
                            <label class="col-sm-8">: Purwokerto</label>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-2">Tujuan</label>
                            <label class="col-sm-8" >: Pokjar <span id="pokjar"></span> Kabupaten <span id="kabupatenPokjar"></span></label>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-2">Tanggal Berangkat</label>
                            <label class="col-sm-1">:</label>
                            <div class="col-sm-3" style="margin-left: -7.9%;">
                                <div class="input-group date" data-date-format="yyyy-mm-dd">
                                    <input type="text" name="tglBerangkat" id="tglBerangkat" class="form-control input-sm datepicker" required="required" placeholder="yyyy-mm-dd" value="<?php echo date("Y-m-d"); ?>" readonly="">
                                    <div class="input-group-addon" >
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-2">Jumlah Hari</label>
                            <label class="col-sm-1">:</label>
                            <div class="col-sm-3" style="margin-left: -7.9%;">
                                <div class="input-group date">
                                    <input type="text" name="jmlHari" id="jmlHari" class="form-control input-sm" required="required" placeholder="Jumlah Hari" >
                                    <div class="input-group-addon" >
                                        HARI
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-2">Jenis Transportasi</label>
                            <label class="col-sm-8" id="transportasi">: Transportasi darat dari purwokerto ke <span id="alamatPokjar"></span></label>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-12">Daftar Tutor Yang dimonitoring beserta kelengkapannya</label>
                        </div>

                        <table id="tblTutor" class="table table-bordered table-striped table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center" width="5%">No</th>
                                    <th class="text-center" width="35%">Nama Tutor</th>
                                    <th class="text-center" width="12%">RAT/SAT</th>
                                    <th class="text-center" width="12%">Cat. Tut.</th>
                                    <th class="text-center" width="12%">Surat Tugas</th>
                                    <th class="text-center" width="12%">Lembar Pengesahan Validasi</th>
                                    <th class="text-center" width="12%">Kisi-kisi Tugas, Kriteria Penilaian Tugas, Ranc. Tugas</th>
                                    <!--<th class="text-center">Tambah</th>-->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="row form-group">
                                            <input type="hidden" id="nipTutor_1" name="nipTutor[]" readonly="" value="1">
                                            <div class="col-sm-12">
                                                <input type="text" id="namaTutor_1" class="form-control" readonly="" value="siap aja boleh" style="background:white;">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row form-group" style="//padding-left:22%">
                                            <label for="rat_1" class="radio-inline col-sm-12 text-center">
                                                <input type="checkbox" id="rat_1" name="rat[]" value="1">
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row form-group" style="//padding-left:22%">
                                            <label for="cat_1" class="radio-inline col-sm-12 text-center">
                                                <input type="checkbox" id="cat_1" name="cat[]" value="1">
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row form-group" style="//padding-left:22%">
                                            <label for="st_1" class="radio-inline col-sm-12 text-center">
                                                <input type="checkbox" id="st_1" name="st[]" value="1">
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row form-group" style="//padding-left:22%">
                                            <label for="lp_1" class="radio-inline col-sm-12 text-center">
                                                <input type="checkbox" id="lp_1" name="lp[]" value="1">
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row form-group" style="//padding-left:22%">
                                            <label for="kisi_1" class="radio-inline col-sm-12 text-center">
                                                <input type="checkbox" id="kisi_1" name="kisi[]" value="1">
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="row form-group">
                            <label class="col-sm-12">URAIAN SINGKAT KEGIATAN/HASIL PELAKSANAAN TUGAS</label>
                            <div class="form-group col-sm-12">
                                <textarea id="uraianHasil" name="uraianHasil" class="form-control text-area" rows="10"></textarea>
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
        $.getJSON('/LaporanMonitoring/ListLaporanMonitoring', function (json) {
            if (json.metaData.code == 200) {
                $('#listJadwal').DataTable().destroy();
                $('#listJadwal tbody').html("");
                var str;
                $.each(json.response.data, function (index, t) {
                    var warna = "";
                    var bt_cetak = "";
                    if (t.selesai == 1) {
                        warna = "lightgreen";
                        bt_cetak = '<a href="/LaporanMonitoring/Cetak/' + t.idJadwal + '" target="_blank" class="btn btn-warning glyphicon glyphicon-print" id="cetak"></a>';
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
        $.getJSON('/LaporanMonitoring/getData/' + idJadwal, function (json) {
            if (json.metaData.code == 200) {
                var str;
                $.each(json.response.data, function (index, t) {
                    $('#idJadwal').val(t.idJadwal);
                    $('#nama').html(": " + t.gelar_d_pm + t.nama_pm + "," + t.gelar_b_pm);
                    $('#pokjar').html(t.pokjar);
                    $('#kabupatenPokjar').html(t.kabupaten);
                    $('#alamatPokjar').html(t.alamat);
                    autoSelect('uraian', t.uraian);
                    autoSelect('program', t.program);
                    $('#tglBerangkat').val(t.tglBerangkat);
                    $('#jmlHari').val(t.jmlHari);
                    $('#uraianHasil').html(t.uraianHasil);
                    if (t.selesai == 1) {
                        $('#upd').val(1);
                        $('#bt-simpan').html('UPDATE');
                        $('#frm').attr('action', '/LaporanMonitoring/Update');
                    } else {
                        $('#upd').val(0);
                        $('#bt-simpan').html('SIMPAN');
                        $('#frm').attr('action', '/LaporanMonitoring/Simpan');
                    }
                });
                generateListTutor(json.response.data2, json.response.data3);
                $('#lst').hide(1000);
                $('#inp').show(1000);
            }
        });
    }

    function generateListTutor(data2, data3) {
        var str = "";
        var n = 1;
        $.each(data2, function (index, t) {
            str += "<tr>"
                    + "<td>" + n + "</td>"
                    + "<td>"
                    + '<div class="row form-group">'
                    + '<input type="hidden" id="nipTutor_' + t.nipTutor + '" name="nipTutor[]" readonly="" value="' + t.nipTutor + '">'
                    + '<div class="col-sm-12">'
                    + '<input type="text" id="namaTutor_' + t.nipTutor + '" class="form-control" readonly="" value="' + t.gelar_d + t.nama + ',' + t.gelar_b + '" style="background:white;">'
                    + '</div>'
                    + '</div>'
                    + "</td>"
                    + '<td>'
                    + '<div class="row form-group" style="//padding-left:22%">'
                    + '<label for="rat_' + t.nipTutor + '" class="radio-inline col-sm-12 text-center">'
                    + '<input type="hidden" id="rat_' + t.nipTutor + '" name="rat[]" value="0">'
                    + '<input type="checkbox" id="check_rat_' + t.nipTutor + '" >'
                    + '</label>'
                    + '</div>'
                    + '</td>'
                    + '<td>'
                    + '<div class="row form-group" style="//padding-left:22%">'
                    + '<label for="cat_' + t.nipTutor + '" class="radio-inline col-sm-12 text-center">'
                    + '<input type="hidden" id="cat_' + t.nipTutor + '" name="cat[]" value="0">'
                    + '<input type="checkbox" id="check_cat_' + t.nipTutor + '" >'
                    + '</label>'
                    + '</div>'
                    + '</td>'
                    + '<td>'
                    + '<div class="row form-group" style="//padding-left:22%">'
                    + '<label for="st_' + t.nipTutor + '" class="radio-inline col-sm-12 text-center">'
                    + '<input type="hidden" id="st_' + t.nipTutor + '" name="st[]" value="0">'
                    + '<input type="checkbox" id="check_st_' + t.nipTutor + '">'
                    + '</label>'
                    + '</div>'
                    + '</td>'
                    + '<td>'
                    + '<div class="row form-group" style="//padding-left:22%">'
                    + '<label for="pengesahan_' + t.nipTutor + '" class="radio-inline col-sm-12 text-center">'
                    + '<input type="hidden" id="pengesahan_' + t.nipTutor + '" name="pengesahan[]" value="0">'
                    + '<input type="checkbox" id="check_pengesahan_' + t.nipTutor + '">'
                    + '</label>'
                    + '</div>'
                    + '</td>'
                    + '<td>'
                    + '<div class="row form-group" style="//padding-left:22%">'
                    + '<label for="kisi_' + t.nipTutor + '" class="radio-inline col-sm-12 text-center">'
                    + '<input type="hidden" id="kisi_' + t.nipTutor + '" name="kisi[]" value="0">'
                    + '<input type="checkbox" id="check_kisi_' + t.nipTutor + '">'
                    + '</label>'
                    + '</div>'
                    + '</td>'
                    + "</tr>";
            n++;
        });
        $('#tblTutor tbody').html(str);
        $('input[type=radio], input[type=checkbox]').iCheck('destroy');
        $('input[type=radio], input[type=checkbox]').iCheck({
            checkboxClass: 'icheckbox_square-red',
            radioClass: 'iradio_square-red',
            increaseArea: '20%' // optional
        });

        $.each(data3, function (index, t) {
            $('#rat_' + t.nipTutor).val(t.rat);
            if (t.rat == 1) {
                $('#check_rat_' + t.nipTutor).iCheck('check');
            }
            $('#cat_' + t.nipTutor).val(t.cat);
            if (t.cat == 1) {
                $('#check_cat_' + t.nipTutor).iCheck('check');
            }
            $('#st_' + t.nipTutor).val(t.st);
            if (t.st == 1) {
                $('#check_st_' + t.nipTutor).iCheck('check');
            }
            $('#pengesahan_' + t.nipTutor).val(t.pengesahan);
            if (t.pengesahan == 1) {
                $('#check_pengesahan_' + t.nipTutor).iCheck('check');
            }
            $('#kisi_' + t.nipTutor).val(t.kisi);
            if (t.kisi == 1) {
                $('#check_kisi_' + t.nipTutor).iCheck('check');
            }
        });
    }

    function batal() {
        getting_data();
        $('#tblTutor tbody').html("");
        $('#idJadwal').val("");
        $('#kabupaten').html(": ");
        $('#pokjar').html(": ");
        $('#alamat').html(": ");
        $('#nama_pm').html(": ");
        $('#nip_pm').html(": ");
        $('#jab_pm').html(": ");
        $('#waktu').html(": ");
        $('#frm')[0].reset();
        $('#lst').show(1000);
        $('#inp').hide(1000);
    }

    $(document).ready(function () {
        batal();
        $('.datepicker').datepicker({
            autoclose: true,
            todayBtn: "linked",
            format: "yyyy-mm-dd"
        });

        $('input[type=radio], input[type=checkbox]').iCheck({
            checkboxClass: 'icheckbox_square-red',
            radioClass: 'iradio_square-red',
            increaseArea: '20%' // optional
        });

        $('#uraianHasil textarea').keypress(function (event) {
            if (event.which == 13) {
                event.preventDefault();
                this.value = this.value + "\n";
            }
        });

        var fl = '{flash}';
        if (fl != 'none') {
            var json = {flash};
            var tipe = 'info';
            if (json.metaData.code == 201) {
                tipe = 'info';
            } else {
                tipe = 'danger';
            }
            $.notify({
                // options
                message: json.response.message,
            }, {
                delay: 5000,
                timer: 1000,
                type: tipe
            });
        }
    });

    $(document).on('ifChecked ifUnchecked', 'input', function (event) {
        var hid = event.target.id;
        hid = hid.replace('check_', '');
        if (event.type == 'ifChecked') {
            $('#' + hid).val(1);
        } else {
            $('#' + hid).val(0);
        }
    });
</script>