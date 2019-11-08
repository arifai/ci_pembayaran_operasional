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
                                    <?= $this->session->flashdata('message'); ?>
                                    <form class="forms-sample" action="<?= base_url('pembayaran'); ?>" method="post">
                                        <div class="form-group">
                                            <label>Nomor Absen</label>
                                            <div class="input-group">
                                                <input type="text" id="no_absen" class="form-control" placeholder="Nomor Absen" name="no_absen" onchange="return autofill();">
                                            </div>
                                            <?= form_error('no_absen', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Santri</label>
                                            <div class="input-group">
                                                <input type="text" id="nama" class="form-control" placeholder="Nama Santri" name="nama" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Kelas</label>
                                            <div class="input-group">
                                                <input type="text" id="kelas" class="form-control" placeholder="Kelas" name="kelas" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Pembayaran</label>
                                            <select name="nama_p" id="nama_p" class="form-control" onchange="return autofillPayment();">
                                                <option value="0">-- Pilih Jenis Pembayaran --</option>
                                                <?php foreach ($pembayaran as $data) : ?>
                                                    <option value="<?= $data['id']; ?>"><?= $data['payment_name']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tarif Pembayaran</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="0" name="tarif" id="tarif" readonly>
                                            </div>
                                        </div>
                                        <button data-toggle="modal" class="btn btn-primary btn-icon-text btn-sm">
                                            <i class="ti-save btn-icon-prepend"></i>
                                            Simpan
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 grid-margin stretch-card mx-auto">
                            <div class="card position-relative">
                                <div class="card-body">
                                    <h4 class="card-title">Edit status pembayaran</h4>
                                    <?= $this->session->flashdata('emessage'); ?>
                                    <form class="forms-sample" action="<?= base_url('pembayaran/editStatusPayment'); ?>" method="post">
                                        <div class="form-group">
                                            <label>Nomor Absen</label>
                                            <div class="input-group">
                                                <input type="text" id="e_no_absen" class="form-control" placeholder="Nomor Absen" name="e_no_absen" onchange="return e_autofill();">
                                            </div>
                                            <?= form_error('e_no_absen', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Santri</label>
                                            <div class="input-group">
                                                <input type="text" id="e_nama" class="form-control" placeholder="Nama Santri" name="e_nama" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Kelas</label>
                                            <div class="input-group">
                                                <input type="text" id="e_kelas" class="form-control" placeholder="Kelas" name="e_kelas" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Pembayaran</label>
                                            <select name="e_nama_p" id="e_nama_p" class="form-control">
                                                <option value="0">-- Pilih Jenis Pembayaran --</option>
                                                <?php foreach ($pembayaran as $data) : ?>
                                                    <option value="<?= $data['id']; ?>"><?= $data['payment_name']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Status Pembayaran</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="0">-- Pilih Status Pembayaran --</option>
                                                <?php foreach ($status as $data) : ?>
                                                    <option value="<?= $data['id']; ?>"><?= $data['payment_status']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <button data-toggle="modal" class="btn btn-primary btn-icon-text btn-sm">
                                            <i class="ti-save btn-icon-prepend"></i>
                                            Simpan
                                        </button>
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

<script type="text/javascript">
    function autofill() {
        var no_absen = document.getElementById('no_absen').value;
        $.ajax({
            url: "<?php echo base_url('pembayaran/searchSantri'); ?>",
            data: '&no_absen=' + no_absen,
            success: function(data) {
                var hasil = JSON.parse(data);

                $.each(hasil, function(key, val) {
                    document.getElementById('no_absen').value = val.no_absen;
                    document.getElementById('nama').value = val.full_name;
                    document.getElementById('kelas').value = val.class;
                });
            }
        });
    }

    function autofillPayment() {
        var nama_p = document.getElementById('nama_p').value;
        $.ajax({
            url: "<?php echo base_url('pembayaran/searchPayment'); ?>",
            data: '&nama_p=' + nama_p,
            success: function(data) {
                var hasil = JSON.parse(data);

                $.each(hasil, function(key, val) {
                    // document.getElementById('nama_p').value = val.payment_name;
                    document.getElementById('tarif').value = val.pay_rate;
                });
            }
        });
    }

    function e_autofill() {
        var e_no_absen = document.getElementById('e_no_absen').value;
        $.ajax({
            url: "<?php echo base_url('pembayaran/searchESantri'); ?>",
            data: '&e_no_absen=' + e_no_absen,
            success: function(data) {
                var hasil = JSON.parse(data);

                $.each(hasil, function(key, val) {
                    document.getElementById('e_no_absen').value = val.no_absen;
                    document.getElementById('e_nama').value = val.full_name;
                    document.getElementById('e_kelas').value = val.class;
                });
            }
        });
    }
</script>