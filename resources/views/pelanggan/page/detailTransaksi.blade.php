@extends('pelanggan.layout.index')

@section('content')
    <div class="container mt-5">
        <div class="card w-50">
            <div class="card-header">
                <h4>Total yang harus dibayar</h4>
            </div>
            <div class="card-body">
                <h6>Id Transaksi {{ $data->code_transaksi }}</h6>
                <h6>{{ $data->nama_customer }}</h6>
                <h6>{{ number_format($data->total_harga) }}</h6>
            </div>

            <div class="p-2">
                <button class="btn btn-success" id="pay-button">Bayar Sekarang</button>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{$token}}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    alert("payment success!");
                    console.log(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        });
    </script>
@endsection
