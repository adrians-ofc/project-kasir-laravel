<div class="content-dashboard">
    <div class="head-content-ct head-transaksi pl-4">
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
                <a href="/kasir/transaksi/create" class="btn btn-main-green-bg"><i class="fas fa-plus mr-2"></i>Tambah</a>
                
                @if (session()->has('success'))
                    <div id="alert" class="alert alert-success mt-2"><i class="fas fa-check"></i>
                        {{ session('success') }}
                    </div>  
                @endif

                <a href="/kasir/transaksi/create"></a>
                <table class="table mt-2">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach ($transaksi as $item)
                    <tr class="tr-st">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>Rp {{ $item->subtotal }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>
                            <div class="d-flex">
                                @if(in_array(auth()->user()->position, ['kasir', 'developer']))
                                    <a href="/kasir/transaksi/{{ $item->id }}/edit" class="btn btn-sm btn-main-green-bg"><i class="fas fa-edit"></i></a>
                                    {{-- <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> --}}
                                    <form action="/kasir/transaksi/{{ $item->id }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm ml-1"><i class="fas fa-trash"></i></button>
                                    </form>
                                    @endif
                                    <a href="/kasir/transaksi/{{ $item->id }}/detail" class="btn btn-sm ml-1" style="background-color: #001F3F; color: #fff;"><i class="fas fa-eye"></i></a>
                                </div>
                            </td>
                    </tr>
                    @endforeach
                </table>

                <div class="d-flex justify-content-left mt-3">
                    {{ $transaksi->links() }}
                </div>
            </div>
        </div>
    </div>
</div>