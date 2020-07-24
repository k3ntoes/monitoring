<style>
    .form-control:focus, .select2-container *:focus {
        border-color: #FF0000;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6);
    }
</style>

<section class="content-header"> 
    <h1>
        Master
	  <small>Level</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Level</li>
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
			  <table class="table table-bordered table-striped table-hover" id="listLevel">
				<thead>
				    <tr>
					  <th>ID</th>
					  <th>Nama Level</th>
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
				    <label for="idLevel">ID Level</label>
				    <input type="text" class="form-control" id="idLevel" name="idLevel" value="" readonly="">
				</div>

				<div class="form-group">
				    <label for="level">Level</label>
				    <input type="text" class="form-control" id="level" name="level" placeholder="level">
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
	  $.getJSON('/Level/ListLevel', function (json) {
		if (json.metaData.code == 200) {
		    var str;
		    $.each(json.response.data, function (index, t) {
			  str += "<tr>"
				    + "<td>" + t.idLevel + "</td>"
				    + "<td>" + t.level + "</td>"
				    + "<td nowrap>"
				    + '<div class="btn-group btn-group-xs" role="group" aria-label="Basic example" id="rst">'
				    + "<span class='btn btn-success glyphicon glyphicon-pencil' onclick=\"edit(" + t.idLevel + ",'" + t.level + "')\" id='bEdit'></span>"
				    + "<span class='btn btn-danger glyphicon glyphicon-remove' onclick=\"remove(" + t.idLevel + ")\" id='bHapus'></span>"
				    + '</div>'
				    + "</td></tr>";
		    });
		    $('#listLevel tbody').append(str);
		    $('#listLevel').DataTable();
		}
	  });
    }

    function tambah() {
	  $('#lst').hide(1000);
	  $('#inp').show(1000);
	  $('#judul').html('INPUT DATA');
	  $('#frm').attr('action', '/Level/Simpan');
	  $('#idLevel').val('');
	  $('#level').val('');
	  $('#upd').val(0);
	  $('#simpan').html('SIMPAN');
    }

    function batal() {
	  $('#lst').show(1000);
	  $('#inp').hide(1000);
    }

    function edit(idLevel, level) {
	  $('#lst').hide(1000);
	  $('#inp').show(1000);
	  $('#judul').html('EDIT DATA');
	  $('#frm').attr('action', '/Level/Update');
	  $('#idLevel').val(idLevel);
	  $('#level').val(level);
	  $('#upd').val(1);
	  $('#simpan').html('UPDATE');
    }

    function remove(idLevel) {
	  var x = confirm("Yakin Akan Menghapus Data???");

	  if (x == true) {
		window.location.href = "/Level/Remove/" + idLevel;
	  }
    }

    $(document).ready(function () {
	  getting_data();
	  var fl='{flash}';
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