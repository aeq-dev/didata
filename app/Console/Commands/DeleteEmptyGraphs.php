<?php

namespace App\Console\Commands;

use App\Models\Graph;
use Illuminate\Console\Command;

class DeleteEmptyGraphs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'graph:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command should delete all empty graphs.';

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
     * @return int
     */
    public function handle()
    {
        $nbDeleted = Graph::doesnthave('nodes')->delete();
        $this->info($nbDeleted . ' Graphs has been deleted successfully!');
    }
}
