<section class="content">
  <div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-lg-3">
            <!-- general form elements -->
          <div class="card card-primary">
              <div class="card-header">
              <h3 class="card-title">Buat Pelanggan Baru</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="formPelanggan">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Nama Pelanggan</label>
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Pelanggan">
                    <input type="hidden" name="iduser" class="form-control" id="iduser">
                  </div>
                  <div class="form-group">
                    <label for="jk">Jenis Kelamin</label>
                    <div class="row">
                      <div class="col-sm-3">
                        <div class="custom-control custom-radio col-sm-3">
                          <input class="custom-control-input custom-control-input-primary custom-control-input-outline radio-inline" type="radio" id="pria" name="jk" value="Pria" checked>
                          <label for="pria" class="custom-control-label">Pria</label>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="custom-control custom-radio col-sm-3">
                          <input class="custom-control-input custom-control-input-primary custom-control-input-outline radio-inline" type="radio" id="wanita" name="jk" value="Wanita">
                          <label for="wanita" class="custom-control-label">Wanita</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="no_hp">No. HP</label>
                    <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="No HP">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat"></textarea>
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
                  <button type="submit" class="btn btn-primary">Clear</button>
                </div>
              </form>
          </div>
        </div>
        <div class="col-lg-9">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Pelanggan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="display:none">Kode</th>
                  <th style="width:0px">No.</th>
                  <th>Nama</th>
                  <th>HP</th>
                  <th>Email</th>
                  <th>Kelamin</th>
                  <th>Alamat</th>
                  <th>Username</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i=1;
                foreach($data as $pelanggan): 
                ?>
                <tr>
                  <td style="display:none"><?=$pelanggan->iduser?></td>
                  <td style="width:0px"><?=$i++?></td>
                  <td><?=$pelanggan->nama?></td>
                  <td><?=$pelanggan->no_hp?></td>
                  <td><?=$pelanggan->email?></td>
                  <td><?=$pelanggan->jk?></td>
                  <td><?=$pelanggan->alamat?></td>
                  <td><?=$pelanggan->username?></td>
                  <td>
                    <div class="buttons">
                      <button type="button" class="btn btn-primary btn-sm btn-edit" data-iduser="<?=$pelanggan->iduser?>" data-nama="<?=$pelanggan->nama?>" data-no_hp="<?=$pelanggan->no_hp?>" data-email="<?=$pelanggan->email?>" data-jk="<?=$pelanggan->jk?>" data-alamat="<?=$pelanggan->alamat?>" data-username="<?=$pelanggan->username?>"><i class="fas fa-edit"></i></button>
                      <button type="button" class="btn btn-danger btn-sm btn-delete" data-url="<?=base_url('admin/pelanggan/hapus/').$pelanggan->iduser?>"><i class="fas fa-trash-alt"></i></button>
                    </div>
                  </td>
                </tr>
                <?php endforeach?>
                </tbody>
                <tfoot>
                <tr>
                  <th style="display:none">Kode</th>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>HP</th>
                  <th>Email</th>
                  <th>Kelamin</th>
                  <th>Alamat</th>
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
    var dataTable = $("#example1").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "pageLength": 10,
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
        url: '<?=base_url('admin/pelanggan/simpan')?>',
        type: 'POST',
        data: $('#formPelanggan').serialize(),
        success:function(result){
          var hasil = JSON.parse(result);
          if(hasil.status_code == 200 || hasil.status_code == 201){
            toastr.success(hasil.message);
            setTimeout(function() {location.reload();}, 2000);     
          }else if(hasil.status_code == 409 || hasil.status_code == 410){
            toastr.warning(hasil.message);
            setTimeout(function() {location.reload();}, 2000);   
          }
        }
      })
    }
  });
  $('#formPelanggan').validate({
    rules: {
      nama: {
        required: true,
        minlength: 5,
      },
      jk: {
        required: true,
      },
      no_hp: {
        required: true,
        number: true,
        minlength: 10
      },
      email: {
        required: true,
        minlength: 5
      },
      alamat: {
        required: true,
        minlength: 10
      },
      username: {
        required: true,
        minlength: 5
      }
    },
    messages: {
      nama: {
        required: "Silahkan masukkan nama pelanggan",
        minlength: "Nama anda setidaknya harus minimal 5 karakter"
      },
      no_hp: {
        required: "Silahkan masukkan no_hp pelanggan",
        minlength: "no_hp anda setidaknya harus minimal 10 karakter",
        number: "Silahkan masukkan hanya dengan angka saja",
      },
      email: {
        required: "Silahkan masukkan email pelanggan",
        email: "Silahkan masukkan email dengan benar",
      },
      alamat: {
        required: "Silahkan masukkan alamat pelanggan",
        minlength: "Alamat anda setidaknya harus minimal 10 karakter",
      },
      username: {
        required: "Silahkan masukkan username pelanggan",
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
      nama = $(this).data('nama');
      jk = $(this).data('jk');
      no_hp = $(this).data('no_hp');
      email = $(this).data('email');
      jk = $(this).data('jk');
      alamat = $(this).data('alamat');
      username = $(this).data('username');

      if(jk == 'Pria'){
        pria = true;
        wanita = false;
      }else if(jk == 'Wanita'){
        pria = false;
        wanita = true;
      }

      document.getElementById("iduser").value = iduser;
      document.getElementById("nama").value = nama;
      document.getElementById("pria").checked = pria;
      document.getElementById("wanita").checked = wanita;
      document.getElementById("no_hp").value = no_hp;
      document.getElementById("email").value = email;
      document.getElementById("alamat").value = alamat;
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

