<?php

namespace App\Http\Controllers;

use App\Actions\RemainAction;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $data = RemainAction::run();

        return view('admin.tables.inventory',
            compact('data'));
    }
}
