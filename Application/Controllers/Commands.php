<?php

namespace Application\Controllers;

use Application\Http;
use Infrastructure\Controller;
use Infrastructure\Helpers;
use GuzzleHttp;

class Commands extends Controller
{
    public function help()
    {
        Helpers::console($this->help);
    }

    public function create()
    {
        if($this->reponame == "") Helpers::console("Please pass a repository name");

        (new Http)->post($this->reponame);
    }

    public function repositories()
    {
        (new Http)->get();
    }

    public function cancel()
    {
        exit;
    }
}
