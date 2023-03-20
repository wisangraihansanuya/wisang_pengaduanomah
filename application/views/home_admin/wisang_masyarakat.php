<div id="main-wrapper">
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Masyarakat</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>No.Telepon</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <?php $i = 1 ?>
                                    <?php foreach ($masyarakat as $al) : ?>
                                        <tr>
                                            <input type="hidden" name="nik" value="<? $al['nik'] ?>">
                                            <input type="hidden" name="nama" value="<? $al['nama'] ?>">
                                            <input type="hidden" name="telepon" value="<? $al['no_telp'] ?>">
                                            <!-- <input type="hidden" name="status" value="<? $al['status'] ?>"> -->
                                            <td><?= $i ?></td>
                                            <td><?= $al['nik'] ?></td>
                                            <td><?= $al['nama'] ?></td>
                                            <td><?= $al['no_telp'] ?></td>
                                            <td>
                                                <a href="#" class="btn btn btn-warning"><i class="fas fa-undo"></i></a>
                                                <a href="#" class="btn btn btn-danger"><i class="fas fa-lock"></i></a>
                                            </td>                                        </tr>
                                    <?php $i++;
                                    endforeach ?>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>No.Telepon</th>
                                            <th>Tindakan</th>
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