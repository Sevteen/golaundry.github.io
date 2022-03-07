<section class="content">
  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Pemesanan Baru</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Kode Pemesanan</th>
                  <th>Nama Pelanggan</th>
                  <th>HP</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>Tanggal Pemesanan</th>
                  <th>Pick Up / Delivery</th>
                  <th>Status</th>
                  <th>Terakhir Update</th>
                  <th style="width: 1rem">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1?>
                <?php foreach($data as $pemesanan):?>
                <tr>
                  <td><?=$pemesanan->kd_pemesanan?></td>
                  <td><?=$pemesanan->nama?></td>
                  <td><?=$pemesanan->no_hp?></td>
                  <td><?=$pemesanan->email?></td>
                  <td><?=$pemesanan->alamat?></td>
                  <td><?=$pemesanan->tgl_pemesanan?></td>
                  <td><?=($pemesanan->pick_up_delivery==1)?'Yes':'No'?></td>
                  <td><?=$pemesanan->status?></td>
                  <td><?=$pemesanan->update_at?></td>
                  <td>
                    <div class="button">
                      <button type="button" class="btn btn-primary btn-sm btn-edit" data-kd_pemesanan="<?=$pemesanan->kd_pemesanan?>" data-status="<?=$pemesanan->status?>" data-delivery="<?=$pemesanan->pick_up_delivery?>" data-toggle="modal" data-target="#modal-sm"><i class="fas fa-edit"></i></button>
                    </div>
                  </td>
                </tr>
                <?php endforeach;?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Kode Pemesanan</th>
                  <th>Nama Pelanggan</th>
                  <th>HP</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>Tanggal Pemesanan</th>
                  <th>Pick Up / Delivery</th>
                  <th>Status</th>
                  <th>Terakhir Update</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
      <!-- /.card -->
    </div>
    <form id="formPemesanan">
      <div class="modal fade" id="modal-sm">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Status</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="kd_pemesanan" class="form-control" id="kd_pemesanan">
            <label for="status">Status</label>
            <select class="form-control" name="status" data-style="btn-primary" id="status">
              <option id="booking" value="Booking">Booking</option>
              <option id="jemput" value="Jemput">Jemput</option>
              <option id="proses" value="Proses">Proses</option>
              <option id="antar" value="Antar">Antar</option>
              <option id="batal" value="Batal">Batal</option>
            </select>    
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </form>
  </div>
</div>
<!-- /.modal -->
</section>
<!-- jquery-validation -->
<script src="<?=base_url('assets/')?>plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/jquery-validation/additional-methods.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url('assets/')?>plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?=base_url('assets/')?>plugins/toastr/toastr.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?=base_url('assets/')?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/jszip/jszip.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=base_url('assets/')?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url('assets/')?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-bottom-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
  $(function () {
    $("#example1").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "pageLength": 5,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
  $('#formPemesanan').validate({
    submitHandler: function(form){
      $.ajax({
        url: '<?=base_url('admin/pemesanan/ubah')?>',
        type: "POST",
        data: $('#formPemesanan').serialize(),
        success:function(result){
          var hasil = JSON.parse(result);
          if(hasil.status_code == 200){
            toastr.success(hasil.message);
            setTimeout(function() {location.reload();}, 2000);   
          }else if(hasil.status_code == 404){
            toastr.warning(hasil.message);
            setTimeout(function() {location.reload();}, 2000);   
          }
        }
      })
    }
  })
  $(document).ready(function(){
    $('body').on('click', '.btn-edit', function(){
      delivery = $(this).data('delivery');
      status = $(this).data('status');
      kd_pemesanan = $(this).data('kd_pemesanan');

      $('#status').val(status);
      $('#kd_pemesanan').val(kd_pemesanan);
      if(delivery==1){
        $('#jemput').show();
        $('#antar').show();
      }else if(delivery==0){
        $('#jemput').hide();
        $('#antar').hide();
      }
    })
  })
</script>
