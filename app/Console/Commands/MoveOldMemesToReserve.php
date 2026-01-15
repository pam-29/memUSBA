<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Meme;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MoveOldMemesToReserve extends Command
{
    protected $signature = 'memes:move-to-reserve';
    protected $description = 'Déplace les memes hors du top 20 en réserve après 15 minutes';

    public function handle()
    {
        $now = now();
        $lifetime = 15;

        $this->info("Vérification des memes expirés...");

        // On récupère les IDs du Top 20 actuel
        $topIds = Meme::orderByDesc('likes')
                    ->take(20)
                    ->pluck('id')
                    ->toArray();

        // On cible les memes créés il y a plus de 15 minutes
        $expiredMemes = Meme::where('created_at', '<=', $now->copy()->subMinutes($lifetime))->get();

        if ($expiredMemes->isEmpty()) {
            $this->info("Aucun meme n'a expiré pour le moment.");
            return;
        }

        foreach ($expiredMemes as $meme) {
            if (in_array($meme->id, $topIds)) {
                // Le meme est dans le Top 20 : il gagne 15 minutes de plus
                $meme->update([
                    'created_at' => $now
                ]);
                $this->info("Meme #{$meme->id} est dans le Top 20 : Timer réinitialisé.");
            } else {
                // Le meme n'est plus dans le Top : Direction la réserve
                $this->moveToReserve($meme);
            }
        }

        $this->info("Traitement terminé.");
    }

    /**
     * Déplace le meme vers la table réserve et le supprime de la table principale
     */
    protected function moveToReserve($meme)
    {
        DB::transaction(function () use ($meme) {
            // On prépare les données pour l'insertion
            $data = $meme->toArray();
            
            // On retire l'ID pour éviter les conflits si la table reserve a sa propre auto-incrémentation
            unset($data['id']);
            
            // On s'assure que la date de mise à jour est la date actuelle
            $data['updated_at'] = now();

            // Insertion dans la table 'reserve'
            DB::table('reserve')->insert($data);

            // Suppression du meme de la table d'origine
            $meme->delete();
        });

        $this->warn("Meme #{$meme->id} déplacé en réserve.");
    }
}