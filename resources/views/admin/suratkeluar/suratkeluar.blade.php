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
        <form action="/suratkeluar" method="post" enctype="multipart/form-data">
            @csrf
            <div class=" grid sm:grid-cols-2 grid-cols-1  gap-2 capitalize">
                <!-- <div class=" ">
                    <img class="img-preview  ">
                </div> -->
                <input type="date" name="tanggal_keluar" class="  border px-1 py-1 " required>
                <input type="text" name="nomor_surat" class=" capitalize border px-1 py-1" placeholder="nomor surat">
                <input type="text" name="tujuan" class=" capitalize border px-1 py-1" placeholder="tujuan">
                <input type="text" name="uraian" class=" capitalize border px-1 py-1" placeholder="uraian">
                <input type="text" name="perihal" class=" capitalize border px-1 py-1" placeholder="perihal">
                <input type="file" name="file" id="">
                <!-- <input type="file" name="image" class="" onchange="previewImage()" id="image"> -->
                <button type=" submit" class=" bg-purple-600 text-white py-1 px-4"> Surat Keluar
                </button>

            </div>

        </form>
    </div>
    <div class=" text-sm sm:text-xs mt-1 p-2  bg-white  shadow-md dark:bg-dark-eval-1">
        <div class=" overflow-auto grid sm:grid-cols-1 grid-cols-1 ">
            <table class=" w-full ">
                <thead class=" bg-white shadow-md dark:bg-dark  px-1 py-1  mb-1 text-purple-600 ">
                    <tr class=" sm:uppercase  text-left text-sm sm:text-xs capitalize ">
                        <th class=" px-2 py-1">No</th>
                        <th class=" px-1">Tgl Keluar</th>
                        <th class=" px-1">nomor surat</th>
                        <th class=" px-1">uraian</th>
                        <th class=" px-1">Tujuan Surat</th>
                        <th class=" px-1">Perihal</th>
                        <th class=" px-1">Download</th>
                        <th class=" px-1  text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $listSurat as $surat)
                    <tr class=" border border-bottom text-xs sm:text-xs  hover:bg-gray-50 dark:bg-dark-bg ">
                        <td class=" px-2 py-1 ">{{$loop->iteration}}</td>
                        <td class=" px-1">{{$surat->tanggal_keluar}}</td>
                        <td class=" px-1"><a href="/suratkeluar/{{$surat->id}}">{{$surat->nomor_surat}}</a></td>
                        <td class=" px-1">{{$surat->uraian}}</td>
                        <td>{{$surat->tujuan}}</td>
                        <td>{{$surat->perihal}}</td>
                        <td class="p-1 text-center"><a href="{{url('/download',$surat->file)}}"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                </svg>
                            </a></td>
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