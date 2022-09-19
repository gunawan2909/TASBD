@extends('dashboard.datasantri.index')
@section('datasantri')
    <form action="/datasantri" method="post" class="mt-3">
        @csrf

        <h1 class="text-xl ">Edit Data Santri</h1>
        <div class="flex flex-col m-2">
            <div class="flex ">
                <div class="mb-3 mr-10 xl:w-96 ">
                    <label for="name">Nama</label>
                    <input value="{{ old('name') }}" name="name" type="text"
                        class="@error('name') is-invalid @enderror mt-1 form-control block w-full px-3 py-1.5 text-base font-normal  text-gray-700  bg-white bg-clip-padding  border border-solid border-gray-300  rounded  transition  ease-in-out    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="exampleText0" placeholder="Nama" />
                    @error('name')
                        <label class=" text-xs text-red-600">{{ $message }}</label>
                    @enderror

                </div>
                <div class="mb-3 mr-10 xl:w-96 ">
                    <label for="nis">NIS</label>
                    <input value="{{ old('nis') }}" name="nis" type="text"
                        class="@error('nis') is-invalid @enderror mt-1 form-control block w-full px-3 py-1.5 text-base font-normal  text-gray-700  bg-white bg-clip-padding  border border-solid border-gray-300  rounded  transition  ease-in-out    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="exampleText0" placeholder="NIS" />
                    @error('nis')
                        <label class=" text-xs text-red-600">{{ $message }}</label>
                    @enderror

                </div>

            </div>
            <div class="flex ">
                <div class="mb-3 mr-10 xl:w-96">
                    <label for="komplek">Komplek</label>
                    <select name="komplek"
                        class="mt-1 form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        aria-label="Default select example">
                        <option value="1">Al Firdaus</option>
                        <option value="2">Al Barakah</option>
                        <option value="3">Darussalamah</option>
                    </select>
                </div>
                <div class="mb-3 xl:w-96">
                    <label for="kelas">Kelas</label>
                    <select name="kelas"
                        class="mt-1 form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        aria-label="Default select example">
                        <option {{ old('kelas') == 1 ? 'selected' : '' }} value="1">Ibtida'</option>
                        <option {{ old('kelas') == 2 ? 'selected' : '' }} value="2">Awaliyah</option>
                        <option {{ old('kelas') == 3 ? 'selected' : '' }} value="3">Wustho</option>
                        <option {{ old('kelas') == 4 ? 'selected' : '' }} value="4">Aliyah</option>
                        <option {{ old('kelas') == 5 ? 'selected' : '' }} value="5">Takhasus</option>
                    </select>
                </div>
            </div>
            <div class="flex ">

                <div class="mb-3 mr-10 xl:w-96 ">
                    <label for="tempat">Tempat Lahir</label>
                    <input value="{{ old('tempat') }}" name="tempat" type="text"
                        class="@error('tempat') is-invalid @enderror mt-1 form-control block w-full px-3 py-1.5 text-base font-normal  text-gray-700  bg-white bg-clip-padding  border border-solid border-gray-300  rounded  transition  ease-in-out    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="exampleText0" placeholder="Tempat lahir" />
                    @error('tempat')
                        <label class=" text-xs text-red-600">{{ $message }}</label>
                    @enderror

                </div>
                <div class="mb-3 mr-10 xl:w-96 ">
                    <label for="tanggal">Tanggal Lahir</label>
                    <input value="{{ old('tanggal') }}" name="tanggal" type="date"
                        class="@error('tanggal') is-invalid @enderror mt-1 form-control block w-full px-3 py-1.5 text-base font-normal  text-gray-700  bg-white bg-clip-padding  border border-solid border-gray-300  rounded  transition  ease-in-out    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="exampleText0" placeholder="tanggal" />
                    @error('tanggal')
                        <label class=" text-xs text-red-600">{{ $message }}</label>
                    @enderror

                </div>
            </div>
            <div class="flex ">

                <div class="mb-3 mr-10 xl:w-96 ">
                    <label for="email">Email</label>
                    <input value="{{ old('email') }}" name="email" type="email"
                        class="@error('email') is-invalid @enderror mt-1 form-control block w-full px-3 py-1.5 text-base font-normal  text-gray-700  bg-white bg-clip-padding  border border-solid border-gray-300  rounded  transition  ease-in-out    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="exampleText0" placeholder="email@dns.com" />
                    @error('email')
                        <label class=" text-xs text-red-600">{{ $message }}</label>
                    @enderror

                </div>
                <div class="mb-3 mr-10 xl:w-96 ">
                    <label for="alamat">Alamat</label>
                    <input value="{{ old('alamat') }}" name="alamat" type="text"
                        class="@error('alamat') is-invalid @enderror mt-1 form-control block w-full px-3 py-1.5 text-base font-normal  text-gray-700  bg-white bg-clip-padding  border border-solid border-gray-300  rounded  transition  ease-in-out    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="exampleText0" placeholder="Alamat" />
                    @error('alamat')
                        <label class=" text-xs text-red-600">{{ $message }}</label>
                    @enderror

                </div>
            </div>
            <div class="flex ">

                <div class="mb-3 mr-10 xl:w-96 ">
                    <label for="ayah">Nama Ayah</label>
                    <input value="{{ old('ayah') }}" name="ayah" type="text"
                        class="@error('ayah') is-invalid @enderror mt-1 form-control block w-full px-3 py-1.5 text-base font-normal  text-gray-700  bg-white bg-clip-padding  border border-solid border-gray-300  rounded  transition  ease-in-out    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="exampleText0" placeholder="ayah" />
                    @error('ayah')
                        <label class=" text-xs text-red-600">{{ $message }}</label>
                    @enderror

                </div>
                <div class="mb-3 mr-10 xl:w-96 ">
                    <label for="ibu">Nama Ibu</label>
                    <input value="{{ old('ibu') }}" name="ibu" type="text"
                        class="@error('ibu') is-invalid @enderror mt-1 form-control block w-full px-3 py-1.5 text-base font-normal  text-gray-700  bg-white bg-clip-padding  border border-solid border-gray-300  rounded  transition  ease-in-out    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="exampleText0" placeholder="Ibu" />
                    @error('ibu')
                        <label class=" text-xs text-red-600">{{ $message }}</label>
                    @enderror

                </div>
            </div>
            <div class="flex ">

                <div class="mb-3 mr-10 xl:w-96 ">
                    <label for="no">No./Wa</label>
                    <input value="{{ old('no') }}" name="no" type="text"
                        class="@error('no')is-invalid @enderror mt-1 form-control block w-full px-3 py-1.5 text-base font-normal  text-gray-700  bg-white bg-clip-padding  border border-solid border-gray-300  rounded  transition  ease-in-out    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="exampleText0" placeholder="08xxxxxxxxxx" />
                    @error('no')
                        <label class=" text-xs text-red-600">{{ $message }}</label>
                    @enderror

                </div>
                <div class="mb-3 mr-10 xl:w-96 ">
                    <label for="nowali">No./Wa Wali</label>
                    <input value="{{ old('nowali') }}" name="nowali" type="text"
                        class="@error('nowali')is-invalid @enderror mt-1 form-control block w-full px-3 py-1.5 text-base font-normal  text-gray-700  bg-white bg-clip-padding  border border-solid border-gray-300  rounded  transition  ease-in-out    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="exampleText0" placeholder="08xxxxxxxxxx" />
                    @error('nowali')
                        <label class=" text-xs text-red-600">{{ $message }}</label>
                    @enderror

                </div>

            </div>
        </div>
        <button type="submit"
            class=" px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Submit</button>

    </form>
@endsection
