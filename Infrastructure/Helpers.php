<?php
namespace Infrastructure;

class Helpers
{
    public static function convertToStudlyCaps($string)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    }

    public static function convertToCamelCase($string)
    {
        return lcfirst(self::convertToStudlyCaps($string));
    }

    public static function write()
    {
        $input = fgets(STDIN);
        return trim($input);
    }

    public static function console($message)
    {
        exit(fwrite(STDOUT, $message));
    }

    public static function format($command)
    {
        $commands = explode(' ', $command);
        if(count($commands) > 2) self::console("Type 'help' to see available commands");
        return $commands;
    }
}