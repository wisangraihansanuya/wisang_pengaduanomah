<div class="page-wrapper" style="background-color:#BA9868;">

    <!-- PAGE CONTAINER-->
    <div class="page-container" style="background-color:#BA9868;">
        <div class="wrapper">
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Penganduan</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Dashboard Pengaduan</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <br>

                        <!-- detail pengaduan -->
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Pengaduan</h6>
                            </div>
                            <div class="card-body">
                                <?php foreach ($pengaduan as $p) { ?>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="">Pelapor</label>
                                            <input type="text" class="form-control" value="<?= $p['nama'] ?>" disabled>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="">Tangal</label>
                                            <input type="text" class="form-control" value="<?= $p['tgl_pengaduan'] ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 mt-3">
                                            <label for="">Kategori</label>
                                            <input type="text" class="form-control" value="<?= $p['kategori'] ?>" disabled>
                                        </div>
                                        <div class="col-lg-6 mt-3 mb-3">
                                            <label for="">Sub Kategori</label>
                                            <input type="text" class="form-control" value="<?= $p['sub_kategori'] ?>" disabled>
                                        </div>
                                    </div>
                                    <label for="">Isi Pengaduan</label>
                                    <textarea type="text" class="form-control" disabled><?= $p['isi_laporan'] ?></textarea>
                                <?php } ?>
                            </div>
                        </div>



                        <div class="card shadow mb-4 mt-4">
                            <div class="card-header py-3">
                                <div class="d-flex align-item-center">
                                    <div class="d-flex align-item-center">
                                        <h6 class="m-0 font-weight-bold text-primary mt-1">Data Pengaduan</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <?= $this->session->flashdata('tindakan') ?>
                                <?php foreach ($pengaduan as $p) { ?>
                                    <a type="sumbit" class="
                                <?php
                                    if ($p['status'] == 'segera') {
                                        echo 'btn btn-primary btn-sm mb-3';
                                    } else if ($p['status'] == 'proses') {
                                        echo 'btn btn-primary btn-sm mb-3';
                                    } else {
                                        echo '';
                                    }
                                ?>
                                " data-toggle="modal" data-target="#tanggapi<?= $p['id_pengaduan'] ?>">
                                        <?php
                                        if ($p['status'] == 'segera') {
                                            echo '<i class="fa fa-plus fa-sm"></i> Tanggapi';
                                        } else if ($p['status'] == 'proses') {
                                            echo '<i class="fa fa-plus fa-sm"></i> Tanggapi';
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </a>
                                <?php } ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr role="row">
                                                <th width="10%">No</th>
                                                <th width="20%">Tanggal</th>
                                                <th>Tanggapan</th>
                                                <th>Petugas</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Tanggapan</th>
                                                <th>Petugas</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $c = 0;
                                            foreach ($tanggapan as $t) {
                                                $c = $c + 1; ?>
                                                <tr>
                                                    <td><?= $c ?></td>
                                                    <td><?= $t['tgl_tanggapan'] ?></td>
                                                    <td><?= $t['tanggapan'] ?></td>
                                                    <td><?= $t['nama_petugas'] ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>