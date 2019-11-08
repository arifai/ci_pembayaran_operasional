<?php $this->load->view('partials/_header.php') ?>

<body>
    <h3 class="text-center">Laporan Pembayaran</h3>
    <h4 class="text-center"><?= $ket; ?></h4>

    <div class="table-responsive pt-3">
        <table class="table table-striped">
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
                if (!empty($report)) {
                    $no = 1;
                    $total = 0;
                    foreach ($report as $data) {
                        echo "<tr>";
                        echo "<td>" . $no . "</td>";
                        echo "<td>" . $data['full_name'] . "</td>";
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
                    echo '<td colspan="5" class="font-weight-bold text-center">Total</td>';
                    echo '<td>' . rupiah($total) . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        <?php
        date_default_timezone_set('Asia/Jakarta');
        echo '<p>Dicetak pada tanggal: ' . date('d-m-Y H:i:s') . '</p>';
        ?>
    </div>
</body>