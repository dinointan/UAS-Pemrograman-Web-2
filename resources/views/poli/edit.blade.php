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
                            $url = '/' . auth()->user()->getRoleNames()[0] . '/poli/' . $poli->id;
                        @endphp
                        <form action="{{ url($url) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_poli">Nama Poli</label>
                                    <input type="text" name="nama_poli" value="{{ $poli->nama_poli }}"
                                        class="form-control @error('nama_poli') is-invalid @enderror" id="nama_poli"
                                        placeholder="Masukkan Nama Poli" value="{{ old('nama_poli') }}">
                                    @error('nama_poli')
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
