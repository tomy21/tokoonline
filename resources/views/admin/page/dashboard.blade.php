@extends('admin.layout.index')

@section('content')
    <div class="d-flex flex-wrap gap-3">
        <div class="card" style="width: 250px;">
            <div class="card-body">
                <div class="d-flex gap-2 align-items-center justify-start">
                    <span class="material-icons p-1 rounded" style="font-size:22px; color:green; background-color:#A6FF96">
                        inventory
                    </span>
                    <h5 class="p-0 m-0" style="color:green">Total Product</h5>
                </div>
                <span class="fs-2 p-0 m-0">{{ $totalProduct }}</span>
            </div>
        </div>
        <div class="card" style="width: 250px;">
            <div class="card-body">
                <div class="d-flex gap-2 align-items-center justify-start">
                    <span class="material-icons p-1 rounded"
                        style="font-size:22px; color:#D80032; background-color:#F78CA2">
                        view_in_ar
                    </span>
                    <h5 class="p-0 m-0" style="color:green">Total Stock</h5>
                </div>
                <span class="fs-2 p-0 m-0">{{ $sumStock }}</span>
            </div>
        </div>
        <div class="card" style="width: 250px;">
            <div class="card-body">
                <div class="d-flex gap-2 align-items-center justify-start">
                    <span class="material-icons p-1 rounded"
                        style="font-size:22px; color:#088395; background-color:#7ED7C1">
                        shopping_cart
                    </span>
                    <h5 class="p-0 m-0" style="color:green">Transaksi</h5>
                </div>
                <span class="fs-2 p-0 m-0">{{ $dataTransaksi }}</span>
            </div>
        </div>
        <div class="card" style="width: 250px;">
            <div class="card-body">
                <div class="d-flex gap-2 align-items-center justify-start">
                    <span class="material-icons p-1 rounded"
                        style="font-size:22px; color:#FFC436; background-color:#F4F27E">
                        payments
                    </span>
                    <h5 class="p-0 m-0" style="color:green">Penghasilan</h5>
                </div>
                <span class="fs-2 p-0 m-0">{{ number_format($dataPenghasilan / 1000000, 2) . ' Jt' }}</span>
            </div>
        </div>
    </div>

    <div class="card mt-2">
        <canvas id="myChart" style="height: 50vh;"></canvas>
    </div>

    <div class="d-flex flex-row gap-2">
        <div class="card rounded-full mt-2" style="width: 50%;">
            <div class="card-header">
                Stock terbatas
            </div>
            <div class="card-body">
                <table class="table table-responsive table-striped" style="font-size: 12px">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Inbound Date</th>
                            <th>Stock</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <div class="pagination d-flex flex-row justify-content-between">
                    {{-- <div class="showData">
                        Data ditampilkan {{ $data->count() }} dari {{ $data->total() }}
                    </div>
                    <div>
                        {{ $data->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="card rounded-full mt-2" style="width: 50%;">
            <div class="card-header">
                Product terlaris
            </div>
            <div class="card-body">
                <table class="table table-responsive table-striped" style="font-size: 12px">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Inbound Date</th>
                            <th>Stock</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <div class="pagination d-flex flex-row justify-content-between">
                    {{-- <div class="showData">
                        Data ditampilkan {{ $data->count() }} dari {{ $data->total() }}
                    </div>
                    <div>
                        {{ $data->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Transaksi',
                    data: [12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3],
                    borderWidth: 1,
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
