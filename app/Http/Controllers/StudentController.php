<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    function save(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'surname' => 'required',
            'department' => 'required'
        ]);

        $admin = new Student();
        $admin->name = $req->name;
        $admin->surname = $req->surname;
        $admin->department = $req->department;
        $save = $admin->save();

        if ($save) {
            return back()->with('success', 'Student created successfully');
        } else {
            return back()->with('failure', 'Something went wrong, please try again');
        }
    }
}
