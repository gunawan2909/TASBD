@extends('dashboard.admincontrol.index')
@section('admincontrol')
    <form action="/admin/ip" method="post" class="mt-3">
        @if (session('sukses'))
            <div class="alert bg-green-100 rounded-lg py-5 px-6 mb-3 text-base text-green-700 inline-flex items-center w-full alert-dismissible fade show"
                role="alert">
                <strong class="mr-1">Selamat ! </strong> {{ session('sukses') }}
                <button type="button"
                    class="btn-close box-content w-4 h-4 p-1 ml-auto text-yellow-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline"
                    data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @csrf
        <h1 class="text-xl ">IP Tunel</h1>
        <div class="flex flex-col m-2">
            <div class="flex ">
                <div class="mb-3 mr-10 xl:w-96 ">
                    <label for="ip">IP</label>
                    <input value="{{ old('ip', $ip[0]->ip) }}" name="ip" type="text"
                        class="@error('ip') is-invalid @enderror mt-1 form-control block w-full px-3 py-1.5 text-base font-normal  text-gray-700  bg-white bg-clip-padding  border border-solid border-gray-300  rounded  transition  ease-in-out    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="exampleText0" placeholder="192.168.1.1" />
                    @error('ip')
                        <label class=" text-xs text-red-600">{{ $message }}</label>
                    @enderror

                </div>
                <div class="mb-3 mr-10 xl:w-96 ">
                    <label for="port">Port</label>
                    <input value="{{ old('port', $ip[0]->port) }}" name="port" type="text"
                        class="@error('port') is-invalid @enderror mt-1 form-control block w-full px-3 py-1.5 text-base font-normal  text-gray-700  bg-white bg-clip-padding  border border-solid border-gray-300  rounded  transition  ease-in-out    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="exampleText0" placeholder="Port" />
                    @error('port')
                        <label class=" text-xs text-red-600">{{ $message }}</label>
                    @enderror


                </div>

            </div>

            <div class="flex ">

                <div class="mb-3 mr-10 xl:w-96 ">
                    <label for="user">Username</label>
                    <input value="{{ old('user', $ip[0]->user) }}" name="user" type="text"
                        class="@error('user')is-invalid @enderror mt-1 form-control block w-full px-3 py-1.5 text-base font-normal  text-gray-700  bg-white bg-clip-padding  border border-solid border-gray-300  rounded  transition  ease-in-out    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="exampleText0" placeholder="nominal" />
                    @error('user')
                        <label class=" text-xs text-red-600">{{ $message }}</label>
                    @enderror

                </div>
                <div class="mb-3 mr-10 xl:w-96 ">
                    <label for="password">Password</label>
                    <input value="{{ old('password', $ip[0]->password) }}" name="password" type="text"
                        class="@error('password')is-invalid @enderror mt-1 form-control block w-full px-3 py-1.5 text-base font-normal  text-gray-700  bg-white bg-clip-padding  border border-solid border-gray-300  rounded  transition  ease-in-out    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="exampleText0" placeholder="password" />
                    @error('password')
                        <label class=" text-xs text-red-600">{{ $message }}</label>
                    @enderror

                </div>





            </div>
        </div>
        <button type="submit"
            class=" px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Submit</button>

    </form>
@endsection
