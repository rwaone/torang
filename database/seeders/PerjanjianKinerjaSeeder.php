<?php

namespace Database\Seeders;

use App\Models\PerjanjianKinerja;
use Illuminate\Database\Seeder;

class PerjanjianKinerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PerjanjianKinerja::create([
            'tahun' => 2022,
            'tujuan' => 'Menyediakan data statistik untuk dimanfaatkan sebagai dasar pembangunan',
            'sasaran' => 'Meningkatnya pemanfaatan data statistik yang berkualitas',
            'indikator' => 'Persentase pengguna data yang menggunakan data BPS sebagai dasar perencanaan, monitoring dan evaluasi pembangunan (%)',
            'satuan' => 'Persen',
            'target' => 96,
        ]);

        PerjanjianKinerja::create([
            'tahun' => 2022,
            'tujuan' => 'Menyediakan data statistik untuk dimanfaatkan sebagai dasar pembangunan',
            'sasaran' => 'Meningkatnya pemanfaatan data statistik yang berkualitas',
            'indikator' => 'Persentase publikasi statistik yang menerapkan standard akurasi (%)',
            'satuan' => 'Persen',
            'target' => 90,
        ]);

        PerjanjianKinerja::create([
            'tahun' => 2022,
            'tujuan' => 'Meningkatnya kolaborasi, integrasi, dan standarisasi dalam penyelenggaraan SSN',
            'sasaran' => 'Penguatan komitmen K/L/D/I terhadap SSN',
            'indikator' => 'Persentase Organisasi Perangkat Daerah (OPD) yang mendapatkan rekomendasi kegiatan statistik (%)',
            'satuan' => 'Persen',
            'target' => 25,
        ]);

        PerjanjianKinerja::create([
            'tahun' => 2022,
            'tujuan' => 'Meningkatnya kolaborasi, integrasi, dan standarisasi dalam penyelenggaraan SSN',
            'sasaran' => 'Penguatan komitmen K/L/D/I terhadap SSN',
            'indikator' => 'Persentase Organisasi Perangkat Daerah (OPD) yang menyampaikan metadata sektora sesuai standar (%)',
            'satuan' => 'Persen',
            'target' => 75,
        ]);

        PerjanjianKinerja::create([
            'tahun' => 2022,
            'tujuan' => 'Meningkatnya pelayanan prima dalam penyelenggaraan SSN',
            'sasaran' => 'Penguatan statistik sektoral K/L/D/I',
            'indikator' => 'Persentase Organisasi Perangkat Daerah (OPD) yang mendapatkan pembinaan statistik (%)',
            'satuan' => 'Persen',
            'target' => 90,
        ]);

        PerjanjianKinerja::create([
            'tahun' => 2022,
            'tujuan' => 'Penguatan tata kelola kelembagaan dan reformasi birokrasi',
            'sasaran' => 'SDM statistik yang unggul dan berdaya saing dalam kerangka tata kelolaan kelembagaan',
            'indikator' => 'Hasil Penilaian Implementasi SAKIP',
            'satuan' => 'Poin',
            'target' => 74,
        ]);

        PerjanjianKinerja::create([
            'tahun' => 2022,
            'tujuan' => 'Penguatan tata kelola kelembagaan dan reformasi birokrasi',
            'sasaran' => 'SDM statistik yang unggul dan berdaya saing dalam kerangka tata kelolaan kelembagaan',
            'indikator' => 'Persentase kepuasan pengguna data terhadap sarana dan prasarana pelayanan BPS Provinsi (%)',
            'satuan' => 'Persen',
            'target' => 99,
        ]);
        
    }
}
