@extends('layouts.dashboard')
@section('title', 'Application Report')
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
                        <li class="breadcrumb-item active">Application Report</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @include('common.alert')
                        <h3>Application Report</h3>
                        <hr>

                        <form action="{{ route('report.master_report') }}" method="post">
                            @csrf
                            <div class="row mt-3">
                                <div class="col-md-4 mt-2 text-end"><label for="">Campus Name</label></div>
                                <div class="col-md-6 mt-2 ">
                                    <select class="form-control" name="campus_id" id="campus_id" required>
                                        <option value="" selected disabled>--Select Campus--</option>
                                        @foreach ($campuses as $campus)
                                            <option value="{{ $campus->id }}">{{ $campus->campus_name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('accountant_id') }}</span>
                                </div>
                                <div class="col-md-4 mt-3 text-end"><label for="">Program Name</label></div>
                                <div class="col-md-6 mt-3 ">
                                    <select class="form-control" name="program_ids[]" id="program_id" multiple required>
                                        <option value="" disabled>--Select Programs--</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mt-3 text-end"><label for="">Session</label></div>
                                <div class="col-md-6 mt-3 ">
                                    <select class="form-control" name="session" id="session" required>
                                        <option value="" selected disabled>--Select Session--</option>
                                        @foreach ($sessions as $session)
                                            <option value="{{ $session->id }}">{{ $session->session_type }}
                                                {{ $session->session_year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 mt-3 text-end"><label for="">Date Range</label></div>
                                <div class="col-md-6 mt-3 ">
                                    <div class="row align-items-center">
                                        <div class="col-md-5">
                                            <input type="date" name="start_date" class="form-control">
                                        </div>
                                        <div class="col-md-1 text-center">
                                            <span>to</span>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="date" name="end_date" class="form-control">
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-start">
                                <div class="col-sm-12 text-end">
                                    <button class="btn btn-primary" type="submit">Submit</button>

                                </div>
                            </div>
                        </form>
                        <div class="col-md-4"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('scripts')


    <script>
        $(document).ready(function() {
            $('#program_id').select2({
                placeholder: "--Select Programs--",
                allowClear: true,
                width: '100%'
            });
            $('#campus_id').on('change', function() {

                let campusId = $(this).val();

                $('#program_id')
                    .html('<option>Loading...</option>')
                    .trigger('change');

                $.ajax({
                    url: '/reports/get-programs/' + campusId,
                    type: 'GET',
                    success: function(data) {

                        let $el = $('#program_id');

                        $el.empty();

                        $.each(data, function(key, program) {
                            $el.append(
                                `<option value="${program.id}">
                            ${program.program_name}
                        </option>`
                            );
                        });
                        $el.trigger('change');

                    },
                    error: function() {
                        alert('Failed to load programs');
                        $('#program_id').html('');
                        $('#program_id').trigger('change');
                    }
                });

            });

        });
    </script>

@endsection
