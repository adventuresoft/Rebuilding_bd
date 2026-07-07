<x-layouts.app title="Admin Dashboard - July 24 Fighter Archive">
    <x-admin.shell>
        <div class="space-y-6">
            
            <!-- Welcome Header -->
            <div>
                <h1 class="text-lg sm:text-xl font-medium text-[#003366]">
                    Welcome to <span class="font-extrabold text-[#00551c]">Rebuilding Bangladesh</span>
                </h1>
                <div class="w-16 h-1 bg-amber-500 rounded mt-1.5 mb-8"></div>
            </div>

            <!-- Stats Grid -->
            @php
                $stats = [
                    [
                        'count' => $peopleCount ?? 9,
                        'title' => 'Applicant List (Citizens)',
                        'border' => 'border-l-amber-500',
                        'iconBg' => 'bg-amber-50 text-amber-600',
                        'icon' => '👥',
                        'linkText' => 'View Applicant List',
                        'href' => route('admin.july-fighter.index'),
                    ],
                    [
                        'count' => $fighterCount ?? 114,
                        'title' => 'Approved Fighter Records',
                        'border' => 'border-l-emerald-600',
                        'iconBg' => 'bg-emerald-50 text-emerald-600',
                        'icon' => '✔',
                        'linkText' => 'View Approved List',
                        'href' => route('admin.july-fighter.index'),
                    ],
                    [
                        'count' => $profileCompletedCount ?? 126,
                        'title' => 'Total Certificates Issued',
                        'border' => 'border-l-slate-700',
                        'iconBg' => 'bg-slate-100 text-slate-700',
                        'icon' => '📜',
                        'linkText' => 'View All Certificates',
                        'href' => route('admin.july-fighter.index'),
                    ],
                    [
                        'count' => \App\Models\JulyFighterInfo::count() ?? 0,
                        'title' => 'July Fighter Records',
                        'border' => 'border-l-teal-600',
                        'iconBg' => 'bg-teal-50 text-teal-600',
                        'icon' => '🛡️',
                        'linkText' => 'View All Fighter Records',
                        'href' => route('admin.july-fighter.index'),
                    ],
                ];
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                @foreach ($stats as $stat)
                    <div class="bg-white rounded-xl shadow-2xs border border-slate-200/80 border-l-4 {{ $stat['border'] }} p-5 flex flex-col justify-between hover:shadow-md transition">
                        <div>
                            <div class="flex items-start justify-between gap-3">
                                <div class="text-2xl sm:text-3xl font-black text-slate-800 tracking-tight">
                                    {{ $stat['count'] }}
                                </div>
                                <div class="w-9 h-9 rounded-lg {{ $stat['iconBg'] }} flex items-center justify-center text-sm font-bold shadow-2xs">
                                    {{ $stat['icon'] }}
                                </div>
                            </div>
                            <div class="text-xs font-bold text-slate-600 mt-1">
                                {{ $stat['title'] }}
                            </div>
                        </div>

                        <div class="mt-5 pt-3 border-t border-slate-100">
                            <a href="{{ $stat['href'] }}" class="flex items-center justify-between text-[11px] font-extrabold text-slate-600 hover:text-[#00551c] transition group">
                                <span>{{ $stat['linkText'] }}</span>
                                <span class="group-hover:translate-x-1 transition-transform">➔</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </x-admin.shell>
</x-layouts.app>
