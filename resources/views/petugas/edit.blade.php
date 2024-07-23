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
                            $url = '/' . auth()->user()->getRoleNames()[0] . '/petugas/' . $petugas->id;
                        @endphp
                        <form action="{{ url($url) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nip">NIP</label>
                                    <input type="text" name="nip" value="{{ $petugas->nip }}"
                                        class="form-control @error('nip') is-invalid @enderror " id="nip"
                                        placeholder="Masukkan NIP" value="{{ old('nip') }}">
                                    @error('nip')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama_petugas">Nama Petugas</label>
                                    <input type="text" name="nama_petugas" value="{{ $petugas->nama_petugas }}"
                                        class="form-control @error('nama_petugas') is-invalid @enderror" id="nama_petugas"
                                        placeholder="Masukkan Nama Petugas" value="{{ old('nama_petugas') }}">
                                    @error('nama_petugas')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" value="{{ $petugas->email }}"
                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                        placeholder="Masukkan Email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" name="jabatan" value="{{ $petugas->jabatan }}"
                                        class="form-control @error('jabatan') is-invalid @enderror" id="jabatan"
                                        placeholder="Masukkan jabatan" value="{{ old('jabatan') }}">
                                    @error('jabatan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nomor_hp">Nomor HP</label>
                                    <input type="text" name="nomor_hp" value="{{ $petugas->nomor_hp }}"
                                        class="form-control @error('nomor_hp') is-invalid @enderror" id="nomor_hp"
                                        placeholder="Masukkan Nomor HP" value="{{ old('nomor_hp') }}">
                                    @error('nomor_hp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" value="{{ $petugas->alamat }}"
                                        class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                        placeholder="Masukkan Alamat" value="{{ old('alamat') }}">
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-warning">Edit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    @endsection
    @include('templates.layout_dashboard')
