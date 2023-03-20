<div class="content-body">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal" name="">Tambah</button>
                        <h4 class="card-title">Riwayat Pengaduan</h4>
                        <div class="active-member">
                            <div class="table-responsive">
                                <table class="table table-xs mb-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Kategori</th>
                                            <th>Isi</th>
                                            <th>Foto</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <?php $i = 1 ?>
                            <?php foreach ($pengaduanjoin as $al) : ?>
                                <tr>
                                    <!-- <input type="hidden" name="tgl_pengaduan" value="<? $al['tgl_pengaduan'] ?>">
                                    <input type="hidden" name="kategori" value="<? $al['kategori'] ?>">
                                    <input type="hidden" name="isi_laporan" value="<? $al['isi_laporan'] ?>"> -->
                                    <td><?= $i ?></td>
                                    <td><?= $al['tgl_pengaduan'] ?></td>
                                    <td><?= $al['kategori'] ?></td>
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
                                </tr>
                            <?php $i++;
                            endforeach ?>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Kategori</th>
                                            <th>Isi</th>
                                            <th>Foto</th>
                                            <th>Status</th>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ajukan Laporan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?php echo base_url('C_login_masyarakat/isipengaduan') ?>" method="post" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1">Kategori</label>
                                                                <select class="form-select form-control" name="kategori" id="kategori">
                                                                    <option selected>- Pilih -</option>
                                                                    <?php foreach ($kategori as $kp) { ?>
                                                                        <option value="<?= $kp['id'] ?>"><?= $kp['kategori'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1">Sub Kategori</label>
                                                                <select class="form-select form-control" name="sub_kategori" id="sub_kategori">
                                                                    <option selected>- Pilih -</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="hidden" name="tgl_pengaduan" value="<?php echo date("d-m-Y") ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Foto</label>
                                                                <input type="file" class="form-control-file" id="foto" name="foto" placeholder="date">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Isi Laporan Pengaduan</label>
                                                                <textarea class="form-control" id="isi_laporan" name="isi_laporan" rows="6"></textarea>
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