<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col grid-cols-1 md:px-4 gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Data Nasabah') }}
            </h2>
            <x-button href="/penyetor" variant="purple" class="justify-center max-w-xs gap-2">
                <x-icons.github class="w-6 h-6" aria-hidden="true" />
                <span>Kembali ke menu setor</span>
            </x-button>
        </div>
    </x-slot>
    <div class="p-6 overflow-hidden  bg-white  rounded-md shadow-md dark:bg-dark-eval-1">
        <form action="/setor" method="post">
            @csrf
            <div class=" flex gap-2 grid-cols-1 ">
                <input name="tgl_setor" type="date"
                    class="bg-white shadow-md dark:bg-dark-eval-1 w-1/4 px-1 py-1 rounded-md mb-1 text-purple-600"
                    placeholder=" nasabah">
                <input name="penyetor_id" type="hidden"
                    class="bg-white shadow-md dark:bg-dark-eval-1 w-1/4 px-1 py-1 rounded-md mb-1 text-purple-600"
                    placeholder=" penyetor_id" value="{{$penyetor->id}}">
                <select name="nasabah_id" id=""
                    class="bg-white shadow-md dark:bg-dark-eval-1 w-1/4 px-1 py-1 rounded-md mb-1 text-purple-600">
                    <option value="">Pilih Nasabah</option>
                    @foreach( $nasabah as $nasabah)
                    <option value="{{$nasabah->id}}">{{$nasabah->nama_nasabah}}</option>
                    @endforeach
                </select>
                <input name="setor_box" type="text"
                    class="bg-white shadow-md dark:bg-dark-eval-1 w-1/4 px-1 py-1 rounded-md mb-1 text-purple-600"
                    placeholder=" setor_box" value="">
                <input name="setor_sp" type="text"
                    class="bg-white shadow-md dark:bg-dark-eval-1 w-1/4 px-1 py-1 rounded-md mb-1 text-purple-600"
                    placeholder=" setor_sp">
                <button type=" submit" class="  bg-purple-600 px-2 py-1 mb-1 text-white rounded-md"> <svg
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-person-plus-fill " viewBox="0 0 16 16">
                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        <path fill-rule="evenodd"
                            d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                    </svg></button>
            </div>
        </form>
        <table class=" table table-auto w-full border rounded-md ">
            <thead class=" bg-white shadow-md dark:bg-dark-eval-1 w-1/4 px-1 py-1 rounded-md mb-1 text-purple-600 ">
                <tr class=" text-left uppercase">
                    <th class=" px-2 py-2 rounded-md">#</th>
                    <th class=" px-1">Tgl Setor</th>
                    <th class=" px-1">Nasabah</th>
                    <th class=" px-1 text-center"> Dana Box</th>
                    <th class=" px-1">SP</th>
                    <th class=" px-1 text-left "> Total Setor</th>
                    <th class=" px-1  ">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $setor as $nas)
                <tr class=" border border-bottom ">
                    <td class=" px-2 py-2 ">{{$loop->iteration}}</td>
                    <td class=" px-1">{{$nas->tgl_setor}}</td>
                    <td class=" px-1">{{$nas->nasabah->nama_nasabah}}</td>
                    <td class=" text-center">{{"Rp.".number_format($nas->setor_box,0,',','.')}}</td>
                    <td>{{"Rp.".number_format($nas->setor_sp,0,',','.')}}</td>
                    <td class=" text-left ">{{"Rp.". number_format((($nas->setor_sp)+($nas->setor_box)),0,',','.') }}
                    </td>
                    <td class=" text-center">
                        <div class=" flex">
                            <div class=" flex">
                                <form action="/setor/{{$nas->id}}" method="post">
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
                                <a href="/setor/{{$nas->id}}">
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
                    </td>
                </tr>
                @endforeach
                <tr class=""></tr>
                <td>

                </td>
                </tr>
            </tbody>
        </table>
        <div class="dark:bg-dark-eval-1 bg-blue-50 px-4 py-2 mt-2  rounded-md  grid grid-cols-1">
            Note :
            <ul>
                <li class=" capitalize">
                    1. yang berwarna hijau menjadi KAS Kecamatan
                </li>
                <li class=" capitalize">
                    2. yang berwarna merah menjadi setoran wajib ke kabupaten
                </li>
            </ul>
        </div>
        <div class="dark:bg-dark-eval-1 bg-green-50 px-4 py-2 mt-2  rounded-md  grid grid-cols-1">
            <div class=" font-semibold  text-right">Total Kas Dana Box</div>
            <div class=" font-semibold  text-right">{{'Rp.'. number_format($setor->sum('setor_box'),0,',','.')}}</div>
        </div>
        <div class="dark:bg-dark-eval-1 bg-green-100 px-4 py-2 mt-2  rounded-md  grid grid-cols-1">
            <div class=" text-right font-semibold">Total Dana SP</div>
            <div class="font-semibold  text-right">{{ 'Rp.'.number_format($setor->sum('setor_sp'),0,',','.')}}</div>
        </div>
        <div class=" px-4   rounded-md  grid grid-cols-3">
            <div>Rincian Total Kas Kecamatan :</div>
            <div class=" text-right px-4">Kas Dana Box Kecamatan 15%</div>
            <div class=" text-right">{{ 'Rp.'.number_format($setor->sum('setor_box')*15/100,0,',','.')}}</div>
            <div></div>
            <div class=" text-right px-4">Kas Sp Kecamatan 15%</div>
            <div class=" text-right">{{'Rp.'.number_format(($setor->sum('setor_sp')*15/100),0,',','.')}}</div>
            <div></div>
            <div class=" text-right px-4 text-green-600">Total Kas Kecamatan</div>
            <div class=" font-semibold text-right text-green-600">
                {{'Rp.'.number_format(($setor->sum('setor_box')*15/100)+($setor->sum('setor_sp')*15/100),0,',','.')}}
            </div>
        </div>
        <hr>
        <div class=" px-4  rounded-md  grid grid-cols-3 ">
            <div>Rincian Total Kas Kabupaten :</div>
            <div class=" text-right px-4">Kas Dana Box Kabupaten</div>
            <div class=" text-right">
                {{ 'Rp.'.number_format(($setor->sum('setor_box') - $setor->sum('setor_box')*15/100),0,',','.')}}
            </div>
            <div></div>
            <div class=" text-right px-4 ">Kas Sp Kabupaten</div>
            <div class=" font-semibold  text-right">
                {{ 'Rp.'.number_format(($setor->sum('setor_sp')-$setor->sum('setor_sp')*15/100),0,',','.')}}
            </div>
            <div></div>
            <div class=" text-right px-4 text-red-600">Total Kas Kabupate</div>

            <div class=" font-semibold  text-right text-red-600">
                {{'Rp.'.number_format(($setor->sum('setor_box') - $setor->sum('setor_box')*15/100)+($setor->sum('setor_sp')-$setor->sum('setor_sp')*15/100),0,',','.')}}
            </div>
        </div>
    </div>
</x-app-layout>