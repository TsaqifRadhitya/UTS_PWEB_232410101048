<nav class="fixed bottom-0 w-full flex justify-center md:hidden items-center p-4 bg-white shadow-lg py-2 z-50">
    <ul class="flex justify-between w-full max-w-xs">
        <li>
            <a href="{{ route('dashboard', ['username' => View::getSection('username')]) }}"
                class="flex flex-col items-center p-2 text-gray-600 hover:text-amber-600 transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="text-xs">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('kelola.index', ['username' => View::getSection('username')]) }}"
                class="flex flex-col items-center p-2 text-gray-600 hover:text-amber-600 transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <span class="text-xs">Keuangan</span>
            </a>
        </li>
        <li>
            <a href="{{ route('profile', ['username' => View::getSection('username')]) }}"
                class="flex flex-col items-center p-2 text-gray-600 hover:text-amber-600 transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span class="text-xs">Profile</span>
            </a>
        </li>
    </ul>
</nav>
