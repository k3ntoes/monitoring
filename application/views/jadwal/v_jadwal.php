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
        Master
        <small>Jadwal</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Jadwal</li>
    </ol>
</section>
<div class="content">
    <div class="row" id="lst">
        <div class="col-md-12 border pt-3 pb-3" style="padding-right: 5px; padding-left: 15px;">
            <div class="box box-warning">
                <div class="box-header">
                    <button class="btn btn-warning btn-block" onclick="tambah();">TAMBAH DATA</button>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped table-hover" id="listJadwal" width="100%">
                        <thead>
                            <tr>
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="inp" style="display: none;">
        <div class="col-md-12 border pt-3 pb-3" style="padding-right: 5px; padding-left: 15px;">
            <div class="box box-info">
                <div class="box-header"><h3 id="judul">INPUT DATA</h3></div>
                <div class="box-body">
                    <form action="#" method="post" id="frm">
                        <div class="form-group">
                            <label for="masa">Masa</label>
                            <input type="text" class="form-control" id="masa" name="masa" placeholder="Masa" required="">
                        </div>

                        <div class="form-group">
                            <label for="idPokjar">Pokjar</label>
                            <select class="form-control select2" id="idPokjar" name="idPokjar" required="">
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="hariLaksana">Hari Pelaksanaan</label>
                            <select class="form-control select2" id="hariLaksana" name="hariLaksana" required="">
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tglLaksana">Tanggal pelaksanaan</label>
                            <div class="input-group date" data-date-format="yyyy-mm-dd">
                                <input type="text" name="tglLaksana" id="tglLaksana" class="form-control input-sm datepicker" required="required" placeholder="yyyy-mm-dd" value="<?php echo date("Y-m-d"); ?>" readonly="">
                                <div class="input-group-addon" >
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nipPj">Penanggung Jawab</label>
                            <select class="form-control select2" id="nipPj" name="nipPj" required="" >
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nipPemonitor">Pemonitor</label>
                            <select class="form-control select2" id="nipPemonitor" name="nipPemonitor" required="" >
                            </select>
                        </div>

                        <fieldset>
                            <legend>Tutor</legend>
                            <div id="base_field" class="form-group has-success has-feedback">
                                <div class="input-group">
                                    <select class="form-control input-sm select2" id="nipTutor" name="nipTutor[]"></select>
                                    <div class="btn btn-success input-group-addon" id="addTutor"><span class="glyphicon glyphicon-plus"></span></div>
                                </div>
                            </div>
                            <div id="listTutor"></div>
                        </fieldset>


                        <br/>
                        <br/>
                        <br/>
                        <div class="form-group">
                            <span class="btn btn-danger col-sm-5" id="batal" onclick="batal();">BATAL</span>
                            <div class="col-sm-2">
                                <input type="hidden" id="idJadwal" name="idJadwal">
                                <!--<input type="hidden" id="tglInput" name="tglInput">-->
                                <input type="hidden" id="upd" name="upd" value="0">
                            </div>
                            <button class="btn btn-success col-sm-5" id="simpan" >SIMPAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function getting_data() {
        $.getJSON('/Jadwal/ListJadwal', function (json) {
            if (json.metaData.code == 200) {
                var str;
                $.each(json.response.data, function (index, t) {
                    var e_val = "'" + t.idJadwal + "','" + t.tglInput + "','" + t.masa + "','" + t.idPokjar + "','" + t.hariLaksana + "','" + t.tglLaksana + "','" + t.nipPj + "','" + t.nipPm + "'";
                    str += "<tr>"
                            + "<td>" + t.tglInput + "</td>"
                            + "<td>" + t.masa + "</td>"
                            + "<td>" + t.pokjar + "</td>"
                            + "<td>" + t.nipPengurus + "</td>"
                            + "<td>" + t.namaPengurus + "</td>"
                            + "<td>" + t.alamat + "</td>"
                            + "<td>" + t.kabupaten + "</td>"
                            + "<td>" + t.hariLaksana + "," + t.tglLaksana + "</td>"
                            + "<td>" + t.nipPm + "</td>"
                            + "<td>" + t.gelar_d_pm + "." + t.nama_pm + "," + t.gelar_b_pm + "</td>" + "<td>" + t.jab_pm + "</td>"
                            + "<td>" + t.nipPj + "</td>"
                            + "<td>" + t.gelar_d_pj + "." + t.nama_pj + "," + t.gelar_b_pj + "</td>"
                            + "<td>" + t.jab_pj + "</td>"
                            + "<td nowrap>"
                            + '<div class="btn-group btn-group-xs" role="group" aria-label="Basic example" id="rst">'
                            + "<span class='btn btn-success glyphicon glyphicon-pencil' onclick=\"edit(" + t.idJadwal + ");\" id='bEdit'></span>"
                            + "<span class='btn btn-danger glyphicon glyphicon-remove' onclick=\"remove('" + t.idJadwal + "');\" id='bHapus'></span>"
                            + '</div>'
                            + "</td></tr>";
                });
                $('#listJadwal tbody').append(str);
                $('#listJadwal').DataTable({
                    "scrollX": true
                });
            }
        });
    }

    function l_hari() {
        var hari = [
            {hari: "Senin"},
            {hari: "Selasa"},
            {hari: "Rabu"},
            {hari: "Kamis"},
            {hari: "Jumat"},
            {hari: "Sabtu"},
            {hari: "Minggu"}
        ];
        var str = "<option value=''>--Pilih--</option>";
        $.each(hari, function (index, t) {
            str += "<option value=\"" + t.hari + "\">" + t.hari + "</option>";
        });
        $('#hariLaksana').append(str);
    }

    function l_pokjar() {
        $.getJSON('/Pokjar/ListPokjar', function (json) {
            if (json.metaData.code == 200) {
                var str = "<option value=''>--Pilih--</option>";
                $.each(json.response.data, function (index, t) {
                    str += "<option value=\"" + t.idPokjar + "\">" + t.pokjar + " - " + t.namaPengurus + "</option>";
                });
                $('#idPokjar').append(str);
            }
        });
    }

    function l_jab() {
        $.getJSON('/Jabatan/ListJabatan', function (json) {
            if (json.metaData.code == 200) {
                var str = "<option value=''>--Pilih--</option>";
                $.each(json.response.data, function (index, t) {
                    str += "<option value=\"" + t.idJabatan + "\">" + t.jabatan + "</option>";
                });
                $('#idJabatan').append(str);
            }
        });
    }

    function l_peg() {
        $.getJSON('/Pegawai/ListPegawai', function (json) {
            if (json.metaData.code == 200) {
                var str = "<option value=''>--Pilih--</option>";
                $.each(json.response.data, function (index, t) {
                    str += "<option value=\"" + t.nip + "\">"
                            + t.nip + " - " + t.jabatan + " - " + t.gelar_d + "." + t.nama + "," + t.gelar_b
                            + "</option>";
                });
                $('#nipPj').append(str);
                $('#nipPemonitor').append(str);
            }
        });
    }

    function l_tutor(id, nip) {
        var jqTut = $.getJSON('/Tutor/ListTutor', function (json) {
            if (json.metaData.code == 200) {
                var str = "<option value=''>--Pilih--</option>";
                $.each(json.response.data, function (index, t) {
                    var slctd = "";
                    if (nip == t.nip) {
                        slctd = "selected";
                    }
                    str += "<option value=\"" + t.nip + "\" " + slctd + ">"
                            + t.nip + " - " + t.gelar_d + "." + t.nama + "," + t.gelar_b
                            + "</option>";
                });
                $(id).append(str);
            }
        });
        return jqTut;
    }

    function tambah() {
        $('#lst').hide(1000);
        $('#inp').show(1000);
        $('#judul').html('INPUT DATA');
        $('#frm').attr('action', '/Jadwal/Simpan');
        $('#idJadwal').val("");
        $('#tglInput').val("");
        $('#masa').val("");
        $('#idPokjar').val("").trigger('change');
        $('#hariLaksana').val("").trigger('change');
        $('#tglLaksana').val("");
        $('#nipPj').val("").trigger('change');
        $('#nipPemonitor').val("").trigger('change');
        $('#upd').val(0);
        $('#simpan').html('SIMPAN');
    }

    function batal() {
        $('#lst').show(1000);
        $('#inp').hide(1000);
        $('#nipTutor').val('').trigger('change');
        $('#listTutor').html('');
        
    }

    function autoSelect(id, val) {
        $('select#' + id + ' option').each(function () {
            this.selected = (this.value == val);
        });
    }

    function edit(idJadwal) {
        $.getJSON('/Jadwal/ListJadwalDet/' + idJadwal, function (json) {
            if (json.metaData.code == 200) {
                $('#lst').hide(1000);
                $('#inp').show(1000);
                $('#judul').html('EDIT DATA');
                $('#frm').attr('action', '/Jadwal/Update');

                $.each(json.response.data, function (index, t) {
                    $('#idJadwal').val(t.idJadwal);
                    $('#tglInput').val(t.tglInput);
                    $('#masa').val(t.masa);
                    $('#idPokjar').val(t.idPokjar).trigger('change');
                    $('#hariLaksana').val(t.hariLaksana).trigger('change');
                    $('#tglLaksana').val(t.tglLaksana);
                    $('#nipPj').val(t.nipPj).trigger('change');
                    $('#nipPemonitor').val(t.nipPm).trigger('change');
                });

                if (json.response.lTutor.count > 0) {
                    $('#nipTutor').val(json.response.lTutor.data[0].nipTutor).trigger('change');
                    for (var i = 1; i < json.response.lTutor.count; i++) {
                        var listTutor = $('#listTutor');
                        var rand_num = Math.floor(Math.random() * 100);
                        var fieldHtml = '<div class="form-group has-warning has-feedback">'
                                + '<div class="input-group">'
                                + '<select class="form-control select2" id="nipTutor_' + rand_num + '" name="nipTutor[]">'
                                + '</select>'
                                + '<div class="btn btn-danger input-group-addon" id="removeTutor"><span class="glyphicon glyphicon-minus"></span></div>'
                                + '</div>'
                                + '</div>';
                        listTutor.append(fieldHtml);
                        var nTutor = json.response.lTutor.data[i].nipTutor;
                        l_tutor('#nipTutor_' + rand_num, json.response.lTutor.data[i].nipTutor);

                        if (i == json.response.lTutor.count - 1) {
                            setTimeout(function () {
                                $('.select2').select2();
                            }, 1000);
                        }
                    }

                }


	  $('#upd').val(1);
	  $('#simpan').html('UPDATE');
            }
        });

    }

    function remove(idJadwal) {
        var x = confirm("Yakin Akan Menghapus Data???");

        if (x == true) {
            window.location.href = "/Jadwal/Remove/" + idJadwal;
        }
    }

    $(document).ready(function () {
        var addTutor = $('#addTutor');
        var listTutor = $('#listTutor');

        $(addTutor).on('click', function () {
            var rand_num = Math.floor(Math.random() * 100);
            var fieldHtml = '<div class="form-group has-warning has-feedback">'
                    + '<div class="input-group">'
                    + '<select class="form-control select2" id="nipTutor_' + rand_num + '" name="nipTutor[]">'
                    + '</select>'
                    + '<div class="btn btn-danger input-group-addon" id="removeTutor"><span class="glyphicon glyphicon-minus"></span></div>'
                    + '</div>'
                    + '</div>';
            listTutor.append(fieldHtml);
            l_tutor('#nipTutor_' + rand_num, "");
            setTimeout(function () {
                $('.select2').select2();
            }, 100);

        });

        $(listTutor).on('click', '#removeTutor', function (e) {
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
        });

        $('.datepicker').datepicker({
            autoclose: true,
            todayBtn: "linked",
            format: "yyyy-mm-dd"
        });
        var placeholder = "Select a State";
        $('.select2').select2();
        getting_data();
        l_pokjar();
        l_hari();
        l_jab();
        l_peg();
        l_tutor('#nipTutor');
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

        $('#frm').submit(function () {
//		if ($('#pswd').val() == $('#pswd1').val()) {
//		    return  true;
//		}
//		else {
//		    return false;
//		}
        });
    });
</script>