<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Data Penyetor') }}
            </h2>

        </div>
    </x-slot>
    <div class="p-6 sm:text-sm overflow-hidden w-full  bg-white  rounded-md shadow-md dark:bg-dark-eval-1">
        <form action="/penyetor" method="post">
            @csrf
            <div class=" grid grid-cols-1 sm:grid-cols-4 gap-2">
                <input name="tgl_setor" type="date"
                    class="bg-white shadow-md dark:bg-dark-eval-1  px-1 py-2 rounded-md mb-1 text-purple-600"
                    placeholder=" nasabah" required>
                <select name="nasabah_id" id=""
                    class="bg-white shadow-md dark:bg-dark-eval-1  px-1 py-2 rounded-md mb-1 text-purple-600">
                    <option value="">Pilih Penyetor</option>
                    @foreach( $nasabah as $nasabah)
                    <option value="{{$nasabah->id}}">{{$nasabah->nama_nasabah}}</option>
                    @endforeach
                </select>
                <select required name="kordes_id" id=""
                    class="bg-white shadow-md dark:bg-dark-eval-1 px-1 py-1 rounded-md mb-1 text-purple-600">
                    <option value="">Pilih Kordes</option>
                    @foreach( $kordes as $kordes)
                    <option value="{{$kordes->id}}">{{$kordes->nasabah_id}}</option>
                    @endforeach
                </select>
                <input name="kordes_id" type="hidden"
                    class="bg-white shadow-md dark:bg-dark-eval-1  px-1 py-2 rounded-md mb-1 text-purple-600"
                    placeholder=" kordes_id" value="21">
                <button type=" submit" class="  bg-purple-600 px-2 py-2 mb-1 text-white rounded-md">
                    Penyetor
                </button>
            </div>
        </form>
        <div class=" overflow-auto  text-sm rounded-lg ">
            <table class="w-full whitespace-no-wrap table table-auto    ">
                <thead class=" border  shadow-md dark:bg-dark-eval-1 w-1/4 px-1 py-1 rounded-lg mb-1 text-purple-600 ">
                    <tr class=" text-sm sm:text-2 text-left  sm:uppercase">
                        <th class=" px-2 py-2 rounded-md">#</th>
                        <th class=" px-1">Tgl Setoran</th>
                        <th class=" px-1">Bulan</th>
                        <th class=" px-1">Penyetor</th>
                        <th class=" px-1">Alamat</th>
                        <th class=" px-1">kecamatan</th>
                        <th class=" px-1">Kordes</th>

                        <th class=" px-1  text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if($penyetor->count())
                    @foreach( $penyetor as $nas)
                    <tr class=" border border-bottom ">
                        <td class=" px-2 py-2 ">{{$loop->iteration}}</td>
                        <td class=" px-1">{{ date_format(date_create($nas->tgl_setor),'d-m-Y')}}</td>
                        <td class=" px-1">{{ date_format(date_create($nas->tgl_setor),'M')}}</td>
                        <td class=" px-1">{{$nas->setor->nama_nasabah}}</td>
                        <td class=" px-1">{{$nas->setor->alamat}}</td>
                        <td class=" px-1">{{$nas->setor->kecamatan}}</td>
                        <td class=" px-1">{{$nas->kordes->nasabah_id}}</td>
                        </td>
                        <td class=" text-center">
                            <div class=" flex">
                                <div class=" flex">
                                    <form action="/penyetor/{{$nas->id}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class=" bg-red-600 text-white rounded-sm px-1 py-1"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash " viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                <path fill-rule="evenodd"
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                            </svg></button>
                                    </form>
                                </div>
                                <div class=" flex ml-2">
                                    <a href="/penyetor/{{$nas->id}}">
                                        <button class=" bg-purple-600 text-white rounded-sm px-1 py-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                <path
                                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                            </svg>
                                        </button>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </td>
                    </tr>
                    @else
                    <tr class="  w-full">
                        <td class=" text-1xl py-1 text-red-600">
                            Belum ada Data Setoran
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>