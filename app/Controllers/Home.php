<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('iqbal/welcome_message');
    }
}
