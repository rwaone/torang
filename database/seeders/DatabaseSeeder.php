<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Butir;
use App\Models\Satker;
use App\Models\Satuan;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Golongan;
use App\Models\Kegiatan;
use App\Models\PerjanjianKinerja;
use App\Models\Timkerja;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Satuan::create([
            'nama' => 'Dokumen'
        ]);
        $this->call([
            JabatanSeeder::class,
            GolonganSeeder::class,
            PegawaiSeeder::class,
            TimkerjaSeeder::class,
            PerjanjianKinerjaSeeder::class,
            SatkerSeeder::class,
        ]);
                
        User::create([            
            'username' => 'ridwanst',
            'email' => 'ridwanst@bps.go.id',
            'pegawai_id' => 11,
            'role' => 'Admin Provinsi',
            'email_verified_at' => now(),
            'password' => Hash::make('misterwan'),
            'remember_token' => '',
        ]);

        Butir::create([
            'jabatan_kode' => 'lain',
            'kode' => '0',
            'keterangan' => 'Kegiatan Lainnya',
        ]);

        Butir::create([
            'jabatan_kode' => 'struktural',
            'kode' => 'KBK02',
            'keterangan' => 'Rapat Internal',
        ]);
        
        Butir::create([
            'jabatan_kode' => 'struktural',
            'kode' => 'KBK03',
            'keterangan' => 'Rapat dengan Eksternal',   
        ]);

        Butir::create([
            'jabatan_kode' => 'statistisi',
            'kode' => 'I.A.2',
            'keterangan' => 'Memeriksa kuesioner sedang',   
        ]);
    }
}
