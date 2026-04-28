@extends('layouts.dashboard')
@section('title', 'Report')
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
                        <li class="breadcrumb-item active">Report</li>
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
                        @include('common.alert')
                        <div class="table-responsive">
                            <table class="display" id="basic-1" style="font-size: 14px;">
                                <thead>
                                    <tr>

                                        <th>ID</th>
                                        <th>Branch</th>
                                        <th>Program 1</th>
                                        <th>Program ID 1</th>
                                        <th>Program 2</th>
                                        <th>Program ID 2</th>
                                        <th>Program 3</th>
                                        <th>Program ID 3</th>
                                        <th>Program 4</th>
                                        <th>Program ID 4</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($applications))
                                        @foreach ($applications as $key => $application)
                                            <tr>
                                                <td>{{ $application->oas_id }}</td>
                                                <td>{{ $application->appliedcampus->campus_name }}</td>
                                                <td>{{ $application->preferenceOne->program_name }}</td>
                                                <td>{{ $application->program_preference_1 }}</td>
                                                <td>{{ $application->preferenceTwo->program_name ?? '' }}</td>
                                                <td>{{ $application->program_preference_2 }}</td>
                                                <td>{{ $application->preferenceThree->program_name ?? '' }}</td>
                                                <td>{{ $application->program_preference_3 }}</td>
                                                <td>{{ $application->preferenceFour->program_name ?? '' }}</td>
                                                <td>{{ $application->program_preference_4 }}</td>
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
