@extends('dashboard.admincontrol.index')
@section('admincontrol')
    <form action="/admin/updatepaket" method="post" class="mt-3" enctype="multipart/form-data">
        @csrf
        <h1 class="text-xl ">Tambah Paket</h1>
        <div class="flex flex-col m-2">
            <div class="flex ">
                <input type="hidden" name="jenis" value="1">
                <input type="hidden" name="fotolama" value="{{ $paket->foto }}">
                <input type="hidden" name="id" value="{{ $paket->id }}">
                <div class="mb-3 mr-10 xl:w-96 ">
                    <label for="nama">Nama Paket</label>
                    <input value="{{ old('nama', $paket->nama) }}" name="nama" type="text"
                        class="@error('nama') is-invalid @enderror mt-1 form-control block w-full px-3 py-1.5 text-base font-normal  text-gray-700  bg-white bg-clip-padding  border border-solid border-gray-300  rounded  transition  ease-in-out    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="exampleText0" placeholder="Nama" />
                    @error('nama')
                        <label class=" text-xs text-red-600">{{ $message }}</label>
                    @enderror

                </div>
                <div class="mb-3 mr-10 xl:w-96 ">
                    <label for="nilai">Kouta hari</label>
                    <input value="{{ old('nilai', $paket->nilai) }}" name="nilai" type="text"
                        class="@error('nilai') is-invalid @enderror mt-1 form-control block w-full px-3 py-1.5 text-base font-normal  text-gray-700  bg-white bg-clip-padding  border border-solid border-gray-300  rounded  transition  ease-in-out    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="exampleText0" placeholder="Kouta" />
                    @error('nilai')
                        <label class=" text-xs text-red-600">{{ $message }}</label>
                    @enderror


                </div>

            </div>

            <div class="flex ">

                <div class="mb-3 mr-10 xl:w-96 ">
                    <label for="harga">Harga</label>
                    <input value="{{ old('harga', $paket->harga) }}" name="harga" type="text"
                        class="@error('harga')is-invalid @enderror mt-1 form-control block w-full px-3 py-1.5 text-base font-normal  text-gray-700  bg-white bg-clip-padding  border border-solid border-gray-300  rounded  transition  ease-in-out    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="exampleText0" placeholder="nominal" />
                    @error('harga')
                        <label class=" text-xs text-red-600">{{ $message }}</label>
                    @enderror

                </div>
                <div class="mb-3 mr-10 xl:w-96 ">
                    <label for="formFile" class="form-label inline-block mb-2 text-gray-700">Gambar Paket</label>
                    <input name="foto"
                        class="form-control @error('foto')is-invalid @enderror block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        type="file" id="image" onchange="previewImage()">
                    @error('foto')
                        <label class=" text-xs text-red-600">{{ $message }}</label>
                    @enderror

                </div>
            </div>
            <div class="flex">
                @if ($paket->foto)
                    <img class="img-preview" src="{{ asset('storage/' . $paket->foto) }}"
                        style="display: block; width: 200px">
                @else
                    <img class="img-preview" style="display: block; width: 200px">
                @endif
            </div>
        </div>
        <button type="submit"
            class=" px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Submit</button>
        
    </form>
@endsection
