<?php

namespace Project\Commands;

use Chriha\ProjectCLI\Commands\Command;
use Symfony\Component\Process\Process;

class UpdateCommand extends Command
{

    /** @var string */
    protected static $defaultName = 'update';


    public function configure() : void
    {
        $this->setDescription('Pull changes and reset the app');
    }

    public function handle() : void
    {
        $this->spinner('Pull latest changes', new Process(['git', 'pull']));
        $this->call('artisan', ['config:clear']);
    }

}

