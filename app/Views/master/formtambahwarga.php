<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="section-header">
	<h1><?= $title ?></h1>
</div>
<?php print_r($kota); ?>
<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-6 offset-3">
				<div class="form-group row">
					<label class="col-sm-3 col-form-label" for="nokk">No KK</label>
					<div class="col-sm-9">
						<input type="text" class="form-control text-uppercase form-control-sm" name="nokk" id="nokk" value="3273210000000">
						<div class="invalid-feedback">nokk</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group row">
					<label class="col-sm-3 col-form-label" for="kepkk">Kepala Keluarga</label>
					<div class="col-sm-7">
						<input type="text" class="form-control text-uppercase form-control-sm" name="kepkk" id="kepkk" value="Jhon Doe">
						<div class="invalid-feedback">kepkk</div>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 col-form-label" for="rtrw">RT / RW</label>
					<div class="col-sm-3">
						<input type="text" class="form-control text-uppercase form-control-sm" name="rt" id="rt" value="002">
						<div class="invalid-feedback">rt</div>
					</div>
					<div class="col-1">
						<p> / </p>
					</div>
					<div class="col-sm-3">
						<input type="text" class="form-control text-uppercase form-control-sm" name="rw" id="rw" value="007">
						<div class="invalid-feedback">rw</div>
					</div>
				</div>
			</div>
			

			<div class="col-md-6">
				<div class="form-group row">
					<label class="col-sm-3 col-form-label" for="kelurahan">Kelurahan</label>
					<div class="col-sm-9">
						<input type="text" class="form-control text-uppercase form-control-sm" name="kelurahan" id="kelurahan" value="wates">
						<div class="invalid-feedback">kelurahan</div>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label" for="kecamatan">Kecamatan</label>
					<div class="col-sm-9">
						<input type="text" class="form-control text-uppercase form-control-sm" name="kecamatan" id="kecamatan" value="bandung kidul">
						<div class="invalid-feedback">kecamatan</div>
					</div>
				</div>
			</div>
		</div>		
	</div>
</div>

<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-lg-6">
                <form action="#" method="post" id="formtambahwarga">
				<div class="form-group row">
					<label class="col-sm-3 col-form-label" for="nama">Nama</label>
					<div class="col-sm-9">
						<input type="text" class="form-control text-uppercase" name="nama" id="nama" required>
						<div class="invalid-feedback">What's your name?</div>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label" for="nik">NIK</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="nik" id="nik" required>
						<div class="invalid-feedback">What's your name?</div>
					</div>
				</div>
				<div class="form-group row">
                 	<label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                 	<div class="col-sm-9">
                 		<select class="form-control selectric" name="jk" >
	                    	<option value="-">-- Pilih --</option>
	                    	<option value="L">Laki - laki</option>
	                    	<option value="P">Perempuan</option>
	                    </select>
                 	</div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="tmp_lahir">Tempat, Tanggal Lahir</label>
                    <div class="col-sm-5">
                    	<select class="form-control select2" name="tmp_lahir" id="tmp_lahir"> 
                      		<option value=''>-- Pilih --</option>
                            <?php foreach ($kota as $val) :?>
                        	<option value='<?= $val['kode'] ?>'><?= $val['kota'] ?></option>
                        	<?php endforeach; ?>
                      	</select>
                    </div>
                    <div class="col-sm-4">
                      	<input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" data-date-format="D-mm-yyyy" >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="agama">Agama</label>
                    <div class="col-sm-9">
                    	<select class="form-control select2" name="agama" id="agama">
	                      	<option value=''>-- Pilih --</option>
	                        <option value='islam'>Islam</option>
	                        <option value='kristen'>Kristen</option>
		                </select>
                    </div>
                </div>
                <div class="form-group row">
                	<label for="pendidikan" class="col-sm-3 col-form-label">Pendidikan</label>
                    <div class="col-sm-9">
                    	<select name="pendidikan" id="pendidikan" class="form-control select2">
                    		<option value="-">Belum sekolah</option>
                    		<option value="SD">SD</option>
                    		<option value="SMP">SMP</option>
                            <option value="SMP">Strata I</option>
                            <option value="SMP">Diploma 1</option>
                    	</select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis_pekerjaan" class="col-sm-3 col-form-label">Jenis Pekerjaan</label>
                    <div class="col-sm-9">
                    	<select class="form-control select2" name="jenis_pekerjaan" id="jenis_pekerjaan">
	                      	<option value='Belum Bekerja'>Belum Bekerja</option>
	                        <option value='1'>TNI / POLRI</option>
	                        <option value='2'>Wiraswasta</option>
	                     </select>
                    </div>
                </div>
                <!-- endcol1 -->
			</div>

			<div class="col-md-6 col-sm-6 col-lg-6">
				<div class="form-group row">
					<label for="status_perkawinan" class="col-form-label col-sm-4">Status Perkawinan</label>
					<div class="col-sm-8">
						<select class="form-control" name="status_perkawinan" id="status_perkawinan">
							<option value=''>-- Pilih --</option>
							<option value='belum_menikah'>Belum Menikah</option>
							<option value='menikah'>Menikah</option>
							<option value='janda'>Janda</option>
							<option value='duda'>Duda</option>
						</select>
					</div>
				</div>
                <div class="form-group row">
                   	<label for="statushubkel" class="col-sm-4 col-form-label">Status Hubungan Keluarga</label>
                    <div class="col-sm-8">
                    	<select name="statushubkel" id="statushubkel" class="form-control">
                    		<option value="1">Kepala Keluarga</option>
                    		<option value="2">Istri</option>
                    		<option value="3">Anak</option>
                    	</select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kewarganegaraan" class="col-sm-4 col-form-label">Kewarganegaraan</label>
                	<div class="col-sm-8">
                		<input type="text" class="form-control text-uppercase" id="kewarganegaraan" name="kewarganegaraan" value="WNI">	
                	</div>
                </div>
                <div class="form-group row">
                    <label for="nopassport" class="col-sm-4 col-form-label">No Passport</label>
                    <div class="col-sm-8">
                    	<input type="text" class="form-control" id="nopassport" name="nopassport" value="-">	
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nokitap" class="col-sm-4 col-form-label">No KITAP</label>
                    <div class="col-sm-8">
                    	<input type="text" class="form-control" id="nokitap" name="nokitap" value="-">
                    </div>
                </div>
                <div class="form-group row">
                	<label for="namaayah" class="col-sm-4 col-form-label" >Nama Ayah</label>
                	<div class="col-sm-8">
                		<input type="text" class="form-control text-uppercase" id="namaayah" name="namaayah">
                	</div>
              	</div>
              	<div class="form-group row">
                	<label for="namaibu" class="col-sm-4 col-form-label">Nama Ibu</label>
                	<div class="col-sm-8">
                		<input type="text" class="form-control text-uppercase" id="namaibu" name="namaibu">
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
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-hover" id="tbl_temp_1">
            <thead>
              <tr>
                <th class="text-center">
                  #
                </th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th>
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
                <tr>
                    
                </tr>
            </tbody>
          </table>
        </div>
        <div class="row mt-4">
        	<div class="col-12 text-right">
        		<button class="btn btn-success btn-sm"><i class="fas fa-paper-plane"></i> Simpan</button>
        	</div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection();  ?>
