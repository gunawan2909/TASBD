<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\wifi;
use App\Models\mikrotik;
use App\Models\paketwifi;
use Illuminate\Http\Request;
use App\Models\pembayaranwifi;
use App\Models\wifi as ModelsWifi;

class wificontroler extends Controller
{
    public function status()
    {

        $mikrotik = new mikrotik();
        $mikrotik->connect('6.6.6.2', 'IT', 'IT@nh2021');
        return view('dashboard.home.status', [
            'datadevice' => $mikrotik->active(auth()->user()->nis),
            'datauser' => User::where('nis', auth()->user()->nis)->get(),
            'panel' => 'status'
        ]);
    }
    public  function req()
    {
        return view('dashboard.home.request', [
            'datauser' => User::where('nis', auth()->user()->nis)->get(),
            'datapaket' => paketwifi::all(),
            'panel' => 'req'

        ]);
    }
    public function report()
    {
        return view('dashboard.home.report', [
            'datauser' => User::where('nis', auth()->user()->nis)->get(),
            'datareport' => pembayaranwifi::where('nis', auth()->user()->nis)->get(),
            'panel' => 'report'
        ]);
    }

    public function delete($id)
    {

        $mikrotik = new mikrotik();

        $mikrotik->connect();
        $mikrotik->comm('/ip/hotspot/active/remove', array(
            ".id" =>  $id
        ));
        return redirect('/home');
    }
    public function paket(Request $request, $id)
    {
        $data['nis'] = $request->nis;
        $data['status'] = 'request';
        $data['paket'] = $id;
        $data['paket'] = $id;
        $data['admin'] = '0';


        pembayaranwifi::create($data);
        return redirect('/home/report')->with('pembelian', 'Silahkan menghubugi bendahara untuk melakaukan pembayaran dan konfirmasi pembelian');
    }
    public function kouta(Request $request)
    {

        $access = 'IT@nh2021';
        $mikrotik = new mikrotik();
        $mikrotik->connect();
        $datamikrotiks = $mikrotik->comm('/ip/hotspot/user/print');

        if ($access == $request->token) {
            foreach (wifi::all() as $data) {
                if ($data['kouta'] > 0) {
                    $data['kouta'] = $data['kouta'] - 1;
                    $kouta = ['kouta' => $data['kouta']];
                    wifi::where('id', $data->id)->update($kouta);
                } else {
                    foreach ($datamikrotiks as $datamikrotik) {
                        if ($datamikrotik['name'] == $data['nis']) {
                            $mikrotik->disable($datamikrotik['.id']);
                        }
                    }
                }
            }
        }
        return redirect('/wifi');
    }
    public function view()
    {
        return view('tes');
    }
}
