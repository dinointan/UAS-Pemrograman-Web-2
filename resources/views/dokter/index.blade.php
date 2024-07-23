@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-12">
            <h3 class="fw-bold">{{ $title }}</h3>
            <div class="card-tools mb-2">
                <div class="card-tools d-flex justify-content-end">
                    <a href="/{{ auth()->user()->getRoleNames()[0] }}/dokter/create" class="btn btn-primary">Tambah</a>
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
                                <th>Nama Poli</th>
                                <th>Nomor SRT</th>
                                <th>Nomor Hp</th>
                                <th>Email</th>
                                <th>Foto</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dokter as $d)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $d->nama_dokter }}</td>
                                    <td>{{ $d->poli->nama_poli }}</td>
                                    <td>{{ $d->nomor_srt }}</td>
                                    <td>{{ $d->nomor_hp }}</td>
                                    <td>{{ $d->email }}</td>
                                    <td>
                                        <img src="{{ asset('/assets/images/dokter/' . $d->foto) }}" alt="Foto Dokter"
                                            width="100px">
                                    </td>
                                    <td>
                                        <a href="/{{ auth()->user()->getRoleNames()[0] }}/dokter/{{ $d->id }}/edit"
                                            class="btn btn-warning">Edit</a>
                                        <form action="/{{ auth()->user()->getRoleNames()[0] }}/dokter/{{ $d->id }}"
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
