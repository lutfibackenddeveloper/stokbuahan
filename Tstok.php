<?php
include 'db.php';
include 'cek.php';
if(isset($_POST['kirim'])){
  $kirim = mysqli_query($db, "INSERT INTO stok(id_buah,nama) VALUES ( '$_POST[id_buah]', '$_POST[nama]')");                                                        

  if($kirim){  
     echo "<script>
             alert('Simpan data sukses!');
             document.location='index.php';
         </script>";
 } else {
     echo "<script>
             alert('Simpan data Gagal!');
             document.location='index.php';
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
        <div class="p-4 border rounded bg-light col-10">
        <div class="form-group">

        </div>
<body class="bg-info">
<div class="container mt-3 " >
    <h1 class="mb-3">TAMBAH DATA Buah</h1>
<a class="btn btn-success" href="index.php">kembali</a>
<form method="POST">
  <!-- <div class="mb-3 mt-3 col-15">
    <label class="form-label">kode_buah</label>
    <input type="text" class="form-control" name="kode_buah" required>
  </div> -->
  <div class="mb-5 mt-3 col-15">
    <label class="form-label">nama</label>
    <input type="text" class="form-control" name="nama" required>
  <!-- </div>
  <div class="mb-3 col-15">
    <label  class="form-label">satuan</label>
    <input type="text" class="form-control" name="satuan" required>
  </div>
  <div class="mb-3 col-15">
    <label  class="form-label">stok</label>
    <input type="number" class="form-control" name="stok">
  </div> -->
  <br>
  <button type="submit" class="btn btn-primary" name="kirim">Submit</button>
</form>
</div>
    <script src="assets/js/bootstrap.bundle.js">
      
    </script>
</body>