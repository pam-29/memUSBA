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
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/styles/wide/public/2025-05/Gros%20Ducxhesse%20Angouleme%20Ph%20F%20Deval.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-03/Delacroix%20Grece%20ruines%20Ph%20F%20Deval.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-03/Delacroix%20Chasse%20lions%20Ph%20F%20Deval.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-06/GEROME%20Jean%20Leon%20Bacchus%20et%20lamour%20ivres%20Deval.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-05/Corot%20Bain%20Diane%20ph%20F.%20Deval_.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-06/MORISOT%20Le%20neveu%20de%20Berthe%20Morisot%20Ph%20F%20Deval.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/styles/wide/public/2025-06/Buland%20Les%20Heritiers%20Ph%20F%20Deval%200.jpg.webp',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-06/LACOSTE%20Portrait%20Frizeau.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-06/REDON.Le%20char%20dApollon%20Ph%20F%20devaL.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-06/Gaston%20SCHNEGG%20Lecon%20Poupee%20ph%20F%20Deval.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-06/DORIGNAC%20Femme_nue%20ph_FDeval.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-06/Bx%202006.1.3%20format%20a5.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-03/Bonheur%20Foulaison%20ph%20F%20Deval.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-04/Amaury%20Duval-%20Femmeluz%20Ph%20F%20Deval.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-04/Gervex%20Roll%20aph%20F.%20Deval%202.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-06/Matisse%20Bevilacqua%20Ph%20F%20Deval.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-05/Gudin%20Trait%20devouement%20PhF%20Deval.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-06/ROLL.Le%20vieux%20carrier.Ph%20L%20Gauthier0.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-07/DUPAS%20Jean%20Archer%20ADAGP%20photo%20L.%20Gauthier.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-06/Marquet%20Nu%20fauve%20Ph%20FDeval.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-06/Bissiere%20PoissonADAGP%20Ph%20Deval.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-06/Bonnard.%20Les%20bas%20noirs%20Ph%20Deval%200.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-06/Valtat%20Espagnole%20Ph%20F%20Deval.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-06/VALLOTTON%20Portrait%20Vallotton%20Ph%20F%20Deval%200.jpg',
            'https://www.musba-bordeaux.fr/sites/bor-musba-drupal/files/2025-06/Ziegler%20GiottoF_Deval.jpg',
        ];

        $artist_names = [
            'Antoine-Jean Baron Gros',
            'Eugène Delacroix',
            'Eugène Delacroix',
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
            'Albert Marquet',
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
            'Trait de dévouement du capitaine Desse',
            'Le Vieux Carrier',
            "L'Archer",
            'Nu, dit Nu fauve',
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
            '1898',
            '1920',
            '1899',
            'vers 1895',
            '1905',
            '1833'
        ];

        $localisations = [
            'check location',
            'check location',
            'check location',
            'check location',
            'check location',
            'check location',
            'check location',
            'check location',
            'Oeuvre en réserve, non visible actuellement',
            'check location',
            'Les années 1910-1940 du cubisme au retour à l\'ordre', 
            'Les années 1910-1940 du cubisme au retour à l\'ordre', 
            'check location',
            'check location',
            'check location',
            'Odilon Redon et l\'art autour de 1900',
            'check location',
            'check location', 
            'Les années 1910-1940 du cubisme au retour à l\'ordre', 
            'check location', 
            'Les années 1910-1940 du cubisme au retour à l\'ordre', 
            'Odilon Redon et l\'art autour de 1900',
            'Exposé dans Sage comme une image ?',
        ];

        foreach ($images as $index => $url) {
            Portrait::create([
                'source' => $url,
                'artist_name' => $artist_names[$index],
                'painting_name' => $painting_names[$index],
                'year' => $years[$index],
                'localisation' => $localisations[$index]
            ]);
        }
    }
}