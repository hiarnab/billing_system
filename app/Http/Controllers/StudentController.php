<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('student_guard')->attempt($credentials)) {
            return redirect()->intended('/student/dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function dashboard()
    {
        $student = Auth::guard('student_guard')->user();
        return view('student.dashboard', compact('student'));
    }

    public function index()
    {
        $students = Student::all();
        return view('student.index', compact('students'));
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
    {
        $entity = new Student(); 
        $entity->address = $request->address;
        $entity->father_name = $request->father_name;
        $entity->father_mobile = $request->father_mobile;
        $entity->mobile_no = $request->mobile_no;
        $entity->scholar_no	= $request->scholar_no;
        $entity->email = $request->email;
        $entity->password = Hash::make($request->password);
        $entity->gender = $request->gender;
        $entity->save();
        
        return redirect()->back()->with('success', 'Student added successfully');
    }

    public function edit($id)
    {
        $student_edit = Student::where('id', $id)->first();
        return view('student.edit', compact('student_edit'));
    }

    public function update(Request $request,$id)
    {
        $student_update = Student::where('id', $id)->first();
        $student_update->address = $request->address;
        $student_update->father_name = $request->father_name;
        $student_update->father_mobile = $request->father_mobile;
        $student_update->mobile_no = $request->mobile_no;
        $student_update->save();

        return redirect()->back()->with('success', 'Student update successfully');
    }

    public function destroy($id)
    {
        $student = Student::findorFail($id);
        $student->delete();
        return redirect()->back();
    }
}
