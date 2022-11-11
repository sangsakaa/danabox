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
            <input type="hidden" name="suratmasuk_id" class=" border py-1" placeholder="nama_instansi" value="1">
            <input type="text" name="nip_kepala_instansi" class=" border py-1" placeholder="nip_kepala_instansi">
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
            <div class=" text-red-600">* Wajib menggunakan Email Instansi</div>
            <button class=" bg-purple-600 py-1 text-white">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class=" p-4 bg-white ">
    <span> Riwayat Kepala Instansi</span>
    <table class=" w-full">
      <thead>
        <tr>
          <th class=" border text-sm text-center">No</th>
          <th class=" border text-sm text-center">Nama Instansi</th>
          <th class=" border text-sm text-center">Nama Kepala Instansi</th>
          <th class=" border text-sm text-center">Status Kepala Instansi</th>
          <th class=" border text-sm text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($instansi as $unit)
        <tr>
          <td class=" border text-sm text-center">{{$loop->iteration}}</td>
          <td class=" border text-sm text-center">{{$unit->nama_instansi}}</td>
          <td class=" border text-sm text-center">{{$unit->nama_kepala_instansi}}</td>
          <td class=" border text-sm text-center">{{$unit->status_kepala_instansi}}</td>
          <td class=" border text-sm text-center">
            <form action="/instansi/{{$unit->id}}" method="post">
              @csrf
              @method('delete')
              <button class=" bg-red-600 text-white rounded-sm px-1 hover:bg-purple-800">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</x-app-layout>