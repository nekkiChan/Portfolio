<?php

namespace App\Models\screens\private\users\edit;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\screens\ScreenModel;
use Illuminate\Database\Eloquent\Collection;

class UsersEditModel extends ScreenModel
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
}
