@extends('main')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">View Report</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-title">

        </div>
        <div class="card-body">
           <div class="row">
                <div class="col-md-2">
                    <b>Nomor</b>
                </div>
                <div class="col-md-1">
                    <b>:</b>
                </div>
                <div class="col-md-3">
                    <b>{{ $get->no }}</b>
                </div>
           </div>
           <div class="row">
                <div class="col-md-2">
                    <b>Tanggal</b>
                </div>
                <div class="col-md-1">
                    <b>:</b>
                </div>
                <div class="col-md-3">
                    <b>{{ $get->created_at }}</b>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <b>Perihal</b>
                </div>
                <div class="col-md-1">
                    <b>:</b>
                </div>
                <div class="col-md-3">
                    <b>{{ $get->perihal }}</b>
                </div>
           </div>
           <br>
           <a href="{{ route('itsupportreports.index') }}" class="btn btn-warning btn-sm">Back</a>
        </div>
    </div>
</div>
@endsection
