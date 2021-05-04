<?= $this->extend('layouts/template'); ?>
<?= $this->section('content') ?>
<div class="section-header shadow card-primary">
    <h1><?= $title  ?></h1>
</div>
<div class="card card-primary shadow">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6">
                <form action="#" method="post" id="formtambahwarga">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="nama" id="nama">No KK</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control-sm form-control-plaintext text-capitalize nama" name="nama" id="nama" required="required" value="<?php echo strtolower($detailwarga['no_kk']) ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="nama" id="nama">Kepala Keluarga</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control-sm form-control-plaintext text-capitalize nama" name="nama" id="nama" required="required" value="<?php echo strtolower($detailwarga['kepala_keluarga']) ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="nama" id="nama">Nama</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control-sm form-control-plaintext text-capitalize nama" name="nama" id="nama" required="required" value="<?php echo strtolower($detailwarga['nama']) ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="nik" id="nik">NIK</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control-sm form-control-plaintext keunumber nik" name="nik" id="nik" readonly value="<?php echo $detailwarga['nik'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control-sm form-control-plaintext text-capitalize" name="alamat" readonly value="<?php echo $detailwarga['alamat'] . " RT " . $detailwarga['rt'] . " / RW " . $detailwarga['rw']  ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">&nbsp;</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control-sm form-control-plaintext text-capitalize" name="alamat" readonly value="Kel. <?php echo  $detailwarga['kel'] . ", Kec." . $detailwarga['kec'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" id="jk">Jenis Kelamin</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control-sm form-control-plaintext keunumber nik" name="nik" id="nik" readonly value="<?php echo ($detailwarga['jk'] == 'L') ? 'Laki-laki' : 'Perempuan' ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="tmp_lahir" id="tmp_lahir">Tempat, Tgl Lahir</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control-sm form-control-plaintext keunumber nik text-capitalize" name="tgl_lahir" id="tgl_lahir" readonly value="<?php echo strtolower($detailwarga['kota']) . ", " . date('d F Y', strtotime($detailwarga['tgl_lahir'])) ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="agama" id="agama">Agama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control-sm form-control-plaintext keunumber nik text-capitalize" name="agama" id="agama" readonly value="<?php echo strtolower($detailwarga['agama']) ?>">
                        </div>
                    </div>
                    

            </div>

            <div class="col-md-6 col-sm-6 col-lg-6">
                <div class="form-group row">
                    <label for="pendidikan" class="col-sm-4 col-form-label" id="pendidikan">Pendidikan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control-sm form-control-plaintext keunumber pendidikan" name="pendidikan" id="pendidikan" readonly value="<?php echo $detailwarga['pendidikan'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis_pekerjaan" class="col-sm-4 col-form-label" id="jenis_pekerjaan">Jenis Pekerjaan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control-sm form-control-plaintext keunumber nik" name="nik" id="nik" readonly value="<?php echo $detailwarga['pekerjaan'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status_perkawinan" class="col-form-label col-sm-4" id="status_perkawinan">Status Perkawinan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control-sm form-control-plaintext keunumber nik text-capitalize" name="nik" id="nik" readonly value="<?php echo strtolower($detailwarga['marital']) ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="statushubkel" class="col-sm-4 col-form-label" id="statushubkel">Status Hubungan Keluarga</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control-sm form-control-plaintext keunumber hubungan_keluarga text-capitalize" name="hubungan_keluarga" id="hubungan_keluarga" readonly value="<?php echo strtolower($detailwarga['hubungan_keluarga']) ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kewarganegaraan" class="col-sm-4 col-form-label" id="kewarganegaraan">Kewarganegaraan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control-sm form-control-plaintext keunumber kewarganegaraan" name="kewarganegaraan" id="kewarganegaraan" readonly value="<?php echo $detailwarga['kewarganegaraan'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nopassport" class="col-sm-4 col-form-label" id="nopassport">No Passport</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control-sm form-control-plaintext keunumber nik text-capitalize" name="nik" id="nik" readonly value="<?php echo strtolower($detailwarga['no_passport']) ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nokitap" class="col-sm-4 col-form-label" id="nokitap">No KITAP</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control-sm form-control-plaintext keunumber nik text-capitalize" name="nik" id="nik" readonly value="<?php echo strtolower($detailwarga['no_kitap']) ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="namaayah" class="col-sm-4 col-form-label" id="namaayah">Nama Ayah</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control-sm form-control-plaintext keunumber nik text-capitalize" name="nik" id="nik" readonly value="<?php echo strtolower($detailwarga['nm_ayah']) ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="namaibu" class="col-sm-4 col-form-label" id="namaibu">Nama Ibu</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control-sm form-control-plaintext keunumber nik text-capitalize" name="nik" id="nik" readonly value="<?php echo strtolower($detailwarga['nm_ibu']) ?>">
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>