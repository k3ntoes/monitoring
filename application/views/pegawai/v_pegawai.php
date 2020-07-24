<style>
    .form-control:focus, .select2-container *:focus {
        border-color: #FF0000;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6);
    }
</style>

<section class="content-header"> 
    <h1>
        Master
	  <small>Pegawai</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Pegawai</li>
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
			  <table class="table table-bordered table-striped table-hover" id="listPegawai">
				<thead>
				    <tr>
					  <th>Nip</th>
					  <th>Jabatan</th>
					  <th>Nama</th>
					  <th>Alamat</th>
					  <th>Level</th>
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
				    <input type="text" class="form-control" id="nip" name="nip" placeholder="NIP" required="">
				</div>

				<div class="form-group">
				    <label for="idJabatan">Jabatan</label>
				    <select class="form-control" id="idJabatan" name="idJabatan" required="">
				    </select>
				</div>

				<div class="form-group">
				    <label for="gelar_d">Gelar Depan</label>
				    <input type="text" class="form-control" id="gelar_d" name="gelar_d" placeholder="Gelar Depan">
				</div>

				<div class="form-group">
				    <label for="nama">Nama</label>
				    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required="">
				</div>

				<div class="form-group">
				    <label for="gelar_b">Gelar Belakang</label>
				    <input type="text" class="form-control" id="gelar_b" name="gelar_b" placeholder="Gelar Belakang">
				</div>

				<div class="form-group">
				    <label for="alamat">Alamat</label>
				    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required="">
				</div>

				<div class="form-group">
				    <label for="pswd">Password <small id="msg_1" class="text-danger"></small></label>
				    <input type="password" class="form-control" id="pswd" name="pswd" placeholder="Password">
				</div>

				<div class="form-group">
				    <label for="pswd1">Ulang Password <small id="msg_2" class="text-danger"></small></label>
				    <input type="password" class="form-control" id="pswd1" name="pswd1" placeholder="Ulang Password">
				</div>

				<div class="form-group">
				    <label for="idLevel">Level</label>
				    <select class="form-control" id="idLevel" name="idLevel" >
				    </select>
				</div>

				<br/>
				<br/>
				<br/>
				<div class="form-group">
				    <span class="btn btn-danger col-sm-5" id="batal" onclick="batal();">BATAL</span>
				    <div class="col-sm-2">
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
	  $.getJSON('/Pegawai/ListPegawai', function (json) {
		if (json.metaData.code == 200) {
		    var str;
		    $.each(json.response.data, function (index, t) {
			  var e_val = "'" + t.nip + "','" + t.idJabatan + "','" + t.gelar_d + "','" + t.nama + "','" + t.gelar_b + "','" + t.alamat + "','" + t.idLevel + "'";
			  str += "<tr>"
				    + "<td>" + t.nip + "</td>"
				    + "<td>" + t.jabatan + "</td>"
				    + "<td>" + t.gelar_d + t.nama + t.gelar_b + "</td>"
				    + "<td>" + t.alamat + "</td>"
				    + "<td>" + t.level + "</td>"
				    + "<td nowrap>"
				    + '<div class="btn-group btn-group-xs" role="group" aria-label="Basic example" id="rst">'
				    + "<span class='btn btn-success glyphicon glyphicon-pencil' onclick=\"edit(" + e_val + ");\" id='bEdit'></span>"
				    + "<span class='btn btn-danger glyphicon glyphicon-remove' onclick=\"remove('" + t.nip + "');\" id='bHapus'></span>"
				    + '</div>'
				    + "</td></tr>";
		    });
		    $('#listPegawai tbody').append(str);
		    $('#listPegawai').DataTable();
		}
	  });
    }

    function l_jab() {
	  $.getJSON('/Jabatan/ListJabatan', function (json) {
		if (json.metaData.code == 200) {
		    var str;
		    $.each(json.response.data, function (index, t) {
			  str += "<option value=\"" + t.idJabatan + "\">" + t.jabatan + "</option>";
		    });
		    $('#idJabatan').append(str);
		}
	  });
    }

    function l_lev() {
	  $.getJSON('/Level/ListLevel', function (json) {
		if (json.metaData.code == 200) {
		    var str;
		    $.each(json.response.data, function (index, t) {
			  str += "<option value=\"" + t.idLevel + "\">" + t.level + "</option>";
		    });
		    $('#idLevel').append(str);
		}
	  });
    }

    function autoSelect(id, val) {
	  $('select#' + id + ' option').each(function () {
		this.selected = (this.value == val);
	  });
    }

    function tambah() {
	  $('#lst').hide(1000);
	  $('#inp').show(1000);
	  $('#judul').html('INPUT DATA');
	  $('#frm').attr('action', '/Pegawai/Simpan');
	  $('#nip').removeAttr('readonly');
	  $('#nip').val('');
	  $('#gelar_d').val('');
	  $('#nama').val('');
	  $('#gelar_b').val('');
	  $('#alamat').val('');
	  $('#pswd').val('');
	  $('#pswd1').val('');
	  $('#msg_1').html('');
	  $('#msg_2').html('');
	  $('#upd').val(0);
	  $('#simpan').html('SIMPAN');
    }

    function batal() {
	  $('#lst').show(1000);
	  $('#inp').hide(1000);
    }

    function edit(nip, idJabatan, gelar_d, nama, gelar_b, alamat, idLevel) {
	  $('#lst').hide(1000);
	  $('#inp').show(1000);
	  $('#judul').html('EDIT DATA');
	  $('#frm').attr('action', '/Pegawai/Update');
	  $('#nip').attr('readonly', 'readonly');
	  $('#nip').val(nip);
	  autoSelect('idJabatan', idJabatan);
	  $('#gelar_d').val(gelar_d);
	  $('#nama').val(nama);
	  $('#gelar_b').val(gelar_b);
	  $('#alamat').val(alamat);
	  autoSelect('idLevel', idLevel);
	  $('#msg_1').html('(Kosongkan jika tidak merubah password!)');
	  $('#msg_2').html('(Kosongkan jika tidak merubah password!)');
	  $('#upd').val(1);
	  $('#simpan').html('UPDATE');
    }

    function remove(idPegawai) {
	  var x = confirm("Yakin Akan Menghapus Data???");

	  if (x == true) {
		window.location.href = "/Pegawai/Remove/" + idPegawai;
	  }
    }

    $(document).ready(function () {
	  getting_data();
	  l_jab();
	  l_lev();
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

	  $('#frm').submit(function () {
		if ($('#pswd').val() == $('#pswd1').val()) {
		    return  true;
		}
		else {
		    return false;
		}
	  });
    });
</script>