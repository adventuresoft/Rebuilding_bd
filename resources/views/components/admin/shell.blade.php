@php
    $currentRoute = request()->route()?->getName() ?? '';
    $isPeopleInfoActive = in_array($currentRoute, ['admin.july-fighter.create', 'admin.july-fighter.index', 'admin.july-fighter.show', 'admin.search']);
    $isBenefitsActive = in_array($currentRoute, ['admin.benefits.index', 'admin.benefits.create', 'admin.benefits.edit', 'admin.benefits.show']);
@endphp

<div class="min-h-screen w-full flex flex-col bg-[#F8F9FA]">
    <!-- Topmost Red Stripe -->
    <div class="h-1 bg-red-600 w-full flex-shrink-0 z-50"></div>

    <!-- Main Workspace -->
    <div class="flex flex-1 min-h-[calc(100vh-0.25rem)] w-full">
        
        <!-- SIDEBAR -->
        <aside class="w-64 bg-[#F4F6F8] border-r border-slate-200/80 flex flex-col justify-between flex-shrink-0 select-none print:hidden">
            <!-- Sidebar Top Brand -->
            <div class="h-14 px-4 bg-white border-b border-slate-200/80 flex items-center gap-3 shadow-2xs">
                <img src="{{ asset('govt-bd-logo.png') }}" alt="Crest" class="w-8 h-8 object-contain">
                <div>
                    <div class="text-xs font-black tracking-wider text-[#00551c]">Rebuilding Bangladesh</div>
                    <div class="text-[10px] font-bold text-slate-500">Rebuilding Bangladesh Archive</div>
                </div>
            </div>

            <!-- Sidebar Navigation Menu -->
            <nav class="flex-1 overflow-y-auto p-3 space-y-2">
                <!-- Dashboard -->
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center justify-between px-3 py-2 rounded-r-lg text-xs transition {{ $currentRoute === 'admin.dashboard' ? 'bg-emerald-100/80 text-[#00551c] font-extrabold border-l-4 border-[#00551c] shadow-2xs' : 'font-semibold text-slate-700 hover:bg-slate-200/60 hover:text-slate-900 border-l-4 border-transparent' }}">
                    <div class="flex items-center gap-2.5">
                        <span class="text-base">⏱️</span>
                        <span class="text-xs sm:text-sm font-bold">Dashboard</span>
                    </div>
                </a>

                <!-- People Info Collapsible Menu -->
                <div class="space-y-1.5 pt-1">
                    <button type="button" onclick="togglePeopleMenu()" id="peopleMenuHeader"
                            class="w-full flex items-center justify-between px-3 py-2 rounded-lg text-xs transition cursor-pointer {{ $isPeopleInfoActive ? 'bg-[#DDE5ED] text-slate-900 font-bold shadow-2xs' : 'font-semibold text-slate-700 hover:bg-slate-200/60 hover:text-slate-900' }}">
                        <div class="flex items-center gap-2.5">
                            <span class="text-base">👥</span>
                            <span class="text-xs sm:text-sm font-bold">July Fighter Info</span>
                        </div>
                        <span id="peopleMenuArrow" class="text-xs font-black text-slate-600">
                            @if ($isPeopleInfoActive)
                                &#709;
                            @else
                                &lt;
                            @endif
                        </span>
                    </button>

                    <!-- Submenu Items -->
                    <div id="peopleMenuSub" class="{{ $isPeopleInfoActive ? 'block' : 'hidden' }} pl-7 pt-1.5 pb-2 space-y-2.5">
                        <a href="{{ route('admin.july-fighter.create') }}" class="flex items-center gap-3 text-xs font-extrabold {{ $currentRoute === 'admin.july-fighter.create' ? 'text-[#00551c]' : 'text-slate-700 hover:text-[#00551c]' }}">
                            <span class="w-2 h-2 rounded-full {{ $currentRoute === 'admin.july-fighter.create' ? 'bg-[#00551c]' : 'bg-slate-800' }} flex-shrink-0"></span>
                            <span>Create</span>
                        </a>
                        <a href="{{ route('admin.july-fighter.index', ['tab' => 'applicant']) }}" class="flex items-center gap-3 text-xs font-extrabold {{ in_array($currentRoute, ['admin.july-fighter.index', 'admin.july-fighter.show']) && request('tab') !== 'registered' ? 'text-[#00551c]' : 'text-slate-700 hover:text-[#00551c]' }}">
                            <span class="w-2 h-2 rounded-full {{ in_array($currentRoute, ['admin.july-fighter.index', 'admin.july-fighter.show']) && request('tab') !== 'registered' ? 'bg-[#00551c]' : 'bg-slate-800' }} flex-shrink-0"></span>
                            <span>Applicant List</span>
                        </a>
                        <a href="{{ route('admin.july-fighter.index', ['tab' => 'registered']) }}" class="flex items-center gap-3 text-xs font-extrabold {{ $currentRoute === 'admin.july-fighter.index' && request('tab') === 'registered' ? 'text-[#00551c]' : 'text-slate-700 hover:text-[#00551c]' }}">
                            <span class="w-2 h-2 rounded-full {{ $currentRoute === 'admin.july-fighter.index' && request('tab') === 'registered' ? 'bg-[#00551c]' : 'bg-slate-800' }} flex-shrink-0"></span>
                            <span>Reg. July Fighter List</span>
                        </a>
                        <a href="{{ route('admin.search') }}" class="flex items-center gap-3 text-xs font-extrabold {{ $currentRoute === 'admin.search' ? 'text-[#00551c]' : 'text-slate-700 hover:text-[#00551c]' }}">
                            <span class="w-2 h-2 rounded-full {{ $currentRoute === 'admin.search' ? 'bg-[#00551c]' : 'bg-slate-800' }} flex-shrink-0"></span>
                            <span>Search July Fighter</span>
                        </a>
                    </div>
                </div>

                <!-- Benefits Collapsible Menu -->
                <div class="space-y-1.5 pt-1">
                    <button type="button" onclick="toggleBenefitsMenu()" id="benefitsMenuHeader"
                            class="w-full flex items-center justify-between px-3 py-2 rounded-lg text-xs transition cursor-pointer {{ $isBenefitsActive ? 'bg-[#DDE5ED] text-slate-900 font-bold shadow-2xs' : 'font-semibold text-slate-700 hover:bg-slate-200/60 hover:text-slate-900' }}">
                        <div class="flex items-center gap-2.5">
                            <span class="text-base">🎁</span>
                            <span class="text-xs sm:text-sm font-bold">Benefits (সুবিধা সমূহ)</span>
                        </div>
                        <span id="benefitsMenuArrow" class="text-xs font-black text-slate-600">
                            @if ($isBenefitsActive)
                                &#709;
                            @else
                                &lt;
                            @endif
                        </span>
                    </button>

                    <!-- Submenu Items -->
                    <div id="benefitsMenuSub" class="{{ $isBenefitsActive ? 'block' : 'hidden' }} pl-7 pt-1.5 pb-2 space-y-2.5">
                        <a href="{{ route('admin.benefits.create') }}" class="flex items-center gap-3 text-xs font-extrabold {{ $currentRoute === 'admin.benefits.create' ? 'text-[#00551c]' : 'text-slate-700 hover:text-[#00551c]' }}">
                            <span class="w-2 h-2 rounded-full {{ $currentRoute === 'admin.benefits.create' ? 'bg-[#00551c]' : 'bg-slate-800' }} flex-shrink-0"></span>
                            <span>Create Benefit (বরাদ্দ)</span>
                        </a>
                        <a href="{{ route('admin.benefits.index') }}" class="flex items-center gap-3 text-xs font-extrabold {{ in_array($currentRoute, ['admin.benefits.index', 'admin.benefits.edit', 'admin.benefits.show']) ? 'text-[#00551c]' : 'text-slate-700 hover:text-[#00551c]' }}">
                            <span class="w-2 h-2 rounded-full {{ in_array($currentRoute, ['admin.benefits.index', 'admin.benefits.edit', 'admin.benefits.show']) ? 'bg-[#00551c]' : 'bg-slate-800' }} flex-shrink-0"></span>
                            <span>Benefit List (তালিকা)</span>
                        </a>
                    </div>
                </div>
            </nav>

            <script>
            function togglePeopleMenu() {
                const sub = document.getElementById('peopleMenuSub');
                const header = document.getElementById('peopleMenuHeader');
                const arrow = document.getElementById('peopleMenuArrow');
                if (sub.classList.contains('hidden')) {
                    sub.classList.remove('hidden');
                    sub.classList.add('block');
                    header.classList.add('bg-[#DDE5ED]', 'text-slate-900', 'font-bold', 'shadow-2xs');
                    header.classList.remove('font-semibold');
                    arrow.innerHTML = '&#709;';
                } else {
                    sub.classList.add('hidden');
                    sub.classList.remove('block');
                    header.classList.remove('bg-[#DDE5ED]', 'text-slate-900', 'font-bold', 'shadow-2xs');
                    header.classList.add('font-semibold');
                    arrow.innerHTML = '&lt;';
                }
            }

            function toggleBenefitsMenu() {
                const sub = document.getElementById('benefitsMenuSub');
                const header = document.getElementById('benefitsMenuHeader');
                const arrow = document.getElementById('benefitsMenuArrow');
                if (sub.classList.contains('hidden')) {
                    sub.classList.remove('hidden');
                    sub.classList.add('block');
                    header.classList.add('bg-[#DDE5ED]', 'text-slate-900', 'font-bold', 'shadow-2xs');
                    header.classList.remove('font-semibold');
                    arrow.innerHTML = '&#709;';
                } else {
                    sub.classList.add('hidden');
                    sub.classList.remove('block');
                    header.classList.remove('bg-[#DDE5ED]', 'text-slate-900', 'font-bold', 'shadow-2xs');
                    header.classList.add('font-semibold');
                    arrow.innerHTML = '&lt;';
                }
            }
            </script>

            <!-- Sidebar Bottom Footer -->
            <div class="p-3 border-t border-slate-200/80 bg-white/50 text-center">
                <div class="text-[10px] font-bold text-slate-500">Powered by Adventure Soft</div>
                <div class="text-[9px] font-medium text-slate-400">Version 1.1.2</div>
            </div>
        </aside>

        <!-- RIGHT CONTENT WRAPPER -->
        <div class="flex-1 flex flex-col min-w-0 bg-[#F8F9FA]">
            
            <!-- TOPBAR HEADER -->
            <header class="h-14 bg-[#00551c] px-4 sm:px-6 flex items-center justify-between text-white shadow-sm print:hidden">
                <div class="flex items-center gap-4">
                    <button type="button" class="text-xl font-bold px-2 py-0.5 rounded hover:bg-white/10 transition" aria-label="Toggle Sidebar">
                        ≡
                    </button>
                    <div class="text-xs sm:text-sm font-extrabold tracking-wide">
                       রিবিল্ডিং বাংলাদেশ | Rebuilding Bangladesh
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <!-- User Avatar -->
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-full bg-emerald-800 border border-emerald-400 flex items-center justify-center font-bold text-xs text-white shadow-inner">
                            AD
                        </div>
                        <span class="text-xs font-bold hidden md:inline">Super Admin</span>
                    </div>

                    <!-- Fullscreen button -->
                    <button type="button" onclick="if (!document.fullscreenElement) { document.documentElement.requestFullscreen(); } else { document.exitFullscreen(); }" 
                            class="p-1.5 hover:bg-white/10 rounded transition text-sm" title="Toggle Fullscreen">
                        ⛶
                    </button>

                    <!-- Logout Button -->
                    <form method="post" action="{{ route('admin.logout') }}" class="m-0">
                        @csrf
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold text-[11px] px-3 py-1.5 rounded transition shadow-sm flex items-center gap-1">
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </header>

            <!-- MAIN CONTENT AREA -->
            <main class="flex-1 p-6 sm:p-8 overflow-y-auto">
                {{ $slot }}
            </main>

            <!-- BOTTOM FOOTER -->
            <footer class="bg-white border-t border-slate-200/80 px-6 py-3 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-500 font-medium print:hidden">
                <div>
                    Copyright &copy; {{ date('Y') }} Powered by: <span class="text-[#00551c] font-bold">Adventure Soft</span>
                </div>
                <div class="font-bold text-slate-400">
                    CLMS-Version 1.1.2
                </div>
            </footer>

        </div>

    </div>
</div>
