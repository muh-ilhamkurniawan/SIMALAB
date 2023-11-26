<!-- proses.php -->
<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];

    // File upload
    $ttd = $_FILES['ttd'];

    // Lokasi penyimpanan file
    $upload_dir = 'uploads/';

    // Nama file
    $ttd_name = $ttd['name'];
    $ttd_tmp_name = $ttd['tmp_name'];
    $ttd_path = $upload_dir . $ttd_name;

    // Pindahkan file ke direktori yang diinginkan
    if (move_uploaded_file($ttd_tmp_name, $ttd_path)) {
        // Simpan data ke database (gantilah dengan nama tabel dan kolom yang sesuai)
        $sql = "INSERT INTO petugas (nip, nama, jabatan, ttd) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ssss", $nip, $nama, $jabatan, $ttd_name);
            
            if ($stmt->execute()) {
                echo "Data berhasil disimpan.";
            } else {
                echo "Terjadi kesalahan saat menyimpan data: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Terjadi kesalahan saat menyiapkan pernyataan: " . $conn->error;
        }
    } else {
        echo "Gagal mengunggah file tanda tangan.";
    }
}
?>
