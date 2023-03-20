<div id="main-wrapper">
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-primary float-right" href="<?= base_url('C_login_admin/laporan_pdf') ?>" role="button">PDF</a>
                            <h4 class="card-title">LAPORAN</h4>
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
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#detail<?= $al['id_pengaduan'] ?>">
                                                    <i class="fa-regular fa-circle-info"></i>
                                                </button>
                                            </td>
                                            <!-- <td>
                                                <a href="#" class="btn btn btn-warning"><i class="fas fa-undo"></i></a>
                                                <a href="#" class="btn btn btn-danger"><i class="fas fa-lock"></i></a>
                                            </td> -->
                                        </tr>

                                        <td>
                                            <!-- Button trigger modal -->

                                            <!-- kondisi tanggapan  -->
                                            <?php if ($al['status'] == 0) { ?>
                                                <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tindakan<?= $al['id_pengaduan'] ?>">
                                                    Tindakan
                                                </button>
                                            <?php } else if ($al['status'] == 'proses') { ?>

                                                <a type="button" class="btn btn-outline-warning btn-sm" href="<?= base_url('c_login_admin/tanggapan/') . $al['id_pengaduan'] ?>">
                                                    Proses
                                                </a>

                                            <?php } else if ($al['status'] == 'selesai') { ?>
                                                <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#tindakan<?= $al['id'] ?>">
                                                    Selesai
                                                </button>
                                            <?php } ?>
                                            <!-- akhir kondisi tanggapan  -->

                                            <!-- Modal -->
                                            <div class="modal fade" id="tindakan<?= $al['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="tindakan">Tindakan</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Form tindakan -->
                                                            <form method="post" action="<?= base_url('C_login_admin/tindakan_pengaduan') . $al['id_pengaduan'] ?>">
                                                                <div class="row">
                                                                    <div class="mb-3 col-md-6">
                                                                        <label for="disabledTextInput" class="form-label">Pelapor</label>
                                                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $al['nama'] ?>" aria-describedby="emailHelp" aria-label="Disabled input example" disabled>
                                                                    </div>

                                                                    <div class="mb-3 col-md-6">
                                                                        <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                                                                        <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?= $al['tanggal_pengaduan'] ?>" aria-describedby="emailHelp" aria-label="Disabled input example" disabled>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="mb-3 col-md-6">
                                                                        <label for="disabledTextInput" class="form-label">Kategori</label>
                                                                        <input type="text" class="form-control" id="kategori" name="kategori" value="<?= $al['kategori'] ?>" aria-describedby="emailHelp" aria-label="Disabled input example" disabled>
                                                                    </div>

                                                                    <div class="mb-3 col-md-6">
                                                                        <label for="exampleInputEmail1" class="form-label">Subkategori</label>
                                                                        <input type="text" class="form-control" id="subkategori" name="subkategori" value="<?= $al['subkategori'] ?>" aria-describedby="emailHelp" aria-label="Disabled input example" disabled>
                                                                    </div>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1" class="form-label">Isi
                                                                        Laporan</label>
                                                                    <input type="text" class="form-control" id="isi" name="isi" value="<?= $al['isi_laporan'] ?>" aria-describedby="emailHelp" aria-label="Disabled input example" disabled>

                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1" class="form-label">Tanggapan</label>
                                                                    <input type="text" class="form-control" id="tanggapan" name="tanggapan" aria-describedby="emailHelp">
                                                                </div>

                                                                <div class="row">

                                                                    <div class="mb-3 col-md-4">
                                                                        <label for="exampleInputEmail1" class="form-label">Status</label>
                                                                        <select class="form-select" aria-label="Default select example" id="status" name="status">
                                                                            <option selected>- Pilih -</option>
                                                                            <option value="proses">Proses</option>
                                                                            <option value="selesai">Selesai</option>

                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>

                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    <?php $i++;
                                    endforeach ?>
                                    <tfoot>
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
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>