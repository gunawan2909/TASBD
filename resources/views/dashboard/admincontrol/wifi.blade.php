@extends('dashboard.admincontrol.index')
@section('admincontrol')
    <div class="mt-5">
        <div class="flex">
            <h1 class="text-2xl text-bold ">Paket Yang Tersedia</h1>
            <a href="/admin/paket/tambah" class=" ml-10 py-2 px-3 bg-sky-500 rounded text-emerald-50 hover:bg-sky-700">Tambah
                Paket</a>
        </div>

        <div class="grid grid-cols-4 gap-4">
            @foreach ($datapaket as $paket)
                <div class="flex">
                    <form action="/admin/paketdelete/{{ $paket->id }}" method="post" class="mt-5">
                        @csrf
                        <button onClick="return confirm('Apakah Anda benar ingin menghapus data {{ $paket->id }}?')"
                            type="submit" class="bg-red-600 w-8 h-8 p-1 m-1 rounded-lg ">
                            <i data-feather="trash-2" class=" stroke-red-300 hover:stroke-red-100 "></i>
                        </button>
                    </form>
                    <a type="submit" href="/admin/paket/edit/{{ $paket->id }}"
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
                    </a>
                </div>
            @endforeach


        </div>


    </div>
@endsection
