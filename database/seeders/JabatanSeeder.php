<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jabatan::create([
            'nama' => 'Kepala BPS Provinsi',
            'kode' => 'struktural',
        ]);
        Jabatan::create([
            'nama' => 'Kepala Bagian Umum',
            'kode' => 'struktural',
        ]);
        Jabatan::create([
            'nama' => 'Kepala BPS Kab/Kota',
            'kode' => 'struktural',
        ]);
        Jabatan::create([
            'nama' => 'Kepala Subbagian',
            'kode' => 'struktural',
        ]);
        Jabatan::create([
            'nama' => 'Pelaksana',
            'kode' => 'struktural',
        ]);
        Jabatan::create([
            'nama' => 'Statistisi Ahli Utama',
            'kode' => 'statistisi',
        ]);
        Jabatan::create([
            'nama' => 'Statistisi Ahli Madya',
            'kode' => 'statistisi',
        ]);
        Jabatan::create([
            'nama' => 'Statistisi Ahli Muda',
            'kode' => 'statistisi',
        ]);
        Jabatan::create([
            'nama' => 'Statistisi Ahli Pertama',
            'kode' => 'statistisi',
        ]);
        Jabatan::create([
            'nama' => 'Pranata Komputer Ahli Madya',
            'kode' => 'prakom',
        ]);
        Jabatan::create([
            'nama' => 'Pranata Komputer Ahli Muda',
            'kode' => 'prakom',
        ]);
        Jabatan::create([
            'nama' => 'Pranata Komputer Ahli Pertama',
            'kode' => 'prakom',
        ]);
        Jabatan::create([
            'nama' => 'Analis Anggaran Ahli Muda',
            'kode' => 'anggaran',
        ]);
        Jabatan::create([
            'nama' => 'Analis Anggaran Ahli Pertama',
            'kode' => 'anggaran',
        ]);
        Jabatan::create([
            'nama' => 'Pranata Humas Ahli Muda',
            'kode' => 'humas',
        ]);
        Jabatan::create([
            'nama' => 'Pranata Humas Ahli Pertama',
            'kode' => 'humas',
        ]);
        Jabatan::create([
            'nama' => 'Analis SDM Ahli Muda',
            'kode' => 'sdm',
        ]);
        Jabatan::create([
            'nama' => 'Analis SDM Ahli Pertama',
            'kode' => 'sdm',
        ]);
        Jabatan::create([
            'nama' => 'Analis Pengelolaan Keuangan APBN Ahli Madya',
            'kode' => 'apk',
        ]);
        Jabatan::create([
            'nama' => 'Analis Pengelolaan Keuangan APBN Ahli Muda',
            'kode' => 'apk',
        ]);
        Jabatan::create([
            'nama' => 'Analis Pengelolaan Keuangan APBN Ahli Pertama',
            'kode' => 'apk',
        ]);
        Jabatan::create([
            'nama' => 'Pranata Keuangan APBN Mahir',
            'kode' => 'keuangan',
        ]);
        Jabatan::create([
            'nama' => 'Arsiparis Ahli Madya',
            'kode' => 'arsiparis',
        ]);
        Jabatan::create([
            'nama' => 'Arsiparis Ahli Muda',
            'kode' => 'arsiparis',
        ]);
        Jabatan::create([
            'nama' => 'Arsiparis Ahli Pertama',
            'kode' => 'arsiparis',
        ]);
    }
}
