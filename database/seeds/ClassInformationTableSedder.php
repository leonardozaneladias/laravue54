<?php

use Illuminate\Database\Seeder;
use Laravue54\Models\ClassInformation;
use Laravue54\Models\Student;

class ClassInformationTableSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = Student::all();
        factory(ClassInformation::class,50)
            ->create()
            ->each(function (ClassInformation $model) use ($students){
                /**
                 * @var \Illuminate\Support\Collection $studentsCol
                 */
                $studentsCol = $students->random(10);
                $model->students()->attach($studentsCol->pluck('id'));
            });
    }
}
