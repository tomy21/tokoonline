@extends('admin.layout.index')

@section('content')
    <div class="card mb-1">
        <div class="card-body d-flex flex-row justify-content-between">
            <div class="filter d-flex flex-lg-row gap-3">
                <input type="date" class="form-control" name="tgl_awal">
                <input type="date" class="form-control" name="tgl_akhir">
                <button class="btn btn-primary">Filter</button>
            </div>

        </div>
    </div>
    <div class="card rounded-full">
        <div class="card-header bg-transparent d-flex justify-content-between">
            <button class="btn btn-info" id="addData">
                <i class="fa fa-plus">
                    <span>Tambah Product</span>
                </i>
            </button>
            <input type="text" class="form-control w-25" placeholder="Search....">
        </div>
        <div class="card-body">
            <table class="table table-responsive table-striped">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Foto</td>
                        <td>Date In</td>
                        <td>SKU</td>
                        <td>Product Name</td>
                        <td>Category</td>
                        <td>Price</td>
                        <td>Stock</td>
                        <td>#</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $y => $x)
                        <tr class="align-middle">
                            <td>{{ ++$y }}</td>
                            <td>
                                <img src="{{ asset('storage/product/' . $x->foto) }}" style="width:100px;">
                            </td>
                            <td>{{ $x->created_at }}</td>
                            <td>{{ $x->sku }}</td>
                            <td>{{ $x->nama_product }}</td>
                            <td>{{ $x->type . ' ' . $x->kategory }}</td>
                            <td>{{ $x->harga }}</td>
                            <td>{{ $x->quantity }}</td>
                            <td>
                                <input type="hidden" id="sku" value="{{$x->sku}}">
                                <button class="btn btn-info editModal" data-id="{{ $x->id }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger deleteData" data-id="{{ $x->id }}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>
    <div class="tampilData" style="display: none;"></div>
    <div class="tampilEditData" style="display: none;"></div>

    <script>
        $('#addData').click(function() {
            $.ajax({
                url: '{{ route('addModal') }}',
                success: function(response) {
                    $('.tampilData').html(response).show();
                    $('#addModal').modal("show");
                }
            });
        });

        $('.editModal').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            $.ajax({
                type: "GET",
                url: "{{ route('editModal', ['id' => ':id']) }}".replace(':id', id),
                success: function(response) {
                    $('.tampilEditData').html(response).show();
                    $('#editModal').modal("show");
                }
            });
        });

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $('.deleteData').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var sku = $('#sku').val();
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener("mouseenter", Swal.stopTimer);
                    toast.addEventListener("mouseleave", Swal.resumeTimer);
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                },
            });

            Swal.fire({
                title: 'Hapus data ?',
                text: "Kamu yakin untuk menghapus SKU "+sku+" ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('deleteData', ['id' => ':id']) }}".replace(':id', id),
                        dataType: "json",
                        success: function(response) {
                            if (response.success) {
                                Toast.fire({
                                    icon: "success",
                                    title: response.success,
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            // Tampilkan notifikasi error jika terjadi kesalahan
                            Swal.fire({
                                title: 'Error',
                                text: 'Terjadi kesalahan saat menghapus data',
                                icon: 'error'
                            });
                        }
                    });
                }
            })
        });
    </script>
@endsection
