@extends('dashboard.pembayaran.index')
@section('pembayaran')
    <form action="/gift" method="post" class="m-5">
        <div class="flex flex-col">
            <label for="kouta">Kouta yang ingin diberikan</label>

            <select name="kouta" class="w-32 border border-slate-700  p-1 rounded-sm my-2">
                @foreach ($paket as $item)
                    <option value="{{ $item->id }}">{{ $item->nilai }} hari</option>
                @endforeach

            </select>
        </div>
        @csrf

        <button type="submit" class="p-1 my-4 bg-blue-600 rounded">Submit</button>
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full">
                            <thead class="border-b">
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Action
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        NIS
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Nama
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Komplek
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datasantri as $data)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            <input type="checkbox" name="list[]" value="{{ $data->nis }}">
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $data->nis }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $data->name }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $data->komplek }}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
