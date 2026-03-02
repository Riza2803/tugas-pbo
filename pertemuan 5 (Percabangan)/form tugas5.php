<!DOCTYPE html>
<html>
    <head>
        <title>Form Belanja</title>
    </head>
    <body>
    
    <h2>Form Belanja RZ</h2>

    <form method="POST" action="tugas 5.php">

        Nama Pembeli: <br>
        <input type="text" name="nama"><br><br>

        Kartu Member: <br>
        <input type="radio" id="pilih_ya" name="kartuMember" value="Ya">
        <label for="pilih_ya">Ya</label>
        <input type="radio" id="pilih_tidak" name="kartuMember" value="Tidak">
        <label for="pilih_tidak">Tidak</label><br><br>

        Jumlah Belanja: <br>
        <input type="number" name="jumlah"><br><br>

        <input type="submit" value="Submit">

    </form>

    </body>
</html>
