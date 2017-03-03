<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use View;

class DashboardController extends Controller
{
    public function getDashboardIndex()
    {
        return View::make('dashboard.index');
    }
}
