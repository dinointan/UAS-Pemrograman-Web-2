@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-12">
            <h3 class="fw-bold">{{ $title }}</h3>
            <div class="card-tools mb-2">
                <div class="card-tools d-flex justify-content-end">
                    <a href="/{{ auth()->user()->getRoleNames()[0] }}/pasien/create" class="btn btn-primary">Tambah</a>
                </div>
            </div>
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Nomor Hp</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pasien as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->nik }}</td>
                                    <td>{{ $p->nama }}</td>
                                    <td>{{ $p->tanggal_lahir }}</td>
                                    <td>{{ $p->jenis_kelamin }}</td>
                                    <td>{{ $p->nomor_hp }}</td>
                                    <td>
                                        <a href="/{{ auth()->user()->getRoleNames()[0] }}/pasien/{{ $p->id }}/edit"
                                            class="btn btn-warning">Edit</a>
                                        <form action="/{{ auth()->user()->getRoleNames()[0] }}/pasien/{{ $p->id }}"
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
