<?php

namespace App\Http\Controllers;

use App\Models\PackageInstallment;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageInstallmentController extends Controller
{
    public function index()
    {
        $package_installment = PackageInstallment::all();
        return view('package_installment.index', compact('package_installment'));
    }

    public function create()
    {
        $packages = Package::all();
        return view('package_installment.create', compact('packages'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $entity = new PackageInstallment();
        $entity->package_id = $request->package_id;
        $entity->amount = $request->amount;
        $entity->due_date = $request->due_date;
        $entity->payment_date = $request->payment_date;
        $entity->fine = $request->fine;
        $entity->save();
        return redirect()->back()->with('success', 'Packageinstallment added successfully');
    }

    public function edit($id)
    {
        $package_installment_edit = PackageInstallment::where('id', $id)->first();
        $packages = Package::all();
        return view('package_installment.edit', compact('package_installment_edit', 'packages'));
    }

    public function update(Request $request, $id)
    {
        // $packageInstallment = PackageInstallment::find($id);
        
        // $packageInstallment->update([
        //     'package_id' => $request->package_id,
        //     'amount' => $request->amount,
        //     'due_date' => $request->due_date,
        //     'payment_date' => $request->payment_date,
        //     'fine' => $request->fine,
        // ]);

        $package_installment_update = PackageInstallment::where('id', $id)->first();
        $package_installment_update->package_id = $request->package_id;
        $package_installment_update->amount = $request->amount;
        $package_installment_update->due_date = $request->due_date;
        $package_installment_update->payment_date = $request->payment_date;
        $package_installment_update->fine = $request->fine;
        $package_installment_update->save();
        return redirect()->back()->with('success', 'packageinstallment update successfully');
    }

    public function destroy($id)
    {
        $package_installment = PackageInstallment::findorFail($id);
        $package_installment->delete();
        return redirect()->back()->with('success', 'Packageinstall delete successfully');
    }
}
