<!-- main.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Petugas</title>
</head>
<body>
    <form action="cobaproses.php" method="POST" enctype="multipart/form-data">
        <label>NIP:</label>
        <input type="text" name="nip" required><br>

        <label>Nama:</label>
        <input type="text" name="nama" required><br>

        <label>Jabatan:</label>
        <input type="text" name="jabatan" required><br>

        <label>Tanda Tangan (Ttd):</label>
        <input type="file" name="ttd" accept="image/*" required><br>

        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
