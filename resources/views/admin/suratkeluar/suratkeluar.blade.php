<x-app-layout>
    <x-slot name="header">
        @section('title', ' | Surat Keluar' )
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <div class=" grid grid-cols-1 px-6">
                <x-button target="_blank" href="https://github.com/kamona-wd/kui-laravel-breeze" variant="black" class="justify-center max-w-xs gap-2">
                    <x-icons.github class="w-6 h-6" aria-hidden="true" />
                    <span>Star on Github</span>
                </x-button>
            </div>
        </div>
    </x-slot>
    <div class="p-1 bg-white   shadow-md dark:bg-dark-eval-1">
        <form action="/suratkeluar" method="post">
            @csrf
            <div class=" grid sm:grid grid-cols-1 sm:grid-cols-5 gap-2 capitalize">
                <input type="date" name="tanggal_keluar" class="  border px-1 py-1 " required>
                <input type="text" name="nomor_surat" class=" capitalize border px-1 py-1" placeholder="nomor surat">
                <input type="text" name="tujuan" class=" capitalize border px-1 py-1" placeholder="tujuan">
                <input type="text" name="uraian" class=" capitalize border px-1 py-1" placeholder="uraian">
                <button type=" submit" class=" bg-purple-600 text-white py-1 px-4"> Surat Keluar
                </button>
            </div>
        </form>
    </div>
    <div class=" text-sm sm:text-xs mt-1 p-2  bg-white  shadow-md dark:bg-dark-eval-1">
        <div class=" overflow-auto grid sm:grid-cols-1 grid-cols-1 ">
            <table class=" w-full ">
                <thead class=" bg-white shadow-md dark:bg-dark  px-1 py-1  mb-1 text-purple-600 ">
                    <tr class=" sm:uppercase  text-left text-sm capitalize ">
                        <th class=" px-2 py-1">No</th>
                        <th class=" px-1">Tgl Keluar</th>
                        <th class=" px-1">nomor surat</th>
                        <th class=" px-1">uraian</th>
                        <th class=" px-1">Tujuan Surat</th>
                        <th class=" px-1  text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $listSurat as $surat)
                    <tr class=" border border-bottom ">
                        <td class=" px-2 py-1 ">{{$loop->iteration}}</td>
                        <td class=" px-1">{{$surat->tanggal_keluar}}</td>
                        <td class=" px-1"><a href="/suratkeluar/{{$surat->id}}">{{$surat->nomor_surat}}</a></td>
                        <td class=" px-1">{{$surat->uraian}}</td>
                        <td>{{$surat->tujuan}}</td>
                        <td class=" text-center">
                            <div class=" flex space-x-2  justify-center">
                                <form action="/suratkeluar/{{$surat->id}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                        </svg></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>