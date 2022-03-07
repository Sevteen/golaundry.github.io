<section class="content">
  <div class="row" ng-app="app" ng-controller="trxController">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Data Traksasi</h3>
        </div>
        <div class="card-body">
          <table class="table table-bordered" id="konten" width="100%">
            <thead class="bg-secondary">
              <tr>
                <th style="width: 10px">No</th>
                <th class="text-center">Kode Pemesanan</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Alamat</th>
                <th class="text-center">Tanggal Ambil</th>
                <th class="text-center">Tanggal Antar</th>
                <th class="text-center">Total</th>
                <th class="text-center">Detail</th>
              </tr>
            </thead>
            <tbody ng-repeat="trx in datas">
              <tr>
                <td style="vertical-align:middle; text-align:center;">{{$index+1}}</td>
                <td style="vertical-align:middle; text-align:center;">{{trx.kd_pemesanan}}</td>
                <td style="vertical-align:middle; text-align:center;">{{trx.nama}}</td>
                <td style="vertical-align:middle; text-align:center;">{{trx.alamat}}</td>
                <td style="vertical-align:middle; text-align:center;">{{trx.tgl_pemesanan}}</td>
                <td style="vertical-align:middle; text-align:center;">{{trx.tgl_ambil}}</td>
                <td style="vertical-align:middle; text-align:center;">{{trx.total}}</td>
                <td>
                  <div class="buttons text-center">
                    <button type="button" class="btn btn-primary btn-sm btn-view" ng-click="setDetail(trx)"><i class="fas fa-eye"></i></button>
                  </div>
                  <!-- <table style="margin:auto">
                    <tr ng-repeat="detail in trx.detail">
                      <td style="border:none">{{detail.berat}}</td>
                      <td style="border:none">{{detail.jenis}}</td>
                      <td style="border:none">{{detail.jumlah}}</td>
                      <td style="border:none">{{detail.bayar}}</td>
                    </tr>
                  </table> -->
              </tr>
            </tbody>
          </table>
        </div>
      </div>
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
              <table class="table table-bordered">
                <thead class="bg-secondary">
                  <tr>
                    <th>Berat</th>
                    <th>Jenis Pakaian</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat="detail in itemTransaksi">
                      <td>{{detail.berat}}</td>
                      <td>{{detail.jenis}}</td>
                      <td>{{detail.jumlah}}</td>
                      <td>{{detail.bayar}}</td>
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
    .controller('trxController', function ($scope, $http) {
      $scope.datas = [];
      $scope.model = {};
      $scope.model.jenis = [];
      $scope.model.tgl_ambil = new Date();
      $scope.model.total = 0;
      $scope.tombol = "Simpan"
      $scope.cetak = false;
      $scope.itemTransaksi = [];
      $scope.dataprint = {};
      $http({
        method: 'get',
        url: '<?=base_url()?>member/transaksi/gettransaksi',
      }).then(response => {
        $scope.datas = response.data;
        angular.forEach($scope.datas.transaksi, value => {
          var tgl = value.tgl_ambil.split('-');
          value.tanggal = new Date(tgl[0], tgl[1] - 1, tgl[2]);
          value.tanggal = convertanggal(value.tanggal)
        })
      })
      
      $scope.setDetail= (trx)=>{
        $scope.itemTransaksi = trx.detail;
        console.log(trx.detail);
        $('#detail').modal('show');
      }
    })
</script>