<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\admin\SkillCategory;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;


class SkillCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $skillCategories = SkillCategory::orderBy('name')->paginate(7);

        return response()->view('admin.skill-category.index', ['items' => $skillCategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return response()->view('admin.skill-category.create');
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
            'name' => ['required', 'unique:skill_categories', 'max:255'],
            'description' => ['required', 'max:500'],
        ]);

        SkillCategory::create($validatedData);

        return redirect()->route('skillCategory.index')->with('success', 'The SkillCategory ' . $validatedData['name'] . ' has been created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param SkillCategory $skillCategory
     * @return Response
     */
    public function show(SkillCategory $skillCategory): Response
    {

        return response()->view('admin.skill-category.show', ['item' => $skillCategory]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  SkillCategory  $skillCategory
     * @return Response
     */
    public function edit(SkillCategory $skillCategory): Response
    {
        return response()->view('admin.skill-category.edit', ['item' => $skillCategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  SkillCategory  $skillCategory
     * @return RedirectResponse
     */
    public function update(Request $request, SkillCategory $skillCategory): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:500'],
        ]);

        if ($skillCategory->name == $validatedData['name']) {
            $skillCategory->description = $validatedData['description'];
            $skillCategory->update();
        } else {

            $skillCategory->update($validatedData);
        }

        return redirect()->route('skillCategory.index')->with('success', 'The SkillCategory ' . $validatedData['name'] . ' has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  SkillCategory  $skillCategory
     * @return RedirectResponse
     */
    public function destroy(SkillCategory $skillCategory): RedirectResponse
    {
        $skillCategory->delete();
        return back()->with('success', 'The SkillCategory ' . $skillCategory->name . ' has been deleted successfully!');
    }
}
