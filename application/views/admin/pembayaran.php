<style>
  .select2-container .select2-selection--single {
    height: 2.4rem;
  }
</style>
<section class="content">
  <div class="row" ng-app="app" ng-controller="transaksiController">
    <div class="col-md-4">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Input Transaksi</h3>
        </div>
        <form ng-submit="simpan()" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group row kd_pemesanan" id="kd_pemesanan">
              <label for="id" class="col-sm-4 col-form-label">Kode Pemesanan</label>
              <div class="col-sm-8">
                <div ng-show="tombol=='Simpan'" ng-hide="tombol=='Ubah'">
                  <select ng-options="item as item.kd_pemesanan for item in datas.pemesanan" class="form-control select2"
                    ng-model="pemesanan" style="width: 100%;" ng-change="clear(); model.id_pemesanan = pemesanan; selected(); ">
                  </select>
                </div>
                <input ng-show="tombol=='Ubah'" ng-hide="tombol=='Simpan'" type="text" class="form-control"
                  ng-model="model.kd_pemesanan" disabled>

              </div>
            </div>
            <div class="form-group row">
              <label for="tgl_ambil" class="col-sm-4 col-form-label">Tanggal Ambil</label>
              <div class="col-sm-8">
                <input type="date" class="form-control" name="tgl_ambil" id="tgl_ambil" ng-model="model.tgl_ambil"
                  required>
              </div>
            </div>
          </div>
          <div class="card-footer justify-content-between">
            <input type="submit" class="btn btn-primary" value="{{tombol}}">
            <button type="button" class="btn btn-default" ng-click="clear()">Clear</button>
            <button ng-if="cetak" type="button" class="btn btn-success" id="printNota" ng-click="print()">Cetak</button>
          </div>
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Detail</h3>
        </div>
        <div class="card-body">
          <table class="table table-bordered" id="table">
            <thead>
              <tr>
                <th>Jenis</th>
                <th>Berat</th>
                <th>Jumlah</th>
                <th>Biaya Ambil</th>
                <th>Biaya Antar</th>
                <th>Bayar</th>
              </tr>
            </thead>
            <tbody>
              <tr ng-repeat="item in model.jenis">
                <td><input type="text" class="form-control" ng-model="item.jenis" disabled></td>
                <td><input type="number" class="form-control" ng-model="item.berat" ng-change="hitung()"></td>
                <td><input type="number" class="form-control" ng-model="item.jumlah" ng-change="hitung()" disabled></td>
                <td>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp. </span>
                    </div>
                    <input type="number" class="form-control text-right" ng-model="item.biayaambil" ng-change="hitung()" >
                  </div>
                </td>
                <td>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp. </span>
                    </div>
                    <input type="number" class="form-control text-right" ng-model="item.biayaantar" ng-change="hitung()">
                  </div>
                </td>
                <td>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp. </span>
                    </div>
                    <input type="text" class="form-control text-right" ng-model="item.bayar" format="currency" disabled>
                  </div>
                </td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="5"></td>
                <td>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp. </span>
                    </div>
                    <input type="text" class="form-control text-right" ng-model="model.total" format="currency" disabled>
                  </div>
                </td>

              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>

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
  $('.select2').select2({
    placeholder: "Pilih item"
  });

  $('.select2bs4').select2({
    theme: 'bootstrap4'
  });
  angular.module('app', [])
    .directive('format', ['$filter', function ($filter) {
      return {
        require: '?ngModel',
        link: function (scope, elem, attrs, ctrl) {
          if (!ctrl) return;

          ctrl.$formatters.unshift(function (a) {
            return $filter(attrs.format)(ctrl.$modelValue, attrs.format == 'currency' ? ' ' : null)
          });

          elem.bind('blur', function (event) {
            var plainNumber = elem.val().replace(/[^\d|\-+|\.+]/g, ' ');
            elem.val($filter(attrs.format)(plainNumber));
          });
        }
      };
    }])
    .controller('transaksiController', function ($scope, $http) {
      $scope.datas = [];
      $scope.model = {};
      $scope.model.jenis = [];
      $scope.model.tgl_ambil = new Date();
      $scope.model.total = 0;
      $scope.tombol = "Simpan"
      $scope.cetak = false;
      $scope.dataprint = {};
      $http({
        method: 'get',
        url: '<?=base_url()?>admin/transaksi/gettransaksi',
      }).then(response => {
        $scope.datas = response.data;
        angular.forEach($scope.datas.transaksi, value => {
          var tgl = value.tgl_ambil.split('-');
          value.tanggal = new Date(tgl[0], tgl[1] - 1, tgl[2]);
          value.tanggal = convertanggal(value.tanggal)
        })
      })
      $scope.selected = () => {
        var item = $scope.model.id_pemesanan.detail
        if (item) {
          angular.forEach(item, value=>{
            value.berat = 0;
            value.jumlah = parseInt(value.jumlah);
            value.biayaambil = 0;
            value.biayaantar = 0;
            value.bayar = 0;
            value.total = 0;
            $scope.model.jenis.push(angular.copy(value));
          })
          $scope.hitung();
        }
      }
      $scope.simpan = () => {
        $http({
          method: 'post',
          url: '<?=base_url()?>admin/transaksi/simpan',
          data: $scope.model
        }).then(response => {
          $scope.datas = response.data;
          angular.forEach($scope.datas.transaksi, value => {
            var tgl = value.tgl_ambil.split('-');
            value.tanggal = new Date(tgl[0], tgl[1] - 1, tgl[2]);
            value.tanggal = convertanggal(value.tanggal)
          })
          $scope.tombol = "Simpan"
          $scope.tombol = "Ubah"
          if ($scope.model.kd_transaksi == undefined) {
            $scope.clear()
            toastr.success("Data berhasil disimpan");
          } else {
            $scope.clear()
            toastr.success("Data berhasil diperbarui");
          }
        }, error => {
          toastr.success("Error").then((value) => {

          });
        })
      }
      $scope.ubah = (item) => {
        $scope.model = angular.copy(item);
        var cektanggal = typeof $scope.model.tgl_ambil;
        if (cektanggal == "string") {
          var tgl = $scope.model.tgl_ambil.split('-');
          $scope.model.tgl_ambil = new Date(tgl[0], tgl[1] - 1, tgl[2]);
        }
        angular.forEach($scope.model.jenis, value => {
          value.berat = parseInt(value.berat);
          value.jumlah = parseInt(value.jumlah);
          value.biayaambil = parseInt(value.biayaambil);
          value.biayaantar = parseInt(value.biayaantar);
        })
        $scope.cetak = true;
        $scope.tombol = "Ubah"
      }
      $scope.clear = () => {
        $scope.model = {};
        $scope.model.jenis = [];
        $scope.tombol = "Simpan"
        $scope.cetak = false;
      }
      $scope.print = () => {
        $http({
          method: 'get',
          url: '<?= base_url()?>admin/profile/getprofile'
        }).then(params => {
          $scope.dataprint = params.data;
          setTimeout(function() {
            $('#data-print').printArea();
          }, 500);
          
        })

      }
      $scope.hitung = () => {
        $scope.model.total = 0;
        angular.forEach($scope.model.jenis, item => {
          if (item.statusbiaya == 'kg') {
            item.bayar = (parseFloat(item.berat) * parseInt(item.harga)) + parseFloat(item.biayaambil) + parseFloat(item.biayaantar);
            $scope.model.total += item.bayar;
          } else {
            item.bayar =( parseInt(item.jumlah) * parseInt(item.harga)) + parseFloat(item.biayaambil) + parseFloat(item.biayaantar);
            $scope.model.total += item.bayar;
          }
        })
      }
    })
</script>
