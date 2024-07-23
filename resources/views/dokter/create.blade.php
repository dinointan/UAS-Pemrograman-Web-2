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
                            $url = '/' . auth()->user()->getRoleNames()[0] . '/dokter';
                        @endphp
                        <form action="{{ url($url) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                {{-- <div class="form-group">
                                    <label for="id_dokter">ID Dokter</label>
                                    <input type="number" name="id_dokter"
                                        class="form-control @error('id_dokter') is-invalid @enderror" id="id_dokter"
                                        placeholder="Masukkan ID Dokter" value="{{ old('id_dokter') }}">
                                    @error('id_dokter')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div> --}}
                                <div class="form-group">
                                    <label for="nama_dokter">Nama Dokter</label>
                                    <input type="text" name="nama_dokter"
                                        class="form-control @error('nama_dokter') is-invalid @enderror" id="nama_dokter"
                                        placeholder="Masukkan Nama Dokter" value="{{ old('nama_dokter') }}">
                                    @error('nama_dokter')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="id_poli">Nama Poli</label>
                                    <select class="form-control" name="id_poli">
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
                                    <label for="nomor_srt">Nomor SRT</label>
                                    <input type="number" name="nomor_srt"
                                        class="form-control @error('nomor_srt') is-invalid @enderror" id="nomor_srt"
                                        placeholder="Masukkan Nomor SRT" value="{{ old('nomor_srt') }}">
                                    @error('nomor_srt')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nomor_hp">Nomor Hp</label>
                                    <input type="text" name="nomor_hp"
                                        class="form-control @error('nomor_hp') is-invalid @enderror" id="nomor_hp"
                                        placeholder="Masukkan Nomor Hp" value="{{ old('nomor_hp') }}">
                                    @error('nomor_hp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                        placeholder="Masukkan Email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <p for="foto" style="font-weight: 700; margin-bottom: 8px;">Foto</p>
                                    <div class="custom-file">
                                        <input type="file" name="foto"
                                            class="custom-file-input @error('foto') is-invalid @enderror" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                        @error('foto')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
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
