<x-app-layout>
    <x-slot name="header">
        @section('title', ' | Surat Keluar' )
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard Edit Surat Keluar') }}
            </h2>
            <div class=" grid grid-cols-1 px-6">
                <x-button target="_blank" href="https://github.com/kamona-wd/kui-laravel-breeze" variant="black" class="justify-center max-w-xs gap-2">
                    <x-icons.github class="w-6 h-6" aria-hidden="true" />
                    <span>Star on Github</span>
                </x-button>
            </div>
        </div>
    </x-slot>
    <div class="p-1 bg-white   shadow-md dark:bg-dark-eval-1">
        <form action="/suratkeluar" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class=" grid sm:grid-cols-2 grid-cols-1  gap-2 capitalize">

                <input type="date" name="tanggal_keluar" class="  border px-1 py-1 " title="Tanggal Surat Keluar" required value="{{$suratkeluar->tanggal_keluar}}">

                <input type="text" name="nomor_surat" class=" capitalize border px-1 py-1" placeholder="nomor surat" value="{{$suratkeluar->nomor_surat}}">
                <input type="text" name="tujuan" class=" capitalize border px-1 py-1" placeholder="tujuan" value="{{$suratkeluar->tujuan}}">
                <input type="text" name="uraian" class=" capitalize border px-1 py-1" placeholder="uraian" value="{{$suratkeluar->uraian}}">
                <input type="text" name="perihal" class=" capitalize border px-1 py-1" placeholder="perihal" value="{{$suratkeluar->perihal}}">
                <input type="file" name="file" id="" value="{{$suratkeluar->file}}">

                <button type=" submit" class=" bg-purple-600 text-white py-1 px-4"> Update Surat
                </button>

            </div>

        </form>
    </div>
</x-app-layout>