@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h5>Search Submitted Applications</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}"> <i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Search Applications</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
      <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-12">
                    @include('common.alert')
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-eye"></i> View Submitted Applications
                    </div>
                    <!-- card body start -->
                    <div class="card-body">

                        <div class="row pb-2">
                            <div class="col-md-4" style="padding: 15px 0;">
                                <label>Enter User's ID</label>
                            </div>
                            <div class="col-md-8">
                                <form action="{{ route('oas.view_submitted_application') }}" method="POST">
                                    @csrf
                                    <input type="text" class="form-control" placeholder="Enter User's ID" name="user_id">
                                    <button type="submit" class="btn btn-primary mt-3" style="float: right">Search</button>
                                </form>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div>
            @hasanyrole('admin|admission head')
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-check"></i> Approve Submitted Applications
                    </div>
                    <!-- card body start -->
                    <div class="card-body">
                        <div class="row pb-2">
                            <div class="col-md-4" style="padding: 15px 0;">
                                <label>Enter User's ID</label>
                            </div>
                            <div class="col-md-8">
                                <form action="{{route('oas.approve_submitted_application')}}" method="Post">
                                    @csrf
                                    <input type="text" class="form-control" placeholder="Enter User's ID" name="user_id">
                                    <button type="submit" class="btn btn-primary mt-3" style="float: right">Search</button>
                                </form>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-flag"></i> Set Eligibility
                    </div>
                    <!-- card body start -->
                    <div class="card-body">
                        <div class="row pb-2">
                            <div class="col-md-4" style="padding: 15px 0;">
                                <label>Enter User's ID</label>
                            </div>
                            <div class="col-md-8">
                                <form action="{{route('oas.set_eligibility')}}" method="post">
                                     @csrf
                                    <input type="text" class="form-control" placeholder="Enter User's ID" name="user_id">
                                    <button type="submit" class="btn btn-primary mt-3" style="float: right">Search</button>
                                </form>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-edit"></i> Edit Submitted Application
                    </div>
                    <!-- card body start -->
                    <div class="card-body">
                        <div class="row pb-2">
                            <div class="col-md-4" style="padding: 15px 0;">
                                <label>Enter User's ID</label>
                            </div>
                            <div class="col-md-8">
                                <form action="{{route('oas.edit_application')}}" method="post">
                                    @csrf
                                    <input type="text" class="form-control" placeholder="Enter User's ID" name="user_id">
                                    <button type="submit" class="btn btn-primary mt-3" style="float: right">Search</button>
                                </form>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div>
            @endhasanyrole
        </div>
    </div>
@endsection
@section('script')
@endsection
