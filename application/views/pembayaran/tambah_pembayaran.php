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
                                    <h4 class="card-title">Tambah pembayaran</h4>
                                    <form class="forms-sample" action="<?= base_url('pembayaran/tambah_bayar'); ?>" method="post">
                                    <div class="form-group">
                                            <label>Nomor Absen</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Nomor Absen" name="no_absen" value="<?= set_value('no_absen'); ?>">
                                            </div>
                                            <?= form_error('no_absen', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Santri</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Nama Santri" name="jenis" value="<?= set_value('nama_santri'); ?>" readonly>
                                            </div>
                                            <?= form_error('nama_santri', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Pembayaran</label>
                                            <select name="j_pembayaran" class="form-control">
                                                <option>--Pilih--</option>
                                            <?php foreach($pembayaran as $data) : ?>
                                            <option value="<?= $data['id']; ?>"><?= $data['payment_name']; ?></option>
                                            <?php endforeach;?>
                                            </select>
                                            <?= form_error('j_pembayaran', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Tarif Pembayaran</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="0" name="jumlah" value="<?= set_value('jumlah'); ?>" readonly>
                                            </div>
                                            <?= form_error('jumlah', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <button data-toggle="modal" class="btn btn-primary btn-icon-text btn-sm">
                                            <i class="ti-save btn-icon-prepend"></i>
                                            Simpan
                                        </button>
                                        <a href="<?= base_url('pembayaran'); ?>" class="btn btn-light">Batal</a>
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