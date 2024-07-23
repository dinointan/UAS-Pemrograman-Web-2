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
                            $url = '/' . auth()->user()->getRoleNames()[0] . '/pasien/' . $pasien->id;
                        @endphp
                        <form action="{{ url($url) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text" name="nik" value="{{ $pasien->nik }}"
                                        class="form-control @error('nik') is-invalid @enderror " id="nik"
                                        placeholder="Masukkan NIK" value="{{ old('nik') }}">
                                    @error('nik')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" value="{{ $pasien->nama }}"
                                        class="form-control @error('nama') is-invalid @enderror" id="nama"
                                        placeholder="Masukkan Nama" value="{{ old('nama') }}">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" value="{{ $pasien->tanggal_lahir }}"
                                        class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir"
                                        placeholder="Masukkan Tanggal Lahir" value="{{ old('tanggal_lahir') }}">
                                    @error('tanggal_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                        <option value="Laki-laki"
                                            {{ $pasien->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                                        </option>
                                        <option value="Perempuan"
                                            {{ $pasien->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nomor_hp">Nomor HP</label>
                                    <input type="text" name="nomor_hp" value="{{ $pasien->nomor_hp }}"
                                        class="form-control @error('nomor_hp') is-invalid @enderror" id="nomor_hp"
                                        placeholder="Masukkan Nomor HP" value="{{ old('nomor_hp') }}">
                                    @error('nomor_hp')
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
