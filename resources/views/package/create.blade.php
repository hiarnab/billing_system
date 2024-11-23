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
                <form class="card" action="{{route('package.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <h3 class="card-title">Add Package</h3>
                        <div class="row row-cards">

                            <div class="form-row col-md-6">
                                <div class="form-group col-md-6">Select Course</div>
                                <select class="form-select" name="course_id">
                                    @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Name</label>
                                    <input id="" type="text" class="form-control" name="name"
                                        placeholder="Enter Name" value="" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="price">Price</label>
                                    <input id="#" type="number" class="form-control" name="price"
                                        placeholder="Enter price" value="" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="net_price">Net Price</label>
                                    <input id="#" type="number" class="form-control" name="net_price"
                                        placeholder="Enter Duration" value="" required>
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