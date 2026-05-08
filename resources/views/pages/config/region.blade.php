@extends('layouts.dashboard')
@section('title', 'Region')
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
                        <li class="breadcrumb-item active">Region</li>
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
                        <form method="POST" action="{{ route('configuration.region_store') }}"
                            enctype="multipart/form-data" class="form theme-form">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 row">
                                            <div class="col-md-4">
                                                <label class="col-form-label">Region<span style="color:red">*</span></label>
                                                <input type="text" class="form-control" value="{{ old('region_name') }}"
                                                    name="region_name" autofocus required>
                                                <span class="text-danger">{{ $errors->first('region_name') }}</span>
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

                                        <th>Region</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($data))
                                        @foreach ($data as $key => $item)
                                            <tr>

                                                <td>{{ $item->region_name }}</td>
                                                <td>
                                                    <a type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#editRegionModal{{ $key }}"><i
                                                            class="fa fa-pencil"></i></a>
                                                    <div class="modal fade" id="editRegionModal{{ $key }}"
                                                        tabindex="-1" aria-labelledby="feeModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="feeModalLabel">
                                                                        EDIT REGION</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST"
                                                                        action="{{ route('configuration.region_update') }}"
                                                                        enctype="multipart/form-data"
                                                                        class="form theme-form">
                                                                        @csrf
                                                                        <input type="hidden" name="region_id"
                                                                            value="{{ $item->id }}">
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="mb-3 row">
                                                                                        <div class="col-md-6">
                                                                                            <label
                                                                                                class="col-form-label">Region<span
                                                                                                    style="color:red">*</span></label>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                value="{{ $item->region_name }}"
                                                                                                name="region_name" autofocus
                                                                                                required>
                                                                                            <span
                                                                                                class="text-danger">{{ $errors->first('region_name') }}</span>
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
