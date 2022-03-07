<section class="content">
  <div ng-app="app" ng-controller="pemesananController">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Data Pemesanan</h3>
          </div>
          <div class="card-body">
            <div class="row d-flex flex-row-reverse" style="margin-bottom:12px;">
              <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modal-warning" ng-click="itemPesanan=[]"><i class="fas fa-plus nav-icon"></i><span> Pesanan Baru</span></a>
            </div>  
            <table class="table table-bordered">
              <thead  class="bg-secondary">
                <tr>
                  <th>Kode Pemesanan</th>
                  <th>Tanggal Pemesanan</th>
                  <th>Status</th>
                  <th  style="width: 15%">Action</th>
                </tr>
              </thead>
              <tbody>
                  <tr ng-repeat="item in datas.data.data">
                      <td>{{item.kd_pemesanan}}</td>
                      <td>{{item.tgl_pemesanan}}</td>
                      <td>{{item.status}}</td>
                      <td>
                        <div class="buttons">
                          <button type="button" class="btn btn-primary btn-sm btn-view" ng-click="setDetail(item)"><i class="fas fa-eye"></i></button>
                          <button type="button" class="btn btn-danger btn-sm btn-delete" data-url="<?=base_url('member/pemesanan/hapus/')?>{{item.kd_pemesanan}}"><i class="fas fa-trash-alt"></i></button>
                        </div>
                      </td>
                  </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal-warning">
      <div class="modal-dialog">
        <div class="modal-content bg-default">
          <div class="modal-header">
            <h4 class="modal-title">Data Pesanan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                  <div class="form-group row">
                    <label for="jenispakaian" class="col-sm-4 col-form-label">Jenis Pakaian</label>
                    <div class="col-sm-8">
                      <select class="form-control" ng-options="item as item.jenis for item in datas.jenis" name="idjenispakaian" ng-model="jenis" ng-change="model.jenis=jenis.jenis;model.idjenispakaian= jenis.idjenispakaian" id="jenispakaian">
                        <option></option>                      
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="jumlah" class="col-sm-4 col-form-label">Jumlah Pakaian</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="jumlah" id="jumlah" ng-model="model.jumlah">
                    </div>
                  </div>
                  <div class="form-group row delivery-option">
                    <label for="delivery" class="col-sm-4 col-form-label">Antar/Jemput</label>
                    <div class="col-sm-8">
                      <input type="checkbox" class="form-control" name="delivery" id="delivery" ng-model="model.delivery">
                    </div>
                  </div>
                  <div class="form-group row">
                    <button type="button" class="btn btn-info" ng-click="add()">Tambah</button>
                  </div>
                </form>
              </div>
              <table class="table table-sm table-bordered">
                <thead>
                  <tr>
                    <th>Jenis Pakaian</th>
                    <th>Jumlah Potong</th>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat = "item in itemPesanan">
                    <td>{{item.jenis}}</td>
                    <td>{{item.jumlah}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-outline-dark" ng-click="simpan()">Simpan</button>
              </div>
          
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="detail">
      <div class="modal-dialog">
        <div class="modal-content bg-default">
          <div class="modal-header">
            <h4 class="modal-title">Detail Pesanan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            
            <div class="card-body">
              <table class="table table-sm table-bordered">
                <thead>
                  <tr>
                    <th>Jenis Pakaian</th>
                    <th>Jumlah Potong</th>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat = "item in itemPesanan">
                    <td>{{item.jenis}}</td>
                    <td>{{item.jumlah}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Tutup</button>
              </div>
          
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
  </div>
</section>
<!-- SweetAlert2 -->
<script src="<?php echo base_url('assets/')?>plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?=base_url('assets/')?>plugins/toastr/toastr.min.js"></script>
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
    $(document).ready(function () {
    $('body').on("click", ".btn-delete", function(){
        Swal.fire({
          title: 'Information!',
          text: 'Anda yakin ingin menghapus data?',
          showCancelButton: true,
          confirmButtonText: 'Iya',
          cancelButtonText: `Tidak`,
        }).then((result) => {
          if (result.isConfirmed) {
            var Url = $(this).data('url');
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
    });
})
angular.module('app', [])
    .directive('format', ['$filter', function ($filter) {
      return {
        require: '?ngModel',
        link: function (scope, elem, attrs, ctrl) {
          if (!ctrl) return;

          ctrl.$formatters.unshift(function (a) {
            return $filter(attrs.format)(ctrl.$modelValue, attrs.format == 'currency' ? '' : null)
          });

          elem.bind('blur', function (event) {
            var plainNumber = elem.val().replace(/[^\d|\-+|\.+]/g, '');
            elem.val($filter(attrs.format)(plainNumber));
          });
        }
      };
    }])
    .controller('pemesananController', function ($scope, $http) {
      $scope.datas = [];
      $scope.model = {};
      $scope.model.jenis = [];
      $scope.model.tgl_ambil = new Date();
      $scope.model.total = 0;
      $scope.tombol = "Simpan"
      $scope.cetak = false;
      $scope.itemPesanan = [];
      $scope.jenis = {};
      $scope.dataprint = {};
      $http({
        method: 'get',
        url: '<?=base_url()?>member/pemesanan/getData',
      }).then(response => {
        $scope.datas = response.data;
      })
      $scope.simpan =()=>{
        $http({
        method: 'POST',
        url: '<?= base_url()?>member/pemesanan/simpan',
        data: $scope.itemPesanan
      }).then(response => {
        location.reload()
      })
      }
      $scope.add = ()=>{
        $scope.itemPesanan.push(angular.copy($scope.model))
        $scope.model = {};
        $scope.jenis = {};
      }

      $scope.setDetail= (item)=>{
        $scope.itemPesanan = item.detail;
        $('#detail').modal('show');
      }
    })
</script>