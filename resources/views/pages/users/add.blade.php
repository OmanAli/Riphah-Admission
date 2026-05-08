@extends('layouts.dashboard')
@section('title', 'Add New User')
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
                        <li class="breadcrumb-item active">Users</li>
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
                        <div class="row mb-3">
                            <div class="col-md-6 d-flex justify-content-start">
                                <h3>Add User</h3>
                            </div>
                            {{-- <div class="col-md-6 d-flex justify-content-end">
                                <a href="{{ route('sap_program.index') }}" class="btn btn-primary">View SAP Programs</a>
                            </div> --}}
                        </div>
                        <hr>
                        @include('common.alert')

                        <form action="{{ route('user_store') }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">User Name<span style="color:red">*</span></label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">User Email<span style="color:red">*</span></label>
                                        <input type="text" class="form-control" name="email" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Campus<span style="color:red">*</span></label>
                                        <select name="campus" id="" class="form-control" required>
                                            <option value="" selected disabled>--Select Campus--</option>
                                            @foreach ($campuses as $key => $campus)
                                                <option value="{{ $campus->id }}">{{ $campus->campus_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Role<span style="color:red">*</span></label>
                                        <select name="role" id="" class="form-control" required>
                                            <option value="" selected disabled>--Select Role--</option>
                                            @foreach ($roles as $key => $item)
                                                <option value="{{ $item->id }}">{{ strtoupper($item->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Mobile</label>
                                        <input type="text" class="form-control" name="mobile">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3" style="float: right">Save</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-1" style="table-layout: fixed; width: 100%;font-size: 14px;">
                                <thead>
                                    <tr>

                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Role</th>
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($users))
                                        @foreach ($users as $key => $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->mobile ?? '' }}</td>
                                                <td>{{ strtoupper($item->role_name) }} </td>
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

@endsection
