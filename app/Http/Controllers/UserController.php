<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Rules\Password;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:viewdashboard')->only('create');
        $this->middleware('permission:viewdashboard')->only('index');
        $this->middleware('permission:viewdashboard')->only('edit');
        $this->middleware('permission:viewdashboard')->only('destroy');
        $this->middleware('permission:viewdashboard')->only('manageComplaint');
    }

    protected function passwordRules()
    {
        return ['required', 'string'];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->toArray();
        \Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'office' => ['required'],
            'designation' => ['required'],
            'contact' => ['required'],
            'password' => $this->passwordRules(),
        ])->validate();

        $user = User::create(
            [
                'name' => $input['name'],
                'email' => $input['email'],
                'office' => $input['office'],
                'designation' => $input['designation'],
                'status' => $input['status'],
                'contact' => $input['contact'],
                'password' => Hash::make($input['password']),
            ]
        );
        $role2 = 'user';
        $user->assignRole($role2);
        session()->flash('message', 'User successfully created.');
        return to_route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $input = $request->toArray();

        \Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => $this->passwordRules(),
        ])->validate();


        $user->update(
            [
                'name' => $input['name'],
                'email' => $input['email'],
                'office' => $input['office'],
                'designation' => $input['designation'],
                'status' => $input['status'],
                'contact' => $input['contact'],
                'password' => Hash::make($input['password']),
            ]
        );
        session()->flash('message', 'User successfully updated.');
        return to_route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
