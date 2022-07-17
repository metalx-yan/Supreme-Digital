@extends('main')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Edit Maintenance</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-title">

        </div>
        <div class="card-body">
            <form action="{{ route('maintenances.update', $get->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Tanggal</label>
                        <input type="date" name="created_at" value="{{ Carbon\Carbon::parse($get->created_at)->format('Y-m-d') }}" class="form-control {{ $errors->has('created_at') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('created_at', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Nomor</label>
                        <input type="text" name="no" value="{{ $get->no }}" class="form-control {{ $errors->has('no') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('no', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Maintenance</label>
                        <input type="text" name="name" value="{{ $get->name }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Perihal</label>
                        <input type="text" name="perihal" value="{{ $get->perihal }}" class="form-control {{ $errors->has('perihal') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('perihal', '<span class="invalid-feedback">:message</span>') !!}
                    </div>

                </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <a href="{{ route('maintenances.index') }}" class="btn btn-warning btn-sm">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
