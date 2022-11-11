<x-app-layout>
  <x-slot name="header">
    @section('title', ' | Instansi' )
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
      <h2 class="text-xl font-semibold leading-tight">
        {{ __('Dashboard Edit Instansi') }}
      </h2>
    </div>
  </x-slot>
  <div class=" grid grid-cols-1 p-2">
    <div class=" bg-white p-2">
      <form action="/instansi/{{$instansi->id}}" method="post">
        @csrf
        @method('patch')
        <div class=" grid grid-cols-2 gap-2">
          <div class=" grid grid-cols-1">
            <label for="">Nama Instansi</label>
            <input type="text" name="nama_instansi" class=" border py-1" placeholder="nama_instansi" value="{{$instansi->nama_instansi}}">
            <label for="">Nama Instansi</label>
            <input type="text" name="nama_kepala_instansi" class=" border py-1" placeholder="nama_kepala_instansi" value="{{$instansi->nama_kepala_instansi}}">
            <label for="">Status Kepala Instansi</label>
            <input type="text" name="status_kepala_instansi" class=" border py-1" placeholder="status_kepala_instansi" value="{{$instansi->status_kepala_instansi}}">
          </div>
          <div class=" grid grid-cols-1">
            <label for="">File Uploud</label>
            <input type="file" name="logo_instansi" class="  py-1" placeholder="logo_instansi" value="{{$instansi->status_kepala_instansi}}">
            <label for="">Alamat Instansi</label>
            <input type="text" name="alamat_instansi" class=" border py-1" placeholder="alamat_instansi" value="{{$instansi->alamat_instansi}}">
            <label for="">Email Instansi</label>
            <input type="text" name="email_instansi" class=" border py-1" placeholder="email_instansi" value="{{$instansi->email_instansi}}">
          </div>
          <button class=" bg-purple-600 py-1 text-white">Update</button>
        </div>
      </form>

    </div>
  </div>
</x-app-layout>