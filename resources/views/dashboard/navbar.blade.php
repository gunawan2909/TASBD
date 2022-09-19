<div class="flex flex-col w-28 bg-[#142467] min-h-full h-screen pt-5">
    <a href="/home" class="flex flex-col mt-4 group">
        <div class="flex justify-center">
            <i class=" stroke-[#668FFF]  group-hover:stroke-white" data-feather="home"></i>
        </div>
        <h2 class="text-[#668FFF] text-center text-bold group-hover:text-white">Home</h2>
    </a>
    @if ($datauser[0]['remote'] > 1)
        <a href="/pembayaran" class="flex flex-col mt-4 group">
            <div class="flex justify-center">
                <i class=" stroke-[#668FFF]  group-hover:stroke-white" data-feather="shopping-cart"></i>
            </div>
            <h2 class="text-[#668FFF] text-center text-bold group-hover:text-white">Pembayaran</h2>
        </a>
        <a href="/datasantri" class="flex flex-col mt-4 group">
            <div class="flex justify-center">
                <i class=" stroke-[#668FFF] group-hover:stroke-white" data-feather="hard-drive"></i>
            </div>
            <h2 class="text-[#668FFF] text-center text-bold group-hover:text-white">Data Santri</h2>
        </a>
        <a href="/admin" class="flex flex-col mt-4 group">
            <div class="flex justify-center">
                <i class=" stroke-[#668FFF] group-hover:stroke-white" data-feather="terminal"></i>
            </div>
            <h2 class="text-[#668FFF] text-center text-bold group-hover:text-white">Admin</h2>
        </a>
    @endif
    <a href="/datasantri/editAccount/{{ $datauser[0]['nis'] }}" class="flex flex-col mt-4 group">
        <div class="flex justify-center">
            <i class=" stroke-[#668FFF] group-hover:stroke-white" data-feather="user"></i>
        </div>
        <h2 class="text-[#668FFF] text-center text-bold group-hover:text-white">Account</h2>
    </a>
</div>
