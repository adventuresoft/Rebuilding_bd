<x-layouts.app title="{{ isset($person) ? 'Edit July Fighter Info' : 'Create July Fighter Info' }}">
    <x-admin.shell>
        <div class="mx-auto max-w-6xl">
            <!-- Main Card Container -->
            <div class="rounded-3xl bg-white p-6 shadow-sm border border-slate-200/80 md:p-10 text-slate-800">
                
                <!-- Header with Title and Breadcrumb -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-slate-200 pb-5 mb-8 gap-3">
                    <h1 id="page-step-title" class="text-2xl font-black text-slate-800 tracking-tight">{{ isset($person) ? 'Edit July Fighter Information' : 'Create July Fighter Information' }}</h1>
                    <div class="text-sm font-semibold text-slate-500 flex items-center gap-1.5">
                        <span class="text-[#00551c]">July Fighter</span>
                        <span>/</span>
                        <span id="page-step-breadcrumb" class="text-slate-700 font-bold">{{ isset($person) ? 'Edit' : 'Create' }}</span>
                    </div>
                </div>

                <!-- 6-Step Stepper Box -->
                <div class="rounded-2xl border border-slate-200/80 bg-slate-50/60 p-4 sm:p-6 mb-8 shadow-inner overflow-x-auto">
                    <div class="min-w-[650px] flex items-center justify-between px-2">
                        
                        <!-- Step 1: Personal -->
                        <div class="flex flex-col items-center cursor-pointer group" onclick="goToStep(1)">
                            <div id="step-icon-1" class="w-12 h-12 rounded-2xl flex items-center justify-center font-bold text-sm transition-all duration-300 bg-indigo-600 text-white shadow-lg shadow-indigo-200">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </div>
                            <span id="step-label-1" class="mt-2 text-[11px] font-bold tracking-wider uppercase text-indigo-600">PERSONAL</span>
                        </div>

                        <!-- Line 1-2 -->
                        <div id="step-line-1" class="h-0.5 flex-1 mx-2 transition-all duration-300 bg-slate-200"></div>

                        <!-- Step 2: Family -->
                        <div class="flex flex-col items-center cursor-pointer group" onclick="goToStep(2)">
                            <div id="step-icon-2" class="w-12 h-12 rounded-2xl flex items-center justify-center font-bold text-sm transition-all duration-300 bg-slate-100 text-slate-400 border border-slate-200">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                            </div>
                            <span id="step-label-2" class="mt-2 text-[11px] font-medium tracking-wider uppercase text-slate-400">FAMILY</span>
                        </div>

                        <!-- Line 2-3 -->
                        <div id="step-line-2" class="h-0.5 flex-1 mx-2 transition-all duration-300 bg-slate-200"></div>

                        <!-- Step 3: Address -->
                        <div class="flex flex-col items-center cursor-pointer group" onclick="goToStep(3)">
                            <div id="step-icon-3" class="w-12 h-12 rounded-2xl flex items-center justify-center font-bold text-sm transition-all duration-300 bg-slate-100 text-slate-400 border border-slate-200">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <span id="step-label-3" class="mt-2 text-[11px] font-medium tracking-wider uppercase text-slate-400">ADDRESS</span>
                        </div>

                        <!-- Line 3-4 -->
                        <div id="step-line-3" class="h-0.5 flex-1 mx-2 transition-all duration-300 bg-slate-200"></div>

                        <!-- Step 4: Education -->
                        <div class="flex flex-col items-center cursor-pointer group" onclick="goToStep(4)">
                            <div id="step-icon-4" class="w-12 h-12 rounded-2xl flex items-center justify-center font-bold text-sm transition-all duration-300 bg-slate-100 text-slate-400 border border-slate-200">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                            </div>
                            <span id="step-label-4" class="mt-2 text-[11px] font-medium tracking-wider uppercase text-slate-400">EDUCATION</span>
                        </div>

                        <!-- Line 4-5 -->
                        <div id="step-line-4" class="h-0.5 flex-1 mx-2 transition-all duration-300 bg-slate-200"></div>

                        <!-- Step 5: Profession -->
                        <div class="flex flex-col items-center cursor-pointer group" onclick="goToStep(5)">
                            <div id="step-icon-5" class="w-12 h-12 rounded-2xl flex items-center justify-center font-bold text-sm transition-all duration-300 bg-slate-100 text-slate-400 border border-slate-200">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <span id="step-label-5" class="mt-2 text-[11px] font-medium tracking-wider uppercase text-slate-400">PROFESSION</span>
                        </div>

                        <!-- Line 5-6 -->
                        <div id="step-line-5" class="h-0.5 flex-1 mx-2 transition-all duration-300 bg-slate-200"></div>

                        <!-- Step 6: Treatment -->
                        <div class="flex flex-col items-center cursor-pointer group" onclick="goToStep(6)">
                            <div id="step-icon-6" class="w-12 h-12 rounded-2xl flex items-center justify-center font-bold text-sm transition-all duration-300 bg-slate-100 text-slate-400 border border-slate-200">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                            </div>
                            <span id="step-label-6" class="mt-2 text-[11px] font-medium tracking-wider uppercase text-slate-400">TREATMENT</span>
                        </div>

                        <!-- Line 6-7 -->
                        <div id="step-line-6" class="h-0.5 flex-1 mx-2 transition-all duration-300 bg-slate-200"></div>

                        <!-- Step 7: July 24 Fighter -->
                        <div class="flex flex-col items-center cursor-pointer group" onclick="goToStep(7)">
                            <div id="step-icon-7" class="w-12 h-12 rounded-2xl flex items-center justify-center font-bold text-sm transition-all duration-300 bg-slate-100 text-slate-400 border border-slate-200">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"/></svg>
                            </div>
                            <span id="step-label-7" class="mt-2 text-[11px] font-medium tracking-wider uppercase text-slate-400">JULY 24 FIGHTER</span>
                        </div>

                    </div>
                </div>

                <!-- FORM START -->
                <form id="july-fighter-create-form" method="post" action="{{ isset($person) ? route('admin.july-fighter.update', $person) : route('admin.july-fighter.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @if(isset($person))
                        @method('PUT')
                    @endif

                    <!-- STEP 1: PERSONAL INFORMATION -->
                    <div id="step-panel-1" class="space-y-6 animate-fadeIn">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Name <span class="text-red-500">*</span></label>
                                <input type="text" name="name" id="name_input" value="{{ old('name', $person->name ?? '') }}" required placeholder="Name English" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Name Bangla <span class="text-red-500">*</span></label>
                                <input type="text" name="name_bangla" value="{{ old('name_bangla', optional($person->personalInfo ?? null)->full_name ?? '') }}" placeholder="Name Bangla" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Date of Birth <span class="text-red-500">*</span></label>
                                <input type="date" name="date_of_birth" id="dob_input" value="{{ old('date_of_birth', optional($person->date_of_birth ?? null)->format('Y-m-d') ?? (optional(optional($person->personalInfo ?? null)->date_of_birth)->format('Y-m-d') ?? '')) }}" onchange="calculateAge(this.value)" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Age</label>
                                <input type="text" id="age_input" readonly placeholder="Auto calculated" class="w-full rounded-xl border border-slate-200 bg-slate-100 px-3.5 py-2.5 text-sm text-slate-500 cursor-not-allowed font-medium">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Birth Place <span class="text-red-500">*</span></label>
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
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Birth Reg. No.</label>
                                <input type="text" name="birth_reg_no" placeholder="Birth Reg. No." class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">NID No.</label>
                                <input type="text" name="nid_number" value="{{ old('nid_number', $person->nid_number ?? '') }}" placeholder="NID No." class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Mobile No. <span class="text-red-500">*</span></label>
                                <input type="text" name="phone" value="{{ old('phone', $person->phone ?? '') }}" required placeholder="017XXXXXXXX" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Email</label>
                                <input type="email" name="email" value="{{ old('email', $person->email ?? '') }}" placeholder="example@gmail.com" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Gender</label>
                                <select name="gender" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Religion</label>
                                <select name="religion" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                    <option value="">Select Religion</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Hinduism">Hinduism</option>
                                    <option value="Buddhism">Buddhism</option>
                                    <option value="Christianity">Christianity</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Blood Group</label>
                                <select name="blood_group" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                    <option value="">Select Blood Group</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            </div>
                            <div class="md:col-span-3 flex flex-col sm:flex-row items-start sm:items-center justify-between p-4 bg-slate-50 rounded-2xl border border-slate-200/80 gap-4">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Photo</label>
                                    <input type="file" name="photo" class="text-sm text-slate-600 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                                </div>
                                <div class="w-20 h-24 bg-slate-200/70 border border-slate-300 rounded-xl flex items-center justify-center text-slate-400">
                                    <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- STEP 2: FAMILY INFORMATION -->
                    <div id="step-panel-2" class="space-y-6 hidden animate-fadeIn">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Family Member Type</label>
                                @php $fMemType = old('family_member_type', optional($person->familyInfo ?? null)->family_member_type); @endphp
                                <select name="family_member_type" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                    <option value="">Select Member Type</option>
                                    <option value="Head of Family" {{ $fMemType === 'Head of Family' ? 'selected' : '' }}>Head of Family</option>
                                    <option value="Dependent" {{ $fMemType === 'Dependent' ? 'selected' : '' }}>Dependent</option>
                                    <option value="Member" {{ $fMemType === 'Member' ? 'selected' : '' }}>Member</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Father's Name</label>
                                <input type="text" name="father_name" value="{{ old('father_name', optional($person->familyInfo ?? null)->father_name ?? optional($person->personalInfo ?? null)->father_name ?? '') }}" placeholder="Father's Name English" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Father's Name (Bangla)</label>
                                <input type="text" name="father_name_bangla" value="{{ old('father_name_bangla', optional($person->familyInfo ?? null)->father_name_bangla ?? '') }}" placeholder="পিতার নাম বাংলা" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Father's Live Status</label>
                                @php $fLive = old('father_live_status', optional($person->familyInfo ?? null)->father_live_status ?? 'Live'); @endphp
                                <select name="father_live_status" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                    <option value="Live" {{ $fLive === 'Live' ? 'selected' : '' }}>Live</option>
                                    <option value="Deceased" {{ $fLive === 'Deceased' ? 'selected' : '' }}>Deceased</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Father's ID</label>
                                <input type="text" name="father_id" value="{{ old('father_id', optional($person->familyInfo ?? null)->father_id ?? '') }}" placeholder="Father's NID" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Mother's Name</label>
                                <input type="text" name="mother_name" value="{{ old('mother_name', optional($person->familyInfo ?? null)->mother_name ?? optional($person->personalInfo ?? null)->mother_name ?? '') }}" placeholder="Mother's Name English" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Mother's Name (Bangla)</label>
                                <input type="text" name="mother_name_bangla" value="{{ old('mother_name_bangla', optional($person->familyInfo ?? null)->mother_name_bangla ?? '') }}" placeholder="মাতার নাম বাংলা" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Mother's Live Status</label>
                                @php $mLive = old('mother_live_status', optional($person->familyInfo ?? null)->mother_live_status ?? 'Live'); @endphp
                                <select name="mother_live_status" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                    <option value="Live" {{ $mLive === 'Live' ? 'selected' : '' }}>Live</option>
                                    <option value="Deceased" {{ $mLive === 'Deceased' ? 'selected' : '' }}>Deceased</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Mother's ID</label>
                                <input type="text" name="mother_id" value="{{ old('mother_id', optional($person->familyInfo ?? null)->mother_id ?? '') }}" placeholder="Mother's NID" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Marital Status</label>
                                @php $mStatus = old('marital_status', optional($person->familyInfo ?? null)->marital_status ?? optional($person->personalInfo ?? null)->marital_status ?? 'Unmarried'); @endphp
                                <select name="marital_status" id="marital_status_select" onchange="toggleMaritalFields()" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                    <option value="Unmarried" {{ $mStatus === 'Unmarried' ? 'selected' : '' }}>Unmarried</option>
                                    <option value="Married" {{ $mStatus === 'Married' ? 'selected' : '' }}>Married</option>
                                    <option value="Widowed" {{ $mStatus === 'Widowed' ? 'selected' : '' }}>Widowed</option>
                                    <option value="Divorced" {{ $mStatus === 'Divorced' ? 'selected' : '' }}>Divorced</option>
                                </select>
                            </div>

                            <div id="marital-dependent-fields" class="md:col-span-3 grid grid-cols-1 md:grid-cols-3 gap-5 transition-all duration-300 {{ $mStatus === 'Unmarried' ? 'hidden' : '' }}">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Spouse Name (English)</label>
                                    <input type="text" name="spouse_name" value="{{ old('spouse_name', optional($person->familyInfo ?? null)->spouse_name ?? '') }}" placeholder="Spouse Name" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Spouse Name (Bangla)</label>
                                    <input type="text" name="spouse_name_bangla" value="{{ old('spouse_name_bangla', optional($person->familyInfo ?? null)->spouse_name_bangla ?? '') }}" placeholder="Spouse Name in Bangla" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Spouse's NID</label>
                                    <input type="text" name="spouse_nid" value="{{ old('spouse_nid', optional($person->familyInfo ?? null)->spouse_nid ?? '') }}" placeholder="Spouse's NID" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Married Date</label>
                                    <input type="date" name="married_date" value="{{ old('married_date', optional(optional($person->familyInfo ?? null)->married_date)->format('Y-m-d') ?? '') }}" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Total Family Members</label>
                                    <input type="number" name="family_member_count" value="{{ old('family_member_count', optional($person->familyInfo ?? null)->family_member_count ?? '') }}" placeholder="Ex: 5" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                </div>
                                <div class="md:col-span-3 pt-2 space-y-4">
                                    <div class="flex items-center gap-3">
                                        <input type="checkbox" name="have_children" id="have_children" value="1" onchange="toggleChildrenSection()" {{ old('have_children', optional($person->familyInfo ?? null)->have_children) ? 'checked' : '' }} class="w-4 h-4 text-indigo-600 rounded border-slate-300 focus:ring-indigo-500">
                                        <label for="have_children" class="text-sm font-semibold text-slate-700">Have any children?</label>
                                    </div>
                                    <div id="children_counts_section" class="space-y-6 {{ old('have_children', optional($person->familyInfo ?? null)->have_children) ? '' : 'hidden' }}">
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 pt-2">
                                            <div>
                                                <label class="block text-xs font-bold text-slate-700 mb-1">Number of boys</label>
                                                <input type="number" min="0" name="number_of_boys" id="number_of_boys_input" oninput="renderBoys()" value="{{ old('number_of_boys', optional($person->familyInfo ?? null)->number_of_boys ?? '') }}" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                            </div>
                                            <div>
                                                <label class="block text-xs font-bold text-slate-700 mb-1">Number of Girls</label>
                                                <input type="number" min="0" name="number_of_girls" id="number_of_girls_input" oninput="renderGirls()" value="{{ old('number_of_girls', optional($person->familyInfo ?? null)->number_of_girls ?? '') }}" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                            </div>
                                        </div>
                                        <div id="boys_container" class="space-y-4"></div>
                                        <div id="girls_container" class="space-y-4"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- STEP 3: ADDRESS INFORMATION -->
                    @php
                        $addr = optional($person->addressInfo ?? null);
                    @endphp
                    <div id="step-panel-3" class="space-y-6 hidden animate-fadeIn">
                        <!-- Permanent Address -->
                        <div class="bg-slate-50/70 rounded-2xl p-5 border border-slate-200/80">
                            <h4 class="text-sm font-bold text-slate-800 uppercase tracking-wider mb-4 pb-2 border-b border-slate-200">Permanent Address</h4>
                            
                            <!-- Row 1: Division, District, Thana -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Division</label>
                                    <select name="permanent_division_id" id="permanent_division_id" onchange="loadDistricts(this.value, 'permanent_district_id', null, true)" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                        <option value="">Select Division</option>
                                        @foreach($divisions as $div)
                                            <option value="{{ $div->id }}" {{ old('permanent_division_id', $addr->permanent_division_id) == $div->id ? 'selected' : '' }}>{{ $div->name }} {{ $div->bn_name ? '('.$div->bn_name.')' : '' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">District</label>
                                    <select name="permanent_district_id" id="permanent_district_id" onchange="loadThanas(this.value, 'permanent_thana_id', null, true)" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                        <option value="">Select District</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Thana</label>
                                    <select name="permanent_thana_id" id="permanent_thana_id" onchange="loadPostOfficesAndUnions(this.value, 'permanent', null, null, true)" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                        <option value="">Select Thana</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Row 2: Post Office, UP, Village -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Post Office</label>
                                    <select name="permanent_post_office_id" id="permanent_post_office_id" onchange="if(document.getElementById('same_as_permanent').checked) toggleSameAddress()" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                        <option value="">Select Post Office</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">UP (Union Parishad)</label>
                                    <select name="permanent_union_id" id="permanent_union_id" onchange="if(document.getElementById('same_as_permanent').checked) toggleSameAddress()" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                        <option value="">Select Union</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Village</label>
                                    <input type="text" name="permanent_village" id="permanent_village" oninput="if(document.getElementById('same_as_permanent').checked) toggleSameAddress()" value="{{ old('permanent_village', $addr->permanent_village) }}" placeholder="Village Name / গ্রামের নাম" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                </div>
                            </div>

                            <!-- Row 3: Ward, Road, House -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Ward</label>
                                    <input type="text" name="permanent_ward" id="permanent_ward" oninput="if(document.getElementById('same_as_permanent').checked) toggleSameAddress()" value="{{ old('permanent_ward', $addr->permanent_ward) }}" placeholder="Ward No / ওয়ার্ড নং" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Road</label>
                                    <input type="text" name="permanent_road" id="permanent_road" oninput="if(document.getElementById('same_as_permanent').checked) toggleSameAddress()" value="{{ old('permanent_road', $addr->permanent_road) }}" placeholder="Road Name/No" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">House</label>
                                    <input type="text" name="permanent_house" id="permanent_house" oninput="if(document.getElementById('same_as_permanent').checked) toggleSameAddress()" value="{{ old('permanent_house', $addr->permanent_house) }}" placeholder="House Name/No" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                </div>
                            </div>

                            <!-- Row 4: House (Bangla) -->
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">House (Bangla)</label>
                                <input type="text" name="permanent_house_bn" id="permanent_house_bn" oninput="if(document.getElementById('same_as_permanent').checked) toggleSameAddress()" value="{{ old('permanent_house_bn', $addr->permanent_house_bn) }}" placeholder="বাড়ির নাম / নং (বাংলা)" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            </div>
                        </div>

                        <!-- Same as Permanent Checkbox -->
                        <div class="flex items-center gap-3 my-2 px-4 py-3 bg-indigo-50/60 rounded-xl border border-indigo-100">
                            <input type="checkbox" name="same_as_permanent" id="same_as_permanent" value="1" {{ old('same_as_permanent', $addr->same_as_permanent) ? 'checked' : '' }} onchange="toggleSameAddress()" class="w-4 h-4 text-indigo-600 border-slate-300 rounded focus:ring-indigo-500 cursor-pointer">
                            <label for="same_as_permanent" class="text-sm font-bold text-indigo-900 cursor-pointer select-none">Same as Permanent Address</label>
                        </div>

                        <!-- Present Address -->
                        <div class="bg-slate-50/70 rounded-2xl p-5 border border-slate-200/80">
                            <h4 class="text-sm font-bold text-slate-800 uppercase tracking-wider mb-4 pb-2 border-b border-slate-200">Present Address</h4>
                            
                            <!-- Row 1: Division, District, Thana -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Division</label>
                                    <select name="present_division_id" id="present_division_id" onchange="loadDistricts(this.value, 'present_district_id')" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                        <option value="">Select Division</option>
                                        @foreach($divisions as $div)
                                            <option value="{{ $div->id }}" {{ old('present_division_id', $addr->present_division_id) == $div->id ? 'selected' : '' }}>{{ $div->name }} {{ $div->bn_name ? '('.$div->bn_name.')' : '' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">District</label>
                                    <select name="present_district_id" id="present_district_id" onchange="loadThanas(this.value, 'present_thana_id')" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                        <option value="">Select District</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Thana</label>
                                    <select name="present_thana_id" id="present_thana_id" onchange="loadPostOfficesAndUnions(this.value, 'present')" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                        <option value="">Select Thana</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Row 2: Post Office, UP, Village -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Post Office</label>
                                    <select name="present_post_office_id" id="present_post_office_id" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                        <option value="">Select Post Office</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">UP (Union Parishad)</label>
                                    <select name="present_union_id" id="present_union_id" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                        <option value="">Select Union</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Village</label>
                                    <input type="text" name="present_village" id="present_village" value="{{ old('present_village', $addr->present_village) }}" placeholder="Village Name / গ্রামের নাম" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                </div>
                            </div>

                            <!-- Row 3: Ward, Road, House -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Ward</label>
                                    <input type="text" name="present_ward" id="present_ward" value="{{ old('present_ward', $addr->present_ward) }}" placeholder="Ward No / ওয়ার্ড নং" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">Road</label>
                                    <input type="text" name="present_road" id="present_road" value="{{ old('present_road', $addr->present_road) }}" placeholder="Road Name/No" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">House</label>
                                    <input type="text" name="present_house" id="present_house" value="{{ old('present_house', $addr->present_house) }}" placeholder="House Name/No" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                </div>
                            </div>

                            <!-- Row 4: House (Bangla) -->
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">House (Bangla)</label>
                                <input type="text" name="present_house_bn" id="present_house_bn" value="{{ old('present_house_bn', $addr->present_house_bn) }}" placeholder="বাড়ির নাম / নং (বাংলা)" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            </div>
                        </div>
                    </div>

                    <!-- STEP 4: EDUCATION INFORMATION -->
                    <div id="step-panel-4" class="space-y-6 hidden animate-fadeIn">
                        @php
                            $initialEducations = old('educations', optional(optional($person ?? null)->educationInfo)->education_details ?: []);
                            if (empty($initialEducations)) {
                                if (isset($person) && optional($person->educationInfo)->highest_education) {
                                    $initialEducations = [
                                        [
                                            'degree' => optional($person->educationInfo)->highest_education,
                                            'group' => optional($person->educationInfo)->study_status,
                                            'grade' => optional($person->educationInfo)->result,
                                            'board' => '',
                                            'passing_year' => optional($person->educationInfo)->passing_year,
                                            'institute' => optional($person->educationInfo)->institution_name,
                                        ]
                                    ];
                                } else {
                                    $initialEducations = [
                                        ['degree' => '', 'group' => '', 'grade' => '', 'board' => '', 'passing_year' => '', 'institute' => '']
                                    ];
                                }
                            }
                        @endphp
                        <script>window.initialEducationRows = @json($initialEducations);</script>
                        <div class="bg-white rounded-xl overflow-hidden border border-slate-200/80 shadow-sm">
                            <!-- Header Bar -->
                            <div class="p-4 sm:p-5 bg-white flex justify-end items-center">
                                <button type="button" onclick="addEducationRow()" class="bg-[#00551c] hover:bg-[#004416] text-white px-4 py-2 rounded-lg font-semibold text-xs sm:text-sm flex items-center gap-1.5 shadow-sm transition">
                                    <svg class="w-4 h-4 font-bold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    Add More Info
                                </button>
                            </div>

                            <!-- Education Table Grid -->
                            <div class="overflow-x-auto border-t border-slate-200">
                                <table class="w-full min-w-[1150px] border-collapse text-left">
                                    <thead>
                                        <tr class="bg-[#F8F9FA] border-b border-slate-200 text-xs sm:text-sm font-bold text-slate-800 whitespace-nowrap">
                                            <th class="py-3.5 px-3 min-w-[160px]">Degree <span class="text-red-500">*</span></th>
                                            <th class="py-3.5 px-3 min-w-[160px]">Group</th>
                                            <th class="py-3.5 px-3 min-w-[145px]">Grade</th>
                                            <th class="py-3.5 px-3 min-w-[160px]">Board</th>
                                            <th class="py-3.5 px-3 min-w-[155px]">Passing Year</th>
                                            <th class="py-3.5 px-3 min-w-[240px]">Educational Institute</th>
                                            <th class="py-3.5 px-3 min-w-[70px] text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="education-rows-container" class="divide-y divide-slate-200 bg-[#F9FAFB]/60">
                                        <!-- Dynamic rows will be inserted here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- STEP 5: PROFESSION INFORMATION -->
                    <div id="step-panel-5" class="space-y-6 hidden animate-fadeIn">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Profession</label>
                                <select name="profession" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                    <option value="">Select Profession</option>
                                    <option value="Student">Student</option>
                                    <option value="Private Service">Private Service</option>
                                    <option value="Govt Service">Govt Service</option>
                                    <option value="Business">Business</option>
                                    <option value="Doctor">Doctor</option>
                                    <option value="Engineer">Engineer</option>
                                    <option value="Teacher">Teacher</option>
                                    <option value="Journalist">Journalist</option>
                                    <option value="Lawyer">Lawyer</option>
                                    <option value="Farmer">Farmer</option>
                                    <option value="Self Employed">Self Employed</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Workplace / Organization</label>
                                <input type="text" name="workplace" placeholder="Company or Organization Name" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Designation</label>
                                <input type="text" name="designation" placeholder="Job Title / Designation" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Experience (Years)</label>
                                <input type="number" name="experience_years" placeholder="Ex: 3" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Profession Notes</label>
                                <textarea name="profession_notes" rows="3" placeholder="Additional details about current or past occupation" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- STEP 6: TREATMENT INFORMATION -->
                    <div id="step-panel-6" class="space-y-6 hidden animate-fadeIn">
                        @php
                            $oldLoc = old('treatment_location', optional($person->treatmentInfo ?? null)->treatment_location);
                            $oldHospType = old('hospital_type', optional($person->treatmentInfo ?? null)->hospital_type);
                        @endphp
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Where treatment was taken</label>
                                <select name="treatment_location" id="treatment_location_select" onchange="toggleHospitalType()" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                    <option value="">Select Location</option>
                                    <option value="House" {{ $oldLoc === 'House' ? 'selected' : '' }}>House</option>
                                    <option value="Hospital" {{ $oldLoc === 'Hospital' ? 'selected' : '' }}>Hospital</option>
                                </select>
                            </div>
                            <div id="hospital_type_wrapper" class="{{ $oldLoc === 'Hospital' ? '' : 'hidden' }} animate-fadeIn">
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Hospital Type</label>
                                <select name="hospital_type" id="hospital_type_select" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                    <option value="">Select Hospital Type</option>
                                    <option value="Govt. Hospital" {{ $oldHospType === 'Govt. Hospital' ? 'selected' : '' }}>Govt. Hospital</option>
                                    <option value="Private Hospital" {{ $oldHospType === 'Private Hospital' ? 'selected' : '' }}>Private Hospital</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Hospital / Clinic Name</label>
                                <input type="text" name="hospital_name" value="{{ old('hospital_name', optional($person->treatmentInfo ?? null)->hospital_name ?? '') }}" placeholder="Ex: Dhaka Medical College Hospital" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Attending Doctor Name</label>
                                <input type="text" name="doctor_name" value="{{ old('doctor_name', optional($person->treatmentInfo ?? null)->doctor_name ?? '') }}" placeholder="Ex: Dr. Rahman" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Treatment Status</label>
                                <select name="treatment_status" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                    <option value="">Select Status</option>
                                    <option value="Completed" {{ (old('treatment_status', optional($person->treatmentInfo ?? null)->treatment_status) === 'Completed') ? 'selected' : '' }}>Completed</option>
                                    <option value="Ongoing" {{ (old('treatment_status', optional($person->treatmentInfo ?? null)->treatment_status) === 'Ongoing') ? 'selected' : '' }}>Ongoing</option>
                                    <option value="Referred for Advanced Care" {{ (old('treatment_status', optional($person->treatmentInfo ?? null)->treatment_status) === 'Referred for Advanced Care') ? 'selected' : '' }}>Referred for Advanced Care</option>
                                    <option value="No Treatment Required" {{ (old('treatment_status', optional($person->treatmentInfo ?? null)->treatment_status) === 'No Treatment Required') ? 'selected' : '' }}>No Treatment Required</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Medical Expenses / Cost (BDT)</label>
                                <input type="number" step="0.01" name="medical_expenses" value="{{ old('medical_expenses', optional($person->treatmentInfo ?? null)->medical_expenses ?? '') }}" placeholder="Ex: 50000" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Admission Date</label>
                                <input type="date" name="admission_date" value="{{ old('admission_date', optional(optional($person->treatmentInfo ?? null)->admission_date)->format('Y-m-d') ?? '') }}" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Release Date</label>
                                <input type="date" name="release_date" value="{{ old('release_date', optional(optional($person->treatmentInfo ?? null)->release_date)->format('Y-m-d') ?? '') }}" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Treatment & Surgery Details</label>
                                <textarea name="treatment_details" rows="4" placeholder="Describe medical diagnosis, surgeries performed, medications, or ongoing rehabilitation..." class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">{{ old('treatment_details', optional($person->treatmentInfo ?? null)->treatment_details ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- STEP 7: JULY 24 FIGHTER INFORMATION -->
                    <div id="step-panel-7" class="space-y-6 hidden animate-fadeIn">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Fighter Role / Category</label>
                                <select name="fighter_type" id="fighter_type_select" onchange="toggleFighterDates()" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                    @php
                                        $fType = old('fighter_type', optional($person->julyFighterInfo ?? null)->fighter_type);
                                        $showIncDate = in_array($fType, ['Injured Fighter', 'Martyr Family Member']);
                                        $showDeathDate = ($fType === 'Martyr Family Member');
                                        $oldIncDate = old('incident_date', optional(optional($person->julyFighterInfo ?? null)->incident_date)->format('Y-m-d'));
                                        $oldDeathDate = old('date_of_death', optional(optional($person->julyFighterInfo ?? null)->date_of_death)->format('Y-m-d'));
                                    @endphp
                                    <option value="Frontline Protester" {{ $fType === 'Frontline Protester' ? 'selected' : '' }}>Frontline Protester</option>
                                    <option value="Student Coordinator" {{ $fType === 'Student Coordinator' ? 'selected' : '' }}>Student Coordinator</option>
                                    <option value="Volunteer" {{ $fType === 'Volunteer' ? 'selected' : '' }}>Volunteer</option>
                                    <option value="Medical Aid Team" {{ $fType === 'Medical Aid Team' ? 'selected' : '' }}>Medical Aid Team</option>
                                    <option value="Media / Documentation" {{ $fType === 'Media / Documentation' ? 'selected' : '' }}>Media / Documentation</option>
                                    <option value="Legal Aid" {{ $fType === 'Legal Aid' ? 'selected' : '' }}>Legal Aid</option>
                                    <option value="Injured Fighter" {{ $fType === 'Injured Fighter' ? 'selected' : '' }}>Injured Fighter</option>
                                    <option value="Martyr Family Member" {{ $fType === 'Martyr Family Member' ? 'selected' : '' }}>Martyr Family Member</option>
                                    <option value="General Participant" {{ $fType === 'General Participant' ? 'selected' : '' }}>General Participant</option>
                                </select>
                            </div>

                            <div id="incident_date_wrapper" class="{{ $showIncDate ? '' : 'hidden' }} animate-fadeIn">
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Incident Date</label>
                                <input type="date" name="incident_date" value="{{ $oldIncDate }}" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            </div>

                            <div id="date_of_death_wrapper" class="{{ $showDeathDate ? '' : 'hidden' }} animate-fadeIn">
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Date of Death</label>
                                <input type="date" name="date_of_death" value="{{ $oldDeathDate }}" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Incident Location / Area</label>
                                <input type="text" name="incident_location" value="{{ old('incident_location', optional($person->julyFighterInfo ?? null)->incident_location ?? '') }}" placeholder="Ex: Shahbagh, Jatrabari, Uttara, Mirpur, Science Lab, Badda, Savar, Rangpur..." class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Injury Details (If any)</label>
                                <textarea name="injury_details" rows="3" placeholder="Describe bullet wounds, physical assault details, hospital treatment, surgery history etc." class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">{{ old('injury_details', optional($person->julyFighterInfo ?? null)->injury_details ?? '') }}</textarea>
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Contribution Description</label>
                                <textarea name="contribution_description" rows="4" placeholder="Detailed description of participation during the July-August movement..." class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">{{ old('contribution_description', optional($person->julyFighterInfo ?? null)->contribution_description ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Action Buttons -->
                    <div class="flex items-center justify-between border-t border-slate-200 pt-6 mt-8">
                        <button type="button" id="prev-btn" onclick="prevStep()" class="rounded-lg border border-slate-300 bg-white px-6 py-2.5 text-sm font-semibold text-slate-600 hover:bg-slate-50 transition shadow-sm">
                            &larr; Cancel
                        </button>

                        <div class="flex items-center gap-3">
                            <button type="button" id="next-btn" onclick="nextStep()" class="rounded-lg bg-[#00551c] hover:bg-[#004416] px-8 py-2.5 text-sm font-bold text-white transition shadow-sm flex items-center gap-2">
                                <span>Save & Next</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </button>

                            <button type="button" id="skip-btn" onclick="nextStep()" class="rounded-lg border border-[#00551c] bg-white text-[#00551c] hover:bg-emerald-50 px-6 py-2.5 text-sm font-semibold transition shadow-sm hidden items-center gap-2">
                                <span>Next</span>
                            </button>

                            <button type="submit" id="submit-btn" class="hidden rounded-lg bg-[#00551c] hover:bg-[#004416] px-8 py-2.5 text-sm font-bold text-white transition shadow-sm items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                <span>Save July Fighter</span>
                            </button>
                        </div>
                    </div>

                </form>
                <!-- FORM END -->

            </div>
        </div>
    </x-admin.shell>

    <script>
        let currentStep = 1;
        const totalSteps = 7;
        const stepTitles = [
            "People Information",
            "Family Information",
            "Address Information",
            "Education Information",
            "Profession Information",
            "Treatment Information",
            "July 24 Fighter Information"
        ];
        const stepBreadcrumbs = [
            "Create",
            "Family",
            "Address",
            "Education",
            "Profession",
            "Treatment",
            "July 24 Fighter"
        ];

        function updateStepUI() {
            document.getElementById('page-step-title').textContent = stepTitles[currentStep - 1];
            document.getElementById('page-step-breadcrumb').textContent = stepBreadcrumbs[currentStep - 1];

            for (let i = 1; i <= totalSteps; i++) {
                const panel = document.getElementById(`step-panel-${i}`);
                const icon = document.getElementById(`step-icon-${i}`);
                const label = document.getElementById(`step-label-${i}`);

                if (i === currentStep) {
                    panel.classList.remove('hidden');
                    icon.className = "w-12 h-12 rounded-2xl flex items-center justify-center font-bold text-sm transition-all duration-300 bg-indigo-600 text-white shadow-lg shadow-indigo-200";
                    if (label) label.className = "mt-2 text-[11px] font-bold tracking-wider uppercase text-indigo-600";
                } else if (i < currentStep) {
                    panel.classList.add('hidden');
                    icon.className = "w-12 h-12 rounded-2xl flex items-center justify-center font-bold text-sm transition-all duration-300 bg-emerald-50 text-emerald-600 border-2 border-emerald-500";
                    icon.innerHTML = '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>';
                    if (label) label.className = "mt-2 text-[11px] font-bold tracking-wider uppercase text-emerald-600";
                } else {
                    panel.classList.add('hidden');
                    icon.className = "w-12 h-12 rounded-2xl flex items-center justify-center font-bold text-sm transition-all duration-300 bg-slate-100 text-slate-400 border border-slate-200";
                    if (label) label.className = "mt-2 text-[11px] font-medium tracking-wider uppercase text-slate-400";
                }

                if (i < totalSteps) {
                    const line = document.getElementById(`step-line-${i}`);
                    if (line) {
                        line.className = (i < currentStep) 
                            ? "h-0.5 flex-1 mx-2 transition-all duration-300 bg-emerald-500" 
                            : "h-0.5 flex-1 mx-2 transition-all duration-300 bg-slate-200";
                    }
                }
            }

            const prevBtn = document.getElementById('prev-btn');
            const nextBtn = document.getElementById('next-btn');
            const skipBtn = document.getElementById('skip-btn');
            const submitBtn = document.getElementById('submit-btn');

            if (currentStep === 1) {
                prevBtn.innerHTML = '&larr; Cancel';
            } else {
                prevBtn.innerHTML = '&larr; ' + stepBreadcrumbs[currentStep - 2];
            }

            if (currentStep === totalSteps) {
                nextBtn.classList.add('hidden');
                if (skipBtn) skipBtn.classList.add('hidden');
                submitBtn.classList.remove('hidden');
            } else {
                nextBtn.classList.remove('hidden');
                if (skipBtn) {
                    skipBtn.classList.remove('hidden');
                    skipBtn.classList.add('flex');
                    skipBtn.querySelector('span').innerHTML = stepBreadcrumbs[currentStep] + ' &rarr;';
                }
                submitBtn.classList.add('hidden');
                nextBtn.querySelector('span').textContent = 'Save & Next';
            }
        }

        function nextStep() {
            if (currentStep === 1) {
                const nameInput = document.getElementById('name_input');
                if (nameInput && !nameInput.value.trim()) {
                    nameInput.focus();
                    alert('Please enter Name before proceeding.');
                    return;
                }
            }
            if (currentStep < totalSteps) {
                currentStep++;
                updateStepUI();
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                currentStep--;
                updateStepUI();
                window.scrollTo({ top: 0, behavior: 'smooth' });
            } else {
                window.location.href = "{{ route('admin.july-fighter.index') }}";
            }
        }

        function goToStep(step) {
            if (step >= 1 && step <= totalSteps) {
                currentStep = step;
                updateStepUI();
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        }

        function calculateAge(dateString) {
            if (!dateString) return;
            const today = new Date();
            const birthDate = new Date(dateString);
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

        @php
            $rawChildren = old('children_details', optional($person->familyInfo ?? null)->children_details ?? ['boys' => [], 'girls' => []]);
            if (!is_array($rawChildren)) {
                $rawChildren = json_decode($rawChildren, true) ?: ['boys' => [], 'girls' => []];
            }
        @endphp
        window.initialChildrenData = @json($rawChildren);

        function toggleChildrenSection() {
            const chk = document.getElementById('have_children');
            const sec = document.getElementById('children_counts_section');
            if (chk && sec) {
                if (chk.checked) {
                    sec.classList.remove('hidden');
                } else {
                    sec.classList.add('hidden');
                }
            }
        }

        function renderBoys() {
            const input = document.getElementById('number_of_boys_input');
            const count = parseInt(input?.value) || 0;
            const container = document.getElementById('boys_container');
            if (!container) return;

            const currentData = [];
            for (let i = 0; i < container.children.length; i++) {
                currentData.push({
                    name_en: container.querySelector(`[name="boys[${i}][name_en]"]`)?.value || '',
                    name_bn: container.querySelector(`[name="boys[${i}][name_bn]"]`)?.value || '',
                    dob: container.querySelector(`[name="boys[${i}][dob]"]`)?.value || '',
                    birth_reg: container.querySelector(`[name="boys[${i}][birth_reg]"]`)?.value || '',
                    nid: container.querySelector(`[name="boys[${i}][nid]"]`)?.value || '',
                });
            }

            container.innerHTML = '';
            for (let i = 0; i < count; i++) {
                const saved = currentData[i] || (window.initialChildrenData?.boys ? window.initialChildrenData.boys[i] : null) || {};
                const card = document.createElement('div');
                card.className = "border border-slate-200/80 rounded-xl overflow-hidden shadow-sm bg-white mt-4";
                card.innerHTML = `
                    <div class="bg-[#F8FAFC] px-4 py-3 border-b border-slate-200/80 font-extrabold text-slate-800 text-sm">
                        Boy ${i + 1}
                    </div>
                    <div class="p-4 space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Name (English)</label>
                                <input type="text" name="boys[${i}][name_en]" value="${saved.name_en || ''}" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Name (Bangla)</label>
                                <input type="text" name="boys[${i}][name_bn]" value="${saved.name_bn || ''}" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Date of Birth</label>
                                <input type="date" name="boys[${i}][dob]" value="${saved.dob || ''}" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Birth Reg. No.</label>
                                <input type="text" name="boys[${i}][birth_reg]" value="${saved.birth_reg || ''}" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">NID No.</label>
                                <input type="text" name="boys[${i}][nid]" value="${saved.nid || ''}" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            </div>
                        </div>
                    </div>
                `;
                container.appendChild(card);
            }
        }

        function renderGirls() {
            const input = document.getElementById('number_of_girls_input');
            const count = parseInt(input?.value) || 0;
            const container = document.getElementById('girls_container');
            if (!container) return;

            const currentData = [];
            for (let i = 0; i < container.children.length; i++) {
                currentData.push({
                    name_en: container.querySelector(`[name="girls[${i}][name_en]"]`)?.value || '',
                    name_bn: container.querySelector(`[name="girls[${i}][name_bn]"]`)?.value || '',
                    dob: container.querySelector(`[name="girls[${i}][dob]"]`)?.value || '',
                    birth_reg: container.querySelector(`[name="girls[${i}][birth_reg]"]`)?.value || '',
                    nid: container.querySelector(`[name="girls[${i}][nid]"]`)?.value || '',
                });
            }

            container.innerHTML = '';
            for (let i = 0; i < count; i++) {
                const saved = currentData[i] || (window.initialChildrenData?.girls ? window.initialChildrenData.girls[i] : null) || {};
                const card = document.createElement('div');
                card.className = "border border-slate-200/80 rounded-xl overflow-hidden shadow-sm bg-white mt-4";
                card.innerHTML = `
                    <div class="bg-[#F8FAFC] px-4 py-3 border-b border-slate-200/80 font-extrabold text-slate-800 text-sm">
                        Girl ${i + 1}
                    </div>
                    <div class="p-4 space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Name (English)</label>
                                <input type="text" name="girls[${i}][name_en]" value="${saved.name_en || ''}" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Name (Bangla)</label>
                                <input type="text" name="girls[${i}][name_bn]" value="${saved.name_bn || ''}" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Date of Birth</label>
                                <input type="date" name="girls[${i}][dob]" value="${saved.dob || ''}" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Birth Reg. No.</label>
                                <input type="text" name="girls[${i}][birth_reg]" value="${saved.birth_reg || ''}" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">NID No.</label>
                                <input type="text" name="girls[${i}][nid]" value="${saved.nid || ''}" class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                            </div>
                        </div>
                    </div>
                `;
                container.appendChild(card);
            }
        }

        function loadDistricts(divisionId, targetSelectId, selectedValue = null, syncSame = false) {
            const target = document.getElementById(targetSelectId);
            target.innerHTML = '<option value="">Loading...</option>';
            if (!divisionId) {
                target.innerHTML = '<option value="">Select District</option>';
                return;
            }
            fetch(`/locations/districts/${divisionId}`)
                .then(res => res.json())
                .then(data => {
                    target.innerHTML = '<option value="">Select District</option>';
                    data.forEach(item => {
                        const opt = document.createElement('option');
                        opt.value = item.id;
                        opt.textContent = item.name + (item.bn_name ? ` (${item.bn_name})` : '');
                        if (selectedValue && selectedValue == item.id) opt.selected = true;
                        target.appendChild(opt);
                    });
                    if (syncSame && document.getElementById('same_as_permanent').checked) {
                        toggleSameAddress();
                    }
                });
        }

        function loadThanas(districtId, targetSelectId, selectedValue = null, syncSame = false) {
            const target = document.getElementById(targetSelectId);
            target.innerHTML = '<option value="">Loading...</option>';
            if (!districtId) {
                target.innerHTML = '<option value="">Select Thana</option>';
                return;
            }
            fetch(`/locations/thanas/${districtId}`)
                .then(res => res.json())
                .then(data => {
                    target.innerHTML = '<option value="">Select Thana</option>';
                    data.forEach(item => {
                        const opt = document.createElement('option');
                        opt.value = item.id;
                        opt.textContent = item.name + (item.bn_name ? ` (${item.bn_name})` : '');
                        if (selectedValue && selectedValue == item.id) opt.selected = true;
                        target.appendChild(opt);
                    });
                    if (syncSame && document.getElementById('same_as_permanent').checked) {
                        toggleSameAddress();
                    }
                });
        }

        function loadPostOfficesAndUnions(thanaId, prefix, selectedPo = null, selectedUnion = null, syncSame = false) {
            const poTarget = document.getElementById(`${prefix}_post_office_id`);
            const unionTarget = document.getElementById(`${prefix}_union_id`);
            poTarget.innerHTML = '<option value="">Loading...</option>';
            unionTarget.innerHTML = '<option value="">Loading...</option>';
            if (!thanaId) {
                poTarget.innerHTML = '<option value="">Select Post Office</option>';
                unionTarget.innerHTML = '<option value="">Select Union</option>';
                return;
            }
            fetch(`/locations/post-offices/${thanaId}`)
                .then(res => res.json())
                .then(data => {
                    poTarget.innerHTML = '<option value="">Select Post Office</option>';
                    data.forEach(item => {
                        const opt = document.createElement('option');
                        opt.value = item.id;
                        opt.textContent = item.name + (item.postal_code ? ` - ${item.postal_code}` : '') + (item.bn_name ? ` (${item.bn_name})` : '');
                        if (selectedPo && selectedPo == item.id) opt.selected = true;
                        poTarget.appendChild(opt);
                    });
                    if (syncSame && document.getElementById('same_as_permanent').checked) {
                        toggleSameAddress();
                    }
                });

            fetch(`/locations/unions/${thanaId}`)
                .then(res => res.json())
                .then(data => {
                    unionTarget.innerHTML = '<option value="">Select Union</option>';
                    data.forEach(item => {
                        const opt = document.createElement('option');
                        opt.value = item.id;
                        opt.textContent = item.name + (item.bn_name ? ` (${item.bn_name})` : '');
                        if (selectedUnion && selectedUnion == item.id) opt.selected = true;
                        unionTarget.appendChild(opt);
                    });
                    if (syncSame && document.getElementById('same_as_permanent').checked) {
                        toggleSameAddress();
                    }
                });
        }

        function toggleSameAddress() {
            const isChecked = document.getElementById('same_as_permanent').checked;
            if (isChecked) {
                document.getElementById('present_division_id').value = document.getElementById('permanent_division_id').value;
                document.getElementById('present_district_id').innerHTML = document.getElementById('permanent_district_id').innerHTML;
                document.getElementById('present_district_id').value = document.getElementById('permanent_district_id').value;
                document.getElementById('present_thana_id').innerHTML = document.getElementById('permanent_thana_id').innerHTML;
                document.getElementById('present_thana_id').value = document.getElementById('permanent_thana_id').value;
                document.getElementById('present_post_office_id').innerHTML = document.getElementById('permanent_post_office_id').innerHTML;
                document.getElementById('present_post_office_id').value = document.getElementById('permanent_post_office_id').value;
                document.getElementById('present_union_id').innerHTML = document.getElementById('permanent_union_id').innerHTML;
                document.getElementById('present_union_id').value = document.getElementById('permanent_union_id').value;

                document.getElementById('present_village').value = document.getElementById('permanent_village').value;
                document.getElementById('present_ward').value = document.getElementById('permanent_ward').value;
                document.getElementById('present_road').value = document.getElementById('permanent_road').value;
                document.getElementById('present_house').value = document.getElementById('permanent_house').value;
                document.getElementById('present_house_bn').value = document.getElementById('permanent_house_bn').value;
            }
        }

        /* Education Dynamic Table JS */
        let eduRowCounter = 0;
        const bdDegrees = [
            "PSC / 5th Pass (ইবতেদায়ী / সমাপনী)",
            "JSC / JDC / 8th Pass",
            "SSC / Dakhil / O-Level / Vocational",
            "HSC / Alim / A-Level / Diploma",
            "Diploma in Engineering",
            "Diploma in Nursing / Medical",
            "Diploma in Agriculture / Commerce",
            "Graduation / Bachelor (Pass)",
            "Graduation / Bachelor (Honours)",
            "Post-Graduation / Masters",
            "M.Phil",
            "Ph.D",
            "Hafiz / Maulana / Qawmi",
            "Other"
        ];

        const bdGroups = [
            "Science",
            "Humanities / Arts",
            "Business Studies / Commerce",
            "Vocational / Technical",
            "General",
            "Islamic Studies / Madrasah",
            "Computer Science & Engineering",
            "Electrical & Electronic Engineering",
            "Civil Engineering",
            "Mechanical Engineering",
            "Medical / Dental / Nursing",
            "Law / LLB",
            "Economics / Social Sciences",
            "Bangla / English",
            "Accounting / Finance / Management",
            "Other",
            "N/A"
        ];

        const bdGrades = [
            "1st Division / Class",
            "2nd Division / Class",
            "3rd Division / Class",
            "GPA 5.00 (A+)",
            "GPA 4.00 - 4.99 (A)",
            "GPA 3.50 - 3.99 (A-)",
            "GPA 3.00 - 3.49 (B)",
            "GPA 2.00 - 2.99 (C)",
            "GPA 1.00 - 1.99 (D)",
            "Passed",
            "Appeared / Running"
        ];

        const bdBoards = [
            "Dhaka",
            "Rajshahi",
            "Comilla",
            "Jessore",
            "Chittagong",
            "Barisal",
            "Sylhet",
            "Dinajpur",
            "Mymensingh",
            "Madrasah Board",
            "Technical Board",
            "BOU (Open University)",
            "National University",
            "Dhaka University",
            "BUET / Engineering University",
            "Medical Board / BMDC",
            "Public University",
            "Private University",
            "Qawmi Board",
            "Foreign / Other"
        ];

        function addEducationRow(data = {}) {
            const container = document.getElementById('education-rows-container');
            if (!container) return;
            const idx = eduRowCounter++;

            let degOpts = '<option value="">Select Degree</option>' + bdDegrees.map(d => `<option value="${d}" ${data.degree == d ? 'selected' : ''}>${d}</option>`).join('');
            if (data.degree && !bdDegrees.includes(data.degree)) {
                degOpts += `<option value="${data.degree}" selected>${data.degree}</option>`;
            }

            let grpOpts = '<option value="">Select Group</option>' + bdGroups.map(g => `<option value="${g}" ${data.group == g ? 'selected' : ''}>${g}</option>`).join('');
            if (data.group && !bdGroups.includes(data.group)) {
                grpOpts += `<option value="${data.group}" selected>${data.group}</option>`;
            }

            let grdOpts = '<option value="">Select Grade</option>' + bdGrades.map(g => `<option value="${g}" ${data.grade == g ? 'selected' : ''}>${g}</option>`).join('');
            if (data.grade && !bdGrades.includes(data.grade)) {
                grdOpts += `<option value="${data.grade}" selected>${data.grade}</option>`;
            }

            let brdOpts = '<option value="">Select Board</option>' + bdBoards.map(b => `<option value="${b}" ${data.board == b ? 'selected' : ''}>${b}</option>`).join('');
            if (data.board && !bdBoards.includes(data.board)) {
                brdOpts += `<option value="${data.board}" selected>${data.board}</option>`;
            }

            let years = ['Running'];
            for(let y = 2026; y >= 1960; y--) years.push(y.toString());
            let yrOpts = '<option value="">Select Year</option>' + years.map(y => `<option value="${y}" ${data.passing_year == y ? 'selected' : ''}>${y}</option>`).join('');
            if (data.passing_year && !years.includes(data.passing_year.toString())) {
                yrOpts += `<option value="${data.passing_year}" selected>${data.passing_year}</option>`;
            }

            const rowDiv = document.createElement('tr');
            rowDiv.className = 'edu-row-item border-b border-slate-200/60 hover:bg-slate-100/40 transition animate-fadeIn';
            rowDiv.innerHTML = `
                <td class="py-3 px-3 min-w-[160px]">
                    <select name="educations[${idx}][degree]" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-xs sm:text-sm text-slate-700 focus:border-indigo-500 focus:outline-none shadow-sm">
                        ${degOpts}
                    </select>
                </td>
                <td class="py-3 px-3 min-w-[160px]">
                    <select name="educations[${idx}][group]" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-xs sm:text-sm text-slate-700 focus:border-indigo-500 focus:outline-none shadow-sm">
                        ${grpOpts}
                    </select>
                </td>
                <td class="py-3 px-3 min-w-[145px]">
                    <select name="educations[${idx}][grade]" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-xs sm:text-sm text-slate-700 focus:border-indigo-500 focus:outline-none shadow-sm">
                        ${grdOpts}
                    </select>
                </td>
                <td class="py-3 px-3 min-w-[160px]">
                    <select name="educations[${idx}][board]" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-xs sm:text-sm text-slate-700 focus:border-indigo-500 focus:outline-none shadow-sm">
                        ${brdOpts}
                    </select>
                </td>
                <td class="py-3 px-3 min-w-[155px]">
                    <select name="educations[${idx}][passing_year]" class="w-full rounded-lg border border-slate-200 bg-white px-2.5 py-2 text-xs sm:text-sm text-slate-700 focus:border-indigo-500 focus:outline-none shadow-sm">
                        ${yrOpts}
                    </select>
                </td>
                <td class="py-3 px-3 min-w-[240px]">
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

        document.addEventListener('DOMContentLoaded', function() {
            updateStepUI();
            toggleMaritalFields();
            toggleHospitalType();
            toggleFighterDates();
            toggleChildrenSection();
            renderBoys();
            renderGirls();

            if (window.initialEducationRows && window.initialEducationRows.length > 0) {
                window.initialEducationRows.forEach(r => addEducationRow(r));
            } else {
                addEducationRow();
            }

            const permDiv = "{{ old('permanent_division_id', optional($person->addressInfo ?? null)->permanent_division_id) }}";
            const permDist = "{{ old('permanent_district_id', optional($person->addressInfo ?? null)->permanent_district_id) }}";
            const permThana = "{{ old('permanent_thana_id', optional($person->addressInfo ?? null)->permanent_thana_id) }}";
            const permPo = "{{ old('permanent_post_office_id', optional($person->addressInfo ?? null)->permanent_post_office_id) }}";
            const permUnion = "{{ old('permanent_union_id', optional($person->addressInfo ?? null)->permanent_union_id) }}";

            if (permDiv) {
                loadDistricts(permDiv, 'permanent_district_id', permDist);
                if (permDist) {
                    loadThanas(permDist, 'permanent_thana_id', permThana);
                    if (permThana) {
                        loadPostOfficesAndUnions(permThana, 'permanent', permPo, permUnion);
                    }
                }
            }

            const presDiv = "{{ old('present_division_id', optional($person->addressInfo ?? null)->present_division_id) }}";
            const presDist = "{{ old('present_district_id', optional($person->addressInfo ?? null)->present_district_id) }}";
            const presThana = "{{ old('present_thana_id', optional($person->addressInfo ?? null)->present_thana_id) }}";
            const presPo = "{{ old('present_post_office_id', optional($person->addressInfo ?? null)->present_post_office_id) }}";
            const presUnion = "{{ old('present_union_id', optional($person->addressInfo ?? null)->present_union_id) }}";

            if (presDiv) {
                loadDistricts(presDiv, 'present_district_id', presDist);
                if (presDist) {
                    loadThanas(presDist, 'present_thana_id', presThana);
                    if (presThana) {
                        loadPostOfficesAndUnions(presThana, 'present', presPo, presUnion);
                    }
                }
            }
        });
    </script>
</x-layouts.app>
