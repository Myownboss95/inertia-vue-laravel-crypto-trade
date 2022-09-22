<?php

namespace App\Console\Commands;

use App\Models\Bot;
use Illuminate\Console\Command;

class AutoTrade extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'trade:auto';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto generates trade according to the the user\'s trade bot';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Bot::with('users')->chunk(5, function ($bots) {
            $response = $bot->users->each->autoTrade($bot);
            die($response);
        });
    }
}
