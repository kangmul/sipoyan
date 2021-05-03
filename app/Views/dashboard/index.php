<?= $this->extend('layouts/template'); ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-stats">
                    <div class="card-stats-title">Rincian Bulan -
                        <div class="dropdown d-inline">
                            <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#" id="orders-month">August</a>
                            <ul class="dropdown-menu dropdown-menu-sm">
                                <li class="dropdown-title">Select Month</li>
                                <li><a href="#" class="dropdown-item">January</a></li>
                                <li><a href="#" class="dropdown-item">February</a></li>
                                <li><a href="#" class="dropdown-item">March</a></li>
                                <li><a href="#" class="dropdown-item">April</a></li>
                                <li><a href="#" class="dropdown-item">May</a></li>
                                <li><a href="#" class="dropdown-item">June</a></li>
                                <li><a href="#" class="dropdown-item">July</a></li>
                                <li><a href="#" class="dropdown-item active">August</a></li>
                                <li><a href="#" class="dropdown-item">September</a></li>
                                <li><a href="#" class="dropdown-item">October</a></li>
                                <li><a href="#" class="dropdown-item">November</a></li>
                                <li><a href="#" class="dropdown-item">December</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-stats-items">
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">24</div>
                            <div class="card-stats-item-label">Pending</div>
                        </div>
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">12</div>
                            <div class="card-stats-item-label">Shipping</div>
                        </div>
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">23</div>
                            <div class="card-stats-item-label">Completed</div>
                        </div>
                    </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-archive"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Data</h4>
                    </div>
                    <div class="card-body">
                        0
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-1 mb-0">
                <div class="card-icon bg-primary">
                    <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Jumlah Penduduk</h4>
                    </div>
                    <div class="card-body">
                        <?php echo $jmlwarga ?>
                        <h6>
                            <span class="text-primary"><i class="fas fa-male"></i> <?php echo $jmlmalewarga ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="text-danger"><i class="fas fa-female"></i> <?php echo $jmlfemalewarga ?></span>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="card card-statistic-1 mb-0">
                <div class="card-icon bg-danger">
                    <i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Jumlah Lansia</h4>
                    </div>
                    <div class="card-body">
                        <?php echo $jmllansia ?>
                        <h6>
                            <span class="text-primary"><i class="fas fa-male"></i> <?php echo $jmlmalelansia ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="text-danger"><i class="fas fa-female"></i> <?php echo $jmlfemalelansia ?></span>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-1 mb-0">
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-child"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Jumlah Balita</h4>
                    </div>
                    <div class="card-body">
                        <?php echo $jmlbalita ?>
                        <h6>
                            <span class="text-primary"><i class="fas fa-male"></i> <?php echo $jmlmalebalita ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="text-danger"><i class="fas fa-female"></i> <?php echo $jmlfemalebalita ?></span>
                        </h6>

                    </div>
                </div>
            </div>
            <div class="card card-statistic-1 mb-0">
                <div class="card-icon bg-warning">
                    <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Reports</h4>
                    </div>
                    <div class="card-body">
                        1,201
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Kader</h4>
                </div>
                <div class="card-body">
                    <div class="owl-carousel owl-theme" id="products-carousel">
                        <div>
                            <div class="product-item pb-3">
                                <div class="product-image">
                                    <img alt="image" src="<?= base_url(); ?>/assets/img/products/product-4-50.png" class="img-fluid">
                                </div>
                                <div class="product-details">
                                    <div class="product-name">iBook Pro 2018</div>
                                    <div class="product-review">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="text-muted text-small">67 Sales</div>
                                    <div class="product-cta">
                                        <a href="#" class="btn btn-primary">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="product-item">
                                <div class="product-image">
                                    <img alt="image" src="<?= base_url(); ?>/assets/img/products/product-3-50.png" class="img-fluid">
                                </div>
                                <div class="product-details">
                                    <div class="product-name">oPhone S9 Limited</div>
                                    <div class="product-review">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half"></i>
                                    </div>
                                    <div class="text-muted text-small">86 Sales</div>
                                    <div class="product-cta">
                                        <a href="#" class="btn btn-primary">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="product-item">
                                <div class="product-image">
                                    <img alt="image" src="<?= base_url(); ?>/assets/img/products/product-1-50.png" class="img-fluid">
                                </div>
                                <div class="product-details">
                                    <div class="product-name">Headphone Blitz</div>
                                    <div class="product-review">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="text-muted text-small">63 Sales</div>
                                    <div class="product-cta">
                                        <a href="#" class="btn btn-primary">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="product-item">
                                <div class="product-image">
                                    <img alt="image" src="<?= base_url(); ?>/assets/img/products/product-1-50.png" class="img-fluid">
                                </div>
                                <div class="product-details">
                                    <div class="product-name">Headphone Blitz</div>
                                    <div class="product-review">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="text-muted text-small">63 Sales</div>
                                    <div class="product-cta">
                                        <a href="#" class="btn btn-primary">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="product-item">
                                <div class="product-image">
                                    <img alt="image" src="<?= base_url(); ?>/assets/img/products/product-1-50.png" class="img-fluid">
                                </div>
                                <div class="product-details">
                                    <div class="product-name">Headphone Blitz</div>
                                    <div class="product-review">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="text-muted text-small">63 Sales</div>
                                    <div class="product-cta">
                                        <a href="#" class="btn btn-primary">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="row">
    <div class="col-12 col-sm-12 col-lg-3">
        <div class="card card-hero">
            <div class="card-header">
                <div class="card-icon">
                    <i class="far fa-question-circle"></i>
                </div>
                <h4>14</h4>
                <div class="card-description">Customers need help</div>
            </div>
            <div class="card-body p-0">
                <div class="tickets-list">
                    <a href="#" class="ticket-item">
                        <div class="ticket-title">
                            <h4>My order hasn't arrived yet</h4>
                        </div>
                        <div class="ticket-info">
                            <div>Laila Tazkiah</div>
                            <div class="bullet"></div>
                            <div class="text-primary">1 min ago</div>
                        </div>
                    </a>
                    <a href="#" class="ticket-item">
                        <div class="ticket-title">
                            <h4>Please cancel my order</h4>
                        </div>
                        <div class="ticket-info">
                            <div>Rizal Fakhri</div>
                            <div class="bullet"></div>
                            <div>2 hours ago</div>
                        </div>
                    </a>
                    <a href="#" class="ticket-item">
                        <div class="ticket-title">
                            <h4>Do you see my mother?</h4>
                        </div>
                        <div class="ticket-info">
                            <div>Syahdan Ubaidillah</div>
                            <div class="bullet"></div>
                            <div>6 hours ago</div>
                        </div>
                    </a>
                    <a href="features-tickets.html" class="ticket-item ticket-more">
                        View All <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>


<?= $this->endSection(); ?>