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
                <form class="card" action="{{route('installment.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <h3 class="card-title">Add Package Installment</h3>
                        <div class="row row-cards">

                            <div class="form-row col-md-6">
                                <div class="form-group col-md-6">Select package</div>
                                <select class="form-select" name="package_id">
                                    @foreach($packages as $package)
                                    <option value="{{ $package->id }}">{{ $package->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="amount">Amount</label>
                                    <input id="" type="number" class="form-control" name="amount"
                                        placeholder="Enter amount" value="" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="due_date">Due Date</label>
                                    <input id="#" type="date" class="form-control" name="due_date"
                                        placeholder="Enter due date" value="" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="payment_date">Payment Date</label>
                                    <input id="#" type="date" class="form-control" name="payment_date"
                                        placeholder="Enter Paymnet Date" value="" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="fine">Fine</label>
                                    <input id="#" type="number" class="form-control" name="fine"
                                        placeholder="Enter Payment" value="" required>
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