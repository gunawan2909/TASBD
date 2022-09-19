@extends('dashboard.home.index')
@section('home')
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 inline-block w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="w-fit">
                    <thead class="border-b">
                        <tr>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                No
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Tanggal
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Nama Paket
                            </th>

                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Status
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
                                    {{ $data->created_at }}
                                </th>

                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    {{ $data->paketwifi->nama }}
                                </th>


                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    {{ $data->status }}
                                </th>
                            </tr>
                        @endforeach





                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
