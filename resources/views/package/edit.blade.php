@extends('layout.admin.app')

@push('css')
@endpush

@section('content')
<div class="page-wrapper">
<div class="page-body">
    <div class="container-xl">
        <div class="col-md-6">
            <form class="card" action="{{route('package.update', $package_edit->id)}}" method="post">
                @csrf
                <div class="card-body">
                    <h3 class="card-title">Edit Package</h3>
                    <div class="row row-cards">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Name</label>
                                <input id="inputAddress" type="text" class="form-control" name="name"
                                    placeholder="Enter Name" value="{{$package_edit->name}}" required>
                                <input type="hidden" name="id" value="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Course name</label>
                                <input id="inputAddress" type="text" class="form-control" name="course_id"
                                    placeholder="Enter session" value="{{$package_edit->course_id}}" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Price</label>
                                <input id="inputAddress" type="text" class="form-control" name="price"
                                    placeholder="Enter Duration" value="{{$package_edit->base_price}}" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Net Price</label>
                                <input id="inputAddress" type="number" class="form-control" name="net_price"
                                    placeholder="Enter Duration" value="{{$package_edit->net_price}}" required>
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
