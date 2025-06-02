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
        // $packages = Package::all();
        return view('billable_item.create');
    }

    public function store(Request $requeest)
    {
        $requeest->validate([
            'item_name'=> 'required|string|max:255',
            // 'amount' => 'required',
            // 'gst' => 'required',
        ]);

        $entity = new BillableItem();

        $entity->item_name = $requeest->item_name;
        $entity->amount = $requeest->amount;
        // $entity->gst = $requeest->gst;
        $entity->save();

        flash('Billable item added successfully', 'success');

        return redirect()->route('billable-item.index');
    }

    public function edit($id)
    {
        $billable_items_edit = BillableItem::where('id', $id)->first();

        return view('billable_item.edit',compact('billable_items_edit'));
    }

    public function update(Request $request,$id)
    {
        $billable_update = BillableItem::where('id', $id)->first();

        if(!$billable_update){
            flash('Item not found', 'error');
            return redirect()->route('billable-item.index');
        }

        $billable_update->item_name = $request->item_name;
        $billable_update->amount = $request->amount;
        // $billable_update->gst = $request->gst;
        $billable_update->save();

        flash('Billable Item Update successfully', 'success');
        return redirect()->back();
    }

    public function active($id)
    {
        $question = BillableItem::findOrFail($id);
        $question->status = 1;
        $question->save();
        return redirect()->back()->with('success', 'Course active successfully');
    }

    public function deactive($id)
    {
        $question = BillableItem::findorFail($id);
        $question->status = 0;
        $question->save();
        return redirect()->back()->with('success', 'Course deactive successfully');
    }
    // public function destroy($id)
    // {
    //     $billable_items = BillableItem::findorFail($id);
    //     $billable_items->delete();
    //     return redirect()->back()->with('success', 'Billable item deleted sucessfully');
    // }
}
