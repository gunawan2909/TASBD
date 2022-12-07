<?php

namespace App\Http\Controllers;

use App\Models\iptunel;
use App\Models\paketwifi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\all;

class admin extends Controller
{
    public function admin()
    {
        $datauser = DB::select('select * from users where nis = :nis', ['nis' => auth()->user()->nis]);
        $dataadmin = Db::select('select * from users where remote > :remote', ['remote' => 1]);
        return view('dashboard.admincontrol.admin', [
            'datauser' => $datauser,
            'dataadmin' => $dataadmin,
            'panel' => 'admin'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required'
        ]);
        $admin = ['remote' => $request->remote];
        $data = DB::select('select * from users');
        foreach ($data as $user) {
            if ($user->nis == $request->nis) {
                DB::update('update users set remote = :remote  where nis = :nis', [
                    'nis' => $request->nis,
                    'remote' => $request->remote
                ]);
                // User::where('nis', $request->nis)->update($admin);
                return redirect('/admin')->with('sukses', 'Remote Akses berhasil ditambahkan');
            }
        }
        return redirect('/admin')->with('gagal', 'NIS tidak Ditemukan');
    }
    public function delete($nis)
    {


        DB::update('update users set remote = :remote  where nis = :nis', [
            'nis' => $nis,
            'remote' => '1'
        ]);

        return redirect('/admin')->with('sukses', 'Remote Akses berhasil dihapus');
    }
    public function deletepaket($id)
    {
        DB::delete('delete from paketwifis where id = ?', [$id]);
        return redirect('/admin/paket')->with('sukses', 'Remote Akses berhasil dihapus');
    }

    public function paket()
    {
        $datauser = DB::select('select * from users where nis = :nis', ['nis' => auth()->user()->nis]);
        $datapaket = DB::select('select * from paketwifis ',);
        return view('dashboard.admincontrol.wifi', [
            'datauser' => $datauser,
            'datapaket' => $datapaket,
            'panel' => 'paket'
        ]);
    }
    public function paketadd()
    {
        return view('dashboard.admincontrol.wifitambah', [
            'datauser' => DB::select('select * from users where nis = :nis', ['nis' => auth()->user()->nis]),
            'panel' => 'paket'
        ]);
    }
    public function paketedit($id)
    {
        return view('dashboard.admincontrol.wifiedit', [
            'datauser' => DB::select('select * from users where nis = :nis', ['nis' => auth()->user()->nis]),
            'panel' => 'paket',
            'paket' => DB::select('select * from paketwifis where id = ?', [$id])[0]
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

        DB::insert('insert into paketwifis (nama, jenis,harga,nilai,foto) values (:nama, :jenis,:harga,:nilai,:foto)', [
            'nama' => $data['nama'],
            'jenis' => $data['jenis'],
            'harga' => $data['harga'],
            'nilai' => $data['nilai'],
            'foto' => $request->file('foto')->store('paket')

        ]);
        // paketwifi::create($data);
        return redirect('/admin/paket')->with('sukses', 'Paket Telah berhasil di tambahkan');
    }
    public function updatepaket(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'harga' => 'required|integer',
            'nilai' => 'required|integer',
        ]);
        if ($request->file('foto')) {
            $data['foto'] = $request->file('foto')->store('paket');
        } else {
            $data['foto'] = $request->fotolama;
        }
        DB::update('update paketwifis set nama= :nama, jenis=:jenis,harga=:harga,nilai=:nilai,foto=:foto where id = :id', [
            'nama' => $data['nama'],
            'jenis' => $data['jenis'],
            'harga' => $data['harga'],
            'nilai' => $data['nilai'],
            'foto' => $data['foto'],
            'id' => $request->id
        ]);
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
