<?php
namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

class EntriesMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:entries';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Entries class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Repository';


    public function handle()
    {
        if (parent::handle() === false && ! $this->option('force')) {
            return false;
        }

        if ($this->option('all')) {
            $this->input->setOption('factory', true);
            $this->input->setOption('migration', true);
            $this->input->setOption('controller', true);
            $this->input->setOption('repository', true);
            $this->input->setOption('service', true);
            $this->input->setOption('presenter', true);
            $this->input->setOption('repository', true);
        }

        if ($this->option('factory')) {
            $this->createFactory();
        }
        if ($this->option('migration')) {
            $this->createMigration();
        }
        if ($this->option('repository')) {
            $this->createRepository();
        }
        if ($this->option('service')) {
            $this->createService();
        }
        if ($this->option('presenter')) {
            $this->createPresenter();
        }
        if ($this->option('controller')) {
            $this->createController();
        }

    }

    /**
     * Create a model factory for the model.
     *
     * @return void
     */
    protected function createFactory()
    {
        $factory = Str::studly(class_basename($this->argument('name')));

        $this->call('make:factory', [
            'name' => "{$factory}Factory",
            '--model' => $this->qualifyClass($this->getNameInput()),
        ]);
    }

    /**
     * Create a migration file for the model.
     *
     * @return void
     */
    protected function createMigration()
    {
        $table = Str::snake(Str::pluralStudly(class_basename($this->argument('name'))));


        $this->call('make:migration', [
            'name' => "create_{$table}_table",
            '--create' => $table,
        ]);
    }

    /**
     * Create a entiry for the model.
     *
     * @return void
     */
    protected function createController()
    {
        $controller = Str::studly(class_basename($this->argument('name')));

        $modelName = $this->qualifyClass($this->getNameInput());

        $this->call('make:controller', [
            'name' => "{$controller}Controller",
            '--model' => $this->option('resource') ? $modelName : null,
        ]);
    }
    /**
     * Create a controller for the model.
     *
     * @return void
     */
    protected function createRepository()
    {
        $repository = Str::studly(class_basename($this->argument('name')));
        $this->call('make:repository', [
            'name' => "{$repository}Repository"
        ]);
    }
    protected function createService()
    {
        $service = Str::studly(class_basename($this->argument('name')));

        $this->call('make:service', [
            'name' => "{$service}Service"
        ]);
    }
    protected function createPresenter()
    {
        $presenter = Str::studly(class_basename($this->argument('name')));
        $this->call('make:presenter', [
            'name' => "{$presenter}Presenter"
        ]);
    }

    protected function getStub()
    {
        return __DIR__.'/stubs/entries.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace;
    }
    protected function getOptions()
    {
        return [
            ['all'          , 'a', InputOption::VALUE_NONE, 'Generate a migration, factory, and resource controller for the model'],
            ['controller'   , 'c', InputOption::VALUE_NONE, 'Create a new controller for the model'],
            ['factory'      , 'f', InputOption::VALUE_NONE, 'Create a new factory for the model'],
            ['force'        , null, InputOption::VALUE_NONE, 'Create the class even if the model already exists'],
            ['migration'    , 'm', InputOption::VALUE_NONE, 'Create a new migration file for the model'],
            ['resource'    , 'r', InputOption::VALUE_NONE, 'Create a new migration file for the model'],

            ['repository'   , 'R', InputOption::VALUE_NONE, 'Indicates if the generated controller should be a resource controller'],
            ['service'      , 'S', InputOption::VALUE_NONE, 'Create a new factory for the service'],
            ['presenter'    , 'P', InputOption::VALUE_NONE, 'Create a new factory for the presenter'],
        ];
    }
}
