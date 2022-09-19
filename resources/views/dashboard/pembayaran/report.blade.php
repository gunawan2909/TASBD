@extends('dashboard.pembayaran.index')
@section('pembayaran')
    <div class="mt-5">
        <div class="border-b-2 w-full h-fit pb-3">
            <a href="/pembayaran/report?bulan=01&santri={{ $santri }}"
                class=" border-b-4 p-3 hover:border-sky-400 {{ $bulan == '01' ? 'border-sky-600' : 'border-stone-600' }} ">Januari</a>
            <a href="/pembayaran/report?bulan=02&santri={{ $santri }}"
                class=" border-b-4 p-3 hover:border-sky-400 {{ $bulan == '02' ? 'border-sky-600' : 'border-stone-600' }} ">Februari</a>
            <a href="/pembayaran/report?bulan=03&santri={{ $santri }}"
                class=" border-b-4 p-3 hover:border-sky-400 {{ $bulan == '03' ? 'border-sky-600' : 'border-stone-600' }} ">Maret</a>
            <a href="/pembayaran/report?bulan=04&santri={{ $santri }}"
                class=" border-b-4 p-3 hover:border-sky-400 {{ $bulan == '04' ? 'border-sky-600' : 'border-stone-600' }} ">April</a>
            <a href="/pembayaran/report?bulan=05&santri={{ $santri }}"
                class=" border-b-4 p-3 hover:border-sky-400 {{ $bulan == '05' ? 'border-sky-600' : 'border-stone-600' }} ">Mei</a>
            <a href="/pembayaran/report?bulan=06&santri={{ $santri }}"
                class=" border-b-4 p-3 hover:border-sky-400 {{ $bulan == '06' ? 'border-sky-600' : 'border-stone-600' }} ">Juni</a>
            <a href="/pembayaran/report?bulan=07&santri={{ $santri }}"
                class=" border-b-4 p-3 hover:border-sky-400 {{ $bulan == '07' ? 'border-sky-600' : 'border-stone-600' }} ">Juli</a>
            <a href="/pembayaran/report?bulan=08&santri={{ $santri }}"
                class=" border-b-4 p-3 hover:border-sky-400 {{ $bulan == '08' ? 'border-sky-600' : 'border-stone-600' }} ">Agustus</a>
            <a href="/pembayaran/report?bulan=09&santri={{ $santri }}"
                class=" border-b-4 p-3 hover:border-sky-400 {{ $bulan == '09' ? 'border-sky-600' : 'border-stone-600' }} ">September</a>
            <a href="/pembayaran/report?bulan=10&santri={{ $santri }}"
                class=" border-b-4 p-3 hover:border-sky-400 {{ $bulan == '10' ? 'border-sky-600' : 'border-stone-600' }} ">Oktober</a>
            <a href="/pembayaran/report?bulan=11&santri={{ $santri }}"
                class=" border-b-4 p-3 hover:border-sky-400 {{ $bulan == '11' ? 'border-sky-600' : 'border-stone-600' }} ">November</a>
            <a href="/pembayaran/report?bulan=12&santri={{ $santri }}"
                class=" border-b-4 p-3 hover:border-sky-400 {{ $bulan == '12' ? 'border-sky-600' : 'border-stone-600' }} ">Desember</a>
        </div>
    </div>

    <div class="border-b-2 w-full h-fit pb-3 mt-1">
        <a href="/pembayaran/report?bulan={{ $bulan }}"
            class=" border-b-4 p-3 hover:border-sky-400 {{ $santri == 'all' ? 'border-sky-600' : 'border-stone-600' }} ">All</a>
        <a href="/pembayaran/report?santri=kang&bulan={{ $bulan }}"
            class=" border-b-4 p-3 hover:border-sky-400 {{ $santri == 'kang' ? 'border-sky-600' : 'border-stone-600' }}">Putra</a>
        <a href="/pembayaran/report?santri=mbak&bulan={{ $bulan }}"
            class=" border-b-4 p-3 hover:border-sky-400 {{ $santri == 'mbak' ? 'border-sky-600' : 'border-stone-600' }}">Putri</a>
    </div>
    <div class="border-b-2 w-full h-fit pb-3 mt-1">
        <a href="/pembayaran/report?bulan={{ $bulan }}"
            class=" border-b-4 p-3 hover:border-sky-400 {{ $admin == 'all' ? 'border-sky-600' : 'border-stone-600' }} ">All</a>
        @foreach ($dataadmin as $data)
            <a href="/pembayaran/report?santri={{ $santri }}&bulan={{ $bulan }}&admin={{ $data->nis }}"
                class=" border-b-4 p-3 hover:border-sky-400 {{ $admin == $data->nis ? 'border-sky-600' : 'border-stone-600' }}">{{ $data->name }}</a>
        @endforeach

    </div>

    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 inline-block w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="w-full">
                    <thead class="border-b">
                        <tr>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                No
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Nama
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Nis
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                No Hp/Wa
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Paket Yang Dibeli
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Tanggal Transaksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datareport as $data)
                            <tr class="border-b">
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    {{ $loop->iteration }}
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    {{ $data->user->name }}
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    {{ $data->user->nis }}
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Rp. {{ number_format($data->paketwifi->harga, 0, '.', '.') }}
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    {{ $data->paketwifi->nama }}

                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    {{ $data->created_at }}
                                </th>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
            @switch($bulan)
                @case('01')
                    <h1>Keuntungan Bulan Januari Rp. {{ number_format($keuntungan, 0, '.', '.') }}</h1>
                @break

                @case('02')
                    <h1>Keuntungan Bulan Februari Rp. {{ number_format($keuntungan, 0, '.', '.') }}</h1>
                @break

                @case('03')
                    <h1>Keuntungan Bulan Maret Rp. {{ number_format($keuntungan, 0, '.', '.') }}</h1>
                @break

                @case('04')
                    <h1>Keuntungan Bulan April Rp. {{ number_format($keuntungan, 0, '.', '.') }}</h1>
                @break

                @case('05')
                    <h1>Keuntungan Bulan Mei Rp. {{ number_format($keuntungan, 0, '.', '.') }}</h1>
                @break

                @case('06')
                    <h1>Keuntungan Bulan Juni Rp. {{ number_format($keuntungan, 0, '.', '.') }}</h1>
                @break

                @case('07')
                    <h1>Keuntungan Bulan Juli Rp. {{ number_format($keuntungan, 0, '.', '.') }}</h1>
                @break

                @case('08')
                    <h1>Keuntungan Bulan Agustus Rp. {{ number_format($keuntungan, 0, '.', '.') }}</h1>
                @break

                @case('09')
                    <h1>Keuntungan Bulan September Rp. {{ number_format($keuntungan, 0, '.', '.') }}</h1>
                @break

                @case('10')
                    <h1>Keuntungan Bulan Oktober Rp. {{ number_format($keuntungan, 0, '.', '.') }}</h1>
                @break

                @case('11')
                    <h1>Keuntungan Bulan November Rp. {{ number_format($keuntungan, 0, '.', '.') }}</h1>
                @break

                @case('12')
                    <h1>Keuntungan Bulan Desember Rp. {{ number_format($keuntungan, 0, '.', '.') }}</h1>
                @break

                @default
            @endswitch
        </div>
    </div>
@endsection
