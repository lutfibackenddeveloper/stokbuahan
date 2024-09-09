<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>
<body>
<div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>STOK BUAH SEKARANG</h2>
            </div>
            <table class="">
                <thead>
                    <tr class="text-center">
                        <th  >No</th>
                        <th  >Nama Buah</th>
                        <th >Stok</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $tampil = mysqli_query($db, "SELECT nama, stok FROM stok order by nama asc");
                    if (mysqli_num_rows($tampil) > 0) {
                        while ($data = mysqli_fetch_array($tampil)) {
                            ?>
                            <tr >
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center"><?= $data['nama'] ?></td>
                                <td class="text-center"><?= $data['stok'] ?></td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo '<tr><td colspan="3" class="text-center">Data tidak ditemukan</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
    