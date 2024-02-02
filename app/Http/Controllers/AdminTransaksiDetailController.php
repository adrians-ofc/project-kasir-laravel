<?php

namespace App\Http\Controllers;

use App\Models\TransaksiDetail;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class AdminTransaksiDetailController extends Controller
{
    //
    function create(Request $request)
    {
        // die('masuk');
        // dd($request -> all());

        $produk_id = $request->produk_id;
        $transaksi_id = $request->transaksi_id;

        $transaksi_detail = TransaksiDetail::whereProdukId($produk_id)->whereTransaksiId($transaksi_id)->first();

        $transaksi = Transaksi::find($transaksi_id);
        if($transaksi_detail == null){
            $data = [
                'produk_id' => $produk_id,
                'produk_name' => $request->produk_name,
                'transaksi_id' => $transaksi_id,
                'qty' => $request->qty,
                'subtotal' => $request->subtotal,
            ];
            TransaksiDetail::create($data);

            $data_transaksi = [
                'total' => $request->subtotal + $transaksi->total,
            ];
            $transaksi->update($data_transaksi);
        } else {
            $data = [
                'qty' => $transaksi_detail->qty + $request->qty,
                'subtotal' => $request->subtotal  + $transaksi_detail->subtotal,
            ];
            $transaksi_detail->update($data);

            $data_transaksi = [
                'total' => $request->subtotal + $transaksi->total,
            ];
            $transaksi->update($data_transaksi);
        }
        return redirect('transaksi/'.$transaksi_id.'/edit');
    }

    function delete()
    {
        $id = request('id');
        $transaksi_detail = TransaksiDetail::find($id);

        $transaksi = Transaksi::find($transaksi_detail->transaksi_id);
        $data = [
            'total' => $transaksi->total - $transaksi_detail->subtotal,
        ];

        $transaksi->update($data);
        $transaksi_detail->delete();

        return redirect()->back();
    }

    function done($id)
    {
        $transaksi = Transaksi::find($id);
        $data = [
            'status' => 'selesai'
        ];

        $transaksi->update($data);
        return redirect('/transaksi');
    }
}
