<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\admin\Programme;

class ProgrammeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Programme::factory()->create([
            'name' => 'Biology',
            'level' => '6'
        ]);

        Programme::factory()->create([
            'name' => 'Computer Science',
            'level' => '5'
        ]);

        Programme::factory()->create([
            'name' => 'Agriculture',
            'level' => '6'
        ]);

        Programme::factory()->create([
            'name' => 'zoology',
            'level' => '6'
        ]);
    }
}
