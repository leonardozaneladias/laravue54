<?php

namespace Laravue54\Http\Controllers\API;

use Illuminate\Http\Request;
use Laravue54\Http\Controllers\Controller;
use Laravue54\Models\Student;

class StudentsController extends Controller
{
    public function index(){
        return Student::all();
    }
}
