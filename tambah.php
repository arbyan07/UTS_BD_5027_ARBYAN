<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $kelas = $_POST['kelas'];

    $sql = "INSERT INTO mahasiswa (nama, nim, kelas) VALUES ('$nama', '$nim', '$kelas')";

    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Mahasiswa</title>
    <style>
        /* Styling CSS untuk Tambah Mahasiswa */
body {
    font-family: Arial, sans-serif;
    background-color: #f7f7f7;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
}

h2 {
    color: #ff0000; /* Warna merah */
    text-align: center;
    margin-bottom: 20px;
}

form {
    background-color: #ffe6e6; /* Warna latar merah muda */
    padding: 20px;
    border: 1px solid #ffcc00; /* Warna kuning */
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 300px;
    text-align: center;
}

input[type="text"] {
    width: 100%;
    padding: 8px;
    margin: 8px 0;
    border: 1px solid #ffcc00; /* Warna kuning */
    border-radius: 4px;
}

button {
    background-color: #ff0000; /* Warna merah */
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #ffcc00; /* Warna kuning saat dihover */
}

    </style>
</head>
<body>
    <h2>Tambah Mahasiswa</h2>
    <form method="POST" action="">
        Nama: <input type="text" name="nama" required><br><br>
        NIM: <input type="text" name="nim" required><br><br>
        Kelas: <input type="text" name="kelas" required><br><br>
        <button type="submit">Tambah</button>
    </form>
</body>
</html>
