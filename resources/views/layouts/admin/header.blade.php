<!-- Topbar Brand Logo -->
<a href="index.html" class="md:hidden flex">
    <img src="assets/images/logo-sm.png" class="h-6" alt="Small logo">
</a>

<!-- Spacer untuk menggeser ke kanan -->
<div class="ms-auto flex items-center gap-4">

    <!-- Info User & Role -->
    <div class="flex flex-col items-end text-right">
        <span class="font-semibold text-base text-gray-700">
            Halo, {{ auth()->user()->name ?? 'Guest' }}
        </span>
        <span class="text-sm text-gray-500 italic">
            Anda login sebagai {{ ucfirst(auth()->user()->role ?? 'unknown') }}
        </span>
    </div>

    <!-- Tombol Logout -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
            class="bg-red-600 hover:bg-red-700 text-white text-sm font-medium px-4 py-2 rounded">
            Logout
        </button>
    </form>

</div>
