<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ActivityLog;
use Yajra\DataTables\Facades\DataTables;

class ActivityLogController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(ActivityLog::with('user')->where('causer_id','!=', null)->orderBy('id','DESC')->get())->addIndexColumn()->toJson();
        }

        return view('pages.log');

    }
}
