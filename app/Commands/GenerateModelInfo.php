<?php

namespace App\Commands;

use LaravelZero\Framework\Commands\Command;
use Phar;

class GenerateModelInfo extends Command
{
    protected $signature = 'models {path}';

    protected $description = 'Gets the model information';

    public function handle()
    {
        $path = $this->argument('path');
        $runner = base_path('app/helpers/runner.php');

        $baseDir = __DIR__ . '/../../';
        if ($pharBase = Phar::running()) {
            $baseDir = $pharBase;
        }

        $argv = [
            '',
            $path,
            'models',
        ];

        echo \exec('php ' . $runner . ' ' . \implode(' ', $argv), $output);

        // Here to make compiler happy!
        if ($baseDir && $argv) {
        }

        return;
    }
}
