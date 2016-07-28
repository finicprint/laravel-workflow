<?php

namespace Picr\LaravelWorkflow;

use Exception;
use Illuminate\Support\ServiceProvider;
use Picr\LaravelWorkflow\Events\EventDispatcher;
use Symfony\Component\Workflow\Definition;
use Symfony\Component\Workflow\MarkingStore\PropertyAccessorMarkingStore;
use Symfony\Component\Workflow\MarkingStore\ScalarMarkingStore;
use Symfony\Component\Workflow\Registry;
use Symfony\Component\Workflow\Transition;
use Symfony\Component\Workflow\Workflow;

class WorkflowServiceProvider extends ServiceProvider
{
    protected $commands = [
        'Picr\LaravelWorkflow\Commands\WorkflowGraphvizDumpCommand',
    ];

    /**
     * Bootstrap the application services...
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__ . '/../../config/config.php';
        $this->publishes([$configPath => config_path('laravel-workflow.php')], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);
        $this->registerWorkflow();
    }

    /**
     * Register the Workflow
     */
    public function registerWorkflow()
    {
        $this->app->singleton('workflow', function ($app) {
            $registry = new Registry();
            foreach ($app['config']['workflow'] as $name => $workflowData) {
                $definition = new Definition($workflowData['places']);
                foreach ($workflowData['transitions'] as $transitionName => $transition) {
                    $definition->addTransition(new Transition($transitionName, $transition['from'], $transition['to']));
                }

                if (isset($workflowData['marking_store']['type'])) {
                    switch ($workflowData['marking_store']['type']) {
                        case 'property_accessor':
                            $markingStore = new PropertyAccessorMarkingStore();
                            break;
                        case 'scalar':
                            $markingStore = new ScalarMarkingStore();
                            break;
                        default:
                            throw new Exception("There needs to be a marking store");
                    }
                }
                $workflow = new Workflow($definition, $markingStore, new EventDispatcher(), $name);

                foreach ($workflowData['supports'] as $supportedClass) {
                    $registry->add($workflow, $supportedClass);
                }
            }

            return $registry;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['workflow'];
    }
}