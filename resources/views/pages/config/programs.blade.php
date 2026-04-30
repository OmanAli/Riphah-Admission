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
                <a href="{{ route('configuration.program_add') }}" class="btn btn-primary">+ ADD
                    PROGRAM</a>
            </div>
        </div>
        @include('common.alert')
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-1" style="table-layout: fixed; width: 100%;font-size: 14px;">
                                <thead>
                                    <tr>

                                        <th>Campus</th>
                                        <th>Department</th>
                                        <th>Level</th>
                                        {{-- <th>Session</th> --}}
                                        <th>Program</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($data))
                                        @foreach ($data as $key => $item)
                                            <tr>

                                                <td>{{ $item->campus->campus_name }}</td>
                                                @php
                                                    $levels = [
                                                        'UG' => 'Undergraduate',
                                                        'PG' => 'Postgraduate',
                                                        'D' => 'Diploma/Certificate',
                                                        'Phd' => 'Doctoral',
                                                    ];
                                                @endphp
                                                <td>{{ $item->department->department_name }}</td>
                                                <td>{{ $levels[$item->program_type] ?? '' }}</td>
                                                {{-- <td>{{ $item->session->session_type ?? '' }} - {{ $item->session->session_year ?? '' }}</td> --}}
                                                <td>{{ $item->program_name }}</td>
                                                <td>

                                                    <a type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#editProgramModal{{ $key }}"><i
                                                            class="fa fa-pencil"></i></a>


                                                    <div class="modal fade" id="editProgramModal{{ $key }}"
                                                        tabindex="-1" aria-labelledby="feeModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">

                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="feeModalLabel">
                                                                        EDIT PROGRAM</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST"
                                                                        action="{{ route('configuration.program_update') }}"
                                                                        enctype="multipart/form-data"
                                                                        class="form theme-form">
                                                                        @csrf
                                                                        <input type="hidden" value="{{ $item->id }}"
                                                                            name="program_id">
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <div class="mb-3 row">
                                                                                        <label
                                                                                            class="col-sm-4 col-form-label">Campus</label>
                                                                                        <div class="col-sm-12">
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                value="{{ $item->campus->campus_name }}"
                                                                                                name="campus_name" readonly
                                                                                                required>
                                                                                            <span
                                                                                                class="text-danger">{{ $errors->first('campus_name') }}</span>
                                                                                        </div>

                                                                                        <label
                                                                                            class="col-sm-4 col-form-label">Program<span
                                                                                                style="color:red">*</span></label>
                                                                                        <div class="col-sm-12">
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                name="program" required
                                                                                                value="{{ $item->program_name }}">
                                                                                            <span
                                                                                                class="text-danger">{{ $errors->first('program') }}</span>
                                                                                        </div>

                                                                                        {{-- <label
                                                                                            class="col-sm-4 col-form-label">Session<span
                                                                                                style="color:red">*</span></label>
                                                                                        <div class="col-sm-12">
                                                                                            <select name="session_id"
                                                                                                id="session_id"
                                                                                                class="form-control">
                                                                                                <option value="">
                                                                                                    Select Session</option>
                                                                                                @foreach ($sessions as $session)
                                                                                                    <option
                                                                                                        value="{{ $session->id }}"
                                                                                                        {{ $item->session_id == $session->id ? 'selected' : '' }}>
                                                                                                        {{ $session->session_type }} - {{ $session->session_year }}</option>
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                            <span
                                                                                                class="text-danger">{{ $errors->first('program') }}</span>
                                                                                        </div> --}}
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-footer text-end">
                                                                            <div class="col-sm-13">
                                                                                <button class="btn btn-primary"
                                                                                    type="submit">SAVE</button>

                                                                            </div>
                                                                        </div>
                                                                    </form>


                                                                </div>
                                                                {{-- <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <a href="#" class="btn btn-primary">Go to Fee
                                                                        Operation</a>
                                                                </div> --}}
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
