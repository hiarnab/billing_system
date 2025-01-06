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
            <form class="card" action="#" method="post">
                @csrf
                <div class="card-body">
                    <h3 class="card-title">view Package</h3>
                    <div class="row row-cards">
                    @foreach($package_view as $view)
                        <div class="form-row col-md-3">
                            <div class="form-group">
                                <label for="inputAddress">Name</label>
                                <input id="inputAddress" type="text" class="form-control" name="name"
                                    placeholder="Enter Name" value="{{$view->name}}" required readonly>
                                    <input type="hidden" name="id" value="{{$view->id}}">
                            </div>
                        </div>
                        <div class="form-row col-md-3">
                            <div class="form-group">
                                <label for="inputAddress">Course name</label>
                                <input id="inputAddress" type="text" class="form-control" name="course_id"
                                    placeholder="Enter session" value="{{$view->course->name}}" required readonly>
                            </div>
                        </div>
                       
                        <div class="form-row col-md-3">
                            <div class="form-group">
                                <label for="inputAddress">Price</label>
                                <input id="inputAddress" type="text" class="form-control" name="price"
                                    placeholder="Enter Duration" value="{{$view->base_price}}" required readonly>
                            </div>
                        </div>

                        <div class="form-row col-md-3">
                            <div class="form-group">
                                <label for="inputAddress">Net Price</label>
                                <input id="inputAddress" type="number" class="form-control" name="net_price"
                                    placeholder="Enter Duration" value="{{$view->net_price}}" required readonly>
                            </div>
                        </div>

                        <div class="form-row col-md-3">
                            <div class="form-group">
                                <label for="inputAddress">Billable Item</label>
                                <input id="inputAddress" type="text" class="form-control" name="billable_item_id"
                                    placeholder="Enter Duration" value="{{$view->billable->item_name}}" required readonly>
                            </div>
                        </div>

                      {{--  <div class="form-row col-md-3">
                                <div class="form-group">
                                    <label for="package_id">Billable Item</label>
                                    <select id="package_id" class="form-control" name="billable_item_id" required >
                                        @foreach($package_view as $item)  
                                        <option value="{{ $item->billable_item_id }}"
                                        @if($item->billable_item_id == $selected_item_id) selected @endif>
                                            {{ $item->billable->item_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}

                        <div>
                                <a href="{{route ('package.edit', $view->id)}}" class="btn btn-primary">Edit</a>
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
