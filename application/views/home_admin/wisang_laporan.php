<div id="main-wrapper">
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal3" data-target="#exampleModal2">Tambah</button>
                            <h4 class="card-title">Kategori</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Pelapor</th>
                                            <th>Tanggal</th>
                                            <th>Kategori</th>
                                            <th>Isi</th>
                                            <th>Foto</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <?php $i = 1 ?>
                                    <?php foreach ($pengaduan as $al) : ?>
                                        <tr>
                                            <input type="hidden" name="nik" value="<? $al['nama'] ?>">
                                            <input type="hidden" name="tgl_pengaduan" value="<? $al['tgl_pengaduan'] ?>">
                                            <input type="hidden" name="kategori" value="<? $al['kategori'] ?>">
                                            <input type="hidden" name="isi_laporan" value="<? $al['isi_laporan'] ?>">
                                            <td><?= $i ?></td>
                                            <td><?= $al['nama'] ?></td>
                                            <td><?= $al['tgl_pengaduan'] ?></td>
                                            <td><?= $al['kategori'] ?></td>
                                            <td><?= $al['isi_laporan'] ?></td>
                                            <td><?= $al['status'] ?></td>
                                            <td>
                                                <a href="#" class="btn btn btn-warning"><i class="fas fa-undo"></i></a>
                                                <a href="#" class="btn btn btn-danger"><i class="fas fa-lock"></i></a>
                                            </td>
                                        </tr>
                                    <?php $i++;
                                    endforeach ?>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Pelapor</th>
                                            <th>Tanggal</th>
                                            <th>Kategori</th>
                                            <th>Isi</th>
                                            <th>Foto</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn btn-primary float-right" data-toggle="mod3al" data-target="#exampleModal2">Tambah</button>
                            <h4 class="card-title">Sub-Kategori</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kategori</th>
                                            <th>Sub-Kategori</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 ?>
                                        <?php foreach ($sub_kategori as $al) : ?>
                                            <tr>
                                                <th><?= $i ?></th>
                                                <input type="hidden" name="kategori" value="<? $al['kategori'] ?>">
                                                <input type="hidden" name="sub_kategori" value="<? $al['sub_kategori'] ?>">
                                                <td><?= $al['kategori'] ?></td>
                                                <td><?= $al['sub_kategori'] ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_kp_Modal<?php echo $al['id']; ?>"> Edit</button>
                                                    <a class="btn btn-danger" href="<?= base_url('C_login_admin/delete_kategori/' . $al['id'] . '/') ?>" onclick="return confirm('Apakah Anda Yakin?');">Delete</a>
                                                </td>
                                            </tr>
                                        <?php $i++;
                                        endforeach ?>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Kategori</th>
                                            <th>Sub-Kategori</th>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?php echo base_url('C_login_admin/tambahsubkategori') ?>" method="post">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1">Example select</label>
                                                                <select class="form-control" id="exampleFormControlSelect1">
                                                                    <option value="<?= $al['kategori'] ?>">Pilih kategori</option>
                                                                    <?php foreach ($kategori as $kp) : ?>
                                                                        <option value=" <?= $kp['kategori'] ?>">
                                                                            <?= $kp['kategori'] ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="sub_kategori">Sub-Kategori</label>
                                                                <input type="sub_kategori" class="form-control" name="sub_kategori" id="sub_kategori">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>