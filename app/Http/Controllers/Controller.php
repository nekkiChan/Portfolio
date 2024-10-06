<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

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
        if (!empty($request->query())) {
            $path = explode('?', $path)[0];
        }
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
            foreach ($this->query_data as $name => $data) {
                session()->flash($name, $data);
            }
        }
    }

    public function setupViewData($request)
    {
        if (!empty($this->route_path)) {

            session(['route_path' => $this->route_path]);

            session(['config_path' => $this->config_path]);

            $this->view_data = view($this->route_path)
                ->with('request', $request)
                ->with('owner_data', $this->screen_model->getOwnerData())
                ->with('route_path', $this->route_path)
                ->with('config_path', $this->config_path);
        }
    }

    /**
     * 画面表示
     */
    public function index(Request $request)
    {
        if ($this->screen_model->redirectByRoleLevel()) {
            return $this->screen_model->redirectByRoleLevel();
        }

        foreach ($this->query_data as $name => $data) {
            $this->view_data->with($name, $data);
        }

        return $this->view_data;
    }

    /**
     * アクション
     */
    public function action(Request $request)
    {
        if (empty($this->config_data['model'])) {
            return redirect()->back();
        }
        return $this->screen_model->action($request);
    }
}
