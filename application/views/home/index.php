<body>
    <div class="container-scroller">
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="<?= base_url(''); ?>"><img src="<?= base_url('assets/images/'); ?>logo.png" class="mr-2" alt="logo" height="50" width="50"></a>
                <a class="navbar-brand brand-logo-mini" href="<?= base_url(''); ?>"><img src="<?= base_url('assets/images/'); ?>logo.png" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-start">
                <h5 class="text-uppercase">Selamat Datang di Website Pondok Siwatu</h5>
            </div>
        </nav>
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="main-panel w-100  documentation">
                <div class="content-wrapper">
                    <div class="container-fluid">
                        <div class="row doc-content">
                            <div class="col-12 col-md-10 offset-md-1">
                                <div class="col-12 grid-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Informasi Pembayaran</h4>
                                            <div class="table-responsive pt-3">
                                                <table class="table table-bordered">
                                                    <thead align="center">
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Nama</th>
                                                            <th>Nama Ortu</th>
                                                            <th>Alamat</th>
                                                            <th>Kelas</th>
                                                            <th>#</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php foreach ($santri as $s) : ?>
                                                            <tr>
                                                                <td><?= $i; ?></td>
                                                                <td class="text-uppercase"><?= $s['full_name']; ?></td>
                                                                <td class="text-uppercase"><?= $s['parents_name']; ?></td>
                                                                <td class="text-uppercase"><?= $s['address']; ?></td>
                                                                <td><?= $s['class']; ?></td>
                                                                <td align="center"><a href="<?= base_url('welcome/detail/') . $s['no_absen'] ?>" class="btn btn-primary btn-sm">Lihat Detail</a></td>
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
                    </div>
                </div>
                <?php $this->load->view('partials/_footbar.php') ?>
            </div>
        </div>
    </div>
</body>