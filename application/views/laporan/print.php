<?php $this->load->view('partials/_header.php') ?>

<style>
    footer {
        clear: both;
        position: relative;
        margin-top: 50px;
        color: grey;
    }

    .name {
        margin-top: 35px;
        /* color: grey; */
    }

    .right {
        margin-top: 20px;
        float: right;
        text-align: center;
        padding: 10px;
        margin-left: 75%;
    }
</style>

<body>
    <center>
        <h3 class="font-weight-bold">Pondok Pesantren Miftahul Huda</h3>
        <h4>Siwatu, Bumiroso, Watumalang, Wonosobo</h4>
        <hr>
        <p class="font-weight-bold">Laporan Pembayaran</p>
        <p><?= $ket; ?></p>
    </center>

    <div class="table-responsive pt-3">
        <table class="table table-striped">
            <thead align="center">
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Pembayaran</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Tarif</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($report)) {
                    $no = 1;
                    $total = 0;
                    foreach ($report as $data) {
                        echo "<tr>";
                        echo "<td>" . $no . "</td>";
                        echo "<td>" . $data['full_name'] . "</td>";
                        echo "<td>" . $data['class'] . "</td>";
                        echo "<td>" . $data['payment_name'] . "</td>";
                        echo "<td>" . $data['payment_status'] . "</td>";
                        echo "<td>" . date('d-m-Y', strtotime($data['ts'])) . "</td>";
                        echo "<td>" . rupiah($data['pay_rate']) . "</td>";
                        echo "</tr>";
                        $no++;
                        $total += $data['pay_rate'];
                        // break;
                    }
                    echo '<tr>';
                    echo '<td colspan="6" class="font-weight-bold text-center">Total</td>';
                    echo '<td>' . rupiah($total) . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table> <br>
        <?php
        date_default_timezone_set('Asia/Jakarta');
        echo '<p style="color: grey">Dicetak pada tanggal: ' . date('d-m-Y H:i:s') . '</p>';
        ?>
    </div>
    <div class="right">
        <p>TTD</p>
        <p>BENDAHARA</p>
        <p class="name">(.............................................)</p>
    </div>

    <footer>
        <hr>
        <center>
            <p>Untuk melihat informasi pembayaran silahkan buka website <a href="https://syahriahppmh.com">www.syahriahppmh.com</a></p>
        </center>
    </footer>
</body>