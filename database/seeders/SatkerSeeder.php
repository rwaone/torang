<?php

namespace Database\Seeders;

use App\Models\Satker;
use Illuminate\Database\Seeder;

class SatkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Satker::create([
            'id' => '7100',
            'nama' => 'BPS Provinsi Sulawesi Utara',
        ]);
        
        Satker::create([
            'id' => '7101',
            'nama' => 'BPS Kab. Bolaang Mongondow',
        ]);

        
        Satker::create([
            'id' => '7102',
            'nama' => 'BPS Kab. Minahasa',
        ]);
        
        Satker::create([
            'id' => '7103',
            'nama' => 'BPS Kab. Sangihe',
        ]);
        
        Satker::create([
            'id' => '7104',
            'nama' => 'BPS Kab. Talaud',
        ]);
        
        
        Satker::create([
            'id' => '7105',
            'nama' => 'BPS Kab. Minahasa Selatan',
        ]);
        
        Satker::create([
            'id' => '7106',
            'nama' => 'BPS Kab. Minahasa Utara',
        ]);
        
        Satker::create([
            'id' => '7107',
            'nama' => 'BPS Kab. Bolaang Mongondow Utara',
        ]);
        
        Satker::create([
            'id' => '7108',
            'nama' => 'BPS Kab. Siau Tagulandang Biaro',
        ]);
        
        Satker::create([
            'id' => '7171',
            'nama' => 'BPS Kota Manado',
        ]);
        
        Satker::create([
            'id' => '7172',
            'nama' => 'BPS Kota Bitung',
        ]);
        
        Satker::create([
            'id' => '7173',
            'nama' => 'BPS Kota Tomohon',
        ]);
        
        Satker::create([
            'id' => '7174',
            'nama' => 'BPS Kota Kotamobagu',
        ]);
    }
}
