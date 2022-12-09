<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class departamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::get('https://raw.githubusercontent.com/marcovega/colombia-json/master/colombia.min.json');
     $ciudades = $response->json();
     $ciudades2 = $ciudades;
     $departamentos = array();
     $tamaño = count($ciudades);
     for($i = 0; $i < $tamaño; $i++)
     {
        $departamentos[$i]    =  $ciudades2[$i]['departamento'];
        DB::table('departamentos')->insert(
            [
                'nombre' => $departamentos[$i],
                'created_at' => now(),
                'updated_at' => now()
            ]
            );
     }
     
        
    }
}
