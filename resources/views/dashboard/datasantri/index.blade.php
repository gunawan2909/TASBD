@extends('dashboard.index')
@section('dashboard')
    <div class="m-5">
        <h1 class="text-4xl text-bold">Data Santri</h1>
        <div class="border-b-2 w-full h-fit pb-3 mt-8">
            <a href="/datasantri"
                class=" border-b-4 p-3 hover:border-sky-400 {{ $panel == 'data' ? 'border-sky-600' : 'border-stone-600' }} ">Data
                Santri</a>
            <a href="/datasantri/tambah"
                class=" border-b-4 p-3 hover:border-sky-400 {{ $panel == 'tambah' ? 'border-sky-600' : 'border-stone-600' }} ">Tambah
                Santri</a>
        </div>
        @yield('datasantri')
    </div>
@endsection
