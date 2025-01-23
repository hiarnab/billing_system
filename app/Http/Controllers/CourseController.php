<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('course.index', compact('courses'));
    }

    public function create()
    {
        return view('course.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=> "required",
            'duration'=> "required",
            'session'=> "required",
        ]);

        $entity = new Course();
        $entity->name = $request->name;
        $entity->slug = Str::slug($request->name, '-');
        $entity->session = $request->session;
        $entity->duration = $request->duration;
        $entity->save();
        flash('course add successfully', 'success');
        return redirect()->route('course.index');
    }

    public function edit($id)
    {
        $course_edit = Course::where('id', $id)->first();
        return view('course.edit', compact('course_edit'));
    }

    public function update(Request $request, $id)
    {
        $course_update = Course::where('id', $id)->first();
        $course_update->name = $request->name;
        $course_update->slug = Str::slug($request->name, '-');
        $course_update->session = $request->session;
        $course_update->duration = $request->duration;
        $course_update->save();
        flash( 'Course update successfully', 'success');
        return redirect()->route('course.index');
    }

    public function view($id)
    {
        $view = Course::where('id', $id)->first();
        return view('course.view',compact('view'));
    }

    public function active($id)
    {
        $question = Course::findOrFail($id);
        $question->status = 'active';
        $question->save();
        return redirect()->back()->with('success', 'Course active successfully');
    }

    public function deactive($id)
    {
        $question = Course::findorFail($id);
        $question->status = 'inactive';
        $question->save();
        return redirect()->back()->with('success', 'Course deactive successfully');
    }
}
