<?php
// Memanggil file BarangManager.php
require_once __DIR__ . '/BarangManager.php';

$barangManager = new BarangManager();
$barangList = $barangManager->getBarang();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="customer.php">Customer</a></li>
            <li><a href="index.php">Stok</a></li>
        </ul>
    </nav>

    <!-- Konten Utama -->
    <div class="container">
        <h1>Daftar Barang</h1>
        <div class="product-grid">
            <?php if (!empty($barangList)): ?>
                <?php foreach ($barangList as $barang): ?>
                    <div class="product-card">
                        <!-- Gambar produk -->
                        <img src="<?= htmlspecialchars($barang['gambar']) ?>" alt="<?= htmlspecialchars($barang['nama']) ?>" style="width:150px; height:auto;">
                        <div class="product-info">
                            <h3><?= htmlspecialchars($barang['nama']) ?></h3>
                            <p>Harga: <?= htmlspecialchars($barang['harga']) ?></p>
                            <p>Stok: <?= htmlspecialchars($barang['stok']) ?></p>
                            <button><a href="form_pembelian.php?nama=<?= urlencode($barang['nama']) ?>&harga=<?= urlencode($barang['harga']) ?>" class="button">Beli Sekarang</a></button>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Belum ada barang tersedia.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Nadiyah Julianty Andriani.</p>
    </footer>
</body>
</html>
