<?php

namespace App\Console\Commands;

use App\Models\Graph;
use Illuminate\Console\Command;
use Faker\Factory as Faker;

class GenerateRandomGraph extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'graph:gen {--nbNodes=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command should create a random graph with nbNodes nodes and random relations.';

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
        $nbNodes = $this->option('nbNodes');
        $faker = Faker::create();
        // Create a Graph :
        $graph = Graph::create([
            'name' => $faker->name(),
            'description' => $faker->sentence(),
        ]);
        // Create nbNodes Nodes
        for ($i = 0; $i < $nbNodes; $i++) {
            $graph->nodes()->create([]);
        }
        // Create nbNodes Random Relations
        for ($i = 0; $i < $nbNodes; $i++) {
            $parent = $graph->nodes->random()->id;
            $child = $graph->nodes->random()->id;
            $graph->relations()->create([
                'parent_id' => $parent,
                'child_id' => $child,
            ]);
        }
        $this->info('Graph has been created successfully!');
    }
}
