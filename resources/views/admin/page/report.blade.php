@extends('admin.layout.index')

@section('content')
    <div class="d-flex flex-row justify-content-start gap-2 align-items-center">
        <div class="card">
            <div class="card-header">
                <h4 style="font-size: 16px;">Export data transaksi</h4>
            </div>
            <div class="card-body">
                <div class="d-flex flex-row gap-3">
                    <div class="d-flex flex-column">
                        <label for="dateStart">Tanggal Mulai</label>
                        <input type="date" name="dateStart" class="form-control">
                    </div>
                    <div class="d-flex flex-column">
                        <label for="dateEnd">Tanggal Akhir</label>
                        <input type="date" name="dateEnd" class="form-control">
                    </div>
                </div>
                <button class="btn btn-success mt-4"> Export</button>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 style="font-size: 16px;">Export data product</h4>
            </div>
            <div class="card-body">
                <div class="d-flex flex-row gap-3">
                    <div class="d-flex flex-column">
                        <label for="dateStart">Tanggal Mulai</label>
                        <input type="date" name="dateStart" class="form-control">
                    </div>
                    <div class="d-flex flex-column">
                        <label for="dateEnd">Tanggal Akhir</label>
                        <input type="date" name="dateEnd" class="form-control">
                    </div>
                </div>
                <button class="btn btn-success mt-4"> Export</button>
            </div>
        </div>
    </div>
@endsection
