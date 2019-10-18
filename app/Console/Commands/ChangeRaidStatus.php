<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ChangeRaidStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'raidstat:change';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Changes the status from unhatched to hacthed and resets time.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
    }
}
