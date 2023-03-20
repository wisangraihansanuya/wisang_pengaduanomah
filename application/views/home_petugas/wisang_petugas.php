<div id="main-wrapper">
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                        <!-- <a class="btn btn-primary float-right" href="<?=base_url('C_login/registration_admin')?>" role="button">Tambah</a> -->
                            <h4 class="card-title">Data Table</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>No.Telepon</th>
                                        </tr>
                                    </thead>
                                    <?php $i = 1 ?>
                                    <?php foreach ($petugas as $al) : ?>
                                        <tr>
                                            <input type="hidden" name="nama" value="<? $al['nama'] ?>">
                                            <input type="hidden" name="status" value="<? $al['username'] ?>">
                                            <input type="hidden" name="telepon" value="<? $al['no_telp'] ?>">
                                            <td><?= $i ?></td>
                                            <td><?= $al['nama'] ?></td>
                                            <td><?= $al['username'] ?></td>
                                            <td><?= $al['no_telp'] ?></td>
                                        </tr>
                                    <?php $i++;
                                    endforeach ?>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>No.Telepon</th>
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