<div class="container-fluif pt-2 ml-2">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>Tambah Data</h5>

                    @isset($user)
                    <form action="/admin/user/{{ $user->id }}" method="POST">   
                        @method('put') 
                    @else
                    <form action="/admin/user" method="POST">
                    @endisset
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Masukkan Nama Lengkap" value="{{ isset($user) ? $user->name : ''}}">

                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Masukkan Email" value="{{ isset($user) ? $user->email : ''}}">
                            
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="position">Posisi</label>
                            <select name="position" id="position" class="form-control @error('position') is-invalid @enderror">
                              <option value="">--Posisi--</option>
                              <option value="Admin">Admin</option>
                              <option value="Kasir">Kasir</option>
                            </select>
                        
                            @error('position')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        

                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukkan Password">
                            
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Konfirmasi Password</label>
                            <input type="password" class="form-control @error('re_password') is-invalid @enderror" name="re_password" placeholder="Masukkan Password">
                            
                            @error('re_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <a href="/admin/user" class="btn btn-secondary"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
                        <button type="submit" class="btn ml-2 mr-2" style="background-color: #003C2A;color: #fff;">Kirim<i class="fas fa-save  ml-2"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>