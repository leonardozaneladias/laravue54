<?php

namespace Laravue54\Http\Controllers\API;

use Illuminate\Http\Request;
use Laravue54\Http\Controllers\Controller;
use Laravue54\Models\Student;

class StudentsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('q');

        return !$search ?
                    [] :
                    Student::whereHas('user',function ($query) use ($search){
                        $query->where('users.name', 'LIKE', "%{$search}%");
                    })->take(10)->get();
    }
}
