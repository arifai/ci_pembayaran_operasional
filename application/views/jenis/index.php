<body>
    <div class="container-scroller">
        <?php $this->load->view('partials/_topbar.php') ?>
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php $this->load->view('partials/_sidebar.php') ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card position-relative">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="card-title">Jenis Pembayaran</p>
                                        <button data-toggle="modal" data-target="#exampleModal" class="btn btn-success btn-icon-text btn-sm text-white">
                                            <i class="ti-plus btn-icon-prepend"></i>
                                            Tambah
                                        </button>
                                    </div>
                                    <div class="my-1">
                                        <?= form_error('pos', '<div class="alert alert-danger font-weight-light" role="alert">', '</div>'); ?>
                                    </div>
                                    <div class="my-1">
                                        <?= form_error('nama_p', '<div class="alert alert-danger font-weight-light" role="alert">', '</div>'); ?>
                                    </div>
                                    <div class="my-1">
                                        <?= form_error('tipe', '<div class="alert alert-danger font-weight-light" role="alert">', '</div>'); ?>
                                    </div>
                                    <div class="my-1">
                                        <?= form_error('tarif', '<div class="alert alert-danger font-weight-light" role="alert">', '</div>'); ?>
                                    </div>
                                    <div class="my-1">
                                        <?= form_error('tanggal', '<div class="alert alert-danger font-weight-light" role="alert">', '</div>'); ?>
                                    </div>
                                    <div class="my-1">
                                        <?= $this->session->flashdata('message'); ?>
                                    </div>
                                    <div class="table-responsive pt-3">
                                        <table class="table table-bordered" id="myTable">
                                            <thead align="center">
                                                <tr>
                                                    <th>No.</th>
                                                    <th>POS</th>
                                                    <th>Nama Pembayaran</th>
                                                    <th>Tipe</th>
                                                    <th>Tanggal</th>
                                                    <th>Tarif Pembayaran</th>
                                                    <th>Tindakan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($jenis as $s) : ?>
                                                    <tr>
                                                        <td><?= $i; ?></td>
                                                        <td><?= $s['pos']; ?></td>
                                                        <td><?= $s['payment_name']; ?></td>
                                                        <td><?= $s['type']; ?></td>
                                                        <td><?= date('d/m/Y', strtotime($s['date'])); ?></td>
                                                        <td><?= rupiah($s['pay_rate']); ?></td>
                                                        <td align="center">
                                                            <a id="edit" href="javascript:void();" data-id="<?= $s['id']; ?>" data-tarif="<?= $s['pay_rate']; ?>" data-tipe="<?= $s['type']; ?>" data-tanggal="<?= $s['date']; ?>" data-toggle="modal" data-target="#editModal">
                                                                <button class="btn btn-primary btn-sm">Atur tarif</button>
                                                            </a>
                                                            <a href=" javascript:void();" class="btn btn-danger btn-sm" onclick="doconfirm(<?= $s['id']; ?>);">Hapus</a>
                                                        </td>
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

    <!-- Add modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" action="<?= base_url('jenis'); ?>" method="post">
                        <div class="form-group">
                            <label>POS</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Gedung, Daftar Ulang, dll..." name="pos" value="<?= set_value('pos'); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nama Pembayaran</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Nama Pembayaran" name="nama_p" value="<?= set_value('nama_p'); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tipe</label>
                            <select class="form-control" name="tipe">
                                <option>Bebas</option>
                                <option>Bulanan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tarif</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                                <input type="text" class="form-control" placeholder="100.000" name="tarif" value="<?= set_value('tarif'); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <div class="input-group">
                                <input type="date" class="form-control" placeholder="dd-mm-yyyy" name="tanggal" value="<?= set_value('tanggal'); ?>">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Atur Tarif</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form" class="forms-sample" action="<?= base_url('jenis/edit_tarif'); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" placeholder="id" name="id" id="id">
                        <div class="form-group">
                            <label>Tarif</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                                <input type="text" class="form-control" placeholder="100.000" name="tarif" id="tarif">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tipe</label>
                            <select class="form-control" name="tipe" id="tipe">
                                <option>Bebas</option>
                                <option>Bulanan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <div class="input-group">
                                <input type="date" class="form-control" placeholder="dd-mm-yyyy" name="tanggal" id="tanggal">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<script type="text/javascript" src="<?= base_url('assets/'); ?>js/jquery.js"></script>
<script type="text/javascript">
    var url = "<?= base_url(); ?>";

    function doconfirm(id) {
        var r = confirm("Apa kamu yakin ingin menghapus data ini?")
        if (r == true)
            window.location = url + "jenis/delete/" + id;
        else
            return false;
    }

    $(document).on("click", "#edit", function() {
        var id = $(this).data('id');
        var tarif = $(this).data('tarif');
        var tipe = $(this).data('tipe');
        var tanggal = $(this).data('tanggal');

        $(".modal-body #id").val(id);
        $(".modal-body #tarif").val(tarif);
        $(".modal-body #tipe").val(tipe);
        $(".modal-body #tanggal").val(tanggal);
    });
</script>