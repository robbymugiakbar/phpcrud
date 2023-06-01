<?php
// Konfigurasi database
$server = "localhost";
$user = "root";
$password = "";
$database = "siakad";

// Membuat koneksi ke database
$db = mysqli_connect($server, $user, $password, $database);

// Cek koneksi
if (!$db) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Mendapatkan data matakuliah
$sql = "SELECT * FROM matakuliah";
$result = mysqli_query($db, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Matakuliah</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
     <h1>Tabel Matakuliah</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Kode Matakuliah</th>
            <th>Deskripsi</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["ID"] . "</td>";
                echo "<td>" . $row["Nama"] . "</td>";
                echo "<td>" . $row["Kode_Matakuliah"] . "</td>";
                echo "<td>" . $row["Deskripsi"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Tidak ada data matakuliah</td></tr>";
        }
        ?>
    </table>

    <?php
    // Menutup koneksi database
    mysqli_close($db);
    ?>
</body>
</html>