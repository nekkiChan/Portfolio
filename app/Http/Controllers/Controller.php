<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

abstract class Controller
{
    protected $config_path;
    protected $route_path;

    public function __construct(Request $request)
    {
        $path = $request->path();
        $this->config_path = config("screen.path.$path");
        $this->route_path = config("screen.$this->config_path.routepath");
    }
}
