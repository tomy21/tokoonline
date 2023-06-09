<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\M_resi;
use App\Http\Requests\StoreM_resiRequest;
use App\Http\Requests\UpdateM_resiRequest;
use App\Http\Resources\ResiResource;
use Illuminate\Support\Facades\Validator;

class MResiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = M_resi::paginate(5);
        return new ResiResource(200, 'List Data', $post);
    }

    public function store(StoreM_resiRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'invoice'   => 'required|string|max:255',
            'awb'       => 'required|string|max:255',
            'logistic'  => 'required|string|max:255',
            'warehouse' => 'required|string|max:255',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $resi = M_resi::create([
            'invoice'   => $request->invoice,
            'awb'       => $request->awb,
            'logistic'  => $request->logistic,
            'warehouse' => $request->warehouse,
        ]);

        return new ResiResource(200, 'Data Berhasil di input', $resi);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = M_resi::find($id);
        return new ResiResource(200, 'Detail data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateM_resiRequest $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'invoice'   => 'required|string|max:255',
            'awb'       => 'required|string|max:255',
            'logistic'  => 'required|string|max:255',
            'warehouse' => 'required|string|max:255',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $data = M_resi::find($id);

        //create post
        $data->update([
            'invoice'   => $request->invoice,
            'awb'       => $request->awb,
            'logistic'  => $request->logistic,
            'warehouse' => $request->warehouse,
        ]);

        return new ResiResource(200, 'Data Berhasil di Update', $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = M_resi::find($id);
        $data->delete();

        return new ResiResource(200, 'Data Berhasil di Delete', null);

    }
}
