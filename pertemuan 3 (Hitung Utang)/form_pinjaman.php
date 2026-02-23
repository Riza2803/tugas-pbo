<!DOCTYPE html>
<html>
<head>
    <title>Pegadaian Syariah</title>
</head>
<body>
    <h2>Form Peminjaman Pegadaian Syariah</h2>
<form action="proses_pinjaman.php" method="POST">
    Besar Pinjaman :
    <input type="number" name="pinjaman" required><br><br>
    Lama Angsuran :
    <input type="number" name="tenor" required><br><br>
    <input type="submit" value="Simpan">
</form>
</body>
</html>