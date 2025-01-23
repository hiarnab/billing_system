<?php

namespace App\Http\Controllers;

use App\Models\BillableItem;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Course;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::with('course', 'billable')->get();
        return view('package.index',compact('packages'));
    }

    public function create()
    {
        $courses = Course::all();

        $billable_item = BillableItem::all();
        return view('package.create', compact('courses', 'billable_item'));
    }

    public function store(Request $request)
    {
        $data = [];
        foreach ($request->net_price as $index => $net_price) {
            $data [] = [
                'course_id' => $request->course_id,
                'name' => $request->name,
                'base_price' => $request->base_price[$index],
                'discount_percentage' => $request->discount_percentage[$index],
                'net_price' => $net_price,
                'billable_item_id' => $request->billable_item_id[$index],
                // 'billable_item_id' => isset($request->billable_id[$index]) ? $request->billable_id[$index] : null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        // return $data;
        Package::insert($data);
        return redirect()->back()->with('success', 'Package added successfully');

        // $request->validate([
        // 'name'=> 'required',
        // 'course_id' => 'required',
        // 'base_price'=> 'required',
        // 'discount_percentage' => 'required',
        // 'net_price'=> 'required',
        // ]);

        // $entity = new Package();
        // $entity->name = $request->name;
        // $entity->course_id  = $request->course_id;
        // $entity->billable_item_id = $request->billable_id;
        // $entity->base_price = $request->price;
        // $entity->discount_percentage = "80";
        // $entity->net_price = $request->net_price;
        // $entity->save();
        // return redirect()->back()->with('success', 'Package added successfully');
    }

    public function edit($id)
    {
        $package_edit = Package::with('billable')->where('id', $id)->first();
        $package_name = Package::select('course_id')->distinct()->get();
        $billable_item = BillableItem::all();
        return view('package.edit',compact('package_edit', 'billable_item', 'package_name'));
    }

    public function update(Request $request,$id)
    {
        $package_update = Package::where('id', $id)->first();
        $package_update->name = $request->name;
        $package_update->course_id = $request->course_id;
        $package_update->base_price = $request->price;
        $package_update->net_price = $request->net_price;
        $package_update->billable_item_id = $request->billable_item_id;
        $package_update->save();
        return redirect()->back()->with('success', 'Package updated successfully');
    }

    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();
        return redirect()->back()->with('success', 'Package deleted successfully');
    }

    public function view($course_id)
    {
        // return $course_id;
         $package_view = Package::with('billable')->where('course_id', $course_id)->get();
        return view('package.view',compact('package_view'));
    }
}
