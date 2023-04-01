<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ActivityLog;

class ActivityLogController extends Controller
{
    public function index()
    {
        $items = ActivityLog::with('user')->orderBy('id','DESC')->get();
        return view('pages.log')->with(['items' => $items]);
    }
}
