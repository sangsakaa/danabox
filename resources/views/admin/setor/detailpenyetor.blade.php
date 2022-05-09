<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Detail Penyetor') }}
            </h2>
            <a href="/setor/{{$penyetor->id}}"><button> Kembali</button></a>
        </div>
    </x-slot>
    <div class="p-6 sm:text-sm overflow-hidden w-full  bg-white  rounded-md shadow-md dark:bg-dark-eval-1">
        <div class=" text-right">Kode Transaksi : {{ $setor->tgl_setor }}-{{$setor->id}}</div>
        <div class=" grid grid-cols-2">
            <div>Tanggal Setor</div>
            <div> : {{ $setor->tgl_setor }}</div>
            <div>Penyetor</div>
            <div> : {{$setor->nasabah->nama_nasabah}}</div>
            <div>Setor Dana Box</div>
            <div> : {{'Rp.'.number_format(($setor->setor_box),0,',','.')}}</div>
            <div>Setor Simpanan Penghasilan</div>
            <div> : {{'Rp.'.number_format(($setor->setor_sp),0,',','.')}}</div>
        </div>
        <hr>
        <div>
            <div class=" text-3xl text-right">{{'Rp'.number_format(($setor->setor_box)+($setor->setor_sp),0,',','.')}}
            </div>
        </div>
    </div>
</x-app-layout>