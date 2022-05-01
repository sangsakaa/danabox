<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Detail Nasabah') }}
            </h2>
            <x-button href="/nasabah" variant="black" class="justify-center max-w-xs gap-2 ">
                <x-icons.usergroup class="w-6 h-6" aria-hidden="true" />
                <span>Star on Github</span>
            </x-button>
        </div>
    </x-slot>
    <div
        class=" font-semibold text-3xl text-green-800 px-6 p-2 mb-2 overflow-hidden grid sm:grid-cols-1  bg-white  rounded-md shadow-md dark:bg-dark-eval-1">
        Detail Data Nasabah
    </div>
    <div class="p-6 overflow-hidden grid sm:grid-cols-1  bg-white  rounded-md shadow-md dark:bg-dark-eval-1">
        <div class=" grid grid-cols-2">
            <div> Nama Lengkap</div>
            <div> : {{$nasabah->nama_nasabah}}</div>
            <div> Jenis Kelamin</div>
            <div> : {{$nasabah->jenis_kelamin}}</div>
            <div> Alamat</div>
            <div> : {{$nasabah->alamat}}</div>

        </div>
    </div>

    <div
        class=" font-semibold text-3xl text-green-800 px-6 p-2 mt-2 overflow-hidden grid sm:grid-cols-1  bg-white  rounded-md shadow-md dark:bg-dark-eval-1">
        Detail Setoran
    </div>
    <div class="p-2 mt-2 overflow-auto grid sm:grid-cols-1  bg-white  rounded-lg shadow-lg dark:bg-dark-eval-1">
        <table class=" table table-auto w-full border rounded-md ">
            <thead class=" bg-white shadow-md dark:bg-dark-eval-1 w-1/4 px-1 py-1 rounded-md mb-1 text-green-800 ">
                <tr class=" text-left uppercase">
                    <th class=" px-2 py-2 rounded-md">#</th>
                    <th class=" px-1">Tgl Setor</th>
                    <th class=" px-1">Bulan Setoran</th>
                    <th class=" px-1">Nasabah</th>
                    <th class=" px-1 text-center"> Dana Box</th>
                    <th class=" px-1">SP</th>
                    <th class=" px-1 text-left "> Total Setor</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $setor as $nas)
                <tr class=" border border-bottom ">
                    <td class=" px-2 py-2 ">{{$loop->iteration}}</td>
                    <td class=" px-1">{{$nas->tgl_setor}}</td>
                    <td class=" px-1">{{ date_format(date_create($nas->tgl_setor),'M')}}</td>
                    <td class=" px-1">{{$nas->nasabah->nama_nasabah}}</td>
                    <td class=" text-center">{{"Rp.".number_format($nas->setor_box,0,',','.')}}</td>
                    <td>{{"Rp.".number_format($nas->setor_sp,0,',','.')}}</td>
                    <td class=" text-left ">{{"Rp.". number_format((($nas->setor_sp)+($nas->setor_box)),0,',','.') }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>