<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Meme;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MoveOldMemesToReserve extends Command
{
    protected $signature = 'memes:reserve-old';
    protected $description = 'Déplace les memes de plus de 15 min vers la réserve s\'ils ne sont pas dans le top';

    public function handle()
    {
        $limit = Carbon::now()->subMinutes(15);

        $topMemeIds = Meme::orderBy('votes', 'desc')->take(5)->pluck('id')->toArray();

        $memesToMove = Meme::where('created_at', '<', $limit)
                        ->whereNotIn('id', $topMemeIds)
                        ->get();

        foreach ($memesToMove as $meme) {
            DB::table('reserves')->insert([
                'text' => $meme->text,
                'portrait_id' => $meme->portrait_id,
                'created_at' => $meme->created_at,
                'updated_at' => Carbon::now(),
            ]);

            $meme->delete();
        }

        $this->info(count($memesToMove) . " memes ont été déplacés en réserve.");
    }
}