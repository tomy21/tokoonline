<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3 row">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="email" value=""
                            placeholder="Masukan email Anda">
                    </div>
                </div>
                <div class="mb-5 row">
                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="password" placeholder="Masukan password anda">
                    </div>
                </div>

                <button type="button" class="btn btn-success col-sm-12">Login</button>
                <p class="m-auto text-center p-2" style="font-size:12px">Jika belum ada akun register sekarang .. !</p>
                <button type="button" class="btn btn-primary col-sm-12" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>
            </div>

        </div>
    </div>
</div>
