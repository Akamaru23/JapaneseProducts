<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Comments;
use Carbon\Carbon;

class ComentsDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'comments:cleanup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete comments older than 1 day';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $count = Comments::where('created_at', '<', now()->subDay())->delete();
        $this->info("我刪除{$count}件的舊訊息");
    }
}
