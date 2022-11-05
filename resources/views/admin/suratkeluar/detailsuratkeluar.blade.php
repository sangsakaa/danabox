<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('View File') }}
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
        <div class=" grid grid-cols-2">
            <div>Tanggal Surat Keluar</div>
            <div> : {{$suratkeluar->tanggal_keluar}}</div>
            <div>Tujuan Surat</div>
            <div> : {{$suratkeluar->tujuan}}</div>
        </div>
    </div>
    <div class=" mt-1 p-2 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <iframe height="1000px" width="100%" src="/assets/{{$suratkeluar->file}}" frameborder="0">file</iframe>
    </div>

</x-app-layout>