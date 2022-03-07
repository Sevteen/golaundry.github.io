    </div>
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1.0
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/')?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/')?>plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url('assets/')?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url('assets/')?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url('assets/')?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('assets/')?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/')?>dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/')?>dist/js/demo.js"></script>
  <script src="<?= base_url();?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <script src="<?= base_url();?>assets/plugins/select2/js/select2.full.min.js"></script>
  <script src="<?= base_url();?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
  <script src="<?= base_url();?>assets/plugins/daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.PrintArea.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/print.min.js"></script>
    <script type="text/javascript">
  
    $(document).ready(function () {
      bsCustomFileInput.init();
    });

    $('.select2').select2({
      placeholder: "Pilih item"
    });

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
    $('#reservation').daterangepicker({
      locale: {
            format: 'YYYY/MM/DD'
        }
    })
    $(".caridata").bind("click", function(event) {
      const tgl = $("#reservation").val();
      const Url = $(this).data('url');
      var a = tgl.split(' - ');
      dataa = {
        'tglawal': a[0],
        'tglakhir': a[1]
      };
      var datatanggal = "Dari Tanggal " + convertanggal(a[0]) + " s/d " + convertanggal(a[1]);
      $("#tgllaporan").text(datatanggal);
      $('.action').css('display', 'none');
      $('.dataTables_filter').css('display', 'none');
      $('.dataTables_info').css('display', 'none');
      $('.dataTables_paginate').css('display', 'none');
      $('.dataTables_length').css('display', 'none');
      $('.action').css('display', 'block');
      $('.dataTables_filter').css('display', 'block');
      $('.dataTables_info').css('display', 'block');
      $('.dataTables_paginate').css('display', 'block');
      $('.dataTables_length').css('display', 'block');
    });
    function convertanggal(item){
      item = new Date(item)
      var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
      var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
      var tanggal = item.getDate();
      var xhari = item.getDay();
      var xbulan = item.getMonth();
      var xtahun = item.getYear();
      var hari = hari[xhari];
      var bulan = bulan[xbulan];
      var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;
      return (tanggal + ' ' + bulan + ' ' + tahun);
    }
  </script>
</body>
</html>
