<style type="text/css">

.multi_step_form{
    background: #f6f9fb;
    display: block;
    overflow: hidden;
}

#msform {
    text-align: center;
    position: relative;
    padding-top: 50px;
    min-height: 150px;  
    max-width: 810px;
    margin: 0 auto;
    background: #f8f9fa !important;
    z-index: 1; 
}

.multi_step_form li {
    list-style-type: none !important;
    color: #99a2a8;   
    font-size: 20px;
    width: calc(100%/5);
    float: left;
    position: relative; 
    font: 500 13px/1 sans-serif; 
}

.multi_step_form li:nth-child(2)::before{content: "\f00c";}
.multi_step_form li:nth-child(3)::before{content: "\f00c";}

.multi_step_form li:before {
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    content: "\f00c";
    font-size: 25px;
    width: 50px;
    height: 50px;
    line-height: 50px;
    display: block; 
    background: #d6dfe3;
    border-radius: 50%;
    margin: 0 auto 10px auto;
} 
.multi_step_form li:after {
    content: '';
    width: 100%;
    height: 10px;
    background: #cdd2d5;
    position: absolute;
    left: -50%;
    top: 21px;
    z-index: -1; 
} 
.multi_step_form li:last-child:after{width: 200%;}
.multi_step_form li.active{
    color: #5cb85c;
}
.multi_step_form li.active:before, li.active:after{
    background: #5cb85c;
    color: white;
}
</style>

<div class="content status">
    <div class="container">
        <div class="row py-5">
            <div class="col text-center">
                <h2 class="fw-bold text-dark" >Cek Status Laundry</h2>
                <hr style="width:100px; margin: auto;">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form method="GET" action="<?=base_url('status')?>" autocomplete="off">
                    <div class="row g-2 justify-content-center">
                        <div class="col-12 col-md-9 mb-2 mb-md-0">
                            <input type="text" class="form-control form-control-lg bg-light" placeholder="Masukkan OrderID Kamu..." name="orderID">
                            <p class="text-left fst-italic text-muted">For demo: 0123456789</p>
                        </div>
                        <div class="col-12 col-md-2">
                            <button type="submit" class="btn btn-block btn-lg btn-primary" style="width: 100%">Cari !</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="mx-auto pt-4 pb-2">
                    <?php if ($tampil == null): ?>
                        <div align="center">
                            <p class="mt-2 fw-bold" style="color: #6C7A89">Lacak status landry dengan memasukan OrderID anda pada form diatas.</p>
                            <img src="<?=base_url('assets/landing-page/')?>img/search.png" width="250rem">
                        </div>
                    <?php elseif($tampil == 'noData'): ?>
                    <div align="center">
                        <img src="<?=base_url('assets/landing-page/')?>img/notfound.png" width="300px">
                    </div>
                    <?php else: ?>
                        <h1 class="text-center">Status</h1>
                        <section class="multi_step_form bg-light pb-4">  
                            <div id="msform"> 
                                <h5 class="pb-4">Terakhir kali diperbarui: <?php echo $data->update_at?></h5>
                                <div class="container-fluid" >
                                    <ul id="progressbar">
                                        <div class="wrapper">
                                            <?php 
                                            $booking = '';
                                            $jemput = '';
                                            $proses = '';
                                            $selesai = '';
                                            $antar = '';
                                            if($data->pick_up_delivery == '1'){
                                                if($data->status == 'Booking'){
                                                    $booking = 'active';
                                                }
                                                if($data->status == 'Pick Up'){
                                                    $booking = 'active';
                                                    $jemput = 'active';
                                                }
                                                if($data->status == 'Proses'){
                                                    $booking = 'active';
                                                    $jemput = 'active';
                                                    $proses = 'active';
                                                }
                                                if($data->status == 'Antar'){
                                                    $booking = 'active';
                                                    $jemput = 'active';
                                                    $proses = 'active';
                                                    $antar = 'active';
                                                }
                                                if($data->status == 'Selesai'){
                                                    $booking = 'active';
                                                    $jemput = 'active';
                                                    $proses = 'active';
                                                    $antar = 'active';
                                                    $selesai = 'active';
                                                }
                                                echo "<li class='$booking'>Booking</li><li class='$jemput'>Jemput</li><li class='$proses'>Proses Laundry</li><li class='$antar'>Antar</li><li class='$selesai'>Selesai</li>";
                                            }else{
                                                if($data->status == 'Booking'){
                                                    $booking = 'active';
                                                }
                                                if($data->status == 'Proses'){
                                                    $booking = 'active';
                                                    $proses = 'active';
                                                }
                                                if($data->status == 'Selesai'){
                                                    $booking = 'active';
                                                    $proses = 'active';
                                                    $selesai = 'active';
                                                }
                                                echo "<li class='$booking'>Booking</li><li class='$proses'>Proses Laundry</li><li class='$selesai'>Selesai</li>";
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>  
                        </section>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>