<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComplaintRequest;
use App\Http\Requests\UpdateComplaintRequest;
use App\Models\Complaint;
use App\Models\Office;
use Illuminate\Support\Facades\Storage;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class ComplaintController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:viewdashboard')->only('create');
        $this->middleware('permission:show')->only('index');
        $this->middleware('permission:edit')->only('edit');
        $this->middleware('permission:delete')->only('destroy');
        $this->middleware('permission:viewdashboard')->only('manageComplaint');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $complaint = QueryBuilder::for(Complaint::with('remarks'))
            ->allowedFilters(['status', AllowedFilter::exact('id'),
                AllowedFilter::exact('office'),
                AllowedFilter::exact('category'),
            ])
            ->paginate(10)->withQueryString();

        return view('complaint.index_1', compact('complaint'));
    }

    public function manageComplaint()
    {
        $complaint = Complaint::with('remarks')->get();
        return view('complaint.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('complaint.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreComplaintRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComplaintRequest $request)
    {

        $office = Office::where('name', $request->office)->first();
        if (!empty($office)) {
            $request->merge(['office_id' => $office->id]);
        }

        if ($request->has('file_attachments_1')) {
            $path = $request->file('file_attachments_1')->store('', 'public');
            $request->merge(['file_attachments' => $path]);
        }

        Complaint::create($request->all());
        session()->flash('message', 'Complaint successfully created.');
        return to_route('complaint.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Complaint $complaint
     * @return \Illuminate\Http\Response
     */
    public function show(Complaint $complaint)
    {
//        dd($complaint->remarks->isNotEmpty());
        return view('complaint.show', compact('complaint'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Complaint $complaint
     * @return \Illuminate\Http\Response
     */
    public function edit(Complaint $complaint)
    {
        return view('complaint.edit', compact('complaint'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateComplaintRequest $request
     * @param \App\Models\Complaint $complaint
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComplaintRequest $request, Complaint $complaint)
    {


        $office = Office::where('name', $complaint->office)->first();
        if (!empty($office)) {
            $request->merge(['office_id' => $office->id]);
        }

        if ($request->has('file_attachments_1')) {
            $path = $request->file('file_attachments_1')->store('', 'public');
            $request->merge(['file_attachments' => $path]);
        }

        $complaint->update($request->all());
        session()->flash('message', 'Complaint successfully updated.');
        return to_route('complaint.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Complaint $complaint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complaint $complaint)
    {
        if ($complaint->remarks->isNotEmpty()) {
            foreach ($complaint->remarks as $c) {
                $c->delete();
            }
        }
        Storage::delete('/public/' . $complaint->file_attachments);
        $complaint->delete();
        session()->flash('message', 'Complaint and remarks successfully deleted.');
        return to_route('complaint.index');
    }
}
