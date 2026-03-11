<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category = ["padi","alat","obat"];
        return [
            "nama_produk"=>fake()->word(),
            "kategori"=>$category[rand(0,2)],
            "harga"=>fake()->randomFloat(2,500000,1000000),
            "stok"=>fake()->numberBetween(100,10000),
            "satuan"=>1
        ];
    }
}
