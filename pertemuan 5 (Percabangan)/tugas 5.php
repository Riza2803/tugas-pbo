<?php
    class Belanja {
        public $nama;
        public $kartuMember;
        public $totalBelanja;
        public $totalBayar;
        public $totalDiskon;

        public function hitungBelanja() { // Method untuk menghitung total bayar berdasarkan kartu member dan total belanja
         if ($this->kartuMember == "Ya") {
                if ($this->totalBelanja >= 500000) {
                    $this->totalBayar = $this->totalBelanja - 50000; } 
                  else if ($this->totalBelanja >= 100000) {
                    $this->totalBayar = $this->totalBelanja - 15000; } 
                  else 
                    {
                    $this->totalBayar = $this->totalBelanja; }
            } else {
                if ($this->totalBelanja >= 100000) {
                    $this->totalBayar = $this->totalBelanja - 5000; } 
                else 
                    {
                    $this->totalBayar = $this->totalBelanja; }
            }
                    $this->totalDiskon = $this->totalBelanja - $this->totalBayar;
        } 
    }
    
    $belanja = new Belanja();
    $belanja->nama = $_POST['nama'];
    $belanja->kartuMember = $_POST['kartuMember'];
    $belanja->totalBelanja = $_POST['jumlah'];
    $belanja->hitungBelanja();
    echo "<b>Nama Pembeli: " . $belanja->nama . "<br><br>";
    echo "Kartu Member: " . $belanja->kartuMember . "<br><br>";
    echo "Total Belanja: " . $belanja->totalBelanja . "<br><br>";
    echo "Total Diskon: " . $belanja->totalDiskon . "<br><br>";
    echo "Total Bayar: " . $belanja->totalBayar . "<br><br>";

?>