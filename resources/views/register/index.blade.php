@extends('index')
@section('constrain')
    <div class="grid grid-cols-3 gap-0 h-screen">

        <div class="col-span-2">
            <div class="bg-sky-700 h-full w-full relative">
                <img src="src/bg.png" class="w-full h-full object-cover absolute mix-blend-overlay opacity-40">
                <div class="flex justify-center">
                    <img src="src/Panel atas.svg">
                </div>
                <div class="flex justify-center pt-20">
                    <img src="src/logo.svg">

                </div>

            </div>
        </div>
        <div class="relative">
            @if (session()->has('alert'))
                <div class=" absolute inset-x-0 top-2 alert mx-2 bg-red-300 rounded-lg py-5 px-6 mb-3 text-base text-red-700 inline-flex items-center w-full-2 alert-dismissible fade show"
                    role="alert">
                    <strong class="mr-1 text-center">Registrasi Gagal </strong> {{ session('alert') }}

                    <button type="button"
                        class="btn-close box-content w-4 h-4 p-1 ml-auto text-yellow-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline"
                        data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class=" bg-sky-700 w-fit rounded-r-full mt-4">
                <h1 class="text-justify text-white p-3 text-2xl pr-10">Selamat Datang</h1>
            </div>
            <div class="flex justify-center">

                <div class="flex flex-col w-80 mt-16   ">
                    <h1 class="text-center text-bold text-[#3B7FDE] text-3xl mb-10">Login your Account</h1>
                    <form action="/register" method="POST">
                        @csrf
                        <div class="flex flex-col">
                            <label class="text-[#3B7FDE]  mt-3">NIS</label>
                            <input value="{{ old('nis') }}" name="nis" type="text"
                                class="@error('nis') is-invalid @enderror border-b p-1  focus:oudline-none border-[#3B7FDE] focus:border-b-5 transition-colors text-center ">
                            @error('nis')
                                <label class="text-xs text-red-600">{{ $message }}</label>
                            @enderror
                            <label class="text-[#3B7FDE]  mt-3">Tanggal Lahir</label>
                            <input value="{{ old('tanggal') }}" name="tanggal" type="date"
                                class="@error('tanggal') is-invalid @enderror border-b p-1  focus:oudline-none border-[#3B7FDE] focus:border-b-5 transition-colors text-center ">
                            @error('tanggal')
                                <label class="text-xs text-red-600">{{ $message }}</label>
                            @enderror
                            <label class="text-[#3B7FDE]  mt-3">Password</label>
                            <input name="password" type="password"
                                class="@error('password') is-invalid @enderror border-b p-1  focus:oudline-none border-[#3B7FDE] focus:border-b-5 transition-colors text-center ">
                            @error('password')
                                <label class="text-xs text-red-600">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="flex justify-center mt-10">
                            <button class="bg-[#3B7FDE] rounded-full px-10 py-2 text-xl text-white m-auto">Submit</button>
                        </div>
                    </form>
                    <div class="flex justify-center">
                        <div class="text-lg mt-8">
                            Already registered with us?
                            <a href="/login" class="text-[#3B7FDE]  mt-4">Login</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endsection
