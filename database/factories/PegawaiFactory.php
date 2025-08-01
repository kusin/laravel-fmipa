<?php

namespace Database\Factories;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class PegawaiFactory extends Factory
{
    protected $model = Pegawai::class;

    public function definition(): array
    {
        // set lokasi indonesia.
        $this->faker = \Faker\Factory::create('id_ID');

        return [
            // generate data-dummy
            'nama_pegawai' => $this->faker->name(),
            'email_pegawai' => $this->faker->unique()->safeEmail(),
            'telp_pegawai' => $this->faker->phoneNumber(),
            'keahlian' => $this->faker->randomElement(['Tenaga Ahli', 'Teknisi Laboran', 'Teknisi IT']),
            'password' => Hash::make('12341234'),
            'status_data' => 'Aktif',

            // generate tanggal-nya
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ];
    }
}
