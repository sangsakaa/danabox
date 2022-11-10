<x-app-layout>
  <x-slot name="header">
    @section('title', ' | Instansi' )
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
      <h2 class="text-xl font-semibold leading-tight">
        {{ __('Dashboard Instansi') }}
      </h2>
    </div>
  </x-slot>
  <div class=" grid grid-cols-1 p-2">
    <div class=" bg-white p-2">
      <form action="/instansi" method="post" enctype="multipart/form-data">
        @csrf
        <div class=" grid grid-cols-2 gap-2">
          <div class=" grid grid-cols-1">
            <label for="">Nama Instansi</label>
            <input type="text" name="nama_instansi" class=" border py-1" placeholder="nama_instansi">
            <label for="">Nama Instansi</label>
            <input type="text" name="nama_kepala_instansi" class=" border py-1" placeholder="nama_kepala_instansi">
            <label for="">Nama Instansi</label>
            <input type="text" name="status_kepala_instansi" class=" border py-1" placeholder="status_kepala_instansi">
          </div>
          <div class=" grid grid-cols-1">
            <label for="">File Uploud</label>
            <input type="file" name="file" class="  py-1" placeholder="logo_instansi">
            <label for="">Alamat Instansi</label>
            <input type="text" name="alamat_instansi" class=" border py-1" placeholder="alamat_instansi">
            <label for="">Email Instansi</label>
            <input type="text" name="email_instansi" class=" border py-1" placeholder="email_instansi">
          </div>
          <button class=" bg-purple-600 py-1 text-white">Simpan</button>
        </div>
      </form>
      <div class=" mt-2 w-full">
        <iframe width="100%" height="1000px" src="{{ asset('storage/' . $instansi->file)}}" frameborder="0"></iframe>
      </div>
    </div>
  </div>
</x-app-layout>