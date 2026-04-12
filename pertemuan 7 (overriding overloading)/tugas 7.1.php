<?php
    class employe {
        public $Nama;
        public $gajiPokok;
        public $masaKerja;

        public function __construct($Nama, $gajiPokok, $masaKerja){
            $this->Nama = $Nama;
            $this->gajiPokok = $gajiPokok;
            $this->masaKerja = $masaKerja;
        }

        public function hitungGaji() {
            return $this->gajiPokok;
        }

        public function tampilInfo(){
            echo "Nama : " . $this->Nama . "<br>";
            echo "Gaji Pokok : Rp " . number_format($this->gajiPokok, 0,',',',') . "<br>";
            echo "Masa Kerja : " . $this->masaKerja . "tahun <br>";
            echo "Total Gaji : Rp " . number_format($this->hitungGaji(), 0,',',',') . "<br>";
            echo "---------------------------<br>";
        }
    }
        
    class Programmer extends employe {
        public function hitungGaji() {
            $gaji = $this->gajiPokok;

            if ($this->masaKerja < 1) {
                $bonus = 0;
            } elseif ($this->masaKerja >= 1 && $this->masaKerja <=10) {
                $bonus = $this->gajiPokok * (0.01 * $this->masaKerja);
            } else {
                $bonus = $this->gajiPokok * (0.02 * $this->masaKerja);
            }
            return $gaji + $bonus;
        }
    }
        
    class Direktur extends employe{
        public function hitungGaji(){
            $bonus = $this->gajiPokok * (0.5 * $this->masaKerja);
            $tunjangan = $this->gajiPokok * (0.01 * $this->masaKerja);
            return $this->gajiPokok + $bonus + $tunjangan;
        }
    }
    
    class PegawaiMingguan extends employe{
        public $hargaBarang;
        public $stockTarget;
        public $totalPenjualan;

        public function __construct($nama, $gajiPokok, $masaKerja, $hargaBarang, $stockTarget) {
            parent ::__construct ($nama, $gajiPokok, $masaKerja);
            $this->hargaBarang = $hargaBarang;
            $this->stockTarget = $stockTarget;
        }

        public function setTotalPenjualan($totalPenjualan) {
            $this->totalPenjualan = $totalPenjualan;
        }

        public function hitungGaji(){
            $gaji = $this->gajiPokok;

            $persentasiPenjualan = ($this->totalPenjualan / $this->stockTarget) * 100;

            if ($persentasiPenjualan > 70) {
                $bonusTambahan = $this->hargaBarang * 0.1 * $this->totalPenjualan;
            }
            else $bonusTambahan = $this->hargaBarang * 0.03 * $this->totalPenjualan;
            return $gaji + $bonusTambahan;
        }

        public function tampilInfo() {
            echo "Nama : " . $this->Nama . "<br>";
            echo "Gaji Pokok : Rp " . number_format($this->gajiPokok, 0,',','.') . "<br>";
            echo "Masa Kerja : " . $this->masaKerja . "tahun <br>";
            echo "Harga Barang : Rp" . number_format($this->hargaBarang, 0, ',','.') . "<br>";
            echo "Target Stock : " . $this->stockTarget . "unit<br>";
            echo "Total Penjualan : Rp" . $this->totalPenjualan . "unit <br>";

            $persentase = ($this->totalPenjualan / $this->stockTarget) * 100;
            echo "Persentase Penjualan : " . round ($persentase, 2) . "%<br>";
            echo "Total Gaji : Rp " . number_format($this->hitungGaji(), 0, ',','.') . "<br>";
            echo "--------------<br>";
        }
    }

    echo "<h1> SISTEM PERHITUNGAN GAJI KARYAWAN </h1>";

    $semuaKaryawan = [];

    echo "<h2> 1. DATA PROGRAMMER </h2>";

    $programmer1 = new Programmer ("Adinda", 5000000, 0.5);
    $programmer2 = new Programmer ("Citra", 4500000, 5);
    $programmer3= new Programmer ("Salim", 6500000, 12);

    $semuaKaryawan[] = $programmer1;
    $semuaKaryawan[] = $programmer2;
    $semuaKaryawan[] = $programmer3;

    $programmer1->tampilInfo();
    $programmer2->tampilInfo();
    $programmer3->tampilInfo();

    echo "<h2> 2. DATA DIREKTUR </h2>";

    $direktur1 = new Direktur ("Bima Ayu", 15000000, 8);
    $direktur2 = new Direktur ("Abian", 19000000, 14);

    $semuaKaryawan[] = $direktur1;
    $semuaKaryawan[] = $direktur2;

    $direktur1->tampilInfo();
    $direktur2->tampilInfo();

    echo "<h2> 3. DATA PEGAWAI MINGGUAN </h2>";

    $pegawaimingguan1 = new PegawaiMingguan ("Fazri", 5000000, 3, 500000, 90);
    $pegawaimingguan1->setTotalPenjualan(80);
    $pegawaimingguan2 = new PegawaiMingguan ("Firmansyah", 4500000, 5, 600000, 100);
    $pegawaimingguan2->setTotalPenjualan(60);

    $semuaKaryawan[] = $pegawaimingguan1;
    $semuaKaryawan[] = $pegawaimingguan2;

    $pegawaimingguan1->tampilInfo();
    $pegawaimingguan2->tampilInfo();

?>