<?php
require('../../koneksi.php');
if (isset($_POST['simpan'])) {
    $nip = $_POST["nip"];
    $nama = $_POST["nama"];
    $jabatan = $_POST["jabatan"];

    // Mengambil informasi file tanda tangan yang diunggah
    $ttd = $_FILES["ttd"];

    // Cek apakah data NIP sudah ada
    $sql = "SELECT nip FROM petugas WHERE nip = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nip);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>window.alert('Maaf, NIP sudah ada.');
              window.location=('../../index.php?r=tambah_petugas')</script>";
    } else {
        // Jika NIP belum ada, lanjutkan dengan penyimpanan

        // Simpan tanda tangan (file) ke direktori
        $upload_dir = "uploads/"; // Ganti dengan path direktori yang sesuai
        $ttd_name = $ttd["name"];
        $ttd_tmp_name = $ttd["tmp_name"];
        $ttd_path = $upload_dir . $ttd_name;

        if (move_uploaded_file($ttd_tmp_name, $ttd_path)) {
            // Siapkan pernyataan SQL INSERT
            $sql = "INSERT INTO petugas (nip, nama, jabatan, ttd) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                // Bind parameter dan jalankan pernyataan SQL
                $stmt->bind_param("ssss", $nip, $nama, $jabatan, $ttd_name);

                if ($stmt->execute()) {
                    echo "<script>window.alert('Data telah disimpan ke database.');
                          window.location=('../../index.php?r=organisasi')</script>";
                } else {
                    echo "<script>window.alert('Terjadi kesalahan saat menyimpan data: " . $stmt->error . "');
                          window.location=('../../index.php?r=tambah_petugas')</script>";
                }

                // Tutup pernyataan
                $stmt->close();
            } else {
                echo "<script>window.alert('Terjadi kesalahan saat menyiapkan pernyataan: " . $conn->error . "');
                      window.location=('../../index.php?r=tambah_petugas')</script>";
            }
        } else {
            echo "<script>window.alert('Gagal mengunggah file tanda tangan.');
                  </script>";
        }
    }
}

if (isset($_POST['edit'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nip = $_POST["nip"];
        $nama = $_POST["nama"];
        $jabatan = $_POST["jabatan"];

            // Siapkan pernyataan SQL UPDATE
            $sql = "UPDATE petugas SET nama = ?, jabatan = ? WHERE nip = ?";


            // Buat pernyataan persiapan
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                // Bind parameter dan jalankan pernyataan SQL
                $stmt->bind_param("ssi", $nama, $jabatan, $nip);


                if ($stmt->execute()) {
                    echo "<script>window.alert('Data telah disimpan ke database.');
                    window.location=('../../index.php?r=organisasi')</script>";
                } else {
                    echo "<script>window.alert('Terjadi kesalahan saat menyimpan data: ');
                    window.location=('../../index.php?r=edit_petugas')</script>". $stmt->error;
                }

                // Tutup pernyataan
                $stmt->close();
            } else {
                echo "<script>window.alert('Terjadi kesalahan saat menyiapkan pernyataan: ');
                    window.location=('../../index.php?r=edit_petugas')</script>". $conn->error;
            }
              
    }
    
}
?>
