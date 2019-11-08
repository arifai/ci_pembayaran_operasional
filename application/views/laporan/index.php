<body>
    <div class="container-scroller">
        <?php $this->load->view('partials/_topbar.php') ?>
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php $this->load->view('partials/_sidebar.php') ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <!-- contoh -->
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Filter</h4>
                                    <form class="form-inline">
                                        <label class="sr-only">Filter Beradasarkan</label>
                                        <select name="filter" id="filter" class="form-control form-control-sm mb-2 mr-sm-2">
                                            <option value="">-- Pilih --</option>
                                            <option value="1">Per Tanggal</option>
                                            <option value="2">Per Bulan</option>
                                            <option value="3">Per Tahun</option>
                                        </select>
                                        <label class="sr-only">Tanggal</label>
                                        <div class="input-group mb-2 mr-sm-2" id="form-tanggal">
                                            <input type="text" name="tanggal" class="input-tanggal form-control form-control-sm mb-2 mr-sm-2">
                                        </div>
                                        <label class="sr-only">Bulan</label>
                                        <div class="input-group mb-2 mr-sm-2" id="form-bulan">
                                            <select name="bulan" class="form-control form-control-sm mb-2 mr-sm-2">
                                                <option value="">Pilih</option>
                                                <option value="1">Januari</option>
                                                <option value="2">Februari</option>
                                                <option value="3">Maret</option>
                                                <option value="4">April</option>
                                                <option value="5">Mei</option>
                                                <option value="6">Juni</option>
                                                <option value="7">Juli</option>
                                                <option value="8">Agustus</option>
                                                <option value="9">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                        </div>
                                        <label class="sr-only">Tahun</label>
                                        <div class="input-group mb-2 mr-sm-2" id="form-tahun">
                                            <select name="tahun" class="form-control form-control-sm mb-2 mr-sm-2">
                                                <option value="">Pilih</option>
                                                <?php
                                                foreach ($option_tahun as $data) { // Ambil data tahun dari model yang dikirim dari controller
                                                    echo '<option value="' . $data->tahun . '">' . $data->tahun . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-2 btn-sm">Tampilkan</button>
                                        &nbsp; <a href="<?= base_url('laporan'); ?>" class="btn btn-light btn-sm">Reset Filter</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- clone contoh -->
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card position-relative">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="card-title">Pembayaran</p> <br>
                                        <div>
                                            <!-- <button data-toggle="modal" class="btn btn-primary btn-icon-text btn-sm">
                                                <i class="ti-save btn-icon-prepend"></i>
                                                Simpan
                                            </button> -->
                                            <a href="<?= $url_cetak; ?>" class="btn btn-warning btn-icon-text btn-sm">
                                                <i class="ti-printer btn-icon-prepend"></i>
                                                Print
                                            </a>
                                        </div>
                                    </div>
                                    <div class="table-responsive pt-3">
                                        <table class="table table-bordered" id="myTable">
                                            <thead align="center">
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nama</th>
                                                    <th>Nama Pembayaran</th>
                                                    <th>Status Pembayaran</th>
                                                    <th>Tanggal</th>
                                                    <th>Tarif Pembayaran</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                if (is_array($pembayaran) || is_object($pembayaran)) {
                                                    foreach ($pembayaran as $s) {
                                                        echo '<tr>';
                                                        echo '<td>' . $i . '</td>';
                                                        echo '<td>' . $s['full_name'] . '</td>';
                                                        echo '<td>' . $s['payment_name'] . '</td>';
                                                        if ($s['payment_status_id'] == 1) {
                                                            echo '<td align="center" class="bg-warning text-white text-uppercase">' . $s['payment_status'] . '</td>';
                                                        } else if ($s['payment_status_id'] == 2) {
                                                            echo '<td align="center" class="bg-success text-white text-uppercase">' . $s['payment_status'] . '</td>';
                                                        } else if ($s['payment_status_id'] == 3) {
                                                            echo '<td align="center" class="bg-danger text-white text-uppercase">' . $s['payment_status'] . '</td>';
                                                        } else {
                                                            echo '<td align="center" class="bg-secondary text-white text-uppercase">' . $s['payment_status'] . '</td>';
                                                        }
                                                        echo '<td>' . date('d-m-Y', strtotime($s['ts'])) . '</td>';
                                                        echo '<td>' . rupiah($s['pay_rate']) . '</td>';
                                                        echo '</tr>';
                                                        $i++;
                                                    }
                                                }
                                                ?>
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