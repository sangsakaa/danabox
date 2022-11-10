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
        <form action="/suratkeluar/{{$suratkeluar->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class=" grid sm:grid-cols-2 grid-cols-1  gap-2 capitalize">
                <div class=" grid grid-cols-2 gap-2">
                    <label>Tanggal Surat Keluar</label>
                    <div> <input type="date" name="tanggal_keluar" class=" w-full  border text-sm px-1 py-1 " title="Tanggal Surat Keluar" required value="{{$suratkeluar->tanggal_keluar}}"></div>
                    <label for="">Nomor Surat</label>
                    <div> <input type="text" name="nomor_surat" class=" w-full capitalize border text-sm px-1 py-1" placeholder="nomor surat" value="{{$suratkeluar->nomor_surat}}"></div>
                    <label for="">Tujuan</label>
                    <input type="text" name="tujuan" class=" capitalize border text-sm px-1 py-1" placeholder="tujuan" value="{{$suratkeluar->tujuan}}">
                </div>
                <div class=" grid grid-cols-2 gap-2">
                    <label for="">uraian</label>
                    <input type="text" name="uraian" class=" capitalize border text-sm px-1 py-1" placeholder="uraian" value="{{$suratkeluar->uraian}}">
                    <label for="">perihal</label>
                    <input type="text" name="perihal" class=" capitalize border text-sm px-1 py-1" placeholder="perihal" value="{{$suratkeluar->perihal}}">
                    <input type="file" name="file" id="" class=" text-sm">
                    <button type=" submit" class=" bg-purple-600 text-white py-1 px-4"> Update Surat Keluar
                    </button>
                </div>
            </div>
        </form>
        <div class=" mt-2 w-full">
            <iframe width="100%" height="1000px" src="{{ asset('storage/' . $suratkeluar->file)}}" frameborder="0"></iframe>
        </div>
    </div>

</x-app-layout>