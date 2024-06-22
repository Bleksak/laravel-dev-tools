<?php

namespace App\Commands;

use LaravelZero\Framework\Commands\Command;
use Phar;

class GenerateRoutes extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'routes {path}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Gets routes as json';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
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
            'routes',
        ];

        echo \exec('php ' . $runner . ' ' . \implode(' ', $argv), $output);

        // Here to make compiler happy!
        if ($baseDir && $argv) {
        }

        return;
    }
}
