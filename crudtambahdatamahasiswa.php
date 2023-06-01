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
$nim = "";
$program_studi = "";
$error = "";

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan nilai dari form
    $nama = $_POST["nama"];
    $nim = $_POST["nim"];
    $program_studi = $_POST["program_studi"];

    // Validasi input
    if (empty($nama) || empty($nim) || empty($program_studi)) {
        $error = "Semua field harus diisi";
    } else {
        // Menyimpan data ke database
        $sql = "INSERT INTO mahasiswa (Nama, NIM, Program_Studi) VALUES ('$nama', '$nim', '$program_studi')";
	if (mysqli_query($db, $sql)) {
        echo "Data Mahasiswa berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
    }
}

// Menutup koneksi database
mysqli_close($db);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
    <style>
        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 300px;
            padding: 5px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            padding: 8px 16px;
        }
    </style>
</head>
<body>
    <h1>Tambah Mahasiswa</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>

        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" required>

        <label for="program_studi">Program Studi:</label>
        <input type="text" id="program_studi" name="program_studi" required>

        <input type="submit" value="Simpan">
    </form>
</body>
</html>