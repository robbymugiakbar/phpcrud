<?php
// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan data dari form
    $nama = $_POST["nama"];
    $nidn = $_POST["nidn"];
    $jenjangPendidikan = $_POST["jenjang"];
    
    // Validasi data (misalnya, cek apakah data sudah terisi dengan benar)
    $errors = array();
    if (empty($nama)) {
        $errors[] = "Nama dosen harus diisi";
    }
    if (empty($nidn)) {
        $errors[] = "NIDN dosen harus diisi";
    }
    if (empty($jenjangPendidikan)) {
        $errors[] = "Jenjang pendidikan dosen harus diisi";
    }
    
    // Jika tidak ada error, masukkan data ke database
    if (empty($errors)) {
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

        
        // Menyiapkan pernyataan SQL untuk menyimpan data ke database
        $sql = "INSERT INTO dosen (Nama, NIDN, Jenjang_Pendidikan) VALUES ('$nama', '$nidn', '$jenjangPendidikan')";
        
        // Menjalankan pernyataan SQL
        if (mysqli_query($db, $sql)) {
            echo "Data dosen berhasil ditambahkan";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Tambah Dosen</title>
    <style>
        form {
            width: left;
            margin: 0 auto;
        }

        label, input {
            display: block;
            margin-bottom: 12px;
        }

        input[type="submit"] {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Form Tambah Dosen</h1>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>

        <label for="nidn">NIDN:</label>
        <input type="text" id="nidn" name="nidn" required>

        <label for="jenjang">Jenjang Pendidikan:</label>
        <select id="jenjang" name="jenjang" required>
            <option value="S2">S2</option>
            <option value="S3">S3</option>
        </select>

        <input type="submit" value="Simpan">
    </form>
</body>
</html>