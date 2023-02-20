<?php

namespace Database\Seeders;

use App\Models\Golongan;
use Illuminate\Database\Seeder;

class GolonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Golongan::create([
            'pangkat' => 'Pembina Utama',
            'golongan' => 'IV/e'
        ]);
        Golongan::create([
            'pangkat' => 'Pembina Utama madya',
            'golongan' => 'IV/d'
        ]);
        Golongan::create([
            'pangkat' => 'Pembina Utama Muda',
            'golongan' => 'IV/c'
        ]);
        Golongan::create([
            'pangkat' => 'Pembina Tingkat I',
            'golongan' => 'IV/b'
        ]);
        Golongan::create([
            'pangkat' => 'Pembina',
            'golongan' => 'IV/a'
        ]);
        Golongan::create([
            'pangkat' => 'Penata Tingkat I',
            'golongan' => 'III/d'
        ]);
        Golongan::create([
            'pangkat' => 'Penata',
            'golongan' => 'III/c'
        ]);
        Golongan::create([
            'pangkat' => 'Penata Muda Tingkat I',
            'golongan' => 'III/b'
        ]);
        Golongan::create([
            'pangkat' => 'Penata Muda',
            'golongan' => 'III/a'
        ]);
        Golongan::create([
            'pangkat' => 'Pengatur Tingkat I',
            'golongan' => 'II/d'
        ]);
        Golongan::create([
            'pangkat' => 'Pengatur',
            'golongan' => 'II/c'
        ]);
        Golongan::create([
            'pangkat' => 'Pengatur Muda Tingkat I',
            'golongan' => 'II/b'
        ]);
        Golongan::create([
            'pangkat' => 'Pengatur Muda',
            'golongan' => 'II/a'
        ]);
    }
}
