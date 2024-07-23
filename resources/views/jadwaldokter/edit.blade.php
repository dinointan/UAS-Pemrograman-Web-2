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
                            $url = '/' . auth()->user()->getRoleNames()[0] . '/jadwal/' . $jadwal->id;
                        @endphp
                        <form action="{{ url($url) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="id_dokter">Nama Dokter</label>
                                    <select class="form-control" name="id_dokter" id="id_dokter">
                                        <option value="">-- Pilih Dokter --</option>
                                        @foreach ($dokter as $d)
                                            <option {{ $jadwal->id_dokter == $d->id ? 'selected' : '' }}
                                                value="{{ $d->id }}">{{ $d->nama_dokter }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_dokter')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="hari_praktik">Hari Praktek</label>
                                    <select name="hari_praktik" id="hari_praktik"
                                        class="form-control @error('hari_praktik') is-invalid @enderror">
                                        <option value="">-- Pilih Hari Praktek --</option>
                                        <option value="Senin" {{ $jadwal->hari_praktik == 'Senin' ? 'selected' : '' }}>
                                            Senin
                                        </option>
                                        <option value="Selasa" {{ $jadwal->hari_praktik == 'Selasa' ? 'selected' : '' }}>
                                            Selasa</option>
                                        <option value="Rabu" {{ $jadwal->hari_praktik == 'Rabu' ? 'selected' : '' }}>Rabu
                                        </option>
                                        <option value="Kamis" {{ $jadwal->hari_praktik == 'Kamis' ? 'selected' : '' }}>
                                            Kamis
                                        </option>
                                        <option value="Jumat" {{ $jadwal->hari_praktik == 'Jumat' ? 'selected' : '' }}>
                                            Jumat
                                        </option>
                                        <option value="Sabtu" {{ $jadwal->hari_praktik == 'Sabtu' ? 'selected' : '' }}>
                                            Sabtu
                                        </option>
                                        <option value="Minggu" {{ $jadwal->hari_praktik == 'Minggu' ? 'selected' : '' }}>
                                            Minggu</option>
                                    </select>
                                    @error('hari_praktik')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jam_mulai">Jam Mulai</label>
                                    <input type="time" name="jam_mulai" value="{{ substr($jadwal->jam_mulai, 0, 5) }}"
                                        class="form-control @error('jam_mulai') is-invalid @enderror" id="jam_mulai"
                                        value="{{ old('jam_mulai') }}">
                                    @error('jam_mulai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jam_selesai">Jam Selesai</label>
                                    <input type="time" name="jam_selesai"
                                        value="{{ substr($jadwal->jam_selesai, 0, 5) }}"
                                        class="form-control @error('jam_selesai') is-invalid @enderror" id="jam_selesai"
                                        value="{{ old('jam_selesai') }}">
                                    @error('jam_selesai')
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
    @include('templates.layout_dashboard')
