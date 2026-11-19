<?php

namespace App\Http\Controllers;

class GreetController extends Controller
{
    public function greet($name)
    {
        return view('greet', ['name' => $name]);
    }
}
