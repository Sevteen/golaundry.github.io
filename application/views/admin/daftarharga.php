<section class="content">
  <div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-lg-3">
            <!-- general form elements -->
          <div class="card card-primary">
              <div class="card-header">
              <h3 class="card-title">Buat Data Laundry Baru</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="formLaundry">
                <div class="card-body">
                  <div class="form-group">
                    <label for="jenis">Jenis Laundry</label>
                    <input type="text" name="jenis" class="form-control" id="jenis" placeholder="Jenis Laundry">
                    <input type="hidden" name="idjenispakaian" class="form-control" id="idjenispakaian">
                  </div>
                  <div class="form-group">
                    <label for="harga">Harga <small class="hint-text">Kg/Pcs</small></label>
                    <input type="text" name="harga" class="form-control" id="harga" placeholder="Harga Per">
                  </div>
                  <div class="form-group">
                    <label for="jb">Jenis Biaya</label>
                    <div class="row">
                      <div class="col-sm-3">
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input custom-control-input-primary custom-control-input-outline radio-inline" type="radio" id="kg" name="jb" value="kg" checked>
                          <label for="kg" class="custom-control-label">Kg</label>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input custom-control-input-primary custom-control-input-outline radio-inline" type="radio" id="pcs" name="jb" value="pcs">
                          <label for="pcs" class="custom-control-label">Pcs</label>
                        </div>
                      </div>
                    </div>
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
              <h3 class="card-title">Data Laundry</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Kode</th>
                  <th>No.</th>
                  <th>Jenis</th>
                  <th>Harga</th>
                  <th>Jenis Biaya</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?=$i=1?>
                  <?php foreach($data as $daftarharga):?>
                <tr>
                  <td><?=$daftarharga->idjenispakaian?></td>
                  <td><?=$i++?></td>
                  <td><?=$daftarharga->jenis?></td>
                  <td><?=$daftarharga->harga?></td>
                  <td><?=$daftarharga->statusbiaya?></td>
                  <td>
                    <div class="button">
                      <button type="button" class="btn btn-primary btn-sm btn-edit" data-idjenispakaian="<?=$daftarharga->idjenispakaian?>" data-jenis="<?=$daftarharga->jenis?>" data-harga="<?=$daftarharga->harga?>" data-jb="<?=$daftarharga->statusbiaya?>"><i class="fas fa-edit"></i></button>
                      <button type="button" class="btn btn-danger btn-sm btn-delete" data-url="<?=base_url('admin/jenis/hapus/').$daftarharga->idjenispakaian?>"><i class="fas fa-trash-alt"></i></button>
                    </div>
                  </td>
                </tr>
                <?php endforeach;?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Kode</th>
                  <th>No.</th>
                  <th>Jenis</th>
                  <th>Harga</th>
                  <th>Jenis Biaya</th>
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
<script src="<?=base_url('assets/')?>plugins/sweetalert2/sweetalert2.min.js"></script>
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
        type: 'POST',
        data: $('#formLaundry').serialize(),
        url: '<?=base_url('admin/jenis/simpan')?>',
        success:function(result){
          
          var hasil = JSON.parse(result);
          console.log(hasil);
          if(hasil.status_code == 200){
            toastr.success(hasil.message);
            setTimeout(function() {location.reload();}, 2000); 
          }else if(hasil.status_code == 404)
            toastr.warning(hasil.message);
            setTimeout(function() {location.reload();}, 2000); 
        }
      })
    }
  });
  $('#formLaundry').validate({
    rules: {
      jenis: {
        required: true,
        minlength: 5,
      },
      harga: {
        required: true,
        number: true,
      }
    },
    messages: {
      jenisLaundry: {
        required: "Silahkan masukkan jenis Laundry",
        minlength: "Jenis Laundry setidaknya harus minimal 5 karakter"
      },
      harga: {
        required: "Silahkan masukkan harga Laundry",
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
      idjenispakaian = $(this).data('idjenispakaian');
      jenis = $(this).data('jenis');
      harga = $(this).data('harga');
      jb = $(this).data('jb');
      

      if(jb == 'kg'){
        kg = true;
        pcs = false;
      }else if(jb == 'pcs'){
        kg = false;
        pcs = true;
      }
      console.log(kg);
      document.getElementById("idjenispakaian").value = idjenispakaian;
      document.getElementById("jenis").value = jenis;
      document.getElementById("harga").value = harga;
      document.getElementById("kg").checked = kg;
      document.getElementById("pcs").checked = pcs;
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
