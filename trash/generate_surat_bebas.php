<?php
require('vendor/autoload.php'); // Mengimpor autoloader TCPDF
require('koneksi.php');
    $query = "SELECT nama,nip FROM petugas WHERE jabatan = 'Kepala Laboratorium Jaringan'"; // Ganti dengan query yang sesuai
    $result = $conn->query($query);
    if ($result) {
        $row = $result->fetch_assoc();
        $kepalaLabJaringan = $row['nama'];
        $nipKepalaLabJaringan = $row['nip'];
    } else {
        echo "Kesalahan dalam menjalankan query: " . $conn->error;
    }
    $query = "SELECT nama,nip FROM petugas WHERE jabatan = 'Kepala Laboratorium Pemrograman'"; // Ganti dengan query yang sesuai
    $result = $conn->query($query);
    if ($result) {
        $row = $result->fetch_assoc();
        $kepalaLabPemrograman = $row['nama'];
        $nipKepalaLabPemrograman = $row['nip'];
    } else {
        echo "Kesalahan dalam menjalankan query: " . $conn->error;
    }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $noSurat = $_POST["noSurat"];
    $nama = $_POST["nama"];
    $NIM = $_POST["NIM"];
    $judul = $_POST["judul"];
    $tanggalInput = $_POST['tanggal'];
    $namaBulan = [
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];

    // Mengonversi tanggal ke format "tanggal bulan tahun" dalam bahasa Indonesia
    $timestamp = strtotime($tanggalInput);
    $bulanTerformat = $namaBulan[date('n', $timestamp) - 1];
    $tahunTerformat = date('Y', $timestamp);

    // Konversi tanggal ke format "tanggal bulan tahun"
    $tanggalTerformat = date('j F Y', strtotime($tanggalInput));

    if (!empty($nama) && !empty($NIM) && !empty($judul)) {
        $pdf = new TCPDF();

        // Set margin kiri, kanan, dan atas menjadi 0
        $pdf->SetMargins(10, 0, 0);

        // Matikan fungsi auto page break
        $pdf->SetAutoPageBreak(false);

        $pdf->AddPage();
        $pdf->SetFont('times', '', 12);

        $pdf->SetXY(10, 10); // Atur posisi X dan Y header
        $pdf->SetFillColor(255, 255, 255); // Isi header dengan warna putih (255, 255, 255)
        $pdf->Cell(210, 20, '', 0, 0, 'C', 1); // Buat sel header dengan latar belakang putih
        

        // Tambahkan gambar logo
        $pdf->Image('logo.jpg', 20, 20, 25, 0, 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);

        $kopSurat = "KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI\nUNIVERSITAS JENDERAL SOEDIRMAN\nFAKULTAS TEKNIK\nLABORATORIUM JURUSAN TEKNIK INFORMATIKA";

        // Mengukur lebar halaman
        $pageWidth = $pdf->GetPageWidth();

        // Mengukur lebar teks $kopSurat
        $kopWidth = $pdf->GetStringWidth($kopSurat);

        // Menghitung posisi X agar teks berada di tengah
        $kopX = ($pageWidth) / 22 ;

        $pdf->SetFont('times', 'B', 10); // Atur ukuran huruf yang sesuai
        $pdf->SetXY($kopX, $pdf->GetY());; // Atur posisi X agar teks berada di tengah
        $pdf->MultiCell(0, 10, $kopSurat, 0, 'C');
        $pdf->SetFont('times', '', 10); // Atur ukuran huruf yang sesuai
        $pdf->SetXY($kopX, $pdf->GetY());; // Atur posisi X agar teks berada di tengah
        $pdf->MultiCell(0, 10, "Jl. Mayjen Sungkono KM 5 Blater Purbalingga 53371 Telp/Fax. (0281) 6596700", 0, 'C');
        $pdf->SetFont('times', '', 11);
        $pdf->SetXY($kopX, $pdf->GetY()-5);; // Atur posisi X agar teks berada di tengah
        $pdf->MultiCell(0, 10, "Psw. 144 E-mail : teknik@unsoed.ac.id", 0, 'C');

        // Membuat garis bawah kop surat dengan ketebalan ganda
        $lineY = $pdf->GetY()-3; // Tentukan posisi Y untuk garis (sesuaikan dengan posisi teks)
        $pdf->SetLineWidth(1); // Set ketebalan garis (0.5 adalah ketebalan ganda)
        $pdf->Line(25, $lineY, 185, $lineY);
        $pdf->SetLineWidth(0.2); // Kembalikan ketebalan garis ke nilai default (0.2)




        $pdf->Ln(10); // Pindah ke baris berikutnya setelah kop surat


        $pdf->SetY(60);

        // Tambahkan teks center di bagian atas kertas
        $pdf->SetFont('times', 'BU', 14); // Mengatur teks menjadi tebal (B) dan bergaris bawah (U)
        $pdf->Cell(0, 10, "SURAT KETERANGAN BEBAS LABORATORIUM", 0, 0, 'C'); // 'Surat' adalah teks yang akan ditampilkan di tengah atas
        $pdf->SetFont('times', '', 12); // Kembali ke jenis huruf biasa
        
        // Tambahkan kalimat di bawah 'Surat'
        $pdf->Cell(0, 0, '', 0, 1); // Tambahkan beberapa spasi kosong untuk menggeser teks ke atas
        $pdf->Cell(0, 10, $noSurat, 0, 1, 'C'); // Ganti teks kalimat sesuai kebutuhan

        $content = "
        Yang bertanda tangan dibawah ini Kepala Laboratorium Jurusan Teknik Informatika Fakultas Teknik Universitas Jenderal Soedirman menyatakan bahwa mahasiswa di bawah ini:
        ";

        $pdf->SetXY(25, $pdf->GetY());
        $pdf->MultiCell(160, 10, $content);

        // Definisikan lebar sel dalam tabel
        $cellWidth = 50; // Ganti dengan lebar yang sesuai dengan preferensi Anda
        $cellHeight = 10; // Lebar sel dalam tabel
        $cellBorder = 0; // Jenis garis sel dalam tabel
                // Mengukur lebar halaman
        $pageWidth = $pdf->GetPageWidth();

        // Menghitung lebar tabel dan posisinya agar terletak di tengah halaman
        $tableWidth = $cellWidth * 3; // Lebar tabel sesuai dengan jumlah kolom
        $tableX = ($pageWidth - $tableWidth) / 2; // Posisi X agar berada di tengah

        // Memulai tabel di posisi X yang baru dihitung
        $pdf->SetX($tableX);

        // Baris 1
        $pdf->Cell(35, $cellHeight, 'Nama', $cellBorder);
        $pdf->Cell(5, $cellHeight, ':', $cellBorder);
        $pdf->Cell(110, $cellHeight, $nama, $cellBorder);
        $pdf->Ln(); // Pindah ke baris berikutnya

        // Memulai tabel di posisi X yang baru dihitung
        $pdf->SetX($tableX);

        // Baris 2
        $pdf->Cell(35, $cellHeight, 'NIM', $cellBorder);
        $pdf->Cell(5, $cellHeight, ':', $cellBorder);
        $pdf->Cell(110, $cellHeight, $NIM, $cellBorder);
        $pdf->Ln(); // Pindah ke baris berikutnya

        // Memulai tabel di posisi X yang baru dihitung
        $pdf->SetX($tableX);

        // Baris 3
        $pdf->Cell(35, $cellHeight, 'Judul Tugas Akhir', $cellBorder);
        $pdf->Cell(5, $cellHeight, ':', $cellBorder);
        $pdf->MultiCell(110, $cellHeight, $judul, 1, 'L');
        $pdf->Ln(); // Pindah ke baris berikutnya


        $content = "
        Telah menyelesaikan semua kewajiban yang berhubungan dengan laboratorium Jurusan Teknik Informatika berkenaan dengan kegiatan praktikum dan penggunaan fasilitas peralatan laboratorium.
        
        Sehingga kepada mahasiswa tersebut dinyatakan
        ";

        $pdf->SetXY(25, $pdf->GetY()-15);
        $pdf->MultiCell(160, 10, $content);
        
        // Cetak kata "BEBAS" dalam format tebal
        $pdf->SetFont('times', 'B', 12);
        $yBebas = $pdf->GetY() - 10.5;
        $pdf->SetXY(119, $yBebas);
        $pdf->MultiCell(160, 10, 'BEBAS');
        
        // Kembalikan font ke ukuran normal
        $pdf->SetFont('times', '', 12);
        
        $content = "dari kewajiban atas semua";
        $pdf->SetXY(135, $yBebas);
        $pdf->MultiCell(50, 10, $content);
        $content = "urusan yang berhubungan dengan laboratorium Jurusan Teknik Informatika.";
        $pdf->SetXY(25, $pdf->GetY() - 4);
        $pdf->MultiCell(160, 10, $content);

        // Tambahkan tanggal di pojok kanan bawah
        $pdf->SetXY(120, $pdf->GetY()); // Atur posisi teks tanggal di pojok kanan bawah
        $tanggalSurat = "Purbalingga, ". date('j', $timestamp) . " " . $bulanTerformat . " " . $tahunTerformat; // Ganti dengan tanggal yang sesuai
        $pdf->Cell(60, 10, $tanggalSurat, 0, 1, 'C'); // Atur alignment menjadi 'C' untuk mencetak di tengah

        // Tambahkan kata 'Mengetahui,'
        $pdf->Cell(0, 10, 'Mengetahui,', 0, 1, 'C'); // Ganti teks sesuai kebutuhan

        // Tambahkan tanda tangan di kanan dan kiri bawah
        $ttdKiri = "Kepala Laboratorium Jaringan";
        $ttdKiriNama = $kepalaLabJaringan;
        $ttdKiriNip = "NIP ".$nipKepalaLabJaringan;
        $ttdKanan = "Kepala Laboratorium Pemrograman";
        $ttdKananNama = $kepalaLabPemrograman;
        $ttdKananNip = "NIP ".$nipKepalaLabPemrograman;

        $pdf->SetXY(30, $pdf->GetY()); // Atur posisi tanda tangan kiri
        $pdf->MultiCell(80, 40, $ttdKiri, 0, 'L', false, 0, '', '', true, 0, false, true, 50, 'T');

        // Set posisi tanda tangan kanan agar sejajar dengan tanda tangan kiri
        $pdf->SetXY(120, $pdf->GetY()); // Atur posisi tanda tangan kanan
        $pdf->MultiCell(80, 40, $ttdKanan, 0, 'L', false, 0, '', '', true, 0, false, true, 50, 'T');

        // Set posisi nama tanda tangan kanan agar sejajar dengan nama tanda tangan kiri
        $pdf->SetFont('times', 'U', 12);
        $pdf->SetXY(30, $pdf->GetY() + 30); // Atur posisi nama tanda tangan kiri
        $pdf->MultiCell(80, 40, $ttdKiriNama, 0, 'L', false, 0, '', '', true, 0, false, true, 50, 'T');

        // Set posisi nama tanda tangan kanan agar sejajar dengan nama tanda tangan kiri
        $pdf->SetXY(120, $pdf->GetY()); // Atur posisi nama tanda tangan kanan
        $pdf->MultiCell(80, 40, $ttdKananNama, 0, 'L', false, 0, '', '', true, 0, false, true, 50, 'T');

        // Set posisi nip tanda tangan kanan agar sejajar dengan nip tanda tangan kiri
        $pdf->SetFont('times', '', 12);
        $pdf->SetXY(30, $pdf->GetY() + 5); // Atur posisi nip tanda tangan kiri
        $pdf->MultiCell(80, 40, $ttdKiriNip, 0, 'L', false, 0, '', '', true, 0, false, true, 50, 'T');
        
        // Set posisi nip tanda tangan kanan agar sejajar dengan nip tanda tangan kiri
        $pdf->SetXY(120, $pdf->GetY()); // Atur posisi nip tanda tangan kanan
        $pdf->MultiCell(80, 40, $ttdKananNip, 0, 'L', false, 0, '', '', true, 0, false, true, 50, 'T');

        $pdf->Output('surat.pdf', 'I');

    }
}
?>
