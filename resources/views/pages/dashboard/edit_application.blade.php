@extends('layouts.dashboard')
@section('title', 'Edit Application')
@section('content')

    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h5>Welcome</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        {{-- <li class="breadcrumb-item">
                            <a href="{{ route('home') }}"> <i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item">Home</li> --}}
                        <li class="breadcrumb-item active">Your Search results are here!</li>
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
                        <div class="table-responsive">
                            <table class="display" id="basic-1" style="font-size: 14px;">
                                <thead>
                                    <tr>

                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Program</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($application))
                                        <tr>

                                            <td>{{ $application->oas_id }}</td>
                                            <td>{{ $application->first_name . ' ' . $application->last_name }}</td>
                                            <td>{{ strtoupper($application->preferenceOne->program_name ?? $application->program) }}
                                            </td>
                                            <td>
                                                @if ($application->application_status == 0)
                                                    <span class="badge bg-warning">Submitted</span>
                                                @elseif($application->application_status == 1)
                                                    <span class="badge bg-success">Accepted</span>
                                                @elseif($application->application_status == 2)
                                                    <span class="badge bg-danger">Rejected</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="#"
                                                    class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                                                <a href="#"
                                                    class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                            </td>

                                        </tr>
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
