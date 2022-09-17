<?php
require __DIR__ . '/vendor/autoload.php';

use Domain\Init;

Init::Register([
    'help' => [
        "command" => "help",
        'method' => 'help'
    ],
    'cancel' => [
        "command" => "Cancel Operation",
        'method' => 'cancel'
    ],
    'new' => [
        'command' => "Create new Github Repository",
        'method' => "create"
    ],
    'get' => [
        'command' => "Get the list of repositories",
        'method' => "repositories"
    ]
])->run();
