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
        insertNonPMA();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Non PMA</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-blue-100 min-h-screen py-8">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="bg-white rounded-lg shadow-xl p-8">
            <h1 class="text-3xl font-bold text-blue-800 mb-8 text-center">Form Pendaftaran Lembaga Non PMA</h1>
            
            <form action="" method="POST" class="space-y-8">
                <!-- Ganti input 'number' menjadi 'hidden' agar tidak terlihat oleh user -->
                <input type="hidden" name="id_table_lembaga" value="<?= htmlspecialchars($user['id']);?>">                <!-- Data Lembaga -->
                <div class="bg-blue-50 p-6 rounded-lg">
                    <h2 class="text-xl font-semibold text-blue-800 mb-4">Data Lembaga</h2>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="input-bar">
                            <label for="no_akte" class="block text-sm font-medium text-blue-700 mb-2">No Akte</label>
                            <input type="text" name="no_akte" id="no_akte" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div class="input-bar">
                            <label for="jenis_kegiatan" class="block text-sm font-medium text-blue-700 mb-2">Jenis Kegiatan</label>
                            <input type="text" name="jenis_kegiatan" id="jenis_kegiatan" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div class="input-bar md:col-span-2">
                            <label for="kota_administrasi" class="block text-sm font-medium text-blue-700 mb-2">Kota Administrasi</label>
                            <input type="text" name="kota_administrasi" id="kota_administrasi" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                    </div>
                </div>

                <!-- Data Pimpinan Lembaga -->
                <div class="bg-blue-50 p-6 rounded-lg">
                    <h2 class="text-xl font-semibold text-blue-800 mb-4">Data Pimpinan Lembaga</h2>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="input-bar">
                            <label for="nama_pimpinan" class="block text-sm font-medium text-blue-700 mb-2">Nama Pimpinan</label>
                            <input type="text" name="nama_pimpinan" id="nama_pimpinan" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div class="input-bar">
                            <label for="ijazah" class="block text-sm font-medium text-blue-700 mb-2">Ijazah</label>
                            <input type="text" name="ijazah" id="ijazah" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div class="input-bar">
                            <label for="asal_pt" class="block text-sm font-medium text-blue-700 mb-2">Asal PT</label>
                            <input type="text" name="asal_pt" id="asal_pt" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div class="input-bar">
                            <label for="pimpinan_jurusan" class="block text-sm font-medium text-blue-700 mb-2">Jurusan</label>
                            <input type="text" name="pimpinan_jurusan" id="pimpinan_jurusan" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div class="input-bar">
                            <label for="pimpinan_lembaga_sk" class="block text-sm font-medium text-blue-700 mb-2">Lembaga SK</label>
                            <input type="text" name="pimpinan_lembaga_sk" id="pimpinan_lembaga_sk" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div class="input-bar">
                            <label for="pimpinan_sk_nomor" class="block text-sm font-medium text-blue-700 mb-2">Nomor SK</label>
                            <input type="text" name="pimpinan_sk_nomor" id="pimpinan_sk_nomor" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div class="input-bar">
                            <label for="pimpinan_sk_tanggal" class="block text-sm font-medium text-blue-700 mb-2">Tanggal SK</label>
                            <input type="date" name="pimpinan_sk_tanggal" id="pimpinan_sk_tanggal" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div class="input-bar">
                            <label for="pimpinan_pengalaman" class="block text-sm font-medium text-blue-700 mb-2">Pengalaman</label>
                            <input type="text" name="pimpinan_pengalaman" id="pimpinan_pengalaman" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                    </div>
                </div>

                <!-- Data Pendidik WNI -->
                <div class="bg-blue-50 p-6 rounded-lg">
                    <h2 class="text-xl font-semibold text-blue-800 mb-4">Data Pendidik WNI</h2>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="input-bar">
                            <label for="pendidik_wni_laki" class="block text-sm font-medium text-blue-700 mb-2">Pendidik WNI Laki-laki</label>
                            <input type="number" name="pendidik_wni_laki" id="pendidik_wni_laki" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" min="0" value="0" required>
                        </div>
                        <div class="input-bar">
                            <label for="pendidik_wni_perempuan" class="block text-sm font-medium text-blue-700 mb-2">Pendidik WNI Perempuan</label>
                            <input type="number" name="pendidik_wni_perempuan" id="pendidik_wni_perempuan" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" min="0" value="0" required>
                        </div>
                        <div class="input-bar">
                            <label for="pendidik_wni_pendidikan_terakhir" class="block text-sm font-medium text-blue-700 mb-2">Pendidikan Terakhir WNI</label>
                            <input type="text" name="pendidik_wni_pendidikan_terakhir" id="pendidik_wni_pendidikan_terakhir" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div class="input-bar">
                            <label for="pendidik_wni_sertifikat" class="block text-sm font-medium text-blue-700 mb-2">Sertifikat WNI</label>
                            <input type="text" name="pendidik_wni_sertifikat" id="pendidik_wni_sertifikat" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                    </div>
                </div>

                <!-- Data Pendidik WNA -->
                <div class="bg-blue-50 p-6 rounded-lg">
                    <h2 class="text-xl font-semibold text-blue-800 mb-4">Data Pendidik WNA</h2>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="input-bar">
                            <label for="pendidik_wna_izin_kerja" class="block text-sm font-medium text-blue-700 mb-2">Sertifikasi Pendidikan</label>
                            <select name="pendidik_wna_izin_kerja" id="pendidik_wna_izin_kerja" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option disabled selected value="">Pilih Status</option>
                                <option value="ada">Ada</option>
                                <option value="tidak ada">Tidak Ada</option>
                            </select>
                        </div>
                        <div class="input-bar">
                            <label for="pendidik_wna_laki" class="block text-sm font-medium text-blue-700 mb-2">Pendidik WNA Laki-laki</label>
                            <input type="number" name="pendidik_wna_laki" id="pendidik_wna_laki" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" min="0" value="0">
                        </div>
                        <div class="input-bar">
                            <label for="pendidik_wna_perempuan" class="block text-sm font-medium text-blue-700 mb-2">Pendidik WNA Perempuan</label>
                            <input type="number" name="pendidik_wna_perempuan" id="pendidik_wna_perempuan" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" min="0" value="0">
                        </div>
                        <div class="input-bar">
                            <label for="pendidik_wna_pendidikan_terakhir" class="block text-sm font-medium text-blue-700 mb-2">Pendidikan Terakhir WNA</label>
                            <input type="text" name="pendidik_wna_pendidikan_terakhir" id="pendidik_wna_pendidikan_terakhir" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="input-bar">
                            <label for="pendidik_wna_sertifikat" class="block text-sm font-medium text-blue-700 mb-2">Sertifikat WNA</label>
                            <input type="text" name="pendidik_wna_sertifikat" id="pendidik_wna_sertifikat" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                </div>

                <!-- Data Pendidik Umum -->
                <div class="bg-blue-50 p-6 rounded-lg">
                    <h2 class="text-xl font-semibold text-blue-800 mb-4">Data Pendidik Umum</h2>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="input-bar">
                            <label for="jumlah_pendidik" class="block text-sm font-medium text-blue-700 mb-2">Jumlah Pendidik</label>
                            <input type="number" name="jumlah_pendidik" id="jumlah_pendidik" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" min="0" value="0" required>
                        </div>
                        <div class="input-bar">
                            <label for="pendidikan_terakhir_pendidik" class="block text-sm font-medium text-blue-700 mb-2">Pendidikan Terakhir Pendidik</label>
                            <input type="text" name="pendidikan_terakhir_pendidik" id="pendidikan_terakhir_pendidik" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                    </div>
                </div>

                <!-- Penghasilan Pendidik -->
                <div class="bg-blue-50 p-6 rounded-lg">
                    <h2 class="text-xl font-semibold text-blue-800 mb-4">Penghasilan Pendidik</h2>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="input-bar">
                            <label for="gaji_pendidik_wni_min" class="block text-sm font-medium text-blue-700 mb-2">Gaji Pendidik WNI Min (Rp)</label>
                            <input type="number" name="gaji_pendidik_wni_min" id="gaji_pendidik_wni_min" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" min="0" step="1000" value="0" required>
                        </div>
                        <div class="input-bar">
                            <label for="gaji_pendidik_wni_max" class="block text-sm font-medium text-blue-700 mb-2">Gaji Pendidik WNI Max (Rp)</label>
                            <input type="number" name="gaji_pendidik_wni_max" id="gaji_pendidik_wni_max" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" min="0" step="1000" value="0" required>
                        </div>
                        <div class="input-bar">
                            <label for="gaji_pendidik_wna_min" class="block text-sm font-medium text-blue-700 mb-2">Gaji Pendidik WNA Min (Rp)</label>
                            <input type="number" name="gaji_pendidik_wna_min" id="gaji_pendidik_wna_min" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" min="0" step="1000" value="0">
                        </div>
                        <div class="input-bar">
                            <label for="gaji_pendidik_wna_max" class="block text-sm font-medium text-blue-700 mb-2">Gaji Pendidik WNA Max (Rp)</label>
                            <input type="number" name="gaji_pendidik_wna_max" id="gaji_pendidik_wna_max" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" min="0" step="1000" value="0">
                        </div>
                    </div>
                </div>

                <!-- Data Administrasi -->
                <div class="bg-blue-50 p-6 rounded-lg">
                    <h2 class="text-xl font-semibold text-blue-800 mb-4">Data Administrasi</h2>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="input-bar">
                            <label for="sop_administrasi" class="block text-sm font-medium text-blue-700 mb-2">SOP Administrasi</label>
                            <select name="sop_administrasi" id="sop_administrasi" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option disabled selected value="">Pilih Status</option>
                                <option value="Ada">Ada</option>
                                <option value="Tidak Ada">Tidak Ada</option>
                            </select>
                        </div>
                        <div class="input-bar">
                            <label for="buku_hadir_pendidik" class="block text-sm font-medium text-blue-700 mb-2">Buku Hadir Pendidik</label>
                            <select name="buku_hadir_pendidik" id="buku_hadir_pendidik" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option disabled selected value="">Pilih Status</option>
                                <option value="Ada">Ada</option>
                                <option value="Tidak Ada">Tidak Ada</option>
                            </select>
                        </div>
                        <div class="input-bar">
                            <label for="buku_hadir_siswa" class="block text-sm font-medium text-blue-700 mb-2">Buku Hadir Siswa</label>
                            <select name="buku_hadir_siswa" id="buku_hadir_siswa" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option disabled selected value="">Pilih Status</option>
                                <option value="Ada">Ada</option>
                                <option value="Tidak Ada">Tidak Ada</option>
                            </select>
                        </div>
                        <div class="input-bar">
                            <label for="buku_daftar_inventaris" class="block text-sm font-medium text-blue-700 mb-2">Buku Daftar Inventaris</label>
                            <select name="buku_daftar_inventaris" id="buku_daftar_inventaris" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option disabled selected value="">Pilih Status</option>
                                <option value="Ada">Ada</option>
                                <option value="Tidak Ada">Tidak Ada</option>
                            </select>
                        </div>
                        <div class="input-bar">
                            <label for="program_kerja_yayasan" class="block text-sm font-medium text-blue-700 mb-2">Program Kerja Yayasan</label>
                            <select name="program_kerja_yayasan" id="program_kerja_yayasan" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option disabled selected value="">Pilih Status</option>
                                <option value="Ada">Ada</option>
                                <option value="Tidak Ada">Tidak Ada</option>
                            </select>
                        </div>
                        <div class="input-bar">
                            <label for="program_kerja_pimpinan" class="block text-sm font-medium text-blue-700 mb-2">Program Kerja Pimpinan</label>
                            <select name="program_kerja_pimpinan" id="program_kerja_pimpinan" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option disabled selected value="">Pilih Status</option>
                                <option value="Ada">Ada</option>
                                <option value="Tidak Ada">Tidak Ada</option>
                            </select>
                        </div>
                        <div class="input-bar">
                            <label for="kalender_pendidikan" class="block text-sm font-medium text-blue-700 mb-2">Kalender Pendidikan</label>
                            <select name="kalender_pendidikan" id="kalender_pendidikan" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option disabled selected value="">Pilih Status</option>
                                <option value="Ada">Ada</option>
                                <option value="Tidak Ada">Tidak Ada</option>
                            </select>
                        </div>
                        <div class="input-bar">
                            <label for="buku_tamu" class="block text-sm font-medium text-blue-700 mb-2">Buku Tamu</label>
                            <select name="buku_tamu" id="buku_tamu" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option disabled selected value="">Pilih Status</option>
                                <option value="Ada">Ada</option>
                                <option value="Tidak Ada">Tidak Ada</option>
                            </select>
                        </div>
                        <div class="input-bar">
                            <label for="buku_induk_pendidik" class="block text-sm font-medium text-blue-700 mb-2">Buku Induk Pendidik</label>
                            <select name="buku_induk_pendidik" id="buku_induk_pendidik" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option disabled selected value="">Pilih Status</option>
                                <option value="Ada">Ada</option>
                                <option value="Tidak Ada">Tidak Ada</option>
                            </select>
                        </div>
                        <div class="input-bar">
                            <label for="buku_hasil_belajar" class="block text-sm font-medium text-blue-700 mb-2">Buku Hasil Belajar</label>
                            <select name="buku_hasil_belajar" id="buku_hasil_belajar" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option disabled selected value="">Pilih Status</option>
                                <option value="Ada">Ada</option>
                                <option value="Tidak Ada">Tidak Ada</option>
                            </select>
                        </div>
                        <div class="input-bar">
                            <label for="jadwal_pelajaran" class="block text-sm font-medium text-blue-700 mb-2">Jadwal Pelajaran</label>
                            <select name="jadwal_pelajaran" id="jadwal_pelajaran" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option disabled selected value="">Pilih Status</option>
                                <option value="Ada">Ada</option>
                                <option value="Tidak Ada">Tidak Ada</option>
                            </select>
                        </div>
                        <div class="input-bar">
                            <label for="tata_tertib" class="block text-sm font-medium text-blue-700 mb-2">Tata Tertib</label>
                            <select name="tata_tertib" id="tata_tertib" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option disabled selected value="">Pilih Status</option>
                                <option value="Ada">Ada</option>
                                <option value="Tidak Ada">Tidak Ada</option>
                            </select>
                        </div>
                        <div class="input-bar">
                            <label for="sertifikasi_pendidikan" class="block text-sm font-medium text-blue-700 mb-2">Sertifikasi Pendidikan</label>
                            <select name="sertifikasi_pendidikan" id="sertifikasi_pendidikan" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option disabled selected value="">Pilih Status</option>
                                <option value="Ada">Ada</option>
                                <option value="Tidak Ada">Tidak Ada</option>
                            </select>
                        </div>
                        <div class="input-bar">
                            <label for="struktur_organisasi" class="block text-sm font-medium text-blue-700 mb-2">Struktur Organisasi</label>
                            <select name="struktur_organisasi" id="struktur_organisasi" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option disabled selected value="">Pilih Status</option>
                                <option value="Ada">Ada</option>
                                <option value="Tidak Ada">Tidak Ada</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Data Dokumen -->
                <div class="bg-blue-50 p-6 rounded-lg">
                    <h2 class="text-xl font-semibold text-blue-800 mb-4">Data Dokumen</h2>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="input-bar">
                            <label for="dokumen_kurikulum" class="block text-sm font-medium text-blue-700 mb-2">Dokumen Kurikulum</label>
                            <select name="dokumen_kurikulum" id="dokumen_kurikulum" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option disabled selected value="">Pilih Status</option>
                                <option value="Ada lengkap">Ada lengkap</option>
                                <option value="Ada tidak lengkap">Ada tidak lengkap</option>
                                <option value="Tidak ada">Tidak ada</option>
                            </select>
                        </div>
                        <div class="input-bar">
                            <label for="dokumen_pengembangan" class="block text-sm font-medium text-blue-700 mb-2">Dokumen Pengembangan</label>
                            <select name="dokumen_pengembangan" id="dokumen_pengembangan" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option disabled selected value="">Pilih Status</option>
                                <option value="Ada lengkap">Ada lengkap</option>
                                <option value="Ada tidak lengkap">Ada tidak lengkap</option>
                                <option value="Tidak ada">Tidak ada</option>
                            </select>
                        </div>
                        <div class="input-bar md:col-span-2">
                            <label for="dokumen_kerja_tahunan" class="block text-sm font-medium text-blue-700 mb-2">Dokumen Kerja Tahunan</label>
                            <select name="dokumen_kerja_tahunan" id="dokumen_kerja_tahunan" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option disabled selected value="">Pilih Status</option>
                                <option value="Ada lengkap">Ada lengkap</option>
                                <option value="Ada tidak lengkap">Ada tidak lengkap</option>
                                <option value="Tidak ada">Tidak ada</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Sarana Prasarana -->
                <div class="bg-blue-50 p-6 rounded-lg">
                    <h2 class="text-xl font-semibold text-blue-800 mb-4">Sarana Prasarana</h2>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="input-bar">
                            <label for="luas_tanah" class="block text-sm font-medium text-blue-700 mb-2">Luas Tanah (m²)</label>
                            <input type="number" name="luas_tanah" id="luas_tanah" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" min="0" step="0.01" value="0" required>
                        </div>
                        <div class="input-bar">
                            <label for="status_tanah" class="block text-sm font-medium text-blue-700 mb-2">Status Tanah</label>
                            <select name="status_tanah" id="status_tanah" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option disabled selected value="">Pilih Status</option>
                                <option value="Milik Sendiri">Milik Sendiri</option>
                                <option value="Sewa">Sewa</option>
                                <option value="Hibah">Hibah</option>
                                <option value="Pinjam">Pinjam</option>
                            </select>
                        </div>
                        <div class="input-bar">
                            <label for="peruntukan_tanah" class="block text-sm font-medium text-blue-700 mb-2">Peruntukan Tanah</label>
                            <input type="text" name="peruntukan_tanah" id="peruntukan_tanah" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div class="input-bar">
                            <label for="jumlah_ruang_belajar" class="block text-sm font-medium text-blue-700 mb-2">Jumlah Ruang Belajar</label>
                            <input type="number" name="jumlah_ruang_belajar" id="jumlah_ruang_belajar" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" min="0" value="0" required>
                        </div>
                        <div class="input-bar">
                            <label for="ukuran_ruang_belajar" class="block text-sm font-medium text-blue-700 mb-2">Ukuran Ruang Belajar (m²)</label>
                            <input type="text" name="ukuran_ruang_belajar" id="ukuran_ruang_belajar" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div class="input-bar">
                            <label for="kondisi_gedung" class="block text-sm font-medium text-blue-700 mb-2">Kondisi Gedung</label>
                            <select name="kondisi_gedung" id="kondisi_gedung" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option disabled selected value="">Pilih Kondisi</option>
                                <option value="Baik">Baik</option>
                                <option value="Cukup">Cukup</option>
                                <option value="Kurang">Kurang</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                        <div class="input-bar">
                            <label for="status_gedung" class="block text-sm font-medium text-blue-700 mb-2">Status Gedung</label>
                            <select name="status_gedung" id="status_gedung" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option disabled selected value="">Pilih Status</option>
                                <option value="Milik Sendiri">Milik Sendiri</option>
                                <option value="Sewa">Sewa</option>
                                <option value="Hibah">Hibah</option>
                                <option value="Pinjam">Pinjam</option>
                            </select>
                        </div>
                        <div class="input-bar">
                            <label for="peruntukan_gedung" class="block text-sm font-medium text-blue-700 mb-2">Peruntukan Gedung</label>
                            <input type="text" name="peruntukan_gedung" id="peruntukan_gedung" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div class="input-bar">
                            <label for="jumlah_kamarkecil" class="block text-sm font-medium text-blue-700 mb-2">Jumlah Kamar Kecil</label>
                            <input type="number" name="jumlah_kamar_mandi" id="jumlah_kamarkecil" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" min="0" value="0" required>
                        </div>
                        <div class="input-bar">
                            <label for="perawatan_kamarkecil" class="block text-sm font-medium text-blue-700 mb-2">Perawatan Kamar Kecil</label>
                            <select name="perawatan_kamarkecil" id="perawatan_kamarkecil" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option disabled selected value="">Pilih Kondisi</option>
                                <option value="Baik">Baik</option>
                                <option value="Cukup">Cukup</option>
                                <option value="Kurang">Kurang</option>
                            </select>
                        </div>
                        <div class="input-bar">
                            <label for="persediaan_air_bersih" class="block text-sm font-medium text-blue-700 mb-2">Persediaan Air Bersih</label>
                            <select name="persediaan_air_bersih" id="persediaan_air_bersih" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option disabled selected value="">Pilih Status</option>
                                <option value="Cukup">Cukup</option>
                                <option value="Kurang">Kurang</option>
                                <option value="Tidak Ada">Tidak Ada</option>
                            </select>
                        </div>
                        <div class="input-bar">
                            <label for="ruang_pimpinan" class="block text-sm font-medium text-blue-700 mb-2">Ruang Pimpinan</label>
                            <select name="ruang_pimpinan" id="ruang_pimpinan" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option disabled selected value="">Pilih Status</option>
                                <option value="Ada">Ada</option>
                                <option value="Tidak Ada">Tidak Ada</option>
                            </select>
                        </div>
                        <div class="input-bar">
                            <label for="ruang_tu" class="block text-sm font-medium text-blue-700 mb-2">Ruang TU</label>
                            <select name="ruang_tu" id="ruang_tu" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option disabled selected value="">Pilih Status</option>
                                <option value="Ada">Ada</option>
                                <option value="Tidak Ada">Tidak Ada</option>
                            </select>
                        </div>
                        <div class="input-bar">
                            <label for="ruang_perpustakaan" class="block text-sm font-medium text-blue-700 mb-2">Ruang Perpustakaan</label>
                            <select name="ruang_perpustakaan" id="ruang_perpustakaan" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option disabled selected value="">Pilih Status</option>
                                <option value="Ada">Ada</option>
                                <option value="Tidak Ada">Tidak Ada</option>
                            </select>
                        </div>
                        <div class="input-bar">
                            <label for="ruang_laboratorium" class="block text-sm font-medium text-blue-700 mb-2">Ruang Laboratorium</label>
                            <select name="ruang_laboratorium" id="ruang_laboratorium" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option disabled selected value="">Pilih Status</option>
                                <option value="Ada">Ada</option>
                                <option value="Tidak Ada">Tidak Ada</option>
                            </select>
                        </div>
                        <div class="input-bar">
                            <label for="perabotan_laboratorium" class="block text-sm font-medium text-blue-700 mb-2">Perabotan Laboratorium</label>
                            <select name="perabotan_laboratorium" id="perabotan_laboratorium" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option disabled selected value="">Pilih Kondisi</option>
                                <option value="Lengkap">Lengkap</option>
                                <option value="Cukup">Cukup</option>
                                <option value="Kurang">Kurang</option>
                                <option value="Tidak Ada">Tidak Ada</option>
                            </select>
                        </div>
                        <div class="input-bar">
                            <label for="kondisi_ruang_kelas" class="block text-sm font-medium text-blue-700 mb-2">Kondisi Ruang Kelas</label>
                            <select name="kondisi_ruang_kelas" id="kondisi_ruang_kelas" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option disabled selected value="">Pilih Kondisi</option>
                                <option value="Baik">Baik</option>
                                <option value="Cukup">Cukup</option>
                                <option value="Kurang">Kurang</option>
                            </select>
                        </div>
                        <div class="input-bar">
                            <label for="meja_kursi" class="block text-sm font-medium text-blue-700 mb-2">Meja Kursi</label>
                            <select name="meja_kursi" id="meja_kursi" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option disabled selected value="">Pilih Kondisi</option>
                                <option value="Ada">ada</option>
                                <option value="Tidak Ada">Tidak ada</option>
                                <option value="Cukup">Cukup</option>
                                <option value="Kurang">Kurang</option>
                            </select>
                        </div>
                        <div class="input-bar">
                            <label for="papan_tulis" class="block text-sm font-medium text-blue-700 mb-2">Papan Tulis</label>
                            <select name="papan_tulis" id="papan_tulis" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option disabled selected value="">Pilih Kondisi</option>
                                <option value="Ada">Ada</option>
                                <option value="Tidak Ada">Tidak Ada</option>
                            </select>
                        </div>
                        <div class="input-bar">
                            <label for="gudang" class="block text-sm font-medium text-blue-700 mb-2">Gudang</label>
                            <select name="gudang" id="gudang" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option disabled selected value="">Pilih Status</option>
                                <option value="Ada">Ada</option>
                                <option value="Tidak Ada">Tidak Ada</option>
                            </select>
                        </div>
                        <div class="input-bar">
                            <label for="alat_kebersihan" class="block text-sm font-medium text-blue-700 mb-2">Alat Kebersihan</label>
                            <select name="alat_kebersihan" id="alat_kebersihan" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option disabled selected value="">Pilih Kondisi</option>
                                <option value="Lengkap">Lengkap</option>
                                <option value="Cukup">Cukup</option>
                                <option value="Kurang">Kurang</option>
                                <option value="Tidak Ada">Tidak Ada</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Peserta Didik -->
                <div class="bg-blue-50 p-6 rounded-lg">
                    <h2 class="text-xl font-semibold text-blue-800 mb-4">Peserta Didik</h2>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="input-bar">
                            <label for="nama_program" class="block text-sm font-medium text-blue-700 mb-2">Nama Program</label>
                            <input type="text" name="nama_program" id="nama_program" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div class="input-bar">
                            <label for="kelas_dan_level" class="block text-sm font-medium text-blue-700 mb-2">Kelas dan Level</label>
                            <input type="text" name="kelas_dan_level" id="kelas_dan_level" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div class="input-bar">
                            <label for="jumlah_siswa_laki" class="block text-sm font-medium text-blue-700 mb-2">Jumlah Siswa Laki-laki</label>
                            <input type="number" name="jumlah_siswa_laki" id="jumlah_siswa_laki" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" min="0" value="0" required>
                        </div>
                        <div class="input-bar">
                            <label for="jumlah_siswa_perempuan" class="block text-sm font-medium text-blue-700 mb-2">Jumlah Siswa Perempuan</label>
                            <input type="number" name="jumlah_siswa_perempuan" id="jumlah_siswa_perempuan" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" min="0" value="0" required>
                        </div>
                    </div>
                </div>

                <!-- Data Visitasi -->
                <div class="bg-blue-50 p-6 rounded-lg">
                    <h2 class="text-xl font-semibold text-blue-800 mb-4">Data Visitasi</h2>
                    <div class="grid md:grid-cols-1 gap-4">
                        <div class="input-bar">
                            <label for="hasil_visitasi" class="block text-sm font-medium text-blue-700 mb-2">Hasil Visitasi</label>
                            <textarea name="hasil_visitasi" id="hasil_visitasi" rows="4" class="w-full px-3 py-2 border border-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Tulis hasil visitasi secara detail..." required></textarea>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center pt-6">
                    <button type="submit" name="button_kirim" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg shadow-lg transform hover:scale-105 transition duration-200">
                        <i class="fas fa-paper-plane mr-2"></i>
                        Submit Form
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>