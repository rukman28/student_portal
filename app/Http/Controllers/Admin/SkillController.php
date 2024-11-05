<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\admin\Skill;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;


class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $skills = Skill::orderBy('name')->paginate(7);
        return response()->view('admin.skill.index', ['items' => $skills]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return response()->view('admin.skill.create');
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
            'name' => ['required', 'unique:skills', 'max:255'],
            'description' => ['required', 'max:500'],
        ]);

        Skill::create($validatedData);

        return redirect()->route('skill.index')->with('success', 'The Skill ' . $validatedData['name'] . ' has been created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  Skill  $skill
     * @return Response
     */
    public function show(Skill $skill): Response
    {
        return response()->view('admin.skill.show', ['item' => $skill]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Skill  $skill
     * @return Response
     */
    public function edit(Skill $skill): Response
    {
        return response()->view('admin.skill.edit', ['item' => $skill]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Skill  $skill
     * @return RedirectResponse
     */
    public function update(Request $request, Skill $skill): RedirectResponse
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
     * @param  Skill  $skill
     * @return RedirectResponse
     */
    public function destroy(Skill $skill): RedirectResponse
    {
        $skill->delete();
        return back()->with('success', 'The Skill ' . $skill->name . ' has been deleted successfully!');
    }
}
