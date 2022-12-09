<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class CiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Departamentos semillas

        
        // Ciudades semillas
        $response = Http::get('https://raw.githubusercontent.com/marcovega/colombia-json/master/colombia.min.json');
        $ciudades = $response->json();
        $ciudades2 = $ciudades[12]['ciudades'];
        $ciudades3 = array();
        $tamaño = count($ciudades2);
        for($i = 1; $i < $tamaño; $i++)
        {
           $ciudades3[$i] = $ciudades2[$i];
           DB::table('ciudades')->insert(
            [
                'nombreCiudad' => $ciudades3[$i],
                'created_at' => now(),
                'updated_at' => now()
            ]
            );
        }
        // Departamentos semillas
    }
}
