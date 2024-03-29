<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\ComplaintData;
use App\Models\Office;
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
                ->groupBy('office')
                ->get();

            return view('reports.index', compact('data', 'date_from', 'date_to'));
        }


        DB::enableQueryLog();
        $data = DB::table('complaints')
            ->select('category', 'office', DB::raw("count(*) as total"))
            ->groupBy('office')
            ->get();

//        dd(DB::getQueryLog());
        return view('reports.index', compact('data'));
    }


    public function progressReport(Request $request)
    {

        date_default_timezone_set('Asia/Karachi');
        $today_date = null;
        if ($request->input('date')) {
            $today_date = Carbon::parse($request->date);
        } else {
            $today_date = Carbon::now();
        }
        $query_data = ComplaintData::whereBetween('created_at', [$today_date->format('Y-m-d 00:00:00'), $today_date->format('Y-m-d 23:59:59')])->get();

        $final_data = [];

        foreach (Office::all() as $item) {
            $final_data[$item->circle][$item->name]['New'] = 0;
            $final_data[$item->circle][$item->name]['In Process'] = 0;
            $final_data[$item->circle][$item->name]['Closed'] = 0;
        }

        foreach ($query_data as $item) {
            $final_data[Office::find($item->office_id)->circle][Office::find($item->office_id)->name]['New'] = $item->new;
            $final_data[Office::find($item->office_id)->circle][Office::find($item->office_id)->name]['In Process'] = $item->in_process;
            $final_data[Office::find($item->office_id)->circle][Office::find($item->office_id)->name]['Closed'] = $item->closed;
        }

        $new = $query_data->sum('new');
        $in_process = $query_data->sum('in_process');
        $closed = $query_data->sum('closed');


        /*
                $start_of_month = null;
                $end_of_month = null;
                $previous_month = null;

                $final_data = [];

                if ($request->has('month')) {


                    $start_of_month = Carbon::parse($request->month)->startOfMonth();
                    $end_of_month = Carbon::parse($request->month)->endOfMonth();
                    $previous_month = Carbon::parse($request->month)->subMonth()->startOfMonth();

                    $final_data = [];
                    $status_wise_data = ComplaintData::whereMonth('created_at', $start_of_month->format('m'))->whereYear('created_at', $end_of_month->format('Y'))->get();

                    foreach (Office::all() as $item) {
                        $final_data[$item->circle][$item->name]['Opening Balance'] = 0;
                        $final_data[$item->circle][$item->name]['New'] = 0;
                        $final_data[$item->circle][$item->name]['In Process'] = 0;
                        $final_data[$item->circle][$item->name]['Closed'] = 0;
                    }

                    foreach ($status_wise_data as $item) {

                        $itm = ComplaintData::where('office_id', $item->office_id)->whereMonth('created_at', $previous_month->format('m'))->whereYear('created_at', $previous_month->format('Y'))->first();


                        if (!empty($itm)) {
                            $final_data[Office::find($item->office_id)->circle][Office::find($item->office_id)->name]['Opening Balance'] = $itm->new + $itm->in_process;
                        } else {
                            $final_data[Office::find($item->office_id)->circle][Office::find($item->office_id)->name]['Opening Balance'] = 0;
                        }

                        $final_data[Office::find($item->office_id)->circle][Office::find($item->office_id)->name]['New'] = $item->new;
                        $final_data[Office::find($item->office_id)->circle][Office::find($item->office_id)->name]['In Process'] = $item->in_process;
                        $final_data[Office::find($item->office_id)->circle][Office::find($item->office_id)->name]['Closed'] = $item->closed;

                    }
                } else {

                    $start_of_month = Carbon::now()->startOfMonth();
                    $end_of_month = Carbon::now()->endOfMonth();
                    $previous_month = Carbon::now()->subMonth()->startOfMonth();


                    foreach (Office::all() as $item) {

                        DB::enableQueryLog();
                        $itm = ComplaintData::where('office_id', $item->id)->whereMonth('created_at', $previous_month->format('m'))->whereYear('created_at', $previous_month->format('Y'))->where('office_id', $item->id)->first();

                        if (!empty($itm)) {
                            $final_data[$item->circle][$item->name]['Opening Balance'] = $itm->new + $itm->in_process;
                        } else {
                            $final_data[$item->circle][$item->name]['Opening Balance'] = 0;
                        }

                        $final_data[$item->circle][$item->name]['New'] = Complaint::whereMonth('created_at', $start_of_month->format('m'))->whereYear('created_at', $end_of_month->format('Y'))->where('office_id', $item->id)->count();
        //
        //                    Complaint::whereBetween('complaint_date', [$start_of_month->format('Y-m-d'), $end_of_month->format('Y-m-d')])
        //                        ->where('office', $item->id)->count();
        //
        //                $y = Complaint::whereMonth('created_at', $start_of_month->format('m'))->whereYear('created_at', $end_of_month->format('Y'))->where('office_id', $item->id)->count();
        ////                dd($y);


                        $final_data[$item->circle][$item->name]['In Process'] = 0;
                        $final_data[$item->circle][$item->name]['Closed'] = Complaint::whereMonth('updated_at', $start_of_month->format('m'))->whereYear('updated_at', $end_of_month->format('Y'))->where('office_id', $item->id)->where('status', 'Closed')->get()->count();
                    }
                }

*/

//                dd($final_data);

        return view('reports.progress', compact('final_data','today_date','new','in_process','closed'));
    }
}
