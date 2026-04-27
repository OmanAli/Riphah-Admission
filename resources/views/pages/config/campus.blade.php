@extends('layouts.dashboard')
@section('title', 'Campus')
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
                        <li class="breadcrumb-item active">Campus</li>
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
                        <form method="POST" action="{{ route('configuration.campus_store') }}"
                            enctype="multipart/form-data" class="form theme-form">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 row">
                                            <div class="col-md-4">
                                                <label class="col-form-label">Campus<span style="color:red">*</span></label>
                                                <input type="text" class="form-control" value="{{ old('campus_name') }}"
                                                    name="campus_name" autofocus required>
                                                <span class="text-danger">{{ $errors->first('campus_name') }}</span>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="col-form-label">Campus Head</label>
                                                <input type="text" class="form-control"
                                                    value="{{ old('campus_head_name') }}" name="campus_head_name" autofocus>
                                                <span class="text-danger">{{ $errors->first('campus_head_name') }}</span>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="col-form-label">Campus Email</label>
                                                <input type="email" class="form-control" value="{{ old('campus_email') }}"
                                                    name="campus_email" autofocus>
                                                <span class="text-danger">{{ $errors->first('campus_email') }}</span>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="col-form-label">Campus Phone</label>
                                                <input type="text" class="form-control" value="{{ old('campus_phone') }}"
                                                    name="campus_phone" autofocus>
                                                <span class="text-danger">{{ $errors->first('campus_phone') }}</span>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="col-form-label">Campus Address</label>
                                                <input type="text" class="form-control"
                                                    value="{{ old('campus_address') }}" name="campus_address" autofocus>
                                                <span class="text-danger">{{ $errors->first('campus_address') }}</span>
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
                                        <th>Head</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($data))
                                        @foreach ($data as $key => $item)
                                            <tr>

                                                <td>{{ $item->campus_name }}</td>
                                                <td>{{ $item->campus_head_name ?? 'N/A' }}</td>
                                                <td>{{ $item->campus_email ?? 'N/A' }}</td>
                                                <td>{{ $item->campus_phone ?? 'N/A' }}</td>
                                                <td>{{ $item->campus_address ?? 'N/A' }}</td>
                                                <td>
                                                    <a type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#editCampusModal{{ $key }}"><i
                                                            class="fa fa-pencil"></i></a>
                                                    <div class="modal fade" id="editCampusModal{{ $key }}"
                                                        tabindex="-1" aria-labelledby="feeModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">

                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="feeModalLabel">
                                                                        EDIT CAMPUS</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST"
                                                                        action="{{ route('configuration.campus_update') }}"
                                                                        enctype="multipart/form-data"
                                                                        class="form theme-form">
                                                                        @csrf
                                                                        <input type="hidden" name="campus_id" value="{{$item->id}}">
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="mb-3 row">
                                                                                        <div class="col-md-6">
                                                                                            <label
                                                                                                class="col-form-label">Campus<span
                                                                                                    style="color:red">*</span></label>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                value="{{ $item->campus_name }}"
                                                                                                name="campus_name"
                                                                                                autofocus required>
                                                                                            <span
                                                                                                class="text-danger">{{ $errors->first('campus_name') }}</span>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <label
                                                                                                class="col-form-label">Campus
                                                                                                Head</label>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                value="{{ $item->campus_head_name }}"
                                                                                                name="campus_head_name"
                                                                                                autofocus>
                                                                                            <span
                                                                                                class="text-danger">{{ $errors->first('campus_head_name') }}</span>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <label
                                                                                                class="col-form-label">Campus
                                                                                                Email</label>
                                                                                            <input type="email"
                                                                                                class="form-control"
                                                                                                value="{{ $item->campus_email }}"
                                                                                                name="campus_email"
                                                                                                autofocus>
                                                                                            <span
                                                                                                class="text-danger">{{ $errors->first('campus_email') }}</span>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <label
                                                                                                class="col-form-label">Campus
                                                                                                Phone</label>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                value="{{ $item->campus_phone }}"
                                                                                                name="campus_phone"
                                                                                                autofocus>
                                                                                            <span
                                                                                                class="text-danger">{{ $errors->first('campus_phone') }}</span>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <label
                                                                                                class="col-form-label">Campus
                                                                                                Address</label>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                value="{{ $item->campus_address }}"
                                                                                                name="campus_address"
                                                                                                autofocus>
                                                                                            <span
                                                                                                class="text-danger">{{ $errors->first('campus_address') }}</span>
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
