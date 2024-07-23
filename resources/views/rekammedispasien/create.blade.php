@section('content')
    <div class="row">
        <div class="col-12">
            <h3 class="fw-bold">{{ $title }}</h3>

            <!-- Small boxes (Stat box) -->
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-warning">

                        <!-- form start -->
                        @php
                            $url = '/' . auth()->user()->getRoleNames()[0] . '/rekammedispasien';
                        @endphp
                        <form action="{{ url($url) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="id_rekammedis">ID Rekam Medis</label>
                                    <input type="text" name="id_rekammedis"
                                        class="form-control @error('id_rekammedis"') is-invalid @enderror"
                                        id="id_rekammedis" placeholder="Masukkan ID Rekam Medis"
                                        value="{{ old('id_rekammedis"') }}">
                                    @error('id_rekammedis"')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="id_pasien">Nama Pasien</label>
                                    <select class="form-control select2bs4 @error('id_pasien') is-invalid @enderror"
                                        style="width: 100%;" id="pasien" name="id_pasien">
                                        <option value="">--Pilih Pasien--</option>
                                        @foreach ($pasien as $p)
                                            <option
                                                value="{{ $p->id }}"{{ $p->id == old('id_pasien') ? 'SELECTED' : '' }}>
                                                {{ $p->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_pasien')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="id_dokter">Nama Dokter</label>
                                    <select class="form-control @error('id_dokter') is-invalid @enderror"
                                        style="width: 100%;" id="dokter" name="id_dokter">
                                        <option value="">Pilih Dokter</option>
                                        @foreach ($dokter as $d)
                                            <option
                                                value="{{ $d->id }}"{{ $d->id == old('id_dokter') ? 'SELECTED' : '' }}>
                                                {{ $d->nama_dokter }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_dokter')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" name="tanggal"
                                        class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                        placeholder="Masukkan Tanggal" value="{{ old('tanggal') }}">
                                    @error('tanggal')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="diagnosa">Diagnosa</label>
                                    <input type="text" name="diagnosa"
                                        class="form-control @error('diagnosa') is-invalid @enderror" id="diagnosa"
                                        placeholder="Masukkan diagnosa" value="{{ old('diagnosa') }}">
                                    @error('diagnosa')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="tindakan_medis" class="form-label">Tindakan Medis</label>
                                    <textarea class="form-control" class="form-control @error('fasilitas') is-invalid @enderror" id="tindakan_medis"
                                        id="tindakan_medis" name="tindakan_medis" rows="3"> </textarea>

                                    @error('tindakan_medis')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-warning">Submit</button>
                                </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    @endsection
    @include('templates.layout_dashboard')
