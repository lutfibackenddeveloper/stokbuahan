<?php
include 'db.php';
include 'cek.php';
if(isset($_POST['kirim'])){
    $nama = $_POST['nama'];
    $tgl_keluar = $_POST['tgl_keluar'];
    $jumlah_keluar = $_POST['jumlah_keluar'];
    
    // cari id buah berdasarkan nama buah
    $query_id = mysqli_query($db, "SELECT id_buah FROM stok WHERE nama = '$nama'");
    $row = mysqli_fetch_assoc($query_id);
    $id_buah = $row['id_buah'];
    
    // Masukkan data ke tabel bkeluar
    $kirim = mysqli_query($db, "INSERT INTO bkeluar (id_buah, nama, tgl_keluar, jumlah_keluar) VALUES ('$id_buah', '$nama', '$tgl_keluar', '$jumlah_keluar')");
    
    if($kirim){  
        echo "<script>
                alert('Simpan data sukses!');
                document.location='bkeluar.php';
            </script>";
    } else {
        echo "<script>
                alert('Simpan data Gagal!');
                document.location='bkeluar.php';
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/Tbmasuk.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="p-4 border rounded bg-light col-10 ">
        <div class="form-group">

        </div>
        <body class="bg-info">
            <div class="container mt-3">
                <h1 class="mb-3">TAMBAH DATA BUAH KELUAR</h1>
                <a class="btn btn-success" href="bkeluar.php">kembali</a>
                <form method="POST">
                    <div class="mb-3 mt-3 col-15">
                        <label class="form-label">nama</label>
                        <select name="nama" class="form-control">
                            <?php
                            $ambilsemuadatanya = mysqli_query($db, "SELECT * FROM stok");
                            while ($fetcharray = mysqli_fetch_array($ambilsemuadatanya)) {
                                $namabarangnya = $fetcharray['nama'];
                                ?>
                                <option value="<?= $namabarangnya; ?>"><?= $namabarangnya; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3 col-15 ">
                        <label  class="form-label">tgl_keluar</label>
                        <input type="date" class="form-control" name="tgl_keluar" required>
                    </div>
                    <div class="mb-3 col-15">
                        <label  class="form-label">jumlah_keluar</label>
                        <input type="number" class="form-control" name="jumlah_keluar" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="kirim">Submit</button>
                </form>
            </div>
            <script src="assets/js/bootstrap.bundle.js"></script>
        </body>
    </div>
</div>