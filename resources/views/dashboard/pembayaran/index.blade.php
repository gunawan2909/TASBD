@extends('dashboard.index')
@section('dashboard')
    <div class="m-5">
        <h1 class="text-4xl text-bold">WiFi</h1>
        <div class="border-b-2 w-full h-fit pb-3 mt-8">

            <a href="/pembayaran"
            class=" border-b-4 p-3 hover:border-sky-400{{ $panel === 'request' ? ' border-sky-600' : ' border-stone-600' }} ">Request</a>
            <a href="/pembayaran/gift"
                class=" border-b-4 p-3 hover:border-sky-400{{ $panel === 'gift' ? ' border-sky-600' : ' border-stone-600' }}">Gift</a>
            <a href="/pembayaran/report"
                class=" border-b-4 p-3 hover:border-sky-400{{ $panel === 'report' ? ' border-sky-600' : ' border-stone-600' }}">Report</a>
        </div>
        @yield('pembayaran')
    @endsection
