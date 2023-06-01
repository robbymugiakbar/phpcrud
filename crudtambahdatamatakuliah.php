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

// Inisialisasi variabel
$nama = "";
$kode = "";
$deskripsi = "";

// Pengecekan apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai dari form
    $nama = $_POST["nama"];
    $kode = $_POST["kode"];
    $deskripsi = $_POST["deskripsi"];

    // Insert data ke tabel matakuliah
    $sql = "INSERT INTO matakuliah (Nama, Kode_Matakuliah, Deskripsi) VALUES ('$nama', '$kode', '$deskripsi')";
    if (mysqli_query($db, $sql)) {
        echo "Data matakuliah berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }

    // Menutup koneksi database
    mysqli_close($db);
    exit; // Menghentikan eksekusi script
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Tambah Matakuliah</title>
    <style>
        .form-group {
            margin-bottom: 10px;
        }

        label {
            display: inline-block;
            width: 100px;
        }

        input[type="text"], textarea {
            width: 200px;
        }

        button[type="submit"] {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Form Tambah Matakuliah</h1>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" id="id" name="id" required>
        </div>
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="kode">Kode Matakuliah:</label>
            <input type="text" id="kode" name="kode" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi" rows="4" required></textarea>
        </div>
        <button type="submit">Tambah Matakuliah</button>
    </form>
</body>
</html>
