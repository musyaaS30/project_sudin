<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Selalu mulai session di awal
session_start();

// Cek apakah session 'user' ada atau tidak
// Jika tidak ada, artinya belum login, maka redirect ke halaman login
if (!isset($_SESSION['user'])) {
    header("Location: validasi.php");
    exit();
}

// Jika session ada, kita bisa gunakan datanya
// Untuk gampangnya, kita simpan data user ke dalam variabel
$user = $_SESSION['user'];

require_once __DIR__ . '/config/functions.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['button_kirim'])) {
        if(insertPMA() > 0) {
            echo "
                <script>
                    alert('Data Berhasil Ditambahkan!');
                    document.location.href = 'index.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data Gagal Ditambahkan!');
                    document.location.href = 'form_pma.php';
                </script>
            ";
        }

    }
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Evaluasi RIPS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 12px;
        }
        
        th, td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
            vertical-align: top;
        }
        
        th {
            background-color: #e8e8e8;
            font-weight: bold;
            text-align: center;
        }
        
        .header-row {
            background-color: #d0d0d0;
        }
        
        .no-column {
            width: 40px;
            text-align: center;
        }
        
        .description-column {
            width: 50%;
        }
        
        .score-columns {
            width: 60px;
            text-align: center;
        }
        
        .notes-column {
            width: 80px;
            text-align: center;
        }
        
        .sub-item {
            padding-left: 20px;
        }
        
        .main-item {
            font-weight: bold;
        }
        
        .total-row {
            background-color: #f0f0f0;
            font-weight: bold;
            text-align: center;
        }

        /* input {
            border: none;
            outline: none;
        } */
    </style>
</head>
<body>
    <form action="" method="post">
        <input type="hidden" name="id_table_lembaga" value="<?= htmlspecialchars($user['id']);?>"> 
        <div class="container">
            <table>
                <thead>
                    <tr class="header-row">
                        <th rowspan="2" class="no-column">NO</th>
                        <th rowspan="2" class="description-column">DESKRIPSI</th>
                        <th colspan="2">KELENGKAPAN</th>
                        <th colspan="2">SKOR</th>
                        <th rowspan="2" class="notes-column">KET</th>
                    </tr>
                    <tr class="header-row">
                        <th class="score-columns">Ada</th>
                        <th class="score-columns">Tidak</th>
                        <th class="score-columns">Rentang</th>
                        <th class="score-columns">Perolehan</th>
                    </tr>
                </thead>
                <tbody>
    
                    <!-- data tabel nomor 1 -->
                    <tr>
                        <td rowspan="8" class="no-column">1</td>
                        <td class="main-item">Surat Permohonan ijin Penyelenggaraan LKP dengan PMA;</td>
                        <td class="score-columns"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns">1-15</td>
                        <td class="score-columns"></td>
                        <td class="notes-column"></td>
                    </tr>
                    <tr>
                        <td class="sub-item">a. Fomulir Pendaftaran</td>
                        <td class="score-columns"><input type="radio" name="form_pendaftaran_kelengkapan" value="ada"></td>
                        <td class="score-columns"><input type="radio" name="form_pendaftaran_kelengkapan" value="tidak"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns"><input type="number" min="1" max="15" style="width: 50px;" name="form_pendaftaran_score"></td>
                        <td class="notes-column"><input type="text" style="width: 70px;" name="form_pendaftaran_keterangan"></td>
                    </tr>
                    <tr>
                        <td class="sub-item">c. Surat Kuasa/ Surat Tugas Pemohon dari Lembaga</td>
                        <td class="score-columns"><input type="radio" name="surat_tugas_kelengkapan" value="ada"></td>
                        <td class="score-columns"><input type="radio" name="surat_tugas_kelengkapan" value="tidak"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns"><input type="number" min="1" max="15" style="width: 50px;" name="surat_tugas_score"></td>
                        <td class="notes-column"><input type="text" style="width: 70px;" name="surat_tugas_keterangan"></td>
                    </tr>
                    <tr>
                        <td class="sub-item">d. KTP Pemohon</td>
                        <td class="score-columns"><input type="radio" name="ktp_pemohon_kelengkapan" value="ada"></td>
                        <td class="score-columns"><input type="radio" name="ktp_pemohon_kelengkapan" value="tidak"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns"><input type="number" min="1" max="15" style="width: 50px;" name="ktp_pemohon_score"></td>
                        <td class="notes-column"><input type="text" style="width: 70px;" name="ktp_pemohon_keterangan"></td>
                    </tr>
                    <tr>
                        <td class="sub-item">e. Surat Rekomendasi dari Dinas Pendidikan</td>
                        <td class="score-columns"><input type="radio" name="surat_rekomendasi_kelengkapan" value="ada"></td>
                        <td class="score-columns"><input type="radio" name="surat_rekomendasi_kelengkapan" value="tidak"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns"><input type="number" min="1" max="15" style="width: 50px;" name="surat_rekomendasi_score"></td>
                        <td class="notes-column"><input type="text" style="width: 70px;" name="surat_rekomendasi_keterangan"></td>
                    </tr>
                    <tr>
                        <td class="sub-item">f. Salinan SK Kemenhukam</td>
                        <td class="score-columns"><input type="radio" name="sk_kemenhumkam_kelengkapan" value="ada"></td>
                        <td class="score-columns"><input type="radio" name="sk_kemenhumkam_kelengkapan" value="tidak"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns"><input type="number" min="1" max="15" style="width: 50px;" name="sk_kemenhumkam_score"></td>
                        <td class="notes-column"><input type="text" style="width: 70px;" name="sk_kemenhumkam_keterangan"></td>
                    </tr>
                    <tr>
                        <td class="sub-item">g. Salinan Nomor Induk Berusaha (NIB)</td>
                        <td class="score-columns"><input type="radio" name="nomor_induk_berusaha_kelengkapan" value="ada"></td>
                        <td class="score-columns"><input type="radio" name="nomor_induk_berusaha_kelengkapan" value="tidak"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns"><input type="number" min="1" max="15" style="width: 50px;" name="nomor_induk_berusaha_score"></td>
                        <td class="notes-column"><input type="text" style="width: 70px;" name="nomor_induk_berusaha_keterangan"></td>
                    </tr>
                    <tr>
                        <td class="sub-item">h. Salinan Bukti Kepemilikan atas Tanah dan Bangunan</td>
                        <td class="score-columns"><input type="radio" name="kepemilikan_tanah_kelengkapan" value="ada"></td>
                        <td class="score-columns"><input type="radio" name="kepemilikan_tanah_kelengkapan" value="tidak"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns"><input type="number" min="1" max="15" style="width: 50px;" name="kepemilikan_tanah_score"></td>
                        <td class="notes-column"><input type="text" style="width: 70px;" name="kepemilikan_tanah_keterangan"></td>
                    </tr>
    
                    <!-- data tabel nomor 2 -->
                    <tr>
                        <td rowspan="5" class="no-column">2</td>
                        <td class="main-item">Rencana Induk Pengembangan Satuan pendidikan (RIPS) 3 Tahun Kedepan untuk isi pendidikan;</td>
                        <td class="score-columns"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns">1-15</td>
                        <td class="score-columns"></td>
                        <td class="notes-column"></td>
                    </tr>
                    <tr>
                        <td class="sub-item">a. Acuan Pengembangan Kurikulum (Asing/Dalam Negeri)</td>
                        <td class="score-columns"><input type="radio" name="acuan_kurikulum_kelengkapan" value="ada"></td>
                        <td class="score-columns"><input type="radio" name="acuan_kurikulum_kelengkapan" value="tidak"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns"><input type="number" min="1" max="15" style="width: 50px;" name="acuan_kurikulum_score"></td>
                        <td class="notes-column"><input type="text" style="width: 70px;" name="acuan_kurikulum_keterangan"></td>
                    </tr>
                    <tr>
                        <td class="sub-item">b. Kurikulum yang Ketersempurnaan, Capaian Pembelajaran, Materi dan Jumlah Jam Mapel</td>
                        <td class="score-columns"><input type="radio" name="kurikulum_kelengkapan" value="ada"></td>
                        <td class="score-columns"><input type="radio" name="kurikulum_kelengkapan" value="tidak"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns"><input type="number" min="1" max="15" style="width: 50px;" name="kurikulum_score"></td>
                        <td class="notes-column"><input type="text" style="width: 70px;" name="kurikulum_keterangan"></td>
                    </tr>
                    <tr>
                        <td class="sub-item">c. RPP, meliputi jumlah sesi per paket atau jenjang kopetensi, durasi per sesi, jadwal/kalender pendidikan</td>
                        <td class="score-columns"><input type="radio" name="rpp_kelengkapan" value="ada"></td>
                        <td class="score-columns"><input type="radio" name="rpp_kelengkapan" value="tidak"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns"><input type="number" min="1" max="15" style="width: 50px;" name="rpp_score"></td>
                        <td class="notes-column"><input type="text" style="width: 70px;" name="rpp_keterangan"></td>
                    </tr>
                    <tr>
                        <td class="sub-item">d. Pendekatan Pembelajaran (daring/luring)</td>
                        <td class="score-columns"><input type="radio" name="pendekatan_pembelajaran_kelengkapan" value="ada"></td>
                        <td class="score-columns"><input type="radio" name="pendekatan_pembelajaran_kelengkapan" value="tidak"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns"><input type="number" min="1" max="15" style="width: 50px;" name="pendekatan_pembelajaran_score"></td>
                        <td class="notes-column"><input type="text" style="width: 70px;" name="pendekatan_pembelajaran_keterangan"></td>
                    </tr>
    
                    <!-- data nomor 3 -->
                    <tr>
                        <td rowspan="6" class="no-column">3</td>
                        <td class="main-item">Rencana Induk Pengembangan Satuan Pendidikan (RIPS) 3 Tahun Kedepan untuk jumlah kualifikasi pendidik dan tenaga kependidikan;</td>
                        <td class="score-columns"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns">1-14</td>
                        <td class="score-columns"></td>
                        <td class="notes-column"></td>
                    </tr>
                    <tr>
                        <td class="sub-item">a. Nama (KTP/Paspor/KITAS/Foto)</td>
                        <td class="score-columns"><input type="radio" name="nama_kelengkapan" value="ada"></td>
                        <td class="score-columns"><input type="radio" name="nama_kelengkapan" value="tidak"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns"><input type="number" min="1" max="15" style="width: 50px;" name="nama_score"></td>
                        <td class="notes-column"><input type="text" style="width: 70px;" name="nama_keterangan"></td>
                    </tr>
                    <tr>
                        <td class="sub-item">b. Jabatan di Lembaga Kursus</td>
                        <td class="score-columns"><input type="radio" name="jabatan_kelengkapan" value="ada"></td>
                        <td class="score-columns"><input type="radio" name="jabatan_kelengkapan" value="tidak"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns"><input type="number" min="1" max="15" style="width: 50px;" name="jabatan_score"></td>
                        <td class="notes-column"><input type="text" style="width: 70px;" name="jabatan_keterangan"></td>
                    </tr>
                    <tr>
                        <td class="sub-item">c. Kualifikasi Akademik (Pendidikan Terakhir)</td>
                        <td class="score-columns"><input type="radio" name="kualifikasi_akademik_kelengkapan" value="ada"></td>
                        <td class="score-columns"><input type="radio" name="kualifikasi_akademik_kelengkapan" value="tidak"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns"><input type="number" min="1" max="15" style="width: 50px;" name="kualifikasi_akademik_score"></td>
                        <td class="notes-column"><input type="text" style="width: 70px;" name="kualifikasi_akademik_keterangan"></td>
                    </tr>
                    <tr>
                        <td class="sub-item">d. Sertifikat Kompetensi</td>
                        <td class="score-columns"><input type="radio" name="sertifikat_kelengkapan" value="ada"></td>
                        <td class="score-columns"><input type="radio" name="sertifikat_kelengkapan" value="tidak"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns"><input type="number" min="1" max="15" style="width: 50px;" name="sertifikat_score"></td>
                        <td class="notes-column"><input type="text" style="width: 70px;" name="sertifikat_keterangan"></td>
                    </tr>
                    <tr>
                        <td class="sub-item">e. Pengalaman Bekerja/Mengajar</td>
                        <td class="score-columns"><input type="radio" name="pengalaman_kerja_kelengkapan" value="ada"></td>
                        <td class="score-columns"><input type="radio" name="pengalaman_kerja_kelengkapan" value="tidak"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns"><input type="number" min="1" max="15" style="width: 50px;" name="pengalaman_kerja_score"></td>
                        <td class="notes-column"><input type="text" style="width: 70px;" name="pengalaman_kerja_keterangan"></td>
                    </tr>
    
                    <!-- data nomor 4 -->
                    <tr>
                        <td rowspan="6" class="no-column">4</td>
                        <td class="main-item">Rencana Induk Pengembangan Satuan Pendidikan (RIPS) 3 Tahun Kedepan untuk sarana dan prasarana pendidikan;</td>
                        <td class="score-columns"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns">1-14</td>
                        <td class="score-columns"></td>
                        <td class="notes-column"></td>
                    </tr>
                    <tr>
                        <td class="sub-item">a. Bangunan (jumlah, ukuran, kondisi dan foto)</td>
                        <td class="score-columns"><input type="radio" name="bangunan_kelengkapan" value="ada"></td>
                        <td class="score-columns"><input type="radio" name="bangunan_kelengkapan" value="tidak"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns"><input type="number" min="1" max="15" style="width: 50px;"  name="bangunan_score"></td>
                        <td class="notes-column"><input type="text" style="width: 70px;" name="bangunan_keterangan"></td>
                    </tr>
                    <tr>
                        <td class="sub-item">b. Ruangan (jumlah, ukuran, kondisi dan foto)</td>
                        <td class="score-columns"><input type="radio" name="ruangan_kelengkapan" value="ada"></td>
                        <td class="score-columns"><input type="radio" name="ruangan_kelengkapan" value="tidak"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns"><input type="number" min="1" max="15" style="width: 50px;" name="ruangan_score"></td>
                        <td class="notes-column"><input type="text" style="width: 70px;" name="ruangan_keterangan"></td>
                    </tr>
                    <tr>
                        <td class="sub-item">c. Alat (jumlah, ukuran, kondisi dan foto)</td>
                        <td class="score-columns"><input type="radio" name="alat_kelengkapan" value="ada"></td>
                        <td class="score-columns"><input type="radio" name="alat_kelengkapan" value="tidak"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns"><input type="number" min="1" max="15" style="width: 50px;" name="alat_score"></td>
                        <td class="notes-column"><input type="text" style="width: 70px;" name="alat_keterangan"></td>
                    </tr>
                    <tr>
                        <td class="sub-item">d. Bahan Ajar (jumlah, ukuran, kondisi dan foto)</td>
                        <td class="score-columns"><input type="radio" name="bahan_ajar_kelengkapan" value="ada"></td>
                        <td class="score-columns"><input type="radio" name="bahan_ajar_kelengkapan" value="tidak"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns"><input type="number" min="1" max="15" style="width: 50px;" name="bahan_ajar_score"></td>
                        <td class="notes-column"><input type="text" style="width: 70px;" name="bahan_ajar_keterangan"></td>
                    </tr>
                    <tr>
                        <td class="sub-item">e. Status Kepemilikan gedung/lahan kewirausahaan</td>
                        <td class="score-columns"><input type="radio" name="kepemilikan_gedung_kelengkapan" value="ada"></td>
                        <td class="score-columns"><input type="radio" name="kepemilikan_gedung_kelengkapan" value="tidak"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns"><input type="number" min="1" max="15" style="width: 50px;" name="kepemilikan_gedung_score"></td>
                        <td class="notes-column"><input type="text" style="width: 70px;" name="kepemilikan_gedung_keterangan"></td>
                    </tr>
    
                    <!-- data nomor 5 -->
                    <tr>
                        <td rowspan="3" class="no-column">5</td>
                        <td class="main-item">Rencana Induk Pengembangan Satuan Pendidikan (RIPS) 3 Tahun Kedepan untuk pembiayaan pendidikan;</td>
                        <td class="score-columns"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns">1-14</td>
                        <td class="score-columns"></td>
                        <td class="notes-column"></td>
                    </tr>
                    <tr>
                        <td class="sub-item">a. rancangan pembiayaan (seperti pembiayaan untuk proses pembelajaran, peningkatan kompetensi/kualifikasi PTK, pengembangan kurikulum, peningkatan sarana dan prasarana)</td>
                        <td class="score-columns"><input type="radio" name="rancangan_pembiayaan_kelengkapan" value="ada"></td>
                        <td class="score-columns"><input type="radio" name="rancangan_pembiayaan_kelengkapan" value="tidak"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns"><input type="number" min="1" max="15" style="width: 50px;" name="rancangan_pembiayaan_score"></td>
                        <td class="notes-column"><input type="text" style="width: 70px;" name="rancangan_pembiayaan_keterangan"></td>
                    </tr>
                    <tr>
                        <td class="sub-item">b. sumber pembiayaan (modal asing/sumbdk dari pemasukan lain)</td>
                        <td class="score-columns"><input type="radio" name="sumber_pembiayaan_kelengkapan" value="ada"></td>
                        <td class="score-columns"><input type="radio" name="sumber_pembiayaan_kelengkapan" value="tidak"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns"><input type="number" min="1" max="15" style="width: 50px;" name="sumber_pembiayaan_score"></td>
                        <td class="notes-column"><input type="text" style="width: 70px;" name="sumber_pembiayaan_keterangan"></td>
                    </tr>
    
                    <!-- data nomor 6 -->
                    <tr>
                        <td rowspan="4" class="no-column">6</td>
                        <td class="main-item">Rencana Induk Pengembangan Satuan Pendidikan (RIPS) 3 Tahun Kedepan untuk sistem evaluasi dan sertifikasi;</td>
                        <td class="score-columns"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns">1-14</td>
                        <td class="score-columns"></td>
                        <td class="notes-column"></td>
                    </tr>
                    <tr>
                        <td class="sub-item">a. sistem sertifikasi kompetensi (lembaga sertifikasi/mandiri)</td>
                        <td class="score-columns"><input type="radio" name="sistem_sertifikasi_kelengkapan" value="ada"></td>
                        <td class="score-columns"><input type="radio" name="sistem_sertifikasi_kelengkapan" value="tidak"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns"><input type="number" min="1" max="15" style="width: 50px;" name="sistem_sertifikasi_score"></td>
                        <td class="notes-column"><input type="text" style="width: 70px;" name="sistem_sertifikasi_keterangan"></td>
                    </tr>
                    <tr>
                        <td class="sub-item">b. orientasi pengakuan sertifikat kompetensi (nasional/internasional)</td>
                        <td class="score-columns"><input type="radio" name="orientasi_sertifikasi_kelengkapan" value="ada"></td>
                        <td class="score-columns"><input type="radio" name="orientasi_sertifikasi_kelengkapan" value="tidak"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns"><input type="number" min="1" max="15" style="width: 50px;" name="orientasi_sertifikasi_score"></td>
                        <td class="notes-column"><input type="text" style="width: 70px;" name="orientasi_sertifikasi_keterangan"></td>
                    </tr>
                    <tr>
                        <td class="sub-item">c. pengembangan sistem evaluasi (mandiri/bersama mitra/mengadopsi sistem evaluasi asing)</td>
                        <td class="score-columns"><input type="radio" name="pengembangan_evaluasi_kelengkapan" value="ada"></td>
                        <td class="score-columns"><input type="radio" name="pengembangan_evaluasi_kelengkapan" value="tidak"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns"><input type="number" min="1" max="15" style="width: 50px;" name="pengembangan_evaluasi_score"></td>
                        <td class="notes-column"><input type="text" style="width: 70px;" name="pengembangan_evaluasi_keterangan"></td>
                    </tr>
    
                    <!-- data nomor 7 -->
                    <tr>
                        <td rowspan="6" class="no-column">7</td>
                        <td class="main-item">Rencana Induk Pengembangan Satuan Pendidikan (RIPS) 3 Tahun Kedepan untuk manajemen dan proses pendidikan</td>
                        <td class="score-columns"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns">1-14</td>
                        <td class="score-columns"></td>
                        <td class="notes-column"></td>
                    </tr>
                    <tr>
                        <td class="sub-item">a. Struktur Organisasi</td>
                        <td class="score-columns"><input type="radio" name="struktur_organisasi_kelengkapan" value="ada"></td>
                        <td class="score-columns"><input type="radio" name="struktur_organisasi_kelengkapan" value="tidak"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns"><input type="number" min="1" max="15" style="width: 50px;" name="struktur_organisasi_score"></td>
                        <td class="notes-column"><input type="text" style="width: 70px;" name="struktur_organisasi_keterangan"></td>
                    </tr>
                    <tr>
                        <td class="sub-item">b. SOP</td>
                        <td class="score-columns"><input type="radio" name="sop_kelengkapan" value="ada"></td>
                        <td class="score-columns"><input type="radio" name="sop_kelengkapan" value="tidak"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns"><input type="number" min="1" max="15" style="width: 50px;" name="sop_score"></td>
                        <td class="notes-column"><input type="text" style="width: 70px;" name="sop_keterangan"></td>
                    </tr>
                    <tr>
                        <td class="sub-item">c. Rekrutmen peserta didik, tenaga pendidik, dan tenaga kependidikan</td>
                        <td class="score-columns"><input type="radio" name="peserta_didik_kelengkapan" value="ada"></td>
                        <td class="score-columns"><input type="radio" name="peserta_didik_kelengkapan" value="tidak"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns"><input type="number" min="1" max="15" style="width: 50px;" name="peserta_didik_score"></td>
                        <td class="notes-column"><input type="text" style="width: 70px;" name="peserta_didik_keterangan"></td>
                    </tr>
                    <tr>
                        <td class="sub-item">d. Kalender pembelajaran tiap program</td>
                        <td class="score-columns"><input type="radio" name="kalender_pembelajaran_kelengkapan" value="ada"></td>
                        <td class="score-columns"><input type="radio" name="kalender_pembelajaran_kelengkapan" value="tidak"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns"><input type="number" min="1" max="15" style="width: 50px;" name="kalender_pembelajaran_score"></td>
                        <td class="notes-column"><input type="text" style="width: 70px;" name="kalender_pembelajaran_keterangan"></td>
                    </tr>
                    <tr>
                        <td class="sub-item">e. Jadwal penggunaan ruangan</td>
                        <td class="score-columns"><input type="radio" name="jadwal_ruangan_kelengkapan" value="ada"></td>
                        <td class="score-columns"><input type="radio" name="jadwal_ruangan_kelengkapan" value="tidak"></td>
                        <td class="score-columns"></td>
                        <td class="score-columns"><input type="number" min="1" max="15" style="width: 50px;" name="jadwal_ruangan_score"></td>
                        <td class="notes-column"><input type="text" style="width: 70px;" name="jadwal_ruangan_keterangan"></td>
                    </tr>
    
                    <tr class="total-row">
                        <td></td>
                        <td style="text-align: center;">JUMLAH ANGKA PEROLEHAN</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <button type="submit" name="button_kirim">Kirim data</button>
    </form>
</body>
</html>