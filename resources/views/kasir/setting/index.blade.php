<div class="content-dashboard">
    <div class="head-content-ct head-setting pl-4">
        <div class="title">
            <h1 class="m-0" style="color: #003C2A;"><b>{{ $title }}</b></h1>
        </div>
    </div>
</div>

<div class="row p-2">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h3 class="fw-bold" style="color: #003C2A;">Akun</h3>
                <hr>
                <h6><b>Nama Lengkap</b></h6>
                <p>{{ auth()->user()->name }}</p>
                <h6><b>Email</b></h6>
                <p>{{ auth()->user()->email }}</p>
                <h6><b>Posisi</b></h6>
                <p>{{ auth()->user()->position }}</p>

                <hr class="mt-5">
                <div class="developer-btn mb-3 my-4">
                    <a href="/kasir/developer" class=""><i class="fas fa-user-tie mr-2"></i><h6 class="m-0">Pengembang</h6></a>
                </div>
                <hr>
                <div class="log-out-btn mb-2 my-4">
                    <a href="/logout" class=""><i class="fas fa-sign-out-alt mr-2"></i><h6 class="m-0">Keluar</h6></a>
                </div>
            </div>
        </div>
    </div>
</div>