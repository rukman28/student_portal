<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = Module::orderBy('name')->paginate(7);

        return view('admin.module.index', ['items' => $modules]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.module.create');
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
     * @param  \App\Models\admin\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        return view('admin.module.show', ['item' => $module]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        return view('admin.module.edit', ['item' => $module]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
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
     * @param  \App\Models\admin\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        $module->delete();
        return back()->with('success', 'The Module ' . $module->code . ' has been deleted successfully!');
    }
}
