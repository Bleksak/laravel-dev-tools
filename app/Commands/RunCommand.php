<?php

namespace App\Commands;

use LaravelZero\Framework\Commands\Command;
use Phar;

use function base_path;

class RunCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'run-command {path} {commandtorun}';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $path = $this->argument('path');
        $command = $this->argument('commandtorun');
        $runner = base_path('app/helpers/runner.php');

        $baseDir = __DIR__ . '/../../';
        if ($pharBase = Phar::running()) {
            $baseDir = $pharBase;
        }

        $argv = [
            '',
            $path,
            'command',
            $command
        ];

        echo \exec('php ' . $runner . ' ' . \implode(' ', $argv), $output);

        // Here to make compiler happy!
        if ($baseDir && $argv) {
        }

        return;
    }
}
