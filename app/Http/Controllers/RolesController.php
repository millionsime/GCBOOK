<?php

namespace App\Http\Controllers;

use App\AddStud;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRolesRequest;
use App\Http\Requests\UpdateRolesRequest;
use App\User;
use App\Department;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating new Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param  \App\Http\Requests\StoreRolesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRolesRequest $request)
    {
        
        Role::create($request->all());

        return redirect()->route('roles.index');
    }


    /**
     * Show the form for editing Role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);

        return view('roles.edit', compact('role'));
    }

    /**
     * Update Role in storage.
     *
     * @param  \App\Http\Requests\UpdateRolesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRolesRequest $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->update($request->all());

        return redirect()->route('roles.index');
    }


    /**
     * Display Role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);

        return view('roles.show', compact('role'));
    }


    /**
     * Remove Role from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('roles.index');
    }

    /**
     * Delete all selected Role at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Role::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

    public function roleupdate(Request $request){
        $id = $request->dept;
        $stud = User::where('role_id', '=', '2')->where('dept_id', '=', $id)->get();
        return view('roles.roleupdate', compact('stud'));
    }

    public function rolechange(Request $request, $id){
        $role_id = 3;
        $dept_id = $request->dept_id;
        $check = User::where('role_id', '=', $role_id)->where('dept_id', '=', $dept_id)->count();
        if($check > 0){
            $stud = User::where('role_id', '=', '2')->get();
            return redirect()->route('deptselect', compact('stud'))->with("message", "Rep assigned previouly!");
        }
        else{
            $requests = User::findOrFail($id);
            $requests->role_id = $role_id;
            $requests->save();
            $stud = User::where('role_id', '=', '2')->get();
            return redirect()->route('deptselect', compact('stud'))->with("message", "Rep assigned succesfully!");
         }
    }
    public function selectdept(Request $request){
        $dept = Department::all();
        return view('roles.roleselectdept', compact('dept'));
    }
}
