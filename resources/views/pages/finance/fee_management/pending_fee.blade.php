@extends('layouts.dashboard')
@section('title', 'Pending Fee')
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
                        <li class="breadcrumb-item active">Pending Fee</li>
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
                                        <th>Program</th>
                                        <th>Date Of Application</th>
                                        <th>City</th>
                                        <th>Major Subjects</th>
                                        <th>Obtained Marks</th>
                                        <th>Total Marks</th>
                                        <th>%age</th>
                                        <th>College</th>
                                        <th>Passing Year</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($applications))
                                        @foreach ($applications as $key => $application)
                                            <tr>

                                                <td>{{ $application->oas_id }}</td>
                                                <td>{{ $application->first_name . ' ' . $application->last_name }}</td>
                                                <td>{{ strtoupper($application->preferenceOne->program_name ?? $application->program) }}
                                                </td>
                                                <td>{{ $application->created_at->format('Y-m-d') }}</td>
                                                <td>
                                                    {{ $application->city }}
                                                </td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" class="text-dark" data-bs-toggle="dropdown">
                                                            &#8942;
                                                        </a>

                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('eligibility_update', [$application->oas_id, 1]) }}">
                                                                    Eligible
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('eligibility_update', [$application->oas_id, 0]) }}">
                                                                    Pending
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item text-danger"
                                                                    href="{{ route('eligibility_update', [$application->oas_id, 2]) }}">
                                                                    Not Eligible
                                                                </a>
                                                            </li>
                                                        </ul>
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

@section('styles')

@endsection
@section('scripts')

@endsection
