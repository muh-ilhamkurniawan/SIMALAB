# <p align="center">SIMALAB</p>

## <p align="center">"Sistem Informasi Manajemen Laboratorium Informatika"</p>

![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)  ![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white) ![MySQL](https://img.shields.io/badge/mysql-%2300000f.svg?style=for-the-badge&logo=mysql&logoColor=white)

<p>Sistem nformasi Manajemen Laboratorium Informatika adalah sebuah sistem berbasis website untuk pembuatan surat dan memanajemen inventaris alat dan barang yang ada pada Laboratorium Jurusan Informatika Universitas Jenderal Soedirman. Sistem ini dirancang untuk memudahkan proses pembuatan serta perekapan surat yang dikeluarkan oleh laboratorium. Surat yang dikeluarkan diantaranya Surat Bebas Laboratorium, Surat Peminjaman Alat dan Barang, serta Surat Selesai Penelitian. Untuk memudahkan dalam pembuatan surat dibuat pula fungsi untuk memanajemen inventaris alat dan barang yang dimiliki oleh laboratorium. Manajemen Surat serta Inventaris ini dapat berguna agar tidak perlu dilakukan pembuatan dan pencatatan secara manual untuk menjadikan pelayanan yang cepat dan efisien.</p>
<p>Sistem ini merupakan hasil dari projek mandiri yang dikembangkan di Laboratorium Jurusan Informatika Universitas Jenderal Soedirman atas permintaan dari Asisten Laboratotium</p>

## Tampilan Sistem

<div align="center">
    <img width="300" height="150" src="/dokumentasi/Dashboard.png" alt="SIMALAB Dashboard">
    <img width="300" height="150" src="/dokumentasi/Informasi_Laboratorium.png" alt="SIMALAB Informasi Laboratorium">
    <img width="300" height="150" src="/dokumentasi/Buat_Surat.png" alt="SIMALAB Buat Surat">
    <img width="300" height="150" src="/dokumentasi/Lihat_Surat.png" alt="SIMALAB Lihat Surat">
    <img width="300" height="150" src="/dokumentasi/Organisasi_Laboratorium.png" alt="SIMALAB Organisasi Laboratorium">
</div>


## Langkah Instalasi

1.  Clone repository ke local machine anda menggunakan perintah git:

    ```bash
    git clone https://https://github.com/muh-ilhamkurniawan/SIMALAB.git
    cd SIMALAB
    ```

2.  Import Database

    Import database sistem yang berada di path `"database\dbm_lab.sql"` pada database dengan nama `dbm_lab`

    Atur Informasi Database dan Server pada file `"koneksi.php"`

3.  Jalankan Program dengan mengetik "SIMALAB" sesuai preferensi localhost