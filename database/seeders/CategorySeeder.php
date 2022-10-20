<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // insertar categorías
        DB::table('categories')->insert([
            'category' => 'Smartphones',
            'description' => 'Dispositivos móviles que combinan las funciones de un teléfono móvil y de una computadora u ordenador de bolsillo.'
        ]);

        DB::table('categories')->insert([
            'category' => 'Smartwatches',
            'description' => 'Un reloj inteligente es un reloj de pulsera dotado con funcionalidades que van más allá de las de uno convencional.'
        ]);

        DB::table('categories')->insert([
            'category' => 'Laptops',
            'description' => 'Ésta pertenece al grupo de las computadoras personales, las cuales son sistemas de computación relativamente pequeños y de bajo costo, también llamados microprocesadores.'
        ]);

        DB::table('categories')->insert([
            'category' => 'Desktop computer',
            'description' => 'Se denomina como computadora de escritorio, computador de escritorio, ordenador de sobremesa u ordenador fijo a un tipo de ordenador personal, diseñado y fabricado para ser instalado en una ubicación estática, como un escritorio o mesa.'
        ]);

        DB::table('categories')->insert([
            'category' => 'Smart TV',
            'description' => 'Es un televisor inteligente que facilita la transmisión de películas y programas, y los nuevos modelos ofrecen control por voz e integración inteligente en el hogar.'
        ]);
    }
}
