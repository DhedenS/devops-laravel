<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Padi>
 */
class PadiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nama_padi"=>fake()->word(),
            "warna"=>fake()->colorName(),
            "bentuk"=>"bulat",
            "tekstur"=>"bagus",
            "harga"=>fake()->randomFloat(2,50000,1000000),
            "stok"=>fake()->randomNumber(),
            "gambar"=>"UIIA"
        ];
    }
}
