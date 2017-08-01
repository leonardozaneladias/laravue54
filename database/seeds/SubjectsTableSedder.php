<?php

use Illuminate\Database\Seeder;

class SubjectsTableSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\Laravue54\Models\Subject::class,50)->create();
    }
}
