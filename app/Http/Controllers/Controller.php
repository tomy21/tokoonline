<?php

namespace App\Http\Controllers;

use App\Models\modelDetailTransaksi;
use App\Models\product;
use App\Models\tblCart;
use App\Models\transaksi;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function shop(Request $request)
    {
        if ($request->has('kategory') && $request->has('type')) {
            $category = $request->input('kategory');
            $type = $request->input('type');
            $data = product::where('kategory', $category)
                ->orWhere('type', $type)->paginate(5);
        } else {
            $data = product::paginate(5);
        }
        $countKeranjang = tblCart::where(['idUser' => 'guest123', 'status' => 0])->count();


        return view('pelanggan.page.shop', [
            'title'     => 'Shop',
            'data'      => $data,
            'count'     => $countKeranjang,
        ]);
    }
    public function transaksi()
    {
        $db = tblCart::with('product')->where(['idUser' => 'guest123', 'status' => 0])->get();
        $countKeranjang = tblCart::where(['idUser' => 'guest123', 'status' => 0])->count();

        // dd($db->product->nama_product);die;
        return view('pelanggan.page.transaksi', [
            'title'     => 'Transaksi',
            'count'     => $countKeranjang,
            'data'      => $db
        ]);
    }
    public function contact()
    {
        $countKeranjang = tblCart::where(['idUser' => 'guest123', 'status' => 0])->count();

        return view('pelanggan.page.contact', [
            'title'     => 'Contact Us',
            'count'     => $countKeranjang,
        ]);
    }
    public function checkout()
    {
        $countKeranjang = tblCart::where(['idUser' => 'guest123', 'status' => 0])->count();
        $code = transaksi::count();
        $codeTransaksi = date('Ymd') . $code + 1;
        $detailBelanja = modelDetailTransaksi::where(['id_transaksi' => $codeTransaksi, 'status' => 0])
            ->sum('price');
        $jumlahBarang = modelDetailTransaksi::where(['id_transaksi' => $codeTransaksi, 'status' => 0])
            ->count('id_barang');
        $qtyBarang = modelDetailTransaksi::where(['id_transaksi' => $codeTransaksi, 'status' => 0])
            ->sum('qty');
        return view('pelanggan.page.checkOut', [
            'title'     => 'Check Out',
            'count'     => $countKeranjang,
            'detailBelanja' => $detailBelanja,
            'jumlahbarang' => $jumlahBarang,
            'qtyOrder'  => $qtyBarang,
            'codeTransaksi' => $codeTransaksi
        ]);
    }
    public function prosesCheckout(Request $request, $id)
    {
        $data = $request->all();
        // $findId = tblCart::where('id',$id)->get();
        $code = transaksi::count();
        $codeTransaksi = date('Ymd') . $code + 1;
        // dd($data);die;

        // simpan detail barang
        $detailTransaksi = new modelDetailTransaksi();
        $fieldDetail = [
            'id_transaksi' => $codeTransaksi,
            'id_barang'    => $data['idBarang'],
            'qty'          => $data['qty'],
            'price'        => $data['total']
        ];
        $detailTransaksi::create($fieldDetail);

        // update cart 
        $fieldCart = [
            'qty'          => $data['qty'],
            'price'        => $data['total'],
            'status'       => 1,
        ];
        tblCart::where('id', $id)->update($fieldCart);

        Alert::toast('Checkout Berhasil', 'success');
        return redirect()->route('checkout');
    }

    public function prosesPembayaran(Request $request)
    {
        $data = $request->all();
        $dbTransaksi = new transaksi();
        // dd($data);die;

        $dbTransaksi->code_transaksi    = $data['code'];
        $dbTransaksi->total_qty         = $data['totalQty'];
        $dbTransaksi->total_harga       = $data['dibayarkan'];
        $dbTransaksi->nama_customer     = $data['namaPenerima'];
        $dbTransaksi->alamat            = $data['alamatPenerima'];
        $dbTransaksi->no_tlp            = $data['tlp'];
        $dbTransaksi->ekspedisi         = $data['ekspedisi'];

        $dbTransaksi->save();

        $dataCart = modelDetailTransaksi::where('id_transaksi', $data['code'])->get();
        foreach ($dataCart as $x) {
            $dataUp = modelDetailTransaksi::where('id', $x->id)->first();
            $dataUp->status    = 1;
            $dataUp->save();

            $idProduct = product::where('id', $x->id_barang)->first();
            $idProduct->quantity = $idProduct->quantity - $x->qty;
            $idProduct->quantity_out = $x->qty;
            $idProduct->save();
        }

        Alert::alert()->success('Transaksi berhasil', 'Ditunggu barangnya');
        return redirect()->route('home');
    }

    public function keranjang()
    {
        $countKeranjang = tblCart::where(['idUser' => 'guest123', 'status' => 0])->count();
        $all_trx = transaksi::all();
        return view('pelanggan.page.keranjang', [
            'name' => 'Payment',
            'title' => 'Payment Process',
            'count' => $countKeranjang,
            'data'  => $all_trx
        ]);
    }

    public function bayar($id)
    {
        $find_data = transaksi::find($id);
        $countKeranjang = tblCart::where(['idUser' => 'guest123', 'status' => 0])->count();
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $find_data->code_transaksi,
                'gross_amount' => $find_data->total_harga,
            ),
            'customer_details' => array(
                'first_name' => 'Mr',
                'last_name' => $find_data->nama_customer,
                // 'email' => 'budi.pra@example.com',
                'phone' => $find_data->no_tlp,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // dd($snapToken);die;
        return view('pelanggan.page.detailTransaksi', [
            'name' => 'Detail Transaksi',
            'title' => 'Detail Transaksi',
            'count' => $countKeranjang,
            'token' => $snapToken,
            'data' => $find_data,
        ]);
    }

    public function admin()
    {
        $dataProduct = product::count();
        $dataStock = product::sum('quantity');
        $dataTransaksi = transaksi::count();
        $dataPenghasilan = transaksi::sum('total_harga');
        return view('admin.page.dashboard', [
            'name'          => "Dashboard",
            'title'         => 'Admin Dashboard',
            'totalProduct'  => $dataProduct,
            'sumStock'      => $dataStock,
            'dataTransaksi' => $dataTransaksi,
            'dataPenghasilan' => $dataPenghasilan,
        ]);
    }

    public function userManagement()
    {
        return view('admin.page.user', [
            'name'      => "User Management",
            'title'     => 'Admin User Management',
        ]);
    }
    public function report()
    {
        return view('admin.page.report', [
            'name'      => "Report",
            'title'     => 'Admin Report',
        ]);
    }
    public function login()
    {
        return view('admin.page.login', [
            'name'      => "Login",
            'title'     => 'Admin Login',
        ]);
    }
    public function loginProses(Request $request)
    {
        Session::flash('error', $request->email);
        $dataLogin = [
            'email' => $request->email,
            'password'  => $request->password,
        ];

        $user = new User;
        $proses = $user::where('email', $request->email)->first();

        if ($proses->is_admin === 0) {
            Session::flash('error', 'Kamu bukan admin');
            return back();
        } else {
            if (Auth::attempt($dataLogin)) {
                Alert::toast('Kamu berhasil login', 'success');
                $request->session()->regenerate();
                return redirect()->intended('/admin/dashboard');
            } else {
                Alert::toast('Email dan Password salah', 'error');
                return back();
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Alert::toast('Kamu berhasil Logout', 'success');
        return redirect('admin');
    }
}
