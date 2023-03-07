<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pengguna_index(){
        $data = User::all();
        return view('admin.pengguna',['data' => $data]);
    }

    public function pengguna_get($id){
        $data = User::where('id', $id)->get()->first();
        return view('admin.pengguna',['data' => $data]);
    }

    public function pengguna_input(Request $request){
        $data = new User;
        $data -> name = $request -> nama;
        $data -> email = $request -> email;
        $data -> password = $request -> password;
        $data -> role = $request -> role;
        $data -> id_outlet = $request -> outlet;
        $data->save();

        return redirect()->route('admin.index');
    }

    public function pengguna_edit(Request $request, $id){
        $data = User::find($id);
        $data -> name = $request -> nama;
        $data -> email = $request -> email;
        $data -> password = $request -> password;
        $data -> role = $request -> role;
        $data -> id_outlet = $request -> outlet;
        $data->save();

        return redirect()->route('admin.index');
    }

    public function pengguna_delete($id){
        DB::table('user')->where('id',$id)->delete();
        $data = User::where('id', $id)->delete();

        return redirect()->route('admin.index');
    }


}
