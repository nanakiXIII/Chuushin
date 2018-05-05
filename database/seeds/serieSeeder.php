<?php

use Illuminate\Database\Seeder;

class serieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1;$i<= 10; $i++){
            DB::table('series')->insert([
                'titre' => "titre $i",
                'titre_original' => "titre_o $i",
                'titre_alternatif' => "titre_a $i",
                'annee' => "1999",
                'studio' => "studio $i",
                'auteur' => "titre $i",
                'synopsis' => "lorem $i",
                'staff' => "coucou $i",
                'type' => "Animes",
                'slug' => "titre_$i",
                'image' => "user.jpg"
            ]);
        }
        for ($i=10;$i<= 20; $i++){
            DB::table('series')->insert([
                'titre' => "titre $i",
                'titre_original' => "titre_o $i",
                'titre_alternatif' => "titre_a $i",
                'annee' => "1999",
                'studio' => "studio $i",
                'auteur' => "titre $i",
                'synopsis' => "lorem $i",
                'staff' => "coucou $i",
                'type' => "Scan",
                'slug' => "titre_$i",
                'image' => "user.jpg"
            ]);
        }
    }
}
