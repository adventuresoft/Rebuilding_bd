<x-layouts.app title="Add New Volunteer">
    <x-admin.shell>
        <div class="mx-auto max-w-4xl">
            <div class="rounded-3xl bg-white p-6 shadow-sm border border-slate-200/80 md:p-10 text-slate-800">

                <!-- Header -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-slate-200 pb-5 mb-8 gap-3">
                    <h1 class="text-2xl font-black text-slate-800 tracking-tight">Volunteer Application Form</h1>
                    <div class="text-sm font-semibold text-slate-500 flex items-center gap-1.5">
                        <a href="{{ route('admin.volunteers.index') }}" class="text-[#00551c] hover:underline">Volunteer</a>
                        <span>/</span>
                        <span class="text-slate-700 font-bold">Add New</span>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="mb-6 rounded-xl bg-red-50 border border-red-200 p-4">
                        <ul class="text-sm text-red-700 font-semibold list-disc pl-4 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.volunteers.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf

                    <!-- ── Section: Basic Info ── -->
                    <div>
                        <h2 class="text-sm font-black uppercase tracking-widest text-[#00551c] mb-4 flex items-center gap-2">
                            <span class="w-1 h-4 bg-[#00551c] rounded-full inline-block"></span>
                            Basic Information
                        </h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                            <div>
                                <label class="block text-xs font-bold text-slate-600 mb-1.5">Name (English) <span class="text-red-500">*</span></label>
                                <input type="text" name="name_en" value="{{ old('name_en') }}"
                                    class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#00551c]/30 focus:border-[#00551c]"
                                    placeholder="Full name in English" required>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-600 mb-1.5">Name (Bangla / নাম)</label>
                                <input type="text" name="name_bn" value="{{ old('name_bn') }}"
                                    class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#00551c]/30 focus:border-[#00551c]"
                                    placeholder="বাংলায় নাম লিখুন">
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-600 mb-1.5">NID Number</label>
                                <input type="text" name="nid" value="{{ old('nid') }}"
                                    class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#00551c]/30 focus:border-[#00551c]"
                                    placeholder="National ID number">
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-600 mb-1.5">Birth Reg. No</label>
                                <input type="text" name="birth_reg_no" value="{{ old('birth_reg_no') }}"
                                    class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#00551c]/30 focus:border-[#00551c]"
                                    placeholder="Birth registration number">
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-600 mb-1.5">Mobile Number</label>
                                <input type="text" name="mobile" value="{{ old('mobile') }}"
                                    class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#00551c]/30 focus:border-[#00551c]"
                                    placeholder="01XXXXXXXXX">
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-600 mb-1.5">Father's Name</label>
                                <input type="text" name="father_name" value="{{ old('father_name') }}"
                                    class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#00551c]/30 focus:border-[#00551c]"
                                    placeholder="Father's full name">
                            </div>

                            <div class="sm:col-span-2">
                                <label class="block text-xs font-bold text-slate-600 mb-1.5">Mother's Name</label>
                                <input type="text" name="mother_name" value="{{ old('mother_name') }}"
                                    class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#00551c]/30 focus:border-[#00551c]"
                                    placeholder="Mother's full name">
                            </div>

                        </div>
                    </div>

                    <!-- ── Section: Present Address ── -->
                    <div>
                        <h2 class="text-sm font-black uppercase tracking-widest text-[#00551c] mb-4 flex items-center gap-2">
                            <span class="w-1 h-4 bg-[#00551c] rounded-full inline-block"></span>
                            Present Address (বর্তমান ঠিকানা)
                        </h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                            <div>
                                <label class="block text-xs font-bold text-slate-600 mb-1.5">Division (বিভাগ)</label>
                                <select name="present_division_id" id="present_division"
                                    onchange="loadDistricts('present', this.value)"
                                    class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#00551c]/30 focus:border-[#00551c] bg-white">
                                    <option value="">-- Select Division --</option>
                                    @foreach ($divisions as $div)
                                        <option value="{{ $div->id }}" {{ old('present_division_id') == $div->id ? 'selected' : '' }}>
                                            {{ $div->bn_name ?? $div->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-600 mb-1.5">District (জেলা)</label>
                                <select name="present_district_id" id="present_district"
                                    onchange="loadThanas('present', this.value)"
                                    class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#00551c]/30 focus:border-[#00551c] bg-white">
                                    <option value="">-- Select District --</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-600 mb-1.5">Thana / Upazila (থানা)</label>
                                <select name="present_thana_id" id="present_thana"
                                    onchange="loadUnions('present', this.value)"
                                    class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#00551c]/30 focus:border-[#00551c] bg-white">
                                    <option value="">-- Select Thana --</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-600 mb-1.5">Union (ইউনিয়ন)</label>
                                <select name="present_union_id" id="present_union"
                                    class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#00551c]/30 focus:border-[#00551c] bg-white">
                                    <option value="">-- Select Union --</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-600 mb-1.5">Ward (ওয়ার্ড)</label>
                                <input type="text" name="present_ward" id="present_ward" value="{{ old('present_ward') }}"
                                    class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#00551c]/30 focus:border-[#00551c]"
                                    placeholder="Ward number / name">
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-600 mb-1.5">Village (গ্রাম)</label>
                                <input type="text" name="present_village" id="present_village" value="{{ old('present_village') }}"
                                    class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#00551c]/30 focus:border-[#00551c]"
                                    placeholder="Village name">
                            </div>

                        </div>
                    </div>

                    <!-- ── Same as Present Checkbox ── -->
                    <div class="flex items-center gap-3 bg-amber-50 border border-amber-200 rounded-xl px-5 py-3">
                        <input type="checkbox" id="same_as_present" name="same_as_present" value="1"
                            onchange="copySameAsPresent(this)"
                            class="w-4 h-4 rounded border-slate-300 text-[#00551c] focus:ring-[#00551c] cursor-pointer">
                        <label for="same_as_present" class="text-sm font-bold text-slate-700 cursor-pointer select-none">
                            Same as Present Address (স্থায়ী ঠিকানা বর্তমান ঠিকানার মতো)
                        </label>
                    </div>

                    <!-- ── Section: Permanent Address ── -->
                    <div>
                        <h2 class="text-sm font-black uppercase tracking-widest text-[#00551c] mb-4 flex items-center gap-2">
                            <span class="w-1 h-4 bg-amber-500 rounded-full inline-block"></span>
                            Permanent Address (স্থায়ী ঠিকানা)
                        </h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                            <div>
                                <label class="block text-xs font-bold text-slate-600 mb-1.5">Division (বিভাগ)</label>
                                <select name="permanent_division_id" id="permanent_division"
                                    onchange="loadDistricts('permanent', this.value)"
                                    class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#00551c]/30 focus:border-[#00551c] bg-white">
                                    <option value="">-- Select Division --</option>
                                    @foreach ($divisions as $div)
                                        <option value="{{ $div->id }}" {{ old('permanent_division_id') == $div->id ? 'selected' : '' }}>
                                            {{ $div->bn_name ?? $div->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-600 mb-1.5">District (জেলা)</label>
                                <select name="permanent_district_id" id="permanent_district"
                                    onchange="loadThanas('permanent', this.value)"
                                    class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#00551c]/30 focus:border-[#00551c] bg-white">
                                    <option value="">-- Select District --</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-600 mb-1.5">Thana / Upazila (থানা)</label>
                                <select name="permanent_thana_id" id="permanent_thana"
                                    onchange="loadUnions('permanent', this.value)"
                                    class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#00551c]/30 focus:border-[#00551c] bg-white">
                                    <option value="">-- Select Thana --</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-600 mb-1.5">Union (ইউনিয়ন)</label>
                                <select name="permanent_union_id" id="permanent_union"
                                    class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#00551c]/30 focus:border-[#00551c] bg-white">
                                    <option value="">-- Select Union --</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-600 mb-1.5">Ward (ওয়ার্ড)</label>
                                <input type="text" name="permanent_ward" id="permanent_ward" value="{{ old('permanent_ward') }}"
                                    class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#00551c]/30 focus:border-[#00551c]"
                                    placeholder="Ward number / name">
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-600 mb-1.5">Village (গ্রাম)</label>
                                <input type="text" name="permanent_village" id="permanent_village" value="{{ old('permanent_village') }}"
                                    class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#00551c]/30 focus:border-[#00551c]"
                                    placeholder="Village name">
                            </div>

                        </div>
                    </div>

                    <!-- ── Section: Photo ── -->
                    <div>
                        <h2 class="text-sm font-black uppercase tracking-widest text-[#00551c] mb-4 flex items-center gap-2">
                            <span class="w-1 h-4 bg-[#00551c] rounded-full inline-block"></span>
                            Attached Picture (ছবি)
                        </h2>
                        <div class="flex items-start gap-6">
                            <div class="flex-1">
                                <label class="block text-xs font-bold text-slate-600 mb-1.5">Upload Photo</label>
                                <input type="file" name="picture" id="picture_input" accept="image/*"
                                    onchange="previewPhoto(this)"
                                    class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#00551c]/30 focus:border-[#00551c] file:mr-3 file:py-1 file:px-3 file:rounded file:border-0 file:text-xs file:font-bold file:bg-[#00551c]/10 file:text-[#00551c] hover:file:bg-[#00551c]/20 cursor-pointer">
                                <p class="text-xs text-slate-400 mt-1">Max size: 2MB. JPG, PNG, GIF accepted.</p>
                            </div>
                            <div>
                                <img id="photo_preview" src="#" alt="Preview"
                                    class="hidden w-24 h-28 object-cover rounded-xl border-2 border-slate-200 shadow-sm">
                            </div>
                        </div>
                    </div>

                    <!-- ── Submit ── -->
                    <div class="flex items-center justify-end gap-4 pt-4 border-t border-slate-100">
                        <a href="{{ route('admin.volunteers.index') }}"
                            class="px-6 py-2.5 text-sm font-bold text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-lg transition">
                            Cancel
                        </a>
                        <button type="submit"
                            class="px-8 py-2.5 text-sm font-extrabold text-white bg-[#00551c] hover:bg-[#004015] rounded-lg shadow transition flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Submit Application
                        </button>
                    </div>

                </form>
            </div>
        </div>

        <script>
        // ── Cascading Address Dropdowns ──
        async function loadDistricts(prefix, divisionId) {
            resetSelects(prefix, ['district', 'thana', 'union']);
            if (!divisionId) return;
            const res = await fetch(`/locations/districts/${divisionId}`);
            const data = await res.json();
            const sel = document.getElementById(`${prefix}_district`);
            data.forEach(d => {
                const opt = new Option(d.bn_name || d.name, d.id);
                sel.add(opt);
            });
        }

        async function loadThanas(prefix, districtId) {
            resetSelects(prefix, ['thana', 'union']);
            if (!districtId) return;
            const res = await fetch(`/locations/thanas/${districtId}`);
            const data = await res.json();
            const sel = document.getElementById(`${prefix}_thana`);
            data.forEach(d => {
                const opt = new Option(d.bn_name || d.name, d.id);
                sel.add(opt);
            });
        }

        async function loadUnions(prefix, thanaId) {
            resetSelects(prefix, ['union']);
            if (!thanaId) return;
            const res = await fetch(`/locations/unions/${thanaId}`);
            const data = await res.json();
            const sel = document.getElementById(`${prefix}_union`);
            data.forEach(d => {
                const opt = new Option(d.bn_name || d.name, d.id);
                sel.add(opt);
            });
        }

        function resetSelects(prefix, fields) {
            fields.forEach(f => {
                const el = document.getElementById(`${prefix}_${f}`);
                if (el) {
                    el.innerHTML = `<option value="">-- Select ${f.charAt(0).toUpperCase() + f.slice(1)} --</option>`;
                }
            });
        }

        // ── Same as Present ──
        function copySameAsPresent(checkbox) {
            const fields = ['division', 'district', 'thana', 'union'];
            const textFields = ['ward', 'village'];

            if (checkbox.checked) {
                // Copy select values
                fields.forEach(f => {
                    const src = document.getElementById(`present_${f}`);
                    const dst = document.getElementById(`permanent_${f}`);
                    if (src && dst) {
                        // Clone options first, then set value
                        dst.innerHTML = src.innerHTML;
                        dst.value = src.value;
                    }
                });
                // Copy text inputs
                textFields.forEach(f => {
                    const src = document.getElementById(`present_${f}`);
                    const dst = document.getElementById(`permanent_${f}`);
                    if (src && dst) dst.value = src.value;
                });
            } else {
                // Reset permanent selects
                fields.forEach(f => {
                    const el = document.getElementById(`permanent_${f}`);
                    if (el) el.innerHTML = `<option value="">-- Select ${f.charAt(0).toUpperCase() + f.slice(1)} --</option>`;
                });
                textFields.forEach(f => {
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
                reader.onload = e => {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        </script>
    </x-admin.shell>
</x-layouts.app>
