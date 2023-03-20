<!--**********************************
        Main wrapper start
    ***********************************-->
<!--**********************************
    Content body start
***********************************-->
<div id="main-wrapper">
    <div class="content-body">
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-lg-4 col-sm-9">
                    <div class="card gradient-2">
                        <div class="card-body">
                            <h3 class="card-title text-white">Pengaduan</h3>
                            <div class="d-inline-block">
                                <h2><?= $jumlah['pengaduan'] ?></h2>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-9">
                    <div class="card gradient-3">
                        <div class="card-body">
                            <h3 class="card-title text-white">proses</h3>
                            <div class="d-inline-block">
                                <h3><?= $jumlah['proses'] ?></h3>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-9">
                    <div class="card gradient-4">
                        <div class="card-body">
                            <h3 class="card-title text-white">Laporan selesai</h3>
                            <div class="d-inline-block">
                                <h3><?= $jumlah['selesai'] ?></h3>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
    Content body end
***********************************-->