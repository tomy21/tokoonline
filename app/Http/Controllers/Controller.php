<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        return view('pelanggan.page.home',[
            'title'     => 'Home',
        ]);
    }
    public function shop()
    {
        return view('pelanggan.page.shop',[
            'title'     => 'Shop',
        ]);
    }
    public function transaksi()
    {
        return view('pelanggan.page.transaksi',[
            'title'     => 'Transaksi',
        ]);
    }
    public function contact()
    {
        return view('pelanggan.page.contact',[
            'title'     => 'Contact Us',
        ]);
    }
    public function checkout()
    {
        return view('pelanggan.page.checkOut',[
            'title'     => 'Check Out',
        ]);
    }
    public function admin()
    {
        return view('admin.page.dashboard',[
            'name'      => "Dashboard",
            'title'     => 'Admin Dashboard',
        ]);
    }
    public function product()
    {
        return view('admin.page.product',[
            'name'      => "Product",
            'title'     => 'Admin Product',
        ]);
    }
    public function userManagement()
    {
        return view('admin.page.user',[
            'name'      => "User Management",
            'title'     => 'Admin User Management',
        ]);
    }
    public function report()
    {
        return view('admin.page.report',[
            'name'      => "Report",
            'title'     => 'Admin Report',
        ]);
    }
}
