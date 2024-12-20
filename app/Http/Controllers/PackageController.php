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
       $packages = Package::with('course')->get();
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
        // $request->validate([
        // 'name'=> 'required',
        // 'course_id' => 'required',
        // 'base_price'=> 'required',
        // 'discount_percentage' => 'required',
        // 'net_price'=> 'required',
        // ]);

        $entity = new Package();
        $entity->name = $request->name;
        $entity->course_id  = $request->course_id;
        $entity->billable_item_id = $request->billable_id;
        $entity->base_price = $request->price;
        $entity->discount_percentage = "80";
        $entity->net_price = $request->net_price;
        $entity->save();
        return redirect()->back()->with('success', 'Package added successfully');
    }

    public function edit($id)
    {
        $package_edit = Package::where('id', $id)->first();
        return view('package.edit',compact('package_edit'));
    }

    public function update(Request $request,$id)
    {
        $package_update = Package::where('id', $id)->first();
        $package_update->name = $request->name;
        $package_update->course_id = $request->course_id;
        $package_update->base_price = $request->price;
        $package_update->net_price = $request->net_price;
        $package_update->save();
        return redirect()->back()->with('success', 'Package updated successfully');
    }

    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();
        return redirect()->back()->with('success', 'Package deleted successfully');
    }

    public function view($id)
    {
        $package_view = Package::where('id', $id)->first();
        return view('package.view',compact('package_view'));
    }
}
