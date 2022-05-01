<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Data Nasabah') }}
            </h2>
        </div>
    </x-slot>
    <div class=" overflow-auto  text-sm rounded-lg ">
        <div class="p-6 overflow-hidden grid w-full   bg-white  rounded-md shadow-md dark:bg-dark-eval-1">
            <form action="/nasabah" method="post">
                @csrf
                <div class=" grid grid-cols-1 sm:grid-cols-4 gap-2">
                    <input required value="{{ old('nama_nasabah') }}" name="nama_nasabah" type="text"
                        class="  capitalize bg-white shadow-md dark:bg-dark-eval-1 grid grid-cols-1 w-full sm:grid-cols-3  sm:w-full   px-1 py-2 rounded-md mb-1 text-green-800"
                        placeholder=" nasabah">
                    <select required name="jenis_kelamin" id=""
                        class="bg-white shadow-md dark:bg-dark-eval-1  grid grid-cols-1 w-full sm:grid-cols-3  px-1 py-2 rounded-md mb-1 text-green-800">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="L">Laki Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                    <input required name="alamat" type="text"
                        class="bg-white shadow-md dark:bg-dark-eval-1 px-1 py-2 rounded-md mb-1 text-green-800"
                        placeholder=" alamat">

                    <input required name="kecamatan" type="hidden"
                        class="bg-white shadow-md dark:bg-dark-eval-1 w-full px-1 py-2 rounded-md mb-1 text-green-800"
                        placeholder=" kecamatan" value="Muara Komam">

                    <input required name="kabupaten" type="hidden"
                        class="bg-white shadow-md dark:bg-dark-eval-1 w-full px-1 py-2 rounded-md mb-1 text-green-800"
                        placeholder=" kabupaten" value="Paser">
                    <button type=" submit" class="  bg-green-800 px-2 py-2 mb-1 text-white rounded-md"> Tambah Nasabah
                    </button>
                </div>
            </form>
            <div class="overflow-hidden mb-2 w-full rounded-lg border shadow-xs">
                <div class=" grid grid-cols-1  overflow-x-auto w-full">
                    <table class="  w-full whitespace-no-wrap table table-auto  border rounded-md ">
                        <thead
                            class=" bg-white shadow-md dark:bg-dark-eval-1  px-1 py-1 rounded-md mb-1 text-green-800 ">
                            <tr class=" text-left uppercase">
                                <th class=" px-2 py-2 rounded-md">#</th>
                                <th class=" px-1">Nasabah</th>
                                <th class=" px-1">JK</th>
                                <th class=" px-1">Alamat</th>
                                <th class=" px-1  text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $nasabah as $nas)
                            <tr class=" border border-bottom ">
                                <td class=" px-2 py-2 ">{{$loop->iteration}}</td>
                                <td class=" px-1">{{$nas->nama_nasabah}}</td>
                                <td class=" px-1">{{$nas->jenis_kelamin}}</td>
                                <td>{{$nas->alamat}}</td>
                                <td class=" text-center">
                                    <div class=" flex space-x-2  justify-center">
                                        <a href="/nasabah/{{$nas->id}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                <path
                                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                            </svg>
                                        </a>
                                        <a href="/nasabah/{{$nas->id}}/edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </a>
                                        <form action="/nasabah/{{$nas->id}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path
                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                    <path fill-rule="evenodd"
                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
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
            <div class=" py-2">
                {{ $nasabah->links() }}
            </div>
        </div>
    </div>
</x-app-layout>