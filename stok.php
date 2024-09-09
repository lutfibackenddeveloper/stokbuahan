<?php
 include 'db.php';
 include 'cek.php';


 if(isset($_GET['hal']) == "hapus"){

  $hapus = mysqli_query($db, "DELETE FROM stok WHERE id_buah = '$_GET[id_buah]'");

  if($hapus){
      echo "<script>
      alert('Hapus data sukses!');
      document.location='stok.php';
      </script>";
  }
};


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class="bg-info">


<?php
  include "navbar.php";
?>
<div class="main-content">
<div class="container mt-3">
<h1 class="mb-10 ms-6" >DAFTAR NAMA BUAH</h1>
<a class="btn btn-dark" href="Tstok.php"> Tambah Buah</a>
<a class="btn btn-secondary" href="index.php"> kembali</a>
<br>
<br>

<table class="table table-bordered">
  <thead class ="table-dark">
    <tr>    
      <th>NO</th>
      <th >Nama</th>
      <th >Aksi</th>
    </tr>
    <?php   
    $no = 1;
    $tampil = mysqli_query ($db, "SELECT * FROM stok");
    while($data = mysqli_fetch_array($tampil)):
    
    ?>
    <tbody class="table-primary">
    <tr>
      <th ><?=$no++ ?> </th>
      <td> <?=$data['nama'] ?></td>
    
      <td>
        <a class="btn btn-danger" href="stok.php?hal=hapus&id_buah=<?= $data['id_buah'] ?>" onclick="return confirm('Apakah anda yakin menghapus data?')"  >hapus</a>
      </td>
    </tr>
    </tbody> 
  </thead>
  <?php 
    endwhile;
    ?>
 
  </div>
</div>
  <script src="assets/js/bootstrap.bundle.js"></script>
</body>
</html>