<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class ServiceMakeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Service class';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $hierarchy = str_replace('\\', '/', $this->argument('name'));

        $className = $this->getClassName($hierarchy);
        $hierarchy = $this->replaceWordFromEnd($hierarchy, '/' . $className, '');

        $className = ucwords($className) . 'Service';
        $fileName = app_path('Services/' . $hierarchy . '/' . $className . '.php');

        if (File::exists($fileName)) {
            $this->error('Service already exists!');
            return;
        }

        $stub = File::get(app_path('stubs/service.stub'));
        $namespace = 'App\\Services';
        $namespace .= filled($hierarchy) ? '\\' . str_replace('/', '\\', $hierarchy) : '';
        $stub = str_replace('{{Namespace}}', $namespace, $stub);
        $stub = str_replace('{{ClassName}}', $className, $stub);

        File::ensureDirectoryExists(app_path('Services/' . $hierarchy));

        File::put($fileName, $stub);

        $this->info('Service created successfully!');
    }

    /**
     * Get the provided class name only
     *
     * @param string $name
     * @return string
     */
    public function getClassName(string $name): string
    {
        $hierarchy = explode('/', $name);
        return $hierarchy[count($hierarchy) - 1];
    }

    /**
     * Replace the given word from the end of a string
     *
     * @param string $string
     * @param string $search
     * @param string $replace
     * @return string
     */
    public function replaceWordFromEnd(string $string, string $search, string $replace): string
    {
        // Find the position of the last occurrence of the word
        $position = strrpos($string, $search);

        // If the word is found
        if ($position !== false) {
            // Replace the word
            $string = substr_replace($string, $replace, $position, strlen($search));
        }

        return $string;
    }
}
