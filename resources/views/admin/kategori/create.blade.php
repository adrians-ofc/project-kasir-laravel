<div class="row p-2">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5><b>{{ $title }}</b></h5>
                @isset($kategori)
                    <form action="/admin/kategori/{{ $kategori->id }}" method="POST">
                        @method('PUT')
                @else
                    <form action="/admin/kategori/" method="POST">
                @endisset

                    @csrf
                    <label for="name">Nama Kategori</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Kategori" value="{{ isset($kategori) ? $kategori->name : old('name') }}">

                    @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    <div class="button-group mt-3">
                        <a href="/admin/kategori" class="btn btn-secondary"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
                        <button type="submit" class="btn ml-2 mr-2 btn-main-green-bg">Kirim<i class="fas fa-arrow-right  ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>