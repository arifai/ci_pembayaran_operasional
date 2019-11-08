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
                                        <p class="card-title">Informasi</p>
                                        <button data-toggle="modal" data-target="#exampleModal" class="btn btn-success btn-icon-text btn-sm text-white">
                                            <i class="ti-plus btn-icon-prepend"></i>
                                            Tambah
                                        </button>
                                    </div>
                                    <div class="my-1">
                                        <?= form_error('no_absen', '<div class="alert alert-danger font-weight-light" role="alert">', '</div>'); ?>
                                    </div>
                                    <div class="my-1">
                                        <?= form_error('nama', '<div class="alert alert-danger font-weight-light" role="alert">', '</div>'); ?>
                                    </div>
                                    <div class="my-1">
                                        <?= form_error('ortu', '<div class="alert alert-danger font-weight-light" role="alert">', '</div>'); ?>
                                    </div>
                                    <div class="my-1">
                                        <?= form_error('phone', '<div class="alert alert-danger font-weight-light" role="alert">', '</div>'); ?>
                                    </div>
                                    <div class="my-1">
                                        <?= form_error('alamat', '<div class="alert alert-danger font-weight-light" role="alert">', '</div>'); ?>
                                    </div>
                                    <div class="my-1">
                                        <?= form_error('kelas', '<div class="alert alert-danger font-weight-light" role="alert">', '</div>'); ?>
                                    </div>
                                    <div class="my-1">
                                        <?= $this->session->flashdata('message'); ?>
                                    </div>
                                    <div class="table-responsive pt-3">
                                        <table class="table table-bordered" id="myTable">
                                            <thead align="center">
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nama Informasi</th>
                                                    <th>Tanggal</th>
                                                    <th>Tindakan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($info as $s) : ?>
                                                    <tr>
                                                        <td><?= $i; ?></td>
                                                        <td><?= $s['content']; ?></td>
                                                        <td><?= $s['ts']; ?></td>
                                                        <td>
                                                            <a id="edit" href="javascript:void();" data-id="<?= $s['id']; ?>" data-info="<?= $s['content']; ?>" data-toggle="modal" data-target="#editModal">
                                                                <button class="btn btn-primary btn-sm">Ubah</button>
                                                            </a>
                                                            <a href="javascript:void();" class="btn btn-danger btn-sm" onclick="doconfirm(<?= $s['id']; ?>);">Hapus</a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Informasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" action="<?= base_url('info'); ?>" method="post">
                        <div class="form-group">
                            <label>Tulis Informasi</label>
                            <div class="input-group">
                                <textarea name="info" id="info" rows="5" class="form-control"></textarea>
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
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Informasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form" class="forms-sample" action="<?= base_url('info/edit'); ?>" method="post">
                        <input type="hidden" class="form-control" placeholder="id" name="id" id="id">
                        <div class="form-group">
                            <label>Tulis Informasi</label>
                            <div class="input-group">
                                <textarea name="info" id="info" rows="5" class="form-control"></textarea>
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
</body>

<script type="text/javascript" src="<?= base_url('assets/'); ?>js/jquery.js"></script>
<script type="text/javascript">
    var url = "<?= base_url(); ?>";

    function doconfirm(id) {
        var r = confirm("Apa kamu yakin ingin menghapus data ini?")
        if (r == true)
            window.location = url + "info/delete/" + id;
        else
            return false;
    }

    $(document).on("click", "#edit", function() {
        var id = $(this).data('id');
        var info = $(this).data('info');

        $(".modal-body #id").val(id);
        $(".modal-body #info").val(info);
    });
</script>