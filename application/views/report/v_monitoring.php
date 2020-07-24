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
        Report
        <small>Monitoring</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"> Report Monitoring</li>
    </ol>
</section>

<div class="content">
    <div class="row" id="lst">
        <div class="col-md-12 border pt-3 pb-3" style="padding-right: 5px; padding-left: 15px;">
            <div class="box box-warning">
                <div class="box-header">
                    <h2>REPORT FORM HASIL (SELEKSI/EVALUASI)* LOKASI TUTORIAL/UJIAN</h2>
                </div>
                <div class="box-body">
                    <form id="frm" onsubmit="return false;">
                        <div class="form-group">
                            <label for="masa" class="col-sm-1">Masa</label>
                            <div class="col-sm-2">
                                <select name="masa" id="masa" class="form-control"></select>
                            </div>
                            <div class="col-sm-1">
                                <button id="tampil" class="btn btn-warning btn-block" onclick="get_data();">TAMPIL</button>
                            </div>
                            <div class="col-sm-1">
                                <span id="cetak" class="btn btn-success btn-block" onclick="cetak();">CETAK</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 border pt-3 pb-3" style="padding-right: 5px; padding-left: 15px;">
            <div class="box box-success">
                <div class="box-body">
                    <table id="view_laporan" class="table table-bordered table-hovered datatable" width="100%" border="1">
                        <thead>
                            <tr>
                                <th>Masa</th>
                                <th>Pemonitor</th>
                                <th>Lokasi</th>
                                <th>Tanggal Monitoring</th>
                                <th>Pokjar</th>
                                <th>Bukti Pendukung</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function listMasa() {
        $.getJSON('/Report/ListMasa', function (json) {
            if (json.metaData.code == 200) {
                var str = "";
                $.each(json.response.data, function (index, t) {
                    str += '<option value="' + t.masa + '">' + t.masa + '</option>';
                });
                $('#masa').append(str);
            }
        });
    }

    function get_data() {
        var masa = $('#masa').val();
        $('#view_laporan tbody').html("");
        $.getJSON('/Report/ListMonitoring/' + masa, function (json) {
            if (json.metaData.code == 200) {
                var str = "";
                $.each(json.response.data, function (index, t) {
                    str += '<tr>'
                            + "<td>" + t.masa + "</td>"
                            + "<td>" + t.gelar_d + t.nama + "," + t.gelar_b + "<br>" + t.nipPemonitor + "</td>"
                            + "<td>" + t.alamat + "</td>"
                            + "<td>" + t.hariLaksana + "," + t.tglLaksana + "</td>"
                            + "<td>" + t.pokjar + "</td>"
                            + "<td>"
                            + "<a href='/asset/uploads/" + t.sppd + "' target='_blank' >SPPD</a> | "
                            + "<a href='/asset/uploads/" + t.bap + "' target='_blank' >BAP</a> | "
                            + "<a href='/asset/uploads/" + t.st + "' target='_blank' >S. Tugas</a>"
                            + "</td>"
                            + "</tr>";

                });
                $('#view_laporan tbody').html(str);
            }
        });
    }

    function cetak() {
        var masa = $('#masa').val();
        window.open('/Report/CetakListMonitoring/' + masa);
    }

    $(document).ready(function () {
        listMasa();
    });
</script>