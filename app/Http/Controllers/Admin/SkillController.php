<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::orderBy('name')->paginate(7);
        return view('admin.skill.index', ['items' => $skills]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.skill.create');
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
            'name' => ['required', 'unique:skills', 'max:255'],
            'description' => ['required', 'max:500'],
        ]);

        Skill::create($validatedData);

        return redirect()->route('skill.index')->with('success', 'The Skill ' . $validatedData['name'] . ' has been created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        return view('admin.skill.show', ['item' => $skill]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        return view('admin.skill.edit', ['item' => $skill]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:500'],
        ]);

        if ($skill->name == $validatedData['name']) {
            $skill->description = $validatedData['description'];
            $skill->update();
        } else {

            $skill->update($validatedData);
        }

        return redirect()->route('skill.index')->with('success', 'The Skill ' . $validatedData['name'] . ' has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();
        return back()->with('success', 'The Skill ' . $skill->name . ' has been deleted successfully!');
    }
}
