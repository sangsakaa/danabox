<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <div class=" grid grid-cols-1 px-6">
                <x-button target="_blank" href="https://github.com/kamona-wd/kui-laravel-breeze" variant="black" class="justify-center max-w-xs gap-2">
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
                        <div class="py-4 ">
                            <span class=" text-sm">Surat Masuk</span>
                            <p>{{$surat_masuk}}</p>
                        </div>
                    </div>
                    <div class=" px-4 sm:px-4 py-2 sm:py-2 mt-2 text-white text-right grid justify-items-end ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 9v.906a2.25 2.25 0 01-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 001.183 1.981l6.478 3.488m8.839 2.51l-4.66-2.51m0 0l-1.023-.55a2.25 2.25 0 00-2.134 0l-1.022.55m0 0l-4.661 2.51m16.5 1.615a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V8.844a2.25 2.25 0 011.183-1.98l7.5-4.04a2.25 2.25 0 012.134 0l7.5 4.04a2.25 2.25 0 011.183 1.98V19.5z" />
                        </svg>

                    </div>
                </div>
            </div>
            <div class=" bg-purple-600 rounded-md">
                <div class=" grid sm:grid-cols-2 grid-cols-2 ">
                    <div class=" px-4 grid grid-cols-1 text-white">
                        <div class="py-4 ">
                            <span class=" text-sm">Surat Keluar</span>
                            <p>{{$surat_keluar}}</p>
                        </div>
                    </div>
                    <div class=" px-4 sm:px-4 py-2 sm:py-2 mt-2 text-white text-right grid justify-items-end ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 9v.906a2.25 2.25 0 01-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 001.183 1.981l6.478 3.488m8.839 2.51l-4.66-2.51m0 0l-1.023-.55a2.25 2.25 0 00-2.134 0l-1.022.55m0 0l-4.661 2.51m16.5 1.615a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V8.844a2.25 2.25 0 011.183-1.98l7.5-4.04a2.25 2.25 0 012.134 0l7.5 4.04a2.25 2.25 0 011.183 1.98V19.5z" />
                        </svg>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>