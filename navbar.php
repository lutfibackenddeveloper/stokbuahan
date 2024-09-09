<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Daftar Data Buah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .navigation {
            width: 250px;
            height: 100%;
            background-color: #001f3f; 
            position: fixed;
            padding:0;
            margin:0;
            top: 0;
            left: 0;
            overflow: hidden;
            transition: width 0.3s;
            padding-top: 20px;
        }
        .navigation ul {
            list-style-type: none;
            padding: 0;
        }
        .navigation ul li {
            width: 100%;
            margin-bottom: 10px;
        }
        .navigation ul li a {
            text-decoration: none;
            color: white;
            display: flex;
            align-items: center;
            padding: 15px 20px;
            transition: background-color 0.3s, transform 0.3s;
        }
        .navigation ul li a:hover {
            background-color: #007bff;
            transform: translateX(10px);
        }
        .navigation ul li a .icon {
            margin-right: 10px;
        }
        .navigation ul li a .title {
            font-size: 18px;
        }
        .main-content {
            margin-left: 260px;
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="navigation">
    <ul>
        <li>
            <a href="#">
                <span class="buahan">Buah-Buah</span>
            </a>
        </li>
        
        <li>
            <a href="index.php">
                <span class="icon">
                <ion-icon name="home-outline"></ion-icon>
                </span>
                <span class="title">Home</span>
                
            </a>
        </li>
        <li>
            <a href="stok.php">
                <span class="icon">
                    <ion-icon name="cube-outline"></ion-icon>
                </span>
                <span class="title">Tambah Buah</span>
            </a>
        </li>
        <li>
            <a href="bmasuk.php">
                <span class="icon">
                    <ion-icon name="return-down-back-outline"></ion-icon>
                </span>
                <span class="title">Stok Masuk</span>
            </a>
        </li>
        <li>
            <a href="bkeluar.php">
                <span class="icon">
                    <ion-icon name="return-down-forward-outline"></ion-icon>
                </span>
                <span class="title">Stok Keluar</span>
            </a>
        </li>
        <li>
            <a href="Logout.php"onclick="return confirm('Apakah Anda yakiningin keluar?')">
                <span class="icon">
                    <ion-icon name="log-out-outline"></ion-icon>
                </span>
                <span class="title">Sign Out</span>
            </a>
        </li>
    </ul>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.5.2/ionicons.min.js"></script>
</body>
</html>
