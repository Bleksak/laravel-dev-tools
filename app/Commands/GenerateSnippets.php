<?php

namespace App\Commands;

use LaravelZero\Framework\Commands\Command;
use Phar;

use function base_path;

class GenerateSnippets extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'snippets {path}';

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
            'snippets',
        ];

        echo \exec('php ' . $runner . ' ' . \implode(' ', $argv), $output);

        // Here to make compiler happy!
        if ($baseDir && $argv) {
        }

        return;
    }
}
