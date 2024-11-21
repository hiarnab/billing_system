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
            <form class="card" action="{{route('course.store')}}" method="post">
                @csrf
                <div class="card-body">
                    <h3 class="card-title">Add Course</h3>
                    <div class="row row-cards">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Name</label>
                                <input id="inputAddress" type="text" class="form-control" name="name"
                                    placeholder="Enter Name" value="" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Session</label>
                                <input id="inputAddress" type="text" class="form-control" name="session"
                                    placeholder="Enter session" value="" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Duration</label>
                                <input id="inputAddress" type="number" class="form-control" name="duration"
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