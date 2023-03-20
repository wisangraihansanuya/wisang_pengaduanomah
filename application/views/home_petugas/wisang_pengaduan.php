<div id="main-wrapper">
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal1">Tambah</button> -->
                            <h4 class="card-title">Kategori</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nik Pelapor</th>
                                            <th>Tanggal</th>
                                            <th>Kategori</th>
                                            <th>Isi</th>
                                            <th>Foto</th>
                                            <th>Status</th>
                                            <!-- <th>Tindakan</th> -->
                                        </tr>
                                    </thead>
                                    <?php $i = 1 ?>
                                    <?php foreach ($pengaduan as $al) : ?>
                                        <tr>
                                            <input type="hidden" name="nik" value="<? $al['nik'] ?>">
                                            <input type="hidden" name="tgl_pengaduan" value="<? $al['tgl_pengaduan'] ?>">
                                            <input type="hidden" name="kategori" value="<? $al['id_kategori'] ?>">
                                            <input type="hidden" name="isi_laporan" value="<? $al['isi_laporan'] ?>">
                                            <td><?= $i ?></td>
                                            <td><?= $al['nik'] ?></td>
                                            <td><?= $al['tgl_pengaduan'] ?></td>
                                            <td><?= $al['id_kategori'] ?></td>
                                            <td><?= $al['isi_laporan'] ?></td>
                                            <td><img src="<?= base_url() . '/upload/img/' . $al['foto']; ?>" style="width:100px;"></td>
                                            <td>
                                                <?php if ($al['status'] == "pending") : ?>
                                                    <div class="badge badge-danger">
                                                        <?= $al['status']; ?>
                                                    </div>
                                                <?php elseif ($al['status'] == "proses") : ?>
                                                    <div class="badge badge-info">
                                                        <?= $al['status']; ?>
                                                    </div>
                                                <?php else : ?>
                                                    <div class="badge badge-success">
                                                        <?= $al['status']; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                            <!-- <td>
                                                <a href="#" class="btn btn btn-warning"><i class="fas fa-undo"></i></a>
                                                <a href="#" class="btn btn btn-danger"><i class="fas fa-lock"></i></a>
                                            </td> -->
                                        </tr>
                                    <?php $i++;
                                    endforeach ?>
                                    <tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>