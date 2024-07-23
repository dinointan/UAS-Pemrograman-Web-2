@section('content')
    <h3 class="fw-bold">Halaman History</h3>
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">    
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Kamar</th>
                        <th>Nama Poli</th>
                        <th>Tanggal</th>
                        <th>Keluhan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendaftaranpasien as $pp)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <th>{{ $pp->kamar->jenis_kamar }}</th>
                            <td>{{ $pp->poli->nama_poli }}</td>
                            <td>{{ $pp->tanggal }}</td>
                            <td>{{ $pp->keluhan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
@include('templates.layout')
