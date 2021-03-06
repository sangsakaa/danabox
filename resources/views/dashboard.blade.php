<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <div class=" grid grid-cols-1 px-6">
                <x-button target="_blank" href="https://github.com/kamona-wd/kui-laravel-breeze" variant="black"
                    class="justify-center max-w-xs gap-2">
                    <x-icons.github class="w-6 h-6" aria-hidden="true" />
                    <span>Star on Github</span>
                </x-button>
            </div>
        </div>
    </x-slot>
    <div class=" p-2 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="grid grid-cols-1 gap-2 sm:grid-cols-4 ">
            <div class=" bg-purple-600 rounded-md">
                <div class=" grid sm:grid-cols-2 grid-cols-2 ">
                    <div class=" px-4 grid grid-cols-1 text-white">
                        <div class="py-4 text-8xl">{{$user}}</div>
                    </div>
                    <div class=" px-4 sm:px-4 py-2 sm:py-2 ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="110 " height=" 110 " fill="currentColor"
                            class="bi bi-person-lines-fill text-white " viewBox="0 0 16 16">
                            <path
                                d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class=" bg-purple-600 rounded-md">
                <div class=" grid sm:grid-cols-1 grid-cols-1 ">
                    <div class=" px-2 grid grid-cols-1  sm:mt-10 text-white ">
                        <div class="text-2xl text-center sm:text-center sm:text-3xl ">
                            {{'Rp.'.number_format(($sp),0,',','.')}}
                        </div>
                        <span class=" fixed-bottom text-center">KAS SUMBANGAN PENDAPATAN</span>
                    </div>
                </div>
            </div>
            <div class=" bg-purple-600 rounded-md">
                <div class=" grid sm:grid-cols-1 grid-cols-1 ">
                    <div class=" px-2 grid grid-cols-1  sm:mt-10 text-white ">
                        <div class="text-2xl text-center sm:text-center sm:text-3xl ">
                            {{'Rp.'.number_format(($box),0,',','.')}}
                        </div>
                        <span class=" fixed-bottom text-center">KAS DANABOX</span>
                    </div>
                </div>
            </div>
            <div class=" bg-purple-600 rounded-md">
                <div class=" grid sm:grid-cols-1 grid-cols-1 ">
                    <div class=" px-2 grid grid-cols-1  sm:mt-10 text-white ">
                        <div class=" text-2xl text-center sm:text-center sm:text-3xl ">
                            {{'Rp.'.number_format((($box))+(($sp)),0,',','.')}}
                        </div>
                        <span class=" fixed-bottom text-center">KAS KECAMATAN</span>
                    </div>
                </div>
            </div>
        </div>

</x-app-layout>