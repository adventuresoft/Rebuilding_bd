<x-layouts.app title="Citizen & July Fighter Information Record">
    <x-admin.shell>
        <style>
            @media print {
                @page {
                    size: A4 portrait;
                    margin: 6mm;
                }
                body { background: white !important; margin: 0 !important; padding: 0 !important; -webkit-print-color-adjust: exact !important; print-color-adjust: exact !important; }
                .print\:hidden, nav, header, aside { display: none !important; }
                .certificate-outer-frame { 
                    box-shadow: none !important; 
                    width: 100% !important; 
                    max-width: 100% !important; 
                    margin: 0 !important; 
                    padding: 2px !important;
                    border: 2px solid #00551c !important;
                }
                .inner-cert-box {
                    padding: 12px 16px !important;
                    border-width: 2px !important;
                }
                .cert-section {
                    margin-bottom: 8px !important;
                }
            }
        </style>

        <div class="mx-auto max-w-6xl my-4 print:my-0">
            
            <!-- OUTER CERTIFICATE ORNAMENTAL FRAME -->
            <div class="certificate-outer-frame rounded-2xl bg-[#00551c] p-2.5 sm:p-3.5 shadow-2xl">
                <!-- INNER GOLD/BRONZE BORDER -->
                <div class="inner-cert-box rounded-xl border-2 border-[#d97706] bg-white p-5 sm:p-7 relative overflow-hidden text-slate-800">
                    
                    <!-- Watermark Logo inside Certificate (Ultra Light & Grayscale for Deep Color Prevention) -->
                    <div class="absolute inset-0 flex items-center justify-center pointer-events-none" style="opacity: 0.035;">
                        <img src="{{ asset('govt-bd-logo.png') }}" alt="Watermark" class="w-[420px] h-[420px] object-contain" style="opacity: 0.8; filter: grayscale(100%);">
                    </div>

                    <!-- CERTIFICATE HEADER -->
                    <div class="relative z-10 text-center pb-3 border-b border-[#00551c]/60 flex flex-col items-center">
                        <img src="{{ asset('govt-bd-logo.png') }}" alt="Government of Bangladesh" class="w-14 h-14 sm:w-16 sm:h-16 object-contain mb-1.5 drop-shadow-2xs">
                        <h1 class="text-lg sm:text-xl md:text-2xl font-black text-[#00551c] tracking-tight leading-tight">
                            গণপ্রজাতন্ত্রী বাংলাদেশ সরকার
                        </h1>
                        <p class="text-[9px] sm:text-[10px] font-extrabold tracking-[0.18em] uppercase text-slate-600 mt-0.5">
                            Government of the People's Republic of Bangladesh
                        </p>
                    </div>

                    <!-- CERTIFICATE TITLE RIBBON -->
                    <div class="relative z-10 mt-6 mb-4 text-center">
                        <div class="inline-block bg-[#00551c] text-white px-6 py-2 rounded-full border border-[#d97706] shadow-md">
                            <h2 class="text-sm sm:text-base font-black tracking-wide">নাগরিক ও জুলাই ২৪ ফাইটার তথ্য বিবরণী</h2>
                            <p class="text-[9px] sm:text-[10px] font-bold text-amber-300 uppercase tracking-wider mt-0.5">Official Citizen &amp; July Fighter Information Record</p>
                        </div>
                    </div>

                    <!-- REGISTRY METADATA BAR -->
                    <div class="relative z-10 flex flex-wrap items-center justify-between gap-2 bg-slate-100/90 border border-slate-300 rounded-lg px-3.5 py-1.5 mb-3.5 text-[10px] sm:text-[11px] font-bold text-slate-700 shadow-2xs">
                        <div class="flex items-center gap-1.5">
                            <span class="text-slate-500">বিবরণী নং / Record No:</span>
                            <span class="text-indigo-700 font-black text-xs sm:text-[13px]">JF-2026-{{ str_pad($person->id, 6, '0', STR_PAD_LEFT) }}</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <span class="text-slate-500">ইস্যুর তারিখ / Issue Date:</span>
                            <span class="text-[#00551c] font-black text-xs sm:text-[13px]">{{ date('d/m/Y') }}</span>
                        </div>
                    </div>

                    <!-- PROFILE SUMMARY & PHOTO CARD -->
                    <div class="cert-section relative z-10 bg-slate-50/80 border border-slate-200 rounded-2xl p-5 mb-5 flex flex-col sm:flex-row items-center sm:items-start gap-6 shadow-2xs">
                        <!-- Photo Frame (Passport Size 40mm x 50mm / 160px x 200px with Green Border) -->
                        <div class="rounded-xl border-2 border-[#00551c] p-1.5 bg-white flex items-center justify-center flex-shrink-0 shadow-md" style="width: 160px; min-width: 160px; height: 200px; min-height: 200px;">
                            <div class="rounded-lg overflow-hidden flex items-center justify-center bg-slate-100" style="width: 100%; height: 100%;">
                                @if (!empty($person->photo) || !empty($person->personalInfo?->photo) || !empty($person->photo_path))
                                    <img src="{{ asset($person->photo ?: ($person->personalInfo?->photo ?: $person->photo_path)) }}" alt="Passport Photo" class="w-full h-full object-cover" style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                    <img src="{{ asset('bydefaultpic.png') }}" alt="Default Passport Photo" class="w-full h-full object-cover" style="width: 100%; height: 100%; object-fit: cover;">
                                @endif
                            </div>
                        </div>

                        <!-- Summary Fields in Vertical Column (Screenshot Format) -->
                        <div class="w-full sm:w-[480px] flex flex-col space-y-1.5 text-xs sm:text-[13.5px]" style="max-width: 480px; width: 100%; display: flex; flex-direction: column; gap: 5px;">
                            <div class="bg-[#f1f5f9] border border-slate-200/80 rounded-xl px-4 py-1.5 flex items-baseline shadow-2xs" style="background-color: #f1f5f9; padding: 7px 16px; border-radius: 12px; display: flex; align-items: baseline;">
                                <span class="font-bold text-slate-700 shrink-0" style="width: 145px; min-width: 145px;">Name (English)</span>
                                <span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span>
                                <span class="flex-1 font-extrabold text-slate-900 pl-1.5">{{ $person->name }}</span>
                            </div>
                            <div class="bg-[#f1f5f9] border border-slate-200/80 rounded-xl px-4 py-1.5 flex items-baseline shadow-2xs" style="background-color: #f1f5f9; padding: 7px 16px; border-radius: 12px; display: flex; align-items: baseline;">
                                <span class="font-bold text-slate-700 shrink-0" style="width: 145px; min-width: 145px;">Name (Bangla)</span>
                                <span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span>
                                <span class="flex-1 font-black text-[#00551c] pl-1.5">{{ $person->personalInfo?->full_name_bangla ?: 'N/A' }}</span>
                            </div>
                            <div class="bg-[#f1f5f9] border border-slate-200/80 rounded-xl px-4 py-1.5 flex items-baseline shadow-2xs" style="background-color: #f1f5f9; padding: 7px 16px; border-radius: 12px; display: flex; align-items: baseline;">
                                <span class="font-bold text-slate-700 shrink-0" style="width: 145px; min-width: 145px;">National ID (NID)</span>
                                <span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span>
                                <span class="flex-1 font-extrabold text-slate-900 pl-1.5">{{ $person->nid_number ?: ($person->personalInfo?->national_id ?: 'N/A') }}</span>
                            </div>
                            <div class="bg-[#f1f5f9] border border-slate-200/80 rounded-xl px-4 py-1.5 flex items-baseline shadow-2xs" style="background-color: #f1f5f9; padding: 7px 16px; border-radius: 12px; display: flex; align-items: baseline;">
                                <span class="font-bold text-slate-700 shrink-0" style="width: 145px; min-width: 145px;">Mobile No</span>
                                <span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span>
                                <span class="flex-1 font-extrabold text-slate-900 pl-1.5">{{ $person->phone ?: 'N/A' }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 1: PERSONAL INFORMATION -->
                    <div class="cert-section relative z-10 mb-4">
                        <div class="bg-[#00551c] text-white px-3.5 py-1.5 rounded-lg font-extrabold text-xs sm:text-sm mb-2.5 flex items-center justify-between border-l-4 border-[#d97706] shadow-2xs">
                            <span>ব্যক্তিগত তথ্য / Personal Information</span>
                            @if ($person->julyFighterInfo?->is_july_fighter)
                                <span class="bg-amber-400 text-slate-950 px-2 py-0.5 rounded text-[10px] font-black tracking-wide">VERIFIED FIGHTER</span>
                            @endif
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-2 text-xs sm:text-[13.5px] px-2">
                            <div class="flex items-baseline border-b border-slate-200/80 pb-1 pt-0.5">
                                <span class="font-bold text-slate-600 shrink-0" style="width: 150px; min-width: 150px;">Date of Birth</span>
                                <span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span>
                                <span class="flex-1 font-semibold text-slate-900 pl-1.5">{{ $person->date_of_birth ? $person->date_of_birth->format('d-m-Y') : ($person->personalInfo?->date_of_birth?->format('d-m-Y') ?: 'N/A') }}</span>
                            </div>
                            <div class="flex items-baseline border-b border-slate-200/80 pb-1 pt-0.5">
                                <span class="font-bold text-slate-600 shrink-0" style="width: 150px; min-width: 150px;">Birth Reg No</span>
                                <span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span>
                                <span class="flex-1 font-semibold text-slate-900 pl-1.5">{{ $person->personalInfo?->birth_reg_no ?: 'N/A' }}</span>
                            </div>
                            <div class="flex items-baseline border-b border-slate-200/80 pb-1 pt-0.5">
                                <span class="font-bold text-slate-600 shrink-0" style="width: 150px; min-width: 150px;">Birth Place</span>
                                <span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span>
                                <span class="flex-1 font-semibold text-slate-900 pl-1.5">{{ $person->personalInfo?->birth_place ?: 'N/A' }}</span>
                            </div>
                            <div class="flex items-baseline border-b border-slate-200/80 pb-1 pt-0.5">
                                <span class="font-bold text-slate-600 shrink-0" style="width: 150px; min-width: 150px;">Blood Group</span>
                                <span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span>
                                <span class="flex-1 font-black text-red-600 pl-1.5">{{ $person->personalInfo?->blood_group ?: 'N/A' }}</span>
                            </div>
                            <div class="flex items-baseline border-b border-slate-200/80 pb-1 pt-0.5">
                                <span class="font-bold text-slate-600 shrink-0" style="width: 150px; min-width: 150px;">Religion</span>
                                <span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span>
                                <span class="flex-1 font-semibold text-slate-900 pl-1.5">{{ $person->personalInfo?->religion ?: 'N/A' }}</span>
                            </div>
                            <div class="flex items-baseline border-b border-slate-200/80 pb-1 pt-0.5">
                                <span class="font-bold text-slate-600 shrink-0" style="width: 150px; min-width: 150px;">Gender</span>
                                <span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span>
                                <span class="flex-1 font-semibold text-slate-900 pl-1.5">{{ $person->personalInfo?->gender ?: 'N/A' }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 2: FAMILY INFORMATION -->
                    <div class="cert-section relative z-10 mb-4">
                        <div class="bg-[#00551c] text-white px-3.5 py-1.5 rounded-lg font-extrabold text-xs sm:text-sm mb-2.5 border-l-4 border-[#d97706] shadow-2xs">
                            পারিবারিক তথ্য / Family Information
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-2 text-xs sm:text-[13.5px] px-2">
                            <div class="flex items-baseline border-b border-slate-200/80 pb-1 pt-0.5">
                                <span class="font-bold text-slate-600 shrink-0" style="width: 150px; min-width: 150px;">Father's Name</span>
                                <span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span>
                                <span class="flex-1 font-semibold text-slate-900 pl-1.5">{{ $person->familyInfo?->father_name ?: ($person->personalInfo?->father_name ?: 'N/A') }}</span>
                            </div>
                            <div class="flex items-baseline border-b border-slate-200/80 pb-1 pt-0.5">
                                <span class="font-bold text-slate-600 shrink-0" style="width: 150px; min-width: 150px;">Father (Bangla)</span>
                                <span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span>
                                <span class="flex-1 font-semibold text-slate-900 pl-1.5">{{ $person->familyInfo?->father_name_bangla ?: 'N/A' }}</span>
                            </div>
                            <div class="flex items-baseline border-b border-slate-200/80 pb-1 pt-0.5">
                                <span class="font-bold text-slate-600 shrink-0" style="width: 150px; min-width: 150px;">Mother's Name</span>
                                <span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span>
                                <span class="flex-1 font-semibold text-slate-900 pl-1.5">{{ $person->familyInfo?->mother_name ?: ($person->personalInfo?->mother_name ?: 'N/A') }}</span>
                            </div>
                            <div class="flex items-baseline border-b border-slate-200/80 pb-1 pt-0.5">
                                <span class="font-bold text-slate-600 shrink-0" style="width: 150px; min-width: 150px;">Mother (Bangla)</span>
                                <span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span>
                                <span class="flex-1 font-semibold text-slate-900 pl-1.5">{{ $person->familyInfo?->mother_name_bangla ?: 'N/A' }}</span>
                            </div>
                            <div class="flex items-baseline border-b border-slate-200/80 pb-1 pt-0.5">
                                <span class="font-bold text-slate-600 shrink-0" style="width: 150px; min-width: 150px;">Marital Status</span>
                                <span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span>
                                <span class="flex-1 font-semibold text-slate-900 pl-1.5">{{ $person->familyInfo?->marital_status ?: ($person->personalInfo?->marital_status ?: 'N/A') }}</span>
                            </div>
                            <div class="flex items-baseline border-b border-slate-200/80 pb-1 pt-0.5">
                                <span class="font-bold text-slate-600 shrink-0" style="width: 150px; min-width: 150px;">Spouse Name</span>
                                <span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span>
                                <span class="flex-1 font-semibold text-slate-900 pl-1.5">{{ $person->familyInfo?->spouse_name ?: 'N/A' }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 3: ADDRESS INFORMATION -->
                    <div class="cert-section relative z-10 mb-4">
                        <div class="bg-[#00551c] text-white px-3.5 py-1.5 rounded-lg font-extrabold text-xs sm:text-sm mb-2.5 border-l-4 border-[#d97706] shadow-2xs">
                            ঠিকানার তথ্য / Address Information
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 text-xs sm:text-[13px]">
                            <div class="bg-slate-50 p-3.5 rounded-xl border border-slate-200 space-y-1.5 shadow-2xs">
                                <h4 class="font-black text-[#00551c] text-xs sm:text-[13.5px] border-b border-slate-300 pb-1.5 mb-1.5">স্থায়ী ঠিকানা / Permanent Address</h4>
                                <div class="space-y-1 pt-0.5">
                                    <div class="flex items-baseline py-0.5"><span class="font-bold text-slate-600 shrink-0" style="width: 95px; min-width: 95px;">Division</span><span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span> <span class="flex-1 font-semibold pl-1.5">{{ $person->addressInfo?->permanentDivision?->name ?: ($person->addressInfo?->division ?: 'N/A') }}</span></div>
                                    <div class="flex items-baseline py-0.5"><span class="font-bold text-slate-600 shrink-0" style="width: 95px; min-width: 95px;">District</span><span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span> <span class="flex-1 font-semibold pl-1.5">{{ $person->addressInfo?->permanentDistrict?->name ?: ($person->addressInfo?->district ?: 'N/A') }}</span></div>
                                    <div class="flex items-baseline py-0.5"><span class="font-bold text-slate-600 shrink-0" style="width: 95px; min-width: 95px;">Thana</span><span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span> <span class="flex-1 font-semibold pl-1.5">{{ $person->addressInfo?->permanentThana?->name ?: ($person->addressInfo?->upazila ?: 'N/A') }}</span></div>
                                    <div class="flex items-baseline py-0.5"><span class="font-bold text-slate-600 shrink-0" style="width: 95px; min-width: 95px;">Post Office</span><span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span> <span class="flex-1 font-semibold pl-1.5">{{ $person->addressInfo?->permanentPostOffice?->name ?: 'N/A' }}</span></div>
                                    <div class="flex items-baseline py-0.5"><span class="font-bold text-slate-600 shrink-0" style="width: 95px; min-width: 95px;">Village</span><span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span> <span class="flex-1 font-semibold pl-1.5">{{ $person->addressInfo?->permanent_village ?: 'N/A' }}</span></div>
                                    <div class="flex items-baseline py-0.5"><span class="font-bold text-slate-600 shrink-0" style="width: 95px; min-width: 95px;">House/Road</span><span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span> <span class="flex-1 font-semibold pl-1.5">{{ $person->addressInfo?->permanent_house ?: ($person->addressInfo?->permanent_road ?: 'N/A') }}</span></div>
                                </div>
                            </div>

                            <div class="bg-slate-50 p-3.5 rounded-xl border border-slate-200 space-y-1.5 shadow-2xs">
                                <h4 class="font-black text-[#00551c] text-xs sm:text-[13.5px] border-b border-slate-300 pb-1.5 mb-1.5">বর্তমান ঠিকানা / Present Address</h4>
                                <div class="space-y-1 pt-0.5">
                                    <div class="flex items-baseline py-0.5"><span class="font-bold text-slate-600 shrink-0" style="width: 95px; min-width: 95px;">Division</span><span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span> <span class="flex-1 font-semibold pl-1.5">{{ $person->addressInfo?->presentDivision?->name ?: ($person->addressInfo?->division ?: 'N/A') }}</span></div>
                                    <div class="flex items-baseline py-0.5"><span class="font-bold text-slate-600 shrink-0" style="width: 95px; min-width: 95px;">District</span><span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span> <span class="flex-1 font-semibold pl-1.5">{{ $person->addressInfo?->presentDistrict?->name ?: ($person->addressInfo?->district ?: 'N/A') }}</span></div>
                                    <div class="flex items-baseline py-0.5"><span class="font-bold text-slate-600 shrink-0" style="width: 95px; min-width: 95px;">Thana</span><span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span> <span class="flex-1 font-semibold pl-1.5">{{ $person->addressInfo?->presentThana?->name ?: ($person->addressInfo?->upazila ?: 'N/A') }}</span></div>
                                    <div class="flex items-baseline py-0.5"><span class="font-bold text-slate-600 shrink-0" style="width: 95px; min-width: 95px;">Post Office</span><span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span> <span class="flex-1 font-semibold pl-1.5">{{ $person->addressInfo?->presentPostOffice?->name ?: 'N/A' }}</span></div>
                                    <div class="flex items-baseline py-0.5"><span class="font-bold text-slate-600 shrink-0" style="width: 95px; min-width: 95px;">Village</span><span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span> <span class="flex-1 font-semibold pl-1.5">{{ $person->addressInfo?->present_village ?: 'N/A' }}</span></div>
                                    <div class="flex items-baseline py-0.5"><span class="font-bold text-slate-600 shrink-0" style="width: 95px; min-width: 95px;">House/Road</span><span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span> <span class="flex-1 font-semibold pl-1.5">{{ $person->addressInfo?->present_house ?: ($person->addressInfo?->present_road ?: 'N/A') }}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 4: EDUCATION & PROFESSION -->
                    <div class="cert-section relative z-10 mb-4">
                        <div class="bg-[#00551c] text-white px-3.5 py-1.5 rounded-lg font-extrabold text-xs sm:text-sm mb-2.5 border-l-4 border-[#d97706] shadow-2xs">
                            শিক্ষাগত ও পেশাগত তথ্য / Education & Profession Information
                        </div>
                        @php
                            $eduDetails = $person->educationInfo?->education_details;
                            if (is_string($eduDetails)) { $eduDetails = json_decode($eduDetails, true); }
                            
                            $highestEdu = $person->educationInfo?->highest_education;
                            $studyStatus = $person->educationInfo?->study_status;
                            $resultGrade = $person->educationInfo?->result;
                            $passingYear = $person->educationInfo?->passing_year;
                            $institution = $person->educationInfo?->institution_name;
                            $boardName = 'N/A';

                            if (!empty($eduDetails) && is_array($eduDetails) && count($eduDetails) > 0) {
                                $firstEdu = $eduDetails[0];
                                $highestEdu = $firstEdu['degree'] ?? $highestEdu;
                                $studyStatus = $firstEdu['group'] ?? $studyStatus;
                                $resultGrade = $firstEdu['grade'] ?? $resultGrade;
                                $boardName = $firstEdu['board'] ?? $boardName;
                                $passingYear = $firstEdu['passing_year'] ?? $passingYear;
                                $institution = $firstEdu['institute'] ?? $institution;
                            }
                        @endphp

                        <!-- Formatted in 2 Columns with Aligned Colons -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-2 text-xs sm:text-[13.5px] px-2">
                            <div class="flex items-baseline border-b border-slate-200/80 pb-1 pt-0.5">
                                <span class="font-bold text-slate-600 shrink-0" style="width: 150px; min-width: 150px;">Highest Degree</span>
                                <span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span>
                                <span class="flex-1 font-semibold text-slate-900 pl-1.5">{{ $highestEdu ?: 'N/A' }}</span>
                            </div>
                            <div class="flex items-baseline border-b border-slate-200/80 pb-1 pt-0.5">
                                <span class="font-bold text-slate-600 shrink-0" style="width: 150px; min-width: 150px;">Profession</span>
                                <span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span>
                                <span class="flex-1 font-semibold text-slate-900 pl-1.5">{{ $person->professionInfo?->profession ?: 'N/A' }}</span>
                            </div>
                            <div class="flex items-baseline border-b border-slate-200/80 pb-1 pt-0.5">
                                <span class="font-bold text-slate-600 shrink-0" style="width: 150px; min-width: 150px;">Study Group</span>
                                <span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span>
                                <span class="flex-1 font-semibold text-slate-900 pl-1.5">{{ $studyStatus ?: '-' }}</span>
                            </div>
                            <div class="flex items-baseline border-b border-slate-200/80 pb-1 pt-0.5">
                                <span class="font-bold text-slate-600 shrink-0" style="width: 150px; min-width: 150px;">Workplace / Org.</span>
                                <span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span>
                                <span class="flex-1 font-semibold text-slate-900 pl-1.5">{{ $person->professionInfo?->workplace ?: 'N/A' }}</span>
                            </div>
                            <div class="flex items-baseline border-b border-slate-200/80 pb-1 pt-0.5">
                                <span class="font-bold text-slate-600 shrink-0" style="width: 150px; min-width: 150px;">Grade / Result</span>
                                <span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span>
                                <span class="flex-1 font-semibold text-slate-900 pl-1.5">{{ $resultGrade ?: '-' }}</span>
                            </div>
                            <div class="flex items-baseline border-b border-slate-200/80 pb-1 pt-0.5">
                                <span class="font-bold text-slate-600 shrink-0" style="width: 150px; min-width: 150px;">Designation</span>
                                <span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span>
                                <span class="flex-1 font-semibold text-slate-900 pl-1.5">{{ $person->professionInfo?->designation ?: 'N/A' }}</span>
                            </div>
                            <div class="flex items-baseline border-b border-slate-200/80 pb-1 pt-0.5">
                                <span class="font-bold text-slate-600 shrink-0" style="width: 150px; min-width: 150px;">Passing Year</span>
                                <span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span>
                                <span class="flex-1 font-semibold text-slate-900 pl-1.5">{{ $passingYear ?: '-' }}</span>
                            </div>
                            <div class="flex items-baseline border-b border-slate-200/80 pb-1 pt-0.5">
                                <span class="font-bold text-slate-600 shrink-0" style="width: 150px; min-width: 150px;">Experience Years</span>
                                <span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span>
                                <span class="flex-1 font-semibold text-slate-900 pl-1.5">{{ $person->professionInfo?->experience_years ? ($person->professionInfo->experience_years . ' Yrs') : 'N/A' }}</span>
                            </div>
                            <div class="flex items-baseline border-b border-slate-200/80 pb-1 pt-0.5 sm:col-span-2">
                                <span class="font-bold text-slate-600 shrink-0" style="width: 150px; min-width: 150px;">Institute Name</span>
                                <span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span>
                                <span class="flex-1 font-semibold text-slate-900 pl-1.5">{{ $institution ?: 'N/A' }}</span>
                            </div>
                        </div>

                        @if(!empty($eduDetails) && is_array($eduDetails) && count($eduDetails) > 1)
                        <!-- Additional Degrees Table (If multiple degrees exist) -->
                        <div class="mt-3 overflow-x-auto pt-2.5 border-t border-slate-200/80">
                            <div class="text-xs font-bold text-slate-600 mb-1.5">অন্যান্য শিক্ষাগত যোগ্যতার বিবরণী (Additional Degrees):</div>
                            <table class="w-full border-collapse border border-slate-200 text-xs">
                                <thead>
                                    <tr class="bg-slate-100 text-slate-700 font-bold">
                                        <th class="border border-slate-200 p-1.5 text-left">Degree</th>
                                        <th class="border border-slate-200 p-1.5 text-left">Group</th>
                                        <th class="border border-slate-200 p-1.5 text-left">Grade</th>
                                        <th class="border border-slate-200 p-1.5 text-left">Board</th>
                                        <th class="border border-slate-200 p-1.5 text-center">Year</th>
                                        <th class="border border-slate-200 p-1.5 text-left">Institute</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($eduDetails as $index => $edu)
                                        @if($index > 0)
                                        <tr class="hover:bg-slate-50">
                                            <td class="border border-slate-200 p-1.5 font-semibold text-slate-900">{{ $edu['degree'] ?? 'N/A' }}</td>
                                            <td class="border border-slate-200 p-1.5 text-slate-700">{{ $edu['group'] ?? '-' }}</td>
                                            <td class="border border-slate-200 p-1.5 text-slate-700">{{ $edu['grade'] ?? '-' }}</td>
                                            <td class="border border-slate-200 p-1.5 text-slate-700">{{ $edu['board'] ?? '-' }}</td>
                                            <td class="border border-slate-200 p-1.5 text-center text-slate-700">{{ $edu['passing_year'] ?? '-' }}</td>
                                            <td class="border border-slate-200 p-1.5 text-slate-700">{{ $edu['institute'] ?? '-' }}</td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>

                    @if($person->treatmentInfo && ($person->treatmentInfo->hospital_name || $person->treatmentInfo->doctor_name || $person->treatmentInfo->treatment_status))
                    <!-- SECTION 5: TREATMENT INFORMATION -->
                    <div class="cert-section relative z-10 mb-4">
                        <div class="bg-[#00551c] text-white px-3.5 py-1.5 rounded-lg font-extrabold text-xs sm:text-sm mb-2.5 border-l-4 border-[#d97706] shadow-2xs">
                            চিকিৎসা ও হাসপাতালের বিবরণী / Treatment Information
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-2 text-xs sm:text-[13.5px] px-2">
                            <div class="flex items-baseline border-b border-slate-200/80 pb-1 pt-0.5">
                                <span class="font-bold text-slate-600 shrink-0" style="width: 150px; min-width: 150px;">Hospital Name</span>
                                <span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span>
                                <span class="flex-1 font-semibold text-slate-900 pl-1.5">{{ $person->treatmentInfo->hospital_name ?: 'N/A' }}</span>
                            </div>
                            <div class="flex items-baseline border-b border-slate-200/80 pb-1 pt-0.5">
                                <span class="font-bold text-slate-600 shrink-0" style="width: 150px; min-width: 150px;">Doctor Name</span>
                                <span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span>
                                <span class="flex-1 font-semibold text-slate-900 pl-1.5">{{ $person->treatmentInfo->doctor_name ?: 'N/A' }}</span>
                            </div>
                            <div class="flex items-baseline border-b border-slate-200/80 pb-1 pt-0.5">
                                <span class="font-bold text-slate-600 shrink-0" style="width: 150px; min-width: 150px;">Treatment Loc.</span>
                                <span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span>
                                <span class="flex-1 font-semibold text-slate-900 pl-1.5">{{ $person->treatmentInfo->treatment_location ?: 'N/A' }}</span>
                            </div>
                            <div class="flex items-baseline border-b border-slate-200/80 pb-1 pt-0.5">
                                <span class="font-bold text-slate-600 shrink-0" style="width: 150px; min-width: 150px;">Current Status</span>
                                <span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span>
                                <span class="flex-1 font-bold text-indigo-700 pl-1.5">{{ $person->treatmentInfo->treatment_status ?: 'N/A' }}</span>
                            </div>
                            <div class="flex items-baseline border-b border-slate-200/80 pb-1 pt-0.5 sm:col-span-2">
                                <span class="font-bold text-slate-600 shrink-0" style="width: 150px; min-width: 150px;">Medical Expense</span>
                                <span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span>
                                <span class="flex-1 font-semibold text-slate-900 pl-1.5">{{ $person->treatmentInfo->medical_expenses ? (number_format($person->treatmentInfo->medical_expenses, 0) . ' BDT') : 'N/A' }}</span>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- SECTION 6: JULY 24 FIGHTER INFORMATION -->
                    <div class="cert-section relative z-10 mb-5">
                        <div class="bg-[#00551c] text-white px-3.5 py-1.5 rounded-lg font-extrabold text-xs sm:text-sm mb-2.5 border-l-4 border-[#d97706] shadow-2xs">
                            জুলাই ২৪ ফাইটার বিবরণী / July 24 Fighter Information
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-2 text-xs sm:text-[13.5px] px-2">
                            <div class="flex items-baseline border-b border-slate-200/80 pb-1 pt-0.5">
                                <span class="font-bold text-slate-600 shrink-0" style="width: 150px; min-width: 150px;">Fighter Status</span>
                                <span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span>
                                <span class="flex-1 font-black text-emerald-700 pl-1.5">{{ $person->julyFighterInfo?->is_july_fighter ? 'Verified Fighter' : 'Registered Participant' }}</span>
                            </div>
                            <div class="flex items-baseline border-b border-slate-200/80 pb-1 pt-0.5">
                                <span class="font-bold text-slate-600 shrink-0" style="width: 150px; min-width: 150px;">Fighter Role</span>
                                <span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span>
                                <span class="flex-1 font-black text-indigo-700 pl-1.5">{{ $person->julyFighterInfo?->fighter_type ?: 'N/A' }}</span>
                            </div>
                            @if($person->julyFighterInfo?->incident_date)
                            <div class="flex items-baseline border-b border-slate-200/80 pb-1 pt-0.5">
                                <span class="font-bold text-slate-600 shrink-0" style="width: 150px; min-width: 150px;">Incident Date</span>
                                <span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span>
                                <span class="flex-1 font-semibold text-slate-900 pl-1.5">{{ $person->julyFighterInfo->incident_date->format('d/m/Y') }}</span>
                            </div>
                            @endif
                            <div class="flex items-baseline border-b border-slate-200/80 pb-1 pt-0.5">
                                <span class="font-bold text-slate-600 shrink-0" style="width: 150px; min-width: 150px;">Incident Area</span>
                                <span class="font-black text-slate-500 shrink-0 text-center" style="width: 15px; min-width: 15px;">:</span>
                                <span class="flex-1 font-bold text-slate-900 pl-1.5">{{ $person->julyFighterInfo?->incident_location ?: 'N/A' }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- CERTIFICATE FOOTER & SIGNATURE SECTIONS -->
                    <div class="relative z-10 border-t border-slate-300 pt-8 pb-3">
                        <div class="grid grid-cols-3 gap-4 text-center text-xs sm:text-[13px] font-bold text-slate-700 items-end">
                            <div>
                                <div class="border-b border-slate-700 w-3/4 mx-auto mb-1.5"></div>
                                <span class="font-extrabold text-[#00551c]">প্রস্তুতকারী / Prepared By</span>
                                <p class="text-[10px] sm:text-xs font-semibold text-slate-500 mt-0.5">Registry Officer</p>
                            </div>
                            <div>
                                <!-- Security Seal Badge -->
                                <div class="w-16 h-16 mx-auto rounded-full border border-dashed border-[#d97706] flex items-center justify-center text-[9px] font-black text-[#d97706] uppercase tracking-wider mb-1">
                                    Official<br>Seal
                                </div>
                                <span class="font-extrabold text-[#00551c]">অফিসিয়াল সীল / Official Seal</span>
                            </div>
                            <div>
                                <div class="border-b border-slate-700 w-3/4 mx-auto mb-1.5"></div>
                                <span class="font-extrabold text-[#00551c]">অনুমোদনকারী / Authorized Authority</span>
                                <p class="text-[10px] sm:text-xs font-semibold text-slate-500 mt-0.5">July 24 Welfare Registry</p>
                            </div>
                        </div>

                        <!-- Verification Note at Bottom -->
                        <div class="mt-5 pt-3 border-t border-slate-200 flex flex-col sm:flex-row items-center justify-between text-[10px] sm:text-[11px] text-slate-600 font-bold gap-1.5">
                            <div>
                                * এই তথ্য বিবরণীটি ডিজিটাল আর্কাইভ হতে প্রস্তুতকৃত এবং যাচাইকৃত।
                            </div>
                            <div>
                                Verification Code: <span class="font-mono font-black text-slate-800">{{ strtoupper(substr(md5($person->id . $person->email), 0, 10)) }}</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- END CERTIFICATE FRAME -->

            <!-- ACTION BUTTONS (OUTSIDE CERTIFICATE FRAME, HIDDEN ON PRINT) -->
            <div class="flex flex-wrap items-center justify-center gap-4 mt-8 print:hidden">
                <!-- 1. Print Button -->
                <button type="button" onclick="window.print()" class="rounded-xl bg-slate-800 hover:bg-slate-900 px-8 py-3.5 text-sm font-extrabold text-white shadow-xl hover:shadow-2xl flex items-center gap-2.5 transition transform hover:-translate-y-0.5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 00-2 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                    <span>Print</span>
                </button>

                <!-- 2. Edit Button -->
                <a href="{{ route('admin.july-fighter.edit', $person) }}" class="rounded-xl bg-blue-600 hover:bg-blue-700 px-8 py-3.5 text-sm font-extrabold text-white shadow-xl hover:shadow-2xl flex items-center gap-2.5 transition transform hover:-translate-y-0.5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    <span>Edit</span>
                </a>

                <!-- 3. Approve Button -->
                @if(!$person->julyFighterInfo?->is_july_fighter)
                    <form method="POST" action="{{ route('admin.july-fighter.approve', $person) }}" class="m-0">
                        @csrf
                        <button type="submit" class="rounded-xl bg-[#00551c] hover:bg-[#004015] px-8 py-3.5 text-sm font-extrabold text-white shadow-xl hover:shadow-2xl flex items-center gap-2.5 transition transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Approve</span>
                        </button>
                    </form>
                @else
                    <span class="rounded-xl bg-emerald-100 border border-emerald-300 px-6 py-3.5 text-sm font-extrabold text-emerald-800 flex items-center gap-2">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        <span>Approved (Showing in Reg. July Fighter List)</span>
                    </span>
                @endif
            </div>

        </div>
    </x-admin.shell>
</x-layouts.app>
