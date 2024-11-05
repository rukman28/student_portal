<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Practical;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PracticalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $practicals = Practical::orderBy('name')->paginate(7);
        return response()->view('admin.practical.index', ['items' => $practicals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return response()->view('admin.practical.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
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
     * @param  Practical  $practical
     * @return Response
     */
    public function show(Practical $practical): Response
    {
        return response()->view('admin.practical.show', ['item' => $practical]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Practical  $practical
     * @return Response
     */
    public function edit(Practical $practical): Response
    {
        return response()->view('admin.practical.edit', ['item' => $practical]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Practical  $practical
     * @return RedirectResponse
     */
    public function update(Request $request, Practical $practical): RedirectResponse
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
     * @param  Practical  $practical
     * @return RedirectResponse
     */
    public function destroy(Practical $practical): RedirectResponse
    {
        $practical->delete();
        return back()->with('success', 'The Practical ' . $practical->name . ' has been deleted successfully!');
    }
}
