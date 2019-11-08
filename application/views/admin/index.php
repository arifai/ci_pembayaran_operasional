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
                                        <p class="card-title">Data Santri</p>
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
                                        <table class="table table-bordered">
                                            <thead align="center">
                                                <tr>
                                                    <th>No.</th>
                                                    <th>No. Absen</th>
                                                    <th>Nama</th>
                                                    <th>Nama Ortu</th>
                                                    <th>No. Telp Ortu</th>
                                                    <th>Alamat</th>
                                                    <th>Kelas</th>
                                                    <th>Tindakan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($santri as $s) : ?>
                                                    <tr>
                                                        <td><?= $i; ?></td>
                                                        <td><?= $s['no_absen']; ?></td>
                                                        <td><?= $s['full_name']; ?></td>
                                                        <td><?= $s['parents_name']; ?></td>
                                                        <td><?= "0" . $s['phone_num']; ?></td>
                                                        <td><?= $s['address']; ?></td>
                                                        <td><?= $s['class']; ?></td>
                                                        <td>
                                                            <a id="edit" href="javascript:void();" data-id="<?= $s['id']; ?>" data-absen="<?= $s['no_absen']; ?>" data-nama="<?= $s['full_name']; ?>" data-ortu="<?= $s['parents_name']; ?>" data-tlp="<?= $s['phone_num']; ?>" data-adrs="<?= $s['address']; ?>" data-kelas="<?= $s['class']; ?>" data-toggle="modal" data-target="#editModal">
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Santri</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" action="<?= base_url('admin'); ?>" method="post">
                        <div class="form-group">
                            <label>Nomor Absen</label>
                            <div class="input-group">
                                <input type="number" minlength="1" class="form-control" placeholder="Nomor Absen" name="no_absen" min="1" value="<?= set_value('no_absen'); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <div class="input-group">
                                <input type="text" minlength="3" class="form-control" placeholder="Nama Santri" name="nama" value="<?= set_value('nama'); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nama Orang Tua</label>
                            <div class="input-group">
                                <input type="text" minlength="3" class="form-control" placeholder="Nama Orang Tua" name="ortu" value="<?= set_value('ortu'); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>No. Telfon</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">+62</span>
                                </div>
                                <input type="text" minlength="8" maxlength="13" class="form-control" placeholder="81234567890" name="phone" value="<?= set_value('phone'); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Alamat Lengkap</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Alamat Lengkap" name="alamat" value="<?= set_value('alamat'); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Kelas" name="kelas" value="<?= set_value('kelas'); ?>">
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
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Santri</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form" class="forms-sample" action="<?= base_url('admin/edit'); ?>" method="post">
                        <input type="hidden" class="form-control" placeholder="id" name="id" id="id">
                        <div class="form-group">
                            <label>Nomor Absen</label>
                            <div class="input-group">
                                <input type="number" minlength="1" class="form-control" placeholder="Nomor Absen" name="no_absen" min="1" id="no_absen">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <div class="input-group">
                                <input type="text" minlength="3" class="form-control" placeholder="Nama Santri" name="nama" id="nama">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nama Orang Tua</label>
                            <div class="input-group">
                                <input type="text" minlength="3" class="form-control" placeholder="Nama Orang Tua" name="ortu" id="ortu">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>No. Telfon</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">+62</span>
                                </div>
                                <input type="text" minlength="8" maxlength="13" class="form-control" placeholder="81234567890" name="phone" id="phone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Alamat Lengkap</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Alamat Lengkap" name="alamat" id="alamat">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Kelas" name="kelas" id="kelas">
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
            window.location = url + "admin/delete/" + id;
        else
            return false;
    }

    $(document).on("click", "#edit", function() {
        var id = $(this).data('id');
        var absen = $(this).data('absen');
        var nama = $(this).data('nama');
        var ortu = $(this).data('ortu');
        var tlp = $(this).data('tlp');
        var adrs = $(this).data('adrs');
        var kelas = $(this).data('kelas');

        $(".modal-body #id").val(id);
        $(".modal-body #no_absen").val(absen);
        $(".modal-body #nama").val(nama);
        $(".modal-body #ortu").val(ortu);
        $(".modal-body #phone").val(tlp);
        $(".modal-body #alamat").val(adrs);
        $(".modal-body #kelas").val(kelas);
    });
</script>