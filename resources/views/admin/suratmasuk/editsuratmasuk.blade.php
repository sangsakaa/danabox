<x-app-layout>
    <x-slot name="header">
        @section('title', ' | Surat Keluar' )
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard Edit Surat Keluar') }}
            </h2>

        </div>
    </x-slot>
    <div class=" bg-white p-2">
        <form action="/suratmasuk/{{$suratmasuk->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class=" grid sm:grid-cols-2 grid-cols-1  gap-2 capitalize">
                <input type="date" name="tanggal_masuk" class="  border px-1 py-1 " title="Tanggal Surat masuk" required value="{{$suratmasuk->tanggal_masuk}}">
                <input type="date" name="tanggal_surat" class="  border px-1 py-1 " title="Tanggal Surat" required value="{{$suratmasuk->tanggal_surat}}">
                <input type="text" name="nomor_surat" class=" capitalize border px-1 py-1" placeholder="nomor surat" value="{{$suratmasuk->nomor_surat}}">
                <input type="text" name="pengirim" class=" capitalize border px-1 py-1" placeholder="pengirim / Asal Surat" value="{{$suratmasuk->pengirim}}">
                <input type="text" name="perihal" class=" capitalize border px-1 py-1" placeholder="perihal" value="{{$suratmasuk->perihal}}">
                <input type="text" name="ket" class=" capitalize border px-1 py-1" placeholder="keterangan" value="{{$suratmasuk->ket}}">
                <input type="file" name="file" id="">
                <button type=" submit" class=" bg-purple-600 text-white py-1 px-4"> Surat Keluar
                </button>
            </div>
        </form>
        <div class=" mt-2 w-full">
            <iframe width="100%" height="1000px" src="{{ asset('storage/' . $suratmasuk->file)}}" frameborder="0"></iframe>
        </div>
    </div>

</x-app-layout>