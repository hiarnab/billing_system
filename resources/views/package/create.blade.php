@extends('layout.admin.app')

@push('js')
@endpush
@push('css')
    {{-- <style>
     .icon {
            cursor: pointer;
            font-size: 20px;
            color: #007bff;
            margin-right: 50px;
            margin-top:20px;
        }
        .icon.remove {
            color: #dc3545; /* Red color for the remove icon */
        }
</style> --}}
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
                            <a href="{{ route('package.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currntColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12l14 0" />
                                    <path d="M5 12l6 6" />
                                    <path d="M5 12l6 -6" />
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
                    <form class="card" action="{{ route('package.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <h3 class="card-title">Add Package</h3>
                            <div class="row row-cards">

                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">Select Course</div>
                                    <select class="form-select col-md-6" name="course_id" id="course">
                                        <option value="">Select Course</option>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="name">Package Name</label>
                                        <input id="" type="text" class="form-control" name="name"
                                            placeholder="Enter Name" value="" required>
                                    </div>
                                </div>
                                <br>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="base_price">Base Price</label>
                                        <input id="base_price" type="number" class="form-control" name="base_price"
                                            placeholder="Enter base price" value="" required onchange="updatePrice()">
                                    </div>
                                </div>
                                <br>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="gst">GST (if any)</label>
                                        <input id="gst" type="number" class="form-control" name="gst"
                                            onchange="updatePrice()" placeholder="Enter GST if applicable" value=""
                                            required>
                                    </div>
                                </div>
                                    <br>
                                <div class="form-row col-md-6">
                                    <div class="form-group">
                                        <label for="net_price">Net Price</label>
                                        <input id="net_price" class="form-control" name="net_price" readonly>
                                    </div>
                                </div>
                                <br>
                                <hr>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">Select Billable Item</div>
                                    <select class="form-select col-md-6" name="billable_item_id[]">
                                        @foreach ($billable_item as $item)
                                            <option value="{{ $item->id }}">{{ $item->item_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="container">
                                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                                    <div id="input-fields">

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="text-left card-footer">
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
        //  document.addEventListener('DOMContentLoaded', function () {
        function updatePrice() {
            var basePrice = parseFloat(document.getElementById('base_price').value) || 0;
            var gstPercentage = parseFloat(document.getElementById('gst').value) || 0;

            var gstAmount = (basePrice * gstPercentage) / 100;
            var netPrice = basePrice + gstAmount;

            // Update the net price input field
            document.getElementById('net_price').value = netPrice.toFixed(2);
        }
        //  });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const plusIcon = document.querySelector('.fa-plus-square');
            const inputFieldsContainer = document.getElementById('input-fields');
            let inputFieldCount = 0;

            if (inputFieldsContainer) {
                plusIcon.addEventListener('click', () => {

                    if (inputFieldCount < 5) {
                        const newInputContainer = document.createElement('div');
                        newInputContainer.className = 'row mb-2';

                        // Billable Item Dropdown
                        const billableitemfieldcontainer = document.createElement('div');
                        billableitemfieldcontainer.className = 'form-row col-md-3';
                        billableitemfieldcontainer.innerHTML = `
                    <div class="form-group">
                        <label for="billable_id">Billable Item</label>
                        <select class="form-control" name="billable_item_id[]" required>
                            <option value="" disabled selected>Select Billable item</option>
                            @foreach ($billable_item as $item)
                            <option value="{{ $item->id }}">{{ $item->item_name }}</option>
                            @endforeach
                        </select>
                    </div>`;

                        // Name Field
                        const namefieldcontainer = document.createElement('div');
                        namefieldcontainer.className = 'form-row col-md-3';
                        namefieldcontainer.innerHTML = `
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name[]" placeholder="Enter name" required>
                    </div>`;

                        // Base Price Field
                        const pricefieldcontainer = document.createElement('div');
                        pricefieldcontainer.className = 'form-row col-md-3';
                        pricefieldcontainer.innerHTML = `
                    <div class="form-group">
                        <label for="base_price">Price</label>
                        <input type="number" class="form-control" name="base_price[]" placeholder="Enter price" required>
                    </div>`;

                        // Net Price Field
                        const netpricefieldcontainer = document.createElement('div');
                        netpricefieldcontainer.className = 'form-row col-md-3';
                        netpricefieldcontainer.innerHTML = `
                    <div class="form-group">
                        <label for="net_price">Net Price</label>
                        <input type="number" class="form-control" name="net_price[]" placeholder="Enter net price" required>
                    </div>`;

                        // Discount Percentage Field
                        const discountfieldcontainer = document.createElement('div');
                        discountfieldcontainer.className = 'form-row col-md-3';
                        discountfieldcontainer.innerHTML = `
                    <div class="form-group">
                        <label for="discount_percentage">Discount</label>
                        <input type="number" class="form-control" name="discount_percentage[]" placeholder="Enter discount" required>
                    </div>`;

                        // Append the individual fields to the new input container
                        newInputContainer.appendChild(billableitemfieldcontainer);
                        // newInputContainer.appendChild(namefieldcontainer);
                        newInputContainer.appendChild(pricefieldcontainer);
                        newInputContainer.appendChild(netpricefieldcontainer);
                        newInputContainer.appendChild(discountfieldcontainer);

                        // Create a Remove Icon
                        const removeIcon = document.createElement('i');
                        removeIcon.className = 'fa fa-minus-square icon remove';
                        removeIcon.setAttribute('aria-hidden', 'true');

                        // Append the remove icon to the new input container
                        newInputContainer.appendChild(removeIcon);
                        inputFieldsContainer.appendChild(newInputContainer);

                        inputFieldCount++;

                        // Remove icon functionality
                        removeIcon.addEventListener('click', () => {
                            inputFieldsContainer.removeChild(newInputContainer);
                            inputFieldCount--;

                            if (inputFieldCount < 5) {
                                plusIcon.style.pointerEvents = 'auto';
                                plusIcon.style.opacity = '1';
                            }
                        });

                        // Disable the add icon if the limit is reached
                        if (inputFieldCount >= 5) {
                            plusIcon.style.pointerEvents = 'none';
                            plusIcon.style.opacity = '0.5';
                        }

                    } else {
                        alert('You can only add up to 5 input field sets.');
                    }
                });
            } else {
                console.error('Input fields container not found!');
            }
        });
    </script>
@endpush
