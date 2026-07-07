<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rebuilding Bangladesh - Citizen Portal Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 min-h-screen flex items-center justify-center p-4 font-sans selection:bg-emerald-600 selection:text-white">

    <div class="rounded-2xl sm:rounded-3xl shadow-xl overflow-hidden bg-white max-w-3xl w-full flex flex-col md:flex-row min-h-[460px] border border-slate-200/80">
        
        <!-- LEFT PANEL: JULY 24 ARCHIVE INFO -->
        <div class="bg-[#00551c] md:w-5/12 p-6 sm:p-8 text-white flex flex-col justify-between relative overflow-hidden">
            <!-- Decorative subtle background glow -->
            <div class="absolute -bottom-16 -left-16 w-44 h-44 rounded-full bg-white/5 blur-2xl pointer-events-none"></div>

            <div>
                <div class="inline-block bg-emerald-900/60 border border-emerald-600/40 rounded px-2 py-0.5 text-[9px] font-extrabold uppercase tracking-wider text-emerald-300 mb-2">
                    Citizen Portal
                </div>
                <h1 class="text-2xl sm:text-3xl font-black tracking-tight text-white">JULY 24</h1>
                <h2 class="text-sm sm:text-base font-bold text-emerald-100 mt-0.5">নাগরিক তথ্য সেবা পোর্টাল</h2>
                <div class="w-10 h-0.5 bg-emerald-400 mt-2.5 rounded-full"></div>

                <ul class="mt-6 space-y-3 text-xs font-medium text-emerald-50 leading-relaxed">
                    <li class="flex items-start gap-2.5">
                        <span class="mt-0.5 flex-shrink-0 w-4 h-4 rounded bg-emerald-700/80 flex items-center justify-center text-[9px] shadow-2xs">✔</span>
                        <span>জুলাই ২০২৪ অভ্যুত্থানের বীর যোদ্ধা ও নাগরিকদের নিজস্ব তথ্য হালনাগাদ।</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <span class="mt-0.5 flex-shrink-0 w-4 h-4 rounded bg-emerald-700/80 flex items-center justify-center text-[9px] shadow-2xs">📊</span>
                        <span>আবেদনের বর্তমান অবস্থা ট্র্যাকিং এবং প্রয়োজনীয় ডকুমেন্ট আপলোড।</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <span class="mt-0.5 flex-shrink-0 w-4 h-4 rounded bg-emerald-700/80 flex items-center justify-center text-[9px] shadow-2xs">📜</span>
                        <span>অনুমোদিত ডিজিটাল তথ্য বিবরণী ও সনদপত্র সরাসরি ডাউনলোড সুবিধা।</span>
                    </li>
                </ul>
            </div>

            <div class="mt-8 pt-4 border-t border-emerald-800/80 text-center relative z-10">
                <div class="text-[8px] font-extrabold tracking-[0.25em] text-emerald-200 uppercase mb-1">POWERED BY</div>
                <div class="flex flex-col items-center justify-center">
                    <div class="flex items-center gap-1.5 font-black text-base tracking-tight text-white">
                        <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M14 6l-3.75 5 2.85 3.8-1.6 1.2C9.81 13.75 7 10 7 10l-6 8h22L14 6z"/></svg>
                        <span>Adventure Soft</span>
                    </div>
                    <div class="text-[8px] font-medium text-emerald-200 tracking-normal mt-0.5">for comfortable life with tecAnology</div>
                </div>
            </div>
        </div>

        <!-- RIGHT PANEL: CITIZEN LOGIN FORM -->
        <div class="md:w-7/12 p-6 sm:p-8 md:p-10 flex flex-col justify-center bg-white relative">
            
            <!-- Error Alert -->
            @if ($errors->any())
                <div class="mb-4 rounded-lg bg-red-50 border border-red-200 p-2.5 text-[11px] font-bold text-red-600 flex items-center gap-2 shadow-2xs">
                    <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <!-- Top Header & Logo -->
            <div class="text-center mb-5">
                <img src="{{ asset('logo-home.png') }}" alt="Govt Logo" class="w-12 h-12 mx-auto mb-1.5 object-contain">
                <div class="text-[11px] font-extrabold text-[#00551c]">নাগরিক পোর্টাল (Citizen Portal)</div>
                <h2 class="text-lg sm:text-xl font-black text-slate-800 mt-0.5">লগইন করুন</h2>
            </div>

            <!-- Login Form -->
            <form method="post" action="{{ route('portal.login.store') }}" class="space-y-3.5">
                @csrf
                <div>
                    <label class="block text-[11px] font-bold text-slate-600 mb-1">ইমেইল / মোবাইল নম্বর</label>
                    <input name="email" type="email" value="{{ old('email') }}" required placeholder="citizen@example.com" 
                           class="w-full rounded-lg border border-blue-100 bg-[#EFF6FF]/70 px-3.5 py-2.5 text-xs font-medium text-slate-800 focus:bg-white focus:border-[#00551c] focus:ring-2 focus:ring-[#00551c]/15 outline-none transition placeholder:text-slate-400 shadow-2xs">
                </div>

                <div>
                    <label class="block text-[11px] font-bold text-slate-600 mb-1">পাসওয়ার্ড</label>
                    <div class="relative">
                        <input id="portalPasswordInput" name="password" type="password" required placeholder="••••••" 
                               class="w-full rounded-lg border border-blue-100 bg-[#EFF6FF]/70 px-3.5 py-2.5 text-xs font-medium text-slate-800 focus:bg-white focus:border-[#00551c] focus:ring-2 focus:ring-[#00551c]/15 outline-none transition placeholder:text-slate-400 shadow-2xs">
                        <button type="button" onclick="togglePortalPassword()" class="absolute right-3 top-2.5 text-slate-400 hover:text-slate-600 transition">
                            <svg id="portalEyeIcon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z"/></svg>
                        </button>
                    </div>
                </div>

                <div class="pt-1.5">
                    <button type="submit" class="w-full rounded-lg bg-[#00551c] hover:bg-[#003d14] px-5 py-2.5 text-xs font-extrabold text-white shadow transition">
                        Login
                    </button>
                </div>
            </form>

            <!-- Bottom Links -->
            <div class="mt-6 pt-3.5 text-center space-y-2.5 border-t border-slate-100">
                <div class="text-[11px] font-medium text-slate-500">
                    প্রশাসনিক হিসেবে প্রবেশ করতে চান? <a href="{{ route('admin.login') }}" class="font-bold text-[#00551c] hover:underline">অ্যাডমিন লগইন</a>
                </div>
                <div class="flex items-center justify-center gap-3 text-[11px] font-semibold text-slate-400">
                    <a href="{{ route('home') }}" class="hover:text-slate-600 transition">হোমপেজ</a>
                    <span>|</span>
                    <a href="{{ route('portal.register') }}" class="hover:text-slate-600 transition font-bold text-[#00551c]">নতুন নিবন্ধন</a>
                    <span>|</span>
                    <a href="#" class="hover:text-slate-600 transition">সহায়তা</a>
                </div>
            </div>

        </div>
    </div>

    <script>
        function togglePortalPassword() {
            const input = document.getElementById('portalPasswordInput');
            if (input.type === 'password') {
                input.type = 'text';
            } else {
                input.type = 'password';
            }
        }
    </script>
</body>
</html>
