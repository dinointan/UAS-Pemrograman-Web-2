@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-12">
            <h3 class="fw-bold">{{ $title }}</h3>
            <div class="card-tools mb-2">
                <div class="card-tools d-flex justify-content-end">
                    <a href="/{{ auth()->user()->getRoleNames()[0] }}/kamar/create" class="btn btn-primary">Tambah</a>
                </div>
            </div>
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID Kamar</th>
                                <th>Nama Kamar</th>
                                <th>Jenis Kamar</th>
                                <th>Foto</th>
                                <th>Fasilitas</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kamar as $k)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $k->nama_kamar }}</td>
                                    <td>{{ $k->jenis_kamar }}</td>
                                    <td>
                                        <img src="{{ asset('/assets/images/kamar/' . $k->foto) }}" alt="Foto Kamar"
                                            width="100px">
                                    </td>
                                    <td>{{ Str::limit($k->fasilitas, 20) }}</td>
                                    <td>
                                        <a href="/{{ auth()->user()->getRoleNames()[0] }}/kamar/{{ $k->id }}/edit"
                                            class="btn btn-warning">Edit</a>
                                        <form action="/{{ auth()->user()->getRoleNames()[0] }}/kamar/{{ $k->id }}"
                                            method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                        </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.row -->
    @endsection
    @include('templates.layout_dashboard')
