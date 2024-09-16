<?php

namespace App\Http\Controllers\public\mainmenu;

use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Http\Controllers\Controller;

class MainMenuController extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
    /**
     * Display the user's profile form.
     */
    public function index(Request $request): View
    {
        foreach ($this->query_data as $name => $data) {
            $this->view_data->with($name, $data);
        }

        return $this->view_data;
    }
}
