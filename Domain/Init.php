<?php
namespace Domain;

use Infrastructure\Controller;
use Infrastructure\Helpers;

class Init extends Controller
{
    public $commands;

    public function __construct($commands) {
        $this->commands = $commands;
    }

    public static function Register(array $commands)
    {
       $class =  new Init($commands);
        return $class;
    }

    public function run()
    {
        fwrite(STDOUT, "@Github Repository Manager (Input Command) $~: ");
        $command = Helpers::write();

        # format command
        $formatted = Helpers::format($command);

        # set Repository name
        $repoName = $formatted[1] ?? '';
        $command = $formatted[0]; # actual command

        if(isset($this->commands[$command])):
            $command = $this->commands[$command]['method'];
            $method = Helpers::convertToStudlyCaps($command);
            
            $controller = 'Application\Controllers\Commands';
            
            if(class_exists($controller)):
                $controller_obj  = new $controller($this->commands, $repoName);
                if(is_callable([$controller_obj, $method])):
                    $controller_obj->$method();
                endif;
            endif;
            
        else:
            $this->availableCommands($this->commands);
           Helpers::console($this->help);
        endif;
    }
}