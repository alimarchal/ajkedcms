<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Remark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $list_of_office_status = [
            'Muzaffarabad' => ['New' => 0, 'In Process' => 0, 'Closed' => 0],
            'Garhi Dupatta' => ['New' => 0, 'In Process' => 0, 'Closed' => 0],
            'Jhelum Valley' => ['New' => 0, 'In Process' => 0, 'Closed' => 0],
            'Athmuqam' => ['New' => 0, 'In Process' => 0, 'Closed' => 0],
            'Bagh' => ['New' => 0, 'In Process' => 0, 'Closed' => 0],
            'Rawalakot' => ['New' => 0, 'In Process' => 0, 'Closed' => 0],
            'Hajira' => ['New' => 0, 'In Process' => 0, 'Closed' => 0],
            'Pallandri' => ['New' => 0, 'In Process' => 0, 'Closed' => 0],
            'Kahutta/Havali' => ['New' => 0, 'In Process' => 0, 'Closed' => 0],
            'Abbaspur' => ['New' => 0, 'In Process' => 0, 'Closed' => 0],
            'Store Division Muzaffarabad' => ['New' => 0, 'In Process' => 0, 'Closed' => 0],
            'Chief Engineer Electricity' => ['New' => 0, 'In Process' => 0, 'Closed' => 0],
        ];

        $office_wise = DB::table('complaints')->select('office', 'status', DB::raw('count(status) as total'))->groupBy('office','status')->get();

        foreach($office_wise as $ow)
        {
            $list_of_office_status[$ow->office][$ow->status] = $ow->total;
        }

        $status_wise = ['New' => 0, 'In Process' => 0, 'Closed' => 0];

        $status_wise_complaints = DB::table('complaints')->select('status', DB::raw('count(status) as total'))->groupBy('status')->get();

        foreach($status_wise_complaints as $swc)
        {
            $status_wise[$swc->status] = $swc->total;
        }

        $category_wise_complaints = DB::table('complaints')->select('category', DB::raw('count(category) as total'))->groupBy('category')->get();
        $category_wise_complaints = DB::table('complaints')->select('category', DB::raw('count(category) as total'))->groupBy('category')->get();
        $monthly_complaints = DB::select("SELECT DATE_FORMAT(complaint_date, '%M') AS 'month', COUNT(complaint_date) AS 'total' FROM complaints GROUP BY DATE_FORMAT(complaint_date, '%M');");



        return view('dashboard', compact('list_of_office_status','status_wise','category_wise_complaints','monthly_complaints'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
