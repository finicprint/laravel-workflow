<?php

namespace Picr\LaravelWorkflow\Commands;

use Config;
use Exception;
use Illuminate\Console\Command;
use Symfony\Component\Workflow\Dumper\GraphvizDumper;
use ReflectionProperty;
use Workflow;

class WorkflowGraphvizDumpCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'workflow:graphviz-dump
     {workflow : name of workflow from configuration}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'GraphvizDumper dumps a workflow as a graphviz file.
    You can convert the generated dot file with the dot utility (http://www.graphviz.org/):';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $workflowName = $this->argument('workflow');
        $config = Config::get('workflow');
        if (!isset($config[$workflowName])) {
            throw new Exception("There is not a workflow called $workflowName configured.");
        }
        $className = $config[$workflowName]['supports'];

        $workflow = Workflow::get($className, $workflowName);

        $property = new ReflectionProperty($workflow, 'definition');
        $property->setAccessible(true);
        $definition = $property->getValue($workflow);

        $dumper = new GraphvizDumper();
        $this->output->writeln($dumper->dump($definition));
    }
}