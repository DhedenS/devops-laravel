<?php

namespace Database\Factories;

use App\Models\Padi;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProduksiBeras>
 */
class ProduksiBerasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "tanggal_produksi"=>fake()->date(),
            "jumlah_padi"=>fake()->randomNumber(),
            "jumlah_beras"=>fake()->randomNumber(),
            "keterangan"=>fake()->text(),
            "id_padi"=>Padi::inRandomOrder()->first(),
            "id_produk"=>Produk::inRandomOrder()->first()
        ];
    }
}
