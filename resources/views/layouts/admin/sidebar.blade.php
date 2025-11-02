<!-- Logo -->
<div class="sticky top-0 flex h-16 items-center justify-center px-6 bg-white z-10">
    <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold text-gray-800">
        Diskominfotik Meranti
    </a>
</div>

<!-- Sidebar Menu -->
<div class="hs-accordion-group h-[calc(100%-72px)] p-4 ps-0" data-simplebar>
    <ul class="admin-menu flex flex-col gap-1.5 w-full">

        {{-- ================= Dashboard: Semua Role ================= --}}
        <li class="menu-item">
            <a href="{{ route('admin.dashboard') }}"
               class="group flex items-center gap-x-3.5 rounded-e-full px-4 py-2 text-sm font-medium text-default-700 transition-all hover:bg-default-100">
                <i class="material-symbols-rounded text-2xl">dashboard</i>
                <span class="menu-text">Dashboard</span>
            </a>
        </li>

        {{-- ================= ROLE ADMIN ================= --}}
        @if(auth()->user()->role === 'admin')

            {{-- Data Barang & Inventaris --}}
            <li class="hs-accordion menu-item">
                <a href="javascript:void(0)"
                   class="hs-accordion-toggle group flex items-center gap-x-3.5 rounded-e-full px-4 py-2 text-sm font-medium text-default-700 transition-all hover:bg-default-100">
                    <i class="material-symbols-rounded text-2xl">inventory_2</i>
                    <span class="menu-text">Data Barang & Inventaris</span>
                    <span class="ti ti-chevron-right ms-auto text-sm transition-all hs-accordion-active:rotate-90"></span>
                </a>
                <div class="hs-accordion-content hidden">
                    <ul class="mt-2 space-y-2">
                        <li><a href="{{ route('kategori_barang.index') }}" class="flex items-center gap-x-3.5 px-5 py-2 text-sm hover:bg-default-100"><i class="material-symbols-rounded text-lg">category</i>Kategori Barang</a></li>
                        <li><a href="{{ route('satuan_barang.index') }}" class="flex items-center gap-x-3.5 px-5 py-2 text-sm hover:bg-default-100"><i class="material-symbols-rounded text-lg">straighten</i>Satuan Barang</a></li>
                        <li><a href="{{ route('kondisi_barang.index') }}" class="flex items-center gap-x-3.5 px-5 py-2 text-sm hover:bg-default-100"><i class="material-symbols-rounded text-lg">check_circle</i>Kondisi Barang</a></li>
                        <li><a href="{{ route('barang.index') }}" class="flex items-center gap-x-3.5 px-5 py-2 text-sm hover:bg-default-100"><i class="material-symbols-rounded text-lg">inventory_2</i>Barang</a></li>
                        <li><a href="{{ route('inventaris.index') }}" class="flex items-center gap-x-3.5 px-5 py-2 text-sm hover:bg-default-100"><i class="material-symbols-rounded text-lg">assignment</i>Inventaris Barang</a></li>
                    </ul>
                </div>
            </li>

            {{-- Petugas --}}
            <li class="menu-item">
                <a href="{{ route('petugas.index') }}"
                   class="group flex items-center gap-x-3.5 rounded-e-full px-4 py-2 text-sm font-medium text-default-700 hover:bg-default-100">
                    <i class="material-symbols-rounded text-2xl">manage_accounts</i>
                    <span>Petugas</span>
                </a>
            </li>

            {{-- Data Stok Barang --}}
            <li class="hs-accordion menu-item">
                <a href="javascript:void(0)" class="hs-accordion-toggle group flex items-center gap-x-3.5 rounded-e-full px-4 py-2 text-sm hover:bg-default-100">
                    <i class="material-symbols-rounded text-2xl">fact_check</i>
                    <span>Data Stok Barang</span>
                    <span class="ti ti-chevron-right ms-auto text-sm transition-all hs-accordion-active:rotate-90"></span>
                </a>
                <div class="hs-accordion-content hidden">
                    <ul class="mt-2 space-y-2">
                        <li><a href="{{ route('barangmasuk.index') }}" class="flex items-center gap-x-3.5 px-5 py-2 text-sm hover:bg-default-100"><i class="material-symbols-rounded text-lg">move_to_inbox</i>Barang Masuk</a></li>
                        <li><a href="{{ route('barangkeluar.index') }}" class="flex items-center gap-x-3.5 px-5 py-2 text-sm hover:bg-default-100"><i class="material-symbols-rounded text-lg">outbox</i>Barang Keluar</a></li>
                        <li><a href="{{ route('stokopname.index') }}" class="flex items-center gap-x-3.5 px-5 py-2 text-sm hover:bg-default-100"><i class="material-symbols-rounded text-lg">fact_check</i>Stok Opname</a></li>
                    </ul>
                </div>
            </li>

            {{-- Laporan --}}
            <li class="hs-accordion menu-item">
                <a href="javascript:void(0)" class="hs-accordion-toggle group flex items-center gap-x-3.5 rounded-e-full px-4 py-2 text-sm hover:bg-default-100">
                    <i class="material-symbols-rounded text-2xl">bar_chart</i>
                    <span>Laporan</span>
                    <span class="ti ti-chevron-right ms-auto text-sm transition-all hs-accordion-active:rotate-90"></span>
                </a>
                <div class="hs-accordion-content hidden">
                    <ul class="mt-2 space-y-2">
                        <li><a href="{{ route('laporan.inventaris') }}" class="flex items-center gap-x-3.5 px-5 py-2 text-sm hover:bg-default-100"><i class="material-symbols-rounded text-base">assignment</i>Inventaris</a></li>
                        <li><a href="{{ route('laporan.stokopname') }}" class="flex items-center gap-x-3.5 px-5 py-2 text-sm hover:bg-default-100"><i class="material-symbols-rounded text-base">fact_check</i>Stok Opname</a></li>
                    </ul>
                </div>
            </li>

        {{-- ================= ROLE OPERATOR ================= --}}
        @elseif(auth()->user()->role === 'operator')

            {{-- Inventaris --}}
            <li class="menu-item">
                <a href="{{ route('inventaris.index') }}"
                   class="group flex items-center gap-x-3.5 rounded-e-full px-4 py-2 text-sm hover:bg-default-100">
                    <i class="material-symbols-rounded text-2xl">assignment</i>
                    <span>Inventaris</span>
                </a>
            </li>

            {{-- Stok Barang --}}
            <li class="hs-accordion menu-item">
                <a href="javascript:void(0)" class="hs-accordion-toggle group flex items-center gap-x-3.5 rounded-e-full px-4 py-2 text-sm hover:bg-default-100">
                    <i class="material-symbols-rounded text-2xl">fact_check</i>
                    <span>Stok Barang</span>
                    <span class="ti ti-chevron-right ms-auto text-sm transition-all hs-accordion-active:rotate-90"></span>
                </a>
                <div class="hs-accordion-content hidden">
                    <ul class="mt-2 space-y-2">
                        <li><a href="{{ route('barangmasuk.index') }}" class="flex items-center gap-x-3.5 px-5 py-2 text-sm hover:bg-default-100"><i class="material-symbols-rounded text-lg">move_to_inbox</i>Barang Masuk</a></li>
                        <li><a href="{{ route('barangkeluar.index') }}" class="flex items-center gap-x-3.5 px-5 py-2 text-sm hover:bg-default-100"><i class="material-symbols-rounded text-lg">outbox</i>Barang Keluar</a></li>
                        <li><a href="{{ route('stokopname.index') }}" class="flex items-center gap-x-3.5 px-5 py-2 text-sm hover:bg-default-100"><i class="material-symbols-rounded text-lg">fact_check</i>Stok Opname</a></li>
                    </ul>
                </div>
            </li>

            {{-- Laporan --}}
            <li class="hs-accordion menu-item">
                <a href="javascript:void(0)" class="hs-accordion-toggle group flex items-center gap-x-3.5 rounded-e-full px-4 py-2 text-sm hover:bg-default-100">
                    <i class="material-symbols-rounded text-2xl">bar_chart</i>
                    <span>Laporan</span>
                    <span class="ti ti-chevron-right ms-auto text-sm transition-all hs-accordion-active:rotate-90"></span>
                </a>
                <div class="hs-accordion-content hidden">
                    <ul class="mt-2 space-y-2">
                        <li><a href="{{ route('laporan.inventaris') }}" class="flex items-center gap-x-3.5 px-5 py-2 text-sm hover:bg-default-100"><i class="material-symbols-rounded text-base">assignment</i>Inventaris</a></li>
                        <li><a href="{{ route('laporan.stokopname') }}" class="flex items-center gap-x-3.5 px-5 py-2 text-sm hover:bg-default-100"><i class="material-symbols-rounded text-base">fact_check</i>Stok Opname</a></li>
                    </ul>
                </div>
            </li>

        @endif

    </ul>
</div>

<!-- Script -->
<script src="https://unpkg.com/preline/dist/preline.js"></script>
