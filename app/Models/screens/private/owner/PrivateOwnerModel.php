<?php

namespace App\Models\screens\private\owner;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\screens\ScreenModel;

class PrivateOwnerModel extends ScreenModel
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
}
