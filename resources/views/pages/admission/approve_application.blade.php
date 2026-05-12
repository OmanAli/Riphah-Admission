@extends('layouts.dashboard')
@section('title', 'Approved Application')
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
                        <li class="breadcrumb-item active">Approved Application</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mb-2">
        <div class="row">
            {{-- <div class="col-md-12 text-end">
                <button class="btn btn-primary btn-sm">
                    PUBLISH OFFER LETTER
                </button>
                <button class="btn btn-warning btn-sm">
                    UNPUBLISH OFFER LETTER
                </button>
            </div> --}}
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-12 d-flex justify-content-end">
                            </div>
                        </div>
                        @include('common.alert')
                        <div class="table-responsive">
                            <table class="display" id="basic-1" style="font-size: 14px;">
                                <thead>
                                    <tr>

                                        <th>ID</th>
                                        <th>Full Name</th>
                                        <th>Father Name</th>
                                        <th>Program Type</th>
                                        <th>Program</th>
                                        <th>Status</th>
                                        <th>Published Offer Letter</th>
                                        <th>Submission Date</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($applications))
                                        @foreach ($applications as $key => $application)
                                            <tr>

                                                <td>{{ $application->oas_id }}</td>
                                                <td>{{ $application->first_name . ' ' . $application->last_name }}</td>
                                                <td>{{ $application->father_name }}</td>
                                                <td>
                                                    {{ $application->level == 'UG' ? 'Undergraduate' : ($application->level == 'PG' ? 'Postgraduate' : ($application->level == 'D' ? 'Diploma/Certificate' : $application->level)) }}
                                                </td>
                                                <td>
                                                    @if ($application->offerletter && $application->offerletter->program_id)
                                                        {{ strtoupper($application->offerletter->offered_program->program_name) }}
                                                    @else
                                                        --
                                                    @endif
                                                </td>

                                                <td>
                                                    @if ($application->application_status == 0)
                                                        <span class="badge bg-info" style="text-wrap: auto;">
                                                            Approved
                                                        </span>
                                                    @elseif($application->application_status == 1)
                                                        <span class="badge bg-success" style="text-wrap: auto;">
                                                            Approved
                                                        </span>
                                                    @elseif($application->application_status == 2)
                                                        <span class="badge bg-danger">Rejected</span>
                                                    @endif
                                                </td>
                                                <td>

                                                    @if ($application->offerletter && $application->offerletter->status == 1)
                                                        <a href="{{ route('download_offer_letter', ['id' => $application->oas_id]) }}"
                                                            class="btn btn-success btn-sm"><i
                                                                class="fa fa-download "></i></a>
                                                    @else
                                                        @if ($application->offerletter && $application->offerletter->status == 0)
                                                            <span class="badge bg-secondary">Un Published</span>
                                                        @endif
                                                        @if (!$application->offerletter)
                                                            <span class="badge bg-warning">Not Published</span>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>{{ $application->created_at->format('Y-m-d') }}</td>

                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" class="text-dark" data-bs-toggle="dropdown">
                                                            &#8942;
                                                        </a>

                                                        <ul class="dropdown-menu">
                                                            @if (!$application->offerletter)
                                                                <li>
                                                                    <a class="btn btn-primary btn-sm dropdown-item"
                                                                        type="button" data-bs-toggle="modal"
                                                                        data-bs-target="#offerletterModal{{ $key }}"
                                                                        style="color: white">
                                                                        PUBLISH OFFER LETTER
                                                                    </a>

                                                                </li>
                                                            @else
                                                                @if ($application->offerletter && $application->offerletter->status == 1)
                                                                    <li>
                                                                        <a class="btn btn-danger btn-sm dropdown-item"
                                                                            href="{{ route('un_publish_offer_letter', [$application->oas_id]) }}"
                                                                            style="color: white">
                                                                            UNPUBLISH OFFER LETTER
                                                                        </a>
                                                                    </li>
                                                                @elseif($application->offerletter && $application->offerletter->status == 0)
                                                                    <li>
                                                                        <a class="btn btn-primary btn-sm dropdown-item"
                                                                            type="button" data-bs-toggle="modal"
                                                                            data-bs-target="#offerletterModal{{ $key }}"
                                                                            style="color: white">
                                                                            PUBLISH OFFER LETTER
                                                                        </a>
                                                                    </li>
                                                                @endif
                                                            @endif
                                                        </ul>
                                                    </div>
                                                    <div class="modal fade" id="offerletterModal{{ $key }}"
                                                        tabindex="-1">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Publish Offer Letter
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"></button>
                                                                </div>
                                                                <form method="POST"
                                                                    action="{{ route('publish_offer_letter') }}">
                                                                    <div class="modal-body">

                                                                        @csrf
                                                                        <input type="hidden" name="oas_id"
                                                                            value="{{ $application->oas_id }}">
                                                                        <div class="mb-3">
                                                                            <label for="">Fee Submission
                                                                                Date <span
                                                                                    style="color: red">*</span></label>
                                                                            <input type="date" class="form-control"
                                                                                name="date" required>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label>
                                                                                Select Program Preference <span
                                                                                    class="text-danger">*</span>
                                                                            </label>

                                                                            <select name="program_id" id="program_id"
                                                                                class="form-control" required>
                                                                                <option value="" selected disabled>
                                                                                    Select Program</option>

                                                                                @if (isset($programs))
                                                                                    @foreach ($programs as $prg)
                                                                                        <option
                                                                                            value="{{ $prg->id }}">
                                                                                            {{ $prg->program_name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                @endif
                                                                            </select>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="">Offer
                                                                                Letter<span
                                                                                    style="color: red">*</span></label>
                                                                            <select name="offer_letter" id="offer_letter"
                                                                                class="form-control" required>
                                                                                <option value="" selected disabled>
                                                                                    Select Offer Letter</option>
                                                                            </select>
                                                                        </div>

                                                                    </div>

                                                                    <div class="modal-footer">

                                                                        <button type="submit" class="btn btn-info"
                                                                            name="action" value="preview">Preview</button>
                                                                        <button class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary"
                                                                            name="action" value="submit">Submit</button>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                        @endforeach

                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')

@endsection
@section('scripts')
    {{-- <script>
        $(document).ready(function() {

            $('#program_id').on('change', function() {

                let program_id = $(this).val();

                $('#offer_letter').html(
                    '<option selected disabled>Loading...</option>'
                );

                $.ajax({
                    url: "{{ route('get_offer_letters', ':id') }}".replace(':id', program_id),
                    type: "GET",

                    success: function(response) {

                        let html =
                            '<option value="" selected disabled>Select Offer Letter</option>';

                        $.each(response, function(key, item) {
                            html += `<option value="${item.id}">${item.name}</option>`;
                        });

                        $('#offer_letter').html(html);
                    }
                });

            });

        });
    </script> --}}

    <!-- Include Select2 CSS & JS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {

            // Program dropdown searchable
            $('#program_id').select2({
                placeholder: "Select Program",
                width: '100%',
                dropdownParent: $('#program_id').parent()
            });

            // Offer letter dropdown searchable
            $('#offer_letter').select2({
                placeholder: "Select Offer Letter",
                width: '100%',
                dropdownParent: $('#offer_letter').parent()
            });

            $('#program_id').on('change', function() {

                let program_id = $(this).val();

                $('#offer_letter').html('<option selected disabled>Loading...</option>').trigger('change');

                $.ajax({
                    url: "{{ route('get_offer_letters', ':id') }}".replace(':id', program_id),
                    type: "GET",

                    success: function(response) {

                        let html =
                            '<option value="" selected disabled>Select Offer Letter</option>';

                        $.each(response, function(key, item) {
                            html += `<option value="${item.id}">${item.name}</option>`;
                        });

                        $('#offer_letter').html(html).trigger('change');
                    }
                });

            });

        });
    </script>
@endsection
