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
        <div class="row">
            <div class="col-md-12">
                <div id="containers"></div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
<script>
    Highcharts.chart('containers', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'SUPREME DIGITAL CHART'
    },
    subtitle: {
        text: 'Source: ' +
            'Highchart'
    },
    xAxis: {
        categories: [
            'Total',
        ],
        crosshair: true
    },
    yAxis: {
        title: {
            useHTML: true,
            text: 'Chart'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Account',
        data: [{{ App\User::all()->count() }}]

    }, {
        name: 'Report',
        data: [{{ App\Report::all()->count() }}]

    }]
});
</script>    
@endsection

