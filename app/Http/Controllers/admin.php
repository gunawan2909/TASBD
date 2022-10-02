<?php

namespace App\Http\Controllers;

use App\Models\iptunel;
use App\Models\paketwifi;
use App\Models\User;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class admin extends Controller
{
    public function admin()
    {
        return view('dashboard.admincontrol.admin', [
            'datauser' => User::where('nis', auth()->user()->nis)->get(),
            'dataadmin' => User::where('remote', '>', '1')->get(),
            'panel' => 'admin'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required'
        ]);
        $admin = ['remote' => $request->remote];
        $data = User::all();
        foreach ($data as $user) {
            if ($user->nis == $request->nis) {
                User::where('nis', $request->nis)->update($admin);
                return redirect('/admin')->with('sukses', 'Remote Akses berhasil ditambahkan');
            }
        }
        return redirect('/admin')->with('gagal', 'NIS tidak Ditemukan');
    }
    public function delete($nis)
    {

        $admin = ['remote' => '1'];
        User::where('nis', $nis)->update($admin);
        return redirect('/admin')->with('sukses', 'Remote Akses berhasil dihapus');
    }

    public function paket()
    {
        return view('dashboard.admincontrol.wifi', [
            'datauser' => User::where('nis', auth()->user()->nis)->get(),
            'datapaket' => paketwifi::all(),
            'panel' => 'paket'
        ]);
    }
    public function paketadd()
    {
        return view('dashboard.admincontrol.wifitambah', [
            'datauser' => User::where('nis', auth()->user()->nis)->get(),
            'panel' => 'paket'
        ]);
    }
    public function paketedit($id)
    {
        return view('dashboard.admincontrol.wifiedit', [
            'datauser' => User::where('nis', auth()->user()->nis)->get(),
            'panel' => 'paket',
            'paket' => paketwifi::where('id', $id)->get()[0]
        ]);
    }
    public function storepaket(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'harga' => 'required|integer',
            'nilai' => 'required|integer',
            'foto' => 'required|image|max:5024',

        ]);
        if ($request->file('foto')) {
            $data['foto'] = $request->file('foto')->store('paket');
        }
        paketwifi::create($data);
        return redirect('/admin/paket')->with('sukses', 'Paket Telah berhasil di tambahkan');
    }
    public function updatepaket(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'harga' => 'required|integer',
            'nilai' => 'required|integer',
            'foto' => 'required|image|max:5024',

        ]);
        if ($request->file('foto')) {
            $data['foto'] = $request->file('foto')->store('paket');
        }
        paketwifi::create($data);
        return redirect('/admin/paket')->with('sukses', 'Paket Telah berhasil di tambahkan');
    }

    public function indexip()
    {
        return view('dashboard.admincontrol.ip', [
            'datauser' => User::where('nis', auth()->user()->nis)->get(),
            'panel' => 'ip',
            'ip' => iptunel::all()
        ]);
    }

    public function updateip(Request $request)
    {
        $data = $request->validate([
            'ip' => 'required',
            'port' => 'required',
            'user' => 'required',
            'password' => 'required'
        ]);

        iptunel::where('id', 1)->update($data);
        return redirect('/admin/ip')->with('sukses', 'IP Telah berhasil di ganti');
    }
}
