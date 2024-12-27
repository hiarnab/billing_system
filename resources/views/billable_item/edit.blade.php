@extends('layout.admin.app')

@push('css')
@endpush

@section('content')
<div class="page-wrapper">
    <div class="page-body">
        <div class="container-xl">
            <div class="col-md-6">
                <form class="card" action="{{route('billable.update', $billable_items_edit->id)}}" method="post">
                    @csrf
                    <div class="card-body">
                        <h3 class="card-title">Edit billable item</h3>
                        <div class="row row-cards">
                            <div class="form-row">
                                <div class="form-group col-md-6">
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

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">Amount</label>
                                    <input id="inputAddress" type="number" class="form-control" name="amount"
                                        placeholder="Enter amount" value="{{$billable_items_edit->amount}}" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
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