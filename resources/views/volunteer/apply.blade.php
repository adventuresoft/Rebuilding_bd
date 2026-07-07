<!DOCTYPE html>
<html lang="bn" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>স্বেচ্ছাসেবী আবেদন | Rebuilding Bangladesh</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Hind Siliguri', 'Plus Jakarta Sans', sans-serif; }

        /* Modal animation */
        @keyframes modalFadeIn {
            from { opacity: 0; transform: scale(0.92) translateY(12px); }
            to   { opacity: 1; transform: scale(1) translateY(0); }
        }
        .modal-box { animation: modalFadeIn 0.35s cubic-bezier(0.16,1,0.3,1) both; }
    </style>
</head>
<body class="min-h-screen bg-[#f4faf6]">

    {{-- ─── Success Popup Modal ─── --}}
    @if (session('submitted'))
    <div id="successModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm">
        <div class="modal-box bg-white rounded-3xl shadow-2xl max-w-sm w-full mx-4 p-8 text-center">
            <!-- Check icon -->
            <div class="w-20 h-20 rounded-full bg-emerald-100 flex items-center justify-center mx-auto mb-5 shadow-inner">
                <svg class="w-10 h-10 text-[#00551c]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <h2 class="text-xl font-black text-slate-800 mb-2">আবেদন সফল হয়েছে!</h2>
            <p class="text-sm font-semibold text-slate-500 mb-1">Your Application has been</p>
            <p class="text-base font-extrabold text-[#00551c] mb-6">Submitted Successfully ✔</p>
            <p class="text-xs text-slate-400 font-medium mb-6">আমরা শীঘ্রই আপনার সাথে যোগাযোগ করব।</p>
            <button onclick="closeModal()"
                class="w-full py-3 rounded-xl bg-[#00551c] hover:bg-[#004015] text-white font-extrabold text-sm transition shadow">
                ঠিক আছে
            </button>
        </div>
    </div>
    <script>
        function closeModal() {
            document.getElementById('successModal').remove();
        }
        // Auto close after 6 seconds
        setTimeout(() => {
            const m = document.getElementById('successModal');
            if (m) m.remove();
        }, 6000);
    </script>
    @endif

    {{-- ─── Topbar ─── --}}
    <header class="bg-[#00551c] shadow-sm">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 h-14 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <img src="{{ asset('logo-home.png') }}" alt="Logo" class="w-8 h-8 object-contain">
                <span class="text-white text-sm font-extrabold tracking-wide">Rebuilding Bangladesh</span>
            </a>
            <a href="{{ route('home') }}" class="text-emerald-200 hover:text-white text-xs font-bold transition flex items-center gap-1">
                ← হোম পেজে ফিরুন
            </a>
        </div>
    </header>

    {{-- ─── Form Card ─── --}}
    <main class="max-w-5xl mx-auto px-4 sm:px-6 py-10 sm:py-14">

        <!-- Page Title -->
        <div class="mb-8 text-center">
            <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-[#00551c]/10 mb-4">
                <span class="text-2xl">🙋</span>
            </div>
            <h1 class="text-lg sm:text-xl font-black text-slate-800">স্বেচ্ছাসেবী আবেদন ফর্ম</h1>
            <p class="text-sm text-slate-500 font-semibold mt-2">সকল তথ্য সঠিকভাবে পূরণ করুন।</p>
        </div>

        @if ($errors->any())
            <div class="mb-6 rounded-xl bg-red-50 border border-red-200 px-4 py-3">
                <ul class="text-sm text-red-700 font-semibold list-disc pl-4 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('volunteer.apply.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white rounded-3xl shadow-sm border border-slate-200/80 p-6 sm:p-10 space-y-8">
            @csrf

            {{-- ── Basic Info ── --}}
            <div>
                <h2 class="text-xs font-black uppercase tracking-widest text-[#00551c] mb-4 flex items-center gap-2">
                    <span class="w-1 h-4 bg-[#00551c] rounded-full"></span>
                    ব্যক্তিগত তথ্য
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-1.5">নাম (ইংরেজি) <span class="text-red-500">*</span></label>
                        <input type="text" name="name_en" value="{{ old('name_en') }}" required
                            class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#00551c]/30 focus:border-[#00551c]"
                            placeholder="Full name in English">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-1.5">নাম (বাংলা)</label>
                        <input type="text" name="name_bn" value="{{ old('name_bn') }}"
                            class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#00551c]/30 focus:border-[#00551c]"
                            placeholder="বাংলায় নাম লিখুন">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-1.5">জাতীয় পরিচয়পত্র নম্বর (NID)</label>
                        <input type="text" name="nid" value="{{ old('nid') }}"
                            class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#00551c]/30 focus:border-[#00551c]"
                            placeholder="NID number">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-1.5">জন্ম নিবন্ধন নম্বর</label>
                        <input type="text" name="birth_reg_no" value="{{ old('birth_reg_no') }}"
                            class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#00551c]/30 focus:border-[#00551c]"
                            placeholder="Birth registration number">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-1.5">মোবাইল নম্বর</label>
                        <input type="text" name="mobile" value="{{ old('mobile') }}"
                            class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#00551c]/30 focus:border-[#00551c]"
                            placeholder="01XXXXXXXXX">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-1.5">পিতার নাম</label>
                        <input type="text" name="father_name" value="{{ old('father_name') }}"
                            class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#00551c]/30 focus:border-[#00551c]"
                            placeholder="পিতার পুরো নাম">
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-xs font-bold text-slate-600 mb-1.5">মাতার নাম</label>
                        <input type="text" name="mother_name" value="{{ old('mother_name') }}"
                            class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#00551c]/30 focus:border-[#00551c]"
                            placeholder="মাতার পুরো নাম">
                    </div>

                </div>
            </div>

            {{-- ── Present Address ── --}}
            <div>
                <h2 class="text-xs font-black uppercase tracking-widest text-[#00551c] mb-4 flex items-center gap-2">
                    <span class="w-1 h-4 bg-[#00551c] rounded-full"></span>
                    বর্তমান ঠিকানা
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-1.5">বিভাগ</label>
                        <select name="present_division_id" id="present_division"
                            onchange="loadDistricts('present', this.value)"
                            class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#00551c]/30 focus:border-[#00551c] bg-white">
                            <option value="">-- বিভাগ নির্বাচন করুন --</option>
                            @foreach ($divisions as $div)
                                <option value="{{ $div->id }}" {{ old('present_division_id') == $div->id ? 'selected' : '' }}>
                                    {{ $div->bn_name ?? $div->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-1.5">জেলা</label>
                        <select name="present_district_id" id="present_district"
                            onchange="loadThanas('present', this.value)"
                            class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#00551c]/30 focus:border-[#00551c] bg-white">
                            <option value="">-- জেলা নির্বাচন করুন --</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-1.5">থানা / উপজেলা</label>
                        <select name="present_thana_id" id="present_thana"
                            onchange="loadUnions('present', this.value)"
                            class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#00551c]/30 focus:border-[#00551c] bg-white">
                            <option value="">-- থানা নির্বাচন করুন --</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-1.5">ইউনিয়ন</label>
                        <select name="present_union_id" id="present_union"
                            class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#00551c]/30 focus:border-[#00551c] bg-white">
                            <option value="">-- ইউনিয়ন নির্বাচন করুন --</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-1.5">ওয়ার্ড</label>
                        <input type="text" name="present_ward" id="present_ward" value="{{ old('present_ward') }}"
                            class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#00551c]/30 focus:border-[#00551c]"
                            placeholder="ওয়ার্ড নম্বর / নাম">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-1.5">গ্রাম</label>
                        <input type="text" name="present_village" id="present_village" value="{{ old('present_village') }}"
                            class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#00551c]/30 focus:border-[#00551c]"
                            placeholder="গ্রামের নাম">
                    </div>

                </div>
            </div>

            {{-- ── Same as Present ── --}}
            <div class="flex items-center gap-3 bg-amber-50 border border-amber-200 rounded-xl px-5 py-3.5">
                <input type="checkbox" id="same_as_present" name="same_as_present" value="1"
                    onchange="copySameAsPresent(this)"
                    class="w-4 h-4 rounded border-slate-300 text-[#00551c] focus:ring-[#00551c] cursor-pointer">
                <label for="same_as_present" class="text-sm font-bold text-slate-700 cursor-pointer select-none">
                    স্থায়ী ঠিকানা বর্তমান ঠিকানার মতো <span class="text-amber-600">(Same as Present Address)</span>
                </label>
            </div>

            {{-- ── Permanent Address ── --}}
            <div>
                <h2 class="text-xs font-black uppercase tracking-widest text-amber-600 mb-4 flex items-center gap-2">
                    <span class="w-1 h-4 bg-amber-500 rounded-full"></span>
                    স্থায়ী ঠিকানা
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-1.5">বিভাগ</label>
                        <select name="permanent_division_id" id="permanent_division"
                            onchange="loadDistricts('permanent', this.value)"
                            class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-amber-400/40 focus:border-amber-400 bg-white">
                            <option value="">-- বিভাগ নির্বাচন করুন --</option>
                            @foreach ($divisions as $div)
                                <option value="{{ $div->id }}" {{ old('permanent_division_id') == $div->id ? 'selected' : '' }}>
                                    {{ $div->bn_name ?? $div->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-1.5">জেলা</label>
                        <select name="permanent_district_id" id="permanent_district"
                            onchange="loadThanas('permanent', this.value)"
                            class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-amber-400/40 focus:border-amber-400 bg-white">
                            <option value="">-- জেলা নির্বাচন করুন --</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-1.5">থানা / উপজেলা</label>
                        <select name="permanent_thana_id" id="permanent_thana"
                            onchange="loadUnions('permanent', this.value)"
                            class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-amber-400/40 focus:border-amber-400 bg-white">
                            <option value="">-- থানা নির্বাচন করুন --</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-1.5">ইউনিয়ন</label>
                        <select name="permanent_union_id" id="permanent_union"
                            class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-amber-400/40 focus:border-amber-400 bg-white">
                            <option value="">-- ইউনিয়ন নির্বাচন করুন --</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-1.5">ওয়ার্ড</label>
                        <input type="text" name="permanent_ward" id="permanent_ward" value="{{ old('permanent_ward') }}"
                            class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-amber-400/40 focus:border-amber-400"
                            placeholder="ওয়ার্ড নম্বর / নাম">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-1.5">গ্রাম</label>
                        <input type="text" name="permanent_village" id="permanent_village" value="{{ old('permanent_village') }}"
                            class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-amber-400/40 focus:border-amber-400"
                            placeholder="গ্রামের নাম">
                    </div>

                </div>
            </div>

            {{-- ── Photo ── --}}
            <div>
                <h2 class="text-xs font-black uppercase tracking-widest text-[#00551c] mb-4 flex items-center gap-2">
                    <span class="w-1 h-4 bg-[#00551c] rounded-full"></span>
                    ছবি সংযুক্ত করুন
                </h2>
                <div class="flex items-start gap-6">
                    <div class="flex-1">
                        <input type="file" name="picture" accept="image/*"
                            onchange="previewPhoto(this)"
                            class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none file:mr-3 file:py-1 file:px-3 file:rounded file:border-0 file:text-xs file:font-bold file:bg-[#00551c]/10 file:text-[#00551c] hover:file:bg-[#00551c]/20 cursor-pointer">
                        <p class="text-xs text-slate-400 mt-1">সর্বোচ্চ ২ MB। JPG, PNG গ্রহণযোগ্য।</p>
                    </div>
                    <img id="photo_preview" src="#" alt="Preview"
                        class="hidden w-20 h-24 object-cover rounded-xl border-2 border-slate-200 shadow-sm">
                </div>
            </div>

            {{-- ── Submit ── --}}
            <div class="pt-4 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-xs text-slate-400 font-medium">আপনার তথ্য সম্পূর্ণ গোপনীয় রাখা হবে।</p>
                <button type="submit"
                    class="w-full sm:w-auto px-10 py-3 text-sm font-extrabold text-white bg-[#00551c] hover:bg-[#004015] rounded-xl shadow-lg transition flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    আবেদন জমা দিন (Submit)
                </button>
            </div>

        </form>
    </main>

    {{-- ─── Footer ─── --}}
    <footer class="text-center py-6 text-xs text-slate-400 font-medium">
        Copyright &copy; {{ date('Y') }} <span class="text-[#00551c] font-bold">Rebuilding Bangladesh</span>
    </footer>

    <script>
    // ── Cascading Address Dropdowns ──
    async function loadDistricts(prefix, divisionId) {
        resetSelects(prefix, ['district', 'thana', 'union']);
        if (!divisionId) return;
        const res = await fetch(`/locations/districts/${divisionId}`);
        const data = await res.json();
        const sel = document.getElementById(`${prefix}_district`);
        data.forEach(d => sel.add(new Option(d.bn_name || d.name, d.id)));
    }

    async function loadThanas(prefix, districtId) {
        resetSelects(prefix, ['thana', 'union']);
        if (!districtId) return;
        const res = await fetch(`/locations/thanas/${districtId}`);
        const data = await res.json();
        const sel = document.getElementById(`${prefix}_thana`);
        data.forEach(d => sel.add(new Option(d.bn_name || d.name, d.id)));
    }

    async function loadUnions(prefix, thanaId) {
        resetSelects(prefix, ['union']);
        if (!thanaId) return;
        const res = await fetch(`/locations/unions/${thanaId}`);
        const data = await res.json();
        const sel = document.getElementById(`${prefix}_union`);
        data.forEach(d => sel.add(new Option(d.bn_name || d.name, d.id)));
    }

    function resetSelects(prefix, fields) {
        const labels = { district: 'জেলা', thana: 'থানা', union: 'ইউনিয়ন' };
        fields.forEach(f => {
            const el = document.getElementById(`${prefix}_${f}`);
            if (el) el.innerHTML = `<option value="">-- ${labels[f] ?? f} নির্বাচন করুন --</option>`;
        });
    }

    // ── Same as Present ──
    function copySameAsPresent(checkbox) {
        if (checkbox.checked) {
            ['division', 'district', 'thana', 'union'].forEach(f => {
                const src = document.getElementById(`present_${f}`);
                const dst = document.getElementById(`permanent_${f}`);
                if (src && dst) { dst.innerHTML = src.innerHTML; dst.value = src.value; }
            });
            ['ward', 'village'].forEach(f => {
                const src = document.getElementById(`present_${f}`);
                const dst = document.getElementById(`permanent_${f}`);
                if (src && dst) dst.value = src.value;
            });
        } else {
            const labels = { district: 'জেলা', thana: 'থানা', union: 'ইউনিয়ন' };
            ['division', 'district', 'thana', 'union'].forEach(f => {
                const el = document.getElementById(`permanent_${f}`);
                if (el) el.innerHTML = `<option value="">-- ${labels[f] ?? 'বিভাগ'} নির্বাচন করুন --</option>`;
            });
            ['ward', 'village'].forEach(f => {
                const el = document.getElementById(`permanent_${f}`);
                if (el) el.value = '';
            });
        }
    }

    // ── Photo Preview ──
    function previewPhoto(input) {
        const preview = document.getElementById('photo_preview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = e => { preview.src = e.target.result; preview.classList.remove('hidden'); };
            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>

</body>
</html>
