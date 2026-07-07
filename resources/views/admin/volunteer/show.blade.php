<x-layouts.app title="Volunteer Details">
    <x-admin.shell>
        <div class="mx-auto max-w-4xl">

            <!-- Back + Header -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                <div>
                    <h1 class="text-xl font-black text-slate-800">Volunteer Details</h1>
                    <div class="w-12 h-1 bg-amber-500 rounded mt-1.5"></div>
                </div>
                <a href="{{ route('admin.volunteers.index') }}"
                    class="inline-flex items-center gap-2 px-4 py-2 text-sm font-bold text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-lg transition">
                    ← Back to List
                </a>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden">

                <!-- Top Profile Strip -->
                <div class="bg-gradient-to-r from-[#00551c] to-[#007a2a] px-8 py-6 flex items-center gap-6">
                    @if ($volunteer->picture)
                        <img src="{{ asset('storage/' . $volunteer->picture) }}"
                            alt="{{ $volunteer->name_en }}"
                            class="w-20 h-24 object-cover rounded-xl border-4 border-white/30 shadow-lg">
                    @else
                        <div class="w-20 h-24 rounded-xl bg-white/20 border-4 border-white/30 flex items-center justify-center text-white text-3xl font-black shadow-lg">
                            {{ strtoupper(substr($volunteer->name_en, 0, 1)) }}
                        </div>
                    @endif
                    <div>
                        <div class="text-white text-xl font-black">{{ $volunteer->name_en }}</div>
                        @if ($volunteer->name_bn)
                            <div class="text-emerald-100 text-base font-semibold mt-0.5">{{ $volunteer->name_bn }}</div>
                        @endif
                        <div class="text-emerald-200 text-xs font-bold mt-2 flex items-center gap-2">
                            <span class="bg-white/20 rounded-full px-3 py-0.5">Volunteer</span>
                            <span>ID #{{ $volunteer->id }}</span>
                        </div>
                    </div>
                </div>

                <div class="p-6 sm:p-8 space-y-8">

                    <!-- ── Basic Information ── -->
                    <div>
                        <h2 class="text-xs font-black uppercase tracking-widest text-[#00551c] mb-4 flex items-center gap-2">
                            <span class="w-1 h-4 bg-[#00551c] rounded-full"></span>
                            Basic Information
                        </h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            @php
                                $basic = [
                                    ['label' => 'Name (English)',  'value' => $volunteer->name_en],
                                    ['label' => 'Name (Bangla)',   'value' => $volunteer->name_bn],
                                    ['label' => 'NID Number',      'value' => $volunteer->nid],
                                    ['label' => 'Birth Reg. No',   'value' => $volunteer->birth_reg_no],
                                    ['label' => 'Mobile Number',   'value' => $volunteer->mobile],
                                    ['label' => "Father's Name",   'value' => $volunteer->father_name],
                                    ['label' => "Mother's Name",   'value' => $volunteer->mother_name],
                                ];
                            @endphp
                            @foreach ($basic as $item)
                                <div class="bg-slate-50 rounded-xl px-4 py-3 border border-slate-100">
                                    <div class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-0.5">{{ $item['label'] }}</div>
                                    <div class="text-sm font-semibold text-slate-800">{{ $item['value'] ?? '—' }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- ── Present Address ── -->
                    <div>
                        <h2 class="text-xs font-black uppercase tracking-widest text-[#00551c] mb-4 flex items-center gap-2">
                            <span class="w-1 h-4 bg-[#00551c] rounded-full"></span>
                            Present Address (বর্তমান ঠিকানা)
                        </h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            @php
                                $present = [
                                    ['label' => 'Division',  'value' => optional($volunteer->presentDivision)->bn_name ?? optional($volunteer->presentDivision)->name],
                                    ['label' => 'District',  'value' => optional($volunteer->presentDistrict)->bn_name ?? optional($volunteer->presentDistrict)->name],
                                    ['label' => 'Thana',     'value' => optional($volunteer->presentThana)->bn_name ?? optional($volunteer->presentThana)->name],
                                    ['label' => 'Union',     'value' => optional($volunteer->presentUnion)->bn_name ?? optional($volunteer->presentUnion)->name],
                                    ['label' => 'Ward',      'value' => $volunteer->present_ward],
                                    ['label' => 'Village',   'value' => $volunteer->present_village],
                                ];
                            @endphp
                            @foreach ($present as $item)
                                <div class="bg-slate-50 rounded-xl px-4 py-3 border border-slate-100">
                                    <div class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-0.5">{{ $item['label'] }}</div>
                                    <div class="text-sm font-semibold text-slate-800">{{ $item['value'] ?? '—' }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- ── Permanent Address ── -->
                    <div>
                        <h2 class="text-xs font-black uppercase tracking-widest text-amber-600 mb-4 flex items-center gap-2">
                            <span class="w-1 h-4 bg-amber-500 rounded-full"></span>
                            Permanent Address (স্থায়ী ঠিকানা)
                            @if ($volunteer->same_as_present)
                                <span class="text-[10px] font-bold bg-amber-100 text-amber-700 px-2 py-0.5 rounded-full">Same as Present</span>
                            @endif
                        </h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            @php
                                $permanent = [
                                    ['label' => 'Division',  'value' => optional($volunteer->permanentDivision)->bn_name ?? optional($volunteer->permanentDivision)->name],
                                    ['label' => 'District',  'value' => optional($volunteer->permanentDistrict)->bn_name ?? optional($volunteer->permanentDistrict)->name],
                                    ['label' => 'Thana',     'value' => optional($volunteer->permanentThana)->bn_name ?? optional($volunteer->permanentThana)->name],
                                    ['label' => 'Union',     'value' => optional($volunteer->permanentUnion)->bn_name ?? optional($volunteer->permanentUnion)->name],
                                    ['label' => 'Ward',      'value' => $volunteer->permanent_ward],
                                    ['label' => 'Village',   'value' => $volunteer->permanent_village],
                                ];
                            @endphp
                            @foreach ($permanent as $item)
                                <div class="bg-amber-50/60 rounded-xl px-4 py-3 border border-amber-100">
                                    <div class="text-[10px] font-black text-amber-500 uppercase tracking-widest mb-0.5">{{ $item['label'] }}</div>
                                    <div class="text-sm font-semibold text-slate-800">{{ $item['value'] ?? '—' }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- ── Meta ── -->
                    <div class="pt-4 border-t border-slate-100 text-xs text-slate-400 font-semibold flex flex-col sm:flex-row gap-1 sm:gap-4">
                        <span>Submitted: {{ $volunteer->created_at->format('d M Y, h:i A') }}</span>
                        <span>Last Updated: {{ $volunteer->updated_at->format('d M Y, h:i A') }}</span>
                    </div>

                </div>
            </div>

        </div>
    </x-admin.shell>
</x-layouts.app>
