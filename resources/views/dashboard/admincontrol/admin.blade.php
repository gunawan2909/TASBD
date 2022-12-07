@extends('dashboard.admincontrol.index')
@section('admincontrol')

    <div class="mt-3">
        @if (session('sukses'))
            <div class="alert bg-green-100 rounded-lg py-5 px-6 mb-3 text-base text-green-700 inline-flex items-center w-full alert-dismissible fade show"
                role="alert">
                <strong class="mr-1">Selamat ! </strong> {{ session('sukses') }}
                <button type="button"
                    class="btn-close box-content w-4 h-4 p-1 ml-auto text-yellow-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline"
                    data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('gagal'))
            <div class="alert bg-red-100 rounded-lg py-5 px-6 mb-3 text-base text-red-700 inline-flex items-center w-full alert-dismissible fade show"
                role="alert">
                <strong class="mr-1">Selamat ! </strong> {{ session('gagal') }}
                <button type="button"
                    class="btn-close box-content w-4 h-4 p-1 ml-auto text-yellow-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline"
                    data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($datauser[0]->remote)
            <form action="/admin" method="post">
                @csrf
                <div class="flex">
                    <div class="mb-3 xl:w-96">
                        <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700">Tambahkan
                            Remote Access</label>
                        <input type="text" name="nis"
                            class=" form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                              "id="exampleFormControlInput1"
                            placeholder="NIS" />

                    </div>
                    <div class="mt-3 ml-5">
                        <div class="flex">
                            <div>
                                <div class="form-check">
                                    <input
                                        class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                        type="radio" name="remote" value="2" id="flexRadioDefault1" checked>
                                    <label class="form-check-label inline-block text-gray-800" for="flexRadioDefault1">
                                        Pengurus
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input
                                        class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                        type="radio" name="remote" value="3" id="flexRadioDefault2">
                                    <label class="form-check-label inline-block text-gray-800" for="flexRadioDefault2">
                                        Admin IT
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="flex space-x-2 mt-2">
                            <button type="submit"
                                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Tambahkan</button>
                        </div>
                    </div>
                </div>
            </form>
        @endif




        <h1>Data Admin </h1>
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full">
                            <thead class="border-b">
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        NO
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Delete
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Nama
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Komplek
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Remote Access
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataadmin as $data)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $loop->iteration }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            <form action="/admin/delete/{{ $data->nis }}" method="post">
                                                @csrf
                                                <button
                                                    onClick="return confirm('Apakah Anda benar ingin menghapus remote access {{ $data->nis }}?')"
                                                    type="submit" class="bg-red-600 w-8 h-8 p-1 m-1 rounded-lg ">
                                                    <i data-feather="trash-2"
                                                        class=" stroke-red-300 hover:stroke-red-100 "></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $data->name }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $data->komplek }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                                            @switch($data->remote)
                                                @case(2)
                                                    Pengurus
                                                @break

                                                @case(3)
                                                    Admin IT
                                                @break

                                                @default
                                            @endswitch
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
