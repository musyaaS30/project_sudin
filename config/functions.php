<?php 

require_once __DIR__ . '/conn.php';

function insertNonPMA() {
    global $conn;

    try {
        // Ambil semua data dari POST
        $id_table_lembaga = intval($_POST['id_table_lembaga']);
        $no_akte = htmlspecialchars($_POST['no_akte']);
        $jenis_kegiatan = htmlspecialchars($_POST['jenis_kegiatan']);
        $kota_administrasi = htmlspecialchars($_POST['kota_administrasi']);

        // Data pimpinan lembaga
        $nama_pimpinan = htmlspecialchars($_POST['nama_pimpinan']);
        $pimpinan_ijazah = htmlspecialchars($_POST['ijazah']);
        $pimpinan_asal_pt = htmlspecialchars($_POST['asal_pt']);
        $pimpinan_jurusan = htmlspecialchars($_POST['pimpinan_jurusan']);
        $pimpinan_lembaga_sk = htmlspecialchars($_POST['pimpinan_lembaga_sk']);
        $pimpinan_sk_nomor = htmlspecialchars($_POST['pimpinan_sk_nomor']);
        $pimpinan_sk_tanggal = htmlspecialchars($_POST['pimpinan_sk_tanggal']);
        $pimpinan_pengalaman = htmlspecialchars($_POST['pimpinan_pengalaman']);

        // Data pendidik lembaga WNI
        $pendidik_wni_laki = intval($_POST['pendidik_wni_laki']);
        $pendidik_wni_perempuan = intval($_POST['pendidik_wni_perempuan']);
        $pendidik_wni_pendidikan_terakhir = htmlspecialchars($_POST['pendidik_wni_pendidikan_terakhir']);
        $pendidik_wni_sertifikat = htmlspecialchars($_POST['pendidik_wni_sertifikat']);

        // Data pendidik lembaga WNA
        $pendidik_wna_izin_kerja = htmlspecialchars($_POST['pendidik_wna_izin_kerja']);
        $pendidik_wna_laki = intval($_POST['pendidik_wna_laki']);
        $pendidik_wna_perempuan = intval($_POST['pendidik_wna_perempuan']);
        $pendidik_wna_pendidikan_terakhir = htmlspecialchars($_POST['pendidik_wna_pendidikan_terakhir']);
        $pendidik_wna_sertifikat = htmlspecialchars($_POST['pendidik_wna_sertifikat']);
        
        $jumlah_tendik = intval($_POST['jumlah_pendidik']);
        $pendidikan_tendik = htmlspecialchars($_POST['pendidikan_terakhir_pendidik']);

        // Penghasilan pendidik
        $gaji_pendidik_wni_min = floatval($_POST['gaji_pendidik_wni_min']);
        $gaji_pendidik_wni_max = floatval($_POST['gaji_pendidik_wni_max']);
        $gaji_pendidik_wna_min = floatval($_POST['gaji_pendidik_wna_min']);
        $gaji_pendidik_wna_max = floatval($_POST['gaji_pendidik_wna_max']);

        // Data administrasi
        $sop_administrasi = htmlspecialchars($_POST['sop_administrasi']);
        $buku_hadir_pendidik = htmlspecialchars($_POST['buku_hadir_pendidik']);
        $buku_hadir_siswa = htmlspecialchars($_POST['buku_hadir_siswa']);
        $buku_daftar_inventaris = htmlspecialchars($_POST['buku_daftar_inventaris']);
        $program_kerja_yayasan = htmlspecialchars($_POST['program_kerja_yayasan']);
        $program_kerja_pimpinan = htmlspecialchars($_POST['program_kerja_pimpinan']);
        $kalender_pendidikan = htmlspecialchars($_POST['kalender_pendidikan']);
        $buku_tamu = htmlspecialchars($_POST['buku_tamu']);
        $buku_induk_pendidik = htmlspecialchars($_POST['buku_induk_pendidik']);
        $buku_hasil_belajar = htmlspecialchars($_POST['buku_hasil_belajar']);
        $jadwal_pelajaran = htmlspecialchars($_POST['jadwal_pelajaran']);
        $tata_tertib = htmlspecialchars($_POST['tata_tertib']);
        $sertifikasi_pendidikan = htmlspecialchars($_POST['sertifikasi_pendidikan']);
        $struktur_organisasi = htmlspecialchars($_POST['struktur_organisasi']);

        // Data dokumen
        $dokumen_kurikulum = htmlspecialchars($_POST['dokumen_kurikulum']);
        $dokumen_pengembangan = htmlspecialchars($_POST['dokumen_pengembangan']);
        $dokumen_kerja_tahunan = htmlspecialchars($_POST['dokumen_kerja_tahunan']);

        // Data sarana prasarana
        $luas_tanah = floatval($_POST['luas_tanah']);
        $status_tanah = htmlspecialchars($_POST['status_tanah']);
        $peruntukan_tanah = htmlspecialchars($_POST['peruntukan_tanah']);
        $jumlah_ruang_belajar = intval($_POST['jumlah_ruang_belajar']);
        $ukuran_ruang_belajar = htmlspecialchars($_POST['ukuran_ruang_belajar']);
        $kondisi_gedung = htmlspecialchars($_POST['kondisi_gedung']);
        $status_gedung = htmlspecialchars($_POST['status_gedung']);
        $peruntukan_gedung = htmlspecialchars($_POST['peruntukan_gedung']);
        $jumlah_kamar_mandi = intval($_POST['jumlah_kamar_mandi']);
        $perawatan_kamarkecil = htmlspecialchars($_POST['perawatan_kamarkecil']);
        $persediaan_air_bersih = htmlspecialchars($_POST['persediaan_air_bersih']);
        $ruang_pimpinan = htmlspecialchars($_POST['ruang_pimpinan']);
        $ruang_tu = htmlspecialchars($_POST['ruang_tu']);
        $ruang_perpustakaan = htmlspecialchars($_POST['ruang_perpustakaan']);
        $ruang_laboratorium = htmlspecialchars($_POST['ruang_laboratorium']);
        $perabotan_laboratorium = htmlspecialchars($_POST['perabotan_laboratorium']);
        $kondisi_ruang_kelas = htmlspecialchars($_POST['kondisi_ruang_kelas']);
        $meja_kursi = htmlspecialchars($_POST['meja_kursi']);
        $papan_tulis = htmlspecialchars($_POST['papan_tulis']);
        $gudang = htmlspecialchars($_POST['gudang']);
        $alat_kebersihan = htmlspecialchars($_POST['alat_kebersihan']);

        // Peserta didik
        $nama_program = htmlspecialchars($_POST['nama_program']);
        $kelas_dan_level = htmlspecialchars($_POST['kelas_dan_level']);
        $jumlah_siswa_laki = intval($_POST['jumlah_siswa_laki']);
        $jumlah_siswa_perempuan = intval($_POST['jumlah_siswa_perempuan']);

        // Data visitasi
        $hasil_visitasi = htmlspecialchars($_POST['hasil_visitasi']);

        $placeholders = implode(', ', array_fill(0, 70, '?'));
        $sql = "INSERT INTO form_non_pma (
            `id_table_lembaga`, `no_akte`, `jenis_kegiatan`, `kota_administrasi`, 
            `pimpinan_nama`, `pimpinan_ijazah`, `pimpinan_asal_pt`, `pimpinan_jurusan`, 
            `pimpinan_sk_lembaga`, `pimpinan_sk_nomor`, `pimpinan_sk_tanggal`, `pimpinan_pengalaman`, 
            `pendidik_wni_laki`, `pendidik_wni_perempuan`, `pendidik_wni_pendidikan_terakhir`, `pendidik_wni_sertifikat`, 
            `pendidik_wna_ijin_kerja`, `pendidik_wna_laki`, `pendidik_wna_perempuan`, `pendidik_wna_pendidikan_terakhir`, `pendidik_wna_sertifikat`, 
            `jumlah_tendik`, `pendidikan_tendik`, 
            `gaji_pendidik_wni_min`, `gaji_pendidik_wni_max`, `gaji_pendidik_wna_min`, `gaji_pendidik_wna_max`, 
            `ada_sop`, `ada_buku_hadir_pendidik`, `ada_buku_hadir_siswa`, `ada_buku_inventaris`, 
            `ada_program_kerja_yayasan`, `ada_program_kerja_pimpinan`, `ada_kalender_pendidikan`, `ada_buku_tamu`, 
            `ada_buku_induk`, `ada_buku_hasil_belajar`, `ada_jadwal`, `ada_tata_tertib`, 
            `ada_sertifikat_pendidikan`, `ada_struktur_organisasi`, 
            `dokumen_kurikulum`, `dokumen_rencana_pengembangan`, `dokumen_rencana_tahunan`, 
            `luas_tanah`, `status_tanah`, `peruntukan_tanah`, `jumlah_ruang_belajar`, `ukuran_ruang_belajar`, 
            `kondisi_gedung`, `status_gedung`, `peruntukan_gedung`, `jumlah_kamar_mandi`, `perawatan_kamar_kecil`, 
            `persediaan_air_bersih`, `ruang_pimpinan`, `ruang_tu`, `ruang_perpustakaan`, `ruang_lab`, 
            `peralatan_laboratorium`, `kondisi_ruang_kelas`, `meja_kursi`, `papan_tulis`, `gudang`, `alat_kebersihan`, 
            `nama_program`, `kelas_dan_level`, `jumlah_siswa_laki`, `jumlah_siswa_perempuan`, 
            `hasil_visitasi`, `created_at`
        ) VALUES ($placeholders, CURRENT_TIMESTAMP())";

        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("FATAL ERROR: Gagal mempersiapkan statement. Cek kembali semua nama kolom di query SQL. Pesan error dari database: " . $conn->error);
        }

        // ==================================================================
        // PERBAIKAN PADA BIND_PARAM
        // String tipe data sekarang jumlahnya 70, sesuai dengan jumlah '?'
        // ==================================================================
        $stmt->bind_param(
            // String tipe data yang sudah dikoreksi (Total 70 karakter)
            "isssssssssssiissiissiissisddddssssssssssssssssssdssissssissssssssssiis",
            // Lembaga & Pimpinan (12 vars)
            $id_table_lembaga, $no_akte, $jenis_kegiatan, $kota_administrasi,
            $nama_pimpinan, $pimpinan_ijazah, $pimpinan_asal_pt, $pimpinan_jurusan,
            $pimpinan_lembaga_sk, $pimpinan_sk_nomor, $pimpinan_sk_tanggal, $pimpinan_pengalaman,
            // Pendidik WNI & WNA (9 vars)
            $pendidik_wni_laki, $pendidik_wni_perempuan, $pendidik_wni_pendidikan_terakhir, $pendidik_wni_sertifikat,
            $pendidik_wna_izin_kerja, $pendidik_wna_laki, $pendidik_wna_perempuan, $pendidik_wna_pendidikan_terakhir, $pendidik_wna_sertifikat,
            // Pendidik Umum & Gaji (6 vars)
            $jumlah_tendik, $pendidikan_tendik,
            $gaji_pendidik_wni_min, $gaji_pendidik_wni_max, $gaji_pendidik_wna_min, $gaji_pendidik_wna_max,
            // Administrasi (14 vars)
            $sop_administrasi, $buku_hadir_pendidik, $buku_hadir_siswa, $buku_daftar_inventaris,
            $program_kerja_yayasan, $program_kerja_pimpinan, $kalender_pendidikan, $buku_tamu,
            $buku_induk_pendidik, $buku_hasil_belajar, $jadwal_pelajaran, $tata_tertib,
            $sertifikasi_pendidikan, $struktur_organisasi,
            // Dokumen (3 vars)
            $dokumen_kurikulum, $dokumen_pengembangan, $dokumen_kerja_tahunan,
            // Sarana Prasarana (18 vars)
            $luas_tanah, $status_tanah, $peruntukan_tanah, $jumlah_ruang_belajar, $ukuran_ruang_belajar,
            $kondisi_gedung, $status_gedung, $peruntukan_gedung, $jumlah_kamar_mandi, $perawatan_kamarkecil,
            $persediaan_air_bersih, $ruang_pimpinan, $ruang_tu, $ruang_perpustakaan, $ruang_laboratorium,
            $perabotan_laboratorium, $kondisi_ruang_kelas, $meja_kursi, $papan_tulis, $gudang, $alat_kebersihan,
            // Peserta Didik & Visitasi (5 vars)
            $nama_program, $kelas_dan_level,
            $jumlah_siswa_laki, $jumlah_siswa_perempuan,
            $hasil_visitasi
        );

        if (!$stmt->execute()) {
            die("FATAL ERROR: Gagal mengeksekusi statement. Cek tipe data atau constraint (foreign key). Pesan error dari database: " . $stmt->error);
        }

        echo "<script>alert('Data berhasil dikirim!'); window.location.href='index.php';</script>";

        $stmt->close();
        $conn->close();

    } catch (Exception $e) {
        error_log("Error in insertNonPMA(): " . $e->getMessage());
        return false;
    }
}

function insertPMA() {
    var_dump($_POST);
    die;
    
    global $conn;
    
    try {
        // Ambil semua data dari POST
        $id_table_lembaga = intval($_POST['id_table_lembaga']);

        // data permohonan izin LKP PMA
        $form_pendaftaran_kelengkapan = htmlspecialchars($_POST['form_pendaftaran_kelengkapan']);
        $form_pendaftaran_score = intval($_POST['form_pendaftaran_score']);
        $form_pendaftaran_keterangan = htmlspecialchars($_POST['form_pendaftaran_keterangan']);
        $combined_pendaftaran = $form_pendaftaran_kelengkapan . "," . $form_pendaftaran_score . "," . $form_pendaftaran_keterangan;

        $surat_tugas_kelengkapan = htmlspecialchars($_POST['surat_tugas_kelengkapan']);
        $surat_tugas_score = intval($_POST['surat_tugas_score']);
        $surat_tugas_keterangan = htmlspecialchars($_POST['surat_tugas_keterangan']);
        $combined_surat_tugas = $surat_tugas_kelengkapan . "," . $surat_tugas_score . "," . $surat_tugas_keterangan;

        $ktp_pemohon_kelengkapan = htmlspecialchars($_POST['ktp_pemohon_kelengkapan']);
        $ktp_pemohon_score = intval($_POST['ktp_pemohon_score']);
        $ktp_pemohon_keterangan = htmlspecialchars($_POST['ktp_pemohon_keterangan']);
        $combined_ktp_pemohon = $ktp_pemohon_kelengkapan . "," . $ktp_pemohon_score . "," . $ktp_pemohon_keterangan;

        $surat_rekomendasi_kelengkapan = htmlspecialchars($_POST['surat_rekomendasi_kelengkapan']);
        $surat_rekomendasi_score = intval($_POST['surat_rekomendasi_score']);
        $surat_rekomendasi_keterangan = htmlspecialchars($_POST['surat_rekomendasi_keterangan']);
        $combined_surat_rekomendasi = $surat_rekomendasi_kelengkapan . "," . $surat_rekomendasi_score . "," . $surat_rekomendasi_keterangan;

        $sk_kemenhumham_kelengkapan = htmlspecialchars($_POST['sk_kemenhumham_kelengkapan']);
        $sk_kemenhumham_score = intval($_POST['sk_kemenhumham_score']);
        $sk_kemenhumham_keterangan = htmlspecialchars($_POST['sk_kemenhumham_keterangan']);
        $combined_sk_kemenhumham = $sk_kemenhumham_kelengkapan . "," . $sk_kemenhumham_score . "," . $sk_kemenhumham_keterangan;

        $nomor_induk_berusaha_kelengkapan = htmlspecialchars($_POST['nomor_induk_berusaha_kelengkapan']);
        $nomor_induk_berusaha_score = intval($_POST['nomor_induk_berusaha_score']);
        $nomor_induk_berusaha_keterangan = htmlspecialchars($_POST['nomor_induk_berusaha_keterangan']);
        $combined_nomor_induk_berusaha = $nomor_induk_berusaha_kelengkapan . "," . $nomor_induk_berusaha_score . "," . $nomor_induk_berusaha_keterangan;

        $kepemilikan_tanah_kelengkapan = htmlspecialchars($_POST['kepemilikan_tanah_kelengkapan']);
        $kepemilikan_tanah_score = intval($_POST['kepemilikan_tanah_score']);
        $kepemilikan_tanah_keterangan = htmlspecialchars($_POST['kepemilikan_tanah_keterangan']);
        $combined_kepemilikan_tanah = $kepemilikan_tanah_kelengkapan . "," . $kepemilikan_tanah_score . "," . $kepemilikan_tanah_keterangan;

        // RIPS untuk isi pendidikan
        $acuan_kurikulum_kelengkapan = htmlspecialchars($_POST['acuan_kurikulum_kelengkapan']);
        $acuan_kurikulum_score = intval($_POST['acuan_kurikulum_score']);
        $acuan_kurikulum_keterangan = htmlspecialchars($_POST['acuan_kurikulum_keterangan']);
        $combined_acuan_kurikulum = $acuan_kurikulum_kelengkapan . "," . $acuan_kurikulum_score . "," . $acuan_kurikulum_keterangan;

        $kurikulum_kelengkapan = htmlspecialchars($_POST['kurikulum_kelengkapan']);
        $kurikulum_score = intval($_POST['kurikulum_score']);
        $kurikulum_keterangan = htmlspecialchars($_POST['kurikulum_keterangan']);
        $combined_kurikulum = $kurikulum_kelengkapan . "," . $kurikulum_score . "," . $kurikulum_keterangan;

        $rpp_kelengkapan = htmlspecialchars($_POST['rpp_kelengkapan']);
        $rpp_score = intval($_POST['rpp_score']);
        $rpp_keterangan = htmlspecialchars($_POST['rpp_keterangan']);
        $combined_rpp = $rpp_kelengkapan . "," . $rpp_score . "," . $rpp_keterangan;

        $pendekatan_pembelajaran_kelengkapan = htmlspecialchars($_POST['pendekatan_pembelajaran_kelengkapan']);
        $pendekatan_pembelajaran_score = intval($_POST['pendekatan_pembelajaran_score']);
        $pendekatan_pembelajaran_keterangan = htmlspecialchars($_POST['pendekatan_pembelajaran_keterangan']);
        $combined_pendekatan_pembelajaran = $pendekatan_pembelajaran_kelengkapan . "," . $pendekatan_pembelajaran_score . "," . $pendekatan_pembelajaran_keterangan;

        //RIPS untuk tenaga kependidikan
        $nama_kelengkapan = htmlspecialchars($_POST['nama_kelengkapan']);
        $nama_score = intval($_POST['nama_score']);
        $nama_keterangan = htmlspecialchars($_POST['nama_keterangan']);
        $combined_nama = $nama_kelengkapan . "," . $nama_score . "," . $nama_keterangan;

        $jabatan_kelengkapan = htmlspecialchars($_POST['jabatan_kelengkapan']);
        $jabatan_score = intval($_POST['jabatan_score']);
        $jabatan_keterangan = htmlspecialchars($_POST['jabatan_keterangan']);
        $combined_jabatan = $jabatan_kelengkapan . "," . $jabatan_score . "," . $jabatan_keterangan;

        $kualifikasi_akademik_kelengkapan = htmlspecialchars($_POST['kualifikasi_akademik_kelengkapan']);
        $kualifikasi_akademik_score = intval($_POST['kualifikasi_akademik_score']);
        $kualifikasi_akademik_keterangan = htmlspecialchars($_POST['kualifikasi_akademik_keterangan']);
        $combined_kualifikasi_akademik = $kualifikasi_akademik_kelengkapan . "," . $kualifikasi_akademik_score . "," . $kualifikasi_akademik_keterangan;

        $sertifikat_kelengkapan = htmlspecialchars($_POST['sertifikat_kelengkapan']);
        $sertifikat_score = intval($_POST['sertifikat_score']);
        $sertifikat_keterangan = htmlspecialchars($_POST['sertifikat_keterangan']);
        $combined_sertifikat = $sertifikat_kelengkapan . "," . $sertifikat_score . "," . $sertifikat_keterangan;

        $pengalaman_kerja_kelengkapan = htmlspecialchars($_POST['pengalaman_kerja_kelengkapan']);
        $pengalaman_kerja_score = intval($_POST['pengalaman_kerja_score']);
        $pengalaman_kerja_keterangan = htmlspecialchars($_POST['pengalaman_kerja_keterangan']);
        $combined_pengalaman_kerja = $pengalaman_kerja_kelengkapan . "," . $pengalaman_kerja_score . "," . $pengalaman_kerja_keterangan;

        //RIPS untuk sarana prasarana
        $bangunan_kelengkapan = htmlspecialchars($_POST['bangunan_kelengkapan']);
        $bangunan_score = intval($_POST['bangunan_score']);
        $bangunan_keterangan = htmlspecialchars($_POST['bangunan_keterangan']);
        $combined_bangunan = $bangunan_kelengkapan . "," . $bangunan_score . "," . $bangunan_keterangan;

        $ruangan_kelengkapan = htmlspecialchars($_POST['ruangan_kelengkapan']);
        $ruangan_score = intval($_POST['ruangan_score']);
        $ruangan_keterangan = htmlspecialchars($_POST['ruangan_keterangan']);
        $combined_ruangan = $ruangan_kelengkapan . "," . $ruangan_score . "," . $ruangan_keterangan;

        $alat_kelengkapan = htmlspecialchars($_POST['alat_kelengkapan']);
        $alat_score = intval($_POST['alat_score']);
        $alat_keterangan = htmlspecialchars($_POST['alat_keterangan']);
        $combined_alat = $alat_kelengkapan . "," . $alat_score . "," . $alat_keterangan;

        $bahan_ajar_kelengkapan = htmlspecialchars($_POST['bahan_ajar_kelengkapan']);
        $bahan_ajar_score = intval($_POST['bahan_ajar_score']);
        $bahan_ajar_keterangan = htmlspecialchars($_POST['bahan_ajar_keterangan']);
        $combined_bahan_ajar = $bahan_ajar_kelengkapan . "," . $bahan_ajar_score . "," . $bahan_ajar_keterangan;

        $kepemilikan_gedung_kelengkapan = htmlspecialchars($_POST['kepemilikan_gedung_kelengkapan']);
        $kepemilikan_gedung_score = intval($_POST['kepemilikan_gedung_score']);
        $kepemilikan_gedung_keterangan = htmlspecialchars($_POST['kepemilikan_gedung_keterangan']);
        $combined_kepemilikan_gedung = $kepemilikan_gedung_kelengkapan . "," . $kepemilikan_gedung_score . "," . $kepemilikan_gedung_keterangan;

        //RIPS untuk pembiayaan pendidikan
        $rancangan_pembiayaan_kelengkapan = htmlspecialchars($_POST['rancangan_pembiayaan_kelengkapan']);
        $rancangan_pembiayaan_score = intval($_POST['rancangan_pembiayaan_score']);
        $rancangan_pembiayaan_keterangan = htmlspecialchars($_POST['rancangan_pembiayaan_keterangan']);
        $combined_rancangan_pembiayaan = $rancangan_pembiayaan_kelengkapan . "," . $rancangan_pembiayaan_score . "," . $rancangan_pembiayaan_keterangan;

        $sumber_pembiayaan_kelengkapan = htmlspecialchars($_POST['sumber_pembiayaan_kelengkapan']);
        $sumber_pembiayaan_score = intval($_POST['sumber_pembiayaan_score']);
        $sumber_pembiayaan_keterangan = htmlspecialchars($_POST['sumber_pembiayaan_keterangan']);
        $combined_sumber_pembiayaan = $sumber_pembiayaan_kelengkapan . "," . $sumber_pembiayaan_score . "," . $sumber_pembiayaan_keterangan;

        //RIPS untuk sistem evaluasi dan sertifikasi
        $sistem_sertifikasi_kelengkapan = htmlspecialchars($_POST['sistem_sertifikasi_kelengkapan']);
        $sistem_sertifikasi_score = intval($_POST['sistem_sertifikasi_score']);
        $sistem_sertifikasi_keterangan = htmlspecialchars($_POST['sistem_sertifikasi_keterangan']);
        $combined_sistem_sertifikasi = $sistem_sertifikasi_kelengkapan . "," . $sistem_sertifikasi_score . "," . $sistem_sertifikasi_keterangan;

        $orientasi_sertifikasi_kelengkapan = htmlspecialchars($_POST['orientasi_sertifikasi_kelengkapan']);
        $orientasi_sertifikasi_score = intval($_POST['orientasi_sertifikasi_score']);
        $orientasi_sertifikasi_keterangan = htmlspecialchars($_POST['orientasi_sertifikasi_keterangan']);
        $combined_orientasi_sertifikasi = $orientasi_sertifikasi_kelengkapan . "," . $orientasi_sertifikasi_score . "," . $orientasi_sertifikasi_keterangan;

        $pengembangan_evaluasi_kelengkapan = htmlspecialchars($_POST['pengembangan_evaluasi_kelengkapan']);
        $pengembangan_evaluasi_score = intval($_POST['pengembangan_evaluasi_score']);
        $pengembangan_evaluasi_keterangan = htmlspecialchars($_POST['pengembangan_evaluasi_keterangan']);
        $combined_pengembangan_evaluasi = $pengembangan_evaluasi_kelengkapan . "," . $pengembangan_evaluasi_score . "," . $pengembangan_evaluasi_keterangan;

        //RIPS untuk manajemen dan proses pendidikan
        $struktur_organisasi_kelengkapan = htmlspecialchars($_POST['struktur_organisasi_kelengkapan']);
        $struktur_organisasi_score = intval($_POST['struktur_organisasi_score']);
        $struktur_organisasi_keterangan = htmlspecialchars($_POST['struktur_organisasi_keterangan']);
        $combined_struktur_organisasi = $struktur_organisasi_kelengkapan . "," . $struktur_organisasi_score . "," . $struktur_organisasi_keterangan;

        $sop_kelengkapan = htmlspecialchars($_POST['sop_kelengkapan']);
        $sop_score = intval($_POST['sop_score']);
        $sop_keterangan = htmlspecialchars($_POST['sop_keterangan']);
        $combined_sop = $sop_kelengkapan . "," . $sop_score . "," . $sop_keterangan;

        $peserta_didik_kelengkapan = htmlspecialchars($_POST['peserta_didik_kelengkapan']);
        $peserta_didik_score = intval($_POST['peserta_didik_score']);
        $peserta_didik_keterangan = htmlspecialchars($_POST['peserta_didik_keterangan']);
        $combined_peserta_didik = $peserta_didik_kelengkapan . "," . $peserta_didik_score . "," . $peserta_didik_keterangan;

        $kalender_pembelajaran_kelengkapan = htmlspecialchars($_POST['kalender_pembelajaran_kelengkapan']);
        $kalender_pembelajaran_score = intval($_POST['kalender_pembelajaran_score']);
        $kalender_pembelajaran_keterangan = htmlspecialchars($_POST['kalender_pembelajaran_keterangan']);
        $combined_kalender_pembelajaran = $kalender_pembelajaran_kelengkapan . "," . $kalender_pembelajaran_score . "," . $kalender_pembelajaran_keterangan;

        $jadwal_ruangan_kelengkapan = htmlspecialchars($_POST['jadwal_ruangan_kelengkapan']);
        $jadwal_ruangan_score = intval($_POST['jadwal_ruangan_score']);
        $jadwal_ruangan_keterangan = htmlspecialchars($_POST['jadwal_ruangan_keterangan']);
        $combined_jadwal_ruangan = $jadwal_ruangan_kelengkapan . "," . $jadwal_ruangan_score . "," . $jadwal_ruangan_keterangan;

        $placeholders = implode(', ', array_fill(0, 33, '?'));
        $sql = "INSERT INTO form_pma (
            `id_table_lembaga`,
            `form_pendaftaran`, `surat_tugas`, `ktp_pemohon`, `surat_rekomendasi`, `sk_kemenhumkam`, `nomor_induk_berusaha`, `kepemilikan_tanah`,
            `acuan_kurikulum`, `kurikulum`, `rpp`, `pendekatan_pembelajaran`, 
            `nama`, `jabatan`, `kualifikasi_akademik`, `sertifikat`, `pengalaman_kerja`, 
            `bangunan`, `ruangan`, `alat`, `bahan_ajar`, `kepemilikan_gedung`,
            `rancangan_pembiayaan`, `sumber_pembiayaan`, 
            `sistem_sertifikasi`, `orientasi_sertifikasi`, `pengembangan_evaluasi`, 
            `struktur_organisasi`, `sop`, `peserta_didik`, `kalender_pembelajaran`, `jadwal_ruangan`
        ) VALUES ($placeholders, CURRENT_TIMESTAMP())";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("FATAL ERROR: Gagal mempersiapkan statement. Cek kembali semua nama kolom di query SQL. Pesan error dari database: " . $conn->error);
        }

        $stmt->bind_param(
            // String tipe data yang sudah dikoreksi (Total 32 karakter)
            "isssssssssssssssssssssssssssssss",
            $id_table_lembaga, 
            $combined_pendaftaran, $combined_surat_tugas, $combined_ktp_pemohon, $combined_surat_rekomendasi, $combined_sk_kemenhumham, $combined_nomor_induk_berusaha, $combined_kepemilikan_tanah, 
            $combined_acuan_kurikulum, $combined_kurikulum, $combined_rpp, $combined_pendekatan_pembelajaran, 
            $combined_nama, $combined_jabatan, $combined_kualifikasi_akademik, $combined_sertifikat, $combined_pengalaman_kerja, 
            $combined_bangunan, $combined_ruangan, $combined_alat, $combined_bahan_ajar, $combined_kepemilikan_gedung, 
            $combined_rancangan_pembiayaan, $combined_sumber_pembiayaan, 
            $combined_sistem_sertifikasi, $combined_orientasi_sertifikasi, $combined_pengembangan_evaluasi, 
            $combined_struktur_organisasi, $combined_sop, $combined_peserta_didik, $combined_kalender_pembelajaran, $combined_jadwal_ruangan
        );

        if (!$stmt->execute()) {
            die("FATAL ERROR: Gagal mengeksekusi statement. Cek tipe data atau constraint (foreign key). Pesan error dari database: " . $stmt->error);
        }

        echo "<script>alert('Data berhasil dikirim!'); window.location.href='index.php';</script>";
        $stmt->close();
        $conn->close();

    } catch (Exception $e) {
        error_log("Error in insertPMA(): " . $e->getMessage());
        return false;
    }
}

