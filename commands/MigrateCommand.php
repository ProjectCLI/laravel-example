<?php

namespace Project\Commands;

use Chriha\ProjectCLI\Commands\Command;

class MigrateCommand extends Command
{

    /** @var string */
    protected static $defaultName = 'db:migrate';


    public function configure() : void
    {
        $this->setDescription('Dump autoload files and run migrations');
    }

    public function handle() : void
    {
        $this->call('optimize');
        $this->call('artisan', ['migrate']);
    }

}

