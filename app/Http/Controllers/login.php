<?php

namespace App\Http\Controllers;

use App\Models\mikrotik;
use App\Models\User;
use App\Models\wifi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class login extends Controller
{
    public function index()
    {
        return view('login.index');
    }


    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'nis' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/home');
        }

        return back()->with(
            'error',
            'The provided credentials do not match our records.',
        );
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    public function register()
    {
        return view('register.index');
    }
    public function store(Request $request)
    {

        $datarequest = $request->validate([
            'nis' => 'required',
            'tanggal' => 'required',
            'password' => 'required'
        ]);

        foreach (User::all() as $data) {
            if ($datarequest['nis'] == $data['nis'] && $data['tanggal'] == $datarequest['tanggal']) {
                if ($data['password'] == 'sukses') {

                    $wifi = [
                        'nis' => $data['nis'],
                        'paket' => '1',
                        'kouta' => '10',
                        'touping' => '0'
                    ];
                    $pass = ['password' => bcrypt(request('password'))];

                    wifi::create($wifi);
                    User::where('nis', request('nis'))->update($pass);
                    $mikrotik = new mikrotik();
                    $mikrotik->connect();
                    $mikrotik->add(request('nis'), $data['name'], request('password'));
                    return redirect('/login')->with('alert', 'Sukses membuat Akun');
                } else {

                    return redirect('/register')->with('alert', 'NIS sudah Aktif');
                }
            }
        }
        return redirect('/register')->with('alert', 'Data Anda Salah');
    }
    public function Tgl($date)
    {

        $Bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
        $tahun      = substr($date, 0, 4);
        $bulan      = substr($date, 5, 2);
        $tgl     = substr($date, 8, 2);
        $result = $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun;
        return $result;
    }
}
