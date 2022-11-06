<x-app-layout>
    <x-slot name="header">
        @section('title', ' | Surat Keluar' )
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard Edit Surat Keluar') }}
            </h2>

        </div>
    </x-slot>

    <form action="/suratkeluar/{{$suratkeluar->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class=" grid sm:grid-cols-2 grid-cols-1  gap-2 capitalize">
            <input type="date" name="tanggal_keluar" class="  border px-1 py-1 " title="Tanggal Surat Keluar" required value="{{$suratkeluar->tanggal_keluar}}">
            <input type="text" name="nomor_surat" class=" capitalize border px-1 py-1" placeholder="nomor surat" value="{{$suratkeluar->nomor_surat}}">
            <input type="text" name="tujuan" class=" capitalize border px-1 py-1" placeholder="tujuan" value="{{$suratkeluar->tujuan}}">
            <input type="text" name="uraian" class=" capitalize border px-1 py-1" placeholder="uraian" value="{{$suratkeluar->uraian}}">
            <input type="text" name="perihal" class=" capitalize border px-1 py-1" placeholder="perihal" value="{{$suratkeluar->perihal}}">

            <input type="file" name="old_file" id="">

            <input type="hidden" name="file" id="" value="{{$suratkeluar->file}}">

            <button type=" submit" class=" bg-purple-600 text-white py-1 px-4"> Update Surat
            </button>

        </div>

    </form>
    </div>

</x-app-layout>