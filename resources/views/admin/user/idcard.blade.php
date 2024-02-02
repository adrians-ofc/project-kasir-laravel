<div class="id-card p-3">
    <div class="id-card-section">
        <div class="id-card-desc-section">
            <div class="description">
                <div class="title-section">
                    <img src="\vendor\admin\dist\img\Logo Setubruk-removebg-preview.png" alt="" class="title-logo">
                    <h2 class="title-id-card">ID CARD</h2>
                    <hr>
                </div>
                <div class="name-id-card">
                    <p class="fw-bold m-0 fs-large">{{ $user->name }}</p>
                    <p>nama</p>
                </div>
                <div class="position">
                    <p class="fw-bold m-0">{{ $user->position }}</p>
                    <p>Position</p>
                </div>
                <div class="email">
                    <p class="fw-bold m-0">{{ $user->email }}</p>
                    <p>email</p>
                </div>
            </div>
            {{-- <div class="qr-code-section" style="width: auto;">
                <i class="fas fa-qrcode p-2 rounded main-green-bg" style="font-size: 40px;"></i>
            </div> --}}
        </div>
    </div>
    <a href="/admin/user" class="btn btn-secondary mt-3"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
</div>
