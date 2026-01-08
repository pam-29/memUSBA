<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

    foreach ($images as $lien) {
        \App\Models\Portrait::create(['source' => $lien]);
        }
    }
}
