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
        // $package_installment = PackageInstallment::select('package_id')->distinct()->get();
        return view('package_installment.index', compact('package_installment'));
    }

    public function create()
    {
        $packages = Package::select('name')->distinct()->get();
        return view('package_installment.create', compact('packages'));
    }

    public function store(Request $request)
    {
        // return $request->all();

        $data = [];
        foreach ($request->amount as $index => $amount) {
            $data[] = [
                'package_id' => $request->package_id,
                'amount' => $amount,
                'due_date' => $request->due_date[$index],
                'payment_date' => $request->payment_date[$index] ?? null,
                'fine' => $request->fine[$index] ?? 0,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        // return $data;
        PackageInstallment::insert($data);

        return redirect()->back()->with('success', 'Package installments added successfully.');

        // $entity = new PackageInstallment();
        // $entity->package_id = $request->package_id;
        // $entity->amount = is_array($request->amount) ? $request->amount[0] : $request->amount;
        // $entity->due_date = is_array($request->due_date) ? $request->due_date[0] : $request->due_date;
        // $entity->payment_date = is_array($request->payment_date) ? $request->payment_date[0] : $request->payment_date;
        // $entity->fine = is_array($request->fine) ? $request->fine[0] : $request->fine;
        // $entity->save();
        // return redirect()->back()->with('success', 'Packageinstallment added successfully');
    }

    public function view($package_id)
    {
         $package_installment = PackageInstallment::where('package_id', $package_id)->get();
        $packages = Package::all();
        return view('package_installment.view', compact('package_installment', 'packages'));
    }


    public function edit($id)
    {
        // return $id;
        $package_installment_edit = PackageInstallment::where('package_id', $id)->first();
        // $view = PackageInstallment::where('id', $id)->first();
        // $package = Package::where('id', $view->package_id)->first();
        // $package_installment = PackageInstallment::where('package_id', $package->id)->first();
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
