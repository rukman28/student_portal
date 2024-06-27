<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Programme;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programmes = Programme::orderBy('name')->paginate(7);
        return view('admin.programme.index', ['items' => $programmes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.programme.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'unique:programmes', 'max:255'],
            'level' => ['required', 'numeric', 'between:1,9'],
            'description' => ['required', 'max:500'],
        ]);

        Programme::create($validatedData);

        return redirect()->route('programme.index')->with('success', 'The Programme ' . $validatedData['name'] . ' has been created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function show(Programme $programme)
    {
        return view('admin.programme.show', ['item' => $programme, 'itemName' => 'Programme']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function edit(Programme $programme)
    {
        return view('admin.programme.edit', ['item' => $programme]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programme $programme)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'level' => ['required', 'numeric', 'between:1,9'],
            'description' => ['required', 'max:500'],
        ]);

        if ($programme->name == $validatedData['name']) {
            $programme->level = $validatedData['level'];
            $programme->description = $validatedData['description'];
            $programme->update();
        } else {

            $programme->update($validatedData);
        }

        return redirect()->route('programme.index')->with('success', 'The Programme ' . $validatedData['name'] . ' has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programme $programme)
    {

        $programme->delete();
        return back()->with('success', 'The Programme ' . $programme->name . ' has been deleted successfully!');
    }
}
