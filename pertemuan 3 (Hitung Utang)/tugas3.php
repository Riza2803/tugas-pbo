<?php
class PegadaianSyariah {
    public $BesarPinjaman = 1500000;
    public $BesarBunga = 0.10;
    public $TotalPinjaman;
    public $LamaAngsuran = 12;
    public $TotalAngsuran;
    public $Terlambat = 30;
    public $Denda = 10000;
    public $BesarPembayaran;

    public function hitungPinjaman() {
        $this->TotalPinjaman = $this->BesarPinjaman + ($this->BesarPinjaman * $this->BesarBunga);
        return $this->TotalPinjaman;
    }

    public function hitungAngsuran() {
        $this->TotalAngsuran = $this->TotalPinjaman / $this->LamaAngsuran;
        return $this->TotalAngsuran;
    }

    public function hitungDenda() {
        $this->BesarPembayaran = $this-> TotalAngsuran + $this->Denda;
        return $this->BesarPembayaran;
    }
}

$objekPegadaian = new PegadaianSyariah();

echo "Pinjaman = " . $objekPegadaian->BesarPinjaman . "<br>";
echo "Total Pinjaman = " . $objekPegadaian->hitungPinjaman() . "<br>";
echo "Lama Angsuran = " . $objekPegadaian->LamaAngsuran . " bulan<br>";
echo "Angsuran = " . $objekPegadaian->hitungAngsuran() . "<br>";
echo "Denda = " . $objekPegadaian->hitungDenda() . "<br>";
?>