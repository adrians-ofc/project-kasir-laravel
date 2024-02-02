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
                @if (session()->has('success'))
                    <div id="alert" class="alert alert-success mt-2"><i class="fas fa-check"></i>
                        {{ session('success') }}
                    </div>  
                @endif

                <a href="/admin/transaksi/create"></a>
                <table class="table mt-2">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Total Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach ($transaksi as $item)
                    <tr class="tr-st">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>Rp {{ $item->harga }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>
                            <div class="d-flex">
                                @if(in_array(auth()->user()->position, ['admin', 'developer']))
                                    {{-- <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> --}}
                                    <form action="/admin/transaksi/{{ $item->id }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm ml-1"><i class="fas fa-trash"></i></button>
                                    </form>
                                    @endif
                                    <a href="/admin/transaksi/{{ $item->id }}/detail" class="btn btn-sm ml-1" style="background-color: #001F3F; color: #fff;"><i class="fas fa-eye"></i></a>
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