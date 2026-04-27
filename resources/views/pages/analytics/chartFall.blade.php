@extends('layouts.dashboard')
@section('title', 'Overview')
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
                        <li class="breadcrumb-item active">Analytics(FALL)</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
       @include('pages.analytics.charts.chart')
    </div> 
@endsection

@section('styles')

@endsection
@section('scripts')

@endsection
