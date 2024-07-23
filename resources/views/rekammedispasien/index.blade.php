@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-12">
            <h3 class="fw-bold">{{ $title }}</h3>
            <div class="card-tools mb-2">
                <div class="card-tools d-flex justify-content-end">
                    <a href="/{{ auth()->user()->getRoleNames()[0] }}/rekammedispasien/create"
                        class="btn btn-primary">Tambah</a>
                </div>
            </div>
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Rekam Medis</th>
                                <th>NIK</th>
                                <th>ID Dokter</th>
                                <th>tanggal</th>
                                <th>Diagnosa</th>
                                <th>Tindakan Medis</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rekammedispasien as $r)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <th>{{ $r->id_rekammedis }}</th>
                                    <td>{{ $r->pasien->nik }}</td>
                                    <td>{{ $r->dokter->nama_dokter }}</td>
                                    <td>{{ $r->tanggal }}</td>
                                    <td>{{ $r->diagnosa }}</td>
                                    <td>{{ $r->tindakan_medis }}</td>
                                    <td>
                                        <a href="/{{ auth()->user()->getRoleNames()[0] }}/rekammedispasien/{{ $r->id }}/edit"
                                            class="btn btn-warning">Edit</a>
                                        <form
                                            action="/{{ auth()->user()->getRoleNames()[0] }}/rekammedispasien/{{ $r->id }}"
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
