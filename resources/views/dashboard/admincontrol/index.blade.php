@extends('dashboard.index')
@section('dashboard')
    <div class="m-5">
        <h1 class="text-4xl text-bold">WiFi</h1>
        <div class="border-b-2 w-full h-fit pb-3 mt-8">
            <a href="/admin"
                class=" border-b-4 p-3 hover:border-sky-400 
                {{ $panel === 'admin' ? ' border-sky-600' : ' border-stone-600' }}
                ">Admin</a>
            <a href="/admin/paket"
                class=" border-b-4 p-3 hover:border-sky-400 
                {{ $panel === 'paket' ? ' border-sky-600' : ' border-stone-600' }}
                ">Paket
                Wifi</a>

        </div>
        @yield('admincontrol')
    @endsection
