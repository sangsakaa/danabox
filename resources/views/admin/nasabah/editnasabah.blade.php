<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Update Data Nasabah') }}
            </h2>
            <x-button target="_blank" href="#" variant="black" class="justify-center max-w-xs gap-2 ">
                <x-icons.github class="w-6 h-6" aria-hidden="true" />
                <span>Star on Github</span>
            </x-button>
        </div>
    </x-slot>
    <div class="p-6 overflow-hidden grid sm:grid-cols-1  bg-white  rounded-md shadow-md dark:bg-dark-eval-1">
        <form action="/nasabah/{{$nasabah->id}}" method="post">
            @csrf
            @method('patch')
            <div class=" flex gap-2 grid-cols-1 ">
                <input name="nama_nasabah" type="text"
                    class=" capitalize bg-white shadow-md dark:bg-dark-eval-1 w-1/4 px-2 py-1 rounded-md mb-1 text-purple-600"
                    placeholder=" nasabah" value="{{$nasabah->nama_nasabah}}">
                <select name="jenis_kelamin" id=""
                    class="bg-white shadow-md dark:bg-dark-eval-1 w-1/4 px-2 py-1 rounded-md mb-1 text-purple-600">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option {{old('jenis_kelamin',$nasabah->jenis_kelamin)=="L"? 'selected':''}} value="L">
                        Laki-Laki</option>
                    <option {{old('jenis_kelamin',$nasabah->jenis_kelamin)=="P"? 'selected':''}} value="P">
                        Perempuan</option>
                </select>
                <input name="alamat" type="text"
                    class="bg-white shadow-md dark:bg-dark-eval-1 w-1/4 px-2 py-1 rounded-md mb-1 text-purple-600"
                    placeholder=" alamat" value="{{$nasabah->alamat}}">
                <input name="kecamatan" type="hidden"
                    class="bg-white shadow-md dark:bg-dark-eval-1 w-1/4 px-2 py-1 rounded-md mb-1 text-purple-600"
                    placeholder=" kecamatan" value="Muara Komam">

                <input name="kabupaten" type="hidden"
                    class="bg-white shadow-md dark:bg-dark-eval-1 w-1/4 px-2 py-1 rounded-md mb-1 text-purple-600"
                    placeholder=" kabupaten" value="Paser">
                <button type=" submit" class="  bg-purple-600 px-2 py-1 mb-1 text-white rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-left-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z" />
                    </svg>
                </button>
            </div>
        </form>
    </div>
</x-app-layout>