<?php

namespace Database\Factories;

use App\Models\Mitra;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class MitraFactory extends Factory
{
    protected $model = Mitra::class;

    public function definition(): array
    {
        // set lokasi indonesia.
        $this->faker = \Faker\Factory::create('id_ID');

        // daftar kampus Indonesia
        $kampus = [
            'Universitas Indonesia',
            'Institut Teknologi Bandung',
            'Universitas Gadjah Mada',
            'Universitas Airlangga',
            'Universitas Diponegoro',
            'Universitas Brawijaya',
            'Universitas Sebelas Maret',
            'Institut Pertanian Bogor',
            'Universitas Padjadjaran',
            'Universitas Sriwijaya',
        ];

        return [
            // generate data-dummy
            'nama_mitra' => $this->faker->name(),
            'email_mitra' => $this->faker->unique()->safeEmail(),
            'telp_mitra' => $this->faker->phoneNumber(),
            'nama_institusi' => $this->faker->randomElement($kampus),
            'alamat_institusi' => $this->faker->city() . ', ' . $this->faker->state(),
            'password' => Hash::make('12341234'),
            'status_data' => 'Aktif',

            // generate tanggal-nya
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ];
    }
}
