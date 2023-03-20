<!DOCTYPE html>
<html>

<head>
    <title>PDF Pengaduan Masyarakat</title>
</head>

<body>
    <div class="col-lg-6">
        <div class="hero-text">
            <center>
                <h1>Pengaduan Masyarakat </h1>
        </div>
        <hr>
    </div>
    <table class="table table-bordered" id="" width="110%" cellspacing="0">
        <thead>
            <th>No</th>
            <th>Nik Pelapor</th>
            <th>Tanggal</th>
            <th>Kategori</th>
            <th>Isi</th>
        </thead>
        <?php $i = 1 ?>
        <?php foreach ($pengaduan as $ap) : ?>
            <tr>
                <input type="hidden" name="nik" value="<? $ap['nik'] ?>">
                <input type="hidden" name="tgl_pengaduan" value="<? $ap['tgl_pengaduan'] ?>">
                <input type="hidden" name="kategori" value="<? $ap['id_kategori'] ?>">
                <input type="hidden" name="isi_laporan" value="<? $ap['isi_laporan'] ?>">
                <td><?= $i ?></td>
                <td><?= $ap['nik'] ?></td>
                <td><?= $ap['tgl_pengaduan'] ?></td>
                <td><?= $ap['id_kategori'] ?></td>
                <td><?= $ap['isi_laporan'] ?></td>
            </tr>
        <?php $i++;
        endforeach ?>
    </table>


</body>

</html>