<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\PackageInstallment;
use App\Models\Payment;
use App\Models\Admission;

class PaymentController extends Controller
{
    private $admissionId;

    public function payment($id)
    {
        $this->admissionId = $id;
        session(['admission_id' => $id]);
        $admission_details = Admission::with('student', 'course', 'package')->where('id', $id)->first();
        $payments = PackageInstallment::where('package_id', $admission_details->package_id)->get();
        // return $payments;   
        return view('payment.index', compact('payments', 'admission_details'));
    }

    public function FullPayment($id)
    {
        $admission_fees = PackageInstallment::where('id', $id)->first();
        // return $admission = Admission::where('package_id',$admission_fees->package_id)->first();
        return view('payment.full_payment', compact('admission_fees'));
    }

    public function Full_payment_complete(Request $request)
    {
        // $data = $this->getAdmissionPaymentDetails($id);
        // $admission_details = $data['admission_details'];
        $id = session('admission_id');
        // $id = $this->admissionId;
         $admission_details = Admission::where('id',$id)->first();

        $entity = new Payment();
        $entity->package_id = $request->package_id;
        $entity->package_installment_id = $request->package_installment_id;
        $entity->course_id  = $admission_details->course_id ;
        $entity->student_id = $admission_details->student_id;
        $entity->user_id = Auth::id();
        $entity->payment_amount = "full";
        $entity->amount_paid = $request->amount_paid;
        $entity->amount_due = $request->amount_due;
        $entity->payment_transaction_no = 'TXN' . time() . rand(1000, 9999);
        $entity->payment_transaction_image = $request->payment_transaction_image;
        $entity->mode_of_transaction = $request->payment_method;
        $entity->fine = $request->fine;
        $entity->total_paid_amount = $request->amount_paid;  
        $entity->save();
        flash('Payment has been sucessfull');
        return redirect()->back();
    }

    public function partial_payment($id)
    {
        $admission_fees = PackageInstallment::where('id',$id)->first();
        return view('payment.partial_payment',compact('admission_fees'));
    }

    public function partial_payment_complete(Request $request)
    {
         $id = session('admission_id');
         $admission_details = Admission::where('id',$id)->first();

        $entity = new Payment();
        $entity->package_id = $request->package_id;
        $entity->package_installment_id = $request->package_installment_id;
        $entity->course_id  = $admission_details->course_id ;
        $entity->student_id = $admission_details->student_id;
        $entity->user_id = Auth::id();
        $entity->payment_amount = "part";
        $entity->amount_paid = $request->pay_installment;
        $entity->amount_due = $request->amount_paid - $request->pay_installment;
        $entity->payment_transaction_no = 'TXN' . time() . rand(1000, 9999);
        $entity->payment_transaction_image = $request->payment_transaction_image;
        $entity->mode_of_transaction = $request->payment_method;
        $entity->fine = $request->fine;
        $entity->total_paid_amount = $request->pay_installment;  
        $entity->save();
        flash('Partial Payment has been sucessfull');
        return redirect()->back();
    }

    // private function getAdmissionPaymentDetails($id)
    // {
    //     $admission_details = Admission::with('student', 'course', 'package')->where('id', $id)->first();

    //     $payments = PackageInstallment::where('package_id', $admission_details->package_id)->get();

    //     return compact('admission_details', 'payments');
    // }
}
