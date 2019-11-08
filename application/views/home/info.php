<body>
    <div class="container-scroller">
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="<?= base_url(''); ?>"><img src="<?= base_url('assets/images/'); ?>logo.png" class="mr-2" alt="logo"></a>
                <a class="navbar-brand brand-logo-mini" href="<?= base_url(''); ?>"><img src="<?= base_url('assets/images/'); ?>logo.png" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-start text-center">
                <h5 class="text-uppercase">Informasi Kegiatan Pondok Pesantren Miftahul Huda</h5>
            </div>
        </nav>
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php $this->load->view('partials/home/_sidebar.php') ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card position-relative">
                                <div class="card-body">
                                    <h4 class="card-title">Informasi Kegiatan</h4>
                                    <div class="table-responsive pt-3">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Informasi</th>
                                                    <th>Tanggal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($info as $s) : ?>
                                                    <tr>
                                                        <td><?= $i; ?></td>
                                                        <td><?= $s['content']; ?></td>
                                                        <td><?= $s['ts']; ?></td>
                                                    </tr>
                                                    <?php $i++; ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <?php $this->load->view('partials/_footbar.php') ?>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
</body>