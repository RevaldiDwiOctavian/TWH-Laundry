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
                <form action="{{ route('admin.user.store') }}" method="post">
                  @csrf
                  <div class="form-group">
                      <label for="nama">Nama User</label>
                      <input type="text" class="form-control" id="nama" name="nama">
                  </div>
                  <div class="form-group">
                      <label for="nisn">Email</label>
                      <input type="email" class="form-control" id="email" name="email">
                  </div>
                  <div class="form-group">
                      <label for="kelas">password</label>
                      <input type="password" class="form-control" id="password" name="password">
                  </div>
                  <div class="form-group">
                      <label for="role">Role</label>
                      <select class="custom-select" name="role">
                      <option selected hidden>Buka untuk memilih</option>
                      <option value="admin">Admin</option>
                      <option value="kasir">Kasir</option>
                      <option value="owner">Owner</option>
                  </select>
                  </div>
                  <div class="form-group">
                      <label for="outlet">Outlet</label>
                      <select class="custom-select" name="outlet">
                      <option selected hidden>Buka untuk memilih</option>
                      <option value="1">Outlet 1</option>
                      <option value="2">Outlet 2</option>
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
                <table id="TableUser" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Outlet</th>
                    <th>Role</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $data)
                    <tr>
                        <td></td>
                        <td>{{ $data -> name }}</td>
                        <td>{{ $data -> email }}</td>
                        <td>{{ $data ->id_outlet }}</td>
                        <td>{{ $data ->role }}</td>
                        <td>
                          <div class="d-flex justify-content-center">
                            <button class="btn btn-warning" type="button" id="openedit" data-toggle="modal" data-target="#modaleditUser" value="">Edit</button>&nbsp | &nbsp

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
                                          <label for="nama">Nama User</label>
                                          <input type="text" class="form-control" id="nama" name="nama">
                                      </div>
                                      <div class="form-group">
                                          <label for="nisn">Email</label>
                                          <input type="email" class="form-control" id="email" name="email">
                                      </div>
                                      <div class="form-group">
                                          <label for="kelas">password</label>
                                          <input type="password" class="form-control" id="password" name="password">
                                      </div>
                                      <div class="form-group">
                                          <label for="role">Role</label>
                                          <select class="custom-select" name="role">
                                            <option selected hidden>Buka untuk memilih</option>
                                            <option value="admin">Admin</option>
                                            <option value="kasir">Kasir</option>
                                            <option value="owner">Owner</option>
                                          </select>
                                      </div>
                                      <div class="form-group">
                                          <label for="outlet">Outlet</label>
                                          <select class="custom-select" name="outlet">
                                            <option selected hidden>Buka untuk memilih</option>
                                            <option value="1">Outlet 1</option>
                                            <option value="2">Outlet 2</option>
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
                            <button id="opendeleteUser" type="button" class="btn btn-danger" data-toggle="modal" data-target="#ConfirmDialog" value="{{$data->id}}">Hapus</button>

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
                        @endforeach
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
@endsection