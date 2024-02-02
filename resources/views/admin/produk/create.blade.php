<div class="row p-2">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5><b>{{ $title }}</b></h5>
                @isset($produk)
                    <form action="/admin/produk/{{ $produk->id }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                @else
                    <form action="/admin/produk/" method="POST" enctype="multipart/form-data">
                @endisset

                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Produk</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Produk" value="{{ isset($produk) ? $produk->name : old('name') }}">
                        
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="kategori_id">Kategori</label>
                        <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror" id="">
                            <option value="">--Kategori--</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}" {{ isset($produk) && $item->id == $produk->kategori_id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        

                        @error('kategori_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text currency-symbol">Rp</span>
                            </div>
                            <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" placeholder="Masukkan Harga" value="{{ isset($produk) ? format_rupiah($produk->harga) : old('harga') }}">
                        </div>
                        
                        @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" placeholder="Masukkan Stok" value="{{ isset($produk) ? $produk->stok : old('stok') }}">
                        
                        @error('stok')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" name="gambar" class="form-control pb-4 @error('gambar') is-invalid @enderror" value="{{ isset($produk) ? $produk->gambar : old('gambar') }}">
                        
                        @error('gambar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        @isset($produk)
                            <img src="{{ $produk->gambar }}" alt="Produk Image" width="150">
                            @endisset
                    </div> --}}


                    <div class="button-group mt-3">
                        <a href="/admin/produk" class="btn btn-secondary"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
                        <button type="submit" class="btn ml-2 mr-2" style="background-color: #003C2A;color: #fff;">Kirim<i class="fas fa-arrow-right  ml-2"></i></button>

                        @error('kategori')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>