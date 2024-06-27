<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin\SkillCategory;
use Illuminate\Http\Request;

class SkillCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skillcategories = SkillCategory::orderBy('name')->paginate(7);

        return view('admin.skill-category.index', ['items' => $skillcategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.skill-category.create');
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
            'name' => ['required', 'unique:skill_categories', 'max:255'],
            'description' => ['required', 'max:500'],
        ]);

        SkillCategory::create($validatedData);

        return redirect()->route('skillcategory.index')->with('success', 'The SkillCategory ' . $validatedData['name'] . ' has been created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin\SkillCategory  $skillCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SkillCategory $skillcategory)
    {

        return view('admin.skill-category.show', ['item' => $skillcategory]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin\SkillCategory  $skillCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SkillCategory $skillcategory)
    {
        return view('admin.skill-category.edit', ['item' => $skillcategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\SkillCategory  $skillCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SkillCategory $skillcategory)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:500'],
        ]);

        if ($skillcategory->name == $validatedData['name']) {
            $skillcategory->description = $validatedData['description'];
            $skillcategory->update();
        } else {

            $skillcategory->update($validatedData);
        }

        return redirect()->route('skillcategory.index')->with('success', 'The SkillCategory ' . $validatedData['name'] . ' has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin\SkillCategory  $skillCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SkillCategory $skillcategory)
    {
        $skillcategory->delete();
        return back()->with('success', 'The SkillCategory ' . $skillcategory->name . ' has been deleted successfully!');
    }
}
