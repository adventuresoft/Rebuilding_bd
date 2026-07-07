<x-layouts.app title="Portal Profile">
    <div class="mx-auto max-w-2xl rounded-3xl border border-white/10 bg-white/5 p-8">
        <h1 class="text-3xl font-black text-white">Profile</h1>
        <form class="mt-8 grid gap-4 md:grid-cols-2" method="post" action="{{ route('portal.profile.update') }}">
            @csrf
            @method('put')
            <input name="name" value="{{ old('name', $person->name) }}" placeholder="Name" class="rounded-2xl border border-white/10 bg-slate-900/80 px-4 py-3 text-white md:col-span-2">
            <input name="phone" value="{{ old('phone', $person->phone) }}" placeholder="Phone" class="rounded-2xl border border-white/10 bg-slate-900/80 px-4 py-3 text-white">
            <input name="nid_number" value="{{ old('nid_number', $person->nid_number) }}" placeholder="NID Number" class="rounded-2xl border border-white/10 bg-slate-900/80 px-4 py-3 text-white">
            <input name="date_of_birth" value="{{ old('date_of_birth', optional($person->date_of_birth)->format('Y-m-d')) }}" placeholder="YYYY-MM-DD" class="rounded-2xl border border-white/10 bg-slate-900/80 px-4 py-3 text-white md:col-span-2">
            <button class="rounded-2xl bg-amber-400 px-5 py-3 font-semibold text-slate-950 md:col-span-2">Save Profile</button>
        </form>
    </div>
</x-layouts.app>
