<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Portrait;

class PortraitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $images = [
        'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/styles/wide/public/2025-04/Vasari_ph_F_Deval.jpg.webp?itok=O-p0dxKl',
        'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/styles/wide/public/2025-06/Do_Socrate_presentant_un_miroir_Ph_F_Deval.jpg.webp?itok=lkJafRR0',
        'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/styles/wide/public/2025-03/Boeckhorst_MartyreSaintLaurent_ph_F_Deval.jpg.webp?itok=Vl7D37Kg',
    ];
    $artist_names = [
        'Giorgio Vasari',
        'Diego Velázquez',
        'Jan Boeckhorst',
    ];
    $painting_names = [
        'Sainte Famille avec saint Jean-Baptiste et saint François d’Assise',
        'Socrate présentant un miroir à Alcibiade',
        'Le Martyre de saint Laurent',
    ];
    $years = [
        '1540',
        '1636',
        '1640',
    ];
    $localisations = [
        'Exposée salle 6',
        'Oeuvre en réserve, non visible actuellement',
        'Musée des Beaux-Arts de Bordeaux',
    ];

    foreach ($images as $index => $url) {
        \App\Models\Portrait::create([
            'source' => $url,
            'artist_name' => $artist_names[$index],
            'painting_name' => $painting_names[$index],
            'year' => $years[$index],
            'localisation' => $localisations[$index]
        ]);
        }
    }
}
