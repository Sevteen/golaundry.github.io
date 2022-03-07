<div class="content pb-5 tarif">
    <div class="container">
        <div class="row py-5">
            <div class="col text-center">
                <h2 class="fw-bold text-dark">Daftar Tarif Laundry</h2> 
                <hr style="width:100px; margin: auto;">
            </div>
        </div>
        <?php foreach($data as $d => $jenis): ?>
            <div class="head">
                <h2 class="fw-bold">
                    <?php 
                    if($d=='kg'){
                        echo 'Cuci Kiloan';
                    }
                    if($d=='pcs'){
                        echo 'Cuci Satuan';
                    }?>
                </h2>
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mb-5" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr style="background-color: #3fa1c6; color:#eaeaea">
                                <th width="20px">No</th>
                                <th>Jenis</th>
                                <th width="250px">Biaya</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach($jenis as $archive): ?>
                                <tr>
                                <td align="center"><?=$i ?></td>
                                <td><?=$archive->jenis ?></td>
                                <td ><?=$archive->harga?> <span style="font-size: 12px"><?="/".$archive->statusbiaya?></span></td>
                                </tr>
                                <?php $i++ ; endforeach ?>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <h5>Note</h5>
        <ul>
            <li>Cuci Express estimasi 10jam</li>
            <li>Selain cuci Express estimasi 2hari</li>
        </ul>
    </div>
</div>

