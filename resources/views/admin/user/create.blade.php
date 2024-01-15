<div class="container-fluif pt-2 ml-2">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5><b>Tambah Data</b></h5>

                    <form action="/admin/user" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for=""><b>Nama Lengkap</b></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="nama" placeholder="Masukkan Nama Lengkap">
                        </div>

                        <div class="form-group">
                            <label for=""><b>Email</b></label>
                            <input type="text" class="form-control" name="email" placeholder="Masukkan Email">
                        </div>

                        <div class="form-group">
                            <label for=""><b>Password</b></label>
                            <input type="password" class="form-control" name="password" placeholder="Masukkan Password">
                        </div>

                        <div class="form-group">
                            <label for=""><b>Konfirmasi Password</b></label>
                            <input type="password" class="form-control" name="re_password" placeholder="Masukkan Password">
                        </div>

                        <a href="/admin/user" class="btn btn-secondary"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
                        <button type="submit" class="btn ml-2 mr-2" style="background-color: #235362;color: #fff;">Kirim<i class="fas fa-arrow-right  ml-2"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>