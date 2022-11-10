<x-perfect-scrollbar as="nav" aria-label="main" class="flex flex-col flex-1 gap-1 px-3">

    <x-sidebar.link title="Dashboard" href="{{ route('dashboard.index') }}" :isActive="request()->routeIs('dashboard.index')">
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    <div x-transition x-show="isSidebarOpen || isSidebarHovered" class="text-sm text-gray-500">Menu Utama</div>
    <x-sidebar.link title="Surat Masuk" href="{{ route('suratmasuk') }}" :isActive="request()->routeIs('suratmasuk')">
        <x-slot name="icon">
            <x-icons.inbox class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    <x-sidebar.link title="Surat Keluar" href="{{ route('suratkeluar') }}" :isActive="request()->routeIs('suratkeluar')">
        <x-slot name="icon">
            <x-icons.sentto class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    <div x-transition x-show="isSidebarOpen || isSidebarHovered" class="text-sm text-gray-500">Pengaturan</div>
    <x-sidebar.link title="Instansi" href="{{ route('instansi') }}" :isActive="request()->routeIs('instansi')">
        <x-slot name="icon">
            <x-icons.home class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
</x-perfect-scrollbar>