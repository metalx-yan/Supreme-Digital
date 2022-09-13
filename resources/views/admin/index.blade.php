@extends('main')

@section('content')
    <br>
    <div class="container">
        <div class="alert alert-success" role="alert">
            <h3>
                <center class="alert-heading">Selamat Datang!</center>
            </h3>
            <center>Perancangan Sistem Informasi Pengolahan Data Maintenance Komputer pada PT. Supreme Digital Media
            </center>

        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="card card-sm-3 col-12" style="background-color:#d6cd38">
                    <div class="card-icon bg-primary-teacher">
                        {{-- <i class="ion ion-person"></i> --}}
                    </div>
                    <center><h1>{{ App\User::all()->count() }}</h1></center>

                    <center><h4>Account</h4></center>
                    
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card card-sm-3 col-12" style="background-color: #149d80">
                    <div class="card-icon bg-primary-room">
                        {{-- <i class="ion ion-home"></i> --}}
                    </div>
                    <center><h1>{{ App\Report::all()->count() }}</h1></center>

                    <center><h4>Report</h4></center>
                </div>
            </div>

        </div>
    </div>
@endsection
