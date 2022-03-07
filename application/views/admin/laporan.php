<section class="content">
  <div class="row" ng-app="app" ng-controller="laporanController">
      <div class="col-md-12">
          <div class="card card-primary">
              <div class="card-header">
                  <h3 class="card-title">Data Transaksi</h3>
              </div>
              <div class="card-body">
                  <div class="col-sm-5 d-flex justify-content-between">
                      <div class="col-sm-12">
                          <div class="form-group row">
                              <label for="bagian" class="col-sm-3 col-form-label">Tanggal</label>
                              <div class="col-sm-9">
                                  <div class="input-group">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text">
                                              <i class="far fa-calendar-alt"></i>
                                          </span>
                                      </div>
                                      <input type="text" class="form-control float-right" id="reservation" ng-model="tanggal">
                                      <button class="btn btn-primary caridata"
                                          data-Url="<?= base_url()?>admin/laporan/getprint"><i
                                              class="fa fa-search" ng-click="Cari()"></i></button>
                                              <button class="btn btn-primary" id="printButton">Print</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-3">
                          <div class="d-flex justify-content-start">
                              <!-- <button class="btn btn-primary" id="cetak" style="margin-right:12px;">Cetak</button>
                              <div id="tombolPdf"></div> -->
                              <!-- <button class="btn btn-primary pdfconvert" target="_blank"
                                  data-Url="<?= base_url()?>admin/laporan/CetakPDF">PDF</button> -->
                          </div>
                      </div>
                  </div>
                  <div id="printElement">
                    <div class="print-header">
                      <center>
                      <h3>LAPORAN TRANSAKSI</h3>
                        <h4><span id="tgllaporan"></span> </h4>
                        <hr><br>
                      </center>
                    </div>
                    <table class="table table-bordered" id="konten" width="100%">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th class="text-center">Kode Pemesanan</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Alamat</th>
                                <th class="text-center">Tanggal Ambil</th>
                                <th class="text-center">Tanggal Antar</th>
                                <th class="text-center">Jenis</th>
                                <th class="text-center">Berat (Kg)</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Biaya Ambil</th>
                                <th class="text-center">Biaya Antar</th>
                                <th class="text-center">Bayar</th>
                            </tr>
                        </thead>
                        <tbody ng-repeat="trx in datas">
                              <tr>
                                  <td rowspan = "{{datas.length+2}}">{{$index+1}}</td>
                                  <td rowspan = "{{datas.length+2}}">{{trx.kd_pemesanan}}</td>
                                  <td rowspan = "{{datas.length+2}}">{{trx.nama}}</td>
                                  <td rowspan = "{{datas.length+2}}">{{trx.alamat}}</td>
                                  <td rowspan = "{{datas.length+2}}">{{trx.tgl_pemesanan}}</td>
                                  <td rowspan = "{{datas.length+2}}">{{trx.tgl_ambil}}</td>
                                  
                                  
                              </tr>
                              <tr ng-repeat="detail in trx.detail">
                                  <td>{{detail.jenis}}</td>
                                  <td>{{detail.berat}}</td>
                                  <td>{{detail.jumlah}}</td>
                                  <td>{{detail.biayaambil}}</td>
                                  <td>{{detail.biayaantar}}</td>
                                  <td>{{detail.bayar}}</td>
                                  
                              </tr>
                              <tr>
                                  <td colspan="5">Total Bayar</td>
                                  <td>{{trx.total}}</td>
                              </tr>
                        </tbody>
                    </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/print.min.js"></script>

<script>
    angular.module('app', [])
    .controller('laporanController', function($scope, $http){
        $scope.tanggal;
        $scope.datas = [];
        $scope.Cari = ()=>{
            var a = $scope.tanggal.split(' - ');
            dataa = {
                'tglawal': a[0],
                'tglakhir': a[1]
            };
            $http({
                method: 'post',
                url: '<?= base_url()?>admin/laporan/getprint',
                data: dataa
            }).then(params=>{
                $scope.datas = params.data;
            })
        }
        
    })
$(function() {
    var doc = new jsPDF();
    $('#konvert').click(function () {   
        doc.fromHTML($('#example1').html(), 15, 15, {
            'width': 170,
                'elementHandlers': specialElementHandlers
        });
        doc.save('contoh-file.pdf');
    });
    $(document).ready(function() {
        var tgl1 = $("#reservation").val();
            var a = tgl1.split(' - ');
            var dataa = {
                'tglawal': a[0],
                'tglakhir': a[1]
            };

        bsCustomFileInput.init();
    });
})
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>