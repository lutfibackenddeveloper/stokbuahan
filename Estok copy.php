<!-- <?php
include 'db.php';
include 'cek.php';

$kode_buah='';
$nama = '';
$satuan = '';
$stok='';
if(isset($_GET['hal'])){
    if($_GET['hal'] == "ubah"){
        $tampil = mysqli_query($db, "SELECT * FROM stok WHERE id_buah = '$_GET[id_buah]'");
        $data = mysqli_fetch_array($tampil);
        if($data){
            $kode_buah= $data['kode_buah'];
            $nama = $data['nama'];
            $satuan = $data['satuan'];
            $stok = $data['stok'];
           
        }
    }
}


if(isset($_POST['kirim'])){

    $simpan = mysqli_query($db, "UPDATE stok SET
                                        kode_buah = '$_POST[kode_buah]',
                                        nama = '$_POST[nama]',
                                        satuan = '$_POST[satuan]',
                                        stok = '$_POST[stok]' WHERE id_buah = '$_GET[id_buah]'");
                                          
    
if($simpan){
    echo "<script>
            alert('Edit data sukses!');
            document.location='stok.php';
        </script>";
} else {
    echo "<script>
            alert('Edit data Gagal!');
            document.location='stok.php';
        </script>";
}
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Edit Data Buah</title>
</head>
<body>
<div class="container mt-3">
    <h1 class="mb-3">EDIT DATA BUAH</h1>
<a class="btn btn-success" href="stok.php">kembali</a>
<form method="POST">
  <div class="mb-3 mt-3 col-6">
    <label class="form-label">kode buah</label>
    <input type="text" class="form-control" name="kode_buah" value="<?= $kode_buah?>" >
  </div>
  <div class="mb-3 col-6">
    <label  class="form-label">nama</label>
    <input type="text" class="form-control" name="nama" value="<?= $nama?>">
  </div>
  <div class="mb-3 col-6">
    <label  class="form-label">satuan</label>
    <input type="text" class="form-control" name="satuan" value="<?= $satuan?>">
  <div class="mb-3 col-6">
    <label  class="form-label">Stok</label>
    <input type="number" class="form-control" name="stok" value="<?= $stok?>">
  </div>
  <button type="submit" class="btn btn-primary" name="kirim">Submit</button>
</form>
</div>
    <script src="assets/js/bootstrap.bundle.js">
      
    </script>
</body> -->