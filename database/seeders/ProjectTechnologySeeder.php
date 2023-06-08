<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProjectTechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('project_technology')->insert([
            ['project_id' => 1, 'technology_id' => 1],
            ['project_id' => 3, 'technology_id' => 2],
            ['project_id' => 5, 'technology_id' => 3],
            ['project_id' => 7, 'technology_id' => 2],
            ['project_id' => 9, 'technology_id' => 2],
            ['project_id' => 11, 'technology_id' => 3],
            ['project_id' => 13, 'technology_id' => 1],
            ['project_id' => 15, 'technology_id' => 2],
            ['project_id' => 17, 'technology_id' => 3],
            ['project_id' => 19, 'technology_id' => 1],
        ]);
    }
}
