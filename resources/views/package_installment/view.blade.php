@extends('layout.admin.app')

@push('css')
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
                            Package installment
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="{{route ('installment.index')}}" class="btn btn-primary d-none d-sm-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="" />
                                    <path d="" />
                                </svg>
                                Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="col">
                <form class="card" action="#" method="post">
                    @csrf
                    <div class="card-body">
                        <h3 class="card-title">View Package Installment</h3>
                        <div class="row row-cards">
                            <div class="form-row col-md-3">
                                <div class="form-group">
                                    <label for="package_id">Package name</label>
                                    <select id="package_id" class="form-control" name="package_id" required>
                                        @foreach($packages as $package)  
                                        <option value="{{ $package->id }}">
                                            {{ $package->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @foreach($package_installment as $package)
                            <div class="form-row col-md-3">
                                <div class="form-group">
                                    <label for="inputAddress">Amount</label>
                                    <input id="inputAddress" type="number" class="form-control" name="amount"
                                        placeholder="Enter Amount" value="{{$package->amount}}" required>
                                </div>
                            </div>
                            
                            <div class="form-row col-md-3">
                                <div class="form-group">
                                    <label for="inputAddress">Due date</label>
                                    <input id="inputAddress" type="date" class="form-control" name="due_date"
                                        placeholder="Enter Duration" value="{{ \Carbon\Carbon::parse($package->due_date)->format('Y-m-d') }}" required>
                                </div>
                            </div>
                            <div class="form-row col-md-3">
                                <div class="form-group">
                                    <label for="inputAddress">Payment Date</label>
                                    <input id="inputAddress" type="date" class="form-control" name="payment_date"
                                        placeholder="Enter session" value="{{ \Carbon\Carbon::parse($package->payment_date)->format('Y-m-d') }}" required>
                                </div>
                            </div>
                            <div class="form-row col-md-3">
                                <div class="form-group">
                                    <label for="inputAddress">Fine</label>
                                    <input id="inputAddress" type="number" class="form-control" name="fine"
                                        placeholder="Enter session" value="{{$package->fine}}" required>
                                </div>
                            </div>
                            <div>
                                <a href="{{route ('installment.edit', $package->package_id)}}" class="btn btn-primary">Edit</a>
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