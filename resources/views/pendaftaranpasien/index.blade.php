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
                        <form action="/pasien/pendaftaranpasien" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="id_kamar">Jenis Kamar</label>
                                    <select class="form-control" name="id_kamar" id="id_kamar">
                                        <option value="">-- Pilih Jenis Kamar --</option>
                                        @foreach ($kamar as $k)
                                            <option {{ old('id_kamar') == $k->id ? 'selected' : '' }}
                                                value="{{ $k->id }}">{{ $k->nama_kamar }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_kamar')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="id_poli">Nama Poli</label>
                                    <select class="form-control" name="id_poli" id="id_poli">
                                        <option value="">-- Pilih Poli --</option>
                                        @foreach ($poli as $p)
                                            <option {{ old('id_poli') == $p->id ? 'selected' : '' }}
                                                value="{{ $p->id }}">{{ $p->nama_poli }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_poli')
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
                                    <label for="keluhan">Keluhan</label>
                                    <input type="text" name="keluhan"
                                        class="form-control @error('keluhan') is-invalid @enderror" id="keluhan"
                                        placeholder="Masukkan keluhan" value="{{ old('keluhan') }}">
                                    @error('keluhan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
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
    @include('templates.layout')
