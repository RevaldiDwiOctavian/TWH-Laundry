@extends('layouts.guest')

@section('content')
    
        <div class="container pt-3">
          <h1 class="text-center">Status Siswa UJIKOM 2023 SMK TUTWURI HANDYANI CIMAHI</h1>
          <br>
            <div class="row justify-content-center">
              <div class="card-body">
                <table id="lihatStatus" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Siswa</th>
                    <th>NIS</th>
                    <th>Kelas</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $d)
                    <tr>
                        <td></td>
                        <td>{{$d -> nama_siswa}}</td>
                        <td>{{$d -> nisn}}</td>
                        <td>{{$d -> kelas}}</td>
                        <td>{{$d -> status}}</td>
                    </tr>
                  @endforeach
                </table>
              </div>
            </div>
          </div>
    
@endsection