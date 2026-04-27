@extends('layouts.dashboard')
@section('title', 'Department')
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
                        <li class="breadcrumb-item active">Department</li>
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
                        <form method="POST" action="{{ route('configuration.departments_store') }}"
                            enctype="multipart/form-data" class="form theme-form">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 row">
                                            <div class="col-md-6">
                                                <label class="col-form-label">Campus<span style="color:red">*</span></label>
                                                <select name="campus_id" id="" class="form-control" required>
                                                    <option value="" selected disabled>Select
                                                        Campus</option>
                                                    @foreach ($campus as $campusItem)
                                                        <option value="{{ $campusItem->id }}">
                                                            {{ $campusItem->campus_name }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">{{ $errors->first('campus_id') }}</span>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Department Name<span
                                                        style="color:red">*</span></label>
                                                <input type="text" class="form-control"
                                                    value="{{ old('department_name') }}" name="department_name" autofocus>
                                                <span class="text-danger">{{ $errors->first('department_name') }}</span>
                                            </div>
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

                                        <th>Campus Name</th>
                                        <th>Department</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($data))
                                        @foreach ($data as $key => $item)
                                            <tr>
                                                <td>{{ $item->campus->campus_name ?? '' }}</td>
                                                <td>{{ $item->department_name ?? '' }}</td>
                                                <td>
                                                    <a type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#editDepartmentModal{{ $key }}"><i
                                                            class="fa fa-pencil"></i></a>
                                                    <div class="modal fade" id="editDepartmentModal{{ $key }}"
                                                        tabindex="-1" aria-labelledby="feeModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">

                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="feeModalLabel">
                                                                        EDIT DEPARTMENT</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST"
                                                                        action="{{ route('configuration.departments_update') }}"
                                                                        enctype="multipart/form-data"
                                                                        class="form theme-form">
                                                                        @csrf
                                                                        <input type="hidden" value="{{ $item->id }}" name="department_id">
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="mb-3 row">

                                                                                        <div class="col-md-12">
                                                                                            <label
                                                                                                class="col-form-label">Department
                                                                                                Name<span
                                                                                                    style="color:red">*</span></label>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                value="{{ $item->department_name  }}"
                                                                                                name="department_name"
                                                                                                autofocus>
                                                                                            <span
                                                                                                class="text-danger">{{ $errors->first('department_name') }}</span>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-footer text-end">
                                                                            <div class="col-sm-13">
                                                                                <button class="btn btn-primary"
                                                                                    type="submit">Submit</button>

                                                                            </div>
                                                                        </div>
                                                                    </form>


                                                                </div>

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
