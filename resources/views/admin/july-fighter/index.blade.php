<x-layouts.app title="July Fighter Information">
    <x-admin.shell>
        <div class="mx-auto max-w-7xl space-y-6">
            @if (session('success'))
                <div class="rounded-2xl border border-emerald-500/30 bg-emerald-50 p-4 text-emerald-800 flex items-center justify-between shadow-sm">
                    <div class="flex items-center gap-3">
                        <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span class="font-bold text-sm">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <!-- Top Header Bar matching screenshot -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-2">
                <h1 class="text-base sm:text-lg font-black tracking-wider uppercase text-slate-600">
                    @if(($tab ?? 'applicant') === 'registered')
                        REG. JULY FIGHTER LIST (APPROVED)
                    @else
                        APPLICANT LIST (PENDING VERIFICATION)
                    @endif
                </h1>
                <div class="flex items-center gap-2.5">
                    <a href="{{ route('admin.july-fighter.create') }}" class="rounded-lg bg-[#1e293b] hover:bg-[#0f172a] px-4 py-2 text-xs font-extrabold text-white tracking-wider uppercase transition shadow-md flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                        <span>CREATE</span>
                    </a>
                    <a href="{{ route('admin.july-fighter.index', ['tab' => $tab ?? 'applicant']) }}" class="rounded-lg bg-[#1e293b] hover:bg-[#0f172a] px-4 py-2 text-xs font-extrabold text-white tracking-wider uppercase transition shadow-md flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                        <span>LIST</span>
                    </a>
                </div>
            </div>

            <!-- Main White Card matching screenshot -->
            <div class="rounded-3xl bg-white p-6 shadow-sm border border-slate-200/80">
                
                <!-- Filter Form Bar -->
                <form action="{{ route('admin.july-fighter.index') }}" method="get" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-3 mb-6">
                    <input type="hidden" name="tab" value="{{ $tab ?? 'applicant' }}">
                    <div>
                        <input type="text" name="search_name" value="{{ $search_name ?? '' }}" placeholder="Search Name..." class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-700 placeholder-slate-400 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                    <div>
                        <input type="text" name="mobile" value="{{ $mobile ?? '' }}" placeholder="Mobile No..." class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-700 placeholder-slate-400 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                    <div>
                        <select name="gender" onchange="this.form.submit()" class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-700 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            <option value="">All Genders</option>
                            <option value="Male" {{ ($gender ?? '') === 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ ($gender ?? '') === 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other" {{ ($gender ?? '') === 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                    <div class="flex gap-2">
                        <input type="text" name="q" value="{{ $search ?? '' }}" placeholder="Global search..." class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-700 placeholder-slate-400 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                        <button type="submit" class="hidden sm:inline-block rounded-xl bg-slate-800 text-white px-3 py-2.5 text-xs font-bold uppercase tracking-wider">Search</button>
                    </div>
                    <div>
                        <a href="{{ route('admin.july-fighter.index') }}" class="w-full rounded-xl border border-red-300 bg-red-50/50 hover:bg-red-50 text-red-500 font-bold text-sm px-4 py-2.5 flex items-center justify-center gap-2 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                            <span>Reset</span>
                        </a>
                    </div>
                </form>

                <!-- Data Table matching screenshot exactly -->
                <div class="overflow-x-auto rounded-2xl border border-slate-200">
                    <table class="min-w-full divide-y divide-slate-200 text-left text-xs text-slate-700">
                        <thead class="bg-slate-100 text-slate-600 text-[11px] font-extrabold uppercase tracking-wider">
                            <tr>
                                <th class="px-3 py-4.5 text-center">SL</th>
                                <th class="px-3 py-4.5 text-center">PHOTO</th>
                                <th class="px-4 py-4.5">
                                    <div class="flex items-center gap-1 cursor-pointer">
                                        <span>ID &amp; NAME</span>
                                        <span class="text-slate-400 text-[10px]">&#8645;</span>
                                    </div>
                                </th>
                                <th class="px-4 py-4.5">
                                    <div class="flex items-center gap-1 cursor-pointer">
                                        <span>MOBILE</span>
                                        <span class="text-slate-400 text-[10px]">&#8645;</span>
                                    </div>
                                </th>
                                <th class="px-4 py-4.5">
                                    <div class="flex items-center gap-1 cursor-pointer">
                                        <span>GENDER &amp; DOB</span>
                                        <span class="text-slate-400 text-[10px]">&#8645;</span>
                                    </div>
                                </th>
                                <th class="px-4 py-4.5">
                                    <div class="flex items-center gap-1 cursor-pointer">
                                        <span>PROFESSION</span>
                                        <span class="text-slate-400 text-[10px]">&#8645;</span>
                                    </div>
                                </th>
                                <th class="px-4 py-4.5">
                                    <div class="flex items-center gap-1 cursor-pointer">
                                        <span>FIGHTER TYPE</span>
                                        <span class="text-slate-400 text-[10px]">&#8645;</span>
                                    </div>
                                </th>
                                <th class="px-4 py-4.5">
                                    <div class="flex items-center gap-1 cursor-pointer">
                                        <span>DISTRICT &amp; UPAZILA</span>
                                        <span class="text-slate-400 text-[10px]">&#8645;</span>
                                    </div>
                                </th>
                                <th class="px-4 py-4.5 min-w-[200px]">
                                    <div class="flex items-center gap-1 cursor-pointer">
                                        <span>ADDRESS</span>
                                        <span class="text-slate-400 text-[10px]">&#8645;</span>
                                    </div>
                                </th>
                                <th class="px-4 py-4.5 text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 bg-white">
                            @forelse ($people as $index => $person)
                                @php
                                    $serial = ($people->currentPage() - 1) * $people->perPage() + $index + 1;
                                    $nid = $person->nid_number ?: optional($person->personalInfo)->national_id ?: '2026' . str_pad($person->id, 6, '0', STR_PAD_LEFT);
                                    $gender = optional($person->personalInfo)->gender ?: 'Male';
                                    $dob = $person->date_of_birth ? $person->date_of_birth->format('d-m-Y') : (optional($person->personalInfo)->date_of_birth ? $person->personalInfo->date_of_birth->format('d-m-Y') : 'N/A');
                                    $profession = optional($person->professionInfo)->profession ?: '';
                                    $fighterType = optional($person->julyFighterInfo)->fighter_type ?: 'General Participant';
                                    $district = optional($person->addressInfo)->district ?: 'Gopalganj';
                                    $upazila = optional($person->addressInfo)->upazila ?: 'Gopalganj Sadar';
                                    $presentAddr = optional($person->addressInfo)->current_address ?: 'No.3 Suktail Union Parishad';
                                    $permAddr = optional($person->addressInfo)->permanent_address ?: 'Gopalganj, Gopalganj Sadar';
                                @endphp
                                <tr class="hover:bg-slate-50/80 transition">
                                    <!-- SL -->
                                    <td class="px-3 py-4 text-center font-extrabold text-slate-800">
                                        {{ $serial }}
                                    </td>

                                    <!-- PHOTO -->
                                    <td class="px-3 py-4 text-center">
                                        <div class="mx-auto w-12 h-12 rounded-xl bg-slate-100 border border-slate-200 flex items-center justify-center overflow-hidden shadow-sm">
                                            @if ($gender === 'Female')
                                                <svg class="w-9 h-9 text-slate-300 mt-1" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                            @else
                                                <svg class="w-9 h-9 text-indigo-900/60 mt-1" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                            @endif
                                        </div>
                                    </td>

                                    <!-- ID & NAME -->
                                    <td class="px-4 py-4">
                                        <div class="font-black text-slate-900 text-xs tracking-tight">{{ $nid }}</div>
                                        <div class="font-bold text-slate-800 text-sm mt-0.5">{{ $person->name }}</div>
                                    </td>

                                    <!-- MOBILE -->
                                    <td class="px-4 py-4 font-bold text-slate-800 text-xs">
                                        {{ $person->phone ?: 'N/A' }}
                                    </td>

                                    <!-- GENDER & DOB -->
                                    <td class="px-4 py-4">
                                        <div class="font-bold text-slate-700 text-xs">{{ $gender }}</div>
                                        <div class="text-slate-500 text-[11px] mt-0.5">{{ $dob }}</div>
                                    </td>

                                    <!-- PROFESSION -->
                                    <td class="px-4 py-4 font-semibold text-slate-700 text-xs">
                                        {{ $profession }}
                                    </td>

                                    <!-- FIGHTER TYPE -->
                                    <td class="px-4 py-4 font-bold text-indigo-700 text-xs">
                                        <span class="inline-block px-2.5 py-1 bg-indigo-50 rounded-lg border border-indigo-100">
                                            {{ $fighterType }}
                                        </span>
                                    </td>

                                    <!-- DISTRICT & UPAZILA -->
                                    <td class="px-4 py-4 text-xs leading-relaxed text-slate-700">
                                        <div><span class="font-bold text-slate-900">Present:</span> {{ $district }}, {{ $upazila }}</div>
                                        <div class="mt-1"><span class="font-bold text-slate-900">Permanent:</span> {{ $district }}, {{ $upazila }}</div>
                                    </td>

                                    <!-- ADDRESS -->
                                    <td class="px-4 py-4 text-xs leading-relaxed text-slate-700 max-w-xs">
                                        <div><span class="font-bold text-slate-900">Present:</span> {{ $presentAddr }}</div>
                                        <div class="mt-1"><span class="font-bold text-slate-900">Permanent:</span> {{ $permAddr }}</div>
                                    </td>

                                    <!-- ACTION -->
                                    <td class="px-4 py-4 text-center">
                                        <div class="flex items-center justify-center gap-1.5">
                                            <!-- Green check / verify action -->
                                            <a href="{{ route('admin.july-fighter.show', $person) }}" title="Verify & Show Info" class="w-8 h-8 rounded-lg bg-emerald-50 border border-emerald-200 text-emerald-600 hover:bg-emerald-100 flex items-center justify-center transition shadow-2xs">
                                                <svg class="w-4 h-4 font-bold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                            </a>
                                            
                                            <!-- Blue edit action -->
                                            <a href="{{ route('admin.july-fighter.edit', $person) }}" title="Edit" class="w-8 h-8 rounded-lg bg-blue-50 border border-blue-200 text-blue-600 hover:bg-blue-100 flex items-center justify-center transition shadow-2xs">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                            </a>

                                            <!-- Cyan view action -->
                                            <a href="{{ route('admin.july-fighter.show', $person) }}" title="View" class="w-8 h-8 rounded-lg bg-cyan-50 border border-cyan-200 text-cyan-600 hover:bg-cyan-100 flex items-center justify-center transition shadow-2xs">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="px-4 py-12 text-center text-slate-400">
                                        <div class="flex flex-col items-center justify-center gap-2">
                                            <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                            <span class="text-sm font-semibold text-slate-500">No applicant records found. Click "+ CREATE" to add a new July Fighter.</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if ($people->hasPages())
                    <div class="mt-6 border-t border-slate-100 pt-4">
                        {{ $people->links() }}
                    </div>
                @endif

            </div>
        </div>
    </x-admin.shell>
</x-layouts.app>
