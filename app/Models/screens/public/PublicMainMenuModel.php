<?php

namespace App\Models\screens\public;

use Illuminate\Http\Request;
use App\Models\screens\ScreenModel;

class PublicMainMenuModel extends ScreenModel
{
    public function __construct(Request $request) {
        parent::__construct($request);
    }
}
