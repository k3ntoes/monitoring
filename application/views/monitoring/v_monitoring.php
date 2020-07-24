<style>
    .form-control:focus, .select2-container *:focus {
        border-color: #FF0000;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6);
    }
    .select2-container {
        display: block;
    }
    th{
        text-align: center;
        font-size: medium;
    }
</style>

<section class="content-header"> 
    <h1>
        Transaksi
        <small>Monitoring</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Monitoring</li>
    </ol>
</section>

<div class="content">
    <div class="row" id="lst">
        <div class="col-md-12 border pt-3 pb-3" style="padding-right: 5px; padding-left: 15px;">
            <div class="box box-warning">
                <div class="box-header">
                    <!--<button class="btn btn-warning btn-block" onclick="tambah();">TAMBAH DATA</button>-->
                    <h2>FORM (SELEKSI/EVALUASI)* LOKASI TUTORIAL/UJIAN</h2>
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

                    <div class="row form-group">
                        <label class="col-sm-2">Wilayah</label>
                        <label class="col-sm-8" id="kabupaten">: wilayah</label>
                    </div>

                    <div class="row form-group">
                        <label class="col-sm-2">Nama Lokasi/Instansi</label>
                        <label class="col-sm-8" id="pokjar">: Nama Lokasi/Instansi</label>
                    </div>

                    <div class="row form-group">
                        <label class="col-sm-2">Alamat</label>
                        <label class="col-sm-8" id="alamat">: Alamat</label>
                    </div>

                    <div class="row form-group">
                        <label class="col-sm-2">Nama Petugas</label>
                        <label class="col-sm-8" id="nama_pm">: Nama Petugas</label>
                    </div>

                    <div class="row form-group">
                        <label class="col-sm-2">NIP</label>
                        <label class="col-sm-8" id="nip_pm">: NIP</label>
                    </div>

                    <div class="row form-group">
                        <label class="col-sm-2">Jabatan</label>
                        <label class="col-sm-8" id="jab_pm">: Jabatan</label>
                    </div>

                    <div class="row form-group">
                        <label class="col-sm-2">Waktu Pelaksanaan</label>
                        <label class="col-sm-8" id="waktu">: Waktu Pelaksanaan</label>
                    </div>

                    <form action="#" method="post" id="frm">
                        <div class="row form-group">
                            <label class="col-sm-2">Kegiatan</label>
                            <label class="col-sm-1">:</label>
                            <div class="col-sm-1" style="margin-left: -7.9%;">
                                <select name="kegiatan" id="kegiatan" class="form-control">
                                    <option value="0">TTM</option>
                                    <option value="1">PRAKTIK</option>
                                    <option value="2">PRAKTIKUM</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-sm-2">Jumlah Kelas</label>
                            <label class="col-sm-1">:</label>
                            <div class="col-sm-1" style="margin-left: -7.9%;">
                                <input type="text" id="jmlKelas" name="jmlKelas" class="form-control" placeholder="jumlah kelas" required="">
                            </div>
                        </div>

                        <input type="hidden" name="idJadwal" id="idJadwal">
                        <input type="hidden" name="upd" id="upd" value="0">
                        <table class="table table-bordered table-striped table-hover" id="listItem" width="100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Item Seleksi</th>
                                    <th>Persyaratan</th>
                                    <th>Kondisi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><label>1.</label></td>
                                    <td>
                                        <input type="hidden" name="itemSeleksi[]" id="itemSeleksi0" value="Angkutan Umum">
                                        <label>Angkutan Umum</label>
                                    </td>
                                    <td>
                                        <input type="hidden" name="persyaratan[]" id="persyaratan0" value="Ada">
                                        <label>Ada</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select name="kondisi[]" id="kondisi0" class="form-control">
                                                <option value="Ada">Ada</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>2.</label></td>
                                    <td>
                                        <input type="hidden" name="itemSeleksi[]" id="itemSeleksi1" value="Jarak akses mahasiswa">
                                        <label>Jarak akses mahasiswa</label>
                                    </td>
                                    <td>
                                        <input type="hidden" name="persyaratan[]" id="persyaratan1" value="Relatif sama">
                                        <label>Relatif sama</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select name="kondisi[]" id="kondisi1" class="form-control">
                                                <option value="Terjangkau">Terjangkau</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>3.</label></td>
                                    <td>
                                        <input type="hidden" name="itemSeleksi[]" id="itemSeleksi2" value="Ukuran meja/kursi">
                                        <label>Ukuran meja/kursi</label>
                                    </td>
                                    <td>
                                        <input type="hidden" name="persyaratan[]" id="persyaratan2" value="Standar">
                                        <label>Standar</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select name="kondisi[]" id="kondisi2" class="form-control">
                                                <option value="Layak">Layak</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>4.</label></td>
                                    <td>
                                        <input type="hidden" name="itemSeleksi[]" id="itemSeleksi3" value="Toilet">
                                        <label>Toilet</label>
                                    </td>
                                    <td>
                                        <input type="hidden" name="persyaratan[]" id="persyaratan3" value="Ada">
                                        <label>Ada</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select name="kondisi[]" id="kondisi3" class="form-control">
                                                <option value="Layak">Layak</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>5.</label></td>
                                    <td>
                                        <input type="hidden" name="itemSeleksi[]" id="itemSeleksi4" value="Penerangan">
                                        <input type="hidden" name="itemSeleksi[]" id="itemSeleksi5" value="Penerangan">
                                        <label>Penerangan</label>
                                    </td>
                                    <td>
                                        <input type="hidden" name="persyaratan[]" id="persyaratan4" value="Min jendela besar">
                                        <input type="hidden" name="persyaratan[]" id="persyaratan5" value="ada lampu/listrik">
                                        <label>Min jendela besar, <br>ada lampu/listrik</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select name="kondisi[]" id="kondisi4" class="form-control">
                                                <option value="Baik">Baik</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                            <select name="kondisi[]" id="kondisi5" class="form-control">
                                                <option value="Menyala">Menyala</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>6.</label></td>
                                    <td>
                                        <input type="hidden" name="itemSeleksi[]" id="itemSeleksi6" value="Ventilasi">
                                        <label>Ventilasi</label>
                                    </td>
                                    <td>
                                        <input type="hidden" name="persyaratan[]" id="persyaratan6" value="Min jendela besar">
                                        <label>Min jendela besar</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select name="kondisi[]" id="kondisi6" class="form-control">
                                                <option value="Baik">Baik</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>7.</label></td>
                                    <td>
                                        <input type="hidden" name="itemSeleksi[]" id="itemSeleksi7" value="Kebisingan">
                                        <label>Kebisingan</label>
                                    </td>
                                    <td>
                                        <input type="hidden" name="persyaratan[]" id="persyaratan7" value="Tenang/Tidak Bising">
                                        <label>Tenang/Tidak Bising</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select name="kondisi[]" id="kondisi7" class="form-control">
                                                <option value="Bising">Bising</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>8.</label></td>
                                    <td>
                                        <input type="hidden" name="itemSeleksi[]" id="itemSeleksi8" value="Jumlah Ruang">
                                        <label>Jumlah Ruang</label>
                                    </td>
                                    <td>
                                        <input type="hidden" name="persyaratan[]" id="persyaratan8" value="-">
                                        <label>-</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select name="kondisi[]" id="kondisi8" class="form-control">
                                                <option value="Cukup">Cukup</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>9.</label></td>
                                    <td>
                                        <input type="hidden" name="itemSeleksi[]" id="itemSeleksi9" value="Biaya Sewa">
                                        <label>Biaya Sewa</label>
                                    </td>
                                    <td>
                                        <input type="hidden" name="persyaratan[]" id="persyaratan9" value="-">
                                        <label>-</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select name="kondisi[]" id="kondisi9" class="form-control">
                                                <option value="Ada">Ada</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>10.</label></td>
                                    <td>
                                        <input type="hidden" name="itemSeleksi[]" id="itemSeleksi10" value="Penginapan PJTU">
                                        <label>Penginapan PJTU</label>
                                    </td>
                                    <td>
                                        <input type="hidden" name="persyaratan[]" id="persyaratan10" value="-">
                                        <label>-</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select name="kondisi[]" id="kondisi10" class="form-control">
                                                <option value="Ada">Ada</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered table-striped table-hover" id="listItem2" width="100%">
                            <thead>
                                <tr>
                                    <th width="5%">No.</th>
                                    <th width="55%">Variable Yang Diamati</th>
                                    <th width="20%">Kesesuaian Prosedur/Sistem</th>
                                    <th width="20%">Uraian</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><label>1</label></td>
                                    <td><label>Tempat tutorial/praktik/praktikum layak</label></td>
                                    <td>
                                        <div class="radio-inline col-sm-12">
                                            <label class="col-sm-6" for="tmpt_1">
                                                <input type="radio" name="tmpt" id="tmpt_1" value="1"> Ya
                                            </label>
                                            <label class="col-sm-6" for="tmpt_0">
                                                <input type="radio" name="tmpt" id="tmpt_0" value="0"> Tidak
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="radio-inline col-sm-12">
                                            <label class="col-sm-6" for="tmpt1_1">
                                                <input type="radio" name="tmpt1" id="tmpt1_1" value="1"> Ya
                                            </label>
                                            <label class="col-sm-6" for="tmpt1_0">
                                                <input type="radio" name="tmpt1" id="tmpt1_0" value="0"> Tidak
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>2</label></td>
                                    <td><label>Seluruh Kelas tutorial yang terjadwal terlaksana</label></td>
                                    <td>
                                        <div class="radio-inline col-sm-12">
                                            <label class="col-sm-6" for="kelas_1">
                                                <input type="radio" name="kelas" id="kelas_1" value="1"> Ya
                                            </label>
                                            <label class="col-sm-6" for="kelas_0">
                                                <input type="radio" name="kelas" id="kelas_0" value="0"> Tidak
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="radio-inline col-sm-12">
                                            <label class="col-sm-6" for="kelas1_1">
                                                <input type="radio" name="kelas1" id="kelas1_1" value="1"> Ya
                                            </label>
                                            <label class="col-sm-6" for="kelas1">
                                                <input type="radio" name="kelas1" id="kelas1_0" value="0"> Tidak
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>3</label></td>
                                    <td><label>Peralatan Lab tersedia dan layak digunakan</label></td>
                                    <td>
                                        <div class="radio-inline col-sm-12">
                                            <label class="col-sm-6" for="alat_1">
                                                <input type="radio" name="alat" id="alat_1" value="1"> Ya
                                            </label>
                                            <label class="col-sm-6" for="alat_0">
                                                <input type="radio" name="alat" id="alat_0" value="0"> Tidak
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="radio-inline col-sm-12">
                                            <label class="col-sm-6" for="alat1_1">
                                                <input type="radio" name="alat1" id="alat1_1" value="1"> Ya
                                            </label>
                                            <label class="col-sm-6" for="alat1_0">
                                                <input type="radio" name="alat1" id="alat1_0" value="0"> Tidak
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>4</label></td>
                                    <td><label>Bahan Lab tersedia dan layak digunakan</label></td>
                                    <td>
                                        <div class="radio-inline col-sm-12">
                                            <label class="col-sm-6" for="bahan_1">
                                                <input type="radio" name="bahan" id="bahan_1" value="1"> Ya
                                            </label>
                                            <label class="col-sm-6" for="bahan_0">
                                                <input type="radio" name="bahan" id="bahan_0" value="0"> Tidak
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="radio-inline col-sm-12">
                                            <label class="col-sm-6" for="bahan1_1">
                                                <input type="radio" name="bahan1" id="bahan1_1" value="1"> Ya
                                            </label>
                                            <label class="col-sm-6" for="bahan1_0">
                                                <input type="radio" name="bahan1" id="bahan1_0" value="0"> Tidak
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>5</label></td>
                                    <td><label>Pelaksanaan tutorial/praktik/praktikum sesuai dengan jadwal yang ditetapkan</label></td>
                                    <td>
                                        <div class="radio-inline col-sm-12">
                                            <label class="col-sm-6" for="jadwal_1">
                                                <input type="radio" name="jadwal" id="jadwal_1" value="1"> Ya
                                            </label>
                                            <label class="col-sm-6" for="jadwal_0">
                                                <input type="radio" name="jadwal" id="jadwal_0" value="0"> Tidak
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="radio-inline col-sm-12">
                                            <label class="col-sm-6" for="jadwal1_1">
                                                <input type="radio" name="jadwal1" id="jadwal1_1" value="1"> Ya
                                            </label>
                                            <label class="col-sm-6" for="jadwal1_0">
                                                <input type="radio" name="jadwal1" id="jadwal1_0" value="0"> Tidak
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>6</label></td>
                                    <td><label>Seluruh tutor/pembimbing/instruktur hadir sesuai jadwal</label></td>
                                    <td>
                                        <div class="radio-inline col-sm-12">
                                            <label class="col-sm-6" for="tepatWkt_1">
                                                <input type="radio" name="tepatWkt" id="tepatWkt_1" value="1"> Ya
                                            </label>
                                            <label class="col-sm-6" for="tepatWkt_0">
                                                <input type="radio" name="tepatWkt" id="tepatWkt_0" value="0"> Tidak
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="radio-inline col-sm-12">
                                            <label class="col-sm-6" for="tepatWkt1_1">
                                                <input type="radio" name="tepatWkt1" id="tepatWkt1_1" value="1"> Ya
                                            </label>
                                            <label class="col-sm-6" for="tepatWkt1_0">
                                                <input type="radio" name="tepatWkt1" id="tepatWkt1_0" value="0"> Tidak
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>7</label></td>
                                    <td><label>Seluruh tutor/pembimbing/instruktir yang hadir sesuai Surat Tugas</label></td>
                                    <td>
                                        <div class="radio-inline col-sm-12">
                                            <label class="col-sm-6" for="sTugas_1">
                                                <input type="radio" name="sTugas" id="sTugas_1" value="1"> Ya
                                            </label>
                                            <label class="col-sm-6" for="sTugas_0">
                                                <input type="radio" name="sTugas" id="sTugas_0" value="0"> Tidak
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="radio-inline col-sm-12">
                                            <label class="col-sm-6" for="sTugas1_1">
                                                <input type="radio" name="sTugas1" id="sTugas1_1" value="1"> Ya
                                            </label>
                                            <label class="col-sm-6" for="sTugas1_0">
                                                <input type="radio" name="sTugas1" id="sTugas1_0" value="0"> Tidak
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>8</label></td>
                                    <td><label>Tutor/pembimbing/instruktir membawa RAT-SAT</label></td>
                                    <td>
                                        <div class="radio-inline col-sm-12">
                                            <label class="col-sm-6" for="rat_1">
                                                <input type="radio" name="rat" id="rat_1" value="1"> Ya
                                            </label>
                                            <label class="col-sm-6" for="rat_0">
                                                <input type="radio" name="rat" id="rat_0" value="0"> Tidak
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="radio-inline col-sm-12">
                                            <label class="col-sm-6" for="rat1_1">
                                                <input type="radio" name="rat1" id="rat1_1" value="1"> Ya
                                            </label>
                                            <label class="col-sm-6" for="rat1_0">
                                                <input type="radio" name="rat1" id="rat1_0" value="0"> Tidak
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>9</label></td>
                                    <td><label>Tutor/pembimbing/instruktir membawa Catatan Tutorial</label></td>
                                    <td>
                                        <div class="radio-inline col-sm-12">
                                            <label class="col-sm-6" for="catatan_1">
                                                <input type="radio" name="catatan" id="catatan_1" value="1"> Ya
                                            </label>
                                            <label class="col-sm-6" for="catatan_0">
                                                <input type="radio" name="catatan" id="catatan_0" value="0"> Tidak
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="radio-inline col-sm-12">
                                            <label class="col-sm-6" for="catatan1_1">
                                                <input type="radio" name="catatan1" id="catatan1_1" value="1"> Ya
                                            </label>
                                            <label class="col-sm-6" for="catatan1_0">
                                                <input type="radio" name="catatan1" id="catatan1_0" value="0"> Tidak
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>10</label></td>
                                    <td><label>Terdapat kelas dengan jumlah mahasiswa melebihi 35 orang</label></td>
                                    <td>
                                        <div class="radio-inline col-sm-12">
                                            <label class="col-sm-6" for="jmlMhs_1">
                                                <input type="radio" name="jmlMhs" id="jmlMhs_1" value="1"> Ya
                                            </label>
                                            <label class="col-sm-6" for="jmlMhs_0">
                                                <input type="radio" name="jmlMhs" id="jmlMhs_0" value="0"> Tidak
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="radio-inline col-sm-12">
                                            <label class="col-sm-6" for="jmlMhs1_1">
                                                <input type="radio" name="jmlMhs1" id="jmlMhs1_1" value="1"> Ya
                                            </label>
                                            <label class="col-sm-6" for="jmlMhs1_0">
                                                <input type="radio" name="jmlMhs1" id="jmlMhs1_0" value="0"> Tidak
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="row form-group">
                            <label class="col-sm-12">Disposisi Akhir</label>
                            <div class="col-sm-12">
                                <textarea id="disposisi" name="disposisi" class="form-control textarea" rows="10"></textarea>
                            </div>
                        </div>

                        <span class="btn btn-danger btn-block" onclick="batal();">BATAL</span>
                        <button class="btn btn-success btn-block" id="bt-simpan">TAMBAH DATA</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function getting_data() {
        $.getJSON('/Monitoring/ListMonitoring', function (json) {
            if (json.metaData.code == 200) {
                $('#listJadwal').DataTable().destroy();
                $('#listJadwal tbody').html("");
                var str;
                $.each(json.response.data, function (index, t) {
                    var warna = "";
                    var bt_cetak = "";
                    if (t.selesai == 1) {
                        warna = "lightgreen";
                        bt_cetak = '<a href="/Monitoring/Cetak/' + t.idJadwal + '" target="_blank" class="btn btn-warning glyphicon glyphicon-print" id="cetak"></a>';
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
                $('#listJadwal').DataTable({
                    "scrollX": true
                });
            }
        });
    }

    function edit(idJadwal) {
        cari_data(idJadwal);
    }

    function batal() {
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
        getting_data();
    }

    function cari_data(idJadwal) {
        var arrKond = [];
        $.getJSON('Monitoring/getData/' + idJadwal, function (json) {
            if (json.metaData.code == 200) {
                if (json.metaData.code == 200) {
                    $.each(json.response.data, function (index, t) {
                        $('#idJadwal').val(t.idJadwal);
                        $('#kabupaten').html(": " + t.kabupaten);
                        $('#pokjar').html(": " + t.pokjar);
                        $('#alamat').html(": " + t.alamat);
                        $('#nama_pm').html(": " + t.gelar_d_pm + t.nama_pm + "," + t.gelar_b_pm);
                        $('#nip_pm').html(": " + t.nipPm);
                        $('#jab_pm').html(": " + t.jab_pm);
                        $('#waktu').html(": " + t.hariLaksana + ", " + t.tglLaksana);
                        if (t.kondisi != null) {
                            arrKond = t.kondisi.split('#');
                            for (var i = 0; i < arrKond.length; i++) {
                                $('select#kondisi' + i + ' option').each(function () {
                                    this.selected = (this.value == arrKond[i]);
                                });
                            }
                        }
                        autoSelect('kegiatan', t.kegiatan);
                        $('#jmlKelas').val(t.jmlKelas);
                        $("#tmpt_" + t.tmpt).attr("checked", "");
                        $("#tmpt1_" + t.tmpt1).attr("checked", "");
                        $("#kelas_" + t.kelas).attr("checked", "");
                        $("#kelas1_" + t.kelas1).attr("checked", "");
                        $("#alat_" + t.alat).attr("checked", "");
                        $("#alat1_" + t.alat1).attr("checked", "");
                        $("#bahan_" + t.bahan).attr("checked", "");
                        $("#bahan1_" + t.bahan1).attr("checked", "");
                        $("#jadwal_" + t.jadwal).attr("checked", "");
                        $("#jadwal1_" + t.jadwal1).attr("checked", "");
                        $("#tepatWkt_" + t.tepatWkt).attr("checked", "");
                        $("#tepatWkt1_" + t.tepatWkt1).attr("checked", "");
                        $("#sTugas_" + t.sTugas).attr("checked", "");
                        $("#sTugas1_" + t.sTugas1).attr("checked", "");
                        $("#rat_" + t.rat).attr("checked", "");
                        $("#rat1_" + t.rat1).attr("checked", "");
                        $("#catatan_" + t.catatan).attr("checked", "");
                        $("#catatan1_" + t.catatan1).attr("checked", "");
                        $("#jmlMhs_" + t.jmlMhs).attr("checked", "");
                        $("#jmlMhs1_" + t.jmlMhs1).attr("checked", "");
                        $('#disposisi').html(t.disposisi);
                        if (t.selesai == 1) {
                            $('#upd').val(1);
                            $('#bt-simpan').html('UPDATE');
                            $('#frm').attr('action', '/Monitoring/Update');
                        } else {
                            $('#upd').val(0);
                            $('#bt-simpan').html('SIMPAN');
                            $('#frm').attr('action', '/Monitoring/Simpan');
                        }
                    });
                }
            } else {
//                $.getJSON('Jadwal/ListJadwalDet/' + idJadwal, function (json) {
//
//                });
            }
            $('#lst').hide(1000);
            $('#inp').show(1000);
        });
    }

    $(document).ready(function () {
        batal();
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