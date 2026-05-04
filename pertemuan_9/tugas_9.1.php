<?php
    class UangTabungan{ 
        protected $saldo; // 1. Properti saldo (hanya bisa diakses class ini dan turunannya)

        // 2. Konstruktor: inisialisasi saldo awal
        public function __construct($saldo_awal){
            $this->saldo = $saldo_awal;
        }

        // 3. Mengambil nilai saldo saat ini
        public function getSaldo(){
            return $this->saldo;
        }

        // 4. Menambah saldo jika jumlah > 0
        public function setor($jumlah){
            if ($jumlah > 0){
                $this->saldo += $jumlah;
                return true;
            }
            return false;
        }

        // 5. Mengurangi saldo jika jumlah > 0 dan tidak melebihi saldo
        public function tarik($jumlah){
            if ($jumlah > 0 && $jumlah <= $this->saldo){
                $this->saldo -= $jumlah;
                return true;
            }
            return false;
        }
    }

    // 6. Kelas Siswa_1 mewarisi UangTabungan tanpa perubahan perilaku
    class Siswa_1 extends UangTabungan{
        public function __construct($saldo_awal){
            parent::__construct($saldo_awal);
        }
    }

    // 7. Kelas Siswa_2 juga turunan UangTabungan
    class Siswa_2 extends UangTabungan{
        public function __construct($saldo_awal){
            parent::__construct($saldo_awal);
        }
    }

    // 8. Kelas Siswa_3 juga turunan UangTabungan
    class Siswa_3 extends UangTabungan{
        public function __construct($saldo_awal){
            parent::__construct($saldo_awal);
        }
    }

    // 9. Membuat array objek siswa dengan indeks 1,2,3 dan saldo awal berbeda
    $daftar_siswa = array(
        1 => new Siswa_1(100000),
        2 => new Siswa_2(150000),
        3 => new Siswa_3(200000),
    );

    // 10. Menampilkan saldo awal semua siswa
    echo "\n=== SALDO AWAL TABUNGAN SISWA ===\n";
    foreach ($daftar_siswa as $sis => $siswa) {
        echo "Siswa $sis : Rp " . number_format($siswa->getSaldo(), 0, ',', '.') . "\n";
    }
    echo "================================\n";

    $siswa_aktif = null;    // Objek siswa yang sedang dipilih
    $no_siswa_aktif = null; // Nomor indeks siswa aktif (1,2,3)

    // 11. Loop menu utama
    do {
        echo "\n==== MENU UTAMA TABUNGAN SISWA ====\n";
        echo "1. Pilih Siswa\n";
        echo "2. Keluar\n";
        echo "Pilih Menu: ";
        $menu_utama = trim(fgets(STDIN));

        switch ($menu_utama) {
            case '1':
                // 12. Submenu pilih siswa
                do {
                    echo "\n==== PILIH SISWA ====\n";
                    echo "1. Siswa 1\n";
                    echo "2. Siswa 2\n";
                    echo "3. Siswa 3\n";
                    echo "4. Kembali ke Menu Utama\n";
                    echo "Pilih (0-3): ";
                    $pilih_siswa = trim(fgets(STDIN));

                    // 13. Jika pilih 4, keluar dari loop pilih siswa
                    if ($pilih_siswa == '4') {
                        break;
                    }

                // 14. Validasi: hanya indeks 1,2,3 yang ada di daftar
                if (!isset($daftar_siswa[$pilih_siswa])){
                    echo "Pilihan tidak valid!\n";
                    continue;
                }

                // 15. Simpan data siswa yang aktif
                $no_siswa_aktif = $pilih_siswa;
                $siswa_aktif = $daftar_siswa[$pilih_siswa];

                // 16. Menu transaksi untuk siswa terpilih
                do {
                    // Tampilkan nomor siswa (perhatikan: ditampilkan sebagai $no_siswa_aktif+1)
                    echo "\n==== MENU TRANSAKSI SISWA " . ($no_siswa_aktif + 1) . " ====\n";
                    echo "1. Lihat Saldo\n";
                    echo "2. Setor Tunai\n";
                    echo "3. Tarik Tunai\n";
                    echo "0. Ganti Siswa\n";
                    echo "Pilih Menu: ";
                    $menu_siswa = trim(fgets(STDIN));

                    switch ($menu_siswa) {
                        case '1':
                            // 17. Menampilkan saldo dengan format ribuan
                            echo "Saldo saat ini ; Rp " . number_format($siswa_aktif->getSaldo(), 0, ',', '.') . "\n";
                            break;
                        case '2':
                            // 18. Memproses setor uang
                            echo "Masukkan jumlah setor: Rp ";
                            $jumlah_setor = trim(fgets(STDIN));
                            if ($siswa_aktif->setor($jumlah_setor)) {
                                echo "Setor berhasil! Saldo baru: Rp " . number_format($siswa_aktif->getSaldo(), 0, ',', '.') . "\n";
                            } else {
                                echo "Setor gagal! Pastikan jumlah yang dimasukkan valid.\n";
                            }
                            break;
                        case '3':
                            //  19. Memproses tarik uang
                            echo "Masukkan jumlah tarik: Rp ";
                            $jumlah_tarik = trim(fgets(STDIN));
                            if ($siswa_aktif->tarik($jumlah_tarik)) {
                                echo "Tarik berhasil! Saldo baru: Rp " . number_format($siswa_aktif->getSaldo(), 0, ',', '.') . "\n";
                            } else {
                                echo "Tarik gagal! Pastikan jumlah yang dimasukkan valid dan tidak melebihi saldo.\n";
                            }
                            break;
                        case '0':
                            // 20. Kembali ke menu pilih siswa
                            echo "Kembali ke menu pilih siswa...\n";
                            break;
                            default:
                                echo "Pilihan tidak valid!\n";
                        }
                    } while ($menu_siswa != '0'); // Ulangi transaksi selama bukan 0
                } while ($pilih_siswa != '0'); // Ulangi pilih siswa selama bukan 0 (meskipun tidak tercapai karena break di 4)
                break;

                case '2':
                    // Keluar dari aplikasi
                    echo "Terima kasih telah menggunakan aplikasi tabungan siswa!\n";
                    break;

                default:
                    echo "Pilihan tidak valid!\n";
                
                }
            }  while ($menu_utama != '2'); // Ulangi menu utama sampai pilih keluar
?>

// https://github.com/Riza2803