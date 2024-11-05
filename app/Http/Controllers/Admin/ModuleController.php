<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Models\admin\Module;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $modules = Module::orderBy('name')->paginate(7);

        return response()->view('admin.module.index', ['items' => $modules]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return response()->view('admin.module.create');
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
            'name' => ['required', 'max:255'],
            'code' => [
                'required', 'uppercase', 'regex:/^[A-Z0-9]+$/',
                /* The regex make sure user can only enter capital English letters and number*/
                'min:6', 'max:8', 'unique:modules',
            ],
            'description' => ['required', 'max:500'],
        ]);

        Module::create($validatedData);

        return redirect()->route('module.index')->with('success', 'The Module ' . $validatedData['name'] . ' has been created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  Module  $module
     * @return Response
     */
    public function show(Module $module): Response
    {
        return response()->view('admin.module.show', ['item' => $module]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Module  $module
     * @return Response
     */
    public function edit(Module $module): Response
    {
        return response()->view('admin.module.edit', ['item' => $module]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Module  $module
     * @return RedirectResponse
     */
    public function update(Request $request, Module $module): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'code' => [
                'required', 'uppercase', 'regex:/^[A-Z0-9]+$/',
                /* The regex make sure user can only enter capital English letters and number*/
                'min:6', 'max:8',
            ],
            'description' => ['required', 'max:500'],
        ]);

        if ($module->code == $validatedData['code']) {
            $module->name = $validatedData['name'];
            $module->description = $validatedData['description'];
            $module->update();
        } else {

            $module->update($validatedData);
        }

        return redirect()->route('module.index')->with('success', 'The Module ' . $validatedData['code'] . ' has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Module  $module
     * @return RedirectResponse
     */
    public function destroy(Module $module): RedirectResponse
    {
        $module->delete();
        return back()->with('success', 'The Module ' . $module->code . ' has been deleted successfully!');
    }
}
