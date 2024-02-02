<div class="content-dashboard">
    <div class="head-content-ct head-kategori pl-4">
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
                <a href="kategori/create" class="btn btn-main-green-bg"><i class="fas fa-plus mr-2"></i>Tambah</a>
                
                @if (session()->has('success'))
                    <div id="alert" class="alert alert-success mt-2"><i class="fas fa-check"></i>
                        {{ session('success') }}
                    </div>  
                @endif

                <a href="/admin/kategori/create"></a>
                <table class="table mt-2">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach ($kategori as $item)
                    <tr class="tr-st">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="/admin/kategori/{{ $item->id }}/edit" class="btn btn-sm btn-main-green-bg"><i class="fas fa-edit"></i></a>
                                {{-- <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> --}}
                                <form action="/admin/kategori/{{ $item->id }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm ml-1"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>

                <div class="d-flex justify-content-left mt-3">
                    {{ $kategori->links() }}
                </div>
            </div>
        </div>
    </div>
</div>