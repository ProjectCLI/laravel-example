<?php

namespace Project\Commands;

use Chriha\ProjectCLI\Commands\Command;
use Chriha\ProjectCLI\Helpers;

class ResetCommand extends Command
{

    /** @var string */
    protected static $defaultName = 'app:reset';


    public function configure() : void
    {
        $this->setDescription('Completely reset the application, including the data');
    }

    public function handle() : void
    {
        Helpers::rmdir(Helpers::projectPath('src/vendor'));
        Helpers::rmdir(Helpers::projectPath('src/node_modules'));

        $this->call('composer', ['install']);
        $this->call('artisan', ['config:clear']);
        $this->call('db:fresh');

        $this->call('npm', ['install']);
        $this->call('npm', ['run', 'dev']);
    }

}

