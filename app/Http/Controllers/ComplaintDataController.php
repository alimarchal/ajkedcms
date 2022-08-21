<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComplaintDataRequest;
use App\Http\Requests\UpdateComplaintDataRequest;
use App\Models\ComplaintData;

class ComplaintDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreComplaintDataRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComplaintDataRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ComplaintData  $complaintData
     * @return \Illuminate\Http\Response
     */
    public function show(ComplaintData $complaintData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ComplaintData  $complaintData
     * @return \Illuminate\Http\Response
     */
    public function edit(ComplaintData $complaintData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateComplaintDataRequest  $request
     * @param  \App\Models\ComplaintData  $complaintData
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComplaintDataRequest $request, ComplaintData $complaintData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ComplaintData  $complaintData
     * @return \Illuminate\Http\Response
     */
    public function destroy(ComplaintData $complaintData)
    {
        //
    }
}
