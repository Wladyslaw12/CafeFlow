<?php

namespace App\Http\Controllers;

use App\Actions\RemainAction;
use App\Models\Deliver;
use App\Models\DeliverProduct;
use App\Models\Product;
use App\Models\User;
use App\Models\WriteOffProduct;
use Illuminate\Http\Request;

class RemainController extends Controller
{
    public function index()
    {
        $data = RemainAction::run();

        return view('admin.tables.remains',
            compact('data'));
    }
}
