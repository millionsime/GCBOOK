<?php

namespace App\Http\Controllers;


use App\User;
use App\Department;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUsersRequest;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->where('role_id', 3);
        // $studept = $users->dept_id;
        // $depts = Department::all()->where('id', $studept);
        $depts =Department::all();
        return view('users.index', compact('users','depts'));
    }
    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $relations = [
            'depts' => \App\Department::get()->pluck('title', 'id')->prepend('Please select', ''),
        ]; 
        return view('users.create', $relations);
    }
    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'email' => 'regex:/(.*)@(.*).uni-miskolc.hu$/',
        // ]);

        // if(!$validator->fails()){
         
        //     User::create($request->all());
        // }

        $member = new User;
        $member->name = $request->input('name');
        $member->email= $request->input('email');
        $member->dept_id= $request->input('dept_id');
        $member->password= $request->input('password');
        $member->role_id= 3;  
        $validated = $request->validate([
            'email' => 'required|unique:users|max:255',
           ]);
        $member->save();   
       
        return redirect()->route('users.create')->with("message", "user registered!");
    }
    // public function save(Request $request)
    // {
    //     $member = new User;
    //     $member->name = $request->input('name');
    //     $member->email= $request->input('email');
    //     $member->department= $request->input('department');
    //     $member->password= $request->input('password');
    //     $member->role_id= 3;
    //     $member->save();
    //     return redirect()->route('users.index');
    // }

    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $relations = [
            'depts' => \App\Department::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];
        $user = User::findOrFail($id);

        return view('users.edit', compact('user') + $relations);
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, $id)
    {
       
        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('users.index');
    }
    /**
     * Display User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $relations = [
            'roles' => \App\Role::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];
        $user = User::findOrFail($id);
        return view('users.show', compact('user') + $relations);
    }
    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index');
    }
    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
