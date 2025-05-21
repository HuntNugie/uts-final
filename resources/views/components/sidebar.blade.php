<nav class="navbar bg-light navbar-light">
    <a href="index.html" class="navbar-brand mx-4 mb-3">
        <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Manajemen</h3>
    </a>
    <div class="d-flex align-items-center ms-4 mb-4">
        <div class="position-relative">
            <img class="rounded-circle" src="{{ asset("template/img") }}/user.jpg" alt="" style="width: 40px; height: 40px;">
            <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
        </div>
        <div class="ms-3">
            <h6 class="mb-0">{{ auth()->user()->name }}</h6>
            <span>Admin</span>
        </div>
    </div>
    <div class="navbar-nav w-120">
        <a href="{{ route("home") }}" class="nav-item nav-link {{ request()->is("home") ? "active" : ""}}"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="bi bi-bag-fill"></i></i>Barang </a>
            <div class="dropdown-menu bg-transparent border-0">
                <a href="{{ route("barang.index") }}" class="dropdown-item  {{ request()->is("barang") ? "active" : ""}}"><i class="fa fa-table me-2"></i> Daftar barang</a>
                <a href="{{ route("transaksi.index") }}" class="dropdown-item  {{ request()->is("transaksi") ? "active" : ""}}"><i class="far fa-file-alt me-2"></i> Transaksi</a>
            </div>
        </div>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="bi bi-person-circle"></i> Mahasiswa </a>
            <div class="dropdown-menu bg-transparent border-0">
                <a href="{{ route("mahasiswa.index") }}" class="dropdown-item  {{ request()->is("mahasiswa") ? "active" : ""}}"><i class="bi bi-people-fill"></i> Daftar Mahasiswa</a>
            </div>
        </div>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="bi bi-car-front"></i> Rental Mobil </a>
            <div class="dropdown-menu bg-transparent border-0">
                <a href="{{ route("mobil.index") }}" class="dropdown-item  {{ request()->is("mobil") ? "active" : ""}}"><i class="bi bi-car-front-fill"></i> Mobil</a>
                <a href="{{ route("rental.index") }}" class="dropdown-item  {{ request()->is("rental") ? "active" : ""}}"><i class="bi bi-ev-front-fill"></i> Rental</a>
            </div>
        </div>
    </div>
</nav>
