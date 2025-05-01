<ul class="fixed bottom-5 right-5 hidden md:flex lg:hidden flex-col items-end gap-3 z-50">
    <li id="dashboard" class="opacity-0 translate-y-5 transition-all duration-300">
        <a href="{{ route('dashboard', ['username' => Session::get('user')['username']]) }}"
            class="flex items-center px-4 py-2 bg-white text-amber-600 rounded-full shadow-md hover:shadow-lg transition-all">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            Dashboard
        </a>
    </li>
    <li id="keuangan" class="opacity-0 translate-y-5 transition-all duration-300">
        <a href="{{ route('kelola.index') }}"
            class="flex items-center px-4 py-2 bg-white text-amber-600 rounded-full shadow-md hover:shadow-lg transition-all">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            Keuangan
        </a>
    </li>
    <li id="profile" class="opacity-0 translate-y-5 transition-all duration-300">
        <a href="{{ route('profile') }}"
            class="flex items-center px-4 py-2 bg-white text-amber-600 rounded-full shadow-md hover:shadow-lg transition-all">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            Profile
        </a>
    </li>
    <li>
        <button onclick="handleClickFloating()" id="floatingMenu"
            class="cursor-pointer p-4 px-6 bg-amber-500 text-white shadow-lg aspect-square rounded-full text-2xl transition-all duration-300 hover:bg-amber-600">
            <div class="transform transition-transform duration-300">+</div>
        </button>
    </li>
</ul>

<script>
    const handleClickFloating = () => {
        const menuItems = ['dashboard', 'keuangan', 'profile'];
        const floatingBtn = document.getElementById('floatingMenu');

        if (floatingBtn.classList.contains('rotate-45')) {
            menuItems.forEach(item => {
                document.getElementById(item).classList.add('opacity-0', 'translate-y-5');
            });
            floatingBtn.classList.remove('rotate-45');
            floatingBtn.querySelector('div').classList.remove('rotate-45');
        } else {
            floatingBtn.classList.add('rotate-45');
            floatingBtn.querySelector('div').classList.add('rotate-45');
            menuItems.forEach((item, index) => {
                setTimeout(() => {
                    document.getElementById(item).classList.remove('opacity-0', 'translate-y-5');
                }, index * 100);
            });
        }
    }
</script>
