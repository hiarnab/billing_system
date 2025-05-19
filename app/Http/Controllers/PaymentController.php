<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PackageInstallment;
use App\Models\Payment;
use App\Models\Admission;

class PaymentController extends Controller
{
    public function payment($id)
    {
        $admission_details = Admission::with('student','course','package')->where('id',$id)->first();
        $payments = PackageInstallment::where('package_id',$admission_details->package_id)->get();
        // return $payments;   
        return view('payment.index',compact('payments','admission_details'));
    }

    public function FullPayment($id)
    {
         $admission_fees = PackageInstallment::where('id',$id)->first();
        return view('payment.full_payment', compact('admission_fees'));
    }
}
