<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Portrait;

class PortraitSeeder extends Seeder{

    public function run(): void{
        $images = [
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/styles/wide/public/2025-05/Gros_Ducxhesse_Angouleme_Ph_F_Deval.jpg.webp?itok=2OqhVcek',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-03/Delacroix_Grece_ruines_Ph_F_Deval.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-03/Delacroix_Chasse_lions__Ph_F_Deval.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-05/Bouguereau_Jour_Morts_Ph_L_Gauthier.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-06/GEROME_Jean_Leon_Bacchus_et_lamour_ivres_Deval.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-05/Corot_Bain_Diane_ph_F.Deval_.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-06/MORISOT_Le_neveu_de_Berthe_Morisot_Ph_F_Deval.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/styles/wide/public/2025-06/Buland_Les_Heritiers_Ph_F_Deval_0.jpg.webp?itok=vSKAEbTm',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-06/LACOSTE_Portrait_Frizeau.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-06/REDON._Le_char_dApollon_Ph_F_deval.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-06/Gaston_SCHNEGG_Lecon_Poupee_ph_F_Deval.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-06/DORIGNAC_Femme_nue_ph_FDeval.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-06/Bx_2006.1.3_format_a5.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-03/Bonheur_Foulaison__ph_F_Deval.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-04/Amaury_Duval-Femmeluz_Ph_F_Deval.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-04/Gervex_Rolla_ph_F.Deval_2.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-06/Matisse_Bevilacqua_Ph_F_Deval.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-05/Gudin_Trait_devouement_Ph_F_Deval.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-06/ROLL._Le_vieux_carrier._Ph_L_Gauthier_0.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-07/DUPAS_Jean_Archer_ADAGP_photo_L._Gauthier.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-06/Bissiere_PoissonADAGP_Ph_Deval.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-06/Bonnard.Les_bas_noirs_Ph_Deval_0.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-06/Valtat_Espagnole_Ph_F_Deval.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-06/VALLOTTON_Portrait_Vallotton_Ph_F_Deval_0.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-06/Ziegler_Giotto_F_Deval.jpg',
        ];

        $artist_names = [
            'Antoine-Jean Baron Gros',
            'Eugène Delacroix',
            'Eugène Delacroix',
            'William Bouguereau',
            'Jean-Léon Gérôme',
            'Camille Corot',
            'Berthe Morisot',
            'Jean-Eugène Buland',
            'Charles Lacoste',
            'Odilon Redon',
            'Gaston Schnegg',
            'Georges Dorignac',
            'André Lhote',
            'Rosa Bonheur',
            'Eugène Amaury-Duval',
            'Henri Gervex',
            'Henri Matisse',
            'Théodore Gudin',
            'Alfred Roll',
            'Albert Besnard',
            'Roger Bissière',
            'Pierre Bonnard',
            'Louis Valtat',
            'Félix Vallotton',
            'Jules Claude Ziegler',
        ];

        $painting_names = [
            "Embarquement de la Duchesse d'Angoulême à Pauillac",
            'La Grèce sur les ruines de Missolonghi',
            'La Chasse aux lions',
            'Le Jour des morts',
            "Bacchus et l'Amour ivres",
            'Le Bain de Diane',
            'Le Neveu de Berthe Morisot',
            'Les Héritiers',
            'Portrait de Gabriel Frizeau',
            "Le Char d'Apollon",
            'La leçon aux poupées',
            'Femme nue',
            'Bacchante',
            'La Foulaison du blé en Carmargue',
            'Jeune femme de Saint-Jean-de-Luz',
            'Rolla',
            'Portrait de Bevilacqua',
            'Trait de dévouement du capitaine Desse, de Bordeaux, envers le Colombus, navire hollandais',
            'Le Vieux Carrier',
            "L'Archer",
            'La Jeune Fille au poisson',
            'Les Bas noirs',
            'Jeune femme espagnole',
            'Portrait de Madame Gabrielle Vallotton',
            "Giotto dans l'atelier de Cimabue",
        ];

        $years = [
            '1818',
            '1826',
            '1854-1855',
            '1859',
            '1850',
            '1855',
            '1876',
            '1887',
            '1898',
            '1909', 
            '20e siècle',
            '1920 environ',
            '1912',
            '1864-1899',
            'vers 1860',
            '1878', 
            '1901',
            '1829',
            '1878',
            '1917',
            '1920',
            '1899',
            'vers 1895',
            '1905',
            '1833'
        ];

        foreach ($images as $index => $url) {
            Portrait::create([
                'source' => $url,
                'artist_name' => $artist_names[$index],
                'painting_name' => $painting_names[$index],
                'year' => $years[$index],
            ]);
        }
    }
}