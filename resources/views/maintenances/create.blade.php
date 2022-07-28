@extends('main')

@section('content')
    <div class="container-fluid">

        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Buat Maintenance</li>
                </ol>
            </div>
        </div>

        <div class="card">
            <div class="card-title">

            </div>
            <div class="card-body">
                @if (Auth::user()->role->name == 'administrator')
                    <form action="{{ route('maintenances.store') }}" method="post">
                    @elseif(Auth::user()->role->name == 'direktur')
                        <form action="{{ route('direkturmaintenances.store') }}" method="post">
                        @else
                            <form action="{{ route('itsupportmaintenances.store') }}" method="post">
                @endif
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Tanggal</label>
                        <input type="date" name="created_at"
                            class="form-control {{ $errors->has('created_at') ? 'is-invalid' : '' }}" required>
                        {!! $errors->first('created_at', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Nomor</label>
                        <input type="text" name="no"
                            class="form-control {{ $errors->has('no') ? 'is-invalid' : '' }}" required>
                        {!! $errors->first('no', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Maintenance</label>
                        <input type="text" name="name"
                            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Perihal</label>
                        <input type="text" name="perihal"
                            class="form-control {{ $errors->has('perihal') ? 'is-invalid' : '' }}" required>
                        {!! $errors->first('perihal', '<span class="invalid-feedback">:message</span>') !!}
                    </div>

                </div>
                <br>
                @if (Auth::user()->role->name == 'administrator')
                    <a href="{{ route('maintenances.index') }}" class="btn btn-warning btn-sm">Back</a>
                @elseif(Auth::user()->role->name == 'direktur')
                    <a href="{{ route('direkturmaintenances.index') }}" class="btn btn-warning btn-sm">Back</a>
                @else
                    <a href="{{ route('itsupportmaintenances.index') }}" class="btn btn-warning btn-sm">Back</a>
                @endif
                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
