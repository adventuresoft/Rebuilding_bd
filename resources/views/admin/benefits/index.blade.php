<x-layouts.app title="Benefit List - সুবিধার তালিকা">
    <x-admin.shell>
        <div class="mx-auto max-w-7xl space-y-5">
            @if (session('success'))
                <div class="rounded-2xl border border-emerald-500/30 bg-emerald-50 p-3.5 text-emerald-800 flex items-center justify-between shadow-2xs">
                    <div class="flex items-center gap-2.5">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span class="font-bold text-xs">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <!-- Stats Summary Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3.5">
                <div class="rounded-2xl bg-white p-4 border border-slate-200/80 shadow-2xs flex items-center justify-between">
                    <div>
                        <div class="text-[10.5px] font-bold text-slate-400 uppercase tracking-wider">মোট সুবিধা বরাদ্দ</div>
                        <div class="text-lg sm:text-xl font-black text-slate-800 mt-0.5">{{ number_format($stats['total'] ?? 0) }} টি</div>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-lg font-bold">🎁</div>
                </div>

                <div class="rounded-2xl bg-white p-4 border border-slate-200/80 shadow-2xs flex items-center justify-between">
                    <div>
                        <div class="text-[10.5px] font-bold text-slate-400 uppercase tracking-wider">মোট আর্থিক বরাদ্দ</div>
                        <div class="text-lg sm:text-xl font-black text-[#00551c] mt-0.5">৳ {{ number_format($stats['total_amount'] ?? 0, 2) }}</div>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-emerald-50 text-[#00551c] flex items-center justify-center text-lg font-bold">৳</div>
                </div>

                <div class="rounded-2xl bg-white p-4 border border-slate-200/80 shadow-2xs flex items-center justify-between">
                    <div>
                        <div class="text-[10.5px] font-bold text-slate-400 uppercase tracking-wider">অনুমোদিত (Approved)</div>
                        <div class="text-lg sm:text-xl font-black text-emerald-600 mt-0.5">{{ number_format($stats['approved'] ?? 0) }} টি</div>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-lg font-bold">✓</div>
                </div>

                <div class="rounded-2xl bg-white p-4 border border-slate-200/80 shadow-2xs flex items-center justify-between">
                    <div>
                        <div class="text-[10.5px] font-bold text-slate-400 uppercase tracking-wider">প্রদানকৃত (Paid/Disbursed)</div>
                        <div class="text-lg sm:text-xl font-black text-blue-600 mt-0.5">{{ number_format($stats['paid'] ?? 0) }} টি</div>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-lg font-bold">💳</div>
                </div>
            </div>

            <!-- Header Bar -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-1">
                <div>
                    <h1 class="text-sm sm:text-base font-black tracking-wider uppercase text-slate-700">
                        প্রদত্ত সুবিধার তালিকা ও ব্যবস্থাপনা (Benefit Management List)
                    </h1>
                    <p class="text-[11px] font-semibold text-slate-500 mt-0.5">জুলাই ২৪ মুক্তিযোদ্ধা ও নাগরিকদের প্রদত্ত সকল সরকারি সুযোগ-সুবিধা ও অনুদানের তথ্য</p>
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{ route('admin.benefits.create') }}" class="rounded-xl bg-[#00551c] hover:bg-[#004416] px-4 py-2 text-[11px] font-extrabold text-white tracking-wider uppercase transition shadow-md flex items-center gap-1.5">
                        <span class="text-sm leading-none">+</span>
                        <span>নতুন সুবিধা বরাদ্দ (CREATE)</span>
                    </a>
                </div>
            </div>

            <!-- Main White Card -->
            <div class="rounded-3xl bg-white p-5 shadow-2xs border border-slate-200/80">
                
                <!-- Filter & Search Bar -->
                <form action="{{ route('admin.benefits.index') }}" method="get" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-2.5 mb-5">
                    <div>
                        <input type="text" name="q" value="{{ $search ?? '' }}" placeholder="নাম, ফোন, NID বা সুবিধার নাম খুঁজুন..." class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2 text-xs text-slate-700 placeholder-slate-400 focus:border-[#00551c] focus:outline-none focus:ring-2 focus:ring-emerald-100 font-medium">
                    </div>

                    <div>
                        <select name="type" id="filter_type" onchange="updateFilterCategories(); this.form.submit();" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2 text-xs text-slate-700 focus:border-[#00551c] focus:outline-none focus:ring-2 focus:ring-emerald-100 font-medium">
                            <option value="">সকল ধরন (All Types)</option>
                            <option value="আর্থিক সুবিধা (Financial Aid)" {{ ($selectedType ?? '') === 'আর্থিক সুবিধা (Financial Aid)' ? 'selected' : '' }}>আর্থিক সুবিধা (Financial Aid)</option>
                            <option value="চিকিৎসা সহায়তা (Medical Assistance)" {{ ($selectedType ?? '') === 'চিকিৎসা সহায়তা (Medical Assistance)' ? 'selected' : '' }}>চিকিৎসা সহায়তা (Medical Assistance)</option>
                            <option value="শিক্ষা বৃত্তি (Educational Scholarship)" {{ ($selectedType ?? '') === 'শিক্ষা বৃত্তি (Educational Scholarship)' ? 'selected' : '' }}>শিক্ষা বৃত্তি (Educational Scholarship)</option>
                            <option value="কর্মসংস্থান ও চাকরি (Employment Opportunity)" {{ ($selectedType ?? '') === 'কর্মসংস্থান ও চাকরি (Employment Opportunity)' ? 'selected' : '' }}>কর্মসংস্থান ও চাকরি (Employment Opportunity)</option>
                            <option value="আবাসন সুবিধা (Housing Support)" {{ ($selectedType ?? '') === 'আবাসন সুবিধা (Housing Support)' ? 'selected' : '' }}>আবাসন সুবিধা (Housing Support)</option>
                            <option value="পুনর্বাসন সহায়তা (Rehabilitation Support)" {{ ($selectedType ?? '') === 'পুনর্বাসন সহায়তা (Rehabilitation Support)' ? 'selected' : '' }}>পুনর্বাসন সহায়তা (Rehabilitation Support)</option>
                            <option value="অন্যান্য সুবিধা (Other Benefit)" {{ ($selectedType ?? '') === 'অন্যান্য সুবিধা (Other Benefit)' ? 'selected' : '' }}>অন্যান্য সুবিধা (Other Benefit)</option>
                        </select>
                    </div>

                    <div>
                        <select name="category" id="filter_category" onchange="this.form.submit()" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2 text-xs text-slate-700 focus:border-[#00551c] focus:outline-none focus:ring-2 focus:ring-emerald-100 font-medium">
                            <option value="">সকল ক্যাটাগরি (All Categories)</option>
                        </select>
                    </div>

                    <div>
                        <select name="status" onchange="this.form.submit()" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2 text-xs text-slate-700 focus:border-[#00551c] focus:outline-none focus:ring-2 focus:ring-emerald-100 font-medium">
                            <option value="">সকল স্ট্যাটাস (All Status)</option>
                            <option value="Approved" {{ ($selectedStatus ?? '') === 'Approved' ? 'selected' : '' }}>Approved (অনুমোদিত)</option>
                            <option value="Paid" {{ ($selectedStatus ?? '') === 'Paid' ? 'selected' : '' }}>Paid (প্রদানকৃত)</option>
                            <option value="Pending" {{ ($selectedStatus ?? '') === 'Pending' ? 'selected' : '' }}>Pending (প্রক্রিয়াধীন)</option>
                            <option value="Hold" {{ ($selectedStatus ?? '') === 'Hold' ? 'selected' : '' }}>Hold (স্থগিত)</option>
                        </select>
                    </div>

                    <div class="flex gap-2">
                        <button type="submit" class="flex-1 rounded-xl bg-slate-800 text-white px-3 py-2 text-[11px] font-bold uppercase tracking-wider transition hover:bg-slate-900">Search</button>
                        <a href="{{ route('admin.benefits.index') }}" title="Reset Filters" class="rounded-xl border border-slate-200 bg-slate-50 hover:bg-slate-100 text-slate-600 font-bold px-3 py-2 flex items-center justify-center transition text-xs">
                            ↻
                        </a>
                    </div>
                </form>

                <!-- Data Table -->
                <div class="overflow-x-auto rounded-2xl border border-slate-200/80">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-100/80 text-[10px] font-black uppercase tracking-wider text-slate-600 border-b border-slate-200">
                                <th class="py-3 px-3.5"># ID / তারিখ</th>
                                <th class="py-3 px-3.5">সুবিধাভোগী (Beneficiary)</th>
                                <th class="py-3 px-3.5">সুবিধার নাম ও শিরোনাম</th>
                                <th class="py-3 px-3.5">ধরন ও ক্যাটাগরি</th>
                                <th class="py-3 px-3.5 text-right">পরিমাণ (BDT) ও মাধ্যম</th>
                                <th class="py-3 px-3.5 text-center">স্ট্যাটাস</th>
                                <th class="py-3 px-3.5 text-center">অ্যাকশন</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 text-[11px] text-slate-700">
                            @forelse ($benefits as $benefit)
                                <tr class="hover:bg-slate-50/80 transition">
                                    <td class="py-3.5 px-3.5 font-bold text-slate-800">
                                        <div>#BN-{{ $benefit->id }}</div>
                                        <div class="text-[9.5px] text-slate-400 font-medium mt-0.5">{{ $benefit->approval_date ? $benefit->approval_date->format('d M, Y') : $benefit->created_at->format('d M, Y') }}</div>
                                    </td>
                                    <td class="py-3.5 px-3.5">
                                        @if ($benefit->person)
                                            <div class="font-extrabold text-slate-900 text-xs">{{ $benefit->person->name }}</div>
                                            <div class="text-[10.5px] text-slate-500 mt-0.5">ফোন: {{ $benefit->person->phone ?? 'N/A' }}</div>
                                            @if($benefit->person->nid_number)
                                                <div class="text-[9.5px] text-slate-400">NID: {{ $benefit->person->nid_number }}</div>
                                            @endif
                                        @else
                                            <span class="px-2 py-0.5 rounded-full bg-slate-100 text-slate-600 font-bold text-[9.5px]">সাধারণ / প্যাকেজ বরাদ্দ</span>
                                        @endif
                                    </td>
                                    <td class="py-3.5 px-3.5 font-bold text-slate-800 max-w-xs">
                                        <div class="text-xs">{{ $benefit->title }}</div>
                                        @if($benefit->remarks)
                                            <div class="text-[9.5px] text-slate-400 font-normal mt-0.5 line-clamp-1">{{ $benefit->remarks }}</div>
                                        @endif
                                    </td>
                                    <td class="py-3.5 px-3.5">
                                        <div class="font-bold text-[#00551c] text-xs">{{ $benefit->type_of_benefit }}</div>
                                        <div class="text-[10px] text-slate-500 mt-0.5">{{ $benefit->category }}</div>
                                    </td>
                                    <td class="py-3.5 px-3.5 text-right font-black">
                                        @if($benefit->amount > 0)
                                            <div class="text-xs text-slate-900">৳ {{ number_format($benefit->amount, 2) }}</div>
                                            <div class="text-[9.5px] text-slate-500 font-medium mt-0.5">{{ $benefit->payment_method ?? 'নগদ / অন্যান্য' }}</div>
                                        @else
                                            <span class="text-slate-400 font-medium text-[10.5px]">আর্থিক নয়</span>
                                        @endif
                                    </td>
                                    <td class="py-3.5 px-3.5 text-center">
                                        @if($benefit->status === 'Approved')
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[9.5px] font-extrabold bg-emerald-100 text-emerald-800 border border-emerald-300/50">Approved</span>
                                        @elseif($benefit->status === 'Paid')
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[9.5px] font-extrabold bg-blue-100 text-blue-800 border border-blue-300/50">Paid</span>
                                        @elseif($benefit->status === 'Pending')
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[9.5px] font-extrabold bg-amber-100 text-amber-800 border border-amber-300/50">Pending</span>
                                        @else
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[9.5px] font-extrabold bg-red-100 text-red-800 border border-red-300/50">{{ $benefit->status }}</span>
                                        @endif
                                    </td>
                                    <td class="py-3.5 px-3.5 text-center">
                                        <div class="flex items-center justify-center gap-1">
                                            <a href="{{ route('admin.benefits.show', $benefit) }}" class="p-1.5 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-[#00551c] transition" title="View Certificate / Voucher">
                                                👁️
                                            </a>
                                            <a href="{{ route('admin.benefits.edit', $benefit) }}" class="p-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 transition" title="Edit">
                                                ✏️
                                            </a>
                                            <form action="{{ route('admin.benefits.destroy', $benefit) }}" method="POST" onsubmit="return confirm('আপনি কি নিশ্চিত যে এই সুবিধার রেকর্ডটি মুছে ফেলতে চান?');" class="m-0">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-1.5 rounded-lg bg-red-50 hover:bg-red-100 text-red-600 transition" title="Delete">
                                                    🗑️
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="py-10 text-center text-slate-400">
                                        <div class="text-2xl mb-1.5">🎁</div>
                                        <div class="font-bold text-xs text-slate-600">কোনো সুবিধার তথ্য পাওয়া যায়নি</div>
                                        <div class="text-[11px] mt-1">নতুন সুবিধা বরাদ্দ করতে উপরের 'নতুন সুবিধা বরাদ্দ' বাটনে ক্লিক করুন।</div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if ($benefits->hasPages())
                    <div class="mt-5 text-xs">
                        {{ $benefits->links() }}
                    </div>
                @endif

            </div>
        </div>

        <script>
            const benefitCategories = {
                "আর্থিক সুবিধা (Financial Aid)": [
                    "মাসিক ভাতা (Monthly Allowance)",
                    "এককালীন অনুদান (One-time Grant)",
                    "শহীদ পরিবার অনুদান (Martyr Family Grant)",
                    "আহত যোদ্ধা আর্থিক সহায়তা (Injured Fighter Financial Support)",
                    "বিশেষ আর্থিক অনুদান (Special Financial Aid)"
                ],
                "চিকিৎসা সহায়তা (Medical Assistance)": [
                    "জরুরি চিকিৎসা অনুদান (Emergency Medical Support)",
                    "দেশে বিনামূল্যে চিকিৎসা সেবা (Free Domestic Medical Treatment)",
                    "বিদেশে উন্নত চিকিৎসা সহায়তা (Foreign Specialized Treatment Support)",
                    "ঔষধ ও অস্ত্রোপচার খরচ (Medicine & Surgery Cover)",
                    "কৃত্রিম অঙ্গ সংযোজন সহায়তা (Prosthetic Limb Support)",
                    "দীর্ঘমেয়াদী থেরাপি ও পুনর্বাসন চিকিৎসা (Long-term Therapy & Rehab)"
                ],
                "শিক্ষা বৃত্তি (Educational Scholarship)": [
                    "মাসিক শিক্ষা বৃত্তি (Monthly Educational Stipend)",
                    "বাৎসরিক বৃত্তি (Annual Scholarship)",
                    "বিশ্ববিদ্যালয় ও উচ্চশিক্ষা অনুদান (University & Higher Education Grant)",
                    "টিউশন ফি মওকুফ সুবিধা (Tuition Fee Waiver Support)",
                    "শিক্ষা উপকরণ ও ল্যাপটপ সহায়তা (Educational Tools & Laptop Grant)"
                ],
                "কর্মসংস্থান ও চাকরি (Employment Opportunity)": [
                    "সরকারি চাকরিতে বিশেষ কোটা সুবিধা (Special Government Job Quota)",
                    "আধা-সরকারি বা স্বায়ত্তশাসিত প্রতিষ্ঠানে নিয়োগ (Semi-Govt / Autonomous Job)",
                    "উদ্যোক্তা ও ব্যবসা অনুদান (Entrepreneurship & Business Capital Grant)",
                    "আত্মকর্মসংস্থান ও ক্ষুদ্রঋণ সুবিধা (Self-Employment & Microloan Support)"
                ],
                "আবাসন সুবিধা (Housing Support)": [
                    "সরকারি খাস জমি বরাদ্দ (Government Land Allocation)",
                    "বিনামূল্যে সরকারি আবাসন / ফ্ল্যাট প্রদান (Free Government Apartment/Housing)",
                    "ঘর নির্মাণ অনুদান (House Construction Grant)",
                    "গৃহ মেরামত ও সংস্কার সহায়তা (Home Renovation Support)"
                ],
                "পুনর্বাসন সহায়তা (Rehabilitation Support)": [
                    "কর্মদক্ষতা ও কারিগরি প্রশিক্ষণ (Technical & Vocational Training)",
                    "মানসিক স্বাস্থ্য ও ট্রমা কাউন্সেলিং সেবা (Mental Health & Trauma Counseling)",
                    "সামাজিক পুনর্বাসন ও আইনি সহায়তা (Social Rehabilitation & Legal Aid)",
                    "আজীবন বিশেষ নিরাপত্তা ও সহায়তা (Lifetime Protection & Support)"
                ],
                "অন্যান্য সুবিধা (Other Benefit)": [
                    "রাষ্ট্রীয় সম্মাননা ও সনদপত্র (State Honor & Certificate)",
                    "গণপরিবহন ও যাতায়াত সুবিধা (Public Transport & Travel Benefit)",
                    "বিশেষ রেশন বা খাদ্য সহায়তা (Special Ration & Food Allowance)",
                    "অন্যান্য বিশেষ অনুদান (Other Special Assistance)"
                ]
            };

            function updateFilterCategories() {
                const typeSelect = document.getElementById('filter_type');
                const categorySelect = document.getElementById('filter_category');
                const selectedType = typeSelect.value;

                categorySelect.innerHTML = '<option value="">সকল ক্যাটাগরি (All Categories)</option>';
                if (selectedType && benefitCategories[selectedType]) {
                    benefitCategories[selectedType].forEach(cat => {
                        const option = document.createElement('option');
                        option.value = cat;
                        option.textContent = cat;
                        @if(!empty($selectedCategory))
                            if (cat === @json($selectedCategory)) {
                                option.selected = true;
                            }
                        @endif
                        categorySelect.appendChild(option);
                    });
                } else {
                    Object.values(benefitCategories).flat().forEach(cat => {
                        const option = document.createElement('option');
                        option.value = cat;
                        option.textContent = cat;
                        @if(!empty($selectedCategory))
                            if (cat === @json($selectedCategory)) {
                                option.selected = true;
                            }
                        @endif
                        categorySelect.appendChild(option);
                    });
                }
            }

            document.addEventListener('DOMContentLoaded', function() {
                updateFilterCategories();
            });
        </script>
    </x-admin.shell>
</x-layouts.app>
