<?php
class GajiKaryawan
{
    public $karyawan = [];
    public $gajiPokok = [];
    public $lemburPerJam = 15000;

    public function __construct($dataAwal = [])
    {
        $this->gajiPokok = [
            "Ib" => 1250000, "Ic" => 1300000, "Id" => 1350000,
            "IIa" => 2000000, "IIb" => 2100000, "IIIb" => 2300000,
            "IVc" => 3000000, "IVd" => 3100000
        ];
        
        $this->karyawan = $dataAwal;
        echo "\n=== PROGRAM GAJI KARYAWAN ===\n";
    }

    public function __destruct()
    {
        echo "\n=== TERIMA KASIH ===\n";
    }

    public function getGajiPokok($golongan)
    {
        if (isset($this->gajiPokok[$golongan])) {
            return $this->gajiPokok[$golongan];
        } else {
            return 0;
        }
    }
    
    // Method hitung total gaji
    public function hitungGaji($golongan, $jamLembur)
    {
        $gaji = $this->getGajiPokok($golongan);
        $lembur = $jamLembur * $this->lemburPerJam;
        return $gaji + $lembur;
    }

    public function tampilkanData()
    {
        if (empty($this->karyawan)) {
            echo "\nBelum ada data karyawan!\n";
            return;
        }
        
        echo "\n==========================================================\n";
        echo "No  Nama           Golongan    Jam    Total Gaji\n";
        echo "==========================================================\n";
        
        foreach ($this->karyawan as $index => $k) {
            $no = $index + 1;
            $total = $this->hitungGaji($k['golongan'], $k['jamLembur']);
            echo "$no   " . str_pad($k['nama'], 12) . "   " . str_pad($k['golongan'], 6) . "   " . str_pad($k['jamLembur'], 3) . "     Rp " . number_format($total, 0, ',', '.') . "\n";
        }
        echo "==========================================================\n";
    }

    public function tambahData()
    {
        echo "\n--- TAMBAH KARYAWAN ---\n";
        echo "Nama: ";
        $nama = trim(fgets(STDIN));
        echo "Golongan (Ib/Ic/Id/IIa/IIb/IIIb/IVc/IVd): ";
        $golongan = trim(fgets(STDIN));
        echo "Jam Lembur: ";
        $jamLembur = trim(fgets(STDIN));
        
        if ($this->getGajiPokok($golongan) == 0) {
            echo "Golongan tidak valid!\n";
            return;
        }
        
        $this->karyawan[] = [
            'nama' => $nama,
            'golongan' => $golongan,
            'jamLembur' => $jamLembur
        ];
        
        echo "Data berhasil ditambahkan!\n";
    }

    public function updateData()
    {
        $this->tampilkanData();
        
        if (empty($this->karyawan)) return;
        
        echo "\n--- UPDATE KARYAWAN ---\n";
        echo "Nomor yang akan diupdate: ";
        $no = trim(fgets(STDIN)) - 1;
        
        if (!isset($this->karyawan[$no])) {
            echo "Data tidak ditemukan!\n";
            return;
        }
        
        echo "Nama baru (" . $this->karyawan[$no]['nama'] . "): ";
        $nama = trim(fgets(STDIN));
        echo "Golongan baru (" . $this->karyawan[$no]['golongan'] . "): ";
        $golongan = trim(fgets(STDIN));
        echo "Jam lembur baru (" . $this->karyawan[$no]['jamLembur'] . "): ";
        $jamLembur = trim(fgets(STDIN));
        
        if ($nama != "") $this->karyawan[$no]['nama'] = $nama;
        if ($golongan != "") $this->karyawan[$no]['golongan'] = $golongan;
        if ($jamLembur != "") $this->karyawan[$no]['jamLembur'] = $jamLembur;
        
        echo "Data berhasil diupdate!\n";
    }
    
    // Method hapus data
    public function hapusData()
    {
        $this->tampilkanData();
        
        if (empty($this->karyawan)) return;
        
        echo "\n--- HAPUS KARYAWAN ---\n";
        echo "Nomor yang akan dihapus: ";
        $no = trim(fgets(STDIN)) - 1;
        
        if (!isset($this->karyawan[$no])) {
            echo "Data tidak ditemukan!\n";
            return;
        }
        
        echo "Yakin hapus " . $this->karyawan[$no]['nama'] . "? (y/n): ";
        $confirm = trim(fgets(STDIN));
        
        if ($confirm == 'y' || $confirm == 'Y') {
            array_splice($this->karyawan, $no, 1);
            echo "Data berhasil dihapus!\n";
        } else {
            echo "Penghapusan dibatalkan!\n";
        }
    }
}

$dataAwal = [
    ['nama' => 'Riza', 'golongan' => 'IIb', 'jamLembur' => 30],
    ['nama' => 'Firman', 'golongan' => 'IIIb', 'jamLembur' => 32],
    ['nama' => 'Bento', 'golongan' => 'IVc', 'jamLembur' => 30]
];

$gaji = new GajiKaryawan($dataAwal);

do {
    echo "\n========================\n";
    echo "MENU GAJI KARYAWAN\n";
    echo "========================\n";
    echo "1. Tampilkan Data\n";
    echo "2. Tambah Data\n";
    echo "3. Update Data\n";
    echo "4. Hapus Data\n";
    echo "5. Keluar\n";
    echo "Pilih menu: ";
    
    $menu = trim(fgets(STDIN));
    
    switch ($menu) {
        case 1:
            $gaji->tampilkanData();
            break;
            
        case 2:
            $gaji->tambahData();
            break;
            
        case 3:
            $gaji->updateData();
            break;
            
        case 4:
            $gaji->hapusData();
            break;
            
        case 5:
            echo "Program selesai.\n";
            break;
            
        default:
            echo "Menu tidak valid!\n";
    }
    
} while ($menu != 5);

?>