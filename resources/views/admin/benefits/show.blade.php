<x-layouts.app title="Benefit Voucher #BN-{{ str_pad($benefit->id, 6, '0', STR_PAD_LEFT) }}">
    <x-admin.shell>
        <style>
            @media print {
                @page {
                    size: A4 portrait;
                    margin: 8mm;
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
                    padding: 10px 14px !important;
                    border-width: 2px !important;
                }
                .cert-section {
                    margin-bottom: 6px !important;
                }
            }
        </style>

        <div class="mx-auto max-w-4xl my-3 print:my-0 space-y-4">
            
            <!-- Action Navigation Bar (Hidden in Print) -->
            <div class="flex items-center justify-between print:hidden">
                <div class="flex items-center gap-2">
                    <a href="{{ route('admin.benefits.index') }}" class="px-3.5 py-1.5 rounded-xl bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 font-bold text-[11px] transition shadow-2xs flex items-center gap-1.5">
                        <span>&larr;</span>
                        <span>সুবিধার তালিকা (List)</span>
                    </a>
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{ route('admin.benefits.edit', $benefit) }}" class="px-3.5 py-1.5 rounded-xl bg-amber-500 hover:bg-amber-600 text-white font-bold text-[11px] transition shadow-md flex items-center gap-1.5">
                        <span>✏️</span>
                        <span>সম্পাদন করুন (Edit)</span>
                    </a>
                    <button type="button" onclick="window.print()" class="px-4 py-1.5 rounded-xl bg-[#00551c] hover:bg-[#004416] text-white font-extrabold text-[11px] transition shadow-md flex items-center gap-1.5">
                        <span>🖨️</span>
                        <span>প্রিন্ট ভাউচার (Print A4 Voucher)</span>
                    </button>
                </div>
            </div>

            <!-- OUTER CERTIFICATE ORNAMENTAL FRAME -->
            <div class="certificate-outer-frame rounded-2xl bg-[#00551c] p-2 sm:p-2.5 shadow-xl">
                <!-- INNER GOLD/BRONZE BORDER -->
                <div class="inner-cert-box rounded-xl border-2 border-[#d97706] bg-white p-5 sm:p-6 relative overflow-hidden text-slate-800">
                    
                    <!-- Watermark Logo inside Certificate -->
                    <div class="absolute inset-0 flex items-center justify-center pointer-events-none opacity-[0.03]">
                        <img src="{{ asset('govt-bd-logo.png') }}" alt="Watermark" class="w-[340px] h-[340px] object-contain">
                    </div>

                    <!-- CERTIFICATE HEADER -->
                    <div class="relative z-10 text-center pb-2.5 border-b border-[#00551c]/60 flex flex-col items-center">
                        <img src="{{ asset('govt-bd-logo.png') }}" alt="Government of Bangladesh" class="w-12 h-12 sm:w-14 sm:h-14 object-contain mb-1 drop-shadow-2xs">
                        <h1 class="text-base sm:text-lg md:text-xl font-black text-[#00551c] tracking-tight leading-tight">
                            গণপ্রজাতন্ত্রী বাংলাদেশ সরকার
                        </h1>
                        <p class="text-[8px] sm:text-[9px] font-extrabold tracking-[0.15em] uppercase text-slate-600">
                            Government of the People's Republic of Bangladesh
                        </p>
                    </div>

                    <!-- CERTIFICATE TITLE RIBBON -->
                    <div class="relative z-10 my-3 text-center">
                        <div class="inline-block bg-[#00551c] text-white px-5 py-1.5 rounded-full border border-[#d97706] shadow-2xs">
                            <h2 class="text-xs sm:text-sm font-black tracking-wide">সরকারি অনুদান ও সুবিধা প্রদান বিবরণী</h2>
                            <p class="text-[8px] sm:text-[9px] font-bold text-amber-300 uppercase tracking-wider">Official Benefit Sanction &amp; Disbursement Voucher</p>
                        </div>
                    </div>

                    <!-- REGISTRY METADATA BAR -->
                    <div class="relative z-10 rounded-xl bg-slate-50 border border-slate-200 p-2.5 my-3 flex flex-wrap items-center justify-between gap-2 text-[11px]">
                        <div>
                            <span class="font-bold text-slate-500">ভাউচার নং (Voucher No):</span>
                            <span class="font-black text-slate-800 text-xs ml-1">#BN-{{ str_pad($benefit->id, 6, '0', STR_PAD_LEFT) }}</span>
                        </div>
                        <div>
                            <span class="font-bold text-slate-500">মঞ্জুরীর তারিখ (Sanction Date):</span>
                            <span class="font-black text-[#00551c] text-xs ml-1">{{ $benefit->approval_date ? $benefit->approval_date->format('d F, Y') : $benefit->created_at->format('d F, Y') }}</span>
                        </div>
                        <div>
                            <span class="font-bold text-slate-500">স্ট্যাটাস (Status):</span>
                            @if($benefit->status === 'Approved')
                                <span class="ml-1 px-2.5 py-0.5 rounded-full bg-emerald-100 text-emerald-800 text-[10px] font-extrabold border border-emerald-300/60">Approved (অনুমোদিত)</span>
                            @elseif($benefit->status === 'Paid')
                                <span class="ml-1 px-2.5 py-0.5 rounded-full bg-blue-100 text-blue-800 text-[10px] font-extrabold border border-blue-300/60">Paid (প্রদানকৃত)</span>
                            @elseif($benefit->status === 'Pending')
                                <span class="ml-1 px-2.5 py-0.5 rounded-full bg-amber-100 text-amber-800 text-[10px] font-extrabold border border-amber-300/60">Pending (প্রক্রিয়াধীন)</span>
                            @else
                                <span class="ml-1 px-2.5 py-0.5 rounded-full bg-red-100 text-red-800 text-[10px] font-extrabold border border-red-300/60">{{ $benefit->status }}</span>
                            @endif
                        </div>
                    </div>

                    <!-- SECTION 1: BENEFICIARY DETAILS -->
                    <div class="cert-section relative z-10 rounded-xl border border-emerald-200/80 bg-emerald-50/20 p-3.5 mb-3">
                        <h3 class="text-[11px] font-black text-[#00551c] uppercase tracking-wider mb-2 border-b border-emerald-200 pb-1 flex items-center justify-between">
                            <span>১. সুবিধাভোগীর পরিচিতি (Beneficiary Information)</span>
                            @if($benefit->person?->julyFighterInfo)
                                <span class="bg-[#00551c] text-white px-2 py-0.5 rounded text-[8.5px]">নিবন্ধিত জুলাই ২৪ ফাইটার</span>
                            @endif
                        </h3>
                        @if ($benefit->person)
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-2.5 text-[11px]">
                                <div>
                                    <span class="text-[10px] text-slate-400 font-bold block">সুবিধাভোগীর নাম (Name):</span>
                                    <span class="font-black text-slate-800 text-xs">{{ $benefit->person->name }}</span>
                                </div>
                                <div>
                                    <span class="text-[10px] text-slate-400 font-bold block">মোবাইল নম্বর (Phone):</span>
                                    <span class="font-bold text-slate-800">{{ $benefit->person->phone ?? 'N/A' }}</span>
                                </div>
                                <div>
                                    <span class="text-[10px] text-slate-400 font-bold block">জাতীয় পরিচয়পত্র (NID):</span>
                                    <span class="font-bold text-slate-800">{{ $benefit->person->nid_number ?? 'N/A' }}</span>
                                </div>
                                <div>
                                    <span class="text-[10px] text-slate-400 font-bold block">ইমেইল (Email):</span>
                                    <span class="font-semibold text-slate-700">{{ $benefit->person->email ?? 'N/A' }}</span>
                                </div>
                                <div>
                                    <span class="text-[10px] text-slate-400 font-bold block">পিতার নাম (Father's Name):</span>
                                    <span class="font-semibold text-slate-700">{{ $benefit->person->familyInfo?->father_name ?? 'N/A' }}</span>
                                </div>
                                <div>
                                    <span class="text-[10px] text-slate-400 font-bold block">বর্তমান ঠিকানা (Address):</span>
                                    <span class="font-semibold text-slate-700">{{ $benefit->person->addressInfo?->present_village ?? 'N/A' }}</span>
                                </div>
                            </div>
                        @else
                            <div class="text-center py-2.5 text-slate-500 font-bold text-[11px]">
                                সাধারণ বা প্যাকেজ সুবিধা (নির্দিষ্ট একক ব্যক্তির জন্য নয় বরং সামগ্রিক স্কিম/প্রকল্প)
                            </div>
                        @endif
                    </div>

                    <!-- SECTION 2: BENEFIT DETAILS & FINANCIALS -->
                    <div class="cert-section relative z-10 rounded-xl border border-slate-200 bg-white p-3.5 mb-3 shadow-2xs">
                        <h3 class="text-[11px] font-black text-slate-800 uppercase tracking-wider mb-2.5 border-b border-slate-200 pb-1">
                            ২. সুবিধার বিবরণ ও বরাদ্দকৃত অনুদান (Benefit Specification)
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-[11px] mb-3">
                            <div>
                                <span class="text-[10px] text-slate-400 font-bold block">সুবিধার শিরোনাম (Benefit Title):</span>
                                <span class="font-black text-slate-900 text-xs">{{ $benefit->title }}</span>
                            </div>
                            <div>
                                <span class="text-[10px] text-slate-400 font-bold block">প্রদানের মাধ্যম (Payment Method):</span>
                                <span class="font-bold text-[#00551c] text-xs">{{ $benefit->payment_method ?? 'নগদ / সরাসরি প্রদান' }}</span>
                            </div>
                            <div>
                                <span class="text-[10px] text-slate-400 font-bold block">সুবিধার ধরন (Type):</span>
                                <span class="font-bold text-slate-800">{{ $benefit->type_of_benefit }}</span>
                            </div>
                            <div>
                                <span class="text-[10px] text-slate-400 font-bold block">ক্যাটাগরি (Category):</span>
                                <span class="font-bold text-slate-800">{{ $benefit->category }}</span>
                            </div>
                        </div>

                        <!-- Big Financial Box -->
                        <div class="rounded-xl bg-emerald-50/70 border border-emerald-300 p-3 text-center my-2.5 flex flex-col sm:flex-row items-center justify-between">
                            <div class="text-left">
                                <div class="text-[11px] font-extrabold text-emerald-900 uppercase">বরাদ্দকৃত অনুদানের পরিমাণ (Sanctioned Amount)</div>
                                <div class="text-[9px] text-emerald-700 font-semibold">সরকারি রাজকোষ বা তহবিল থেকে বরাদ্দকৃত সর্বমোট অর্থ</div>
                            </div>
                            <div class="text-xl sm:text-2xl font-black text-[#00551c] mt-1 sm:mt-0 tracking-tight">
                                ৳ {{ number_format($benefit->amount ?? 0, 2) }}
                            </div>
                        </div>

                        @if($benefit->remarks)
                            <div class="rounded-lg bg-slate-50 p-2.5 text-[11px] border border-slate-200 mt-2.5">
                                <span class="font-bold text-slate-500 block mb-0.5 text-[10px]">বিশেষ মন্তব্য ও নির্দেশাবলী (Remarks / Notes):</span>
                                <p class="text-slate-700 font-medium leading-relaxed">{{ $benefit->remarks }}</p>
                            </div>
                        @endif
                    </div>

                    <!-- SECTION 3: OFFICIAL SIGNATURES -->
                    <div class="relative z-10 pt-8 mt-4 border-t border-slate-300 grid grid-cols-3 gap-3 text-center text-[11px]">
                        <div class="flex flex-col items-center">
                            <div class="w-24 sm:w-32 h-0.5 bg-slate-400 mb-1"></div>
                            <span class="font-bold text-slate-800">যাচাইকারী কর্মকর্তা</span>
                            <span class="text-[9px] text-slate-500">Verified By</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-24 sm:w-32 h-0.5 bg-slate-400 mb-1"></div>
                            <span class="font-bold text-slate-800">হিসাবরক্ষক কর্মকর্তা</span>
                            <span class="text-[9px] text-slate-500">Accounts Officer</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-24 sm:w-32 h-0.5 bg-[#00551c] mb-1"></div>
                            <span class="font-extrabold text-[#00551c]">অনুমোদনকারী কর্তৃপক্ষ</span>
                            <span class="text-[9px] text-slate-500">Authorized Signature</span>
                        </div>
                    </div>

                    <!-- CERTIFICATE FOOTER -->
                    <div class="relative z-10 text-center mt-6 pt-2.5 border-t border-slate-200/60 text-[8px] text-slate-400 font-semibold">
                        এই ভাউচারটি গণপ্রজাতন্ত্রী বাংলাদেশ সরকারের জুলাই ২৪ ফাইটার ও নাগরিক তথ্য ব্যবস্থাপনা সিস্টেম (CLMS Portal) দ্বারা স্বয়ংক্রিয়ভাবে প্রস্তুতকৃত।
                    </div>

                </div>
            </div>

        </div>
    </x-admin.shell>
</x-layouts.app>
