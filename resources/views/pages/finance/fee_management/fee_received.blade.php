@extends('layouts.dashboard')
@section('title', 'Fee Receipt')
@section('content')

    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h5>Welcome</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}"> <i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Fee Receipt</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mb-2">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                @include('common.alert')
                <form id="receiptForm" method="POST"
                    action="{{ route('fee.download_receipt', ['oasID' => $application->oas_id]) }}" class="form theme-form">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">OAS ID</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" value="{{ $application->oas_id }}"
                                            name="oas_id" autofocus required readonly>
                                        <span class="text-danger">{{ $errors->first('oas_id') }}</span>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control"
                                            value="{{ $application->first_name }} {{ $application->last_name }}"
                                            name="name" autofocus required readonly>
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    </div>

                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Father Name</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" value="{{ $application->father_name }}"
                                            name="father_name" autofocus required readonly>
                                        <span class="text-danger">{{ $errors->first('father_name') }}</span>
                                    </div>

                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Program 1</label>
                                    <div class="col-sm-7">
                                        {{-- <input type="text" class="form-control"
                                            value="{{ $application->application_program }}" name="program1" autofocus
                                            required readonly> --}}
                                        <input type="text" class="form-control"
                                            value="{{ $application->preferenceOne->program_name }}" name="program1"
                                            autofocus required readonly>
                                        <span class="text-danger">{{ $errors->first('program1') }}</span>
                                    </div>

                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Applicable Fee</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control"
                                            value="{{ $application->processing_fee }}" name="processing_fee" autofocus
                                            required readonly>
                                        <span class="text-danger">{{ $errors->first('processing_fee') }}</span>
                                    </div>

                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Cash Received</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" value="{{ old('cash_received') }}"
                                            name="cash_received" autofocus required>
                                        <span class="text-danger">{{ $errors->first('cash_received') }}</span>
                                    </div>

                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Campus</label>
                                    <div class="col-sm-7">
                                        @if (auth()->user()->user_campus && auth()->user()->user_campus->campus_name)
                                            <input type="text" class="form-control"
                                                value="{{ auth()->user()->user_campus->campus_name }}" readonly
                                                name="campus" autofocus required>
                                        @else
                                            <select name="campus" id="campus" class="form-control" required>
                                                <option value="" selected disabled>--Select Campus--</option>
                                                @foreach ($campus as $campus_item)
                                                    <option value="{{ $campus_item->campus_name }}"
                                                        {{ $application->campus_id == $campus_item->id ? 'selected' : '' }}>
                                                        {{ $campus_item->campus_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @endif

                                        <span class="text-danger">{{ $errors->first('campus') }}</span>
                                    </div>

                                </div>
                                <span class="text-warning">Note:</span> Please ensure you have the cash in hand before
                                proceeding, as this is a non-reversible process. You will be responsible for this receipt.
                                <div class="col-sm-12 text-end">
                                    @if ($application->application_status == 1)
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    @else
                                        <button class="btn btn-primary" disabled>
                                            Submit
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

@endsection

@section('styles')

@endsection
@section('scripts')
    <script>
        document.getElementById('receiptForm').addEventListener('submit', function(e) {
            e.preventDefault();

            let form = this;
            let formData = new FormData(form);

            fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    }
                })
                .then(response => {
                    let disposition = response.headers.get('Content-Disposition');
                    let fileName = "receipt.pdf";

                    if (disposition && disposition.includes('filename=')) {
                        fileName = disposition.split('filename=')[1].replace(/"/g, '');
                    }

                    return response.blob().then(blob => ({
                        blob,
                        fileName
                    }));
                })
                .then(({
                    blob,
                    fileName
                }) => {
                    let url = window.URL.createObjectURL(blob);
                    let a = document.createElement('a');
                    a.href = url;
                    a.download = fileName;
                    document.body.appendChild(a);
                    a.click();
                    a.remove();

                    window.location.href = "{{ route('fee.receipt') }}";
                });
        });
    </script>
@endsection
