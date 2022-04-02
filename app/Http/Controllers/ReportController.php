<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $data = DB::table('complaints')
            ->select('office', 'category', DB::raw("count(category) as total"))
            ->groupBy('category')
            ->get();


//        dd($data);
        return view('reports.index',compact('data'));
    }
}
