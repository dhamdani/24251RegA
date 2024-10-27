<?php include 'template/header.php';?>
<?php

// Proses penyimpanan (jika ada)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_bahan = $_POST['nama_bahan'];
    $stok = $_POST['stok'];
    $satuan = $_POST['satuan'];
    $harga_per_satuan = $_POST['harga_per_satuan'];

    // Query untuk insert data
    $query = "INSERT INTO bahan_baku (nama_bahan, stok, satuan, harga_per_satuan) 
              VALUES ('$nama_bahan', '$stok', '$satuan', '$harga_per_satuan')";
    mysqli_query($koneksi, $query);

    // Redirect untuk menghindari resubmission
    header("Location: manajemen_stok.php");
    exit();
}

// Proses penghapusan
if (isset($_GET['hapus'])) {
    $id_bahan = $_GET['hapus'];

    // Query untuk delete data
    $query = "DELETE FROM bahan_baku WHERE id_bahan = $id_bahan";
    mysqli_query($koneksi, $query);

    header("Location: manajemen_stok.php");
    exit();
}

// Ambil semua data bahan baku
$query = "SELECT * FROM bahan_baku";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Stok Bahan Baku</title>
</head>
<body>

<h1>Manajemen Stok Bahan Baku</h1>

<!-- Form untuk tambah bahan baku -->
<form action="manajemen_stok.php" method="post">
    <div>
        <label for="nama_bahan">Nama Bahan:</label>
        <input type="text" id="nama_bahan" name="nama_bahan" required>
    </div>
    <div>
        <label for="stok">Stok:</label>
        <input type="number" id="stok" name="stok" required>
    </div>
    <div>
        <label for="satuan">Satuan:</label>
        <input type="text" id="satuan" name="satuan" required>
    </div>
    <div>
        <label for="harga_per_satuan">Harga per Satuan:</label>
        <input type="number" step="0.01" id="harga_per_satuan" name="harga_per_satuan" required>
    </div>
    <button type="submit">Tambah Bahan Baku</button>
</form>

<!-- Tabel untuk menampilkan stok bahan baku -->
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Nama Bahan</th>
        <th>Stok</th>
        <th>Satuan</th>
        <th>Harga per Satuan</th>
        <th>Aksi</th>
    </tr>
    <?php
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . $row['nama_bahan'] . "</td>";
        echo "<td>" . $row['stok'] . "</td>";
        echo "<td>" . $row['satuan'] . "</td>";
        echo "<td>" . $row['harga_per_satuan'] . "</td>";
        echo "<td>
              <a href='manajemen_stok.php?hapus=" . $row['id_bahan'] . "'>Hapus</a>
              </td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>
<?php 
	include 'config.php';
	if(!empty($_GET['id'])){
		$id= $_GET['id'];
		$hapus_data = mysqli_query($conn, "DELETE FROM laporanku WHERE id_cart ='$id'");
		echo '<script>window.location="laporan.php"</script>';
	}

?>
<?php include 'template/footer.php';?>