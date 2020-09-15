<?php

namespace Project\Commands;

use Chriha\ProjectCLI\Commands\Command;
use Chriha\ProjectCLI\Helpers;

class SetupCommand extends Command
{

    /** @var string */
    protected static $defaultName = 'setup';


    public function configure() : void
    {
        $this->setDescription('Set up the project for the first time');
    }

    public function handle() : void
    {
        if ( ! file_exists(Helpers::projectPath('.env'))) {
            copy(Helpers::projectPath('.env.example'), Helpers::projectPath('.env'));
        }

        $this->call('composer', ['install']);
        $this->call('artisan', ['migrate', '--seed']);
        $this->call('restart');
        $this->info('Project successfully installed');
    }

}

