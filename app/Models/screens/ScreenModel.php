<?php

namespace App\Models\screens;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\common\QueryModel;

class ScreenModel
{
    protected $config_path;
    protected $config_data;
    protected $route_path;
    protected $query_model;
    protected $query_data;
    protected $login_user;
    public function __construct(Request $request)
    {
        $path = $request->path();
        $this->config_path = config("screens.path.$path");
        $this->config_data = config("screens.$this->config_path");
        $this->route_path = config("screens.$this->config_path.routepath");
        // querymodel
        $this->query_model = new QueryModel();
        // loginuser
        $this->login_user = [];
        $this->setupLoginUserData();
        // query_data
        $this->query_data = [];
        $this->setupQueryData();
    }

    protected function setupLoginUserData()
    {
        if (Auth::check()) {
            // $base_query_data = $this->config_data['querydata'];
            // foreach ($base_query_data as $table => $query_data) {
            //     $this->query_data[$table] = $this->query_model->getQueryData($query_data);
            // }
            $this->login_user = Auth::user();
        }
    }

    public function getLoginUserData()
    {
        return $this->login_user;
    }

    protected function setupQueryData()
    {
        if (!empty($this->config_data['querydata'])) {
            $base_query_data = $this->config_data['querydata'];
            foreach ($base_query_data as $table => $query_data) {
                $this->query_data[$table] = $this->query_model->getQueryData($query_data);
            }
        }
    }

    public function getQueryData()
    {
        return $this->query_data;
    }
}
