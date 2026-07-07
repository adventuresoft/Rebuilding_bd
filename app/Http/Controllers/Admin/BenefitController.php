<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Benefit;
use App\Models\People;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BenefitController extends Controller
{
    public function index(Request $request): View
    {
        $query = Benefit::query()->with('person');

        if ($search = $request->string('q')->trim()->toString()) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('type_of_benefit', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%")
                  ->orWhereHas('person', function ($p) use ($search) {
                      $p->where('name', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%")
                        ->orWhere('nid_number', 'like', "%{$search}%");
                  });
            });
        }

        if ($type = $request->string('type')->trim()->toString()) {
            $query->where('type_of_benefit', $type);
        }

        if ($category = $request->string('category')->trim()->toString()) {
            $query->where('category', $category);
        }

        if ($status = $request->string('status')->trim()->toString()) {
            $query->where('status', $status);
        }

        $benefits = $query->latest()->paginate(15)->withQueryString();

        $stats = [
            'total' => Benefit::count(),
            'total_amount' => Benefit::sum('amount'),
            'approved' => Benefit::where('status', 'Approved')->count(),
            'paid' => Benefit::where('status', 'Paid')->count(),
        ];

        return view('admin.benefits.index', [
            'benefits' => $benefits,
            'stats' => $stats,
            'search' => $request->string('q')->toString(),
            'selectedType' => $request->string('type')->toString(),
            'selectedCategory' => $request->string('category')->toString(),
            'selectedStatus' => $request->string('status')->toString(),
        ]);
    }

    public function create(Request $request): View
    {
        $people = People::query()->orderBy('name')->get();
        $selectedPersonId = $request->integer('person_id');

        return view('admin.benefits.create', [
            'people' => $people,
            'selectedPersonId' => $selectedPersonId ?: null,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'person_id' => ['nullable', 'exists:people,id'],
            'title' => ['required', 'string', 'max:255'],
            'type_of_benefit' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'amount' => ['nullable', 'numeric', 'min:0'],
            'payment_method' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:50'],
            'approval_date' => ['nullable', 'date'],
            'remarks' => ['nullable', 'string'],
        ]);

        Benefit::create($validated);

        return redirect()->route('admin.benefits.index')
            ->with('success', 'নতুন সুবিধা সফলভাবে বরাদ্দ ও রেকর্ড করা হয়েছে!');
    }

    public function show(Benefit $benefit): View
    {
        $benefit->load(['person.julyFighterInfo', 'person.personalInfo', 'person.addressInfo']);

        return view('admin.benefits.show', [
            'benefit' => $benefit,
        ]);
    }

    public function edit(Benefit $benefit): View
    {
        $people = People::query()->orderBy('name')->get();

        return view('admin.benefits.edit', [
            'benefit' => $benefit,
            'people' => $people,
        ]);
    }

    public function update(Request $request, Benefit $benefit): RedirectResponse
    {
        $validated = $request->validate([
            'person_id' => ['nullable', 'exists:people,id'],
            'title' => ['required', 'string', 'max:255'],
            'type_of_benefit' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'amount' => ['nullable', 'numeric', 'min:0'],
            'payment_method' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:50'],
            'approval_date' => ['nullable', 'date'],
            'remarks' => ['nullable', 'string'],
        ]);

        $benefit->update($validated);

        return redirect()->route('admin.benefits.index')
            ->with('success', 'সুবিধার তথ্য সফলভাবে আপডেট করা হয়েছে!');
    }

    public function destroy(Benefit $benefit): RedirectResponse
    {
        $benefit->delete();

        return redirect()->route('admin.benefits.index')
            ->with('success', 'সুবিধার রেকর্ডটি সফলভাবে মুছে ফেলা হয়েছে।');
    }
}
