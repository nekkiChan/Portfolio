<?php

namespace App\Models\screens;

use Illuminate\Http\Request;
use App\Models\common\QueryModel;

class ScreenModel
{
    protected $config_path;
    protected $config_data;
    protected $route_path;
    protected $query_model;
    protected $query_data;
    public function __construct(Request $request)
    {
        $path = $request->path();
        $this->config_path = config("screens.path.$path");
        $this->config_data = config("screens.$this->config_path");
        $this->route_path = config("screens.$this->config_path.routepath");
        // querymodel
        $this->query_model = new QueryModel();
        $this->query_data = [];
        $this->setupQueryData();
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
