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
                            $url = '/' . auth()->user()->getRoleNames()[0] . '/kamar';
                        @endphp
                        <form action="{{ url($url) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_kamar">Nama Kamar</label>
                                    <input type="text" name="nama_kamar"
                                        class="form-control @error('nama_kamar') is-invalid @enderror" id="nama_kamar"
                                        placeholder="Masukkan Nama Kamar" value="{{ old('nama_kamar') }}">
                                    @error('nama_kamar')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kamar">Jenis Kamar</label>
                                    <select name="jenis_kamar" id="jenis_kamar"
                                        class="form-control @error('jenis_kamar') is-invalid @enderror">
                                        <option value="">-- Pilih Jenis Kamar --</option>
                                        <option value="svip" {{ old('jenis_kamar') == 'svip' ? 'selected' : '' }}>Kamar
                                            SVIP
                                        </option>
                                        <option value="vip" {{ old('jenis_kamar') == 'vip' ? 'selected' : '' }}>Kamar VIP
                                        </option>
                                        <option value="kelas1" {{ old('jenis_kamar') == 'kelas1' ? 'selected' : '' }}>Kamar
                                            Kelas 1
                                        </option>
                                        <option value="kelas2" {{ old('jenis_kamar') == 'kelas2' ? 'selected' : '' }}>Kamar
                                            Kelas 2
                                        </option>
                                        <option value="kelas3" {{ old('jenis_kamar') == 'kelas3' ? 'selected' : '' }}>Kamar
                                            Kelas 3
                                        </option>
                                        <option value="imc" {{ old('jenis_kamar') == 'imc' ? 'selected' : '' }}>Kamar
                                            IMC
                                        </option>
                                        <option value="icu" {{ old('jenis_kamar') == 'icu' ? 'selected' : '' }}>Kamar
                                            ICU
                                        </option>
                                        <option value="nicu" {{ old('jenis_kamar') == 'nicu' ? 'selected' : '' }}>Kamar
                                            NICU
                                        </option>
                                    </select>
                                    @error('jenis_kamar')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <p for="foto" style="font-weight: 700; margin-bottom: 5px;">Foto</p>
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
                                <div class="mb-3">
                                    <label for="fasilitas" class="form-label">Fasilitas</label>
                                    <textarea class="form-control" class="form-control @error('fasilitas') is-invalid @enderror" id="nama_kamar"
                                        id="fasilitas" name="fasilitas" rows="3"> </textarea>

                                    @error('fasilitas')
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
