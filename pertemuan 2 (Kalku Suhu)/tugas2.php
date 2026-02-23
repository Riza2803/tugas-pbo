<?php
class KalkulatorSuhu {  //Class Untuk Kalkulator Suhu
    public $jenis = "";
    public $suhu = 0;

    function hitung($suhu, $jenis) {
        if ($jenis == 'fahrenheit') {
            return ($suhu * 9/5) + 32;
        }
        if ($jenis == 'kelvin') {
            return $suhu + 273.15;
        }                              // Operasi Aritmatika, untuk menghitung konversi suhu
        if ($jenis == 'reamur') {
            return $suhu * 4/5;
        }
        return "Jenis konversi tidak dikenali.";
    }
}

$hasil = "";
if (isset($_POST['tombol'])) {   // Mengambil data dari form ketika tombol ditekan
    $alat = new KalkulatorSuhu();

    $nilai = $alat->hitung($_POST['suhu'], $_POST['opsi']); // Memanggil method hitung dengan parameter suhu dan jenis konversi
    
    $hasil = "Hasil konversi: " . $nilai . " " . $_POST['opsi']; // Menyimpan hasil konversi dalam variabel hasil
}
?>

<form method="post">                                                        <!--Form untuk input suhu dan pilihan konversi-->
    <input type="number" name="suhu" placeholder="Masukkan Suhu" required> <!--Input suhu dalam derajat Celsius-->
    <select name="opsi">                                                  <!--Dropdown untuk memilih jenis konversi-->
        <option value="fahrenheit">Fahrenheit</option>
        <option value="kelvin">Kelvin</option>
        <option value="reamur">Reamur</option>
    </select>
    <button type="submit" name="tombol">Hitung</button>
</form>

<h3><?php echo $hasil; ?></h3> <!--Menampilkan Hasil-->