<?php

require "functions.php";
$mahasiswa = query("SELECT * FROM mahasiswa");

//ambil data dari tabel mahasiswa
//$result = mysqli_query($conn, "SELECT * FROM mahasiswa");
//ambil data mahasiswa dari object result
/*while ($mhs = mysqli_fetch_assoc($result)){
    var_dump($mhs);
}*/

?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect PHP ke Database</title>
</head>
<body>
<h1>Daftar Mahasiswa</h1>
<a href="tambah.php">Tambah Data Mahasiswa</a>
<br><br>
    <table border="1" cellpadding="10" cellspasing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Nama</th>
            <th>NRP</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Gambar</th>
        </tr>

        <?php $i=1?>
        <?php
        foreach ($mahasiswa as $row):?>
        <tr>
            <td><?= $i; ?></td>
            <td>
                <a href="">ubah</a> | <a href="">hapus</a>
            </td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["nrp"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><?= $row["jurusan"]; ?></td>
            <td><?= $row["gambar"]; ?></td>
        </tr>
        <?php $i++?>
        <?php endforeach; ?>
    </table>

    
</body>
</html>