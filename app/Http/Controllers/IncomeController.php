<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();

        $query = Income::where('user_id', $userId)->with('category');

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhereHas('category', function ($q2) use ($request) {
                      $q2->where('Name', 'like', '%' . $request->search . '%');
                  });
            });
        }

        $incomes = $query->orderBy('date', 'desc')->get();

        $totalIncome = Income::where('user_id', $userId)->sum('amount');

        $thisMonth = Income::where('user_id', $userId)
            ->whereMonth('date', now()->month)
            ->whereYear('date', now()->year)
            ->sum('amount');

        $entriesCount = Income::where('user_id', $userId)->count();

        $categories = Category::where('type', 'Income')
            ->where(function ($q) use ($userId) {
                $q->where('user_id', $userId)->orWhereNull('user_id');
            })
            ->get();

        return view('user.income', compact('incomes', 'totalIncome', 'thisMonth', 'entriesCount', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'date' => 'required|date',
            'is_recurring' => 'nullable|boolean',
            'frequency' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['is_recurring'] = $request->has('is_recurring');

        Income::create($validated);

        return redirect()->route('income.index')->with('success', 'Income added successfully.');
    }

    public function update(Request $request, Income $income)
    {
        if ($income->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'date' => 'required|date',
            'is_recurring' => 'nullable|boolean',
            'frequency' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $validated['is_recurring'] = $request->has('is_recurring');

        $income->update($validated);

        return redirect()->route('income.index')->with('success', 'Income updated successfully.');
    }

    public function destroy(Income $income)
    {
        if ($income->user_id !== Auth::id()) {
            abort(403);
        }

        $income->delete();

        return redirect()->route('income.index')->with('success', 'Income deleted successfully.');
    }
}