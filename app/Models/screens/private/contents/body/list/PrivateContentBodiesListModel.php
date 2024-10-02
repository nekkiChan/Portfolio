<?php

namespace App\Models\screens\private\contents\body\list;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\screens\ScreenModel;

class PrivateContentBodiesListModel extends ScreenModel
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
}
