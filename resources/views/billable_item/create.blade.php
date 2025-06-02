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

                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="col">
                    <form class="card" action="{{ route('billable-item.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <h3 class="card-title">Add Billable Item</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="inputAddress">Billable Item Name</label>
                                        <input id="inputAddress" type="text" class="form-control" name="item_name"
                                            placeholder="Enter billable item name" value="" required>
                                    </div>
                                </div>
                                <br>
                                {{-- <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="inputAddress">Amount (INR)</label>
                                        <input id="inputAddress" type="number" class="form-control" name="amount"
                                            placeholder="Enter amount" value="" required>
                                    </div>
                                </div> --}}
                                <br>
                                {{-- <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="inputAddress">GST (If any)</label>
                                        <input id="inputAddress" type="number" class="form-control" name="gst"
                                            placeholder="Enter 0.0 if no GST" value="" required>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="text-left card-footer">
                            <a class="btn btn-secondary" href="{{ route('billable-item.index') }}">Cancel</a>
                            <button type="submit" class="btn btn-primary">Add Billable Item</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="col-12" style="margin-top:75px;">

        </div> -->
@endsection
