@extends('dashboard.datasantri.index')
@section('datasantri')
    @if (session('sukses'))
        <div class="alert bg-green-100 rounded-lg py-5 px-6 mb-3 text-base text-green-700 inline-flex items-center w-full alert-dismissible fade show"
            role="alert">
            <strong class="mr-1">Selamat ! </strong> {{ session('sukses') }}
            <button type="button"
                class="btn-close box-content w-4 h-4 p-1 ml-auto text-yellow-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline"
                data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('hapus'))
        <div class="alert bg-red-100 rounded-lg py-5 px-6 mb-3 text-base text-red-700 inline-flex items-center w-full alert-dismissible fade show"
            role="alert">
            <strong class="mr-1">Selamat ! </strong> {{ session('hapus') }}
            <button type="button"
                class="btn-close box-content w-4 h-4 p-1 ml-auto text-yellow-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline"
                data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="mt-1">
        <div class="border-b-2 w-full h-fit pb-3 mt-3">
            <a href="/datasantri"
                class=" border-b-4 p-3 hover:border-sky-400 {{ $santri == 'all' ? 'border-sky-600' : 'border-stone-600' }} ">All</a>
            <a href="/datasantri?santri=kang"
                class=" border-b-4 p-3 hover:border-sky-400 {{ $santri == 'kang' ? 'border-sky-600' : 'border-stone-600' }} ">Putra</a>
            <a href="/datasantri?santri=mbak"
                class=" border-b-4 p-3 hover:border-sky-400 {{ $santri == 'mbak' ? 'border-sky-600' : 'border-stone-600' }} ">Putri</a>
        </div>
        <div class="flex flex-col">

            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full">
                            <thead class="border-b">
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                        No
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                        Action
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                        Nama
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                        NIS
                                    </th>

                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                        Kelas
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                        Tanggal Lahir
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                        Tempat Lahir
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                        Alamat
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                        Nama Ayah
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                        Nama Ibu
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                        No.HP
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                        No.Hp Wali
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                        Email
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datasantri as $data)
                                    <tr>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                            {{ $loop->iteration }}
                                        </th>
                                        <th scope="col"
                                            class="flex text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                            <form action="/datasantri/edit/{{ $data->nis }}" method="put">
                                                @csrf
                                                <button type="submit" class="bg-yellow-600 w-8 h-8 p-1 m-1 rounded-lg ">
                                                    <i data-feather="edit"
                                                        class=" stroke-yellow-300 hover:stroke-yellow-100 "></i>
                                                </button>
                                            </form>
                                            <form action="/datasantri/delete/{{ $data->nis }}" method="put">
                                                @csrf
                                                <button
                                                    onClick="return confirm('Apakah Anda benar ingin menghapus data {{ $data->nis }}?')"
                                                    type="submit" class="bg-red-600 w-8 h-8 p-1 m-1 rounded-lg ">
                                                    <i data-feather="trash-2"
                                                        class=" stroke-red-300 hover:stroke-red-100 "></i>
                                                </button>
                                            </form>


                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                            {{ $data->name }}
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                            {{ $data->nis }}
                                        </th>

                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                            {{ $data->Kelas->nama }}
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                            {{ $data->tanggal }}
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                            {{ $data->tempat }}
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                            {{ $data->alamat }}
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                            {{ $data->ayah }}
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                            {{ $data->ibu }}
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                            {{ $data->no }}
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                            {{ $data->nowali }}
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                                            {{ $data->email }}
                                        </th>

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
