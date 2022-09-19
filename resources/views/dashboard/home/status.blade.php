@extends('dashboard.home.index')
@section('home')
    <div class="flex">
        <div>
            <div class="mt-5">
                <h1 class="text-2xl text-bold ">Paket Kamu</h1>
                <div class="flex">
                    <div class="block rounded-lg shadow-xl w-full text-center p-2 border-l border-r ">
                        <div class="flex">
                            <img class="w-14 mt-4 m-3"
                                src="https://th.bing.com/th/id/R.ecec5d822dbbcb176f1839fd42bd994d?rik=uj5SsR%2faGTIc%2bg&riu=http%3a%2f%2fcdn.onlinewebfonts.com%2fsvg%2fimg_24994.png&ehk=Dil1sZfhteYWE3i2uScLlq11eJSHPKIwfeNXCBRC3uA%3d&risl=&pid=ImgRaw&r=0">
                            <div class="flex flex-col w-full p-2">
                                <div class="flex">

                                    <h1 class="text-sm mr-auto">Sisa Hari</h1>
                                    <h1 class="text-sm font-bold"> {{ $datauser[0]->wifi->kouta }} / 30 Hari</h1>
                                </div>
                                <div class="w-full bg-gray-200 h-2 mb-6 mt-3">
                                    @if ($datauser[0]->wifi->kouta > 30)
                                        <div class="bg-blue-600 h-2" style="width:  100%">
                                        </div>
                                    @else
                                        <div class="bg-blue-600 h-2"
                                            style="width:  {{ ($datauser[0]->wifi->kouta / 30) * 100 }}%">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="mt-5">
                <h1 class="text-2xl text-bold ">Decive Yang Online</h1>
                <div class="flex">
                    <div class="block rounded-lg shadow-xl w-full text-center p-2 border-l border-r ">
                        @foreach ($datadevice as $data)
                            <div class="flex">
                                <form action="/home/{{ $data['.id'] }}" method="POST" class="flex space-x-2 items-center">
                                    @csrf

                                    <button type="submit"
                                        class="inline-block mr-3 p-2 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Hapus</button>
                                </form>
                                <h1 class=" text-center p-2"> <b>Mac</b> : {{ $data['mac-address'] }} <b
                                        class=" text-sky-500 fount-medium">|</b> <b>IP</b> :
                                    {{ $data['address'] }}
                                </h1>

                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>

        <div class="relative mt-5 mx-auto  w=-1/2">
            <img src="{{ asset('storage/' . $datauser[0]->wifi->paketwifi[0]->foto) }}"
                style="width: 200px; opacity: 0.5">
            <b class="absolute left-0 bottom-20 text-lg w-32">1 mbps up to 50 mbps</b>
            <div class="absolute right-0 bottom-10 rounded-r-full bg-blue-600 p-2">
                <b class="text-white">{{ $datauser[0]->wifi->paketwifi[0]->nama }}</b>
            </div>
        </div>
    </div>
@endsection
