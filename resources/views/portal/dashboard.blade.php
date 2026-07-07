<x-layouts.app title="Portal Dashboard">
    <div class="space-y-6">
        <div class="rounded-3xl border border-white/10 bg-white/5 p-6">
            <p class="text-sm uppercase tracking-[0.3em] text-amber-300">Portal Dashboard</p>
            <h1 class="mt-2 text-3xl font-black text-white">Welcome, {{ $person?->name }}</h1>
        </div>

        <div class="grid gap-4 md:grid-cols-2">
            <div class="rounded-2xl border border-white/10 bg-slate-900/70 p-5">
                <p class="text-slate-400">Registration Status</p>
                <p class="mt-3 text-2xl font-bold text-white">{{ $person?->profile_completed_at ? 'Completed' : 'In Progress' }}</p>
            </div>
            <div class="rounded-2xl border border-white/10 bg-slate-900/70 p-5">
                <p class="text-slate-400">Quick Actions</p>
                <div class="mt-3 flex flex-wrap gap-3">
                    <a href="{{ route('portal.registration') }}" class="rounded-full bg-amber-400 px-5 py-2 font-semibold text-slate-950">Open Wizard</a>
                    <a href="{{ route('portal.profile') }}" class="rounded-full border border-white/15 bg-white/5 px-5 py-2 text-white">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
