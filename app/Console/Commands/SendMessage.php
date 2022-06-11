<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'message:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily messages';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        echo 'this is my task scheduler';
    }
}
