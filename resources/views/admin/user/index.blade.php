<div class="content-dashboard">
    <div class="head-content-ct head-user pl-4">
        <div class="title">
            <h1 class="m-0" style="color: #003C2A;"><b>{{ $title }}</b></h1>
            <h5>Kelola Keanggotaan dengan Efisien</h5>
        </div>
    </div>
</div>

<div class="container-fluid pt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <a href="user/create" class="btn btn-main-green-bg"><i class="fas fa-plus mr-2"></i>Tambah</a>
                    
                    @if (session()->has('success'))
                        <div id="alert" class="alert alert-success mt-2"><i class="fas fa-check"></i>
                            {{ session('success') }}
                        </div>  
                    @endif

                    <table class="table mt-2">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>ID Card</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach ($user as $item)
                        <tr class="tr-st">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td><a href="/admin/user/{{ $item->id }}/idcard" class="btn btn-sm btn-main-green-bg"><i class="fas fa-id-card"></i></a></td>
                            <td>
                                <div class="d-flex">
                                    <a href="/admin/user/{{ $item->id }}/edit" class="btn btn-sm btn-main-green-bg"><i class="fas fa-edit"></i></a>
                                    {{-- <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> --}}
                                    <form action="/admin/user/{{ $item->id }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm ml-1"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
