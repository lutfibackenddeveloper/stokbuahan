<?php
    session_start();
    session_destroy();
    header ("location:login.php");

    echo "<script>
      alert('Hapus data sukses!');
      document.location='bmasuk.php';
      </script>";
?>