@extends('layouts.app')

@section('content')
    
    <div class="container pt-3">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah">
        <i class="fas fa-plus"></i> &nbspTambah Data
        </button>

        <!-- Modal -->
        <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siwa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{ route('superadmin.store') }}" method="post">
                  @csrf
                  <div class="form-group">
                      <label for="nama">Nama Siswa</label>
                      <input type="text" class="form-control" id="nama" name="nama">
                  </div>
                  <div class="form-group">
                      <label for="nisn">NIS</label>
                      <input type="text" class="form-control" id="nisn" name="nisn">
                  </div>
                  <div class="form-group">
                      <label for="kelas">Kelas</label>
                      <input type="text" class="form-control" id="kelas" name="kelas">
                  </div>
                  <div class="form-group">
                      <label for="nama">Status</label>
                      <select class="custom-select" name="status">
                      <option selected hidden>Buka untuk memilih</option>
                      <option value="Terdaftar">Terdaftar</option>
                      <option value="Tidak Terdaftar">Tidak Terdaftar</option>
                  </select>
                  </div>
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>

                

                <button type="submit" class="btn btn-success">Simpan</button>
              </div>
              </form>
            </div>
          </div>
        </div>

        <div class="row justify-content-center">
            <div class="card-body">
                <table id="DataSiswa" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Siswa</th>
                    <th>NIS</th>
                    <th>Kelas</th>
                    <th>Status</th>
                    <th>Aksi</th>
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
                        <td>
                          <div class="d-flex justify-content-center">
                            <button class="btn btn-warning" type="button" id="openedit" data-toggle="modal" data-target="#modaledit" value="{{ $d->id }}">Edit</button>&nbsp | &nbsp

                            <!-- Modal -->
                            <form id="edit" action="" method="post">
                            <div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Siwa</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    
                                      @method('PUT')
                                      @csrf
                                      <div class="form-group">
                                          <input type="text" class="form-control" id="id" name="id" hidden>
                                          <label for="nama">Nama Siswa</label>
                                          <input type="text" class="form-control" id="edit_nama" name="edit_nama">
                                      </div>
                                      <div class="form-group">
                                          <label for="nisn">NIS</label>
                                          <input type="text" class="form-control" id="edit_nisn" name="edit_nisn">
                                      </div>
                                      <div class="form-group">
                                          <label for="kelas">Kelas</label>
                                          <input type="text" class="form-control" id="edit_kelas" name="edit_kelas">
                                      </div>
                                      <div class="form-group">
                                          <label for="nama">Status</label>
                                          <select class="custom-select" id="edit_status" name="edit_status">
                                          <option selected hidden>Buka untuk memilih</option>
                                          <option value="Terdaftar">Terdaftar</option>
                                          <option value="Tidak Terdaftar">Tidak Terdaftar</option>
                                      </select>
                                      </div>
                                </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>

                                    

                                    <button type="submit" class="btn btn-success">Simpan</button>
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
                            </form>
                            <button id="opendelete" type="button" class="btn btn-danger" data-toggle="modal" data-target="#ConfirmDialog" value="{{ $d->id }}">Hapus</button>

                            <div class="modal fade" id="ConfirmDialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    Apakah anda yakin ingin menghapus data yang dipilih?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <form id="delete" action="" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>

                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                    </tr>
                  @endforeach
                </table>
            </div>
        </div>
    </div>
    
@endsection