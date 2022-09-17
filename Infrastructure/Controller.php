<?php

namespace Infrastructure;

abstract class Controller
{

    public $help;
    public $reponame;

    public function __construct(array $commands = [], string $reponame = '')
    {
        $this->reponame = $reponame;
        $this->availableCommands($commands);
    }

    public function availableCommands($commands)
    {
        $error = "Available Commands: " . PHP_EOL;

        foreach ($commands as $command => $desc) :
            $error .= $command . ": " . $desc['command'] . PHP_EOL;
        endforeach;

        $this->help = $error;
    }

}
