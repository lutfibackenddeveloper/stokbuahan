<?php
include 'db.php';
include 'cek.php';

$nama = '';
$tgl_keluar = '';
$jumlah_keluar = '';
if(isset($_GET['hal'])){
    if($_GET['hal'] == "ubah"){
        $tampil = mysqli_query($db, "SELECT * FROM bkeluar WHERE id_keluar = '$_GET[id_keluar]'");
        $data = mysqli_fetch_array($tampil);
        if($data){
            $nama = $data['nama'];
            $tgl_keluar = $data['tgl_keluar'];
            $jumlah_keluar = $data['jumlah_keluar'];
        }
    }
}

if(isset($_POST['kirim'])){
    // Ambil jumlah keluar lama
    $query_lama = mysqli_query($db, "SELECT jumlah_keluar FROM bkeluar WHERE id_keluar = '$_GET[id_keluar]'");
    $data_lama = mysqli_fetch_assoc($query_lama);
    $jumlah_keluar_lama = $data_lama['jumlah_keluar'];

    // Dapatkan id_buah berdasarkan nama buah
    $query_id = mysqli_query($db, "SELECT id_buah FROM stok WHERE nama = '$_POST[nama]'");
    $row = mysqli_fetch_assoc($query_id);
    $id_buah = $row['id_buah'];

    $simpan = mysqli_query($db, "UPDATE bkeluar SET
                                        nama = '$_POST[nama]',
                                        tgl_keluar = '$_POST[tgl_keluar]',
                                        id_buah = '$id_buah',
                                        jumlah_keluar = '$_POST[jumlah_keluar]' WHERE id_keluar = '$_GET[id_keluar]'");
    
    if($simpan){
        // Update stok di tabel stok
        $selisih = $jumlah_keluar_lama - $_POST['jumlah_keluar'];
        $update_stok = mysqli_query($db, "UPDATE stok SET stok = stok + $selisih WHERE id_buah = '$id_buah'");
        
        if($update_stok){
            echo "<script>
                    alert('Edit data sukses dan stok berhasil diperbarui!');
                    document.location='bkeluar.php';
                </script>";
        } else {
            echo "<script>
                    alert('Edit data Gagal!');
                    document.location='bkeluar.php';
                </script>";
        }
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
    <title>Edit Data Buah</title>
</head>
<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="p-4 border rounded bg-light col-10">
        <div class="form-group">
        </div>
        <body class="bg-info">
            <div class="container mt-3">
                <h1 class="mb-3">EDIT DATA BUAH</h1>
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
                                <option value="<?= $namabarangnya; ?>" <?= ($namabarangnya == $nama) ? 'selected' : ''; ?>><?= $namabarangnya; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3 col-15">
                        <label class="form-label">tgl_keluar</label>
                        <input type="date" class="form-control" name="tgl_keluar" value="<?= $tgl_keluar ?>" required>
                    </div>
                    <div class="mb-3 col-15">
                        <label class="form-label">jumlah_keluar</label>
                        <input type="number" class="form-control" name="jumlah_keluar" value="<?= $jumlah_keluar ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="kirim">Submit</button>
                </form>
            </div>
            <script src="assets/js/bootstrap.bundle.js"></script>
        </body>
    </div>
</div>