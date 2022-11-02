<x-perfect-scrollbar as="nav" aria-label="main" class="flex flex-col flex-1 gap-4 px-3">

    <x-sidebar.link title="Dashboard" href="{{ route('dashboard.index') }}" :isActive="request()->routeIs('dashboard.index')">
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    <x-sidebar.dropdown title="Buttons" :active="Str::startsWith(request()->route()->uri(), 'buttons')">
        <x-slot name="icon">
            <x-icons.usergroup class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink title="Text button" href="{{ route('nasabah.index') }}" :active="request()->routeIs('nasabah.index')" />
        <x-sidebar.sublink title="Icon button" href="{{ route('buttons.icon') }}" :active="request()->routeIs('buttons.icon')" />
        <x-sidebar.sublink title="Text with icon" href="{{ route('buttons.text-icon') }}" :active="request()->routeIs('buttons.text-icon')" />
    </x-sidebar.dropdown>



    <div x-transition x-show="isSidebarOpen || isSidebarHovered" class="text-sm text-gray-500">Surat Keluar</div>
    <x-sidebar.link title="Surat Keluar" href="{{ route('surat_keluar') }}" :isActive="request()->routeIs('surat_keluar')">
        <x-slot name="icon">
            <x-icons.cash class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>


</x-perfect-scrollbar>