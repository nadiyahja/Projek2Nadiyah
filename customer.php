<?php
// Nama file untuk menyimpan data pelanggan
$file = 'data_customer.json';

// Cek apakah file data ada, jika tidak buat file kosong
if (!file_exists($file)) {
    file_put_contents($file, json_encode([]));
}

// Baca data pelanggan dari file
$customers = json_decode(file_get_contents($file), true);

// Jika ada data POST, tambahkan ke array pelanggan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hargaPerItem = floatval(str_replace(['Rp', '.'], '', $_POST['harga_per_item'])); // Konversi harga ke angka
    $jumlahBarang = intval($_POST['Jumlah_mainan']);
    $totalHarga = $hargaPerItem * $jumlahBarang;

    $newCustomer = [
        'nama_pembeli' => htmlspecialchars($_POST['nama_pembeli']),
        'nama_barang' => htmlspecialchars($_POST['nama']),
        'jumlah_barang' => $jumlahBarang,
        'total_harga' => 'Rp' . number_format($totalHarga, 0, ',', '.'), // Format ke Rupiah
        'alamat' => htmlspecialchars($_POST['alamat']),
        'telepon' => htmlspecialchars($_POST['telepon']),
    ];
    $customers[] = $newCustomer;

    // Simpan data kembali ke file
    file_put_contents($file, json_encode($customers));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Customer</title>
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
        <h1>Data Pelanggan</h1>
        <table>
            <thead>
                <tr>
                    <th>Nama Pembeli</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Barang</th>
                    <th>Total Harga</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td><?= htmlspecialchars($customer['nama_pembeli']) ?></td>
                        <td><?= htmlspecialchars($customer['nama_barang']) ?></td>
                        <td><?= htmlspecialchars($customer['jumlah_barang']) ?></td>
                        <td><?= htmlspecialchars($customer['total_harga']) ?></td>
                        <td><?= htmlspecialchars($customer['alamat']) ?></td>
                        <td><?= htmlspecialchars($customer['telepon']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Nadiyah Julianty Andriani.</p>
    </footer>
</body>
</html>
