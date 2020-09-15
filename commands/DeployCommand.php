<?php

/**
 * Description:
 * adf
 */

namespace Project\Commands;

use Chriha\ProjectCLI\Commands\Command;
use Symfony\Component\Console\Input\InputArgument;

class DeployCommand extends Command
{

    /** @var string */
    protected static $defaultName = 'deploy';

    /** @var string */
    protected $description = 'Deploy the application';

    /** @var array */
    protected $environments = ['stage', 'production'];


    public function configure()
    {
        $this->addArgument('tag', InputArgument::REQUIRED, 'The tag to deploy', null);
        $this->addArgument('environment', InputArgument::OPTIONAL, 'The environment to deploy to', 'stage');
    }

    public function handle() : void
    {
        $env = $this->argument('environment');
        $tag = $this->argument('tag');

        if ( ! in_array($env, $this->environments)) {
            $this->abort('Invalid environment: ' . $this->option('environment'));
        }

        if ($env === 'production' && ! $this->confirm("You are deploying '{$tag}' to production")) {
            $this->abort('Deployment aborted!');
        }

        $this->info("Application successfully deployed");
    }

}

