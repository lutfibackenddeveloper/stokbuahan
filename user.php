<?php
include("db.php");
include("cek.php");

// Mengambil data jumlah masuk
$jumlah_masuk_query = mysqli_query($db, "SELECT SUM(jumlah_masuk) AS total_masuk FROM bmasuk");
$jumlah_masuk = mysqli_fetch_assoc($jumlah_masuk_query)['total_masuk'];

// Mengambil data jumlah keluar
$jumlah_keluar_query = mysqli_query($db, "SELECT SUM(jumlah_keluar) AS total_keluar FROM bkeluar");
$jumlah_keluar = mysqli_fetch_assoc($jumlah_keluar_query)['total_keluar'];
?>

<!DOCTYPE html>
<html lang="id">
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
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
            text-align: center;
            padding: 8px;
        }
    </style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Pengelolaan Buah-Buahan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        
        #piechart {
            display: block;
            width: 300px;
            height: 300px;
            margin: 40px auto;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>

<body>

<div class="navigation">
    <ul>
        <li>
            <a href="#">
                <span class="buahan">Buah-Buahan</span>
            </a>
        </li>
        
    <ul>
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

<div class="main-content">
    <div class="container">
        <canvas id="piechart"></canvas>
    </div>

    <script type="text/javascript">
        var ctx = document.getElementById("piechart").getContext("2d");

        var data = {
            labels: ["Jumlah Masuk", "Jumlah Keluar"],
            datasets: [{
                label: "STOK BUAH",
                data: [<?php echo $jumlah_masuk; ?>, <?php echo $jumlah_keluar; ?>],
                backgroundColor: [
                    '#29B0D0',
                    '#2A516E'
                ]
            }]
        };

        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        });
    </script>

    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>STOK BUAH SEKARANG</h2>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Buah</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $tampil = mysqli_query($db, "SELECT nama, stok FROM stok ORDER BY nama ASC");
                    if (mysqli_num_rows($tampil) > 0) {
                        while ($data = mysqli_fetch_array($tampil)) {
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['stok'] ?></td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo '<tr><td colspan="3">Data tidak ditemukan</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
    
</div>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
