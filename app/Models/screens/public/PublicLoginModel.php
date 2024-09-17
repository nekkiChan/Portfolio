<?php

namespace App\Models\screens\public;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\screens\ScreenModel;

class PublicLoginModel extends ScreenModel
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function getValidator(Request $request)
    {
        $conditions = $this->config_data['validate']['conditions'];
        $messages = $this->config_data['validate']['messages'];

        return Validator::make($request->all(), $conditions, $messages);
    }
}
