<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maintenance;
use Carbon\Carbon;
use Auth;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Maintenance::all();
        return view('maintenances.index', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintenances.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Maintenance::create([
            'created_at' => $request->created_at,
            'no' => $request->no,
            'name' => $request->name,
            'perihal' => $request->perihal,
            'user_id' => Auth::user()->id,
        ]);
        if (Auth::user()->role->name == 'administrator') {
            return redirect()->route('maintenances.index');
            # code...
        } elseif(Auth::user()->role->name == 'direktur') {
            # code...
            return redirect()->route('direkturmaintenances.index');
        } else {
            return redirect()->route('itsupportmaintenances.index');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $get = Maintenance::find($id);

        return view('maintenances.edit', compact('get'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Maintenance::find($id);
        $update->created_at = $request->created_at;
        $update->no = $request->no;
        $update->name = $request->name;
        $update->perihal = $request->perihal;
        $update->save();

        if (Auth::user()->role->name == 'administrator') {
            return redirect()->route('maintenances.index');
            # code...
        } elseif(Auth::user()->role->name == 'direktur') {
            # code...
            return redirect()->route('direkturmaintenances.index');
        } else {
            return redirect()->route('itsupportmaintenances.index');
        }
    }

    public function updateda(Request $request, $id)
    {
        // dd($request->all(), $id);
        $update = Maintenance::find($id);
        $update->status = $request->status;
        $update->save();

        if (Auth::user()->role->name == 'administrator') {
            return redirect()->route('maintenances.index');
            # code...
        } elseif(Auth::user()->role->name == 'direktur') {
            # code...
            return redirect()->route('direkturmaintenances.index');
        } else {
            return redirect()->route('itsupportmaintenances.index');
        }
    }

    public function updateapprove(Request $request, $id)
    {
        // dd($request->all(),$id);
        $update = Maintenance::find($id);
        $update->keterangan = $request->keterangan;
        $update->status_end = $request->status_end;
        $update->save();
        
        return redirect()->route('itsupportmaintenances.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $get = Maintenance::find($id);
        $get->delete();

        return redirect()->back();
    }
}
