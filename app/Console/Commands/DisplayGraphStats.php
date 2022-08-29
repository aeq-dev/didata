<?php

namespace App\Console\Commands;

use App\Models\Graph;
use Illuminate\Console\Command;

class DisplayGraphStats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'graph:stats {--gid=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $gid = $this->option('gid');
        $graph = Graph::withCount(['nodes', 'relations'])->find($gid);
        if (!$graph)
            $this->error('Graph not found!');
        else {
            $this->info('Graph Stats : ');
            $this->line('Name : ' . $graph->name);
            $this->line('Description : ' . $graph->description);
            $this->line('Number of nodes : ' . $graph->nodes_count);
            $this->line('Number of relations : ' . $graph->relations_count);
        }
    }
}
