@extends('main')

@section('content')
    <div class="container-fluid">

        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Data Maintenance</li>
                </ol>
            </div>
        </div>

        <div class="card">
            <div class="card-title">

            </div>
            @php
                $no = 1;
            @endphp
            <div class="card-body">
                @if (Auth::user()->role->name == 'administrator')
                    <a href="{{ route('maintenances.create') }}" class="btn btn-primary btn-sm">Tambah Maintenances</a>
                @elseif(Auth::user()->role->name == 'direktur')
                    <a href="{{ route('direkturmaintenances.create') }}" class="btn btn-primary btn-sm">Tambah
                        Maintenances</a>
                    {{-- @else
                    <a href="{{ route('itsupportmaintenances.create') }}" class="btn btn-primary btn-sm">Tambah
                        Maintenances</a> --}}
                @endif
                <br>
                <br>
                <table class="table border" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nomor</th>
                            <th>Maintenance</th>
                            <th>Perihal</th>
                            <th>Status</th>
                            @if (Auth::user()->role->id == 2)
                                <th>Pengirim</th>
                            @endif
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all as $item)
                            @if ($item->user_id == Auth::user()->id)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                                    <td>{{ $item->no }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->perihal }}</td>
                                    <td>
                                        @if ($item->status != 1)
                                            <div class="col-md-2">
                                                <form action="{{ route('maintenances.updateda', $item->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="1">
                                                    <button type="submit" class="btn btn-primary btn-sm">Send to IT
                                                        Support</button>
                                                </form>
                                            </div>
                                        @else
                                            <button type="submit" class="btn btn-success btn-sm">Terkirim</button>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->status == 1)
                                        @else
                                            <div class="row">
                                                <div class="col-md-2">
                                                    @if (Auth::user()->role->name == 'administrator')
                                                        <a href="{{ route('maintenances.edit', $item->id) }}"
                                                            class="btn btn-warning btn-sm">Edit</a>
                                                    @elseif(Auth::user()->role->name == 'direktur')
                                                        <a href="{{ route('direkturmaintenances.edit', $item->id) }}"
                                                            class="btn btn-warning btn-sm">Edit</a>
                                                    @else
                                                        <a href="{{ route('itsupportmaintenances.edit', $item->id) }}"
                                                            class="btn btn-warning btn-sm">Edit</a>
                                                    @endif
                                                </div>
                                                <div class="col-md-1"></div>
                                                <div class="col-md-2">
                                                    @if (Auth::user()->role->name == 'administrator')
                                                        <form action="{{ route('maintenances.destroy', $item->id) }}"
                                                            method="post">
                                                        @elseif(Auth::user()->role->name == 'direktur')
                                                            <form
                                                                action="{{ route('direkturmaintenances.destroy', $item->id) }}"
                                                                method="post">
                                                            @else
                                                                <form
                                                                    action="{{ route('itsupportmaintenances.destroy', $item->id) }}"
                                                                    method="post">
                                                    @endif
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure you want to Remove?');">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        @endif

                                    </td>
                                </tr>
                            @elseif(Auth::user()->role->id == 2 && $item->status == 1)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                                    <td>{{ $item->no }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->perihal }}</td>
                                    <td>
                                        @if ($item->status != 1)
                                            <div class="col-md-2">
                                                <form action="{{ route('maintenances.updateda', $item->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="1">
                                                    <button type="submit" class="btn btn-primary btn-sm">Send to IT
                                                        Support</button>
                                                </form>
                                            </div>
                                        @else
                                            <button type="submit" class="btn btn-success btn-sm">Terkirim</button>
                                        @endif
                                    </td>
                                    <td>{{ App\User::find($item->user_id)->name }}</td>
                                    <td>
                                        @if ($item->status == 1)
                                            <!-- Button trigger modal -->
                                            @if ($item->status_end == 1)
                                                <button type="button" class="btn btn-success btn-sm">Approve</button>
                                            @elseif($item->status_end == 2)
                                                <button type="button" class="btn btn-danger btn-sm">Decline</button>
                                            @else
                                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                                    data-target="#exampleModal">
                                                    Approve
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#exampleModaldecline">
                                                    Decline
                                                </button>
                                            @endif

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Approve</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('maintenances.updateapprove', $item->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <label for="">Keterangan</label>

                                                                <textarea name="keterangan" id="" cols="30" rows="3" class="form-control"></textarea>
                                                                <input type="hidden" name="status_end" value="1">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="exampleModaldecline" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Decline</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form
                                                            action="{{ route('maintenances.updateapprove', $item->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <label for="">Keterangan</label>
                                                                <textarea name="keterangan" class="form-control" id="" cols="30" rows="3"></textarea>
                                                                <input type="hidden" name="status_end" value="2">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="col-md-2">
                                                    @if (Auth::user()->role->name == 'administrator')
                                                        <a href="{{ route('maintenances.edit', $item->id) }}"
                                                            class="btn btn-warning btn-sm">Edit</a>
                                                    @elseif(Auth::user()->role->name == 'direktur')
                                                        <a href="{{ route('direkturmaintenances.edit', $item->id) }}"
                                                            class="btn btn-warning btn-sm">Edit</a>
                                                    @else
                                                        <a href="{{ route('itsupportmaintenances.edit', $item->id) }}"
                                                            class="btn btn-warning btn-sm">Edit</a>
                                                    @endif
                                                </div>
                                                <div class="col-md-1"></div>
                                                <div class="col-md-2">
                                                    @if (Auth::user()->role->name == 'administrator')
                                                        <form action="{{ route('maintenances.destroy', $item->id) }}"
                                                            method="post">
                                                        @elseif(Auth::user()->role->name == 'direktur')
                                                            <form
                                                                action="{{ route('direkturmaintenances.destroy', $item->id) }}"
                                                                method="post">
                                                            @else
                                                                <form
                                                                    action="{{ route('itsupportmaintenances.destroy', $item->id) }}"
                                                                    method="post">
                                                    @endif
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure you want to Remove?');">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        @endif

                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection
