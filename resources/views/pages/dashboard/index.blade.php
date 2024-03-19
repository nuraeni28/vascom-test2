@include('partials.header')
@include('partials.navbar')
<!-- Start right Content here -->



<h2>Dashboard</h2>
<div class="row">

    <!-- Column -->
    <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="d-flex flex-row">

                    <div class="col-12 align-self-center text-center">
                        <div class="m-l-10">
                            <p class=" text-muted">Jumlah User</p>
                            <h5 class="mt-0 round-inner">{{ $users }}</h5>
                            <p class="mb-0 text-muted">User</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="d-flex flex-row">

                    <div class="col-12 align-self-center text-center">
                        <div class="m-l-10">
                            <p class=" text-muted">Jumlah User Aktif</p>
                            <h5 class="mt-0 round-inner">{{ $usersAk }}</h5>
                            <p class="mb-0 text-muted">User</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="d-flex flex-row">

                    <div class="col-12 align-self-center text-center">
                        <div class="m-l-10">
                            <p class=" text-muted">Jumlah Produk</p>
                            <h5 class="mt-0 round-inner">{{ $pd }}</h5>
                            <p class="mb-0 text-muted">Produk</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="d-flex flex-row">

                    <div class="col-12 align-self-center text-center">
                        <div class="m-l-10">
                            <p class=" text-muted">Jumlah Produk Aktif</p>
                            <h5 class="mt-0 round-inner">{{ $pdAk }}</h5>
                            <p class="mb-0 text-muted">Produk</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-12 col-xl-9">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="d-flex flex-row">

                    <table id="" class="table table-borderless table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Gambar</th>


                            </tr>
                        </thead>
                        @php
                            $no = 1;
                        @endphp
                        <tbody>
                            @foreach ($p as $data)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ 'Rp ' . number_format($data->harga, 0, ',', '.') }}</td>
                                    <td>
                                        <img src="{{ asset('Foto/' . $data->foto) }}" alt="Gambar produk"
                                            width="100">
                                    </td>



                                    {{-- <td><img src="{{ asset('Foto/'.$data->foto) }}" style="max-height: 100px;" alt=""></td> --}}

                                </tr>
                                @php
                                    $no++;
                                @endphp
                            @endforeach




                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</div>


</div><!-- container -->


</div> <!-- Page content Wrapper -->

</div> <!-- content -->

<footer class="footer">
    © 2024
</footer>

</div>
<!-- End Right content here -->

</div>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            searching: false, // Menonaktifkan fitur pencarian
            lengthChange: false // Menonaktifkan fitur jumlah entri
        });
    });
</script>
<!-- END wrapper -->
@include('partials.footer')
