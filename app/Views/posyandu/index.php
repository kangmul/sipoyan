<?= $this->extend('layouts/template'); ?>
<?= $this->section('content') ?>
<div class="section-header shadow card-primary">
    <h1><?= $title  ?></h1>
</div>
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header justify-content-end">
                <a href="/master/tambahdata" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
            <div class="card-body">
                <div id="formfilterbalita">
                    <h6>Form Filter</h6>
                    <div class="form-group row justify-content-end">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Nama</label>
                            <input type="email" class="form-control" id="posyandunamabalita" placeholder="Cari nama ...">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Usia</label>
                            <select name="" id="posyanduusiabalita" class="form-control form-control-sm">
                                <option value="0">-- Semua --</option>
                                <option value="1">00 - 24 Bulan</option>
                                <option value="2">24 - 36 Bulan</option>
                                <option value="3">36 - 60 Bulan</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4 col-lg-2">
                            <label for="inputPassword4">&nbsp;</label>
                            <div class="form-control">
                                <button class="btn btn-md btn-info" id="posyandu-caribalita"><i class="fas fa-search"></i> Cari</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-sm" id="table-1-data-posyandu-balita" data-url="<?php echo site_url('getdatabalitaposyandu') ?>" style="width:100%;">
                        <thead>
                            <tr>
                                <th width="10">#</th>
                                <th>Nama</th>
                                <th width="50">Jenis Kelamin</th>
                                <th>Tanggal lahir</th>
                                <th>Usia</th>
                                <th>Nama Ayah</th>
                                <th>Nama Ibu</th>
                                <th>Tempat lahir</th>
                                <th>Action</th>
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
<?= $this->endSection() ?>