<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRemarkRequest;
use App\Http\Requests\UpdateRemarkRequest;
use App\Models\Complaint;
use App\Models\Remark;

class RemarkController extends Controller
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
    public function create(Complaint $complaint)
    {
        return view('remark.create', compact('complaint'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreRemarkRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRemarkRequest $request)
    {


        if ($request->has('file_attachments_1')) {
            $path = $request->file('file_attachments_1')->store('', 'public');
            $request->merge(['file_attachments' => $path]);
        }
//        dd($request->all());
        $request->merge(['user_id' => $request->user_id]);
        $remark = Remark::create($request->all());

        $complaint = Complaint::find($request->complaint_id);
        $complaint->status = $request->status;
        $complaint->user_id = $request->user_id;
        $complaint->last_update_user_id = $remark->user_id;
        $complaint->update();


        session()->flash('message', 'Remarks successfully updated.');

        if (auth()->user()->hasRole('user')) {
            return to_route('dashboard');
        } else {
            return to_route('complaint.show', [$request->complaint_id]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Remark $remark
     * @return \Illuminate\Http\Response
     */
    public function show(Remark $remark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Remark $remark
     * @return \Illuminate\Http\Response
     */
    public function edit(Remark $remark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateRemarkRequest $request
     * @param \App\Models\Remark $remark
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRemarkRequest $request, Remark $remark)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Remark $remark
     * @return \Illuminate\Http\Response
     */
    public function destroy(Remark $remark)
    {
        //
    }
}
