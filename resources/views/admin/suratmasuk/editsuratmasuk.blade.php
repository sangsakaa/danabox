<x-app-layout>
    <x-slot name="header">
        @section('title', ' | Surat Masuk' )
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard Edit Surat Masuk') }}
            </h2>

        </div>
    </x-slot>
    <div class=" bg-white p-2">
        <form action="/suratmasuk/{{$suratmasuk->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class=" grid sm:grid-cols-2 grid-cols-1  gap-2 capitalize">
                <div class=" w-full grid grid-cols-2 gap-2">
                    <label>Tanggal Surat Masuk</label>
                    <input type="date" name="tanggal_masuk" class="  border text-sm px-1 py-1 " title="Tanggal Surat masuk" required value="{{$suratmasuk->tanggal_masuk}}">
                    <label>Tanggal Surat</label>
                    <input type="date" name="tanggal_surat" class="  border text-sm px-1 py-1 " title="Tanggal Surat" required value="{{$suratmasuk->tanggal_surat}}">
                    <label for="">Nomor Surat</label>
                    <input type="text" name="nomor_surat" class=" capitalize border text-sm px-1 py-1" placeholder="nomor surat" value="{{$suratmasuk->nomor_surat}}">
                    <label for="">Pengirim</label>
                    <input type="text" name="pengirim" class=" capitalize border text-sm px-1 py-1" placeholder="pengirim / Asal Surat" value="{{$suratmasuk->id}}">
                </div>
                <div class=" w-full grid grid-cols-2 gap-2">
                    <label for="">Perihal</label>
                    <input type="text" name="perihal" class=" capitalize border text-sm px-1 py-1" placeholder="perihal" value="{{$suratmasuk->perihal}}">
                    <label for="">Keterangan</label>
                    <input type="text" name="ket" class=" capitalize border text-sm px-1 py-1" placeholder="keterangan" value="{{$suratmasuk->ket}}">
                    <label for="">Uploud File</label>
                    <input type="file" name="file" id="" class=" text-sm ">
                    <button type=" submit" class=" bg-purple-600 text-white py-1 px-4"> Update
                    </button>
                </div>
            </div>
    </div>
    </form>
    <div class=" mt-2 w-full">
        <iframe width="100%" height="1000px" src="{{ asset('storage/' . $suratmasuk->file)}}" frameborder="0"></iframe>
    </div>
    </div>

</x-app-layout>