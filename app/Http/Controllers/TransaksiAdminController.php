<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Illuminate\Http\Request;

class TransaksiAdminController extends Controller
{
    public function index()
    {
        $data = transaksi::paginate(10);
        return view('admin.page.transaksi', ['title' => "Transaksi", 'name' => 'Transaksi', 'data' => $data]);
    }
}
