<?php
session_start();
include("db.php");
$register_message = "";

if (isset($_POST["register"])) {
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    
    // Periksa apakah username sudah ada
    $check_username = "SELECT * FROM admin WHERE username = '$username'";
    $result = $db->query($check_username);
    
    if ($result->num_rows > 0) {
        $register_message = "Username sudah digunakan, silahkan pilih username lain";
    } else {
        try {
            $sql = "INSERT INTO admin (username, password, role) VALUES ('$username', '$password', 'user')";
            if ($db->query($sql)) {
                $register_message = "Daftar akun berhasil, silahkan login";
            } else {
                $register_message = "Daftar akun gagal, silahkan coba lagi";
            }
        } catch (mysqli_sql_exception $e) {
            $register_message = "Terjadi kesalahan: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Daftar Akun User</title>
</head>
<body>
<i><?=$register_message?></i>
    
    <form action="register.php" method="POST">
        <h2>Daftar Akun User</h2>
        <input type="text" placeholder="username" name="username" required/>
        <input type="password" placeholder="password" name="password" required/>
        <br>
        <button type="submit" name="register">DAFTAR SEKARANG</button>
        <button><a href="login.php">Kembali ke Login</a></button>
    </form>
</body>
</html>