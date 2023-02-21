<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KegiatanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pegawai_id' => 2,
            'tanggal' => $this->faker->date(),
            'nama' => $this->faker->sentence(mt_rand(2,6 )),
            'kriteria' => $this->faker->word(),
            'lokasi' => $this->faker->word(),
            'target' => $this->faker->randomDigit(),
            'timkerja_id' => $this->faker->numberBetween(1,5),
            'butir_id' => $this->faker->numberBetween(1,2),
            'satuan_id' => 1,
            'realisasi' => $this->faker->randomDigit(),
            'keterangan' => $this->faker->sentence(mt_rand(2,6)),
            'nilai' => $this->faker->numberBetween(99,100)
        ];
    }
}
