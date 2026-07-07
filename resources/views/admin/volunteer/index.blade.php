<x-layouts.app title="Volunteer List">
    <x-admin.shell>
        <div class="space-y-6">

            <!-- Page Header -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <h1 class="text-xl font-black text-slate-800">Volunteer List</h1>
                    <div class="w-12 h-1 bg-amber-500 rounded mt-1.5"></div>
                </div>
                <a href="{{ route('admin.volunteers.create') }}"
                    class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#00551c] hover:bg-[#004015] text-white text-sm font-extrabold rounded-lg shadow transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Add New Volunteer
                </a>
            </div>

            @if (session('success'))
                <div class="rounded-xl bg-emerald-50 border border-emerald-200 px-4 py-3 text-sm font-semibold text-emerald-800 flex items-center gap-2">
                    <span>✔</span> {{ session('success') }}
                </div>
            @endif

            <!-- Table Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200">
                                <th class="text-left px-4 py-3 text-xs font-black text-slate-600 uppercase tracking-wide w-12">SL</th>
                                <th class="text-left px-4 py-3 text-xs font-black text-slate-600 uppercase tracking-wide">Name (English)</th>
                                <th class="text-left px-4 py-3 text-xs font-black text-slate-600 uppercase tracking-wide">Name (Bangla)</th>
                                <th class="text-left px-4 py-3 text-xs font-black text-slate-600 uppercase tracking-wide">Mobile</th>
                                <th class="text-left px-4 py-3 text-xs font-black text-slate-600 uppercase tracking-wide">NID</th>
                                <th class="text-left px-4 py-3 text-xs font-black text-slate-600 uppercase tracking-wide">District</th>
                                <th class="text-center px-4 py-3 text-xs font-black text-slate-600 uppercase tracking-wide">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse ($volunteers as $vol)
                                <tr class="hover:bg-slate-50/70 transition">
                                    <td class="px-4 py-3 text-xs font-semibold text-slate-500">
                                        {{ ($volunteers->currentPage() - 1) * $volunteers->perPage() + $loop->iteration }}
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center gap-3">
                                            @if ($vol->picture)
                                                <img src="{{ asset('storage/' . $vol->picture) }}"
                                                    alt="{{ $vol->name_en }}"
                                                    class="w-8 h-8 rounded-full object-cover border border-slate-200 flex-shrink-0">
                                            @else
                                                <div class="w-8 h-8 rounded-full bg-[#00551c]/10 border border-[#00551c]/20 flex items-center justify-center text-[#00551c] font-black text-xs flex-shrink-0">
                                                    {{ strtoupper(substr($vol->name_en, 0, 1)) }}
                                                </div>
                                            @endif
                                            <span class="font-semibold text-slate-800">{{ $vol->name_en }}</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-slate-700">{{ $vol->name_bn ?? '—' }}</td>
                                    <td class="px-4 py-3 text-slate-600">{{ $vol->mobile ?? '—' }}</td>
                                    <td class="px-4 py-3 text-slate-600">{{ $vol->nid ?? '—' }}</td>
                                    <td class="px-4 py-3 text-slate-600">
                                        {{ optional($vol->presentDistrict)->bn_name ?? optional($vol->presentDistrict)->name ?? '—' }}
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        <a href="{{ route('admin.volunteers.show', $vol) }}"
                                            class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-extrabold text-white bg-[#003366] hover:bg-[#002244] rounded-lg transition shadow-sm">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                            Show
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-4 py-12 text-center text-slate-400 text-sm font-semibold">
                                        <div class="flex flex-col items-center gap-2">
                                            <span class="text-3xl">🙋</span>
                                            <span>No volunteers found.</span>
                                            <a href="{{ route('admin.volunteers.create') }}" class="text-[#00551c] font-bold hover:underline">Add the first volunteer →</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($volunteers->hasPages())
                    <div class="px-4 py-4 border-t border-slate-100">
                        {{ $volunteers->links() }}
                    </div>
                @endif
            </div>

        </div>
    </x-admin.shell>
</x-layouts.app>
