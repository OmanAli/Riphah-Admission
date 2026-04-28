@extends('layouts.dashboard')
@section('title', 'Offer Letters')
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
                        <li class="breadcrumb-item active">Offer Letters</li>
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
                        <div class="table-responsive">
                            <table class="display" id="basic-1" style="table-layout: fixed; width: 100%;font-size: 14px;">
                                <thead>
                                    <tr>

                                        <th>Offer Letter Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($data))
                                        @foreach ($data as $key => $item)
                                            <tr>
                                                <td>{{ $item->name ?? '' }}</td>
                                                <td>
                                                    <a type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#viewLetterModal{{ $key }}"><i
                                                            class="fa fa-eye"></i></a>
                                                    <a href="{{ route('offer_letter.edit', $item->id) }}"
                                                        class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{ route('offer_letter.destroy', $item->id) }}"
                                                        class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                    <div class="modal fade" id="viewLetterModal{{ $key }}"
                                                        tabindex="-1" aria-labelledby="feeModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="feeModalLabel">
                                                                        VIEW OFFER LETTER</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <div class="col-md-3"><label
                                                                                        for="">Program:</label>
                                                                                </div>
                                                                                <div class="col-md-9">
                                                                                    <h5>{{ $item->oas_prg->program_name ?? '' }}
                                                                                    </h5>
                                                                                </div>
                                                                                <div class="col-md-3"><label
                                                                                        for="">Name:</label></div>
                                                                                <div class="col-md-9">
                                                                                    <h5>{{ $item->name ?? '' }}</h5>
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <div class="row">
                                                                                <div class="col-md-4"><label
                                                                                        for="">Instructions:</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    {!! $item->instructions ?? '' !!}
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
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
