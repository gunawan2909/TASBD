@extends('index')
@section('constrain')
    <div class="flex h-screen  min-h-full">
        @include('dashboard.navbar')
        <div class="flex flex-col w-full">
            <div class="flex border-b-4 p-3 justify-end h-15 w-full">
                <div class="flex mr-5">
                    @if ($datauser[0]->nis < 2000000)
                        <h1 class=" text-slate-400 text-lg">Halo kang {{ ucwords(strtolower($datauser[0]->name)) }}</h1>
                    @else
                        <h1 class=" text-slate-400 text-lg">Halo Mbak {{ ucwords(strtolower($datauser[0]->name)) }}</h1>
                    @endif
                    @include('dashboard.droupdown')

                </div>
            </div>
            @yield('dashboard')
        </div>
    </div>
@endsection
