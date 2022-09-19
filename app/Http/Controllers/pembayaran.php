<?php

namespace App\Http\Controllers;

use App\Models\paketwifi;
use App\Models\User;
use App\Models\wifi;
use Illuminate\Http\Request;
use App\Models\pembayaranwifi;

class pembayaran extends Controller
{
    public  function request()
    {
        return view('dashboard.pembayaran.request', [
            'datauser' => User::where('nis', auth()->user()->nis)->get(),
            'datarequest' => pembayaranwifi::where('status', 'request')->get(),
            'panel' => 'request'
        ]);
    }

    public function report()
    {
        $bulan = request(['bulan'][0]) ??  date('m');
        $santri = request(['santri'][0]) ?? 'all';
        $admin = request(['admin'][0]) ?? 'all';
        $keuntungan = 0;
        $datareport[] = pembayaranwifi::where('status', 'complited')->filter(request(['bulan', 'santri']))->get();
        foreach ($datareport[0] as $data) {
            $keuntungan +=  $data->paketwifi->harga;
        }

        return view('dashboard.pembayaran.report', [
            'datauser' => User::where('nis', auth()->user()->nis)->get(),
            'datareport' => pembayaranwifi::where('status', 'complited')->filter(request(['bulan', 'santri', 'admin']))->get(),
            'panel' => 'report',
            'bulan' => $bulan,
            'santri' => $santri,
            'keuntungan' => $keuntungan,
            'admin' => $admin,
            'dataadmin' => User::where('remote', '>', '1')->get()

        ]);
    }

    public function tambah(Request $request, $id)
    {

        $kouta = wifi::where('nis', $request->nis)->get('kouta')[0]['kouta'];
        $kouta =  $kouta + $request->nilai;
        $wifi['kouta'] = $kouta;
        $pembayaran = [
            'status' => 'complited',
            'admin' => User::where('nis', auth()->user()->nis)->get()[0]['nis']
        ];
        pembayaranwifi::where('id', $id)->update($pembayaran);
        wifi::where('nis', $request->nis)->update($wifi);
        return redirect('/pembayaran');
    }

    public function destroy($id)
    {
        pembayaranwifi::destroy($id);
        return redirect('/pembayaran');
    }

    public function gift()
    {
        return view('dashboard.pembayaran.gift', [
            'datauser' => User::where('nis', auth()->user()->nis)->get(),
            'datasantri' => User::where('password', '!=', 'sukses')->get(),
            'panel' => 'gift',
            'paket' => paketwifi::all()
        ]);
    }
    public function giftupdate(Request $request)
    {

        foreach ($request->list as $nis) {
            $kouta = wifi::where('nis', $nis)->get('kouta')[0]['kouta'];
            $kouta =  $kouta + paketwifi::where('id', $request->kouta)->get()[0]['nilai'];
            $wifi['kouta'] = $kouta;

            $pembayaran = [
                'status' => 'complited',
                'nis' => $nis,
                'paket' => $request->kouta,
                'admin' => User::where('nis', auth()->user()->nis)->get()[0]['nis']

            ];
            pembayaranwifi::create($pembayaran);

            wifi::where('nis', $nis)->update($wifi);
        }
        return redirect('/pembayaran/gift')->with('sukses', 'Pembayaran selesai ');
    }
}
