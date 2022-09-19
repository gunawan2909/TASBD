<div class="flex justify-center">
    <div>
        <div class="dropdown relative">
            <button
                class="
            dropdown-toggle
                 
            text-[#8692B0]
            text-bold
            text-lg
           
           
             hover:shadow-lg
            focus:shadow-lg focus:outline-none focus:ring-0
            active:shadow-lg active:text-white
            transition
            duration-150
            ease-in-out
            flex
            items-center
            whitespace-nowrap
          "
                type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class=" ml-5 stroke-slate-400" data-feather="user"></i>
            </button>
            <ul class="
            dropdown-menu
            min-w-max
            absolute
            hidden
            bg-white
            text-base
            z-50
            float-left
            py-2
            list-none
            text-left
            rounded-lg
            shadow-lg
            mt-1
            m-0
            bg-clip-padding
            border-none
          "
                aria-labelledby="dropdownMenuButton1">
                <li>
                    <a class="
                dropdown-item
                text-sm
                py-2
                px-4
                font-normal
                block
                w-full
                whitespace-nowrap
                bg-transparent
                text-gray-700
                hover:bg-gray-100
              "
                        href="#">Setting Account</a>
                </li>
                <li>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit"
                            class="dropdown-item
                        text-sm
                        py-2
                        px-4
                        font-normal
                        block
                        w-full
                        whitespace-nowrap
                        bg-transparent
                        text-gray-700
                        hover:bg-gray-100
                      ">
                            log Out
                        </button>
                    </form>

                </li>

            </ul>
        </div>
    </div>
</div>
