# Laravel workflow

Use the Symfony Workflow component in Laravel

### Composer Configuration

Include the laravel-workflow package as a dependency in your `composer.json`:

    "picr/laravel-workflow": "dev-master"
    
### Installation

Run `composer install` to download the dependencies.

#### Laravel 5

Add a ServiceProvider to your providers array in `config/app.php`:

```php
'providers' => [

	'Picr\LaravelWorkflow\LaravelWorkflowServiceProvider',

]
```

Add the `Workflow` facade to your facades array:

```php
	'Workflow' => 'Picr\LaravelWorkflow\Facades\WorkflowFacade',
```
