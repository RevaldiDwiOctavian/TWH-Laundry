<?php

namespace App\Http\Controllers;
use App\Models\DataSiswa;

use Illuminate\Http\Request;

class DataSiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DataSiswa::all();
        return view('superadmin.index',[
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new DataSiswa;
        $data -> nama_siswa = $request -> nama;
        $data -> nisn = $request -> nisn;
        $data -> kelas = $request -> kelas;
        $data -> status = $request -> status;
        $data->save();

        return redirect()->route('superadmin.index');
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
        $data = DataSiswa::where('id', $id)->get()->first();
        return $data;
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
        $data = DataSiswa::find($id);
        $data -> nama_siswa = $request -> edit_nama;
        $data -> nisn = $request -> edit_nisn;
        $data -> kelas = $request -> edit_kelas;
        $data -> status = $request -> edit_status;
        $data->save();

        return redirect()->route('superadmin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DataSiswa::where('id', $id)->delete();
        return redirect()->route('superadmin.index');
    }
}
