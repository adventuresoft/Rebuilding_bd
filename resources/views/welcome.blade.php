<!DOCTYPE html>
<html lang="bn" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rebuilding Bangladesh</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body, font-sans, h1, h2, h3, h4, h5, h6, p, span, a, div {
            font-family: 'Hind Siliguri', 'Plus Jakarta Sans', sans-serif !important;
        }
        .hero-overlay {
            background: linear-gradient(105deg, rgba(5, 25, 15, 0.95) 0%, rgba(10, 35, 20, 0.85) 55%, rgba(0, 0, 0, 0.35) 100%);
        }
        .card-hover {
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .card-hover:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 35px -10px rgba(0, 85, 28, 0.12);
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased selection:bg-emerald-600 selection:text-white">

    <!-- OFFICIAL GOVT TOPBAR -->
    <div class="bg-[#00551c] text-white text-[11px] font-medium py-1.5 px-4 border-b border-emerald-800">
        <div class="max-w-6xl mx-auto flex items-center justify-end gap-4">
            <div class="flex items-center gap-2 text-emerald-100 font-medium">
                <span>{{ date('l, d M Y') }}</span>
                <span class="text-emerald-400 font-bold">|</span>
                <span id="live-clock" class="font-bold tracking-wider text-white"></span>
            </div>
        </div>
    </div>

    <!-- MAIN BRAND & NAVBAR -->
    <header class="sticky top-0 z-50 shadow-md">
        <!-- Brand Logo & Name Section (White Background) -->
        <div class="bg-white/95 backdrop-blur-md border-b border-slate-200/80 px-4 sm:px-6 py-3 sm:py-3.5">
            <div class="max-w-6xl mx-auto flex items-center justify-between">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="flex items-center justify-center group-hover:scale-105 transition">
                        <img src="{{ asset('logo-home.png') }}" alt="July Fighter Logo" class="h-10 sm:h-11 w-auto object-contain">
                    </div>
                    <div>
                        <h1 class="text-base sm:text-lg font-extrabold text-[#00551c] leading-tight">রিবিল্ডিং বাংলাদেশ</h1>
                        <p class="text-[11px] sm:text-xs font-semibold text-slate-500 tracking-wider">Rebuilding Bangladesh</p>
                    </div>
                </a>
            </div>
        </div>

        <!-- Green Navigation Bar (Same as Topbar) -->
        <div class="bg-[#00551c] text-white text-xs font-medium py-2 sm:py-2.5 px-4 border-t border-emerald-800/50 shadow-inner">
            <div class="max-w-6xl mx-auto flex flex-wrap items-center justify-between gap-2 sm:gap-3">
                <!-- Navigation Links -->
                <nav class="flex flex-wrap items-center gap-4 sm:gap-6 text-xs sm:text-[13px] font-bold text-emerald-100">
                    <a href="{{ route('home') }}" class="text-white hover:text-emerald-300 transition flex items-center justify-center py-1 px-1 rounded hover:bg-white/10" title="Home" style="color: #ffffff !important;">
                        <svg class="w-4 h-4" fill="#ffffff" style="fill: #ffffff !important; color: #ffffff !important;" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                        </svg>
                    </a>
                    <a href="#about" class="hover:text-white transition py-0.5">About</a>
                    <a href="#priorities" class="hover:text-white transition py-0.5">Priorities</a>
                    <a href="#projects" class="hover:text-white transition py-0.5">Projects</a>
                    <a href="#gallery" class="hover:text-white transition py-0.5">Gallery</a>
                    <a href="#resources" class="hover:text-white transition py-0.5">Resources</a>
                    <a href="#sites" class="hover:text-white transition py-0.5">Sites</a>
                    <a href="#contact" class="hover:text-white transition py-0.5">Contact</a>
                </nav>

                <!-- Admin Access Button / Logged-in Badge -->
                <div>
                    @if(Auth::guard('web')->check())
                        {{-- Admin is logged in — show badge with time --}}
                        <div class="inline-flex items-center gap-2 rounded bg-white/10 border border-white/30 px-3 py-1.5 text-xs font-bold text-white shadow-sm">
                            <span class="flex items-center gap-1">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                <span class="text-emerald-200">Admin:</span>
                                <span class="font-extrabold text-white">{{ Auth::guard('web')->user()->name ?? 'Admin' }}</span>
                            </span>
                            <span class="text-white/40">|</span>
                            <span id="admin-live-time" class="font-mono text-[11px] text-emerald-200 tracking-wider"></span>
                            <a href="{{ route('admin.dashboard') }}" class="ml-1 bg-emerald-400 hover:bg-emerald-300 text-[#00551c] font-extrabold px-2.5 py-1 rounded text-xs transition">
                                Dashboard →
                            </a>
                        </div>
                        <script>
                            (function() {
                                function updateAdminTime() {
                                    const el = document.getElementById('admin-live-time');
                                    if (!el) return;
                                    const now = new Date();
                                    const h = String(now.getHours()).padStart(2, '0');
                                    const m = String(now.getMinutes()).padStart(2, '0');
                                    const s = String(now.getSeconds()).padStart(2, '0');
                                    el.textContent = h + ':' + m + ':' + s;
                                }
                                updateAdminTime();
                                setInterval(updateAdminTime, 1000);
                            })();
                        </script>
                    @else
                        <a href="{{ route('admin.login') }}" class="inline-flex items-center justify-center rounded bg-white hover:bg-emerald-50 px-3 py-1 text-xs font-extrabold text-[#00551c] shadow-2xs transition transform hover:-translate-y-0.5 active:scale-95">
                            Admin Access →
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </header>

    @if (session('success'))
        <style>
            @keyframes modalFadeIn {
                0% { opacity: 0; }
                100% { opacity: 1; }
            }
            @keyframes modalScaleUp {
                0% { opacity: 0; transform: scale(0.88) translateY(10px); }
                100% { opacity: 1; transform: scale(1) translateY(0); }
            }
            .animate-popup-fade { animation: modalFadeIn 0.25s ease-out forwards; }
            .animate-popup-scale { animation: modalScaleUp 0.35s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        </style>

        <!-- PROFESSIONAL SMART POPUP MODAL (CLEAN & COMPACT) -->
        <div id="success-popup-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/70 backdrop-blur-sm animate-popup-fade">
            <div class="relative w-full max-w-md overflow-hidden bg-white rounded-2xl shadow-2xl border border-slate-200 animate-popup-scale p-6 text-center">
                
                <!-- Top Badge -->
                <div class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-emerald-100 text-[#00551c] text-xs font-black mx-auto mb-3">
                    <span>✅ আবেদন গৃহীত হয়েছে</span>
                </div>

                <!-- High Contrast Title & Subtitle -->
                <h3 class="text-lg sm:text-xl font-black text-[#00551c] leading-tight">
                    অভিনন্দন! আবেদন গৃহীত হয়েছে
                </h3>
                <p class="text-[11px] font-extrabold text-slate-500 uppercase tracking-wider mt-1">
                    Application Successfully Submitted
                </p>

                <!-- High Legibility Main Message Box -->
                <div class="my-4 rounded-xl bg-emerald-50/80 border border-emerald-300 p-4 text-center shadow-2xs">
                    <p class="text-sm font-black text-slate-900 leading-normal">
                        {{ session('success') }}
                    </p>
                </div>

                <!-- Clear Explanation Text -->
                <p class="text-xs font-semibold text-slate-700 max-w-sm mx-auto leading-relaxed">
                    আপনার প্রদত্ত সকল তথ্য সিস্টেমের সুরক্ষিত ডেটাবেসে সংরক্ষিত হয়েছে। প্রশাসনিক টিম কর্তৃক যাচাই-বাছাই সম্পন্ন হলে পরবর্তী পদক্ষেপ নেওয়া হবে।
                </p>

                <!-- Compact Action Button -->
                <div class="mt-5">
                    <button onclick="closeSuccessPopup()" type="button" style="background-color: #00551c; color: #ffffff;" class="w-full sm:w-auto min-w-[180px] inline-flex items-center justify-center gap-2 rounded-xl px-6 py-3 text-xs sm:text-sm font-black shadow-md hover:opacity-95 transition cursor-pointer">
                        <span>ঠিক আছে (OK)</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </button>
                </div>
            </div>
        </div>

        <script>
            function closeSuccessPopup() {
                const modal = document.getElementById('success-popup-modal');
                if (modal) {
                    modal.style.opacity = '0';
                    modal.style.transition = 'opacity 0.2s ease-out';
                    setTimeout(() => modal.remove(), 200);
                }
            }
        </script>
    @endif

    <!-- NEW HOMEPAGE DESIGN (EXACT MATCH WITH SCREENSHOT) -->
    <main>
        <!-- HERO BANNER & CORE GOALS COMBINED SECTION (INSIDE PHOTO-CARD1.PNG) -->
        <section class="relative overflow-hidden flex flex-col justify-center shadow-lg py-12 sm:py-16 md:py-20 lg:py-24" style="background-image: url('{{ asset('photo-card1.png') }}'); background-size: 100% 100%; background-repeat: no-repeat; background-position: center;">
            <div class="relative z-10 max-w-6xl mx-auto px-4 sm:px-6 w-full space-y-10 sm:space-y-14 md:space-y-16">
                <!-- Top Hero Text & Buttons -->
                <div class="max-w-4xl space-y-3 sm:space-y-4">
                    <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-[32px] font-black text-white tracking-tight leading-normal [text-shadow:_0_2px_12px_rgb(0_0_0_/_90%)]">
                        আপনার অনুদান, একটি শিশুর জীবন বদলে দিতে পারে
                    </h2>
                    <p class="text-sm sm:text-base md:text-lg font-bold leading-relaxed max-w-3xl [text-shadow:_0_2px_8px_rgb(0_0_0_/_90%)]" style="color: #ffffff !important;">
                        আমরা সুবিধাবঞ্চিত শিশুদের জন্য শিক্ষা, চিকিৎসা ও নিরাপদ আশ্রয় নিশ্চিত করি।
                    </p>
                    <div class="pt-2 flex flex-wrap items-center gap-4">
                        <a href="#projects" class="rounded-xl bg-white hover:bg-slate-100 text-slate-950 px-6 py-3.5 text-sm sm:text-base font-bold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5 active:scale-95 flex items-center justify-center" style="background-color: #ffffff; color: #0f172a;">
                            <span>আমাদের প্রজেক্টগুলো দেখুন</span>
                        </a>
                        <a href="{{ route('volunteer.apply') }}" class="rounded-xl bg-transparent hover:bg-white/10 border-2 border-white text-white px-6 py-3.5 text-sm sm:text-base font-bold transition-all duration-300 transform hover:-translate-y-0.5 active:scale-95 flex items-center justify-center" style="border-color: #ffffff; color: #ffffff;">
                            <span>স্বেচ্ছাসেবীর জন্য আবেদন</span>
                        </a>
                    </div>
                </div>

                <!-- Core Goals Section inside Photo Banner -->
                <div class="pt-4 sm:pt-6 border-t border-white/20">
                    <!-- Section Heading -->
                    <div class="text-center mb-6 sm:mb-8">
                        <h3 class="text-xl sm:text-2xl md:text-[26px] font-extrabold text-white tracking-tight [text-shadow:_0_2px_12px_rgb(0_0_0_/_90%)]" style="color: #ffffff !important;">আমাদের মূল লক্ষ্য</h3>
                    </div>

                    <!-- 4 Cards Grid in ONE Row -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">
                        
                        <!-- Card 1: সুশিক্ষা -->
                        <div class="rounded-2xl p-4 sm:p-5 flex flex-col justify-between transition-all duration-300 hover:-translate-y-1 shadow-2xl backdrop-blur-md" style="background-color: rgba(255, 255, 255, 0.96) !important; border: 1px solid rgba(255, 255, 255, 0.4) !important; border-radius: 16px !important;">
                            <div>
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-lg font-extrabold shrink-0" style="background-color: #eff6ff; color: #2563eb;">
                                        📘
                                    </div>
                                    <h4 class="text-lg sm:text-xl font-extrabold text-slate-900 tracking-tight" style="color: #0f172a;">সুশিক্ষা</h4>
                                </div>
                                <h5 class="text-xs sm:text-sm font-bold text-slate-800 mb-1.5 leading-snug" style="color: #1e293b;">
                                    মানসম্মত শিক্ষা প্রদান ও স্কুল স্থাপন
                                </h5>
                                <p class="text-[11px] sm:text-xs text-slate-600 leading-normal font-semibold" style="color: #475569;">
                                    আমরা সুবিধাবঞ্চিত শিশুদের মানসম্মত শিক্ষা ও স্কুল স্থাপন নিশ্চিত করি।
                                </p>
                            </div>
                        </div>

                        <!-- Card 2: সুস্বাস্থ্য -->
                        <div class="rounded-2xl p-4 sm:p-5 flex flex-col justify-between transition-all duration-300 hover:-translate-y-1 shadow-2xl backdrop-blur-md" style="background-color: rgba(255, 255, 255, 0.96) !important; border: 1px solid rgba(255, 255, 255, 0.4) !important; border-radius: 16px !important;">
                            <div>
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="w-9 h-9 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center text-lg font-extrabold shrink-0" style="background-color: #f0fdf4; color: #0d9488;">
                                        🩺
                                    </div>
                                    <h4 class="text-lg sm:text-xl font-extrabold text-slate-900 tracking-tight" style="color: #0f172a;">সুস্বাস্থ্য</h4>
                                </div>
                                <h5 class="text-xs sm:text-sm font-bold text-slate-800 mb-1.5 leading-snug" style="color: #1e293b;">
                                    বিনামূল্যে চিকিৎসা ও ঔষধ বিতরণ
                                </h5>
                                <p class="text-[11px] sm:text-xs text-slate-600 leading-normal font-semibold" style="color: #475569;">
                                    সুবিধাবঞ্চিত শিশুদের বিনামূল্যে চিকিৎসা সেবা ও প্রয়োজনীয় ঔষধ নিশ্চিত করি।
                                </p>
                            </div>
                        </div>

                        <!-- Card 3: ত্রাণ ও পুনর্বাসন -->
                        <div class="rounded-2xl p-4 sm:p-5 flex flex-col justify-between transition-all duration-300 hover:-translate-y-1 shadow-2xl backdrop-blur-md" style="background-color: rgba(255, 255, 255, 0.96) !important; border: 1px solid rgba(255, 255, 255, 0.4) !important; border-radius: 16px !important;">
                            <div>
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="w-9 h-9 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-lg font-extrabold shrink-0" style="background-color: #fefce8; color: #d97706;">
                                        🤝
                                    </div>
                                    <h4 class="text-lg sm:text-xl font-extrabold text-slate-900 tracking-tight" style="color: #0f172a;">ত্রাণ ও পুনর্বাসন</h4>
                                </div>
                                <h5 class="text-xs sm:text-sm font-bold text-slate-800 mb-1.5 leading-snug" style="color: #1e293b;">
                                    দুর্যোগপূর্ণ সময়ে জরুরি সহায়তা
                                </h5>
                                <p class="text-[11px] sm:text-xs text-slate-600 leading-normal font-semibold" style="color: #475569;">
                                    দুর্যোগপূর্ণ মুহূর্তে প্রান্তিক মানুষের জন্য জরুরি ত্রাণ ও পুনর্বাসন সহায়তা প্রদান।
                                </p>
                            </div>
                        </div>

                        <!-- Card 4: নিরাপদ পরিবেশ -->
                        <div class="rounded-2xl p-4 sm:p-5 flex flex-col justify-between transition-all duration-300 hover:-translate-y-1 shadow-2xl backdrop-blur-md" style="background-color: rgba(255, 255, 255, 0.96) !important; border: 1px solid rgba(255, 255, 255, 0.4) !important; border-radius: 16px !important;">
                            <div>
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-lg font-extrabold shrink-0" style="background-color: #ecfdf5; color: #059669;">
                                        🌱
                                    </div>
                                    <h4 class="text-lg sm:text-xl font-extrabold text-slate-900 tracking-tight" style="color: #0f172a;">নিরাপদ পরিবেশ</h4>
                                </div>
                                <h5 class="text-xs sm:text-sm font-bold text-slate-800 mb-1.5 leading-snug" style="color: #1e293b;">
                                    শিশুদের জন্য নিরাপদ আশ্রয়
                                </h5>
                                <p class="text-[11px] sm:text-xs text-slate-600 leading-normal font-semibold" style="color: #475569;">
                                    শিশুদের শারীরিক ও মানসিক বিকাশে একটি সুন্দর, নিরাপদ ও স্বাস্থ্যকর পরিবেশ তৈরি।
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <!-- STATS BANNER SECTION BELOW HERO/GOALS BANNER -->
        <section class="py-8 sm:py-10 bg-[#f4faf6] border-b border-slate-200/80">
            <div class="max-w-6xl mx-auto px-4 sm:px-6">
                <!-- Compact Green 'এক নজরে' Stats Banner (Exact Match with Screenshot) -->
                <div class="rounded-2xl sm:rounded-3xl bg-[#034d35] px-5 sm:px-7 py-5 sm:py-6 text-white shadow-xl flex flex-col lg:flex-row items-center justify-between gap-6" style="background-color: #034d35 !important;">
                    
                    <!-- Left Title Block -->
                    <div class="text-center lg:text-left shrink-0">
                        <div class="flex items-center justify-center lg:justify-start gap-2 mb-1">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse"></span>
                            <h3 class="text-lg sm:text-xl font-black text-white tracking-tight">এক নজরে</h3>
                        </div>
                        <p class="text-xs sm:text-[13px] font-medium text-emerald-100/90 tracking-normal">
                            আমাদের সেবার সংক্ষিপ্ত পরিসংখ্যান
                        </p>
                    </div>

                    <!-- Right Stats Cards Group -->
                    <div class="flex flex-wrap items-center justify-center lg:justify-end gap-3 sm:gap-4 w-full lg:w-auto">
                        
                        <!-- Stat Card 1 -->
                        <div class="rounded-xl border border-emerald-400/30 bg-emerald-900/30 px-3.5 sm:px-4 py-2.5 flex items-center gap-3 transition-all duration-300 hover:bg-emerald-900/50 hover:border-emerald-400/60 shadow-sm shrink-0">
                            <div class="w-9 sm:w-10 h-9 sm:h-10 rounded-lg bg-emerald-500/20 border border-emerald-400/30 flex items-center justify-center text-emerald-300 shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                            <div class="text-left">
                                <div class="text-base sm:text-lg font-black text-white leading-tight">১০,০০০+</div>
                                <div class="text-[11px] sm:text-xs font-bold text-emerald-100/90 leading-tight">সুবিধাবঞ্চিত শিশু</div>
                            </div>
                        </div>

                        <!-- Stat Card 2 -->
                        <div class="rounded-xl border border-emerald-400/30 bg-emerald-900/30 px-3.5 sm:px-4 py-2.5 flex items-center gap-3 transition-all duration-300 hover:bg-emerald-900/50 hover:border-emerald-400/60 shadow-sm shrink-0">
                            <div class="w-9 sm:w-10 h-9 sm:h-10 rounded-lg bg-emerald-500/20 border border-emerald-400/30 flex items-center justify-center text-emerald-300 shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="text-left">
                                <div class="text-base sm:text-lg font-black text-white leading-tight">৫০+</div>
                                <div class="text-[11px] sm:text-xs font-bold text-emerald-100/90 leading-tight">সফল প্রজেক্ট</div>
                            </div>
                        </div>

                        <!-- Stat Card 3 -->
                        <div class="rounded-xl border border-emerald-400/30 bg-emerald-900/30 px-3.5 sm:px-4 py-2.5 flex items-center gap-3 transition-all duration-300 hover:bg-emerald-900/50 hover:border-emerald-400/60 shadow-sm shrink-0">
                            <div class="w-9 sm:w-10 h-9 sm:h-10 rounded-lg bg-emerald-500/20 border border-emerald-400/30 flex items-center justify-center text-emerald-300 shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <div class="text-left">
                                <div class="text-base sm:text-lg font-black text-white leading-tight">৫০০+</div>
                                <div class="text-[11px] sm:text-xs font-bold text-emerald-100/90 leading-tight">সক্রিয় ভলান্টিয়ার</div>
                            </div>
                        </div>

                        <!-- Stat Card 4 -->
                        <div class="rounded-xl border border-emerald-400/30 bg-emerald-900/30 px-3.5 sm:px-4 py-2.5 flex items-center gap-3 transition-all duration-300 hover:bg-emerald-900/50 hover:border-emerald-400/60 shadow-sm shrink-0">
                            <div class="w-9 sm:w-10 h-9 sm:h-10 rounded-lg bg-emerald-500/20 border border-emerald-400/30 flex items-center justify-center text-emerald-300 shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div class="text-left">
                                <div class="text-base sm:text-lg font-black text-white leading-tight">১৫+</div>
                                <div class="text-[11px] sm:text-xs font-bold text-emerald-100/90 leading-tight">জেলা জুড়ে কার্যক্রম</div>
                            </div>
                        </div>

                        <!-- Trend Chart Icon Badge (Like Screenshot Right Arrow Box) -->
                        <div class="hidden xl:flex items-center justify-center w-10 h-10 rounded-xl bg-emerald-800/40 border border-emerald-500/30 text-emerald-300 shrink-0 ml-1" title="Realtime Statistics">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>

                    </div>
                </div>

                <!-- OUR PROJECTS SECTION (EXACT MATCH WITH SCREENSHOT & UPPER TEXT FORMAT) -->
                <div class="mt-16 sm:mt-20 md:mt-24">
                    <!-- Section Heading -->
                    <div class="text-center mb-8 sm:mb-10">
                        <h3 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight" style="color: #0f172a;">আমাদের প্রজেক্টসমূহ</h3>
                    </div>

                    <!-- 3 Project Cards Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 sm:gap-10">
                        
                        <!-- Project Card 1 -->
                        <div class="rounded-2xl p-5 sm:p-6 flex flex-col justify-between transition-all duration-300 hover:-translate-y-1" style="background-color: #ffffff !important; border: 1px solid #e2e8f0 !important; border-radius: 20px !important; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.04) !important;">
                            <div>
                                <div class="rounded-xl overflow-hidden mb-5 h-48 sm:h-52 w-full bg-slate-100">
                                    <img src="{{ asset('photo-card2.jpg') }}" alt="'আমার পাঠশালা' স্কুল ফান্ড" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                                </div>
                                <h4 class="text-lg sm:text-xl font-extrabold text-slate-900 tracking-tight mb-2.5" style="color: #0f172a;">'আমার পাঠশালা' স্কুল ফান্ড</h4>
                                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed font-semibold mb-5" style="color: #475569;">
                                    আমরা সুবিধাবঞ্চিত শিশুদের জন্য শিক্ষা, চিকিৎসা ও নিরাপদ আশ্রয় নিশ্চিত করি।
                                </p>
                            </div>
                            <div class="pt-2">
                                <a href="#donate" class="inline-flex items-center justify-center rounded-xl px-6 py-3 text-xs sm:text-sm font-bold text-white transition hover:opacity-90 shadow-sm transform active:scale-95" style="background-color: #00551c; color: #ffffff;">
                                    সহযোগিতা করুন
                                </a>
                            </div>
                        </div>

                        <!-- Project Card 2 -->
                        <div class="rounded-2xl p-5 sm:p-6 flex flex-col justify-between transition-all duration-300 hover:-translate-y-1" style="background-color: #ffffff !important; border: 1px solid #e2e8f0 !important; border-radius: 20px !important; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.04) !important;">
                            <div>
                                <div class="rounded-xl overflow-hidden mb-5 h-48 sm:h-52 w-full bg-slate-100">
                                    <img src="{{ asset('photo-card3.jpg') }}" alt="খাবারের দানামাত্র জুটছে না ঘরে" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                                </div>
                                <h4 class="text-lg sm:text-xl font-extrabold text-slate-900 tracking-tight mb-2.5" style="color: #0f172a;">খাবারের দানামাত্র জুটছে না ঘরে</h4>
                                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed font-semibold mb-5" style="color: #475569;">
                                    আমরা সুবিধাবঞ্চিত শিশুদের জন্য শিক্ষা, চিকিৎসা ও নিরাপদ আশ্রয় নিশ্চিত করি।
                                </p>
                            </div>
                            <div class="pt-2">
                                <a href="#donate" class="inline-flex items-center justify-center rounded-xl px-6 py-3 text-xs sm:text-sm font-bold text-white transition hover:opacity-90 shadow-sm transform active:scale-95" style="background-color: #00551c; color: #ffffff;">
                                    সহযোগিতা করুন
                                </a>
                            </div>
                        </div>

                        <!-- Project Card 3 -->
                        <div class="rounded-2xl p-5 sm:p-6 flex flex-col justify-between transition-all duration-300 hover:-translate-y-1" style="background-color: #ffffff !important; border: 1px solid #e2e8f0 !important; border-radius: 20px !important; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.04) !important;">
                            <div>
                                <div class="rounded-xl overflow-hidden mb-5 h-48 sm:h-52 w-full bg-slate-100">
                                    <img src="{{ asset('photo-card4.jpg') }}" alt="'বন্যাদুর্গতদের' পাশে আমরা" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                                </div>
                                <h4 class="text-lg sm:text-xl font-extrabold text-slate-900 tracking-tight mb-2.5" style="color: #0f172a;">'বন্যাদুর্গতদের' পাশে আমরা</h4>
                                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed font-semibold mb-5" style="color: #475569;">
                                    আমরা সুবিধাবঞ্চিত শিশুদের জন্য শিক্ষা, চিকিৎসা ও নিরাপদ আশ্রয় নিশ্চিত করি।
                                </p>
                            </div>
                            <div class="pt-2">
                                <a href="#donate" class="inline-flex items-center justify-center rounded-xl px-6 py-3 text-xs sm:text-sm font-bold text-white transition hover:opacity-90 shadow-sm transform active:scale-95" style="background-color: #00551c; color: #ffffff;">
                                    সহযোগিতা করুন
                                </a>
                            </div>
                        </div>

                    </div>

                    <!-- Pagination Dots (Exact Match With Screenshot) -->
                    <div class="flex justify-center items-center gap-2 mt-10 sm:mt-12">
                        <span class="w-8 h-2.5 rounded-full" style="background-color: #00551c;"></span>
                        <span class="w-2.5 h-2.5 rounded-full bg-slate-300"></span>
                        <span class="w-2.5 h-2.5 rounded-full bg-slate-300"></span>
                    </div>
                </div>

                <!-- ONGOING PROJECTS SECTION (EXACT MATCH WITH SCREENSHOT) -->
                <div class="mt-8 sm:mt-10 md:mt-12">
                    <!-- Section Heading -->
                    <div class="text-center mb-8 sm:mb-10">
                        <h3 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight" style="color: #0f172a;">চলমান প্রজেক্টসমূহ</h3>
                    </div>

                    <!-- 3 Ongoing Project Cards Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 sm:gap-10">
                        
                        <!-- Ongoing Card 1: বন্যাদুর্গতদের সাহায্য -->
                        <div class="rounded-2xl p-5 sm:p-6 flex flex-col justify-between transition-all duration-300 hover:-translate-y-1" style="background-color: #ffffff !important; border: 1px solid #e2e8f0 !important; border-radius: 20px !important; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.04) !important;">
                            <div>
                                <div class="rounded-xl overflow-hidden mb-5 h-48 sm:h-52 w-full bg-slate-100">
                                    <img src="{{ asset('photo-card4.jpg') }}" alt="বন্যাদুর্গতদের সাহায্য" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                                </div>
                                <h4 class="text-lg sm:text-xl font-extrabold text-slate-900 tracking-tight mb-3" style="color: #0f172a;">বন্যাদুর্গতদের সাহায্য</h4>
                                <div class="text-xs sm:text-sm font-bold text-slate-700 mb-2" style="color: #334155;">45% Raised</div>
                                <div class="w-full bg-slate-200/80 h-2 sm:h-2.5 rounded-full overflow-hidden mb-6">
                                    <div class="h-full rounded-full" style="width: 45%; background-color: #f97316;"></div>
                                </div>
                            </div>
                            <div>
                                <a href="#donate" class="block w-full text-center rounded-xl px-5 py-3 text-xs sm:text-sm font-bold text-white transition hover:opacity-90 shadow-sm transform active:scale-95" style="background-color: #00551c; color: #ffffff;">
                                    সহযোগিতা করুন
                                </a>
                            </div>
                        </div>

                        <!-- Ongoing Card 2: 'আমার পাঠশালা' স্কুল ফান্ড -->
                        <div class="rounded-2xl p-5 sm:p-6 flex flex-col justify-between transition-all duration-300 hover:-translate-y-1" style="background-color: #ffffff !important; border: 1px solid #e2e8f0 !important; border-radius: 20px !important; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.04) !important;">
                            <div>
                                <div class="rounded-xl overflow-hidden mb-5 h-48 sm:h-52 w-full bg-slate-100">
                                    <img src="{{ asset('photo-card2.jpg') }}" alt="'আমার পাঠশালা' স্কুল ফান্ড" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                                </div>
                                <h4 class="text-lg sm:text-xl font-extrabold text-slate-900 tracking-tight mb-3" style="color: #0f172a;">'আমার পাঠশালা' স্কুল ফান্ড</h4>
                                <div class="text-xs sm:text-sm font-bold text-slate-700 mb-2" style="color: #334155;">18% Raised</div>
                                <div class="w-full bg-slate-200/80 h-2 sm:h-2.5 rounded-full overflow-hidden mb-6">
                                    <div class="h-full rounded-full" style="width: 18%; background-color: #f97316;"></div>
                                </div>
                            </div>
                            <div>
                                <a href="#donate" class="block w-full text-center rounded-xl px-5 py-3 text-xs sm:text-sm font-bold text-white transition hover:opacity-90 shadow-sm transform active:scale-95" style="background-color: #00551c; color: #ffffff;">
                                    সহযোগিতা করুন
                                </a>
                            </div>
                        </div>

                        <!-- Ongoing Card 3: 'আলোর পাঠশালা' স্কুল ফান্ড -->
                        <div class="rounded-2xl p-5 sm:p-6 flex flex-col justify-between transition-all duration-300 hover:-translate-y-1" style="background-color: #ffffff !important; border: 1px solid #e2e8f0 !important; border-radius: 20px !important; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.04) !important;">
                            <div>
                                <div class="rounded-xl overflow-hidden mb-5 h-48 sm:h-52 w-full bg-slate-100">
                                    <img src="{{ asset('build/assets/photo-card3.jpg') }}" alt="'আলোর পাঠশালা' স্কুল ফান্ড" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                                </div>
                                <h4 class="text-lg sm:text-xl font-extrabold text-slate-900 tracking-tight mb-3" style="color: #0f172a;">'আলোর পাঠশালা' স্কুল ফান্ড</h4>
                                <div class="text-xs sm:text-sm font-bold text-slate-700 mb-2" style="color: #334155;">75% Raised</div>
                                <div class="w-full bg-slate-200/80 h-2 sm:h-2.5 rounded-full overflow-hidden mb-6">
                                    <div class="h-full rounded-full" style="width: 75%; background-color: #f97316;"></div>
                                </div>
                            </div>
                            <div>
                                <a href="#donate" class="block w-full text-center rounded-xl px-5 py-3 text-xs sm:text-sm font-bold text-white transition hover:opacity-90 shadow-sm transform active:scale-95" style="background-color: #00551c; color: #ffffff;">
                                    সহযোগিতা করুন
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- TESTIMONIALS SECTION (EXACT MATCH WITH SCREENSHOT & RANDOM PROFILES/COMMENTS) -->
                <div class="mt-12 sm:mt-16 md:mt-20 mb-8 sm:mb-10 md:mb-12">
                    <!-- Section Heading -->
                    <div class="text-center mb-8 sm:mb-10">
                        <h3 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight" style="color: #0f172a;">উপকারভোগীদের কথা</h3>
                    </div>

                    <!-- 3 Testimonial Cards Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 sm:gap-10">
                        
                        <!-- Testimonial Card 1 -->
                        <div class="rounded-2xl p-6 sm:p-7 flex flex-col justify-between transition-all duration-300 hover:-translate-y-1" style="background-color: #ffffff !important; border: 1px solid #e2e8f0 !important; border-radius: 20px !important; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.04) !important;">
                            <div>
                                <div class="text-3xl sm:text-4xl font-black mb-2 leading-none" style="color: #00551c;">“</div>
                                <p class="text-xs sm:text-sm font-semibold text-slate-700 leading-relaxed mb-6" style="color: #334155;">
                                    "বন্যার সময় যখন আমাদের বাড়িতে খাবার ছিল না, তখন আপনাদের ত্রাণ সহায়তা আমাদের পরিবারকে বাঁচিয়েছে। আপনাদের প্রতি আমরা চিরকৃতজ্ঞ এবং দোয়া করি।"
                                </p>
                            </div>
                            <div class="flex items-center gap-3.5 pt-4 border-t border-slate-100">
                                <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="রহিমা খাতুন" class="w-12 h-12 sm:w-14 sm:h-14 rounded-full object-cover border-2 border-emerald-500 shadow-sm shrink-0">
                                <div>
                                    <div class="text-sm font-bold text-slate-900" style="color: #0f172a;">রহিমা খাতুন</div>
                                    <div class="text-[11px] font-semibold text-slate-500" style="color: #64748b;">কুড়িগ্রাম</div>
                                </div>
                            </div>
                        </div>

                        <!-- Testimonial Card 2 -->
                        <div class="rounded-2xl p-6 sm:p-7 flex flex-col justify-between transition-all duration-300 hover:-translate-y-1" style="background-color: #ffffff !important; border: 1px solid #e2e8f0 !important; border-radius: 20px !important; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.04) !important;">
                            <div>
                                <div class="text-3xl sm:text-4xl font-black mb-2 leading-none" style="color: #00551c;">“</div>
                                <p class="text-xs sm:text-sm font-semibold text-slate-700 leading-relaxed mb-6" style="color: #334155;">
                                    "আমার মেয়ের পড়াশোনা বন্ধ হওয়ার উপক্রম হয়েছিল। 'আমার পাঠশালা' স্কুল ফান্ডের সহায়তায় সে আবার স্কুলে যেতে পারছে। অনেক অনেক ধন্যবাদ ও শুভকামনা।"
                                </p>
                            </div>
                            <div class="flex items-center gap-3.5 pt-4 border-t border-slate-100">
                                <img src="https://randomuser.me/api/portraits/men/46.jpg" alt="আব্দুল জলিল" class="w-12 h-12 sm:w-14 sm:h-14 rounded-full object-cover border-2 border-emerald-500 shadow-sm shrink-0">
                                <div>
                                    <div class="text-sm font-bold text-slate-900" style="color: #0f172a;">আব্দুল জলিল</div>
                                    <div class="text-[11px] font-semibold text-slate-500" style="color: #64748b;">সুনামগঞ্জ</div>
                                </div>
                            </div>
                        </div>

                        <!-- Testimonial Card 3 -->
                        <div class="rounded-2xl p-6 sm:p-7 flex flex-col justify-between transition-all duration-300 hover:-translate-y-1" style="background-color: #ffffff !important; border: 1px solid #e2e8f0 !important; border-radius: 20px !important; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.04) !important;">
                            <div>
                                <div class="text-3xl sm:text-4xl font-black mb-2 leading-none" style="color: #00551c;">“</div>
                                <p class="text-xs sm:text-sm font-semibold text-slate-700 leading-relaxed mb-6" style="color: #334155;">
                                    "বিনামূল্যে চিকিৎসা ক্যাম্পে এসে আমার মায়ের চোখের চিকিৎসা করাতে পেরেছি। গরীব ও সুবিধাবঞ্চিত মানুষের পাশে দাঁড়ানোর জন্য আপনাদের অসংখ্য ধন্যবাদ।"
                                </p>
                            </div>
                            <div class="flex items-center gap-3.5 pt-4 border-t border-slate-100">
                                <img src="https://randomuser.me/api/portraits/men/85.jpg" alt="শহিদুল ইসলাম" class="w-12 h-12 sm:w-14 sm:h-14 rounded-full object-cover border-2 border-emerald-500 shadow-sm shrink-0">
                                <div>
                                    <div class="text-sm font-bold text-slate-900" style="color: #0f172a;">শহিদুল ইসলাম</div>
                                    <div class="text-[11px] font-semibold text-slate-500" style="color: #64748b;">নোয়াখালী</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- PARTNERS LOGO SECTION (1 BIG CARD WITH 3 ROWS OF 6 LOGOS) -->
                <div class="mt-10 sm:mt-12 md:mt-16 mb-20 sm:mb-28 md:mb-36">
                    <!-- Section Heading -->
                    <div class="text-center mb-8 sm:mb-10">
                        <h3 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight" style="color: #0f172a;">পার্টনারদের লোগো</h3>
                    </div>

                    <!-- 1 Big Card Container -->
                    <div class="rounded-3xl p-6 sm:p-8 md:p-10 bg-white border border-slate-200/80 shadow-md transition-all duration-300" style="background-color: #ffffff !important; border: 1px solid #e2e8f0 !important; border-radius: 24px !important; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05) !important;">
                        
                        <!-- 5 Rows x 4 Columns Grid (Total 20 BD IT Companies) -->
                        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-6 sm:gap-8 md:gap-10 items-center justify-center">
                            
                            <!-- Row 1: Item 1 - Brain Station 23 -->
                            <div class="flex flex-col items-center justify-between text-center p-4 sm:p-5 rounded-2xl hover:bg-slate-50 transition-all duration-300 min-h-[110px] sm:min-h-[125px] border border-slate-100/80 hover:border-slate-200 hover:shadow-sm">
                                <div class="flex-1 flex items-center justify-center w-full mb-3">
                                    <img src="https://logo.clearbit.com/brainstation-23.com" onerror="this.src='https://www.google.com/s2/favicons?domain=brainstation-23.com&sz=128'" alt="Brain Station 23" class="h-11 sm:h-14 w-auto object-contain max-h-14 max-w-[85%]">
                                </div>
                                <div class="text-xs sm:text-sm font-bold text-slate-800 tracking-tight w-full" style="color: #0f172a;">Brain Station 23</div>
                            </div>

                            <!-- Row 1: Item 2 - BJIT Group -->
                            <div class="flex flex-col items-center justify-between text-center p-4 sm:p-5 rounded-2xl hover:bg-slate-50 transition-all duration-300 min-h-[110px] sm:min-h-[125px] border border-slate-100/80 hover:border-slate-200 hover:shadow-sm">
                                <div class="flex-1 flex items-center justify-center w-full mb-3">
                                    <img src="https://logo.clearbit.com/bjitgroup.com" onerror="this.src='https://www.google.com/s2/favicons?domain=bjitgroup.com&sz=128'" alt="BJIT Group" class="h-11 sm:h-14 w-auto object-contain max-h-14 max-w-[85%]">
                                </div>
                                <div class="text-xs sm:text-sm font-bold text-slate-800 tracking-tight w-full" style="color: #0f172a;">BJIT Group</div>
                            </div>

                            <!-- Row 1: Item 3 - Therap BD -->
                            <div class="flex flex-col items-center justify-between text-center p-4 sm:p-5 rounded-2xl hover:bg-slate-50 transition-all duration-300 min-h-[110px] sm:min-h-[125px] border border-slate-100/80 hover:border-slate-200 hover:shadow-sm">
                                <div class="flex-1 flex items-center justify-center w-full mb-3">
                                    <img src="https://logo.clearbit.com/therapglobal.com" onerror="this.src='https://www.google.com/s2/favicons?domain=therapglobal.com&sz=128'" alt="Therap BD" class="h-11 sm:h-14 w-auto object-contain max-h-14 max-w-[85%]">
                                </div>
                                <div class="text-xs sm:text-sm font-bold text-slate-800 tracking-tight w-full" style="color: #0f172a;">Therap BD</div>
                            </div>

                            <!-- Row 1: Item 4 - SELISE Digital -->
                            <div class="flex flex-col items-center justify-between text-center p-4 sm:p-5 rounded-2xl hover:bg-slate-50 transition-all duration-300 min-h-[110px] sm:min-h-[125px] border border-slate-100/80 hover:border-slate-200 hover:shadow-sm">
                                <div class="flex-1 flex items-center justify-center w-full mb-3">
                                    <img src="https://logo.clearbit.com/selise.ch" onerror="this.src='https://www.google.com/s2/favicons?domain=selise.ch&sz=128'" alt="SELISE Digital" class="h-11 sm:h-14 w-auto object-contain max-h-14 max-w-[85%]">
                                </div>
                                <div class="text-xs sm:text-sm font-bold text-slate-800 tracking-tight w-full" style="color: #0f172a;">SELISE Digital</div>
                            </div>

                            <!-- Row 2: Item 5 - REVE Systems -->
                            <div class="flex flex-col items-center justify-between text-center p-4 sm:p-5 rounded-2xl hover:bg-slate-50 transition-all duration-300 min-h-[110px] sm:min-h-[125px] border border-slate-100/80 hover:border-slate-200 hover:shadow-sm">
                                <div class="flex-1 flex items-center justify-center w-full mb-3">
                                    <img src="https://logo.clearbit.com/revesystems.com" onerror="this.src='https://www.google.com/s2/favicons?domain=revesystems.com&sz=128'" alt="REVE Systems" class="h-11 sm:h-14 w-auto object-contain max-h-14 max-w-[85%]">
                                </div>
                                <div class="text-xs sm:text-sm font-bold text-slate-800 tracking-tight w-full" style="color: #0f172a;">REVE Systems</div>
                            </div>

                            <!-- Row 2: Item 6 - Cefalo BD -->
                            <div class="flex flex-col items-center justify-between text-center p-4 sm:p-5 rounded-2xl hover:bg-slate-50 transition-all duration-300 min-h-[110px] sm:min-h-[125px] border border-slate-100/80 hover:border-slate-200 hover:shadow-sm">
                                <div class="flex-1 flex items-center justify-center w-full mb-3">
                                    <img src="https://logo.clearbit.com/cefalo.com" onerror="this.src='https://www.google.com/s2/favicons?domain=cefalo.com&sz=128'" alt="Cefalo BD" class="h-11 sm:h-14 w-auto object-contain max-h-14 max-w-[85%]">
                                </div>
                                <div class="text-xs sm:text-sm font-bold text-slate-800 tracking-tight w-full" style="color: #0f172a;">Cefalo BD</div>
                            </div>

                            <!-- Row 2: Item 7 - Pathao Tech -->
                            <div class="flex flex-col items-center justify-between text-center p-4 sm:p-5 rounded-2xl hover:bg-slate-50 transition-all duration-300 min-h-[110px] sm:min-h-[125px] border border-slate-100/80 hover:border-slate-200 hover:shadow-sm">
                                <div class="flex-1 flex items-center justify-center w-full mb-3">
                                    <img src="https://logo.clearbit.com/pathao.com" onerror="this.src='https://www.google.com/s2/favicons?domain=pathao.com&sz=128'" alt="Pathao Tech" class="h-11 sm:h-14 w-auto object-contain max-h-14 max-w-[85%]">
                                </div>
                                <div class="text-xs sm:text-sm font-bold text-slate-800 tracking-tight w-full" style="color: #0f172a;">Pathao Tech</div>
                            </div>

                            <!-- Row 2: Item 8 - bKash Tech -->
                            <div class="flex flex-col items-center justify-between text-center p-4 sm:p-5 rounded-2xl hover:bg-slate-50 transition-all duration-300 min-h-[110px] sm:min-h-[125px] border border-slate-100/80 hover:border-slate-200 hover:shadow-sm">
                                <div class="flex-1 flex items-center justify-center w-full mb-3">
                                    <img src="https://logo.clearbit.com/bkash.com" onerror="this.src='https://www.google.com/s2/favicons?domain=bkash.com&sz=128'" alt="bKash Tech" class="h-11 sm:h-14 w-auto object-contain max-h-14 max-w-[85%]">
                                </div>
                                <div class="text-xs sm:text-sm font-bold text-slate-800 tracking-tight w-full" style="color: #0f172a;">bKash Tech</div>
                            </div>

                            <!-- Row 3: Item 9 - ShopUp Tech -->
                            <div class="flex flex-col items-center justify-between text-center p-4 sm:p-5 rounded-2xl hover:bg-slate-50 transition-all duration-300 min-h-[110px] sm:min-h-[125px] border border-slate-100/80 hover:border-slate-200 hover:shadow-sm">
                                <div class="flex-1 flex items-center justify-center w-full mb-3">
                                    <img src="https://logo.clearbit.com/shopup.com" onerror="this.src='https://www.google.com/s2/favicons?domain=shopup.com&sz=128'" alt="ShopUp Tech" class="h-11 sm:h-14 w-auto object-contain max-h-14 max-w-[85%]">
                                </div>
                                <div class="text-xs sm:text-sm font-bold text-slate-800 tracking-tight w-full" style="color: #0f172a;">ShopUp Tech</div>
                            </div>

                            <!-- Row 3: Item 10 - Chaldal Tech -->
                            <div class="flex flex-col items-center justify-between text-center p-4 sm:p-5 rounded-2xl hover:bg-slate-50 transition-all duration-300 min-h-[110px] sm:min-h-[125px] border border-slate-100/80 hover:border-slate-200 hover:shadow-sm">
                                <div class="flex-1 flex items-center justify-center w-full mb-3">
                                    <img src="https://logo.clearbit.com/chaldal.com" onerror="this.src='https://www.google.com/s2/favicons?domain=chaldal.com&sz=128'" alt="Chaldal Tech" class="h-11 sm:h-14 w-auto object-contain max-h-14 max-w-[85%]">
                                </div>
                                <div class="text-xs sm:text-sm font-bold text-slate-800 tracking-tight w-full" style="color: #0f172a;">Chaldal Tech</div>
                            </div>

                            <!-- Row 3: Item 11 - 10 Minute School -->
                            <div class="flex flex-col items-center justify-between text-center p-4 sm:p-5 rounded-2xl hover:bg-slate-50 transition-all duration-300 min-h-[110px] sm:min-h-[125px] border border-slate-100/80 hover:border-slate-200 hover:shadow-sm">
                                <div class="flex-1 flex items-center justify-center w-full mb-3">
                                    <img src="https://logo.clearbit.com/10minuteschool.com" onerror="this.src='https://www.google.com/s2/favicons?domain=10minuteschool.com&sz=128'" alt="10 Minute School" class="h-11 sm:h-14 w-auto object-contain max-h-14 max-w-[85%]">
                                </div>
                                <div class="text-xs sm:text-sm font-bold text-slate-800 tracking-tight w-full" style="color: #0f172a;">10 Minute School</div>
                            </div>

                            <!-- Row 3: Item 12 - Enosis Solutions -->
                            <div class="flex flex-col items-center justify-between text-center p-4 sm:p-5 rounded-2xl hover:bg-slate-50 transition-all duration-300 min-h-[110px] sm:min-h-[125px] border border-slate-100/80 hover:border-slate-200 hover:shadow-sm">
                                <div class="flex-1 flex items-center justify-center w-full mb-3">
                                    <img src="https://logo.clearbit.com/enosisbd.com" onerror="this.src='https://www.google.com/s2/favicons?domain=enosisbd.com&sz=128'" alt="Enosis Solutions" class="h-11 sm:h-14 w-auto object-contain max-h-14 max-w-[85%]">
                                </div>
                                <div class="text-xs sm:text-sm font-bold text-slate-800 tracking-tight w-full" style="color: #0f172a;">Enosis Solutions</div>
                            </div>

                            <!-- Row 4: Item 13 - Kaz Software -->
                            <div class="flex flex-col items-center justify-between text-center p-4 sm:p-5 rounded-2xl hover:bg-slate-50 transition-all duration-300 min-h-[110px] sm:min-h-[125px] border border-slate-100/80 hover:border-slate-200 hover:shadow-sm">
                                <div class="flex-1 flex items-center justify-center w-full mb-3">
                                    <img src="https://logo.clearbit.com/kaz.com.bd" onerror="this.src='https://www.google.com/s2/favicons?domain=kaz.com.bd&sz=128'" alt="Kaz Software" class="h-11 sm:h-14 w-auto object-contain max-h-14 max-w-[85%]">
                                </div>
                                <div class="text-xs sm:text-sm font-bold text-slate-800 tracking-tight w-full" style="color: #0f172a;">Kaz Software</div>
                            </div>

                            <!-- Row 4: Item 14 - DataSoft Systems -->
                            <div class="flex flex-col items-center justify-between text-center p-4 sm:p-5 rounded-2xl hover:bg-slate-50 transition-all duration-300 min-h-[110px] sm:min-h-[125px] border border-slate-100/80 hover:border-slate-200 hover:shadow-sm">
                                <div class="flex-1 flex items-center justify-center w-full mb-3">
                                    <img src="https://logo.clearbit.com/datasoft-bd.com" onerror="this.src='https://www.google.com/s2/favicons?domain=datasoft-bd.com&sz=128'" alt="DataSoft Systems" class="h-11 sm:h-14 w-auto object-contain max-h-14 max-w-[85%]">
                                </div>
                                <div class="text-xs sm:text-sm font-bold text-slate-800 tracking-tight w-full" style="color: #0f172a;">DataSoft Systems</div>
                            </div>

                            <!-- Row 4: Item 15 - Southtech Group -->
                            <div class="flex flex-col items-center justify-between text-center p-4 sm:p-5 rounded-2xl hover:bg-slate-50 transition-all duration-300 min-h-[110px] sm:min-h-[125px] border border-slate-100/80 hover:border-slate-200 hover:shadow-sm">
                                <div class="flex-1 flex items-center justify-center w-full mb-3">
                                    <img src="https://logo.clearbit.com/southtechgroup.com" onerror="this.src='https://www.google.com/s2/favicons?domain=southtechgroup.com&sz=128'" alt="Southtech Group" class="h-11 sm:h-14 w-auto object-contain max-h-14 max-w-[85%]">
                                </div>
                                <div class="text-xs sm:text-sm font-bold text-slate-800 tracking-tight w-full" style="color: #0f172a;">Southtech Group</div>
                            </div>

                            <!-- Row 4: Item 16 - Leadsoft BD -->
                            <div class="flex flex-col items-center justify-between text-center p-4 sm:p-5 rounded-2xl hover:bg-slate-50 transition-all duration-300 min-h-[110px] sm:min-h-[125px] border border-slate-100/80 hover:border-slate-200 hover:shadow-sm">
                                <div class="flex-1 flex items-center justify-center w-full mb-3">
                                    <img src="https://logo.clearbit.com/leadsoft.com.bd" onerror="this.src='https://www.google.com/s2/favicons?domain=leadsoft.com.bd&sz=128'" alt="Leadsoft BD" class="h-11 sm:h-14 w-auto object-contain max-h-14 max-w-[85%]">
                                </div>
                                <div class="text-xs sm:text-sm font-bold text-slate-800 tracking-tight w-full" style="color: #0f172a;">Leadsoft BD</div>
                            </div>

                            <!-- Row 5: Item 17 - Arogga Tech -->
                            <div class="flex flex-col items-center justify-between text-center p-4 sm:p-5 rounded-2xl hover:bg-slate-50 transition-all duration-300 min-h-[110px] sm:min-h-[125px] border border-slate-100/80 hover:border-slate-200 hover:shadow-sm">
                                <div class="flex-1 flex items-center justify-center w-full mb-3">
                                    <img src="https://logo.clearbit.com/arogga.com" onerror="this.src='https://www.google.com/s2/favicons?domain=arogga.com&sz=128'" alt="Arogga Tech" class="h-11 sm:h-14 w-auto object-contain max-h-14 max-w-[85%]">
                                </div>
                                <div class="text-xs sm:text-sm font-bold text-slate-800 tracking-tight w-full" style="color: #0f172a;">Arogga Tech</div>
                            </div>

                            <!-- Row 5: Item 18 - Shikho Tech -->
                            <div class="flex flex-col items-center justify-between text-center p-4 sm:p-5 rounded-2xl hover:bg-slate-50 transition-all duration-300 min-h-[110px] sm:min-h-[125px] border border-slate-100/80 hover:border-slate-200 hover:shadow-sm">
                                <div class="flex-1 flex items-center justify-center w-full mb-3">
                                    <img src="https://logo.clearbit.com/shikho.com" onerror="this.src='https://www.google.com/s2/favicons?domain=shikho.com&sz=128'" alt="Shikho Tech" class="h-11 sm:h-14 w-auto object-contain max-h-14 max-w-[85%]">
                                </div>
                                <div class="text-xs sm:text-sm font-bold text-slate-800 tracking-tight w-full" style="color: #0f172a;">Shikho Tech</div>
                            </div>

                            <!-- Row 5: Item 19 - TigerIT BD -->
                            <div class="flex flex-col items-center justify-between text-center p-4 sm:p-5 rounded-2xl hover:bg-slate-50 transition-all duration-300 min-h-[110px] sm:min-h-[125px] border border-slate-100/80 hover:border-slate-200 hover:shadow-sm">
                                <div class="flex-1 flex items-center justify-center w-full mb-3">
                                    <img src="https://logo.clearbit.com/tigerit.com" onerror="this.src='https://www.google.com/s2/favicons?domain=tigerit.com&sz=128'" alt="TigerIT BD" class="h-11 sm:h-14 w-auto object-contain max-h-14 max-w-[85%]">
                                </div>
                                <div class="text-xs sm:text-sm font-bold text-slate-800 tracking-tight w-full" style="color: #0f172a;">TigerIT BD</div>
                            </div>

                            <!-- Row 5: Item 20 - Vivasoft -->
                            <div class="flex flex-col items-center justify-between text-center p-4 sm:p-5 rounded-2xl hover:bg-slate-50 transition-all duration-300 min-h-[110px] sm:min-h-[125px] border border-slate-100/80 hover:border-slate-200 hover:shadow-sm">
                                <div class="flex-1 flex items-center justify-center w-full mb-3">
                                    <img src="https://logo.clearbit.com/vivasoftltd.com" onerror="this.src='https://www.google.com/s2/favicons?domain=vivasoftltd.com&sz=128'" alt="Vivasoft" class="h-11 sm:h-14 w-auto object-contain max-h-14 max-w-[85%]">
                                </div>
                                <div class="text-xs sm:text-sm font-bold text-slate-800 tracking-tight w-full" style="color: #0f172a;">Vivasoft</div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>


    <!-- OFFICIAL FOOTER -->
    <footer class="bg-slate-900 text-slate-400 text-[11px] py-8 border-t border-slate-800">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <img src="{{ asset('logo-home.png') }}" alt="BD Emblem" class="w-8 h-8 object-contain brightness-200">
                <div>
                    <div class="font-bold text-white text-xs">রিবিল্ডিং বাংলাদেশ</div>
                    <div>Rebuilding Bangladesh © 2026</div>
                </div>
            </div>
            <div class="flex items-center gap-6 font-semibold text-slate-400">
                <a href="{{ route('home') }}" class="hover:text-white transition">Home</a>
                <a href="{{ route('portal.register') }}" class="hover:text-white transition">Registration</a>
                <a href="{{ route('portal.login') }}" class="hover:text-white transition">Portal Login</a>
                <a href="{{ route('admin.login') }}" class="hover:text-white transition">Admin Panel</a>
            </div>
    <script>
        function updateLiveClock() {
            const now = new Date();
            let hours = now.getHours();
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            const ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // the hour '0' should be '12'
            const strTime = String(hours).padStart(2, '0') + ':' + minutes + ':' + seconds + ' ' + ampm;
            const clockEl = document.getElementById('live-clock');
            if (clockEl) {
                clockEl.textContent = strTime;
            }
        }
        setInterval(updateLiveClock, 1000);
        document.addEventListener('DOMContentLoaded', updateLiveClock);
        updateLiveClock();
    </script>
</body>
</html>
