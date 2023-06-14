<nav class="mb-3 d-flex justify-content-lg-between bg-white p-2 rounded">
    <div class="d-flex flex-column">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item active"><a href="#">{{ $name }}</a></li>
            {{-- <li class="breadcrumb-item active" aria-current="page">Library</li> --}}
        </ol>
        <span>{{ $name }}</span>
    </div>
    <div class="d-flex align-items-center gap-3">
        <div class="icon-notif">
            <span class="material-icons">
                notifications
            </span>
        </div>
        <img src="{{ asset('assets/images/default.png') }}" class="rounded-circle" style="width: 50px;" alt="">
    </div>
</nav>
