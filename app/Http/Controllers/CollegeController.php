<?php

namespace App\Http\Controllers;

use App\College;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    public function index()
    {
        $colleges = College::all();
        return view('colleges.index', compact('colleges'));
    }

    /**
     * Show the form for creating new Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('colleges.create');
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param  \App\Http\Requests\StoreRolesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dept = new College();
        $dept->title = $request->title;
        
        $validated = $request->validate([
            'title' => 'required|unique:colleges|max:255',
           ]);
        $dept->save();
        

        return redirect()->route('colleges.index');
    }


    /**
     * Show the form for editing Role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = College::findOrFail($id);

        return view('colleges.edit', compact('role'));
    }

    /**
     * Update Role in storage.
     *
     * @param  \App\Http\Requests\UpdatecollegesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = College::findOrFail($id);
        $role->update($request->all());

        return redirect()->route('colleges.index');
    }


    /**
     * Display Role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = College::findOrFail($id);

        return view('colleges.show', compact('role'));
    }


    /**
     * Remove Role from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = College::findOrFail($id);
        $role->delete();

        return redirect()->route('colleges.index');
    }

    /**
     * Delete all selected Role at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = College::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
