<x-layouts.app title="Edit Benefit - সুবিধা সম্পাদন">
    <x-admin.shell>
        <div class="mx-auto max-w-4xl space-y-5">
            <!-- Main Card Container -->
            <div class="rounded-3xl bg-white p-6 sm:p-8 shadow-2xs border border-slate-200/80 text-slate-800">
                
                <!-- Header -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-slate-200 pb-4 mb-6 gap-3">
                    <div>
                        <h1 class="text-lg sm:text-xl font-black text-slate-800 tracking-tight">সুবিধা বরাদ্দ সম্পাদন ও আপডেট (Edit Benefit Allocation)</h1>
                        <p class="text-[11px] font-semibold text-slate-500 mt-0.5">বরাদ্দকৃত অনুদান ও সুবিধার তথ্যাবলী সংশোধন করুন</p>
                    </div>
                    <div>
                        <a href="{{ route('admin.benefits.index') }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition shadow-2xs">
                            <span>&larr;</span>
                            <span>সুবিধার তালিকা (List)</span>
                        </a>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="mb-5 rounded-2xl bg-red-50 border border-red-200 p-3.5 text-red-700">
                        <div class="font-extrabold text-xs mb-1 flex items-center gap-1.5">
                            <span>⚠️</span> ফরম জমাদানে কিছু সমস্যা হয়েছে:
                        </div>
                        <ul class="list-disc pl-5 text-[11px] font-semibold space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.benefits.update', $benefit) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Section 1: Beneficiary Selection -->
                    <div class="rounded-2xl border border-emerald-200 bg-emerald-50/40 p-5">
                        <div class="flex items-center gap-2.5 mb-4 border-b border-emerald-200/60 pb-2.5">
                            <span class="w-6 h-6 rounded-lg bg-[#00551c] text-white flex items-center justify-center font-black text-xs shrink-0">১</span>
                            <h2 class="text-sm sm:text-base font-black text-[#00551c]">সুবিধাভোগী নির্বাচন (Beneficiary Selection)</h2>
                        </div>
                        
                        <div>
                            <label for="person_id" class="block text-xs font-bold text-slate-700 mb-1.5">
                                জুলাই ফাইটার / নাগরিক সিলেক্ট করুন <span class="text-slate-400 font-normal">(ঐচ্ছিক বা সাধারণ বরাদ্দের ক্ষেত্রে ফাঁকা রাখুন)</span>
                            </label>
                            <select name="person_id" id="person_id" class="w-full rounded-xl border border-slate-300 bg-white px-3.5 py-2.5 text-xs font-semibold text-slate-800 focus:border-[#00551c] focus:outline-none focus:ring-2 focus:ring-[#00551c]/20 transition shadow-2xs">
                                <option value="">-- সাধারণ বা প্যাকেজ সুবিধা (নির্দিষ্ট ব্যক্তি ছাড়া) --</option>
                                @foreach ($people as $person)
                                    <option value="{{ $person->id }}" {{ (old('person_id', $benefit->person_id) == $person->id) ? 'selected' : '' }}>
                                        {{ $person->name }} | ফোন: {{ $person->phone ?? 'N/A' }} | NID: {{ $person->nid_number ?? 'N/A' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Section 2: Benefit Details -->
                    <div class="rounded-2xl border border-slate-200 bg-slate-50/50 p-5 space-y-4">
                        <div class="flex items-center gap-2.5 border-b border-slate-200 pb-2.5">
                            <span class="w-6 h-6 rounded-lg bg-slate-800 text-white flex items-center justify-center font-black text-xs shrink-0">২</span>
                            <h2 class="text-sm sm:text-base font-black text-slate-800">সুবিধার বিবরণ ও শ্রেণীবিভাগ (Benefit Classification)</h2>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-1">
                            <!-- Type of Benefit -->
                            <div>
                                <label for="type_of_benefit" class="block text-xs font-bold text-slate-700 mb-1.5">
                                    সুবিধার ধরন (Type of Benefit) <span class="text-red-600">*</span>
                                </label>
                                <select name="type_of_benefit" id="type_of_benefit" required onchange="updateCategories()" class="w-full rounded-xl border border-slate-300 bg-white px-3.5 py-2.5 text-xs font-semibold text-slate-800 focus:border-[#00551c] focus:outline-none focus:ring-2 focus:ring-[#00551c]/20 transition shadow-2xs">
                                    @php $currentType = old('type_of_benefit', $benefit->type_of_benefit); @endphp
                                    <option value="আর্থিক সুবিধা (Financial Aid)" {{ $currentType == 'আর্থিক সুবিধা (Financial Aid)' ? 'selected' : '' }}>আর্থিক সুবিধা (Financial Aid)</option>
                                    <option value="চিকিৎসা সহায়তা (Medical Assistance)" {{ $currentType == 'চিকিৎসা সহায়তা (Medical Assistance)' ? 'selected' : '' }}>চিকিৎসা সহায়তা (Medical Assistance)</option>
                                    <option value="শিক্ষা বৃত্তি (Educational Scholarship)" {{ $currentType == 'শিক্ষা বৃত্তি (Educational Scholarship)' ? 'selected' : '' }}>শিক্ষা বৃত্তি (Educational Scholarship)</option>
                                    <option value="কর্মসংস্থান ও চাকরি (Employment Opportunity)" {{ $currentType == 'কর্মসংস্থান ও চাকরি (Employment Opportunity)' ? 'selected' : '' }}>কর্মসংস্থান ও চাকরি (Employment Opportunity)</option>
                                    <option value="আবাসন সুবিধা (Housing Support)" {{ $currentType == 'আবাসন সুবিধা (Housing Support)' ? 'selected' : '' }}>আবাসন সুবিধা (Housing Support)</option>
                                    <option value="পুনর্বাসন সহায়তা (Rehabilitation Support)" {{ $currentType == 'পুনর্বাসন সহায়তা (Rehabilitation Support)' ? 'selected' : '' }}>পুনর্বাসন সহায়তা (Rehabilitation Support)</option>
                                    <option value="অন্যান্য সুবিধা (Other Benefit)" {{ $currentType == 'অন্যান্য সুবিধা (Other Benefit)' ? 'selected' : '' }}>অন্যান্য সুবিধা (Other Benefit)</option>
                                </select>
                            </div>

                            <!-- Category -->
                            <div>
                                <label for="category" class="block text-xs font-bold text-slate-700 mb-1.5">
                                    ক্যাটাগরি (Category) <span class="text-red-600">*</span>
                                </label>
                                <select name="category" id="category" required class="w-full rounded-xl border border-slate-300 bg-white px-3.5 py-2.5 text-xs font-semibold text-slate-800 focus:border-[#00551c] focus:outline-none focus:ring-2 focus:ring-[#00551c]/20 transition shadow-2xs">
                                    <!-- Dynamic options -->
                                </select>
                            </div>
                        </div>

                        <!-- Benefit Title -->
                        <div>
                            <label for="title" class="block text-xs font-bold text-slate-700 mb-1.5">
                                সুবিধার নাম / শিরোনাম (Benefit Title) <span class="text-red-600">*</span>
                            </label>
                            <input type="text" name="title" id="title" value="{{ old('title', $benefit->title) }}" required
                                   class="w-full rounded-xl border border-slate-300 bg-white px-3.5 py-2.5 text-xs font-semibold text-slate-800 focus:border-[#00551c] focus:outline-none focus:ring-2 focus:ring-[#00551c]/20 transition shadow-2xs">
                        </div>
                    </div>

                    <!-- Section 3: Financial & Disbursement Info -->
                    <div class="rounded-2xl border border-amber-200 bg-amber-50/30 p-5 space-y-4">
                        <div class="flex items-center gap-2.5 border-b border-amber-200 pb-2.5">
                            <span class="w-6 h-6 rounded-lg bg-amber-600 text-white flex items-center justify-center font-black text-xs shrink-0">৩</span>
                            <h2 class="text-sm sm:text-base font-black text-amber-900">আর্থিক বরাদ্দ ও মঞ্জুরী তথ্য (Financial & Approval Details)</h2>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-1">
                            <!-- Amount -->
                            <div>
                                <label for="amount" class="block text-xs font-bold text-slate-700 mb-1.5">
                                    পরিমাণ (টাকা - BDT)
                                </label>
                                <div class="flex rounded-xl border border-slate-300 bg-white overflow-hidden shadow-2xs focus-within:border-[#00551c] focus-within:ring-2 focus-within:ring-[#00551c]/20">
                                    <span class="flex items-center justify-center bg-slate-100 px-3.5 border-r border-slate-300 font-extrabold text-slate-600 text-xs shrink-0">৳</span>
                                    <input type="number" step="0.01" name="amount" id="amount" value="{{ old('amount', $benefit->amount) }}"
                                           class="w-full border-0 bg-transparent px-3 py-2.5 text-xs font-bold text-slate-800 focus:ring-0 focus:outline-none">
                                </div>
                            </div>

                            <!-- Payment Method -->
                            <div>
                                <label for="payment_method" class="block text-xs font-bold text-slate-700 mb-1.5">
                                    প্রদানের মাধ্যম (Payment Method)
                                </label>
                                <select name="payment_method" id="payment_method" class="w-full rounded-xl border border-slate-300 bg-white px-3.5 py-2.5 text-xs font-semibold text-slate-800 focus:border-[#00551c] focus:outline-none focus:ring-2 focus:ring-[#00551c]/20 transition shadow-2xs">
                                    @php $currentPayment = old('payment_method', $benefit->payment_method); @endphp
                                    <option value="">-- নির্বাচন করুন --</option>
                                    <option value="Bank Transfer (BEFTN)" {{ $currentPayment == 'Bank Transfer (BEFTN)' ? 'selected' : '' }}>ব্যাংক ট্রান্সফার (Bank Transfer - BEFTN)</option>
                                    <option value="Mobile Banking (bKash/Nagad)" {{ $currentPayment == 'Mobile Banking (bKash/Nagad)' ? 'selected' : '' }}>মোবাইল ব্যাংকিং (bKash / Nagad / Rocket)</option>
                                    <option value="Account Payee Cheque" {{ $currentPayment == 'Account Payee Cheque' ? 'selected' : '' }}>চেক (Account Payee Cheque)</option>
                                    <option value="Direct Cash / Voucher" {{ $currentPayment == 'Direct Cash / Voucher' ? 'selected' : '' }}>নগদ প্রদান (Direct Cash)</option>
                                </select>
                            </div>

                            <!-- Approval Date -->
                            <div>
                                <label for="approval_date" class="block text-xs font-bold text-slate-700 mb-1.5">
                                    মঞ্জুরীর তারিখ (Approval Date)
                                </label>
                                <input type="date" name="approval_date" id="approval_date" value="{{ old('approval_date', $benefit->approval_date?->format('Y-m-d')) }}"
                                       class="w-full rounded-xl border border-slate-300 bg-white px-3.5 py-2.5 text-xs font-semibold text-slate-800 focus:border-[#00551c] focus:outline-none focus:ring-2 focus:ring-[#00551c]/20 transition shadow-2xs">
                            </div>
                        </div>

                        <!-- Status Selection -->
                        <div class="pt-2">
                            <label class="block text-xs font-bold text-slate-700 mb-2">
                                স্ট্যাটাস (Disbursement Status) <span class="text-red-600">*</span>
                            </label>
                            @php $currentStatus = old('status', $benefit->status); @endphp
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-2.5">
                                <label class="flex items-center gap-2 cursor-pointer bg-white border border-slate-300 rounded-xl px-3 py-2.5 hover:border-emerald-500 transition">
                                    <input type="radio" name="status" value="Approved" {{ $currentStatus == 'Approved' ? 'checked' : '' }} class="w-4 h-4 text-[#00551c] focus:ring-[#00551c]">
                                    <span class="text-xs font-extrabold text-emerald-800">Approved (অনুমোদিত)</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer bg-white border border-slate-300 rounded-xl px-3 py-2.5 hover:border-blue-500 transition">
                                    <input type="radio" name="status" value="Paid" {{ $currentStatus == 'Paid' ? 'checked' : '' }} class="w-4 h-4 text-blue-600 focus:ring-blue-600">
                                    <span class="text-xs font-extrabold text-blue-800">Paid (প্রদানকৃত)</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer bg-white border border-slate-300 rounded-xl px-3 py-2.5 hover:border-amber-500 transition">
                                    <input type="radio" name="status" value="Pending" {{ $currentStatus == 'Pending' ? 'checked' : '' }} class="w-4 h-4 text-amber-600 focus:ring-amber-600">
                                    <span class="text-xs font-extrabold text-amber-800">Pending (প্রক্রিয়াধীন)</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer bg-white border border-slate-300 rounded-xl px-3 py-2.5 hover:border-red-500 transition">
                                    <input type="radio" name="status" value="Hold" {{ $currentStatus == 'Hold' ? 'checked' : '' }} class="w-4 h-4 text-red-600 focus:ring-red-600">
                                    <span class="text-xs font-extrabold text-red-800">Hold (স্থগিত)</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Section 4: Remarks -->
                    <div class="rounded-2xl border border-slate-200 bg-slate-50/50 p-5">
                        <label for="remarks" class="block text-xs font-bold text-slate-700 mb-1.5">
                            বিশেষ মন্তব্য বা নির্দেশাবলী (Remarks / Notes)
                        </label>
                        <textarea name="remarks" id="remarks" rows="3"
                                  class="w-full rounded-xl border border-slate-300 bg-white px-3.5 py-2.5 text-xs font-semibold text-slate-800 focus:border-[#00551c] focus:outline-none focus:ring-2 focus:ring-[#00551c]/20 transition shadow-2xs">{{ old('remarks', $benefit->remarks) }}</textarea>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-200">
                        <a href="{{ route('admin.benefits.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-300 bg-white hover:bg-slate-50 text-slate-700 font-bold text-xs transition shadow-2xs">
                            বাতিল করুন (Cancel)
                        </a>
                        <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#00551c] hover:bg-[#004416] text-white font-extrabold text-xs transition shadow-md flex items-center gap-1.5">
                            <span>✓</span>
                            <span>আপডেট সংরক্ষণ করুন (Update Benefit)</span>
                        </button>
                    </div>

                </form>

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

            function updateCategories(selectedCategory = null) {
                const typeSelect = document.getElementById('type_of_benefit');
                const categorySelect = document.getElementById('category');
                const selectedType = typeSelect.value;
                const categories = benefitCategories[selectedType] || ["সাধারণ অনুদান (General Grant)"];

                categorySelect.innerHTML = '';
                categories.forEach(cat => {
                    const option = document.createElement('option');
                    option.value = cat;
                    option.textContent = cat;
                    if (selectedCategory && selectedCategory === cat) {
                        option.selected = true;
                    }
                    categorySelect.appendChild(option);
                });
            }

            document.addEventListener('DOMContentLoaded', function() {
                const existingCategory = @json(old('category', $benefit->category));
                updateCategories(existingCategory);
            });
        </script>
    </x-admin.shell>
</x-layouts.app>
