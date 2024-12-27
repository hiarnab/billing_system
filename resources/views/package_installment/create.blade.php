@extends('layout.admin.app')

@push('css')
<style>
        .container {
            margin: 20px;
        }
        .input-container {
            margin-top: 10px;
            display: flex;
            align-items: center;
            gap:12px;

            & .form-row{
                width: 200px;
            }
        }
        .input-container input {
            margin-right: 10px;
            
        }
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
      
    </style>
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
                            Package installment
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="{{route ('installment.index')}}" class="btn btn-primary d-none d-sm-inline-block">
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
    <!-- page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="col">
                <form class="card" action="{{route('installment.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <h3 class="card-title">Add Package Installment</h3>
                        <div class="row row-cards">

                            <div class="form-row col-md-3">
                                <div class="form-group">Select package</div>
                                <select class="form-select" name="package_id">
                                    @foreach($packages as $package)
                                    <option value="{{ $package->id }}">{{ $package->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-row col-md-3">
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input id="" type="number" class="form-control" name="amount[]"
                                        placeholder="Enter amount" value="" required>
                                </div>
                            </div>

                            <div class="form-row col-md-3">
                                <div class="form-group">
                                    <label for="due_date">Due Date</label>
                                    <input id="#" type="date" class="form-control" name="due_date[]"
                                        placeholder="Enter due date" value="" required>
                                </div>
                            </div>
                            <div class="form-row col-md-3">
                                <div class="form-group">
                                    <label for="payment_date">Payment Date</label>
                                    <input id="#" type="date" class="form-control" name="payment_date[]"
                                        placeholder="Enter Paymnet Date" value="" required>
                                </div>
                            </div>
                            <!-- <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="fine">Fine</label>
                                    <input id="#" type="number" class="form-control" name="fine[]"
                                        placeholder="Enter Payment" value="" required>
                                </div>
                            </div> -->

                            <div class="">
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
                newInputContainer.className = 'row mb-2';

                
                const amountFieldContainer = document.createElement('div');
                amountFieldContainer.className = 'form-row col-md-3';
                amountFieldContainer.innerHTML = `
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number" class="form-control" name="amount[]" placeholder="Enter amount" required>
                    </div>
                `;
                
                
                const dueDateFieldContainer = document.createElement('div');
                dueDateFieldContainer.className = 'form-row col-md-3';
                dueDateFieldContainer.innerHTML = `
                    <div class="form-group col">
                        <label for="due_date">Due Date</label>
                        <input type="date" class="form-control" name="due_date[]" placeholder="Enter due date" required>
                    </div>
                `;

                
                const paymentDateFieldContainer = document.createElement('div');
                paymentDateFieldContainer.className = 'form-row col-md-3';
                paymentDateFieldContainer.innerHTML = `
                    <div class="form-group col">
                        <label for="payment_date">Payment Date</label>
                        <input type="date" class="form-control" name="payment_date[]" placeholder="Enter Payment Date" required>
                    </div>
                `;

                
                // const fineFieldContainer = document.createElement('div');
                // fineFieldContainer.className = 'form-row';
                // fineFieldContainer.innerHTML = `
                //     <div class="form-group col">
                //         <label for="fine">Fine</label>
                //         <input type="number" class="form-control" name="fine[]" placeholder="Enter Fine" required>
                //     </div>
                // `;

                
                newInputContainer.appendChild(amountFieldContainer);
                newInputContainer.appendChild(dueDateFieldContainer);
                newInputContainer.appendChild(paymentDateFieldContainer);
                // newInputContainer.appendChild(fineFieldContainer);

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