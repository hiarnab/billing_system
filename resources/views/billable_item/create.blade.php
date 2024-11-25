@extends('layout.admin.app')

@push('js')
@endpush
@push('css')
@endpush

@section('content')
<div class="page-wrapper">
    <div class="page-body">
        <div class="container-xl">
            <div class="col-md-6">
                <form class="card" action="{{route ('billable.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <h3 class="card-title">Add BillableItem</h3>
                        <div class="row row-cards">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">Name</label>
                                    <input id="inputAddress" type="text" class="form-control" name="item_name"
                                        placeholder="Enter name" value="" required>
                                </div>
                            </div>
                            <div class="form-row col-md-6">
                                <div class="form-group col-md-6">Select Package</div>
                                <select class="form-select" name="package_id">
                                    @foreach($packages as $package)
                                    <option value="{{ $package->id }}">{{ $package->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">Amount</label>
                                    <input id="inputAddress" type="number" class="form-control" name="amount"
                                        placeholder="Enter amount" value="" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
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