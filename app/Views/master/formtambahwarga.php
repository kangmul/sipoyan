<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="section-header shadow">
	<h1><?= $title ?></h1>
</div>
<div class="card card-secondary shadow">
	<div class="card-body">
		<div class="row">

		</div>

		<div class="row">
			<div class="col-md-6">

				<div class="form-group row">
					<label class="col-sm-3 col-form-label" for="nokk">No KK</label>
					<div class="col-sm-9">
						<input type="text" class="form-control keunumber form-control-sm" name="nokk" id="nokk" placeholder="Input Nomor KK, Contoh: 3273290123456789">
						<div class="invalid-feedback">nokk</div>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 col-form-label" for="kepkk">Kepala Keluarga</label>
					<div class="col-sm-7">
						<input type="text" class="form-control text-uppercase form-control-sm" name="kepkk" id="kepkk" placeholder="Jhon Doe">
						<div class="invalid-feedback">kepkk</div>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 col-form-label" for="alamat">Alamat</label>
					<div class="col-sm-9">
						<input type="text" class="form-control form-control-sm" name="alamat" id="alamat" placeholder="ketik alamat">
						<div class="invalid-feedback">alamat</div>
					</div>
				</div>


			</div>


			<div class="col-md-6">
				<div class="form-group row">
					<label class="col-sm-3 col-form-label" for="rt">RT</label>
					<div class="col-sm-3">
						<input type="text" class="form-control text-uppercase form-control-sm" name="rt" id="rt" placeholder="009">
						<div class="invalid-feedback">rt</div>
					</div>
					<label class="col-sm-3 col-form-label text-right" for="rw">RW</label>
					<div class="col-sm-3">
						<input type="text" class="form-control text-uppercase form-control-sm" name="rw" id="rw" placeholder="009">
						<div class="invalid-feedback">rw</div>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 col-form-label" for="kelurahan">Kelurahan</label>
					<div class="col-sm-9">
						<select name="kel" id="isikelurahan" class="form-control form-control-sm kelurahan text-uppercase"></select>
						<div class="invalid-feedback">kelurahan</div>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label" for="kecamatan">Kecamatan</label>
					<input type="hidden" id="urlkecamatan" data-url="<?= site_url('getkecamatan') ?>">
					<div class="col-sm-9">
						<select name="kecamatan" id="isikecamatan" class="form-control text-uppercase form-control-sm kecamatan">
						</select>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="card card-primary shadow">
	<div class="card-body">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-lg-6">
				<form action="#" method="post" id="formtambahwarga">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label" for="nama" id="nama">Nama</label>
						<div class="col-sm-9">
							<input type="text" class="form-control text-uppercase nama" name="nama" id="nama" required="required" placeholder="Ketik nama Sesuai KK">
							<div class="invalid-feedback">What's your name?</div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label" for="nik" id="nik">NIK</label>
						<div class="col-sm-9">
							<input type="text" class="form-control keunumber nik" name="nik" id="nik" required placeholder="Ketik NIK contoh: 3273220123456789">
							<div class="invalid-feedback">What's your name?</div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label" id="jk">Jenis Kelamin</label>
						<div class="col-sm-9">
							<select class="form-control jk" name="jk" id="jk">
								<option value="">-- Pilih --</option>
								<option value="L">Laki - laki</option>
								<option value="P">Perempuan</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label" for="tmp_lahir" id="tmp_lahir">Tempat Lahir</label>
						<div class="col-sm-9">
							<select class="form-control tmp_lahir" name="tmp_lahir" id="tmp_lahir" data-url="<?php echo site_url('datakota') ?>">
								<option value=''>-- Pilih --</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label" for="tgl_lahir">Tanggal Lahir</label>
						<div class="col-sm-9">
							<input type="text" class="form-control tgl_lahir" name="tgl_lahir" id="tgl_lahir" placeholder="dd-mm-yyy">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-3 col-form-label" for="agama" id="agama">Agama</label>
						<div class="col-sm-9">
							<select class="form-control agama refagama" name="agama">
								<option value=''>-- Pilih --</option>
								<?php foreach($agama as $val): ?>
								<option value=<?= $val['kode_agama'] ?>><?= $val['agama'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="pendidikan" class="col-sm-3 col-form-label" id="pendidikan">Pendidikan</label>
						<div class="col-sm-9">
							<select name="pendidikan" id="pendidikan" class="form-control pendidikan">
								<option value="">-- Pilih --</option>
								<?php foreach($pendidikan as $val): ?>
								<option value=<?= $val['kode'] ?>><?= $val['pendidikan'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="jenis_pekerjaan" class="col-sm-3 col-form-label" id="jenis_pekerjaan">Jenis Pekerjaan</label>
						<div class="col-sm-9">
							<select class="form-control select2 jenis_pekerjaan" name="jenis_pekerjaan" id="jenis_pekerjaan">
								<option value=''>-- Pilih --</option>
								<?php foreach($pekerjaan as $val): ?>
								<option value=<?= $val['kode'] ?>><?= $val['pekerjaan'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
			</div>

			<div class="col-md-6 col-sm-6 col-lg-6">
				<div class="form-group row">
					<label for="status_perkawinan" class="col-form-label col-sm-4" id="status_perkawinan">Status Perkawinan</label>
					<div class="col-sm-8">
						<select class="form-control select2 status_perkawinan" name="status_perkawinan" id="status_perkawinan">
							<option value=''>-- Pilih --</option>
							<?php foreach($marital as $val): ?>
								<option value=<?= $val['kode'] ?>><?= $val['marital'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="statushubkel" class="col-sm-4 col-form-label" id="statushubkel">Status Hubungan Keluarga</label>
					<div class="col-sm-8">
						<select name="statushubkel" id="statushubkel" class="form-control statushubkel select2">
							<option value=''>-- Pilih --</option>
							<?php foreach($hubkel as $val): ?>
								<option value=<?= $val['kode'] ?>><?= $val['hubungan_keluarga'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="kewarganegaraan" class="col-sm-4 col-form-label" id="kewarganegaraan">Kewarganegaraan</label>
					<div class="col-sm-8">
						<input type="text" class="form-control text-uppercase" id="kewarganegaraan" name="kewarganegaraan" value="WNI">
					</div>
				</div>
				<div class="form-group row">
					<label for="nopassport" class="col-sm-4 col-form-label" id="nopassport">No Passport</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="nopassport" name="nopassport" value="-">
					</div>
				</div>
				<div class="form-group row">
					<label for="nokitap" class="col-sm-4 col-form-label" id="nokitap">No KITAP</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="nokitap" name="nokitap" value="-">
					</div>
				</div>
				<div class="form-group row">
					<label for="namaayah" class="col-sm-4 col-form-label" id="namaayah">Nama Ayah</label>
					<div class="col-sm-8">
						<input type="text" class="form-control text-uppercase namaayah" id="namaayah" name="namaayah" placeholder="Ketik nama Ayah">
					</div>
				</div>
				<div class="form-group row">
					<label for="namaibu" class="col-sm-4 col-form-label" id="namaibu">Nama Ibu</label>
					<div class="col-sm-8">
						<input type="text" class="form-control text-uppercase namaibu" id="namaibu" name="namaibu" placeholder="Ketik nama Ibu">
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
	<div class="card-footer text-right">
		<button class="btn btn-primary addtotabletemp" id="addtotabletemp" onclick="tambahketabel()"><i class="fas fa-plus"></i> Tambah</button>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card shadow card-warning">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped table-hover" id="tbl_temp_1">
						<thead>
							<tr>
								<th>Nama</th>
								<th>NIK</th>
								<th>Jenis Kelamin (kode)</th>
								<th>Tempat Lahir (kode)</th>
								<th>Tanggal Lahir</th>
								<th>Agama</th>
								<th>Pendidikan</th>
								<th>Jenis Pekerjaan</th>
								<th>Status Perkawinan</th>
								<th>Hubungan Keluarga</th>
								<th>Kewarganegaraan</th>
								<th>No Passport</th>
								<th>No KITAP</th>
								<th>Nama Ayah</th>
								<th>Nama Ibu</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
				<div class="row mt-4">
					<div class="col-12 text-right">
						<button class="btn btn-success btn-sm" id="savealltodatabase" data-url="<?php echo site_url('/master/tambahdatawarga') ?>"><i class="fas fa-paper-plane"></i> Simpan</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>

	$("select").select2();

	$(".keunumber").on("keypress", function(e) {
		let keynum = e.charCode;
		if (!(keynum >= 48 && keynum <= 57)) {
			swal("Failed", "Hanya angka yang dapat di input !", "error");
		}
	});

	$(".keunumber").on("blur", function() {
		var nokk = $(this).val();
		let provinsi = nokk.substr(0, 2);
		let kabkota = nokk.substr(2, 2);
		let kecamatan = nokk.substr(0, 6);
		$.ajax({
			url: "<?php echo site_url('getprovkabkec') ?>",
			data: {
				kecamatan: kecamatan
			},
			method: "POST",
			success: function(hasil) {
				let result = JSON.parse(hasil);
				if (result.success) {
					$(".kecamatan").append("<option value=" + result.data.id + " selected='selected'>" + result.data.nama + "</option>");
					$(".kelurahan").append("<option value=" + result.data.id + " selected='selected'></option>");
					loadkelurahan();

				}
			}
		})
	});


	$(".kecamatan").select2({
		minimumInputLength: 2,
		placeholder: "Pilih kecamatan",
		ajax: {
			url: "<?= site_url('/getkecamatan') ?>",
			dataType: "json",
			type: "GET",
			data: function(terms) {
				return {
					terms
				};
			},
			processResults: function(data) {
				return {
					results: data.map(function(item) {
						return {
							id: item.id,
							text: item.text
						};
					})
				};
			}
		}
	});

	function loadkelurahan() {
		let isikecamatan = $(".kecamatan").children("option:selected").val();
		console.log(isikecamatan);
		$.ajax({
			url: "<?= site_url('/getkelurahan') ?>",
			type: "get",
			data: {
				idkecamatan: isikecamatan
			},
			success: function(data) {
				let result = JSON.parse(data);
				console.log(result);
				$(".kelurahan").select2({
					data: result
				})
			}
		})
	}

	$(".kelurahan").select2({
		placeholder: 'Pilih Kelurahan'
	})


	$(".tmp_lahir").select2({
		minimumInputLength: 2,
		placeholder: "-- Pilih --",
		ajax: {
			url: "<?= site_url('/gettempatlahir') ?>",
			dataType: "json",
			type: "GET",
			data: function(terms) {
				return {
					terms
				};
			},
			processResults: function(data) {
				return {
					results: data.map(function(item) {
						return {
							id: item.id,
							text: item.text
						};
					})
				};
			}
		}
	});
</script>
<?= $this->endSection();  ?>