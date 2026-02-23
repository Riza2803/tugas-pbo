<?php
Class PegadaianSyariah {
    Public $Pinjaman;
    Public $Tenor;
    Public $Bunga = 0.10;
    Public $AngsuranPerbulan;
    Public $TotalPinjaman;
    Public $DendaTelat = 0.0015;
    Public $TotalPinjamanDenda;
    
    Public Function hitungAngsuranPerbulan () {
        $this->AngsuranPerbulan = ($this->Pinjaman / $this->Tenor) * (1 + $this->Bunga);
        return $this->AngsuranPerbulan;
    }

    Public Function hitungDendaTelat () {
        $this->TotalPinjamanDenda = $this->AngsuranPerbulan * (1 + $this->DendaTelat);
        return $this->TotalPinjamanDenda;
    }

    Public Function hitungTotalPinjaman () {
        $this->TotalPinjaman = $this->Pinjaman * (1 + $this->Bunga);
        return $this->TotalPinjaman;
    }


}
$PegadaianSyariah1 = new PegadaianSyariah();
$PegadaianSyariah1->Pinjaman =
htmlspecialchars($_POST['pinjaman']);
$PegadaianSyariah1->Tenor =
htmlspecialchars($_POST['tenor']);
echo "<h2>Form Peminjaman</h2>";
echo "Pinjaman : " . $PegadaianSyariah1->Pinjaman . "<br>";
echo "Tenor : " . $PegadaianSyariah1->Tenor . " bulan<br>";
echo "<br>";
echo "Total Pinjaman : " . $PegadaianSyariah1->hitungTotalPinjaman() . "<br>";
echo "Denda Telat Perhari ;" . ($PegadaianSyariah1->DendaTelat * 100) . "%<br>";
echo "<br>";
echo "<b>Angsuran Perbulan : " . $PegadaianSyariah1->hitungAngsuranPerbulan() . "</b><br>";
echo "<b>Total Angsuran Jika Telat : " . $PegadaianSyariah1->hitungDendaTelat() . "</b><br>";
?>