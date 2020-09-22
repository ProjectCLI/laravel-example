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

        if ( ! file_exists(Helpers::projectPath('src/.env'))) {
            copy(Helpers::projectPath('src/.env.example'), Helpers::projectPath('src/.env'));
        }

        $this->call('composer', ['install']);
        $this->call('artisan', ['key:generate']);
        $this->call('restart');
        $this->call('artisan', ['migrate:install']);
        $this->call('artisan', ['migrate', '--seed']);
        $this->info('Project successfully installed');
    }

}

