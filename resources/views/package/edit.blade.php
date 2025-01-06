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
                            Package
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="{{route ('package.index')}}" class="btn btn-primary d-none d-sm-inline-block">
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
            <form class="card" action="{{route('package.update', $package_edit->course_id)}}" method="post">
                @csrf
                <div class="card-body">
                    <h3 class="card-title">Edit Package</h3>
                    <div class="row row-cards">
                        <div class="form-row col-md-3">
                            <div class="form-group">
                                <label for="inputAddress">Name</label>
                                <input id="inputAddress" type="text" class="form-control" name="name"
                                    placeholder="Enter Name" value="{{$package_edit->name}}" required>
                                <input type="hidden" name="id" value="">
                            </div>
                        </div>

                       <div class="form-row col-md-3">
                                <div class="form-group">
                                    <label for="course_id">Course name</label>
                                    <select id="course_id" class="form-control" name="course_id" required readonly>
                                        @foreach($package_edit as $package)  
                                        <option value="{{$package_edit->course_id}}">
                                            {{ $package_edit->course->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 

                        {{--  <div class="form-row col-md-3">
                            <div class="form-group">
                                <label for="inputAddress">Course name</label>
                                <input id="inputAddress" type="text" class="form-control" name="course_id"
                                    placeholder="Enter session" value="{{$package_edit->course->name}}" required>
                            </div>
                        </div> --}}

                        <div class="form-row col-md-3">
                            <div class="form-group">
                                <label for="inputAddress">Price</label>
                                <input id="inputAddress" type="text" class="form-control" name="price"
                                    placeholder="Enter Duration" value="{{$package_edit->base_price}}" required>
                            </div>
                        </div>

                        <div class="form-row col-md-3">
                            <div class="form-group">
                                <label for="inputAddress">Net Price</label>
                                <input id="inputAddress" type="number" class="form-control" name="net_price"
                                    placeholder="Enter Duration" value="{{$package_edit->net_price}}" required>
                            </div>
                        </div>

                     {{--   <div class="form-row col-md-3">
                                <div class="form-group">
                                    <label for="package_id">Billable Item</label>
                                    <select id="package_id" class="form-control" name="billable_item_id" required>
                                        @foreach($package_edit as $package)  
                                        <option value="{{ $package->billable_item_id }}">
                                            {{ $package->billable->item_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}

                         <div class="form-row col-md-3">
                            <div class="form-group">
                                <label for="inputAddress">Billable Item</label>
                                <input id="inputAddress" type="text" class="form-control" name="billable_item_id"
                                    placeholder="Enter Duration" value="{{$package_edit->billable->item_name}}" required>
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
