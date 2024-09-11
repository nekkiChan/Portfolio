<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

abstract class Controller
{
    protected $route_path;
    protected $config_path;

    public function __construct(Request $request) {
        $path = $request->path();
    }
}
