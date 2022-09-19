<?php

namespace App\Http\Controllers;

use App\Models\mirotik;
use Illuminate\Http\Request;

class coba extends Controller
{

    public function index()
    {
        $mikrotik = new mirotik();
        $mikrotik->connect('6.6.6.2', 'IT', 'IT@nh2021');
        return view('coba', [
            'mikrotik' => $mikrotik->comm('/ip/hotspot/active/print')
        ]);
    }
}
