<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="registerModalLabel">Register</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('storePelanggan') }}" method="POST">
                    @csrf
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-3 col-form-label">Name <span
                                style="color:red;">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" id="nama" value=""
                                placeholder="Your name" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-3 col-form-label">Email <span
                                style="color:red;">*</span></label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" id="email" value=""
                                placeholder="Your email" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-3 col-form-label">Password <span
                                style="color:red;">*</span></label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Your Password" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-3 col-form-label">Address 1 <span
                                style="color:red;">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                placeholder="Input Address 1" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-3 col-form-label">Address 2 </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="alamat2" id="alamat"
                                placeholder="Input Address 2">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tlp" class="col-sm-3 col-form-label">Phone Number <span
                                style="color:red;">*</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="tlp" name="tlp"
                                placeholder="Input phone number">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="date" class="col-sm-3 col-form-label">Date of birth <span
                                style="color:red;">*</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="date" name="date"
                                placeholder="Input phone number">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="foto" class="col-sm-3 col-form-label">Foto Product</label>
                        <div class="col-sm-9">
                            <input type="hidden" name="foto">
                            <input type="file" class="form-control" accept=".png, .jpg, .jpeg" id="inputFoto"
                                name="foto" onchange="previewImg()">
                            <img class="mt-2 preview" style="width: 100px;">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success col-sm-12">Register</button>
                    </p>
                    <button type="button" class="btn btn-danger col-sm-12"data-bs-dismiss="modal">Close</button>
                    
                </form>
            </div>

        </div>
    </div>
</div>
<script>
    function previewImg() {
        const fotoIn = document.querySelector('#inputFoto');
        const preview = document.querySelector('.preview');

        preview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(fotoIn.files[0]);

        oFReader.onload = function(oFREvent) {
            preview.src = oFREvent.target.result;
        }
    }
</script>
