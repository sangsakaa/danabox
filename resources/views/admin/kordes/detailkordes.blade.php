<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl sm:px-2 px-2 font-semibold leading-tight">
                {{ __('Data Koordinator Desa') }}
            </h2>
        </div>
    </x-slot>
    <div class="p-6 overflow-hidden grid w-full    sm:bg-white bg-green-100  rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="sm:text-3xl text-sm grid grid-cols-1">
            <div>
                Detail Koordinator Desa
            </div>
        </div>
        <div class=" grid grid-cols-1 sm:grid-cols-2  overflow-x-auto w-full">
            <div>Nama Lengkap</div>
            <div class=" font-semibold ">: {{ $kordes->nasabah_id }}</div>
            <div>Tanggal Awal Jabatan</div>
            <div class=" font-semibold ">: {{ $kordes->awal_jabat }}</div>
            <div>Tanggal Akhir Jabatan</div>
            <div class=" font-semibold ">: {{ $kordes->akhir_jabat }}</div>
            <div>Tanggal Akhir Jabatan</div>
            <div class=" font-semibold ">: {{ $kordes->khitmad }} Tahun</div>
        </div>
    </div>
    </div>
</x-app-layout>