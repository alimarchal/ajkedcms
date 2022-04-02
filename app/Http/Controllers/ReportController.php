<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(Request $request)
    {


        if ($request->has('date_range')) {
            $datetime1 = null;
            $datetime2 = null;

            if (isset($request->date_range) && !empty($request->date_range)) {
                $dates = explode(' – ', $request->date_range);
                $fdate = @$dates[0];
                $tdate = @$dates[1];
                if (!empty($fdate) && !empty($tdate)) {
                    $datetime1 = new \DateTime($fdate);
                    $datetime2 = new \DateTime($tdate);
                }
            }

            $date_from = null;
            $date_to = null;

            if (!empty($request->input('date_range'))) {
                $date_from = $datetime1->format('Y-m-d');
                $date_to = $datetime2->format('Y-m-d');
            }


            $data = DB::table('complaints')
                ->select('office', 'category', DB::raw("count(category) as total"))
                ->whereBetween('complaint_date', [$date_from, $date_to])
                ->groupBy('category')
                ->get();

            return view('reports.index', compact('data', 'date_from', 'date_to'));
        }


        $data = DB::table('complaints')
            ->select('office', 'category', DB::raw("count(category) as total"))
            ->groupBy('category')
            ->get();

        return view('reports.index', compact('data'));
    }
}
