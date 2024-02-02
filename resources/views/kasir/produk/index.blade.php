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
                <table class="table mt-2">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>harga</th>
                        <th>Stok</th>
                    </tr>
                    @foreach ($produk as $item)
                    <tr class="tr-st">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td><i>{{ $item->kategori ? $item->kategori->name : '' }}</i></td>
                        <td>Rp {{ format_rupiah($item->harga) }}</td>
                        <td>{{ $item->stok }}</td>
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