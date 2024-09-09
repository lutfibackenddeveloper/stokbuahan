<?php
include 'db.php';
include 'cek.php';

if (isset($_GET['hal']) && $_GET['hal'] == "hapus") {
    // Ambil data buah yang akan dihapus
    $query = mysqli_query($db, "SELECT id_buah, jumlah_masuk FROM bmasuk WHERE id_masuk = '$_GET[id_masuk]'");
    $data = mysqli_fetch_assoc($query);
    
    if ($data) {
        $id_buah = $data['id_buah'];
        $jumlah_masuk = $data['jumlah_masuk'];
        
        // Kurangi stok di tabel stok
        mysqli_query($db, "UPDATE stok SET stok = stok - $jumlah_masuk WHERE id_buah = '$id_buah'");
        
        // Hapus data dari tabel bmasuk
        $hapus = mysqli_query($db, "DELETE FROM bmasuk WHERE id_masuk = '$_GET[id_masuk]'");

        if ($hapus) {
            echo "<script>
            alert('Hapus data sukses dan stok telah diperbarui!');
            document.location='bmasuk.php';
            </script>";
        } else {
            echo "<script>
            alert('Hapus data gagal!');
            document.location='bmasuk.php';
            </script>";
        }
    } else {
        echo "<script>
        alert('Data tidak ditemukan!');
        document.location='bmasuk.php';
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.5.2/css/ionicons.min.css" integrity="sha512-8nQ+H8MiyNmg9fs5prg+ObJc5efy2T9eu++El7WyslE0DkzqF+gHLeHZhLfpYYCneXE9cn6I/5mRIYZ6VdMz8g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Daftar Data Buah</title>
<body class="bg-info"> 
    <?php
    include "navbar.php";
    ?>
<div class="main-content">
    <div class="container mt-3">
        <h1 class="mb-4">DAFTAR DATA BUAH MASUK</h1>
        <a class="btn btn-secondary mb-3" href="Tbmasuk.php">TAMBAH DATA BUAH MASUK</a>
        <a class="btn btn-secondary mb-3" href="index.php">Kembali</a>
        
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>NO</th>
                    <th>nama</th>
                    <th>Tanggal Masuk</th>
                    <th>Jumlah Masuk</th>
                    <th>Aksi</th>
                </tr> 
            </thead>
            <tbody class="table-success">
                <?php   
                $no = 1;
                $tampil = mysqli_query($db, "SELECT * FROM bmasuk");
                while ($data = mysqli_fetch_array($tampil)): ?>
                <tr>
                    
                    <td><?= $no++ ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['tgl_masuk'] ?></td>
                    <td><?= $data['jumlah_masuk'] ?></td>
                    <td>
                        <a class="btn btn-danger" href="bmasuk.php?hal=hapus&id_masuk=<?= $data['id_masuk'] ?>" onclick="return confirm('Apakah anda yakin menghapus data?')">Hapus</a>
                        <a class="btn btn-warning" href="Ebmasuk.php?hal=ubah&id_masuk=<?= $data['id_masuk'] ?>" >Edit</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Msx2FsnHavxD5FLZ1XmskK7ITFtymr7vKsbHaI4oIh3mgubmJJ0D7Uw5p3LHiXnY" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.5.2/ionicons.min.js" integrity="sha512-8nQ+H8Miy"></script>
<scriptsrc="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
