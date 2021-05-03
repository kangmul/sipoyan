<?= $this->extend('layouts/template'); ?>
<?= $this->section('content') ?>
<div class="section-header shadow card-primary">
    <h1><?= $title  ?></h1>
</div>
<?php
// dd($warga);
// exit;

?>
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header justify-content-between">
                <h4>Data Warga</h4>
                <a href="/master/tambahdata" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-responsive" id="table-2-data-master-balita" data-url="<?php echo site_url('getdatabalita') ?>">
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
<?= $this->endSection(); ?>