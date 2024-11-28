@extends('layout.admin.app')

@push('css')
@endpush

@section('content')
<div class="page-wrapper">
    <div class="page-body">
        <div class="container-xl">
            <div class="col-md-6">
                <form class="card" action="{{route ('installment.update', $package_installment_edit->id)}}" method="post">
                    @csrf
                    <div class="card-body">
                        <h3 class="card-title">Edit Package Installment</h3>
                        <div class="row row-cards">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="package_id">Package name</label>
                                    <select id="package_id" class="form-control" name="package_id" required>
                                        @foreach($packages as $package)
                                        <option value="{{ $package->id }}"
                                            @if($package_installment_edit->package_id == $package->id) selected @endif>
                                            {{ $package->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">Amount</label>
                                    <input id="inputAddress" type="number" class="form-control" name="amount"
                                        placeholder="Enter Amount" value="{{$package_installment_edit->amount}}" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">Due date</label>
                                    <input id="inputAddress" type="text" class="form-control" name="due_date"
                                        placeholder="Enter Duration" value="{{ \Carbon\Carbon::parse($package_installment_edit->due_date)->format('Y-m-d') }}" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">Payment Date</label>
                                    <input id="inputAddress" type="text" class="form-control" name="payment_date"
                                        placeholder="Enter session" value="{{ \Carbon\Carbon::parse($package_installment_edit->payment_date)->format('Y-m-d') }}" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">Fine</label>
                                    <input id="inputAddress" type="number" class="form-control" name="fine"
                                        placeholder="Enter session" value="{{$package_installment_edit->fine}}" required>
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