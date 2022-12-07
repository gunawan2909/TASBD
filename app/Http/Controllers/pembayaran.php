<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\wifi;
use App\Models\mikrotik;
use App\Models\paketwifi;
use Illuminate\Http\Request;
use App\Models\pembayaranwifi;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class pembayaran extends Controller
{
    public  function request()
    {
        return view('dashboard.pembayaran.request', [
            'datauser' => DB::select('select * from users where nis = ?', [auth()->user()->nis]),
            'datarequest' => DB::select('select pembayaranwifis.id, users.nis, users.name,paketwifis.nama, paketwifis.harga, paketwifis.jenis,paketwifis.nilai from pembayaranwifis INNER JOIN paketwifis on pembayaranwifis.paket  = paketwifis.id INNER JOIN users on users.nis = pembayaranwifis.nis WHERE STATUS = "request"'),
            'panel' => 'request'
        ]);
    }

    public function report(Request $request)
    {
        // $bulan = request(['bulan'][0]) ??  date('m');
        // $santri = request(['santri'][0]) ?? 'all';
        // $admin = request(['admin'][0]) ?? 'all';
        $request->nis ?
            $datareport[] = Db::select('select * from pembayaranwifis inner join paketwifis on pembayaranwifis.paket = paketwifis.id inner join users on users.nis = pembayaranwifis.nis where status = "complited" and (users.name  like ? or users.nis  like ?) ', ["%" . $request->nis . "%", $request->nis . "%"]) :
            $datareport[] = Db::select('select * from pembayaranwifis inner join paketwifis on pembayaranwifis.paket = paketwifis.id inner join users on users.nis = pembayaranwifis.nis where status = "complited"');
        $keuntungan = 0;
        $datareport[] = Db::select('select * from pembayaranwifis inner join paketwifis on pembayaranwifis.paket = paketwifis.id inner join users on users.nis = pembayaranwifis.nis where status = "complited"');
        foreach ($datareport[0] as $data) {
            $keuntungan +=  $data->harga;
        }

        return view('dashboard.pembayaran.report', [
            'datauser' => DB::select('select * from users where nis = ?', [auth()->user()->nis]),
            'datareport' => $datareport,
            'panel' => 'report',
            'keuntungan' => $keuntungan,


        ]);
    }


    public function tambah(Request $request, $id)
    {

        $kouta  = DB::select('SELECT kouta from wifis WHERE nis =  ? ', [$request->nis])[0]->kouta;

        $kouta =  $kouta + $request->nilai;
        DB::update('update pembayaranwifis set status = :status, admin =:admin where id = :id', [
            'status' => 'complited',
            'admin' => 1119013,
            'id' => $id
        ]);
        Db::update('update wifis set kouta = ? where nis = ?', [$kouta, $request->nis]);
        return redirect('/pembayaran');
    }

    public function destroy($id)
    {
        DB::delete('delete from pembayaranwifis where id = ?', [$id]);
        // pembayaranwifi::destroy($id);
        return redirect('/pembayaran');
    }

    // public function gift()
    // {
    //     return view('dashboard.pembayaran.gift', [
    //         'datauser' => DB::select('select * from users where nis = :nis', ['nis' => auth()->user()->nis]),
    //         'datasantri' => DB::select('select * from users where password !=  sukses'),
    //         'panel' => 'gift',
    //         'paket' => DB::select('select * from paketwifis')
    //     ]);
    // }
    // public function giftupdate(Request $request)
    // {
    //     $mikrotik = new mikrotik();
    //     $mikrotik->connect();
    //     $datamikrotiks = $mikrotik->comm('/ip/hotspot/user/print');
    //     foreach ($request->list as $nis) {
    //         $kouta = wifi::where('nis', $nis)->get('kouta')[0]['kouta'];
    //         $kouta =  $kouta + paketwifi::where('id', $request->kouta)->get()[0]['nilai'];
    //         $wifi['kouta'] = $kouta;

    //         $pembayaran = [
    //             'status' => 'complited',
    //             'nis' => $nis,
    //             'paket' => $request->kouta,
    //             'admin' => User::where('nis', auth()->user()->nis)->get()[0]['nis']

    //         ];
    //         pembayaranwifi::create($pembayaran);
    //         foreach ($datamikrotiks as $datamikrotik) {
    //             if ($datamikrotik['name'] == $nis) {
    //                 $mikrotik->enable($datamikrotik['.id']);
    //             }
    //         }
    //         wifi::where('nis', $nis)->update($wifi);
    //     }
    //     return redirect('/pembayaran/gift')->with('sukses', 'Pembayaran selesai ');
    // }
}
