<aside
    class="sidebar navbar navbar-expand-lg bg-dark d-flex flex-column gap-4 align-content-lg-center mx-2 my-2 rounded">
    <h5 class="navbar-brand">Toko Online Kita</h5>
    {{-- <hr class="" style="color: white;font-weight:800"> --}}
    <div class="collapse navbar-collapse flex-grow-0" id="navbarNavDropdown">
        <ul class="navbar-nav flex-column gap-3 px-2">
            <li class="navbar-item rounded {{ Request::path() === 'admin/dashboard' ? 'bg-info' : '' }} ">
                <a href="dashboard" class="text-white">
                    <div class="d-flex gap-3">
                        <span class="material-icons">dashboard</span>
                        <p class="m-0 p-0">Dashboard</p>
                    </div>
                </a>
            </li>
            <li class="navbar-item rounded {{ Request::path() === 'admin/product' ? 'bg-info' : '' }} ">
                <a href="product" class="">
                    <div class="d-flex gap-3">
                        <span class="material-icons">inventory</span>
                        <p class="m-0 p-0">Product</p>
                    </div>
                </a>
            </li>
            <li class="navbar-item rounded {{ Request::path() === 'admin/transaksi' ? 'bg-info' : '' }} ">
                <a href="transaksi" class="">
                    <div class="d-flex gap-3">
                        <span class="material-icons">receipt_long</span>
                        <p class="m-0 p-0">Transaksi</p>
                    </div>
                </a>
            </li>
            <li class="navbar-item rounded {{ Request::path() === 'admin/report' ? 'bg-info' : '' }} ">
                <a href="report" class="">
                    <div class="d-flex gap-3">
                        <span class="material-icons">analytics</span>
                        <p class="m-0 p-0">Report</p>
                    </div>
                </a>
            </li>
            <li class="navbar-item rounded {{ Request::path() === 'admin/user_management' ? 'bg-info' : '' }} ">
                <a href="user_management" class="">
                    <div class="d-flex gap-3">
                        <span class="material-icons">people_alt</span>
                        <p class="m-0 p-0">User Management</p>
                    </div>
                </a>
            </li>
            <li class="navbar-item">
                <a href="logout" class="">
                    <div class="d-flex gap-3">
                        <span class="material-icons">logout</span>
                        <p class="m-0 p-0">Logout</p>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</aside>
