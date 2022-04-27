<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Kordinator Desa') }}
            </h2>

        </div>
    </x-slot>
    <div class=" p-2 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="grid grid-cols-1 gap-2 sm:grid-cols-4 ">
        </div>
        <table class="table border w-full rounded-lg ">
            <thead class=" border bg-gray-50 dark:text-purple-600">
                <tr class=" border">
                    <th scope="col">#</th>
                    <th scope="col" class=" text-left">Nama Kordes</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kordes as $kordes)
                <tr class=" border">
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$kordes->nama_kordes}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>