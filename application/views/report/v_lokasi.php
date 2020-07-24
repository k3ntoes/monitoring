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
        Report Petugas
        <small>Monitoring</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Report Petugas Monitoring</li>
    </ol>
</section>

<div class="content">
    <div class="row" id="lst">
        <div class="col-md-12 border pt-3 pb-3" style="padding-right: 5px; padding-left: 15px;">
            <div class="box box-warning">
                <div class="box-header">
                    <!--<button class="btn btn-warning btn-block" onclick="tambah();">TAMBAH DATA</button>-->
                    <h2>Report Hasil Monitoring LOKASI TUTORIAL/UJIAN</h2>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped table-hover" id="listJadwal" width="100%">
                        <thead>
                            <tr>
                                <th>Masa</th>
                                <th>Pokjar</th>
                                <th>Nip Pengurus</th>
                                <th>Pengurus</th>
                                <th>Alamat</th>
                                <th>Kabupaten</th>
                                <th>Hari, Tgl Pelaksanaan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

    

<script>
    function getting_data() {
        $.getJSON('/monitoring/Report/ListLokasi', function (json) {
            if (json.metaData.code == 200) {
                var str;
                $.each(json.response.data, function (index, t) {
                    var e_val = "'" + t.idJadwal + "','" + t.kabupaten + "','" + t.pokjar + "','" + t.alamat + "','" + t.nama_pm + "','" + t.nipPm + "','" + t.jab_pm + "','" + "','" + t.hariLaksana + "','" + t.tglLaksana + "'";
                    str += "<tr>"
                            + "<td>" + t.masa + "</td>"
                            + "<td>" + t.pokjar + "</td>"
                            + "<td>" + t.nipPemonitor + "</td>"
                            + "<td>" + t.nama + "</td>"
                            + "<td>" + t.alamat + "</td>"
                            + "<td>" + t.alamat + "</td>"
                            + "<td>" + t.hariLaksana + "," + t.tglLaksana + "</td>"
                            + "</tr>";
                });
                $('#listJadwal tbody').append(str);
                $('#listJadwal').DataTable({
                    "scrollX": true
                });
            }
        });
    }

    function edit(idJadwal) {
        cari_data(idJadwal);

    }

    function cari_data(idJadwal) {
        var res;
        $.getJSON('Monitoring/getData/' + idJadwal, function (json) {
            if (json.metaData.code == 200) {
                if (json.metaData.code == 200) {
                    $.each(json.response.data, function (index, t) {
                        $('#idJadwal').val(t.idJadwal);
                        $('#kabupaten').html(": " + t.kabupaten);
                        $('#pokjar').html(": " + t.pokjar);
                        $('#alamat').html(": " + t.alamat);
                        $('#nama_pm').html(": " + t.nama_pm);
                        $('#nip_pm').html(": " + t.nipPm);
                        $('#jab_pm').html(": " + t.jab_pm);
                        $('#waktu').html(": " + t.hariLaksana + ", " + t.tglLaksana);
                        if (t.idJadwalMonitoring != null) {
                            $('#upd').val(1);
                            $('#frm').attr('action', '/Monitoring/Update');
                        } else {
                            $('#upd').val(0);
                            $('#frm').attr('action', '/Monitoring/Simpan');
                        }
                    });
                }
            } else {
                $.getJSON('Jadwal/ListJadwalDet/' + idJadwal, function (json) {

                });
            }
        });
    }

    $(document).ready(function () {
        getting_data();

        $('#frm').submit(function () {
//            if ($('#upd').val() == 0) {
//                $.post("/Monitoring/Simpan", $('#frm').serializeArray(), function (data) {
//
//                });
//            } else {
//                $.post("/Monitoring/Update", $('#frm').serializeArray(), function (data) {
//
//                });
//            }
//            return false;
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
</script>