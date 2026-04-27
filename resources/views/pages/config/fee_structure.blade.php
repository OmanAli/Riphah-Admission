@extends('layouts.dashboard')
@section('title', 'Fee Structure')
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
                        <li class="breadcrumb-item active">Fee Structure</li>
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
                        <form method="POST" action="{{ route('configuration.fee_structure_store') }}"
                            enctype="multipart/form-data" class="form theme-form">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Campus<span
                                                    style="color:red">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" value="{{ old('campus_name') }}"
                                                    name="campus_name" autofocus required>
                                                <span class="text-danger">{{ $errors->first('campus_name') }}</span>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Fee Structure Link<span
                                                    style="color:red">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control"
                                                    value="{{ old('fee_structure') }}" name="fee_structure" autofocus
                                                    required>
                                                <span class="text-danger">{{ $errors->first('fee_structure') }}</span>
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
                                        <th>#</th>
                                        <th>Campus</th>
                                        <th>Fee Structure</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($data))
                                        @foreach ($data as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->campus_name }}</td>
                                                <td class="text-wrap"><a href="{{ $item->link }}" target="_blank">
                                                        {{ \Illuminate\Support\Str::limit($item->link, 30) }}
                                                    </a></td>
                                                <td>
                                                    <ul class="action">
                                                        <li class="delete">
                                                            <a
                                                                href="{{ route('configuration.fee_structure_delete', $item->id) }}"><i
                                                                    class="fa fa-trash"></i></a>
                                                        </li>
                                                    </ul>
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
