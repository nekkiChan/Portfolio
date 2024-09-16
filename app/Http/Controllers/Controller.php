<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

abstract class Controller
{
    protected $config_path;
    protected $config_data;
    protected $route_path;
    protected $view_data;
    protected $screen_model;
    protected $query_data;

    public function __construct(Request $request)
    {
        $path = $request->getRequestUri();
        $this->config_path = config("screens.path.$path");
        $this->config_data = config("screens.$this->config_path");
        $this->route_path = config("screens.$this->config_path.routepath");
        // screenmodel
        $this->setupScreenModel($request);
        // viewdata
        $this->setupViewData($request);
    }

    public function setupScreenModel($request)
    {
        if (!empty($this->config_data['model'])) {
            $this->screen_model = app($this->config_data['model'], ['request', $request]);
            $this->query_data = $this->screen_model->getQueryData();
        }
    }

    public function setupViewData($request)
    {
        if (!empty($this->route_path)) {
            $this->view_data = view($this->route_path)
                ->with('request', $request)
                ->with('route_path', $this->route_path)
                ->with('config_path', $this->config_path)
                ->with('login_user', $this->screen_model->getLoginUserData());
        }
    }
}
