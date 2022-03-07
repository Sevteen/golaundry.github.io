<style>
.dropdown-menu {
    width:75px;
    min-width:10px;
}
</style>
<!-- Main content -->
        <section class="content">
        <div class="container-fluid">
            <div class="row col-lg-13 justify-content-end">
                <div class="btn-group">
                    <button type="button" class="btn btn-danger dropdown-toggle  mx-2 mb-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $data['year']?>
                    </button>
                    <div class="dropdown-menu text-center" >
                        <?php

                            for($i = 0;$i<4;$i++){
                                $years = date("Y");
                                $previousyear[] = $years - $i;
                            }
                            foreach ($previousyear as $year) {
                                echo "<a class='dropdown-item' href='?year=$year' value='$year'>$year</a>";
                                
                            }
                        ?> 
                    </div>
                </div>
            </div>
            <!-- Small boxes (Stat box) -->
            <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                <div class="inner">
                    <h3><?php echo count($data['total_transaksi_selesai'])?><span class="small hint-text" style = "font-size:15px">/Tahun</span></h3>
                    <p>Total Transaksi Selesai</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                <div class="inner">
                    <h3><?php echo count($data['transaksi']['pemesanan'])?></h3>
                    <p>Total Pesanan Baru</p>
                </div>
                <div class="icon">
                    <i class="fas fa-cart-plus"></i>
                </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                <div class="inner">
                    <h3>Rp. <?php echo $data['total_pendapatan'][0]['TotalPendapatan']?><span class="small hint-text" style = "font-size:15px">/Tahun</span></h3>
                    <p>Total Pendapatan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                <div class="inner">
                    <h3><?php echo count($data['member'])?></h3>
                    <p>Total Member</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                </div>
            </div>
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
                <!-- AREA CHART -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Data Pendapatan Bulanan</h3>
                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                        <canvas id="areaChart" style="min-height: 250px; height: 295px; max-height: 295px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Ranking Customer</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th style="width: 10px">#</th>
                            <th>Nama</th>
                            <th>Total Pemesanan</th>
                            <th style="width: 40px">Rank</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach($data['rangking'] as $rangking):?>
                            <tr id="rangking">
                            <td><?php echo $i;?></td>
                            <td><?=$rangking['nama']?></td>
                            <td>Rp. <?php echo $rangking['total']; echo " (".$rangking['total_count'].")"?></td>
                            <td class="text-center"><span class="badge bg-success"><?=$i?></span></td>
                            </tr>
                            <?php $i++; endforeach;?>
                        </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>

            </section>

            <section class="col-lg-12 connectedSortable">
                    <!-- TABLE: LATEST ORDERS -->
                <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Latest Orders</h3>

                    <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                        <tr>
                        <th>KODE PEMESANAN</th>
                        <th>NAMA</th>
                        <th>STATUS</th>
                        <th>TANGGAL PEMESANAN</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; foreach($data['latest_order'] as $latest_order):?>
                            <tr id="latest_order">
                            <td><?=$latest_order['kd_pemesanan']?></td>
                            <td><?=$latest_order['nama']?></td>

                            <?php
                            $colorStatus = ''; 
                                if($latest_order['status'] == 'Booking' || $latest_order['status'] == 'Batal'){
                                    $colorStatus = 'badge badge-danger';
                                }else if ($latest_order['status'] == 'Selesai'){
                                    $colorStatus = 'badge badge-success';
                                }else{
                                    $colorStatus = 'badge badge-warning';
                                }
                                echo "<td><span class='$colorStatus'>".$latest_order['status']."</span></td>";
                            ?>
                            <td><?=$latest_order['tgl_pemesanan']?></td>
                            </tr>
                            <?php $i++; endforeach;?>
                        </tbody>
                    </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <!-- /.card-footer -->
                </div>
            </section>
            <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ChartJS -->
    <script src="<?php echo base_url('assets/')?>plugins/chart.js/Chart.min.js"></script>
    <script>

        // Mengambil data dari controller dan diolah menggunakan javascript ajax
        window.onload = function(){
            $.ajax({
                url: "<?=base_url('index.php/admin/transaksi/gettransaksi')?>",
                type: "get",
                success:function(data){
                    var d = JSON.parse(data);
                    for(var i = 0; i < d.transaksi.length; i++){
                        var tgl = d.transaksi[i].tgl_ambil;
                        var total = d.transaksi[i].total;
                        createChart();
                    }                    
                }
            });
        }
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function(n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

    function createChart(){
    // Area Chart Example
        var ctx = document.getElementById("areaChart");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
            labels: ["Januari","Febuari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"],
            datasets: [{
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: [
                    {x:'1', y:<?php echo $data['pendapatan'][0]['Jan']?>},
                    {x:'2', y:<?php echo $data['pendapatan'][0]['Feb']?>},
                    {x:'3', y:<?php echo $data['pendapatan'][0]['Mar']?>},
                    {x:'4', y:<?php echo $data['pendapatan'][0]['Apr']?>},
                    {x:'5', y:<?php echo $data['pendapatan'][0]['May']?>},
                    {x:'6', y:<?php echo $data['pendapatan'][0]['Jun']?>},
                    {x:'7', y:<?php echo $data['pendapatan'][0]['Jul']?>},
                    {x:'8', y:<?php echo $data['pendapatan'][0]['Aug']?>},
                    {x:'9', y:<?php echo $data['pendapatan'][0]['Sep']?>},
                    {x:'10', y:<?php echo $data['pendapatan'][0]['Oct']?>},
                    {x:'11', y:<?php echo $data['pendapatan'][0]['Nov']?>},
                    {x:'12', y:<?php echo $data['pendapatan'][0]['Dec']?>}
                ],
            }],
            },
            options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
                }
            },
            scales: {
                xAxes: [{
                time: {
                    unit: 'date'
                },
                gridLines: {
                    display: false,
                    drawBorder: false
                },
                ticks: {
                    maxTicksLimit: 7
                }
                }],
                yAxes: [{
                ticks: {
                    maxTicksLimit: 5,
                    padding: 10,
                    // Include a dollar sign in the ticks
                    callback: function(value, index, values) {
                    return 'Rp ' + number_format(value);
                    }
                },
                gridLines: {
                    color: "rgb(234, 236, 244)",
                    zeroLineColor: "rgb(234, 236, 244)",
                    drawBorder: false,
                    borderDash: [2],
                    zeroLineBorderDash: [2]
                }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                label: function(tooltipItem, chart) {
                    var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                    return 'Pendapatan Rp ' + number_format(tooltipItem.yLabel);
                }
                }
            }
            }
        });
    }
    
    </script>
