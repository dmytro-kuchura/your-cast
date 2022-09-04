<?php

namespace App\Console\Commands;

use App\Helpers\ElasticLoggerHelper;
use Illuminate\Console\Command;

class ScheduledTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scheduled:task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scheduler Task Test';

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
        ElasticLoggerHelper::error('This is a brand new Scheduled Task', []);

        return true;
    }
}
