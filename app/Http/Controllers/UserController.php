<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\Budget;
use App\Models\Insight;
use App\Models\Adminannouncement;
use App\Models\Scheduledtransaction;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class UserController extends Controller
{
    public function Addcategorylogic(Request $request)
    {
        $category = new Category();

        $category->user_id = auth()->id();
        $category->Name = $request->Name;
        $category->type = $request->type;

        $category->save();

        return redirect()->back()->with('success', 'Category added successfully.');
    }


    public function Allcategories()
    {
        $userId = auth()->id();

        $admin = User::where('userrole', 'admin')->first();

        if ($admin) {

            $categories = Category::where(function ($query) use ($userId, $admin) {

                $query->where('user_id', $userId)
                    ->orWhere('user_id', $admin->id);

            })->get();

        } else {

            $categories = Category::where('user_id', $userId)->get();
        }

        return view('User.Allcategories', compact('categories'));
    }


    public function Editcategory($id)
    {
        $userId = auth()->id();

        $admin = User::where('userrole', 'admin')->first();

        if ($admin) {

            $category = Category::where(function ($query) use ($userId, $admin) {

                $query->where('user_id', $userId)
                    ->orWhere('user_id', $admin->id);

            })->findOrFail($id);

        } else {

            $category = Category::where('user_id', $userId)
                ->findOrFail($id);
        }

        return view('User.Editcategory', compact('category'));
    }


    public function Updatecategory(Request $request, $id)
    {
        $userId = auth()->id();

        $category = Category::where('user_id', $userId)
            ->findOrFail($id);

        $category->Name = $request->Name;
        $category->type = $request->type;

        $category->save();

        return redirect('/userallcategories')
            ->with('success', 'Category updated successfully.');
    }


    public function Deletecategory($id)
    {
        $category = Category::where('user_id', auth()->id())
            ->findOrFail($id);

        $category->delete();

        return redirect('/userallcategories')
            ->with('success', 'Category deleted successfully.');
    }


    public function Addtransaction()
    {
        $userId = auth()->id();

        $admin = User::where('userrole', 'admin')->first();

        if ($admin) {

            $categories = Category::where(function ($query) use ($userId, $admin) {

                $query->where('user_id', $userId)
                    ->orWhere('user_id', $admin->id);

            })->get();

        } else {

            $categories = Category::where('user_id', $userId)->get();
        }

        return view('User.Addtransaction', compact('categories'));
    }


    public function Addtransactionlogic(Request $request)
    {
        $transaction = new Transaction();

        $transaction->user_id = auth()->id();
        $transaction->category_id = $request->category_id;
        $transaction->Amount = $request->Amount;
        $transaction->Description = $request->Description;
        $transaction->Date = $request->Date;

        $transaction->save();

        return redirect('/useraddtransaction')
            ->with('success', 'Transaction added successfully.');
    }


    public function Alltransactions()
    {
        $transactions = Transaction::where('user_id', auth()->id())
            ->with('category')
            ->latest()
            ->get();

        return view('User.Alltransactions', compact('transactions'));
    }


    public function Edittransaction($id)
    {
        $userId = auth()->id();

        $transaction = Transaction::where('user_id', $userId)
            ->findOrFail($id);

        $admin = User::where('userrole', 'admin')->first();

        if ($admin) {

            $categories = Category::where(function ($query) use ($userId, $admin) {

                $query->where('user_id', $userId)
                    ->orWhere('user_id', $admin->id);

            })->get();

        } else {

            $categories = Category::where('user_id', $userId)->get();
        }

        return view(
            'User.Edittransaction',
            compact('transaction', 'categories')
        );
    }


    public function Updatetransaction(Request $request, $id)
    {
        $transaction = Transaction::where('user_id', auth()->id())
            ->findOrFail($id);

        $transaction->category_id = $request->category_id;
        $transaction->Amount = $request->Amount;
        $transaction->Description = $request->Description;
        $transaction->Date = $request->Date;

        $transaction->save();

        return redirect('/useralltransactions')
            ->with('success', 'Transaction updated successfully.');
    }


    public function Deletetransaction($id)
    {
        $transaction = Transaction::where('user_id', auth()->id())
            ->findOrFail($id);

        $transaction->delete();

        return redirect('/useralltransactions')
            ->with('success', 'Transaction deleted successfully.');
    }


    public function Userdashboardanalytics()
    {
        $userId = auth()->id();

        $totalIncome = Transaction::where('user_id', $userId)
            ->whereHas('category', function ($query) {
                $query->where('type', 'Income');
            })
            ->sum('Amount');

        $totalExpenses = Transaction::where('user_id', $userId)
            ->whereHas('category', function ($query) {
                $query->where('type', 'Expense');
            })
            ->sum('Amount');

        $totalTransactions = Transaction::where('user_id', $userId)
            ->count();

        return view(
            'User.Dashboardanalytics',
            compact(
                'totalIncome',
                'totalExpenses',
                'totalTransactions'
            )
        );
    }


    public function Userdashboard()
{
    $userId = auth()->id();

    $totalIncome = Transaction::query()
        ->join('categories', 'transactions.category_id', '=', 'categories.id')
        ->where('transactions.user_id', $userId)
        ->whereRaw('LOWER(TRIM(categories.type)) = ?', ['income'])
        ->sum('transactions.Amount');

    $totalExpenses = Transaction::query()
        ->join('categories', 'transactions.category_id', '=', 'categories.id')
        ->where('transactions.user_id', $userId)
        ->whereRaw('LOWER(TRIM(categories.type)) = ?', ['expense'])
        ->sum('transactions.Amount');

    $totalTransactions = Transaction::where('user_id', $userId)
        ->count();

    return view('User.dashboard', compact(
        'totalIncome',
        'totalExpenses',
        'totalTransactions'
    ));
}

public function Userreport()
{
    $userId = auth()->id();

    $totalIncome = Transaction::query()
        ->join('categories', 'transactions.category_id', '=', 'categories.id')
        ->where('transactions.user_id', $userId)
        ->whereRaw('LOWER(TRIM(categories.type)) = ?', ['income'])
        ->sum('transactions.Amount');

    $totalExpenses = Transaction::query()
        ->join('categories', 'transactions.category_id', '=', 'categories.id')
        ->where('transactions.user_id', $userId)
        ->whereRaw('LOWER(TRIM(categories.type)) = ?', ['expense'])
        ->sum('transactions.Amount');

    $totalTransactions = Transaction::where('user_id', $userId)
        ->count();

    return view('User.reports', compact(
        'totalIncome',
        'totalExpenses',
        'totalTransactions'
    ));
}

    public function Addbudget()
    {
        $userId = auth()->id();

        $admin = User::where('userrole', 'admin')->first();

        if ($admin) {

            $categories = Category::where('type', 'Expense')
                ->where(function ($query) use ($userId, $admin) {

                    $query->where('user_id', $userId)
                        ->orWhere('user_id', $admin->id);

                })
                ->get();

        } else {

            $categories = Category::where('user_id', $userId)
                ->where('type', 'Expense')
                ->get();
        }

        return view('User.Addbudget', compact('categories'));
    }


    public function Addbudgetlogic(Request $request)
    {
        $existingBudget = Budget::where('user_id', auth()->id())
            ->where('category_id', $request->category_id)
            ->first();

        if ($existingBudget) {

            return redirect('/useraddbudget')
                ->with(
                    'error',
                    'A budget for this category already exists.'
                );
        }

        $budget = new Budget();

        $budget->user_id = auth()->id();
        $budget->category_id = $request->category_id;
        $budget->LimitAmount = $request->LimitAmount;

        $budget->save();

        return redirect('/userallbudgets')
            ->with(
                'success',
                'Budget created successfully.'
            );
    }


    public function Allbudgets()
    {
        $budgets = Budget::where('user_id', auth()->id())
            ->with('category')
            ->latest()
            ->get();

        foreach ($budgets as $budget) {

            $spent = Transaction::where('user_id', auth()->id())
                ->where('category_id', $budget->category_id)
                ->whereMonth('Date', date('m'))
                ->whereYear('Date', date('Y'))
                ->sum('Amount');

            $budget->spent = $spent;

            if ($budget->LimitAmount > 0) {

                $budget->percentage =
                    ($spent / $budget->LimitAmount) * 100;

            } else {

                $budget->percentage = 0;
            }

            if ($budget->percentage > 100) {
                $budget->percentage = 100;
            }
        }

        return view('User.Allbudgets', compact('budgets'));
    }


    public function Editbudget($id)
    {
        $budget = Budget::where('user_id', auth()->id())
            ->findOrFail($id);

        $userId = auth()->id();

        $admin = User::where('userrole', 'admin')->first();

        if ($admin) {

            $categories = Category::where('type', 'Expense')
                ->where(function ($query) use ($userId, $admin) {

                    $query->where('user_id', $userId)
                        ->orWhere('user_id', $admin->id);

                })
                ->get();

        } else {

            $categories = Category::where('user_id', $userId)
                ->where('type', 'Expense')
                ->get();
        }

        return view(
            'User.Editbudget',
            compact(
                'budget',
                'categories'
            )
        );
    }


    public function Updatebudget(Request $request, $id)
    {
        $budget = Budget::where('user_id', auth()->id())
            ->findOrFail($id);

        $existingBudget = Budget::where('user_id', auth()->id())
            ->where('category_id', $request->category_id)
            ->where('id', '!=', $id)
            ->first();

        if ($existingBudget) {

            return redirect('/usereditbudget/' . $id)
                ->with(
                    'error',
                    'A budget for this category already exists.'
                );
        }

        $budget->category_id = $request->category_id;
        $budget->LimitAmount = $request->LimitAmount;

        $budget->save();

        return redirect('/userallbudgets')
            ->with(
                'success',
                'Budget updated successfully.'
            );
    }


    public function Deletebudget($id)
    {
        $budget = Budget::where('user_id', auth()->id())
            ->findOrFail($id);

        $budget->delete();

        return redirect('/userallbudgets')
            ->with(
                'success',
                'Budget deleted successfully.'
            );
    }


    public function Allannouncenments()
    {
        $announcements = Adminannouncement::where(
            'Status',
            true
        )->latest()->get();

        return view(
            'User.Allannouncements',
            compact('announcements')
        );
    }


   public function userreportpdf(Request $request)
{
    $filter = $request->input('filter', 'monthly');

    // Accept only supported filter values
    if (!in_array($filter, ['daily', 'weekly', 'monthly'], true)) {
        $filter = 'monthly';
    }

    $query = Transaction::where('user_id', auth()->id());

    if ($filter === 'daily') {
        $date = $request->input('date', now()->toDateString());

        $request->validate([
            'date' => ['nullable', 'date'],
        ]);

        $query->whereDate('Date', $date);
    } elseif ($filter === 'weekly') {
        $start = Carbon::now()->startOfWeek(Carbon::MONDAY)->toDateString();
        $end = Carbon::now()->endOfWeek(Carbon::SUNDAY)->toDateString();

        $query->whereDate('Date', '>=', $start)
              ->whereDate('Date', '<=', $end);
    } else {
        $month = $request->input('month', now()->format('Y-m'));

        $request->validate([
            'month' => ['nullable', 'date_format:Y-m'],
        ]);

        $start = Carbon::createFromFormat('Y-m', $month)
            ->startOfMonth()
            ->toDateString();

        $end = Carbon::createFromFormat('Y-m', $month)
            ->endOfMonth()
            ->toDateString();

        $query->whereDate('Date', '>=', $start)
              ->whereDate('Date', '<=', $end);
    }

    $transactions = $query->with('category')->orderBy('Date', 'desc')->get();

    $income = 0;
    $expense = 0;

    foreach ($transactions as $transaction) {
        $type = strtolower(trim($transaction->category->type ?? ''));

        if ($type === 'income') {
            $income += (float) $transaction->Amount;
        } elseif ($type === 'expense') {
            $expense += (float) $transaction->Amount;
        }
    }

    $balance = $income - $expense;

    $pdf = Pdf::loadView('User.Reportpdf', [
        'transactions' => $transactions,
        'income' => $income,
        'expense' => $expense,
        'balance' => $balance,
        'filter' => $filter,
    ]);

    return $pdf->download('Userreports.pdf');
}



    public function Allscheduledtransactions()
    {
        $userId = auth()->id();

        if (!$userId) {
            return redirect('/login');
        }

        $scheduledTransactions = Scheduledtransaction::where(
            'user_id',
            $userId
        )
            ->with('category')
            ->latest()
            ->get();

        $admin = User::where(
            'userrole',
            'admin'
        )->first();


        if ($admin) {

            $categories = Category::where(
                function ($query) use ($admin, $userId) {

                    $query->where(
                        'user_id',
                        $userId
                    )
                        ->orWhere(
                            'user_id',
                            $admin->id
                        );

                }
            )->get();

        } else {

            $categories = Category::where(
                'user_id',
                $userId
            )->get();
        }


        foreach ($scheduledTransactions as $scheduled) {

            if ($scheduled->Status == true) {

                while (
                    $scheduled->NextDate <= date('Y-m-d')
                ) {

                    $existingTransaction =
                        Transaction::where(
                            'user_id',
                            $userId
                        )
                        ->where(
                            'category_id',
                            $scheduled->category_id
                        )
                        ->where(
                            'Amount',
                            $scheduled->Amount
                        )
                        ->where(
                            'Description',
                            $scheduled->Description
                        )
                        ->where(
                            'Date',
                            $scheduled->NextDate
                        )
                        ->first();


                    if (!$existingTransaction) {

                        $transaction =
                            new Transaction();

                        $transaction->user_id =
                            $userId;

                        $transaction->category_id =
                            $scheduled->category_id;

                        $transaction->Amount =
                            $scheduled->Amount;

                        $transaction->Description =
                            $scheduled->Description;

                        $transaction->Date =
                            $scheduled->NextDate;

                        $transaction->save();
                    }


                    if (
                        $scheduled->Frequency ==
                        'Daily'
                    ) {

                        $scheduled->NextDate =
                            date(
                                'Y-m-d',
                                strtotime(
                                    $scheduled->NextDate .
                                    ' +1 day'
                                )
                            );

                    } elseif (
                        $scheduled->Frequency ==
                        'Weekly'
                    ) {

                        $scheduled->NextDate =
                            date(
                                'Y-m-d',
                                strtotime(
                                    $scheduled->NextDate .
                                    ' +1 week'
                                )
                            );

                    } elseif (
                        $scheduled->Frequency ==
                        'Monthly'
                    ) {

                        $scheduled->NextDate =
                            date(
                                'Y-m-d',
                                strtotime(
                                    $scheduled->NextDate .
                                    ' +1 month'
                                )
                            );

                    } elseif (
                        $scheduled->Frequency ==
                        'Yearly'
                    ) {

                        $scheduled->NextDate =
                            date(
                                'Y-m-d',
                                strtotime(
                                    $scheduled->NextDate .
                                    ' +1 year'
                                )
                            );

                    } else {

                        break;
                    }


                    $scheduled->save();
                }
            }
        }


        return view(
            'User.Allscheduledtransactions',
            compact(
                'scheduledTransactions',
                'categories'
            )
        );
    }


    public function Addscheduledtransaction()
    {
        $userId = auth()->id();

        $admin = User::where(
            'userrole',
            'admin'
        )->first();


        if ($admin) {

            $categories = Category::where(
                function ($query) use ($admin, $userId) {

                    $query->where(
                        'user_id',
                        $userId
                    )
                        ->orWhere(
                            'user_id',
                            $admin->id
                        );

                }
            )->get();

        } else {

            $categories = Category::where(
                'user_id',
                $userId
            )->get();
        }


        return view(
            'User.Addscheduledtransaction',
            compact('categories')
        );
    }


    public function Addscheduledtransactionlogic(
        Request $request
    ) {
        $scheduled =
            new Scheduledtransaction();

        $scheduled->user_id =
            auth()->id();

        $scheduled->category_id =
            $request->category_id;

        $scheduled->Amount =
            $request->Amount;

        $scheduled->Description =
            $request->Description;

        $scheduled->StartDate =
            $request->StartDate;

        $scheduled->Frequency =
            $request->Frequency;

        $scheduled->NextDate =
            $request->StartDate;

        $scheduled->Status =
            true;

        $scheduled->save();


        return redirect(
            '/userallscheduledtransactions'
        )->with(
            'success',
            'Scheduled transaction created successfully.'
        );
    }


    public function Editscheduledtransaction($id)
    {
        $scheduled =
            Scheduledtransaction::where(
                'user_id',
                auth()->id()
            )->findOrFail($id);


        $userId = auth()->id();

        $admin = User::where(
            'userrole',
            'admin'
        )->first();


        if ($admin) {

            $categories = Category::where(
                function ($query) use ($admin, $userId) {

                    $query->where(
                        'user_id',
                        $userId
                    )
                        ->orWhere(
                            'user_id',
                            $admin->id
                        );

                }
            )->get();

        } else {

            $categories = Category::where(
                'user_id',
                $userId
            )->get();
        }


        return view(
            'User.Editscheduledtransaction',
            compact(
                'scheduled',
                'categories'
            )
        );
    }


    public function Updatescheduledtransaction(
        Request $request,
        $id
    ) {
        $scheduled =
            Scheduledtransaction::where(
                'user_id',
                auth()->id()
            )->findOrFail($id);


        $scheduled->category_id =
            $request->category_id;

        $scheduled->Amount =
            $request->Amount;

        $scheduled->Description =
            $request->Description;

        $scheduled->StartDate =
            $request->StartDate;

        $scheduled->Frequency =
            $request->Frequency;

        $scheduled->NextDate =
            $request->StartDate;

        $scheduled->save();


        return redirect(
            '/userallscheduledtransactions'
        )->with(
            'success',
            'Scheduled transaction updated successfully.'
        );
    }


    public function Deletescheduledtransaction($id)
    {
        $scheduled =
            Scheduledtransaction::where(
                'user_id',
                auth()->id()
            )->findOrFail($id);

        $scheduled->delete();


        return redirect(
            '/userallscheduledtransactions'
        )->with(
            'success',
            'Scheduled transaction deleted successfully.'
        );
    }


    public function Togglescheduledtransaction($id)
    {
        $scheduled =
            Scheduledtransaction::where(
                'user_id',
                auth()->id()
            )->findOrFail($id);


        if ($scheduled->Status == true) {

            $scheduled->Status = false;

        } else {

            $scheduled->Status = true;
        }


        $scheduled->save();


        return redirect(
            '/userallscheduledtransactions'
        )->with(
            'success',
            'Scheduled transaction status updated.'
        );
    }
}
