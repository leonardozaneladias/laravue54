<?php

use Illuminate\Database\Seeder;

class ClassInformationTableSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\Laravue54\Models\ClassInformation::class,50)->create();
    }
}
