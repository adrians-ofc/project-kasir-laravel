<div class="content-dashboard">
    <div class="head-content-ct head-produk pl-4">
        <div class="title">
            <h1 class="m-0" style="color: #003C2A;"><b>{{ $title }}</b></h1>
            <h5>{{ $subTitle }}</h5>
        </div>
    </div>
</div>

<div class="row p-2">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                @if(in_array(auth()->user()->position, ['admin', 'developer']))
                <a href="produk/create" class="btn btn-main-green-bg"><i class="fas fa-plus mr-2"></i>Tambah</a>
                @endif

                <a href="/admin/produk/create"></a>
                <table class="table mt-2">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>harga</th>
                        <th>Stok</th>
                        @if(in_array(auth()->user()->position, ['admin', 'developer']))
                        <th>Aksi</th>
                        @endif
                    </tr>
                    @foreach ($produk as $item)
                    <tr class="tr-st">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td><i>{{ $item->kategori ? $item->kategori->name : '' }}</i></td>
                        <td>Rp {{ format_rupiah($item->harga) }}</td>
                        <td>{{ $item->stok }}</td>
                        @if(in_array(auth()->user()->position, ['admin', 'developer']))
                            <td>
                                <div class="d-flex">
                                    <a href="/admin/produk/{{ $item->id }}/edit" class="btn btn-sm btn-main-green-bg"><i class="fas fa-edit"></i></a>
                                    {{-- <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> --}}
                                    <form action="/admin/produk/{{ $item->id }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm ml-1"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        @endif
                    </tr>
                    @endforeach
                </table>

                <div class="d-flex justify-content-left mt-3">
                    {{ $produk->links() }}
                </div>
            </div>
        </div>
    </div>
</div>