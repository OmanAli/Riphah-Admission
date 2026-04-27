@extends('layouts.dashboard')
@section('title', 'Sessions')
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
                        <li class="breadcrumb-item active">Sessions</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        @include('common.alert')
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('configuration.sessions_store') }}"
                            enctype="multipart/form-data" class="form theme-form">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 row">
                                            <div class="col-md-4">
                                                <label class="col-form-label">Session Year<span
                                                        style="color:red">*</span></label>
                                                <input type="text" class="form-control" value="{{ old('session_year') }}"
                                                    name="session_year" autofocus required>
                                                <span class="text-danger">{{ $errors->first('session_year') }}</span>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="col-form-label">Session Type<span
                                                        style="color:red">*</span></label>
                                                <select name="session_type" id="" class="form-control" autofocus>
                                                    <option value="">Select Session Type</option>
                                                    <option value="Fall"
                                                        {{ old('session_type') == 'Fall' ? 'selected' : '' }}>Fall</option>
                                                    <option value="Spring"
                                                        {{ old('session_type') == 'Spring' ? 'selected' : '' }}>Spring
                                                    </option>
                                                    <option value="Summer"
                                                        {{ old('session_type') == 'Summer' ? 'selected' : '' }}>Summer
                                                    </option>
                                                </select>
                                                <span class="text-danger">{{ $errors->first('session_type') }}</span>
                                            </div>
                                            {{-- <div class="col-md-4">
                                                <label class="col-form-label">Session Status<span
                                                        style="color:red">*</span></label>
                                                <select name="session_status" id="" class="form-control" autofocus>
                                                    <option value="">Select Session Status</option>
                                                    <option value="1"
                                                        {{ old('session_status') == '1' ? 'selected' : '' }}>Active</option>
                                                    <option value="0"
                                                        {{ old('session_status') == '0' ? 'selected' : '' }}>Inactive
                                                    </option>
                                                </select>
                                                <span class="text-danger">{{ $errors->first('session_status') }}</span>
                                            </div> --}}
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <div class="col-sm-13">
                                    <button class="btn btn-primary" type="submit">Submit</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-1" style="table-layout: fixed; width: 100%;font-size: 14px;">
                                <thead>
                                    <tr>

                                        <th>Session Year</th>
                                        <th>Session Type</th>
                                        <th>Session Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($data))
                                        @foreach ($data as $key => $item)
                                            <tr>

                                                <td>{{ $item->session_year }}</td>
                                                <td>{{ $item->session_type }}</td>
                                                <td>
                                                    @if ($item->session_status == 1)
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <form action="{{ route('configuration.sessions_update') }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        <input type="hidden" name="session_id"
                                                            value="{{ $item->id }}">

                                                        @if ($item->session_status == 1)
                                                            <button type="submit" class="btn btn-success btn-sm"
                                                                title="Click to deactivate">
                                                                <i class="fa fa-toggle-on"></i>
                                                            </button>
                                                        @else
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                title="Click to activate">
                                                                <i class="fa fa-toggle-off"></i>
                                                            </button>
                                                        @endif
                                                    </form>
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
