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
                                    <h4 class="card-title">Tambah jenis pembayaran</h4>
                                    <form class="forms-sample" action="<?= base_url('jenis/tambah_jenis'); ?>" method="post">
                                        <div class="form-group">
                                            <label>POS</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Gedung, Daftar Ulang, dll..." name="pos" value="<?= set_value('pos'); ?>">
                                            </div>
                                            <?= form_error('pos', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Pembayaran</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Nama Pembayaran" name="nama_p" value="<?= set_value('nama_p'); ?>">
                                            </div>
                                            <?= form_error('nama_p', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Tipe</label>
                                            <select class="form-control" name="tipe">
                                                <option>Bebas</option>
                                                <option>Bulanan</option>
                                            </select>
                                            <?= form_error('tipe', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Tarif</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="100.000" name="tarif" value="<?= set_value('tarif'); ?>">
                                            </div>
                                            <?= form_error('tarif', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <div class="input-group">
                                                <input type="date" class="form-control" placeholder="dd-mm-yyyy" name="tanggal" value="<?= set_value('tanggal'); ?>">
                                            </div>
                                            <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <button type="submit" class="btn btn-success mr-2">Tambah</button>
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