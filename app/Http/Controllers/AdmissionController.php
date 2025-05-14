<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Models\Course;
use App\Models\Package;
use App\Models\Student;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    public function index()
    {
        $admissions = Admission::paginate(5);
       return view('admission.index', compact('admissions'));
    }

    public function create()
    {
        $courses = Course::all();
        $packages = Package::all();
        $students = Student::all();
        return view('admission.add',compact('courses','packages', 'students'));
    }

    public function store(Request $request ) 
    {
        $entity = new Admission();
        $entity->student_id = $request->student_id;
        $entity->course_id = $request->course_id;
        $entity->package_id = $request->package_id;
        $entity->amount = $request->amount;
        $entity->gst = $request->gst;
        $entity->total = $request->total;
        $entity->grand_total = $request->grand_total;
        $entity->save();
        flash('Admission Added successfully');
        return redirect()->route('admission.list');
    }

    public function getpackageBycourse($course_id)
    {  
        $course = Package::where('course_id',$course_id)->get();
        return response()->json($course);
    }

    public function getPackageDetails($packageId)
    {
        $package = Package::find($packageId);

        if($packageId){
            return response()->json([
                'gst'=> $package->gst,
                'base_price' => $package->base_price,
                'net_price' => $package->net_price,
            ]);
        } else {
            return response()->json(['error'=> 'package not found'], 404);
        }
    }

    public function view($id)
    {
        $admission_view = Admission::with('student')->find($id);
        return view('admission.view',compact('admission_view'));
    }
}
