@extends('dashboard.index')
@section('dashboard')
    <div class="m-5">
        <h1 class="text-4xl text-bold">WiFi</h1>
        <div class="border-b-2 w-full h-fit pb-3 mt-8">
            <a href="/home"
                class=" border-b-4 p-3 hover:border-sky-400 {{ $panel === 'status' ? ' border-sky-600' : ' border-stone-600' }} ">Status</a>
            <a href="/home/request"
                class=" border-b-4 p-3 hover:border-sky-400{{ $panel === 'req' ? ' border-sky-600' : ' border-stone-600' }} ">Request</a>
            <a href="/home/report"
                class=" border-b-4 p-3 hover:border-sky-400{{ $panel === 'report' ? ' border-sky-600' : ' border-stone-600' }}">Report</a>
        </div>
        @yield('home')
    @endsection
