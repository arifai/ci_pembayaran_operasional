  <!-- plugins:js -->
  <script type="text/javascript" src="<?= base_url('assets/'); ?>vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script type="text/javascript" src="<?= base_url('assets/'); ?>js/off-canvas.js"></script>
  <script type="text/javascript" src="<?= base_url('assets/'); ?>js/jquery.js"></script>
  <script type="text/javascript" src="<?= base_url('assets/'); ?>js/jquery.min.js"></script>
  <!-- <script src="http://code.jquery.com/jquery-1.9.1.js"></script> -->
  <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
  <script type="text/javascript" src="<?= base_url('assets/'); ?>js/hoverable-collapse.js"></script>
  <script type="text/javascript" src="<?= base_url('assets/'); ?>js/template.js"></script>
  <script type="text/javascript" src="<?= base_url('assets/'); ?>js/todolist.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/datepick/5.1.1/js/jquery.datepick.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <!-- endinject -->
  <script type="text/javascript">
    // datatables
    $(document).ready(function() {
      $('#myLaporan').DataTable({
        searching: false,
      });

      $('#myTable').DataTable();

      // $("#myTable_filter input").prop('id', "search");
      // $("#myTable_filter input").prop('name', "search");
    });



    $(document).ready(function() { // Ketika halaman selesai di load
      var currentDate = new Date();
      $('.input-tanggal').datepicker({
        dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
      });
      $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
      $('#filter').change(function() { // Ketika user memilih filter
        if ($(this).val() == '1') { // Jika filter nya 1 (per tanggal)
          $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
          $('#form-tanggal').show(); // Tampilkan form tanggal
        } else if ($(this).val() == '2') { // Jika filter nya 2 (per bulan)
          $('#form-tanggal').hide(); // Sembunyikan form tanggal
          $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
        } else { // Jika filternya 3 (per tahun)
          $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
          $('#form-tahun').show(); // Tampilkan form tahun
        }
        $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
      })
    })
  </script>
  </body>

  </html>