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

// Mendapatkan data dosen
$sql = "SELECT * FROM dosen";
$result = mysqli_query($db, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dosen</title>
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
     <h1>Data Dosen</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NIDN</th>
            <th>Jenjang Pendidikan</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["ID"] . "</td>";
                echo "<td>" . $row["Nama"] . "</td>";
                echo "<td>" . $row["NIDN"] . "</td>";
                echo "<td>" . $row["Jenjang_Pendidikan"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Tidak ada data dosen</td></tr>";
        }
        ?>
    </table>

    <?php
    // Menutup koneksi database
    mysqli_close($db);
    ?>
</body>
</html>