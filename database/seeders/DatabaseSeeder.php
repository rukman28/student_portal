<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\admin\Admin::factory(10)->create();
        \App\Models\admin\Programme::factory(30)->create();
        \App\Models\admin\Module::factory(60)->create();
        \App\Models\admin\Practical::factory(100)->create();
        \App\Models\admin\SkillCategory::factory(30)->create();
        \App\Models\admin\Skill::factory(30)->create();


        $this->call([
            ProgrammeSeeder::class,
        ]);


        \App\Models\User::factory()->create([
            'name' => 'student',
            'email' => 'student@gamil.com',
        ]);

        \App\Models\admin\Admin::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gamil.com',
        ]);
    }
}
