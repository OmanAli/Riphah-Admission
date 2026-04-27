@extends('layouts.dashboard')
@section('title', 'Programs')
@section('content')

    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h5>Dashboard</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}"> <i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Programs</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row text-end mb-2">
            <div class="col-sm-12">
                <a href="{{ route('configuration.programs') }}" class="btn btn-primary"><- GO BACK</a>
            </div>
        </div>
        @include('common.alert')
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('configuration.program_store') }}"
                            enctype="multipart/form-data" class="form theme-form">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3 row">
                                            <div class="col-md-6">
                                                <label class="col-form-label">Campus<span style="color:red">*</span></label>
                                                <select name="campus_id" id="campus_id" class="form-control" required>
                                                    <option value="" selected disabled>Select Campus</option>
                                                    @foreach ($campus as $campusItem)
                                                        <option value="{{ $campusItem->id }}">
                                                            {{ $campusItem->campus_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-form-label">Department<span
                                                        style="color:red">*</span></label>
                                                <select name="department_id" id="department_id" class="form-control"
                                                    required>
                                                    <option value="" selected disabled>Select Department</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Level<span style="color:red">*</span></label>
                                                <select name="level" id="" class="form-control" required>
                                                    <option value="" selected disabled>--Select
                                                        Level--</option>
                                                    @foreach ($admission_levels as $level)
                                                        <option value="{{ $level->abbreviation }}">
                                                            {{ $level->level }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">{{ $errors->first('level') }}</span>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Program<span
                                                        style="color:red">*</span></label>
                                                <input type="text" class="form-control" name="program" required>
                                                <span class="text-danger">{{ $errors->first('program') }}</span>
                                            </div>
                                            {{-- <div class="col-md-6">
                                                <label class="col-form-label">Session<span style="color:red">*</span></label>
                                                <select name="session_id" id="" class="form-control" required>
                                                    <option value="" selected disabled>Select Session</option>
                                                    @foreach ($sessions as $session)
                                                        <option value="{{ $session->id }}">
                                                            {{ $session->session_type }} - {{ $session->session_year }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">{{ $errors->first('session_id') }}</span>
                                            </div> --}}
                                            <div class="col-md-6">
                                                <label class="col-form-label">Status<span style="color:red">*</span></label>
                                                <select name="status" id="" class="form-control" required>
                                                    <option value="1" selected>Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                                <span class="text-danger">{{ $errors->first('status') }}</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <div class="col-sm-13">
                                    <button class="btn btn-primary" type="submit">ADD</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('#campus_id').change(function() {

            var campus_id = $(this).val();

            $.ajax({
                url: '/configuration/get-departments/' + campus_id,
                type: 'GET',
                success: function(data) {

                    $('#department_id').html('<option value="">Select Department</option>');

                    $.each(data, function(key, department) {
                        $('#department_id').append(
                            '<option value="' + department.id + '">' + department
                            .department_name + '</option>'
                        );
                    });

                }
            });

        });
    </script>
@endsection
