        <!-- Main content -->
        <section class="content">
            <div class="jumbotron bg-dark bg-gradient py-0">
                <div class="container-fluid container-fixed-lg">
                    <div class="row p-0">
                        <div class="col-xl-7">
                            <div class="full-height">
                                <div class="card-body text-center justify-content-center align-items-center d-flex full-height">
                                    <h2>GoLaundry Logo</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5">
                            <div class="card shadow-none bg-transparent ">
                                <div class="card-header border-0">
                                    <div class="card-title text-capitalize">Kami mencoba menjadi yang terbaik dari yang terbaik</div>
                                </div>
                                <div class="card-body border-0">
                                    <h3>GoLaundry</h3>
                                    <p>Kami saat ini sedang berusaha untuk menjadi terbaik dari yang terbaik. Terima kasih atas kepercayaan anda telah menggunakan jasa kami.</p>
                                    <p class="small hint-text">Kami anda selalu memberikan kami informasi apapun tentang kekuarangan kami. <br> Terima Kasih.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="container-fluid">
            <div class="row justify-content-center pt-5 mt-5">
                <div class="center">
                    <center>
                        <span style="font-size:50px; margin-bottom:-20px"><b>Selamat Datang di</b></span><br>
                        <span style="font-size:50px; margin-top:-20px"><b><?= strtoupper($data->nama_laundry);?></b></span><br>
                        <span style="font-size:20px; font-style:italic;">Alamat: <?= $data->alamat_laundry?> Telp. <?= $data->no_tlp?></span>
                    </center>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>