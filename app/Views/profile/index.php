<?= $this->extend('layouts/template'); ?>
<?= $this->section('content') ?>
<div class="section-header shadow card-primary">
    <h1><?= $title  ?></h1>
</div>
<div class="row">
    <div class="col-12 col-md-6 col-sm-4">
        <img src="<?= base_url('assets/img/avatar') ?>/avatar-1.png" alt="" class="img-circle">
    </div>
    <div class="col-12 col-md-6 col-lg-8">
        <div class="card card-danger shadow">
            <div class="card-header">
                <h4>Hai, <?= $userprofile[0]->nama ?></h4>
            </div>
            <div class="card-body">
                <p>Card <code>.card-danger</code></p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>