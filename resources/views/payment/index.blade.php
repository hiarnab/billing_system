@extends('layout.admin.app')

@push('css')
<style>
    .input_width{
        width:80% !important;

    }
    .installment_width{
        width:200px;
    }
</style>
@endpush

@section('content')
    <div class="page-wrapper">     
        <!-- page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                            Settings
                        </div>
                        <h2 class="page-title">
                            Payment
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="{{ route('admission.list') }}" class="btn btn-primary d-none d-sm-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12l14 0" />
                                    <path d="M5 12l6 6" />
                                    <path d="M5 12l6 -6" />
                                </svg>
                                Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="col">
                    <form class="card" action="#" method="post">
                        @csrf
                        <div class="card-body">
                            <h3 class="card-title">View Payment</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2" for="inputAddress">Student Name :</label>
                                        <input id="inputAddress" type="text" class="form-control input_width" name="name"
                                            placeholder="Enter Name" value="{{ $admission_details->student->name }}" required>
                                        <input type="hidden" name="id" value="{{ $admission_details->id }}">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2" for="inputAddress">Address :</label>
                                        <input id="inputAddress" type="text" class="form-control input_width" name="session"
                                            placeholder="Enter session" value="{{ $admission_details->student->address }}"
                                            required>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2" for="inputAddress">Phone :</label>
                                        <input id="inputAddress" type="number" class="form-control input_width" name="duration"
                                            placeholder="Enter Duration" value="{{ $admission_details->student->mobile_no }}"
                                            required>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2" for="inputAddress">Admission Date :</label>
                                        <input id="inputAddress" type="text" class="form-control input_width" name="duration"
                                            placeholder="Enter Duration" value="{{ $admission_details->created_at }}" required>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2" for="inputAddress">Course Name :</label>
                                        <input id="inputAddress" type="text" class="form-control input_width" name="duration"
                                            placeholder="Enter Duration" value="{{ $admission_details->course->name }}"
                                            required>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2" for="inputAddress">Package Name :</label>
                                        <input id="inputAddress" type="text" class="form-control input_width" name="duration"
                                            placeholder="Enter Duration" value="{{ $admission_details->package->name }}"
                                            required>
                                    </div>
                                </div>
                            </div>

                        </div>
                        {{-- <div class="text-left card-footer">
                            <button type="submit" class="btn btn-primary">Update Course</button>
                        </div> --}}
                        <div class="card-body">
                            <h2 class="page-title mb-3">
                                Package Installition
                            </h2>
                            <div class="row row-cards d-flex flex-column">
                                <div class="col-sm-12 col-md-3">
                                    <div class="form-group mb-3">
                                        <label class="mb-2" for="inputAddress">Admission price :</label>
                                        <input id="inputAddress" type="text" class="form-control input_width" name="duration "
                                            placeholder="Enter Duration" value="{{ $admission_details->amount }}" readonly>
                                    </div>
                                </div>
                                {{-- @foreach ($package_installment as $index => $installment)
                                    <div class="d-flex">
                                        <div class="col-sm-12 col-md-3">
                                            <div class="form-group">
                                                <label class="mb-2" for="inputAddress">Installment {{ $index + 1 }}:
                                                </label>

                                                <input id="inputAddress" type="text" class="form-control"
                                                    name="duration[]" placeholder="Enter Duration"
                                                    value="{{ $installment->amount }}" readonly>


                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <button type="button" class="btn btn-primary me-1 p-2" height="20">Pay Now</button>
                                            <button type="button" class="btn btn-success me-1">Pay Intallment</button>
                                            <button type="button" class="btn btn-danger">Status</button>
                                        </div>
                                    </div>
                                @endforeach --}}
                                @foreach ($payments as $index => $installment)
                                    <div class="form-group mb-3">
                                        <label class="mb-2" for="inputAddress">Installment {{ $index + 1 }} :</label>

                                        <div class="d-flex align-items-center">

                                            <input id="inputAddress" type="text" class="form-control me-2 installment_width"
                                                name="duration[]" placeholder="Enter Duration"
                                                value="{{ $installment->amount }}" readonly >

                                              <a href="{{ route('payment.full', [$installment->id]) }}"
                                                    class="btn btn-info d-none d-sm-inline-block me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-edit" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                        </path>
                                                        <path
                                                            d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1">
                                                        </path>
                                                        <path
                                                            d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                                        </path>
                                                        <path d="M16 5l3 3"></path>
                                                    </svg>
                                                    Pay Now
                                                </a>

                                             <a href="{{ route('payment.partial', [$installment->id]) }}"
                                                    class="btn btn-info d-none d-sm-inline-block me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-edit" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                        </path>
                                                        <path
                                                            d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1">
                                                        </path>
                                                        <path
                                                            d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                                        </path>
                                                        <path d="M16 5l3 3"></path>
                                                    </svg>
                                                    Pay Installment
                                                </a>

                                            <button type="button" class="btn btn-success">Payment History</button>
                                        </div>

                                    </div>
                                @endforeach

                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
