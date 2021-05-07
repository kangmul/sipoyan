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
                <div id="formfilterbalita justify-content-end">
                    <h6>Form Filter</h6>
                    <div class="row justify-content-end">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control form-control-sm" id="posyandunamabalita" placeholder="Cari nama ....">
                                    <select class="custom-select form-control-sm" id="posyanduusiabalita">
                                        <option value="" selected>Cari usia...</option>
                                        <option value="1">00 - 24 Tahun</option>
                                        <option value="2">24 - 36 Tahun</option>
                                        <option value="3">36 - 60 Tahun</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-info btn-sm" type="button" id="posyandu-caribalita"><i class="fas fa-search"></i> Cari</button>
                                    </div>
                                    <div class="input-group-append">
                                        <button class="btn btn-warning btn-sm" type="button" id="posyandu-resetcaribalita"><i class="fas fa-undo"></i> Reset</button>
                                    </div>
                                </div>
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