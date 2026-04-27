@extends('layouts.dashboard')
@section('title', 'OAS Programs')
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
                        <li class="breadcrumb-item active">SAP Programs</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mb-2">
        <div class="row">
            {{-- <div class="col-md-12 text-end">
                <a class="btn btn-primary btn-sm" href="{{ route('sap_program.add') }}">
                    ADD NEW PROGRAM
                </a>
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
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Region</th>
                                        <th>Admission Fee</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($programs))
                                        @foreach ($programs as $key => $program)
                                            <tr>
                                                <td>{{ $program->id }}</td>
                                                <td>{{ $program->sap_region }}</td>
                                                <td>{{ $program->sap_campus_name }}</td>
                                                <td>{{ $program->sap_institute_name }}</td>
                                                <td>{{ $program->sap_program_name }}</td>
                                                <td>{{ $program->oas_prg_name }}</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm" href="{{ route('sap_program.edit', $program->id) }}">Edit</a>
                                                    <a class="btn btn-danger btn-sm" href="{{ route('sap_program.delete', $program->id) }}">Delete</a>
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
@endsection
