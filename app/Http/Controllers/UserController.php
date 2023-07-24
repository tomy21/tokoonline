<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $data = User::paginate(10);
        return view('admin.page.user', [
            'name'      => "User Management",
            'title'     => 'Admin User Management',
            'data'      => $data,
        ]);
    }

    public function addModalUser()
    {
        return view('admin.modal.modalUser', [
            'title' => 'Tambah Data User',
            'nik'   => date('Ymd').rand(000,999),
        ]);
    }
    public function store(UserRequest $request)
    {
        $data = new User;
        $data->nik          = $request->nik;
        $data->name         = $request->nama;
        $data->email        = $request->email;
        $data->password     = bcrypt($request->password);
        $data->alamat       = $request->alamat;
        $data->tlp          = $request->tlp;
        $data->role         = $request->role;
        $data->tglLahir         = $request->tglLahir;
        $data->is_active    = 1;
        $data->is_mamber    = 0;
        $data->is_admin     = 1;
        
        // dd($request);die;
        if ($request->hasFile('foto')) {
            $photo = $request->file('foto');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/user'), $filename);
            $data->foto = $filename;
        }
        $data->save();
        Alert::toast('Data berhasil disimpan', 'success');
        return redirect()->route('userManagement');
    }
    public function show($id)
    {
        $data = User::findOrFail($id);
        // $hasValue = Hash::make($data->password);
        return view(
            'admin.modal.editUser',
            [
                'title' => 'Edit data User',
                'data'  => $data,
                // 'pass'  => (string) $hasValue,
            ]
        )->render();
    }
    public function update(UserRequest $request, $id)
    {
        $data = User::findOrFail($id);

        if ($request->file('foto')) {
            $photo = $request->file('foto');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/user'), $filename);
            $data->foto = $filename;
        } else {
            $filename = $request->foto;
        }

        $field = [
            'nik'                   => $request->nik,
            'name'                  => $request->nama,
            'email'                 => $request->email,
            'password'              => bcrypt($request->password),
            'alamat'                => $request->alamat,
            'tlp'                   => $request->tlp,
            'tglLahir'              => $request->tglLahir,
            'role'                  => $request->role,
            'foto'                  => $filename,
        ];

        $data::where('id', $id)->update($field);
        Alert::toast('Data berhasil diupdate', 'success');
        return redirect()->route('userManagement');
    }
    public function destroy($id)
    {
        $product = User::findOrFail($id);
        $product->delete();

        $json = [
            'success' => "Data berhasil dihapus"
        ];

        echo json_encode($json);
    }
}
