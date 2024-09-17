<?php

namespace App\Models\screens\private\profile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\screens\ScreenModel;

class PrivateProfileModel extends ScreenModel
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
}
