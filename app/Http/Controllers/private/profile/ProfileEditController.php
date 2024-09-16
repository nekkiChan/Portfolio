<?php

namespace App\Http\Controllers\private\profile;

use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Http\Controllers\Controller;

class ProfileEditController extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    /**
     * 画面表示
     */
    public function index(Request $request): View
    {
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
        switch ($request->input('button')) {
            case 'update':
                return $this->screen_model->handleUpdate($request);
            case 'back':
                return $this->screen_model->handleBack($request);
            default:
                return redirect()->back();
        }
    }
}
