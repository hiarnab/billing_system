<?php

namespace App\Http\Controllers;

use App\Models\BillableItem;
use App\Models\Package;
use Illuminate\Http\Request;

class BillableItemController extends Controller
{
    public function index()
    {
        $billable_items = BillableItem::with('package')->get();
        return view('billable_item.index', compact('billable_items'));
    }

    public function create()
    {
        $packages = Package::all();
        return view('billable_item.create',compact('packages'));
    }

    public function store(Request $requeest)
    {
        // $requeest->validate([
        //     'package_id'=> 'required',
        //     'item_name'=> 'required|string|max:255',
        //     'amount' => 'required',
        //     'gst' => 'required',
        // ]);

        $entity = new BillableItem();
        // $entity->package_id = $requeest->package_id;
        $entity->item_name = $requeest->item_name;
        $entity->amount = $requeest->amount;
        $entity->gst = $requeest->gst;
        $entity->save();
         return redirect()->back()->with('success', 'Billable item added successfully');
    }

    public function edit($id)
    {
        $billable_items_edit = BillableItem::where('id', $id)->first();
        $packages = Package::all();
        return view('billable_item.edit',compact('billable_items_edit', 'packages'));
    }

    public function update(Request $request,$id)
    {
        $billable_update = BillableItem::where('id', $id)->first();
        // $billable_update->package_id = $request->package_id;
        $billable_update->item_name = $request->item_name;
        $billable_update->amount = $request->amount;
        $billable_update->gst = $request->gst;
        $billable_update->save();
        return redirect()->back()->with('success', 'Bill Item Update successfully');
    }

    public function destroy($id)
    {
        $billable_items = BillableItem::findorFail($id);
        $billable_items->delete();
        return redirect()->back()->with('success', 'Billable item deleted sucessfully');
    }
}
