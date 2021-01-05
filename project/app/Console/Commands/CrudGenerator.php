<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CrudGenerator extends Command
{

    protected $signature = 'crud:generator  {name : Class (singular) for example User}';

    protected $description = 'Create CRUD operations for better performance';

    public function __construct()
    {
        parent::__construct();
    }

    protected function getStub($type)
    {
        return file_get_contents(resource_path("stubs/$type.stub"));
    }

    protected function model($name)
    {
        $modelTemplate = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->getStub('Model')
        );

        file_put_contents(app_path("/Models/{$name}.php"), $modelTemplate);
    }


    protected function controller($name)
    {
        $controllerTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}'
            ],
            [
                $name,
                strtolower(str_plural($name)),
                strtolower($name)
            ],
            $this->getStub('Controller')
        );

        file_put_contents(app_path("/Http/Controllers/Admin/{$name}Controller.php"), $controllerTemplate);
    }

    protected function index($name)
    {
        $indexTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralCase}}',
                '{{modelNameUpperCase}}',
                '{{modelNameUpperCaseFirst}}',
                '{{modelNameSingularLowerCase}}'
            ],
            [
                $name,
                str_plural($name),
                strtoupper($name),
                ucfirst($name),
                strtolower($name)
            ],
            $this->getStub('index')
        );
        $new = strtolower($name);
        $path = resource_path("/views/admin/{$new}");
        mkdir($path, 0777, true);
        file_put_contents(resource_path("/views/admin/{$new}/index.blade.php"), $indexTemplate);
    }

    protected function create($name)
    {
        $createTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralCase}}',
                '{{modelNameUpperCase}}',
                '{{modelNameUpperCaseFirst}}',
                '{{modelNameSingularLowerCase}}'
            ],
            [
                $name,
                str_plural($name),
                strtoupper($name),
                ucfirst($name),
                strtolower($name)
            ],
            $this->getStub('create')
        );
        $new = strtolower($name);
        file_put_contents(resource_path("/views/admin/{$new}/create.blade.php"), $createTemplate);
    }

    protected function edit($name)
    {
        $editTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralCase}}',
                '{{modelNameUpperCase}}',
                '{{modelNameUpperCaseFirst}}',
                '{{modelNameSingularLowerCase}}'
            ],
            [
                $name,
                str_plural($name),
                strtoupper($name),
                ucfirst($name),
                strtolower($name)
            ],
            $this->getStub('edit')
        );
        $new = strtolower($name);
        file_put_contents(resource_path("/views/admin/{$new}/edit.blade.php"), $editTemplate);
    }

    public function handle()
    {
            $name = $this->argument('name');
            $lower = strtolower($name);
            $this->controller($name);
            $this->model($name);
            $this->index($name);
            $this->create($name);
            $this->edit($name);
            File::append(base_path('routes/web.php'),
         "\n".'/*------------------- Crud Operation For '.$name.' -------------------*/'."\n\n".
        'Route::get(\''.'/'.$lower."/datatables', 'Admin".'\\'."{$name}Controller@datatables')->name('admin-{$lower}-datatables');"."\n".     
        'Route::get(\''.'/'.$lower."', 'Admin".'\\'."{$name}Controller@index')->name('admin-{$lower}-index');"."\n".
        'Route::get(\''.'/'.$lower."/create', 'Admin".'\\'."{$name}Controller@create')->name('admin-{$lower}-create');"."\n".
        'Route::post(\''.'/'.$lower."/create', 'Admin".'\\'."{$name}Controller@store')->name('admin-{$lower}-store');"."\n".
        'Route::get(\''.'/'.$lower."/edit/{id}', 'Admin".'\\'."{$name}Controller@edit')->name('admin-{$lower}-edit');"."\n".
        'Route::post(\''.'/'.$lower."/edit/{id}', 'Admin".'\\'."{$name}Controller@update')->name('admin-{$lower}-update');"."\n".
        'Route::get(\''.'/'.$lower."/delete/{id}', 'Admin".'\\'."{$name}Controller@destroy')->name('admin-{$lower}-delete');"."\n"
        );

    }
}
