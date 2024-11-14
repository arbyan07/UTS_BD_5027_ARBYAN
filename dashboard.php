<?php
session_start();
include 'koneksi.php';

// Mengecek apakah pengguna sudah login
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
    exit();
}

// Mengambil semua data mahasiswa dari database
$sql = "SELECT * FROM mahasiswa";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa</title> 
    <style>
        /* Styling CSS untuk Dashboard Mahasiswa */
body {
    font-family: Arial, sans-serif;
    background-color: #f7f7f7;
}

h2 {
    color: #ff0000; /* Warna merah */
    text-align: center;
    margin-top: 20px;
}

p {
    color: #333;
    text-align: center;
    margin-bottom: 10px;
}

a {
    color: #ff0000; /* Warna merah */
    text-decoration: none;
}

a:hover {
    color: #ffcc00; /* Warna kuning saat dihover */
}

table {
    width: 80%;
    margin: 0 auto;
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid #ffcc00; /* Warna kuning */
}

th {
    background-color: #ff0000; /* Warna merah */
    color: white;
    padding: 10px;
}

td {
    text-align: center;
    padding: 10px;
}

tr:nth-child(even) {
    background-color: #ffe6e6; /* Warna latar merah muda untuk baris genap */
}

    </style>
</head>
<body>
    <h2>Data Mahasiswa</h2>
    <p>Selamat datang, <?= $_SESSION['email']; ?> | <a href="logout.php">Logout</a></p>
    <a href="tambah.php">Tambah Mahasiswa</a><br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Kelas</th>
            <th>Aksi</th>
        </tr>

        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['nim']; ?></td>
                    <td><?= $row['kelas']; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id']; ?>">Edit</a> | 
                        <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="5">Tidak ada data mahasiswa.</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>
