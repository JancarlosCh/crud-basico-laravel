<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            'product' => 'Samgung S22',
            'description' => 'El Samsung Galaxy S22 cuenta con una pantalla de 6.1 pulgadas, mientras que el S22+ lleva 6.6 pulgadas. Ambos cuenta con resolución FHD+, con tasa de refresco de 120 Hz, Dynamic AMOLED 2x, además de un lector de huella bajo la pantalla',
            'category_id' => 1,
            'price' => (float) '350000',
            'stock' => 50
        ]);

        DB::table('products')->insert([
            'product' => 'Lenovo IdeaPad Gaming 3 6ta Gen',
            'description' => 'La notebook gamer IdeaPad Gaming 3 de 6ta generación funciona más rápido y está más refrigerada que en las generaciones anteriores, con un límite térmico elevado que disipa un 41% más de calor (120 W). Su sistema térmico de vanguardia supera el doble del flujo de aire, con el doble de salidas de aire y hasta cuatro tubos térmicos.',
            'category_id' => 3,
            'price' => (float) '390000',
            'stock' => 20
        ]);
    }
}
