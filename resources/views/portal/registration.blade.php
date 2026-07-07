<x-layouts.app title="জুলাই ২৪ ফাইটার আবেদন ফর্ম (Public Registration)">
    <!-- OFFICIAL GOVT TOPBAR -->
    <div class="bg-[#00551c] text-white text-[11px] font-medium py-1.5 px-4 border-b border-emerald-800">
        <div class="max-w-5xl mx-auto flex flex-wrap items-center justify-between gap-2">
            <div class="flex items-center gap-2">
                <img src="{{ asset('govt-bd-logo.png') }}" alt="BD Logo" class="w-4 h-4 object-contain brightness-200">
                <span class="font-bold tracking-wide">গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</span>
                <span class="text-emerald-300 hidden sm:inline">|</span>
                <span class="text-emerald-100 hidden sm:inline">Government of the People's Republic of Bangladesh</span>
            </div>
            <div class="flex items-center gap-4 text-emerald-100">
                <span>{{ date('l, d M Y') }}</span>
                <span class="flex items-center gap-1.5 bg-emerald-900/60 px-2 py-0.5 rounded text-[10px] border border-emerald-700">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                    অনলাইন আবেদন পোর্টাল
                </span>
            </div>
        </div>
    </div>

    <!-- MAIN NAVBAR -->
    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-200/80 shadow-sm">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 h-16 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-full bg-emerald-50 border border-emerald-600/30 p-1 flex items-center justify-center shadow-xs group-hover:scale-105 transition">
                    <img src="{{ asset('govt-bd-logo.png') }}" alt="Govt Logo" class="w-8 h-8 object-contain">
                </div>
                <div>
                    <h1 class="text-sm sm:text-base font-extrabold text-[#00551c] leading-tight">রিবিল্ডিং বাংলাদেশ</h1>
                    <p class="text-[10px] sm:text-[11px] font-semibold text-slate-500 tracking-wider">Rebuilding Bangladesh</p>
                </div>
            </a>
            <a href="{{ route('home') }}" class="rounded-lg border border-slate-300 bg-white hover:bg-slate-50 px-4 py-2 text-xs font-bold text-slate-700 transition">
                &larr; মূল পাতা (Home)
            </a>
        </div>
    </header>

    <!-- FORM CONTAINER -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 py-8">
        <div class="mb-8 text-center bg-white rounded-3xl p-6 sm:p-8 shadow-sm border border-slate-200/80">
            <span class="inline-block px-3 py-1 rounded-full bg-emerald-100 text-[#00551c] text-xs font-extrabold mb-3">
                🇧🇩 উন্মুক্ত নাগরিক আবেদন ফর্ম (Public Registration)
            </span>
            <h2 class="text-lg sm:text-xl font-bold text-slate-900">জুলাই ২০২৪ অভ্যুত্থানের যোদ্ধা ও নাগরিক নিবন্ধন</h2>
            <p class="mt-2 text-xs sm:text-sm text-slate-600 max-w-2xl mx-auto">
                নিচের সকল তথ্য সঠিক ও নির্ভুলভাবে পূরণ করুন। আবেদনটি জমাদানের পর যাচাই-বাছাইয়ের জন্য প্রশাসনিক তালিকায় (Applicant List) প্রেরণ করা হবে।
            </p>
        </div>

        @if ($errors->any())
            <div class="mb-6 rounded-2xl border border-red-500/30 bg-red-50 p-4 text-red-800 shadow-sm">
                <div class="font-bold text-sm mb-1">দয়া করে নিচের ত্রুটিগুলো সংশোধন করুন:</div>
                <ul class="list-disc list-inside text-xs space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="public-july-fighter-form" method="post" action="{{ route('portal.register.store') }}" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <!-- SECTION 1: PERSONAL INFORMATION -->
            <div class="rounded-3xl bg-white p-6 sm:p-8 shadow-sm border border-slate-200/80">
                <div class="border-b border-slate-200 pb-4 mb-6 flex items-center gap-3">
                    <span class="w-8 h-8 rounded-full bg-[#00551c] text-white font-bold flex items-center justify-center text-sm">১</span>
                    <h3 class="text-lg font-black text-slate-800">ব্যক্তিগত তথ্য (Personal Information)</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Name (English) <span class="text-red-500">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" required placeholder="Ex: Tareq Jamil" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">নাম (বাংলা) <span class="text-red-500">*</span></label>
                        <input type="text" name="name_bangla" value="{{ old('name_bangla') }}" placeholder="উদাঃ তারেক জামিল" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">জন্ম তারিখ (Date of Birth) <span class="text-red-500">*</span></label>
                        <input type="date" name="date_of_birth" id="dob_input" value="{{ old('date_of_birth') }}" onchange="calculateAge(this.value)" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">বয়স (Age)</label>
                        <input type="text" id="age_input" readonly placeholder="Auto calculated" class="w-full rounded-xl border border-slate-200 bg-slate-100 px-3.5 py-2.5 text-sm text-slate-500 cursor-not-allowed font-medium">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">জন্মস্থান (Birth Place)</label>
                        <select name="birth_place" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            <option value="">Select Birth Place</option>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Chattogram">Chattogram</option>
                            <option value="Rajshahi">Rajshahi</option>
                            <option value="Khulna">Khulna</option>
                            <option value="Barishal">Barishal</option>
                            <option value="Sylhet">Sylhet</option>
                            <option value="Rangpur">Rangpur</option>
                            <option value="Mymensingh">Mymensingh</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">লিঙ্গ (Gender) <span class="text-red-500">*</span></label>
                        <select name="gender" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">বৈবাহিক অবস্থা (Marital Status)</label>
                        <select name="marital_status" id="marital_status_select" onchange="toggleMaritalFields()" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            <option value="Unmarried">Unmarried</option>
                            <option value="Married">Married</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Widowed">Widowed</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">মোবাইল নম্বর (Phone Number) <span class="text-red-500">*</span></label>
                        <input type="text" name="phone" value="{{ old('phone') }}" required placeholder="Ex: 017xxxxxxxx" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">জাতীয় পরিচয়পত্র নম্বর (NID Number)</label>
                        <input type="text" name="nid_number" value="{{ old('nid_number') }}" placeholder="Enter 10 or 17 digit NID" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">রক্তের গ্রুপ (Blood Group)</label>
                        <select name="blood_group" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            <option value="">Select Group</option>
                            <option value="A+">A+</option><option value="A-">A-</option>
                            <option value="B+">B+</option><option value="B-">B-</option>
                            <option value="AB+">AB+</option><option value="AB-">AB-</option>
                            <option value="O+">O+</option><option value="O-">O-</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- SECTION 2: FAMILY INFORMATION -->
            <div class="rounded-3xl bg-white p-6 sm:p-8 shadow-sm border border-slate-200/80">
                <div class="border-b border-slate-200 pb-4 mb-6 flex items-center gap-3">
                    <span class="w-8 h-8 rounded-full bg-[#00551c] text-white font-bold flex items-center justify-center text-sm">২</span>
                    <h3 class="text-lg font-black text-slate-800">পারিবারিক তথ্য (Family Information)</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Family Member Type</label>
                        <select name="family_member_type" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            <option value="Self">Self</option>
                            <option value="Father">Father</option>
                            <option value="Mother">Mother</option>
                            <option value="Spouse">Spouse</option>
                            <option value="Child">Child</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Father's Name (English)</label>
                        <input type="text" name="father_name" value="{{ old('father_name') }}" placeholder="Father's Name in English" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">পিতার নাম (বাংলা)</label>
                        <input type="text" name="father_name_bangla" value="{{ old('father_name_bangla') }}" placeholder="পিতার নাম বাংলায়" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Father's Live Status</label>
                        <select name="father_live_status" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            <option value="Alive">Alive</option>
                            <option value="Deceased">Deceased</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Father's NID</label>
                        <input type="text" name="father_id" value="{{ old('father_id') }}" placeholder="Father's NID Number" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Mother's Name (English)</label>
                        <input type="text" name="mother_name" value="{{ old('mother_name') }}" placeholder="Mother's Name in English" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">মাতার নাম (বাংলা)</label>
                        <input type="text" name="mother_name_bangla" value="{{ old('mother_name_bangla') }}" placeholder="মাতার নাম বাংলায়" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Mother's Live Status</label>
                        <select name="mother_live_status" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            <option value="Alive">Alive</option>
                            <option value="Deceased">Deceased</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Mother's NID</label>
                        <input type="text" name="mother_id" value="{{ old('mother_id') }}" placeholder="Mother's NID Number" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                </div>

                <!-- Marital Dependent Fields -->
                <div id="marital-dependent-fields" class="hidden mt-6 pt-6 border-t border-slate-200 grid grid-cols-1 md:grid-cols-4 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Spouse Name (English)</label>
                        <input type="text" name="spouse_name" value="{{ old('spouse_name') }}" placeholder="Spouse Name" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Spouse Name (Bangla)</label>
                        <input type="text" name="spouse_name_bangla" value="{{ old('spouse_name_bangla') }}" placeholder="Spouse Name in Bangla" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Spouse's NID</label>
                        <input type="text" name="spouse_nid" value="{{ old('spouse_nid') }}" placeholder="Spouse's NID" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Married Date</label>
                        <input type="date" name="married_date" value="{{ old('married_date') }}" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                </div>

                <div class="mt-6 pt-6 border-t border-slate-200 grid grid-cols-1 md:grid-cols-3 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Have any children?</label>
                        <select name="have_children" id="have_children_select" onchange="toggleChildrenSection()" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <div id="boys_count_div" class="hidden">
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Number of Boys</label>
                        <input type="number" min="0" max="10" name="number_of_boys" id="num_boys" value="{{ old('number_of_boys', 0) }}" oninput="renderBoys()" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                    <div id="girls_count_div" class="hidden">
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Number of Girls</label>
                        <input type="number" min="0" max="10" name="number_of_girls" id="num_girls" value="{{ old('number_of_girls', 0) }}" oninput="renderGirls()" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                </div>

                <!-- Dynamic Boys & Girls List -->
                <div id="boys_container" class="mt-4 space-y-3"></div>
                <div id="girls_container" class="mt-4 space-y-3"></div>

                <div class="mt-6 pt-6 border-t border-slate-200 grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Monthly Family Income (BDT)</label>
                        <input type="number" step="0.01" name="monthly_family_income" value="{{ old('monthly_family_income') }}" placeholder="Ex: 35000" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Guardian / Additional Notes</label>
                        <input type="text" name="guardian_notes" value="{{ old('guardian_notes') }}" placeholder="Any relevant notes..." class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                </div>
            </div>

            <!-- SECTION 3: ADDRESS INFORMATION -->
            <div class="rounded-3xl bg-white p-6 sm:p-8 shadow-sm border border-slate-200/80">
                <div class="border-b border-slate-200 pb-4 mb-6 flex items-center gap-3">
                    <span class="w-8 h-8 rounded-full bg-[#00551c] text-white font-bold flex items-center justify-center text-sm">৩</span>
                    <h3 class="text-lg font-black text-slate-800">ঠিকানা তথ্য (Address Information)</h3>
                </div>

                <h4 class="text-sm font-extrabold text-[#00551c] uppercase tracking-wider mb-4 flex items-center gap-2">
                    <span>🏠 স্থায়ী ঠিকানা (Permanent Address)</span>
                </h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5 mb-6">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">বিভাগ (Division) <span class="text-red-500">*</span></label>
                        <select id="perm_division" name="permanent_division_id" onchange="fetchDistricts(this.value, 'perm')" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            <option value="">বিভাগ নির্বাচন করুন</option>
                            @foreach($divisions as $div)
                                <option value="{{ $div->id }}">{{ $div->bn_name ?: $div->name }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" id="perm_division_name" name="division" value="">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">জেলা (District) <span class="text-red-500">*</span></label>
                        <select id="perm_district" name="permanent_district_id" onchange="fetchThanas(this.value, 'perm')" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            <option value="">জেলা নির্বাচন করুন</option>
                        </select>
                        <input type="hidden" id="perm_district_name" name="district" value="">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">থানা / উপজেলা (Thana/Upazila) <span class="text-red-500">*</span></label>
                        <select id="perm_thana" name="permanent_thana_id" onchange="fetchPostAndUnions(this.value, 'perm')" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            <option value="">থানা নির্বাচন করুন</option>
                        </select>
                        <input type="hidden" id="perm_thana_name" name="upazila" value="">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">পোস্ট অফিস (Post Office)</label>
                        <select id="perm_post_office" name="permanent_post_office_id" onchange="updatePermPostName(this)" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            <option value="">পোস্ট অফিস নির্বাচন করুন</option>
                        </select>
                        <input type="hidden" id="perm_post_name" name="postal_code" value="">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">ইউনিয়ন / পৌরসভা (Union/Municipality)</label>
                        <select id="perm_union" name="permanent_union_id" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            <option value="">ইউনিয়ন নির্বাচন করুন</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">গ্রাম / পাড়া / মহল্লা (Village) <span class="text-red-500">*</span></label>
                        <input type="text" id="perm_village" name="permanent_village" value="{{ old('permanent_village') }}" placeholder="গ্রামের নাম লিখুন" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">ওয়ার্ড নং (Ward No)</label>
                        <input type="text" id="perm_ward" name="permanent_ward" value="{{ old('permanent_ward') }}" placeholder="উদাঃ ওয়ার্ড নং ০৫" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">রাস্তা / সড়ক (Road)</label>
                        <input type="text" id="perm_road" name="permanent_road" value="{{ old('permanent_road') }}" placeholder="সড়ক বা রাস্তার নাম/নম্বর" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">বাড়ি / হোল্ডিং (House - English)</label>
                        <input type="text" id="perm_house" name="permanent_house" value="{{ old('permanent_house') }}" placeholder="House No/Holding" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                </div>

                <!-- Checkbox -->
                <div class="my-6 p-4 bg-emerald-50/50 rounded-2xl border border-emerald-200 flex items-center gap-3">
                    <input type="checkbox" id="same_as_perm_check" name="same_as_permanent" value="1" onchange="copyPermanentToPresent(this)" class="w-5 h-5 text-emerald-600 rounded border-slate-300 focus:ring-emerald-500">
                    <label for="same_as_perm_check" class="text-sm font-extrabold text-[#00551c] cursor-pointer">
                        বর্তমান ঠিকানা ও স্থায়ী ঠিকানা একই (Present Address same as Permanent Address)
                    </label>
                </div>

                <h4 class="text-sm font-extrabold text-indigo-800 uppercase tracking-wider mb-4 flex items-center gap-2">
                    <span>🏢 বর্তমান ঠিকানা (Present Address)</span>
                </h4>
                <div id="present_address_box" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">বিভাগ (Division)</label>
                        <select id="pres_division" name="present_division_id" onchange="fetchDistricts(this.value, 'pres')" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            <option value="">বিভাগ নির্বাচন করুন</option>
                            @foreach($divisions as $div)
                                <option value="{{ $div->id }}">{{ $div->bn_name ?: $div->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">জেলা (District)</label>
                        <select id="pres_district" name="present_district_id" onchange="fetchThanas(this.value, 'pres')" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            <option value="">জেলা নির্বাচন করুন</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">থানা / উপজেলা (Thana/Upazila)</label>
                        <select id="pres_thana" name="present_thana_id" onchange="fetchPostAndUnions(this.value, 'pres')" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            <option value="">থানা নির্বাচন করুন</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">পোস্ট অফিস (Post Office)</label>
                        <select id="pres_post_office" name="present_post_office_id" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            <option value="">পোস্ট অফিস নির্বাচন করুন</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">ইউনিয়ন / পৌরসভা (Union/Municipality)</label>
                        <select id="pres_union" name="present_union_id" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            <option value="">ইউনিয়ন নির্বাচন করুন</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">গ্রাম / পাড়া / মহল্লা (Village)</label>
                        <input type="text" id="pres_village" name="present_village" value="{{ old('present_village') }}" placeholder="গ্রামের নাম লিখুন" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">ওয়ার্ড নং (Ward No)</label>
                        <input type="text" id="pres_ward" name="present_ward" value="{{ old('present_ward') }}" placeholder="উদাঃ ওয়ার্ড নং ০৫" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">রাস্তা / সড়ক (Road)</label>
                        <input type="text" id="pres_road" name="present_road" value="{{ old('present_road') }}" placeholder="সড়ক বা রাস্তার নাম/নম্বর" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">বাড়ি / হোল্ডিং (House - English)</label>
                        <input type="text" id="pres_house" name="present_house" value="{{ old('present_house') }}" placeholder="House No/Holding" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                </div>
            </div>

            <!-- SECTION 4: EDUCATION INFORMATION -->
            <div class="rounded-3xl bg-white p-6 sm:p-8 shadow-sm border border-slate-200/80">
                <div class="border-b border-slate-200 pb-4 mb-6 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <span class="w-8 h-8 rounded-full bg-[#00551c] text-white font-bold flex items-center justify-center text-sm">৪</span>
                        <h3 class="text-lg font-black text-slate-800">শিক্ষাগত যোগ্যতা (Education Information)</h3>
                    </div>
                    <button type="button" onclick="addEducationRow()" class="inline-flex items-center gap-1.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 px-4 py-2 text-xs font-extrabold text-white transition shadow-sm">
                        <span>+ Add More Degree</span>
                    </button>
                </div>

                <div class="overflow-x-auto rounded-2xl border border-slate-200/80 bg-slate-50/50">
                    <table class="w-full text-left border-collapse min-w-[750px]">
                        <thead>
                            <tr class="border-b border-slate-200 bg-slate-100 text-[11px] font-black uppercase text-slate-600">
                                <th class="py-3 px-3">Degree / Level</th>
                                <th class="py-3 px-3">Group / Subject</th>
                                <th class="py-3 px-3">Passing Year</th>
                                <th class="py-3 px-3">Institute Name</th>
                                <th class="py-3 px-3 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="education-rows-container" class="divide-y divide-slate-200 bg-white text-sm">
                            <!-- Dynamic rows injected via JS -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- SECTION 5: PROFESSION INFORMATION -->
            <div class="rounded-3xl bg-white p-6 sm:p-8 shadow-sm border border-slate-200/80">
                <div class="border-b border-slate-200 pb-4 mb-6 flex items-center gap-3">
                    <span class="w-8 h-8 rounded-full bg-[#00551c] text-white font-bold flex items-center justify-center text-sm">৫</span>
                    <h3 class="text-lg font-black text-slate-800">পেশাগত তথ্য (Profession Information)</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Profession / Occupation</label>
                        <select name="profession" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            <option value="">Select Profession</option>
                            <option value="Student">Student</option>
                            <option value="Private Service">Private Service</option>
                            <option value="Government Service">Government Service</option>
                            <option value="Business">Business</option>
                            <option value="Teacher / Educator">Teacher / Educator</option>
                            <option value="Doctor / Healthcare">Doctor / Healthcare</option>
                            <option value="Engineer / Tech">Engineer / Tech</option>
                            <option value="Journalist / Media">Journalist / Media</option>
                            <option value="Lawyer / Legal">Lawyer / Legal</option>
                            <option value="Self Employed / Freelancer">Self Employed / Freelancer</option>
                            <option value="Unemployed / Job Seeker">Unemployed / Job Seeker</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Workplace / Organization Name</label>
                        <input type="text" name="workplace" value="{{ old('workplace') }}" placeholder="Ex: Dhaka University, IT Corp..." class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Designation / Role</label>
                        <input type="text" name="designation" value="{{ old('designation') }}" placeholder="Ex: Student, Manager, Officer..." class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Experience (Years)</label>
                        <input type="number" step="0.5" min="0" name="experience_years" value="{{ old('experience_years') }}" placeholder="Ex: 2" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Profession Notes / Description</label>
                        <textarea name="profession_notes" rows="3" placeholder="Brief details about professional responsibilities..." class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">{{ old('profession_notes') }}</textarea>
                    </div>
                </div>
            </div>

            <!-- SECTION 6: TREATMENT INFORMATION -->
            <div class="rounded-3xl bg-white p-6 sm:p-8 shadow-sm border border-slate-200/80">
                <div class="border-b border-slate-200 pb-4 mb-6 flex items-center gap-3">
                    <span class="w-8 h-8 rounded-full bg-[#00551c] text-white font-bold flex items-center justify-center text-sm">৬</span>
                    <h3 class="text-lg font-black text-slate-800">চিকিৎসা সংক্রান্ত তথ্য (Treatment Information)</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">কোথায় চিকিৎসা নেওয়া হয়েছে (Treatment Location)</label>
                        <select name="treatment_location" id="treatment_location_select" onchange="toggleHospitalType()" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            <option value="House">House</option>
                            <option value="Hospital">Hospital</option>
                        </select>
                    </div>
                    <div id="hospital_type_wrapper" class="hidden animate-fadeIn">
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">কন হাসপাতাল (Hospital Type)</label>
                        <select name="hospital_type" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            <option value="Govt. Hospital">Govt. Hospital</option>
                            <option value="Private Hospital">Private Hospital</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Hospital / Clinic Name</label>
                        <input type="text" name="hospital_name" value="{{ old('hospital_name') }}" placeholder="Ex: DMCH, BSMMU, Popular Hospital..." class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Doctor Name</label>
                        <input type="text" name="doctor_name" value="{{ old('doctor_name') }}" placeholder="Attending Doctor's Name" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Current Treatment Status</label>
                        <select name="treatment_status" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            <option value="None">None / Fully Recovered</option>
                            <option value="Under Treatment">Under Treatment</option>
                            <option value="Recovering">Recovering</option>
                            <option value="Critical">Critical</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Medical Expenses / Cost (BDT)</label>
                        <input type="number" step="0.01" name="medical_expenses" value="{{ old('medical_expenses') }}" placeholder="Ex: 50000" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Admission Date</label>
                        <input type="date" name="admission_date" value="{{ old('admission_date') }}" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Release Date</label>
                        <input type="date" name="release_date" value="{{ old('release_date') }}" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Treatment & Surgery Details</label>
                        <textarea name="treatment_details" rows="3" placeholder="Describe medical diagnosis, surgeries performed, medications..." class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">{{ old('treatment_details') }}</textarea>
                    </div>
                </div>
            </div>

            <!-- SECTION 7: JULY 24 FIGHTER INFORMATION -->
            <div class="rounded-3xl bg-white p-6 sm:p-8 shadow-sm border border-slate-200/80">
                <div class="border-b border-slate-200 pb-4 mb-6 flex items-center gap-3">
                    <span class="w-8 h-8 rounded-full bg-[#00551c] text-white font-bold flex items-center justify-center text-sm">৭</span>
                    <h3 class="text-lg font-black text-slate-800">জুলাই ২৪ অভ্যুত্থানে ভূমিকা ও বিবরণ (July 24 Fighter Information)</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Fighter Role / Category</label>
                        <select name="fighter_type" id="fighter_type_select" onchange="toggleFighterDates()" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            <option value="Frontline Protester">Frontline Protester</option>
                            <option value="Student Coordinator">Student Coordinator</option>
                            <option value="Volunteer">Volunteer</option>
                            <option value="Medical Aid Team">Medical Aid Team</option>
                            <option value="Media / Documentation">Media / Documentation</option>
                            <option value="Legal Aid">Legal Aid</option>
                            <option value="Injured Fighter">Injured Fighter</option>
                            <option value="Martyr Family Member">Martyr Family Member</option>
                            <option value="General Participant">General Participant</option>
                        </select>
                    </div>
                    <div id="incident_date_wrapper" class="hidden animate-fadeIn">
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Incident Date</label>
                        <input type="date" name="incident_date" value="{{ old('incident_date') }}" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                    <div id="date_of_death_wrapper" class="hidden animate-fadeIn">
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Date of Death</label>
                        <input type="date" name="date_of_death" value="{{ old('date_of_death') }}" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Incident Location / Area</label>
                        <input type="text" name="incident_location" value="{{ old('incident_location') }}" placeholder="Ex: Shahbagh, Jatrabari, Uttara, Mirpur, Science Lab, Badda..." class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Injury Details (If any)</label>
                        <textarea name="injury_details" rows="3" placeholder="Describe bullet wounds, physical assault details, hospital treatment etc." class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">{{ old('injury_details') }}</textarea>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Contribution Description</label>
                        <textarea name="contribution_description" rows="4" placeholder="Detailed description of participation during the July-August movement..." class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">{{ old('contribution_description') }}</textarea>
                    </div>
                </div>
            </div>

            <!-- SUBMIT BUTTON -->
            <div class="rounded-3xl bg-white p-6 sm:p-8 shadow-sm border border-slate-200/80 text-center">
                <button type="submit" class="w-full sm:w-auto min-w-[280px] rounded-2xl bg-[#00551c] hover:bg-[#003d14] px-10 py-4 text-base font-black text-white shadow-lg hover:shadow-xl transition flex items-center justify-center gap-3 mx-auto">
                    <span>আবেদন জমা দিন (Submit Registration)</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </button>
                <p class="mt-3 text-xs text-slate-500">তথ্য জমাদানের পর আপনার আবেদনটি যাচাইয়ের জন্য সিস্টেমে সংরক্ষিত হবে।</p>
            </div>
        </form>
    </div>

    <!-- JAVASCRIPT SCRIPTS FOR PUBLIC REGISTRATION -->
    <script>
        function calculateAge(birthDateString) {
            if (!birthDateString) return;
            const birthDate = new Date(birthDateString);
            const today = new Date();
            let age = today.getFullYear() - birthDate.getFullYear();
            const m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            const ageInput = document.getElementById('age_input');
            if (ageInput && age >= 0) {
                ageInput.value = age + " Years";
            }
        }

        function toggleMaritalFields() {
            const select = document.getElementById('marital_status_select');
            const container = document.getElementById('marital-dependent-fields');
            if (select && container) {
                if (select.value === 'Unmarried') {
                    container.classList.add('hidden');
                } else {
                    container.classList.remove('hidden');
                }
            }
        }

        function toggleHospitalType() {
            const select = document.getElementById('treatment_location_select');
            const wrapper = document.getElementById('hospital_type_wrapper');
            if (select && wrapper) {
                if (select.value === 'Hospital') {
                    wrapper.classList.remove('hidden');
                } else {
                    wrapper.classList.add('hidden');
                }
            }
        }

        function toggleFighterDates() {
            const select = document.getElementById('fighter_type_select');
            const incWrapper = document.getElementById('incident_date_wrapper');
            const deathWrapper = document.getElementById('date_of_death_wrapper');
            if (select) {
                const val = select.value;
                if (incWrapper) {
                    if (val === 'Injured Fighter' || val === 'Martyr Family Member') {
                        incWrapper.classList.remove('hidden');
                    } else {
                        incWrapper.classList.add('hidden');
                    }
                }
                if (deathWrapper) {
                    if (val === 'Martyr Family Member') {
                        deathWrapper.classList.remove('hidden');
                    } else {
                        deathWrapper.classList.add('hidden');
                    }
                }
            }
        }

        function toggleChildrenSection() {
            const select = document.getElementById('have_children_select');
            const boysDiv = document.getElementById('boys_count_div');
            const girlsDiv = document.getElementById('girls_count_div');
            const boysCont = document.getElementById('boys_container');
            const girlsCont = document.getElementById('girls_container');
            
            if (select && select.value === '1') {
                if(boysDiv) boysDiv.classList.remove('hidden');
                if(girlsDiv) girlsDiv.classList.remove('hidden');
            } else {
                if(boysDiv) boysDiv.classList.add('hidden');
                if(girlsDiv) girlsDiv.classList.add('hidden');
                const numBoys = document.getElementById('num_boys');
                const numGirls = document.getElementById('num_girls');
                if(numBoys) numBoys.value = 0;
                if(numGirls) numGirls.value = 0;
                if(boysCont) boysCont.innerHTML = '';
                if(girlsCont) girlsCont.innerHTML = '';
            }
        }

        function renderBoys() {
            const countInput = document.getElementById('num_boys');
            const container = document.getElementById('boys_container');
            if(!countInput || !container) return;
            const count = parseInt(countInput.value) || 0;
            container.innerHTML = '';
            if (count > 0) {
                const title = document.createElement('h5');
                title.className = "text-xs font-bold text-indigo-700 uppercase tracking-wider mt-2";
                title.innerText = "Boys Information";
                container.appendChild(title);
            }
            for (let i = 1; i <= count; i++) {
                const row = document.createElement('div');
                row.className = "grid grid-cols-1 sm:grid-cols-2 gap-3 p-3 bg-indigo-50/40 rounded-xl border border-indigo-100";
                row.innerHTML = `
                    <div>
                        <label class="block text-[11px] font-bold text-slate-600 mb-1">Boy ${i} Name</label>
                        <input type="text" name="boys[${i}][name]" placeholder="Enter Boy ${i} Name" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs text-slate-800 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-slate-600 mb-1">Boy ${i} Birth Date</label>
                        <input type="date" name="boys[${i}][dob]" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs text-slate-800 focus:outline-none">
                    </div>
                `;
                container.appendChild(row);
            }
        }

        function renderGirls() {
            const countInput = document.getElementById('num_girls');
            const container = document.getElementById('girls_container');
            if(!countInput || !container) return;
            const count = parseInt(countInput.value) || 0;
            container.innerHTML = '';
            if (count > 0) {
                const title = document.createElement('h5');
                title.className = "text-xs font-bold text-pink-700 uppercase tracking-wider mt-2";
                title.innerText = "Girls Information";
                container.appendChild(title);
            }
            for (let i = 1; i <= count; i++) {
                const row = document.createElement('div');
                row.className = "grid grid-cols-1 sm:grid-cols-2 gap-3 p-3 bg-pink-50/40 rounded-xl border border-pink-100";
                row.innerHTML = `
                    <div>
                        <label class="block text-[11px] font-bold text-slate-600 mb-1">Girl ${i} Name</label>
                        <input type="text" name="girls[${i}][name]" placeholder="Enter Girl ${i} Name" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs text-slate-800 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-slate-600 mb-1">Girl ${i} Birth Date</label>
                        <input type="date" name="girls[${i}][dob]" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs text-slate-800 focus:outline-none">
                    </div>
                `;
                container.appendChild(row);
            }
        }

        let eduIndex = 0;
        function addEducationRow(data = {}) {
            const container = document.getElementById('education-rows-container');
            if (!container) return;
            const idx = eduIndex++;

            const degrees = [
                'PSC / Ebtedayee', 'JSC / JDC', 'SSC / Dakhil / O-Level',
                'HSC / Alim / A-Level', 'Diploma in Engineering / Medical / Agriculture',
                'Bachelor (Pass) / Degree', 'Bachelor (Honours) / B.Sc / B.A / B.Com / BBA',
                'MBBS / BDS / B.Sc Engineering', 'Fazil (Madrasah)',
                'Master\'s / M.Sc / M.A / M.Com / MBA', 'Kamil (Madrasah)',
                'M.Phil', 'Ph.D / Doctorate', 'Other Professional Certification / Degree'
            ];

            let degOpts = '<option value="">Select Degree</option>';
            degrees.forEach(d => {
                const sel = (data.degree === d) ? 'selected' : '';
                degOpts += `<option value="${d}" ${sel}>${d}</option>`;
            });

            const currentYr = new Date().getFullYear();
            let yrOpts = '<option value="">Year</option>';
            for(let y = currentYr; y >= 1960; y--) {
                const sel = (data.passing_year == y) ? 'selected' : '';
                yrOpts += `<option value="${y}" ${sel}>${y}</option>`;
            }

            const rowDiv = document.createElement('tr');
            rowDiv.className = "edu-row-item hover:bg-slate-50/50 transition";
            rowDiv.innerHTML = `
                <td class="py-3 px-3 min-w-[200px]">
                    <select name="educations[${idx}][degree]" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-xs sm:text-sm text-slate-700 focus:border-indigo-500 focus:outline-none shadow-sm font-semibold">
                        ${degOpts}
                    </select>
                </td>
                <td class="py-3 px-3 min-w-[140px]">
                    <input type="text" name="educations[${idx}][group]" value="${data.group || ''}" placeholder="Group/Subject" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-xs sm:text-sm text-slate-700 focus:border-indigo-500 focus:outline-none shadow-sm">
                </td>
                <td class="py-3 px-3 min-w-[100px]">
                    <select name="educations[${idx}][passing_year]" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-xs sm:text-sm text-slate-700 focus:border-indigo-500 focus:outline-none shadow-sm">
                        ${yrOpts}
                    </select>
                </td>
                <td class="py-3 px-3 min-w-[220px]">
                    <input type="text" name="educations[${idx}][institute]" value="${data.institute || ''}" placeholder="Educational Institute" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-xs sm:text-sm text-slate-700 focus:border-indigo-500 focus:outline-none shadow-sm">
                </td>
                <td class="py-3 px-3 min-w-[70px] text-center">
                    <button type="button" onclick="removeEducationRow(this)" title="Delete Row" class="bg-red-600 hover:bg-red-700 text-white w-9 h-9 rounded-lg inline-flex items-center justify-center shadow-sm transition cursor-pointer" style="background-color: #DC2626 !important; color: #ffffff !important;">
                        <svg class="w-4 h-4 font-bold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </td>
            `;
            container.appendChild(rowDiv);
        }

        function removeEducationRow(button) {
            const container = document.getElementById('education-rows-container');
            const row = button.closest('.edu-row-item');
            if (row) {
                row.remove();
            }
            if (container && container.querySelectorAll('.edu-row-item').length === 0) {
                addEducationRow();
            }
        }

        async function fetchDistricts(divisionId, prefix) {
            const distSelect = document.getElementById(prefix + '_district');
            const thanaSelect = document.getElementById(prefix + '_thana');
            const postSelect = document.getElementById(prefix + '_post_office');
            const unionSelect = document.getElementById(prefix + '_union');
            const divNameInput = document.getElementById(prefix + '_division_name');
            const divSelect = document.getElementById(prefix + '_division');

            if (divNameInput && divSelect && divSelect.selectedIndex > 0) {
                divNameInput.value = divSelect.options[divSelect.selectedIndex].text;
            }

            if (distSelect) distSelect.innerHTML = '<option value="">জেলা নির্বাচন করুন</option>';
            if (thanaSelect) thanaSelect.innerHTML = '<option value="">থানা নির্বাচন করুন</option>';
            if (postSelect) postSelect.innerHTML = '<option value="">পোস্ট অফিস নির্বাচন করুন</option>';
            if (unionSelect) unionSelect.innerHTML = '<option value="">ইউনিয়ন নির্বাচন করুন</option>';

            if (!divisionId) return;

            try {
                const res = await fetch(`/locations/districts/${divisionId}`);
                const data = await res.json();
                data.forEach(d => {
                    const opt = document.createElement('option');
                    opt.value = d.id;
                    opt.textContent = d.bn_name || d.name;
                    if (distSelect) distSelect.appendChild(opt);
                });
            } catch (err) {
                console.error(err);
            }
        }

        async function fetchThanas(districtId, prefix) {
            const thanaSelect = document.getElementById(prefix + '_thana');
            const postSelect = document.getElementById(prefix + '_post_office');
            const unionSelect = document.getElementById(prefix + '_union');
            const distNameInput = document.getElementById(prefix + '_district_name');
            const distSelect = document.getElementById(prefix + '_district');

            if (distNameInput && distSelect && distSelect.selectedIndex > 0) {
                distNameInput.value = distSelect.options[distSelect.selectedIndex].text;
            }

            if (thanaSelect) thanaSelect.innerHTML = '<option value="">থানা নির্বাচন করুন</option>';
            if (postSelect) postSelect.innerHTML = '<option value="">পোস্ট অফিস নির্বাচন করুন</option>';
            if (unionSelect) unionSelect.innerHTML = '<option value="">ইউনিয়ন নির্বাচন করুন</option>';

            if (!districtId) return;

            try {
                const res = await fetch(`/locations/thanas/${districtId}`);
                const data = await res.json();
                data.forEach(t => {
                    const opt = document.createElement('option');
                    opt.value = t.id;
                    opt.textContent = t.bn_name || t.name;
                    if (thanaSelect) thanaSelect.appendChild(opt);
                });
            } catch (err) {
                console.error(err);
            }
        }

        async function fetchPostAndUnions(thanaId, prefix) {
            const postSelect = document.getElementById(prefix + '_post_office');
            const unionSelect = document.getElementById(prefix + '_union');
            const thanaNameInput = document.getElementById(prefix + '_thana_name');
            const thanaSelect = document.getElementById(prefix + '_thana');

            if (thanaNameInput && thanaSelect && thanaSelect.selectedIndex > 0) {
                thanaNameInput.value = thanaSelect.options[thanaSelect.selectedIndex].text;
            }

            if (postSelect) postSelect.innerHTML = '<option value="">পোস্ট অফিস নির্বাচন করুন</option>';
            if (unionSelect) unionSelect.innerHTML = '<option value="">ইউনিয়ন নির্বাচন করুন</option>';

            if (!thanaId) return;

            try {
                const [resPost, resUnion] = await Promise.all([
                    fetch(`/locations/post-offices/${thanaId}`),
                    fetch(`/locations/unions/${thanaId}`)
                ]);
                const posts = await resPost.json();
                const unions = await resUnion.json();

                posts.forEach(p => {
                    const opt = document.createElement('option');
                    opt.value = p.id;
                    opt.textContent = `${p.bn_name || p.name} (${p.code || ''})`;
                    opt.dataset.name = p.bn_name || p.name;
                    if (postSelect) postSelect.appendChild(opt);
                });

                unions.forEach(u => {
                    const opt = document.createElement('option');
                    opt.value = u.id;
                    opt.textContent = u.bn_name || u.name;
                    if (unionSelect) unionSelect.appendChild(opt);
                });
            } catch (err) {
                console.error(err);
            }
        }

        function updatePermPostName(select) {
            const input = document.getElementById('perm_post_name');
            if (input && select && select.selectedIndex > 0) {
                input.value = select.options[select.selectedIndex].dataset.name || select.options[select.selectedIndex].text;
            }
        }

        function copyPermanentToPresent(checkbox) {
            const box = document.getElementById('present_address_box');
            if (!box) return;
            if (checkbox.checked) {
                box.classList.add('opacity-40', 'pointer-events-none');
                document.getElementById('pres_division').innerHTML = document.getElementById('perm_division').innerHTML;
                document.getElementById('pres_division').value = document.getElementById('perm_division').value;

                document.getElementById('pres_district').innerHTML = document.getElementById('perm_district').innerHTML;
                document.getElementById('pres_district').value = document.getElementById('perm_district').value;

                document.getElementById('pres_thana').innerHTML = document.getElementById('perm_thana').innerHTML;
                document.getElementById('pres_thana').value = document.getElementById('perm_thana').value;

                document.getElementById('pres_post_office').innerHTML = document.getElementById('perm_post_office').innerHTML;
                document.getElementById('pres_post_office').value = document.getElementById('perm_post_office').value;

                document.getElementById('pres_union').innerHTML = document.getElementById('perm_union').innerHTML;
                document.getElementById('pres_union').value = document.getElementById('perm_union').value;

                document.getElementById('pres_village').value = document.getElementById('perm_village').value;
                document.getElementById('pres_ward').value = document.getElementById('perm_ward').value;
                document.getElementById('pres_road').value = document.getElementById('perm_road').value;
                document.getElementById('pres_house').value = document.getElementById('perm_house').value;
            } else {
                box.classList.remove('opacity-40', 'pointer-events-none');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            toggleMaritalFields();
            toggleHospitalType();
            toggleFighterDates();
            toggleChildrenSection();
            addEducationRow();

            const dobInput = document.getElementById('dob_input');
            if (dobInput && dobInput.value) {
                calculateAge(dobInput.value);
            }
        });
    </script>
</x-layouts.app>
