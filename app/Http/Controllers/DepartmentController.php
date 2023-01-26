<?php

namespace App\Http\Controllers;

use App\Role;
use App\Department;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRolesRequest;
use App\Http\Requests\UpdateRolesRequest;

class DepartmentController extends Controller
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
        $departments = Department::all();

        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating new Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param  \App\Http\Requests\StoreRolesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        Department::create($request->all());


        return redirect()->route('departments.index');
    }


    /**
     * Show the form for editing Role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Department::findOrFail($id);

        return view('departments.edit', compact('role'));
    }

    /**
     * Update Role in storage.
     *
     * @param  \App\Http\Requests\UpdatedepartmentsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Department::findOrFail($id);
        $role->update($request->all());

        return redirect()->route('departments.index');
    }


    /**
     * Display Role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Department::findOrFail($id);

        return view('departments.show', compact('role'));
    }


    /**
     * Remove Role from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Department::findOrFail($id);
        $role->delete();

        return redirect()->route('departments.index');
    }

    /**
     * Delete all selected Role at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Department::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
