@extends('layout.admin.app')

@push('js')
@endpush
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
                            Billable Item
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="{{route ('billable.index')}}" class="btn btn-primary d-none d-sm-inline-block">
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
    <div class="page-body">
        <div class="container-xl">
            <div class="col">
                <form class="card" action="{{route ('billable.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <h3 class="card-title">Add BillableItem</h3>
                        <div class="row row-cards">
                            <div class="form-row col-md-3">
                                <div class="form-group">
                                    <label for="inputAddress">Name</label>
                                    <input id="inputAddress" type="text" class="form-control" name="item_name"
                                        placeholder="Enter name" value="" required>
                                </div>
                            </div>

                          {{--  <div class="form-row col-md-6">
                                <div class="form-group col-md-6">Select Package</div>
                                <select class="form-select" name="package_id">
                                    @foreach($packages as $package)
                                    <option value="{{ $package->id }}">{{ $package->name }}</option>
                                    @endforeach
                                </select>
                            </div> --}}

                            <div class="form-row col-md-3">
                                <div class="form-group">
                                    <label for="inputAddress">Amount</label>
                                    <input id="inputAddress" type="number" class="form-control" name="amount"
                                        placeholder="Enter amount" value="" required>
                                </div>
                            </div>
                            <div class="form-row col-md-3">
                                <div class="form-group">
                                    <label for="inputAddress">Gst</label>
                                    <input id="inputAddress" type="number" class="form-control" name="gst"
                                        placeholder="Enter gst number" value="" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-left">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- <div class="col-12" style="margin-top:75px;">
   
</div> -->


@endsection