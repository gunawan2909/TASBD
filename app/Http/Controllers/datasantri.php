<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class datasantri extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $santri = request(['santri'][0]) ?? 'all';
        return view('dashboard.datasantri.data', [
            'datasantri' => User::filter(request(['santri']))->get(),
            'datauser' => User::where('nis', auth()->user()->nis)->get(),
            'panel' => 'data',
            'santri' => $santri
        ]);
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.datasantri.input', [
            'datauser' => User::where('nis', auth()->user()->nis)->get(),
            'panel' => 'tambah',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $datauser = $request->validate([
            'name' => 'required',
            'komplek' => 'required',
            'kelas' => 'required',
            'tanggal' => 'required',
            'tempat' => 'required',
            'alamat' => 'required',
            'ayah' => 'required',
            'ibu' => 'required',
            'no' => 'required',
            'nowali' => 'required',
            'email' => 'required|email:dns',
            'nis' => 'required|unique:users',
        ]);
        $datauser['foto'] = '#';
        $datauser['tanggal'] = $datauser['tanggal'];
        $datauser['password'] = 'sukses';
        User::create($datauser);
        return redirect('/datasantri')->with('sukses', 'Data santri berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($nis)
    {

        return view('dashboard.datasantri.edit', [
            'datauser' => User::where('nis', auth()->user()->nis)->get(),
            'data' => User::where('nis', $nis)->get()[0],
            'panel' => ''

        ]);
    }
    public function editsantri($nis)
    {

        return view('dashboard.account.index', [
            'datauser' => User::where('nis', auth()->user()->nis)->get(),
            'data' => User::where('nis', $nis)->get()[0],
            'panel' => ''

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $datauser = $request->validate([
            'name' => 'required',
            'komplek' => 'required',
            'kelas' => 'required',
            'tanggal' => 'required',
            'tempat' => 'required',
            'alamat' => 'required',
            'ayah' => 'required',
            'ibu' => 'required',
            'no' => 'required',
            'nowali' => 'required',
            'email' => 'required|email:dns',
        ]);

        if ($request->nis != $user->nis) {
            $datauser = $request->validate([
                'nis' => 'required|unique:users',
            ]);
        }
        $datauser['foto'] = '#';
        User::where('id', $user->id)->update($datauser);
        if ($request->page == 'account') {
            return redirect('datasantri/editAccount/' . $user->nis)->with('sukses', 'Data santri berhasil diubah');
        }
        return redirect('/datasantri')->with('sukses', 'Data santri berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($nis)
    {
        User::destroy(User::where('nis', $nis)->get('id')[0]['id']);
        return redirect('/datasantri')->with('hapus', 'Data ' . $nis . ' Berhasil dihapus');
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
