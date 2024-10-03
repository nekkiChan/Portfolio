<?php

namespace App\Models\screens\private\contents\subcategory\list;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\screens\ScreenModel;

class PrivateContentsSubCategoryListModel extends ScreenModel
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
}
