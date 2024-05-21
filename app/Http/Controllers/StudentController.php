<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //method untuk memanggil 
    public function index(){
        $student = Student::all();
        return view('admin.contents.student.index',[
            'students' => $student
        ]);
    }

}
