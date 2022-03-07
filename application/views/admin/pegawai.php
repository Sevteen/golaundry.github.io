<section class="content">
  <div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-lg-3">
            <!-- general form elements -->
          <div class="card card-primary">
              <div class="card-header">
              <h3 class="card-title">Buat Pegawai Baru</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="formPegawai">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama_pegawai">Nama Pegawai</label>
                    <input type="hidden" name="iduser" class="form-control" id="iduser">
                    <input type="text" name="nama_pegawai" class="form-control" id="nama_pegawai" placeholder="Nama Pegawai">
                  </div>
                  <div class="form-group">
                    <label for="bagian">Bagian</label>
                    <input type="text" name="bagian" class="form-control" id="bagian" placeholder="Bagian">
                  </div>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
          </div>
        </div>
        <div class="col-lg-9">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Pegawai</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="display: none">Kode</th>
                  <th style="width: 1px;">No.</th>
                  <th>Nama</th>
                  <th>Bagian</th>
                  <th>Username</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                defined('BASEPATH') OR exit('No direct script access allowed');
                $i=1;
                foreach($data as $pegawai):
                ?>
                <tr>
                  <td style="display: none;"><?=$pegawai->iduser?></td>
                  <td style="vertical-align: middle"><?=$i++?></td>
                  <td style="vertical-align: middle"><?=$pegawai->nama_pegawai?></td>
                  <td style="vertical-align: middle"><?=$pegawai->bagian?></td>
                  <td style="vertical-align: middle"><?=$pegawai->username?></td>
                  <td style="vertical-align: middle">
                    <div class="buttons">
                      <button type="button" class="btn btn-primary btn-sm btn-edit" data-iduser="<?=$pegawai->iduser?>" data-nama_pegawai="<?=$pegawai->nama_pegawai?>" data-bagian="<?=$pegawai->bagian?>" data-username="<?=$pegawai->username?>"><i class="fas fa-edit"></i></button>
                      <button type="button" class="btn btn-danger btn-sm btn-delete" data-url="<?=base_url('admin/pegawai/hapus/').$pegawai->iduser?>"><i class="fas fa-trash-alt"></i></button>
                    </div>
                  </td>
                </tr>
                <?php endforeach;?>
                </tbody>
                <tfoot>
                <tr>
                  <th style="display: none">Kode</th>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Bagian</th>
                  <th>Username</th>
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
  </div>
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
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      "columnDefs": [{
              "targets": [0],
              "visible": false,
              "searchable": false
      }]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });

  $(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      $.ajax({
        url: '<?=base_url('admin/pegawai/simpan')?>',
        type: 'POST',
        data: $('#formPegawai').serialize(),
        success:function(result){
          var hasil = JSON.parse(result);
          if(hasil.status_code == 200 || hasil.status_code == 201){
            toastr.success(hasil.message);
            setTimeout(function() {location.reload();}, 2000);
          }else if(hasil.status_code == 409 || hasil.status_code == 410){
            toastr.warning(hasil.message);
          }
        }
      })
    }
  });
  $('#formPegawai').validate({
    rules: {
      nama_pegawai: {
        required: true,
        minlength: 5,
      },
      bagian: {
        required: true,
      },
      username: {
        required: true,
        minlength: 5
      }
    },
    messages: {
      namapegawai: {
        required: "Silahkan masukkan nama pegawai",
        minlength: "Nama anda setidaknya harus minimal 5 karakter"
      },
      bagian: {
        required: "Silahkan masukkan bagian pegawai",
      },
      username: {
        required: "Silahkan masukkan username pegawai",
        minlength: "Username anda setidaknya harus minimal 5 karakter"
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });

  $(document).ready(function(){
    $('body').on("click", ".btn-edit", function(){
      iduser = $(this).data('iduser');
      nama_pegawai = $(this).data('nama_pegawai');
      bagian = $(this).data('bagian');
      username = $(this).data('username');

      document.getElementById("iduser").value = iduser;
      document.getElementById("nama_pegawai").value = nama_pegawai;
      document.getElementById("bagian").value = bagian;
      document.getElementById("username").value = username;

      document.getElementById("username").readOnly = true;
    })

    $('body').on("click", ".btn-delete", function(){
        Swal.fire({
          title: 'Information!',
          text: 'Anda yakin ingin menghapus data?',
          showCancelButton: true,
          confirmButtonText: 'Iya',
          cancelButtonText: `Tidak`,
        }).then((result) => {
          /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
            const Url = $(this).data('url');
            var tr = $(this).closest('tr');
            $.ajax({
              type: 'DELETE',
              url: Url,
              success:function(result){
                var hasil = JSON.parse(result);
                if(hasil.status_code == 200){
                  toastr.success(hasil.message);
                  setTimeout(function() {location.reload();}, 2000);
                }else{
                  toastr.warning(hasil.message);
                }
              }
            })
          }
        })
    })
  })
});



</script>
