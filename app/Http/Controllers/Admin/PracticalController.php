<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Practical;
use Illuminate\Http\Request;

class PracticalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $practicals = Practical::orderBy('name')->paginate(7);
        return view('admin.practical.index', ['items' => $practicals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.practical.create');
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
            'name' => ['required', 'unique:practicals', 'max:255'],
            'description' => ['required', 'max:500'],
        ]);

        Practical::create($validatedData);

        return redirect()->route('practical.index')->with('success', 'The Practical ' . $validatedData['name'] . ' has been created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin\Practical  $practical
     * @return \Illuminate\Http\Response
     */
    public function show(Practical $practical)
    {
        return view('admin.practical.show', ['item' => $practical]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin\Practical  $practical
     * @return \Illuminate\Http\Response
     */
    public function edit(Practical $practical)
    {
        return view('admin.practical.edit', ['item' => $practical]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\Practical  $practical
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Practical $practical)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:500'],
        ]);

        if ($practical->name == $validatedData['name']) {
            $practical->description = $validatedData['description'];
            $practical->update();
        } else {

            $practical->update($validatedData);
        }

        return redirect()->route('practical.index')->with('success', 'The Practical ' . $validatedData['name'] . ' has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin\Practical  $practical
     * @return \Illuminate\Http\Response
     */
    public function destroy(Practical $practical)
    {
        $practical->delete();
        return back()->with('success', 'The Practical ' . $practical->name . ' has been deleted successfully!');
    }
}
