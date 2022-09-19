@extends('dashboard.home.index')
@section('home')
    <div class="mt-5">
        <h1 class="text-2xl text-bold ">Paket Yang Tersedia</h1>
        <div class="grid grid-cols-4 gap-4">
            @foreach ($datapaket as $paket)
                <form class="flex" action="/home/request/{{ $paket->id }}" method="POST">
                    @csrf
                    <input name="nis" type="hidden" value="{{ $datauser[0]->nis }}">
                    <button type="submit"
                        class="block rounded-lg shadow-lg bg-white max-w-sm text-center hover:bg-slate-200">
                        <div class=" bg-sky-700 w-fit rounded-r-full mt-4">
                            <h1 class="text-justify text-white p-2 text-xl pr-10">{{ $paket->nama }}</h1>
                        </div>
                        <div class="flex mx-3 mt-4">
                            <div class="flex flex-col text-left p-3">
                                <h1 class="text-2xl text-[#00BCF1]  font-bold mb-2">{{ $paket->nilai }} hari</h1>
                                <h1 class="text-xl text-[#000000]  font-bold ">
                                    Rp. {{ number_format($paket->harga, 0, '.', '.') }}</h1>
                            </div>
                            <div class="relative h-full m-3 ml-5">
                                <img src="{{ asset('storage/' . $paket->foto) }}" class="w-24">
                                <div class="flex space-x-2 justify-center absolute bottom-3 right-1">

                                </div>
                            </div>
                        </div>
                    </button>
                </form>
            @endforeach


        </div>

    </div>
@endsection
