<x-app-layout>
    <x-slot name="header">
        @section('title', ' | Surat Masuk' )
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard Surat Masuk') }}
            </h2>
        </div>
    </x-slot>
    <div class="p-1 bg-white   shadow-md dark:bg-dark-eval-1">
        <form action="/suratmasuk" method="post" enctype="multipart/form-data">
            @csrf
            <div class=" grid sm:grid-cols-2 grid-cols-1  gap-2 capitalize">
                <!-- <div class=" ">
                    <img class="img-preview  ">
                </div> -->
                <!-- <input type="file" name="image" class="" onchange="previewImage()" id="image"> -->
                <input type="date" name="tanggal_masuk" class="  border px-1 py-1 " title="Tanggal Surat masuk" required>
                <input type="date" name="tanggal_surat" class="  border px-1 py-1 " title="Tanggal Surat" required>
                <input type="text" name="nomor_surat" class=" capitalize border px-1 py-1" placeholder="nomor surat">
                <input type="text" name="pengirim" class=" capitalize border px-1 py-1" placeholder="pengirim / Asal Surat">
                <input type="text" name="perihal" class=" capitalize border px-1 py-1" placeholder="perihal">
                <input type="text" name="ket" class=" capitalize border px-1 py-1" placeholder="keterangan">
                <input type="file" name="file" id="">
                <button type=" submit" class=" bg-purple-600 text-white py-1 px-4"> Surat Keluar
                </button>
            </div>

        </form>
    </div>
    <div class=" text-sm sm:text-xs mt-1 p-2  bg-white  shadow-md dark:bg-dark-eval-1">
        <form action="/suratkeluar" method="get" class="  gap-1">
            <div class=" flex grid-cols-2 gap-2">
                <input type="text" name="cari" value="{{ request('cari') }}" class=" dark:bg-dark-bg border text-green-800 rounded-sm py-1  w-1/2 " placeholder=" Cari ...">
                <button class=" bg-purple-600 px-4 py-1 text-white">Cari</button>
            </div>
        </form>
        <div class=" overflow-auto grid sm:grid-cols-1 grid-cols-1 ">
            <table class=" w-full mt-1 ">
                <thead class=" bg-white shadow-md dark:bg-dark  px-1 py-1  mb-1 text-purple-600 ">
                    <tr class=" text-left text-sm sm:text-xs capitalize border ">
                        <th class=" px-2 py-1">No</th>
                        <th class=" px-1">Tgl Masuk</th>
                        <th class=" px-1">Tgl Surat</th>
                        <th class=" px-1">nomor surat</th>
                        <th class=" px-1">Asal Surat</th>
                        <th class=" px-1">ket</th>
                        <th class=" px-1">Perihal</th>
                        <th class=" px-1 text-center">Unduh File</th>
                        <th class=" px-1  text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $listSurat as $surat)
                    <tr class=" border border-bottom text-xs sm:text-xs  hover:bg-gray-50 dark:bg-dark-bg ">
                        <td class=" px-2 py-1 ">{{$loop->iteration}}</td>
                        <td class=" px-1">{{$surat->tanggal_masuk}}</td>
                        <td class=" px-1">{{$surat->tanggal_surat}}</td>
                        <td class=" px-1"><a href="/suratkeluar/{{$surat->id}}">{{$surat->nomor_surat}}</a></td>
                        <td class=" capitalize">{{strtolower($surat->pengirim)}}</td>
                        <td class=" px-1 capitalize">{{strtolower($surat->ket)}}</td>
                        <td class=" capitalize">{{strtolower($surat->perihal)}}
                        </td>
                        <td class=" text-center p-1"><a type="button" class="btn btn-secondary bg-purple-600 text-white rounded-md  hover:bg-sky-400" data-bs-toggle="tooltip" data-bs-placement="top" title="Download File" href="{{url('/download',$surat->file)}}"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                </svg>
                            </a></td>
                        <td class=" text-center">
                            <div class=" flex space-x-2  justify-center">
                                <form action="/suratmasuk/{{$surat->id}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class=" py-1 bg-red-600 text-white p-1 rounded-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                        </svg></button>
                                </form>
                                <a class=" bg-purple-600 text-white hover:bg-sky-400 px-1 rounded-sm" href="/suratmasuk/{{$surat->id}}">
                                    <p class=" py-1">Detail</p>
                                </a>
                                <a class=" bg-purple-600 text-white hover:bg-sky-400 px-1 rounded-sm" href="/suratmasuk/{{$surat->id}}/edit">
                                    <p class=" py-1">Edit</p>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');
            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }

        }
    </script> -->
</x-app-layout>