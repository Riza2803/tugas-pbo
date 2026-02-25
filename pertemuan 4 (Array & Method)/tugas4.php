<?php
    class DataMahasiswa {
        public $nama;
        public $kelas;
        public $matkul;
        public $nilai;
        public $statusKuis;

        public function statusKuis($nilai) {
            if ($nilai >= 70) {
                return "Lulus";
            } else {
                return "Tidak Lulus";
            }
        }
     
    }

    $nama = array ("Rizky", "Dian", "Agus", "Riza", "Firman");
    $kelas = array ("SI 1","SI 2","SI 3");
    $matkul = array ("Pemrograman Web", "Basis Data", "Pemrograman Berorientasi Objek", "Pemrograman Dasar");
    $nilai = array (100,95,90,85,80,75,70,65);
    $statusKuis = array ("Lulus", "Tidak Lulus");

    $dataMahasiswa = new DataMahasiswa();
    echo "<h2>Data Mahasiswa</h2>";
    echo "<hr>";
    echo "Nama : " . $dataMahasiswa->nama = $nama[1] . "<br>";
    echo "Kelas : " . $dataMahasiswa->kelas = $kelas[1] . "<br>";
    echo "Mata Kuliah : " . $dataMahasiswa->matkul = $matkul[1] . "<br>";
    echo "Nilai : " . $dataMahasiswa->nilai = $nilai[3] . "<br>";
    echo "Status Kuis : " . $dataMahasiswa->statusKuis = $dataMahasiswa->statusKuis($nilai[3]) . "<br>";
    echo "<hr>";

    echo "Nama : " . $dataMahasiswa->nama = $nama[0] . "<br>";
    echo "Kelas : " . $dataMahasiswa->kelas = $kelas[2] . "<br>";
    echo "Mata Kuliah : " . $dataMahasiswa->matkul = $matkul[0] . "<br>";
    echo "Nilai : " . $dataMahasiswa->nilai = $nilai[4] . "<br>";
    echo "Status Kuis : " . $dataMahasiswa->statusKuis = $dataMahasiswa->statusKuis($nilai[4]) . "<br>";
    echo "<hr>";

    echo "Nama : " . $dataMahasiswa->nama = $nama[2] . "<br>";
    echo "Kelas : " . $dataMahasiswa->kelas = $kelas[0] . "<br>";
    echo "Mata Kuliah : " . $dataMahasiswa->matkul = $matkul[3] . "<br>";
    echo "Nilai : " . $dataMahasiswa->nilai = $nilai[5] . "<br>";
    echo "Status Kuis : " . $dataMahasiswa->statusKuis = $dataMahasiswa->statusKuis($nilai[5]) . "<br>";
    echo "<hr>";

    echo "Nama : " . $dataMahasiswa->nama = $nama[3] . "<br>";
    echo "Kelas : " . $dataMahasiswa->kelas = $kelas[0] . "<br>";
    echo "Mata Kuliah : " . $dataMahasiswa->matkul = $matkul[2] . "<br>";
    echo "Nilai : " . $dataMahasiswa->nilai = $nilai[3] . "<br>";
    echo "Status Kuis : " . $dataMahasiswa->statusKuis = $dataMahasiswa->statusKuis($nilai[3]) . "<br>";
    echo "<hr>";

    echo "Nama : " . $dataMahasiswa->nama = $nama[4] . "<br>";
    echo "Kelas : " . $dataMahasiswa->kelas = $kelas[1] . "<br>";
    echo "Mata Kuliah : " . $dataMahasiswa->matkul = $matkul[1] . "<br>";
    echo "Nilai : " . $dataMahasiswa->nilai = $nilai[7] . "<br>";
    echo "Status Kuis : " . $dataMahasiswa->statusKuis = $dataMahasiswa->statusKuis($nilai[7]) . "<br>";
    echo "<hr>";

?>
