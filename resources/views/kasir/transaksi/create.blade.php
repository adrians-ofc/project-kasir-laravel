<div class="row p-2">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="">Kode Produk</label>
                    </div>
                    <div class="col-md-8">
                        <form method="GET">
                            <div class="d-flex">
                                <select name="produk_id" class="form-control" id="">
                                    <option value="">--Nama Produk--</option>
                                    @foreach ($produk as $item)
                                        <option value="{{ $item->id }}">{{$item->id.'. '.$item->name}}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-main-green-bg ml-2">Pilih</button>
                            </div>
                        </form>
                    </div>
                </div>

                <form action="/kasir/transaksi/detail/create" method="POST">
                    @csrf

                    <input type="hidden" name="transaksi_id" value="{{ Request::segment(3) }}">
                    <input type="hidden" name="produk_id" value="{{ isset($p_detail) ? $p_detail->id : '' }}">
                    <input type="hidden" name="produk_name" value="{{ isset($p_detail) ? $p_detail->name : '' }}">
                    <input type="hidden" name="qty" value="{{ $qty }}">
                    <input type="hidden" name="subtotal" value="{{ $subtotal }}">

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="">Nama Produk</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="nama_produk" value="{{ isset($p_detail) ? $p_detail->name : '' }}" disabled>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="">Harga Satuan</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="harga_satuan" value="{{ isset($p_detail) ? format_rupiah($p_detail->harga) : '' }}" disabled>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="">QTY</label>
                        </div>
                        <div class="col-md-8">
                            <div class="d-flex">
                                
                                <a href="?produk_id={{ request('produk_id') }}&act=min&qty={{ $qty }}" class="btn btn btn-main-green-bg"><i class="fas fa-minus"></i></a>
                                <input type="number" class="form-control mx-1" name="qty" value="{{ $qty }}" readonly>
                                <a href="?produk_id={{ request('produk_id') }}&act=plus&qty={{ $qty }}" class="btn btn btn-main-green-bg"><i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-4">
                            
                        </div>
                        <div class="col-md-8">
                            <div class="d-flex">
                                <h6>Subtotal : Rp {{ format_rupiah($subtotal) }}</h6>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            
                        </div>
                        <div class="col-md-8">
                            <div class="d-flex">
                                <a href="/transaksi" class="btn btn-secondary mr-2"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
                                <button type="submit" class="btn btn-main-green-bg">Tambah<i class="fas fa-arrow-right ml-2"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="body-card p-1 pt-0">
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>QTY</th>
                        <th>Sub Total</th>
                        <th>#</th>
                    </tr>
                    @foreach ($transaksi_detail as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->produk_name }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>Rp {{ format_rupiah($item->subtotal) }},-</td>
                            <td>
                                <a href="/kasir/transaksi/detail/delete?id={{ $item->id }}"><i class="fas fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <a href="/kasir/transaksi/detail/selesai/{{ Request::segment(3) }}" class="btn btn-main-green-bg mr-2"><i class="fas fa-check mr-2"></i>Selesai</a>
        <a href="" class="btn btn-secondary"><i class="fas fa-file mr-2"></i>Pending</a>
    </div>
</div>

<div class="row p-2">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
            <form action="" method="GET">
            <div class="form-group">
                <label for="total_belanja">Total Belanja</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text white-bg">Rp</span>
                    </div>
                    <input type="number" value="{{ $transaksi->total }}" name="total_belanja" class="form-control" id="" disabled>
                </div>
            </div>
            <div class="form-group">
                <label for="dibayarkan">Dibayarkan</label>
                <div class="input-group">
                <div class="row">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-secondary btn-block" onclick="setDibayarkan(50000)">Rp 50,000</button>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-secondary btn-block" onclick="setDibayarkan(100000)">Rp 100,000</button>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-secondary btn-block" onclick="setDibayarkan(150000)">Rp 150,000</button>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-secondary btn-block" onclick="setDibayarkan(200000)">Rp 200,000</button>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-secondary btn-block" onclick="setDibayarkan(250000)">Rp 250,000</button>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-secondary btn-block" onclick="setDibayarkan(300000)">Rp 300,000</button>
                    </div>
                    <div class="input-group-prepend">
                        <span class="input-group-text white-bg">Rp</span>
                    </div>
                    <input type="number" name="dibayarkan" id="dibayarkan" value="{{ request('dibayarkan') }}" class="form-control">
                </div>
            </div>

            <button type="submit" class="btn btn-main-green-bg btn-block mb-2" onclick="hitungKembalian()">Hitung</button>

            <script>
                function setDibayarkan(value) {
                    document.getElementById('dibayarkan').value = value;
                }

                function hitungKembalian() {
                    var dibayarkan = document.getElementById('dibayarkan').value;
                    var totalBelanja = {{ $transaksi->total }};
                    var kembalian = dibayarkan - totalBelanja;

                    document.getElementById('kembalian').value = kembalian;
                    
                    if (dibayarkan == 0) {
                        document.getElementById('kembalian-info').innerText = "Masukkan total tunai yang dibayarkan.";
                    } else if (dibayarkan > 0 && dibayarkan < totalBelanja) {
                        document.getElementById('kembalian-info').innerText = "Uang yang Anda masukkan kurang.";
                    } else {
                        document.getElementById('kembalian-info').innerText = "";
                    }
                }
            </script>

            <div class="form-group">
                <label for="kembalian">Uang Kembalian</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text white-bg">Rp</span>
                    </div>
                    <input type="text" value="{{ $kembalian }}" class="form-control" id="kembalian" readonly>
                </div>
                <small id="kembalian-info" class="text-danger"></small>
            </div>

        </div>
    </div>
</div>
<script>
    function setDibayarkan(value) {
        document.getElementById('dibayarkan').value = value;
    }
</script>

