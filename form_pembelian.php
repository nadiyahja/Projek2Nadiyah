<?php
$namaBarang = isset($_GET['nama']) ? htmlspecialchars($_GET['nama']) : '';
$hargaBarang = isset($_GET['harga']) ? htmlspecialchars($_GET['harga']) : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pembelian</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Formulir Pembelian</h1>
        <form action="customer.php" method="POST">
            <label for="nama">Nama Barang:</label>
            <input type="text" id="nama" name="nama" value="<?= $namaBarang ?>" readonly>

            <label for="harga">Harga Barang (per item):</label>
            <input type="text" id="harga" name="harga" value="<?= $hargaBarang ?>" readonly>

            <label for="Jumlah_mainan">Jumlah Barang:</label>
            <input type="number" id="Jumlah_mainan" name="Jumlah_mainan" required>

            <label for="nama_pembeli">Nama Pembeli:</label>
            <input type="text" id="nama_pembeli" name="nama_pembeli" required>

            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" required>

            <label for="telepon">No. Telepon:</label>
            <input type="text" id="telepon" name="telepon" required>

            <!-- Kirim harga per item dalam input tersembunyi -->
            <input type="hidden" name="harga_per_item" value="<?= $hargaBarang ?>">

            <button type="submit">Kirim</button>
            <a href="index.php" class="button">Kembali</a>
        </form>
    </div>
    <footer>
        <p>&copy; 2024 Nadiyah Julianty Andriani.</p>
    </footer>
</body>
</html>
