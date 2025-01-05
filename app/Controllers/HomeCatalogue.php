<?php

namespace App\Controllers;

class HomeCatalogue extends BaseController
{
    public function index(): string
    {
        return view('favian/welcome_message');
    }
}
