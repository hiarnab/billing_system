@extends('layout.admin.app')

@push('css')
@endpush

@section('content')
<div class="page-wrapper">
    <div class="page-body">
        <div class="container-xl">
            <div class="col-md-6">
                <form class="card" action="{{route ('student.update', $student_edit->id)}}" method="post">
                    @csrf
                    <div class="card-body">
                        <h3 class="card-title">Edit Student</h3>
                        <div class="row row-cards">    
            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">Address</label>
                                    <input id="inputAddress" type="text" class="form-control" name="address"
                                        placeholder="Enter Amount" value="{{$student_edit->address}}" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">Father name</label>
                                    <input id="inputAddress" type="text" class="form-control" name="father_name"
                                        placeholder="Enter Duration" value="{{$student_edit->father_name }}" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">Father mobile no</label>
                                    <input id="inputAddress" type="text" class="form-control" name="father_mobile"
                                        placeholder="Enter session" value="{{$student_edit->father_mobile }}" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">Mobile number</label>
                                    <input id="inputAddress" type="number" class="form-control" name="mobile_no"
                                        placeholder="Enter session" value="{{$student_edit->mobile_no}}" required>
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