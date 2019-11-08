<body>
    <div class="container-scroller">
        <?php $this->load->view('partials/_topbar.php') ?>
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php $this->load->view('partials/_sidebar.php') ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card mx-auto">
                            <div class="card position-relative">
                                <div class="card-body">
                                    <h4 class="card-title"><?= "Atur tarif " . $jenis['payment_name']; ?></h4>
                                    <form class="forms-sample" action="<?= base_url('jenis/edit_tarif'); ?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" class="form-control" placeholder="id" name="tarif" value="<?= $jenis['id']; ?>">
                                        <div class="form-group">
                                            <label>Tarif</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="100.000" name="tarif" value="<?= $jenis['pay_rate']; ?>">
                                            </div>
                                            <?= form_error('tarif', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Tipe</label>
                                            <select class="form-control" name="tipe" value="<?= $jenis['type']; ?>">
                                                <option>Bebas</option>
                                                <option>Bulanan</option>
                                            </select>
                                            <?= form_error('tipe', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <div class="input-group">
                                                <input type="date" class="form-control" placeholder="dd-mm-yyyy" name="tanggal" value="<?= $jenis['date']; ?>">
                                            </div>
                                            <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <button type="submit" class="btn btn-primary mr-2">Edit</button>
                                        <a href="<?= base_url('jenis'); ?>" class="btn btn-light">Batal</a>
                                    </form>
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