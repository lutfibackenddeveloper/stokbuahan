<?php
include("db.php");
include("cek.php");

// Mengambil data jumlah masuk
$jumlah_masuk_query = mysqli_query($db, "SELECT jumlah_masuk FROM bmasuk");
$jumlah_masuk = [];
while ($row = mysqli_fetch_array($jumlah_masuk_query)) {
    $jumlah_masuk[] = $row['jumlah_masuk'];
}

// Mengambil data jumlah keluar
$jumlah_keluar_query = mysqli_query($db, "SELECT jumlah_keluar FROM bkeluar");
$jumlah_keluar = [];
while ($row = mysqli_fetch_array($jumlah_keluar_query)) {
    $jumlah_keluar[] = $row['jumlah_keluar'];
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Pengelolaan Buah-Buahan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
    

    <style>
        #piechart {
            display: block;
            align-items: flex-start;
            width: 300px;
            height: 300px;
            margin-left: 40px;
            margin-right: auto
            ;
            padding: 3%;
        }
    </style>
</head>

<body>
<?php
    include('navbar.php');
?>
     
  <div class="main-content">
  <div class="container">
                <canvas id="piechart" width="100" height="100"></canvas>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script type="text/javascript">
                var ctx = document.getElementById("piechart").getContext("2d");

                // Data untuk diagram lingkaran
                var data = {
                    labels: ["Jumlah Masuk", "Jumlah Keluar"],
                    datasets: [{
                        label: "STOK BUAH",
                        data: [<?php echo array_sum($jumlah_masuk); ?>, <?php echo array_sum($jumlah_keluar); ?>],
                        backgroundColor: [
                            '#29B0D0',
                            '#2A516E'
                        ]
                    }]
                };

                // ini kodingan untuk diagram lingkaran//
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

            


            <!-- ================ Order Details List ================= -->
            <?php
    include('tabel.php');
            ?>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>
    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
