<x-perfect-scrollbar as="nav" aria-label="main" class="flex flex-col flex-1 gap-4 px-3">

    <x-sidebar.link title="Dashboard" href="{{ route('dashboard.index') }}" :isActive="request()->routeIs('dashboard.index')">
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    <div x-transition x-show="isSidebarOpen || isSidebarHovered" class="text-sm text-gray-500">Surat Keluar</div>
    <x-sidebar.link title="Surat Keluar" href="{{ route('suratkeluar') }}" :isActive="request()->routeIs('suratkeluar')">
        <x-slot name="icon">
            <x-icons.cash class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>


</x-perfect-scrollbar>