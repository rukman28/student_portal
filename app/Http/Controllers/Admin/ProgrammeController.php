<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\admin\Programme;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $programmes = Programme::orderBy('name')->paginate(7);
        return response()->view('admin.programme.index', ['items' => $programmes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return response()->view('admin.programme.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
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
     * @param Programme $programme
     * @return Response
     */
    public function show(Programme $programme): Response
    {
        return response()->view('admin.programme.show', ['item' => $programme, 'itemName' => 'Programme']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Programme $programme
     * @return Response
     */
    public function edit(Programme $programme): Response
    {
        return response()->view('admin.programme.edit', ['item' => $programme]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Programme $programme
     * @return RedirectResponse
     */
    public function update(Request $request, Programme $programme): RedirectResponse
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
     * @param Programme $programme
     * @return RedirectResponse
     */
    public function destroy(Programme $programme): RedirectResponse
    {

        $programme->delete();
        return back()->with('success', 'The Programme ' . $programme->name . ' has been deleted successfully!');
    }
}
