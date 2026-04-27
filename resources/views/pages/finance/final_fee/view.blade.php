@extends('layouts.dashboard')
@section('title', 'View Final Fee')
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
                        <li class="breadcrumb-item active">Final Fee</li>
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
                                <h3>View Final Fee</h3>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a href="{{ route('finalfee.add') }}" class="btn btn-primary">Create Final Fee</a>
                            </div>
                        </div>
                        <hr>
                        @include('common.alert')

                        <div class="table-responsive">
                            <table class="display" id="basic-1" style="font-size: 14px;">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Admission Fee</th>
                                        <th>University Registration Fee</th>
                                        <th>Tuition Fee</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($data))
                                        @foreach ($data as $key => $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->admissionFee }}</td>
                                                <td>{{ $item->registrationFee }}</td>
                                                <td>{{ $item->tuitionFee }}</td>
                                                <td><a href="{{ route('finalfee.edit', $item->id) }}"
                                                        class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a></td>
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
