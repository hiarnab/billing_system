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

                            <div class="form-row ">
                                <div class="form-group col-md-6">Select Course</div>
                                <select class="form-select col-md-6" name="course_id">
                                    @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">Select Billable Item</div>
                                <select class="form-select col-md-6" name="billable_id[]">
                                    @foreach($billable_item as $item)
                                    @if($item->billable)
                                    <option value="{{ $item->id }}">{{ $item->billable->item_name }}</option>
                                    @else
                                    <option value="{{ $item->id }}">No Billable Item</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="" type="text" class="form-control" name="name[]"
                                        placeholder="Enter Name" value="" required>
                                </div>
                            </div>



                            <div class="form-row">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input id="#" type="number" class="form-control" name="price[]"
                                        placeholder="Enter price" value="" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="net_price">Net Price</label>
                                    <input id="#" type="number" class="form-control" name="net_price[]"
                                        placeholder="Enter Duration" value="" required>
                                </div>
                            </div>

                            <div class="container">
                                <i class="fa fa-plus-square" aria-hidden="true"></i>
                                <div id="input-fields">

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

@push('js')
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const plusIcon = document.querySelector('.fa-plus-square');
        const inputFieldsContainer = document.getElementById('input-fields');
        let inputFieldCount = 0;

        if (inputFieldsContainer) {
            plusIcon.addEventListener('click', () => {

                if (inputFieldCount < 5) {
                    const newInputContainer = document.createElement('div');
                    newInputContainer.className = 'input-container';


                    const billableitemfieldcontainer = document.createElement('div');
                    billableitemfieldcontainer.className = 'form-row'; // Correct the variable name from 'namefieldcontainer' to 'billableitemfieldcontainer'
                    billableitemfieldcontainer.innerHTML = `
              <div class="form-group col">
                     <label for="name">Billable</label>
                 <select class="form-control" name="billable[]" required>
                    <option value="" disabled selected>Select Billable item</option>
                    @foreach ($billable_item as $item)
                    <option value="{{$item->id}}">{{$item->billable->item_name}}</option>
                    @endforeach
                 </select>
              </div>`;


                    const namefieldcontainer = document.createElement('div');
                    namefieldcontainer.className = 'form-row';
                    namefieldcontainer.innerHTML = `
                <div class="form-group col">
                        <label for="name">Name</label>
                        <input type="name" class="form-control" name="name[]" placeholder="Enter name" required>
                </div>`;


                    const pricefieldcontainer = document.createElement('div');
                    pricefieldcontainer.className = 'form-row';
                    pricefieldcontainer.innerHTML = `
                <div class="form-group col">
                    <label for="price">Price</label>
                    <input type="text" class="form-control name="price[]" placeholder="Enter name" required>
                </div>
                `;

                    const netpricefieldcontainer = document.createElement('div');
                    netpricefieldcontainer.className = 'form-row';
                    netpricefieldcontainer.innerHTML = `
                <div class="form-group col">
                    <label for="net_price">Net price</label>
                    <input type="number" class="form-control name="net_price[]" placeholder="Enter net price" required>
                </div>
                `;

                    newInputContainer.appendChild(billableitemfieldcontainer);
                    newInputContainer.appendChild(namefieldcontainer);
                    newInputContainer.appendChild(pricefieldcontainer);
                    newInputContainer.appendChild(netpricefieldcontainer);

                    const removeIcon = document.createElement('i');
                    removeIcon.className = 'fa fa-minus-square icon remove';
                    removeIcon.setAttribute('aria-hidden', 'true');

                    newInputContainer.appendChild(removeIcon);
                    inputFieldsContainer.appendChild(newInputContainer);

                    inputFieldCount++;

                    removeIcon.addEventListener('click', () => {
                        inputFieldsContainer.removeChild(newInputContainer);
                        inputFieldCount--;


                        if (inputFieldCount < 5) {
                            plusIcon.style.pointerEvents = 'auto';
                            plusIcon.style.opacity = '1';
                        }
                    });
                } else {
                    alert('You can only add up to 5 input field sets.');
                    plusIcon.style.pointerEvents = 'none';
                    plusIcon.style.opacity = '0.5';
                }
            });
        } else {
            console.error('Input fields container not found!');
        }
    });
</script>





@endpush