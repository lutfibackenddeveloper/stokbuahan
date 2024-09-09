<?php
include 'db.php';
include 'cek.php';

if(isset($_GET['hal']) && $_GET['hal'] == "hapus"){
    // Ambil data buah yang akan dihapus
    $query = mysqli_query($db, "SELECT id_buah, jumlah_keluar FROM bkeluar WHERE id_keluar = '$_GET[id_keluar]'");
    $data = mysqli_fetch_assoc($query);
    
    if ($data) {
        $id_buah = $data['id_buah'];
        $jumlah_keluar = $data['jumlah_keluar'];
        
        // Tambahkan stok di tabel stok
        mysqli_query($db, "UPDATE stok SET stok = stok + $jumlah_keluar WHERE id_buah = '$id_buah'");
        
        // Hapus data dari tabel bkeluar
        $hapus = mysqli_query($db, "DELETE FROM bkeluar WHERE id_keluar = '$_GET[id_keluar]'");

        if ($hapus) {
            echo "<script>
            alert('Hapus data sukses dan stok telah diperbarui!');
            document.location='bkeluar.php';
            </script>";
        } else {
            echo "<script>
            alert('Hapus data gagal!');
            document.location='bkeluar.php';
            </script>";
        }
    } else {
        echo "<script>
        alert('Data tidak ditemukan!');
        document.location='bkeluar.php';
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
    <title>Daftar Data Buah</title>
</head>
<body class="bg-info">

<?php
    include "navbar.php";
?>
<div class="main-content">
    <div class="container mt-3">
    <h1 class="mb-4">DAFTAR DATA BUAH KELUAR</h1>
    <a class="btn btn-secondary mb-3" href="Tbkeluar.php">TAMBAH DATA BUAH KELUAR</a>
    <a class="btn btn-secondary mb-3" href="index.php">Kembali</a>
    
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>NO</th>
                <th>Nama</th>
                <th>Tanggal keluar</th>
                <th>Jumlah Keluar</th>
                <th>Aksi</th>
            </tr>
        </thead >
        <tbody class="table-secondary">
            <?php   
            $no = 1;
            $tampil = mysqli_query($db, "SELECT * FROM bkeluar");
            while ($data = mysqli_fetch_array($tampil)): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['tgl_keluar'] ?></td>
                <td><?= $data['jumlah_keluar'] ?></td>
                <td>
                    <a class="btn btn-danger" href="bkeluar.php?hal=hapus&id_keluar=<?= $data['id_keluar'] ?>" onclick="return confirm('Apakah anda yakin menghapus data?')">Hapus</a>
                    <a class="btn btn-warning" href="Ebkeluar.php?hal=ubah&id_keluar=<?= $data['id_keluar'] ?>" >Edit</a>
                    
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
        
        
    </table>
    
    </div>
</div>

<script src="assets/js/bootstrap.bundle.js"></script>
</body>
</html>