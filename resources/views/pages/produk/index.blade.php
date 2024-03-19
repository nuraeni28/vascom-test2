@include('partials.header')
@include('partials.navbar')


<div class="page-content-wrapper mt-10">

    <div class="container-fluid">
        
        <div class="row mt-3">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        @if ($errors->first('message'))
                        <div class="form-group">
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('message') }}
                            </div>
                        </div>
                    @endif
                    @if (Session::has('message'))
                        <div class="form-group">
                            <div class="alert alert-info" role="alert">
                                {{ Session::get('message') }}
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-6">
                            <h4 class="mt-0 header-title">Manajemen User</h4>
                        </div>
                        <div class="col-6 text-right"> <!-- Mengubah kelas align-content-right menjadi text-right -->
                            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal">
                                Tambah Produk
                            </button>
                        </div>
                    </div>
                    
                        
                        
                        <!-- Button trigger modal -->
                     
                         
                         <!-- Modal -->
                         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                         </button>
                                     </div>
                                     <form action="{{ route('admin.produk.create') }}" method="POST" enctype="multipart/form-data">
                                         @csrf
                                         <div class="modal-body">
                                             <div class="form-group">
                                                 <label for="nama">Nama</label>
                                                 <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama">
                                             </div>
                                             <div class="form-group">
                                                <label for="no">Harga</label>
                                                <input type="number" name="harga" class="form-control"  placeholder="Masukkan Harga">
                                            </div>
                                        
                                             <div class="form-group">
                                                <label for="matkul">Gambar</label>
                                                <input type="file" name="foto" class="form-control"  >
                                            </div>
                                         </div>
                                         <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                             <button type="submit" class="btn btn-primary">Save changes</button>
                                         </div>
                                     </form>
                                 </div>
                             </div>
                         </div>
                         
            <table id="datatable" class="table table-borderless table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Gambar</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @php
                                $no =1;
                            @endphp
                            <tbody>
                                @foreach ($datas as $data)
    <tr>
        <td>{{ $no }}</td>
        <td>{{ $data->nama }}</td>
        <td>{{ 'Rp ' . number_format($data->harga, 0, ',', '.') }}</td>
        <td>
            <img src="{{ asset('Foto/' . $data->foto) }}" alt="Gambar produk" width="100">
        </td>
        
        <td>
            @if($data->status == 'Aktif')
                <button type="button" class="btn btn-success rounded-pill">{{ $data->status }}</button>
            @else
                <button type="button" class="btn btn-danger rounded-pill">{{ $data->status }}</button>
            @endif
        </td>
        
        
        {{-- <td><img src="{{ asset('Foto/'.$data->foto) }}" style="max-height: 100px;" alt=""></td> --}}
        <td>
            <form id="verificationForm" method="POST" action="{{ route('admin.produk.verify', $data->id) }}" class="m-1">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-warning">Verifikasi</button>
            </form>
            
            <button class="btn btn-info btn-sm btn-edit" data-toggle="modal" data-target="#Edit-{{ $data->id }}">Edit</button>
            <div class="modal fade" id="Edit-{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('admin.produk.edit',$data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" class="form-control" value="{{ $data->nama }}" placeholder="Masukkan Nama">
                                </div>
                                <div class="form-group">
                                   <label for="no">Harga</label>
                                   <input type="number" name="harga" class="form-control" value="{{ $data->harga }}"  placeholder="Masukkan Harga">
                               </div>
                                <div class="form-group">
                                    <label for="matkul">Foto</label>
                                    <input type="file" name="foto" class="form-control" value="{{ $data->foto }}" >
                                </div>
                              
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <button class="btn btn-danger btn-sm btn-delete" data-toggle="modal" data-target="#N{{ $data->id }}">Delete</button>
        </td>
    </tr>
    @php
        $no++;
    @endphp
    <div class="modal fade" id="N{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda Ingin menghapus Produk {{ $data->nama }}?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form id="deleteForm" method="POST" action="{{ route('admin.produk.delete', $data->id) }}">
                    @csrf
                    @method('DELETE')                
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach


                            
                        
                            </tbody>
                        </table>

                    </div>
                </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- end col -->
</div> <!-- end row -->

@include('partials.footer')
