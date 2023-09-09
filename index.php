<?php
require "fungsi.php";
//mengambil data query /data tabel siswa
$latihan = query("SELECT * FROM siswa");
//ubah ke variabel latihan
$latihan = query("SELECT * FROM siswa");
//jika tombol pencarian di klik
if (isset($_POST['pencarian'])) {
    $latihan = cari($_POST['cari']);
}



?>
<!-- kita jalankan fungsi query yang ada di tabel fungsi.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Data Siswa</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
    <div class="alert alert-success mt-3" role="alert">Identitas Siswa</div>
        <a href="tambah.php" class="btn btn-primary">Tambah Data siswa</a>
        <br><br>
        <form method="post" action="" class="form-inline">
            <div class="form-group">
                <input type="text" name="cari" class="form-control" size="30" autofocus placeholder="Masukkan data pencarian" autocomplete="off">
            </div>
            <button type="submit" name="pencarian" class="btn btn-success">Cari</button>
        </form>

        <table class="table table-bordered table-striped mt-3">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Aksi</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Jenis Kelamin</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($cari)) : ?>

                <?php endif; ?>
                <?php $i = 1; ?>
                <?php foreach ($latihan as $way) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td>
                            <a href="hapus.php?id=<?= $way["id"]; ?>" onclick="return confirm('Yakin??');" class="btn btn-danger btn-sm">Hapus</a>
                            <a href="ubah.php?id=<?= $way["id"]; ?>" class="btn btn-warning btn-sm">Ubah</a>
                        </td>
                        <td><?= $way["nama"];  ?></td>
                        <td><?= $way["alamat"]; ?></td>
                        <td><?= $way["email"]; ?></td>
                        <td><?= $way["jenis_kelamin"]; ?></td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach;  ?>
            </tbody>
        </table>
    </div>

    <!-- Include Bootstrap JS and jQuery (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

