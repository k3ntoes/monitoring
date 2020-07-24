<style>
    .form-control:focus, .select2-container *:focus {
        border-color: #FF0000;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6);
    }
</style>

<section class="content-header"> 
    <h1>
        Master
	  <small>Tutor</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Tutor</li>
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
			  <table class="table table-bordered table-striped table-hover" id="listTutor">
				<thead>
				    <tr>
					  <th>NIP</th>
					  <th>Nama Tutor</th>
					  <th>Alamat</th>
					  <th>Telp</th>
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
				    <label for="nip">NIP</label>
				    <input type="text" class="form-control" id="nip" name="nip" placeholder="NIP">
				</div>

				<div class="form-group">
				    <label for="gelar_d">Gelar Depan</label>
				    <input type="text" class="form-control" id="gelar_d" name="gelar_d" placeholder="Gelar Depan">
				</div>

				<div class="form-group">
				    <label for="nama">nama</label>
				    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
				</div>

				<div class="form-group">
				    <label for="gelar_b">Gelar Belakang</label>
				    <input type="text" class="form-control" id="gelar_b" name="gelar_b" placeholder="Gelar Belakang">
				</div>

				<div class="form-group">
				    <label for="alamat">Alamat</label>
				    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
				</div>

				<div class="form-group">
				    <label for="telp">Telp/HP</label>
				    <input type="text" class="form-control" id="telp" name="telp" placeholder="Telp/HP">
				</div>

				<br/>
				<br/>
				<br/>
				<div class="form-group">
				    <span class="btn btn-danger col-sm-5" id="batal" onclick="batal();">BATAL</span>
				    <div class="col-sm-2">
					  <input type="hidden" id="idTutor" name="idTutor">
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
	  $.getJSON('/Tutor/ListTutor', function (json) {
		if (json.metaData.code == 200) {
		    var str;
		    $.each(json.response.data, function (index, t) {
			  var e_val = "'" + t.idTutor + "','" + t.nip + "','" + t.gelar_d + "','" + t.nama + "','" + t.gelar_b + "','" + t.alamat + "','" + t.telp + "'";
			  str += "<tr>"
				    + "<td>" + t.nip + "</td>"
				    + "<td>" + t.gelar_d + "." + t.nama + "," + t.gelar_b + "</td>"
				    + "<td>" + t.alamat + "</td>"
				    + "<td>" + t.telp + "</td>"
				    + "<td nowrap>"
				    + '<div class="btn-group btn-group-xs" role="group" aria-label="Basic example" id="rst">'
				    + "<span class='btn btn-success glyphicon glyphicon-pencil' onclick=\"edit(" + e_val + ")\" id='bEdit'></span>"
				    + "<span class='btn btn-danger glyphicon glyphicon-remove' onclick=\"remove(" + t.idTutor + ")\" id='bHapus'></span>"
				    + '</div>'
				    + "</td></tr>";
		    });
		    $('#listTutor tbody').append(str);
		    $('#listTutor').DataTable();
		}
	  });
    }

    function tambah() {
	  $('#lst').hide(1000);
	  $('#inp').show(1000);
	  $('#judul').html('INPUT DATA');
	  $('#frm').attr('action', '/Tutor/Simpan');
	  $("#idTutor").val("");
	  $("#nip").val("");
	  $("#gelar_d").val("");
	  $("#nama").val("");
	  $("#gelar_b").val("");
	  $("#alamat").val("");
	  $("#telp").val("");
	  $('#upd').val(0);
	  $('#simpan').html('SIMPAN');
    }

    function batal() {
	  $('#lst').show(1000);
	  $('#inp').hide(1000);
    }

    function edit(idTutor, nip, gelar_d, nama, gelar_b, alamat, telp) {
	  $('#lst').hide(1000);
	  $('#inp').show(1000);
	  $('#judul').html('EDIT DATA');
	  $('#frm').attr('action', '/Tutor/Update');
	  $("#idTutor").val(idTutor);
	  $("#nip").val(nip);
	  $("#gelar_d").val(gelar_d);
	  $("#nama").val(nama);
	  $("#gelar_b").val(gelar_b);
	  $("#alamat").val(alamat);
	  $("#telp").val(telp);
	  $('#upd').val(1);
	  $('#simpan').html('UPDATE');
    }

    function remove(idTutor) {
	  var x = confirm("Yakin Akan Menghapus Data???");

	  if (x == true) {
		window.location.href = "/Tutor/Remove/" + idTutor;
	  }
    }

    $(document).ready(function () {
	  getting_data();
	  var fl = '{flash}';
	  if (fl != 'none') {
		var json = {flash};
		var tipe = 'info';
		if (json.metaData.code == 201) {
		    tipe = 'info';
		}
		else {
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