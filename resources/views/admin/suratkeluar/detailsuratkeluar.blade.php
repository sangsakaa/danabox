<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('View File') }}
            </h2>
            <div class=" grid grid-cols-1 px-6">
                <x-button target="_blank" href="https://github.com/kamona-wd/kui-laravel-breeze" variant="black" class="justify-center max-w-xs gap-2">
                    <x-icons.github class="w-6 h-6" aria-hidden="true" />
                    <span>Star on Github</span>
                </x-button>
            </div>
        </div>
    </x-slot>
    <div class=" grid grid-cols-1 p-2">
        <div>
            <button class="flex text-white rounded-md  bg-green-800 px-2 py-1 " onclick="printContent('div1')">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                </svg>
                Cetak Diposisi</button>
        </div>
    </div>
    <div class=" p-2 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div id="div1" class="p-1 bg-white   shadow-md dark:bg-dark-eval-1">
            <table class=" border w-full ">
                <thead>
                    <tr>
                        <th class=" uppercase py-2" colspan="4">lembar diposisi</th>
                    </tr>
                </thead>
                <tbody class=" border">
                    <tr>
                        <td colspan="2" class=" border">
                            <div class=" text-sm p-4 grid grid-cols-2">
                                <div>Tanggal Surat Keluar</div>
                                <div> : {{$suratkeluar->tanggal_keluar}}</div>
                                <div>Tujuan Surat</div>
                                <div> : {{$suratkeluar->nomor_surat}}</div>
                            </div>
                        </td>
                        <td colspan="2" class=" border">
                            <div class=" text-sm p-4 grid grid-cols-2">
                                <div>Tanggal Surat Keluar</div>
                                <div> : {{$suratkeluar->tanggal_keluar}}</div>
                                <div>Tujuan Surat</div>
                                <div> : {{$suratkeluar->tujuan}}</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class=" border px-4 py-1">
                            Perihal : {{$suratkeluar->perihal}}
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <div class=" mt-1 p-2 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
            <iframe height="1000px" width="100%" src="/assets/{{$suratkeluar->file}}" frameborder="0">file</iframe>
        </div>
        <script>
            function printContent(el) {
                var fullbody = document.body.innerHTML;
                var printContent = document.getElementById(el).innerHTML;
                document.body.innerHTML = printContent;
                window.print();
                document.body.innerHTML = fullbody;
            }
        </script>
</x-app-layout>