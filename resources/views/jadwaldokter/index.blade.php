@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-12">
            <h3 class="fw-bold">{{ $title }}</h3>
            <div class="card-tools mb-2">
                <div class="card-tools d-flex justify-content-end">
                    <a href="/{{ auth()->user()->getRoleNames()[0] }}/jadwal/create" class="btn btn-primary">Tambah</a>
                </div>
            </div>
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Dokter</th>
                                <th>Poli</th>
                                <th>Hari Praktik</th>
                                <th>Jam Mulai</th>
                                <th>Jam Akhir</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwal as $j)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $j->dokter->nama_dokter }}</td>
                                    <td>{{ $j->poli->nama_poli }}</td>
                                    <td>{{ $j->hari_praktik }}</td>
                                    <td>{{ $j->jam_mulai }}</td>
                                    <td>{{ $j->jam_selesai }}</td>
                                    <td>
                                        <a href="/{{ auth()->user()->getRoleNames()[0] }}/jadwal/{{ $j->id }}/edit"
                                            class="btn btn-warning">Edit</a>
                                        <form action="/{{ auth()->user()->getRoleNames()[0] }}/jadwal/{{ $j->id }}"
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
