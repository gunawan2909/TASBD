@extends('dashboard.pembayaran.index')
@section('pembayaran')
    @foreach ($datarequest as $data)
        {{-- @dd($data) --}}
        <div class="flex h-10 my-3">
            <img src="/src/Avatar.svg" class="rounded-full">
            <div class=" text-center mx-3">
                <h1>{{ $data->name }}</h1>
                <h1>{{ $data->nis }}</h1>
            </div>
            <div class="rounded-r-full bg-blue-600 py-1 px-4 text-lg font-bold mx-3">
                {{ $data->nama }}
            </div>
            <h1 class=" py-2 px-4 text-xl font-bold mx-3"> {{ $data->harga }}</h1>
            <form action="/pembayaran/{{ $data->id }}" method="post">
                @csrf
                <input name="jenis" type="hidden" value="{{ $data->jenis }}">
                <input name="nilai" type="hidden" value="{{ $data->nilai }}">
                <input name="nis" type="hidden" value="{{ $data->nis }}">
                <button type="submit"
                    class="inline-block px-6 py-2 border-2 border-green-500 text-green-500 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out mx-3">Konfirmasi</button>
            </form>
            <form action="/pembayaran/delete/{{ $data->id }}" method="post">
                @csrf
                <button type="submit"
                    class="inline-block px-6 py-2 border-2 border-red-600 text-red-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">Batal</button>
            </form>
        </div>
    @endforeach
@endsection
