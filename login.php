<?php
session_start();
include("db.php");
$login_massage = "";
    // ======perintah untuk login=============
    if(isset($_POST['login'])) {
        $username = $_POST["username"];
        $password = md5($_POST["password"]);

        $cekuser = mysqli_query($db, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
        $hitung = mysqli_num_rows($cekuser);

            if($hitung > 0) {
                $ambildatarole = mysqli_fetch_array($cekuser);
                $role = $ambildatarole['role'];

                if($role == "admin"){
                    $_SESSION['log'] = 'True';
                    $_SESSION['role'] = 'admin';
                    header("Location: index.php");
                    exit();
            } elseif($role == "user"){
                $_SESSION['log'] = 'True';
                $_SESSION['role'] = 'user';
                header("Location:user.php");
                exit();
            }
        } else {
            $login_massage = "data tidak ada";
            $error = true;
        }
    }

// Jika pengguna sudah login, arahkan ke halaman index
if (isset($_SESSION["log"]) && $_SESSION["log"] === 'True') {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="assets/css/login.css">
</head>
<body class="bg- #145f92;">
<i><?=$login_massage?></i> 
     <form action="login.php" method="post">
     	<h2 class="color-dark">LOGIN</h2>
     	<label>Username</label>
     	<input type="text" name="username" placeholder="username" required><br>

     	<label>password</label>
     	<input type="password" name="password" placeholder="password" required><br>
     	<button type="submit" name="login">Login</button>
         <button><a href="register.php">Daftar Akun</a></button>
     </form>
</body>
</html>