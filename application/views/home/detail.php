<body>
    <div class="container-scroller">
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a href="<?= base_url(''); ?>"><i class="ti-arrow-left"></i></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-start">
                <h5 class="text-uppercase"><?= $title; ?></h5>
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
                                            <h4 class="card-title">Informasi Santri</h4>
                                            <div class="table-responsive pt-3">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td>No. Absen</td>
                                                            <td>:</td>
                                                            <td><?= $detail->no_absen; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nama</td>
                                                            <td>:</td>
                                                            <td class="text-uppercase"><?= $detail->full_name; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kelas</td>
                                                            <td>:</td>
                                                            <td><?= $detail->class; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-10 offset-md-1">
                                <div class="col-12 grid-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Tagihan Pembayaran</h4>
                                            <div class="table-responsive pt-3">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Nama Pembayaran</th>
                                                            <th>Status Pembayaran</th>
                                                            <th>Jumlah</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        if ($pembayaran == NULL) {
                                                            echo '<tr>
                                                                    <td colspan="4" class="text-center text-capitalize">belum ada tagihan</td>
                                                                </tr>';
                                                        } else {
                                                            $total = 0;
                                                            $i = 1;
                                                            foreach ($pembayaran as $data) {
                                                                echo '<tr>';
                                                                echo '<td>' . $i, '</td>';
                                                                echo '<td>' . $data['payment_name'] . '</td>';
                                                                if ($data['payment_status_id'] == 1) {
                                                                    echo '<td align="center" class="bg-warning text-white text-uppercase">' . $data['payment_status'] . '</td>';
                                                                } else if ($data['payment_status_id'] == 2) {
                                                                    echo '<td align="center" class="bg-success text-white text-uppercase">' . $data['payment_status'] . '</td>';
                                                                } else if ($data['payment_status_id'] == 3) {
                                                                    echo '<td align="center" class="bg-danger text-white text-uppercase">' . $data['payment_status'] . '</td>';
                                                                } else {
                                                                    echo '<td align="center" class="bg-secondary text-white text-uppercase">' . $data['payment_status'] . '</td>';
                                                                }
                                                                $i++;
                                                                $total += $data['pay_rate'];
                                                                echo '<td>' . rupiah($data['pay_rate']) . '</td>';
                                                            }
                                                            echo '</tr>';
                                                            echo '</tr>';
                                                            echo '<tr>';
                                                            echo '<td colspan="3" class="font-weight-bold text-center">Total</td>';
                                                            echo '<td>' . rupiah($total) . '</td>';
                                                            echo '</tr>';
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
                    </div>
                </div>
                <?php $this->load->view('partials/_footbar.php') ?>
            </div>
        </div>
    </div>
</body>