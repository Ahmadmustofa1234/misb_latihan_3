<?php
require "fungsi.php";
$jaring = $_GET['id'];
$siswa = query("SELECT * FROM siswa WHERE id=$jaring")[0];

if (isset($_POST['submit'])) { // Corrected "sumbit" to "submit"
    if (ubahData($_POST) > 0) {
        echo "
        <script>
        alert('Data berhasil diubah!');
        document.location.href='index.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data gagal diubah!');
        document.location.href='index.php';
        </script>
        ";
    }
}

$jenis_kelamin = ['laki_laki', 'perempuan'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ubah Data Siswa</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Ubah Data Siswa</h1>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $siswa['id']; ?>">
            <div class="form-group">
                <label for="nama">Nama Siswa</label>
                <input type="text" class="form-control" name="nama" id="nama" required value="<?= $siswa['nama']; ?>">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat Siswa</label>
                <input type="text" class="form-control" name="alamat" id="alamat" required value="<?= $siswa['alamat']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email Siswa</label>
                <input type="email" class="form-control" name="email" id="email" required value="<?= $siswa['email']; ?>">
            </div>
            <div class="form-group">
                <label for="jk">Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin" id="jk">
                    <?php foreach ($jenis_kelamin as $jk) : ?>
                        <?php if ($jk == $siswa['jenis_kelamin']) : ?>
                            <option value='<?= $jk; ?>' selected><?= $jk; ?></option>
                        <?php else : ?>
                            <option value='<?= $jk; ?>'><?= $jk; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>

    <!-- Include Bootstrap JS and jQuery (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
