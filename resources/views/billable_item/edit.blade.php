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
                <form class="card" action="{{route('billable.update', $billable_items_edit->id)}}" method="post">
                    @csrf
                    <div class="card-body">
                        <h3 class="card-title">Edit billable item</h3>
                        <div class="row row-cards">
                            <div class="form-row col-md-3">
                                <div class="form-group">
                                    <label for="inputAddress">Item Name</label>
                                    <input id="inputAddress" type="text" class="form-control" name="item_name"
                                        placeholder="Enter Name" value="{{$billable_items_edit->item_name}}" required>
                                    <input type="hidden" name="id" value="">
                                </div>
                            </div>
                          {{--  <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="package_id">Package</label>
                                    <select id="package_id" class="form-control" name="package_id" required>
                                        @foreach($packages as $package)
                                        <option value="{{ $package->id }}"
                                            @if($billable_items_edit->package_id == $package->id) selected @endif>
                                            {{ $package->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}

                            <div class="form-row col-md-3">
                                <div class="form-group">
                                    <label for="inputAddress">Amount</label>
                                    <input id="inputAddress" type="number" class="form-control" name="amount"
                                        placeholder="Enter amount" value="{{$billable_items_edit->amount}}" required>
                                </div>
                            </div>

                            <div class="form-row col-md-3">
                                <div class="form-group">
                                    <label for="inputAddress">Gst</label>
                                    <input id="inputAddress" type="number" class="form-control" name="gst"
                                        placeholder="Enter gst" value="{{$billable_items_edit->gst}}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-left card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
@endpush