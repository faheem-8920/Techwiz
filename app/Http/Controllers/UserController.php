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

class UserController extends Controller
{
    

public function Addcategorylogic(Request $request)
{

    $category=new Category();
    $category->user_id = auth()->id();
    $category->Name=$request->Name;
    $category->type=$request->type;
    $category->save();
    return redirect('/useraddcategory');



}

public function Allcategories()
{
$admincategories = User::where('userrole', 'admin')->first();

    $categories = Category::where('user_id', auth()->id())
        ->orWhere('user_id', $admincategories->id)
        ->get();
        return view('User.Allcategories', compact('categories'));


}

Public function Editcategory($id)
{
    $category = Category::findOrFail($id);
    return view('User.Editcategory', compact('category'));
}

Public function Updatecategory(Request $request, $id)
{
    $category = Category::findOrFail($id);
    $category->Name = $request->Name;
    $category->type = $request->type;
    $category->save();
    return redirect('/userallcategories');
}


public function Deletecategory($id)
{
    $category = Category::findOrFail($id);
    $category->delete();
    return redirect('/userallcategories');



}



public function Addtransaction()
{
    $categories = Category::where('user_id', auth()->id())->get();
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

    return redirect('/useraddtransaction');




}

public function Alltransactions()
{
    $transactions = Transaction::where('user_id', auth()->id())->get();
    return view('User.Alltransactions', compact('transactions'));

}

public function Edittransaction($id)
{
        $categories = Category::where('user_id', auth()->id())->get();

    $transaction = Transaction::findOrFail($id);
    return view('User.Edittransaction', compact('transaction', 'categories'));
}

public function Updatetransaction(Request $request, $id)
{
    $transaction = Transaction::findOrFail($id);
    $transaction->category_id = $request->category_id;
    $transaction->Amount = $request->Amount;
    $transaction->Description = $request->Description;
    $transaction->Date = $request->Date;
    $transaction->save();
    return redirect('/useralltransactions');
}

public function Deletetransaction($id)
{
    $transaction = Transaction::findOrFail($id);
    $transaction->delete();
    return redirect('/useralltransactions');


}

public function Userdashboardanalytics()
{
    $userId = auth()->id();

    $totalIncome = Transaction::where('user_id', $userId)
        ->whereHas('category', function ($query) {
            $query->where('type', 'income');
        })
        ->sum('Amount');

    $totalExpenses = Transaction::where('user_id', $userId)
        ->whereHas('category', function ($query) {
            $query->where('type', 'expense');
        })
        ->sum('Amount');

    $totalTransactions = Transaction::where('user_id', $userId)->count();

    return view('User.Dashboardanalytics', compact('totalIncome', 'totalExpenses', 'totalTransactions'));
}

 public function Addbudget()
{
    $admin = User::where('userrole', 'admin')->first();

    if ($admin) {

        $categories = Category::where('type', 'Expense')
            ->where(function ($query) use ($admin) {

                $query->where('user_id', auth()->id())
                    ->orWhere('user_id', $admin->id);

            })
            ->get();

    } else {

        $categories = Category::where('user_id', auth()->id())
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
            ->with('error', 'A budget for this category already exists.');

    }

    $budget = new Budget();

    $budget->user_id = auth()->id();
    $budget->category_id = $request->category_id;
    $budget->LimitAmount = $request->LimitAmount;

    $budget->save();

    return redirect('/userallbudgets')
        ->with('success', 'Budget created successfully.');
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

    $admin = User::where('userrole', 'admin')->first();

    if ($admin) {

        $categories = Category::where('type', 'Expense')
            ->where(function ($query) use ($admin) {

                $query->where('user_id', auth()->id())
                    ->orWhere('user_id', $admin->id);

            })
            ->get();

    } else {

        $categories = Category::where('user_id', auth()->id())
            ->where('type', 'Expense')
            ->get();

    }

    return view('User.Editbudget', compact(
        'budget',
        'categories'
    ));
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

        return redirect('/editbudget/' . $id)
            ->with('error', 'A budget for this category already exists.');

    }

    $budget->category_id = $request->category_id;
    $budget->LimitAmount = $request->LimitAmount;

    $budget->save();

    return redirect('/userallbudgets')
        ->with('success', 'Budget updated successfully.');
}


public function Deletebudget($id)
{
    $budget = Budget::where('user_id', auth()->id())
        ->findOrFail($id);

    $budget->delete();

    return redirect('/userallbudgets')
        ->with('success', 'Budget deleted successfully.');
}

public function Allannouncenments()
{
    $announcements = Adminannouncement::where('Status', true)->get();
    return view('User.Allannouncements', compact('announcements'));
}





public function Userreports(Request $request)
{
    $month = $request->month;

    if (!$month) {
        $month = date('Y-m');
    }

    $transactions = Transaction::where('user_id', auth()->id())
        ->whereMonth('Date', date('m', strtotime($month)))
        ->whereYear('Date', date('Y', strtotime($month)))
        ->get();

    $income = 0;
    $expense = 0;

    foreach ($transactions as $transaction) {

        $category = Category::find($transaction->category_id);

        if ($category && $category->type == 'Income') {
            $income = $income + $transaction->Amount;
        }

        if ($category && $category->type == 'Expense') {
            $expense = $expense + $transaction->Amount;
        }
    }

    $balance = $income - $expense;

    return view('User.Userreports', compact(
        'transactions',
        'income',
        'expense',
        'balance',
        'month'
    ));
}


public function userreportpdf(Request $request)
{
    $filter = $request->filter;

    if (!$filter) {
        $filter = 'monthly';
    }

    $transactions = Transaction::where('user_id', auth()->id());

    if ($filter == 'daily') {

        $date = $request->date;

        if (!$date) {
            $date = date('Y-m-d');
        }

        $transactions->whereDate('Date', $date);
    }

    if ($filter == 'weekly') {

        $start = date('Y-m-d', strtotime('monday this week'));
        $end = date('Y-m-d', strtotime('sunday this week'));

        $transactions->whereBetween('Date', [$start, $end]);
    }

    if ($filter == 'monthly') {

        $month = $request->month;

        if (!$month) {
            $month = date('Y-m');
        }

        $start = $month . '-01';
        $end = date('Y-m-t', strtotime($start));

        $transactions->whereBetween('Date', [$start, $end]);
    }

    $transactions = $transactions->get();

    $income = 0;
    $expense = 0;

    foreach ($transactions as $transaction) {

        $category = Category::find($transaction->category_id);

        if ($category && $category->type == 'Income') {
            $income = $income + $transaction->Amount;
        }

        if ($category && $category->type == 'Expense') {
            $expense = $expense + $transaction->Amount;
        }
    }

    $balance = $income - $expense;

    $pdf = Pdf::loadView('User.Reportpdf', compact(
        'transactions',
        'income',
        'expense',
        'balance',
        'filter'
    ));

    return $pdf->download('Userreports.pdf');
}


public function Userinsights()
{
    $userId = auth()->id();

    $transactions = Transaction::where('user_id', $userId)->get();

    $income = 0;
    $expense = 0;

    foreach ($transactions as $transaction) {

        $category = Category::find($transaction->category_id);

        if ($category && $category->type == 'Income') {
            $income = $income + $transaction->Amount;
        }

        if ($category && $category->type == 'Expense') {
            $expense = $expense + $transaction->Amount;
        }
    }

    $balance = $income - $expense;

    $user = User::find($userId);

    $savingsGoal = $user->Savingsgoal;

    $remainingGoal = $savingsGoal - $balance;

    if ($remainingGoal < 0) {
        $remainingGoal = 0;
    }

    $highestCategory = 'No expense yet';
    $highestAmount = 0;

    $categories = Category::where('type', 'Expense')->get();

    foreach ($categories as $category) {

        $categoryAmount = 0;

        foreach ($transactions as $transaction) {

            if ($transaction->category_id == $category->id) {
                $categoryAmount = $categoryAmount + $transaction->Amount;
            }
        }

        if ($categoryAmount > $highestAmount) {
            $highestAmount = $categoryAmount;
            $highestCategory = $category->Name;
        }
    }

    if ($income > 0) {
        $expensePercentage = ($expense / $income) * 100;
    } else {
        $expensePercentage = 0;
    }


    if ($expense > $income && $income > 0) {

        $summary = 'Your expenses are higher than your income.';

        $tip = 'Try to reduce unnecessary expenses and keep track of your spending.';

    } elseif ($balance >= $savingsGoal && $savingsGoal > 0) {

        $summary = 'You have reached your savings goal.';

        $tip = 'Keep maintaining your spending habits and continue saving.';

    } elseif ($expensePercentage <= 50 && $income > 0) {

        $summary = 'Your expenses are below half of your income.';

        $tip = 'You can use some of your remaining balance towards your savings goal.';

    } elseif ($income > 0) {

        $summary = 'You are spending a significant part of your income.';

        $tip = 'Review your expenses and try to reduce unnecessary spending.';

    } else {

        $summary = 'No income data available yet.';

        $tip = 'Add your income and expense transactions to get financial insights.';
    }


    // Save or update insight

    $insight = Insight::where('user_id', $userId)->first();

    if (!$insight) {

        $insight = new Insight();

        $insight->user_id = $userId;
    }

    $insight->Summary = $summary;
    $insight->Tips = $tip;

    $insight->save();


    return view('User.Userinsights', compact(
        'income',
        'expense',
        'balance',
        'savingsGoal',
        'remainingGoal',
        'highestCategory',
        'highestAmount',
        'expensePercentage',
        'insight'
    ));
}

public function Allscheduledtransactions()
{
    $userId = auth()->id();

    if (!$userId) {
        return redirect('/login');
    }

    $scheduledTransactions = Scheduledtransaction::where('user_id', $userId)
        ->with('category')
        ->latest()
        ->get();

    $admin = User::where('userrole', 'admin')->first();

    if ($admin) {

        $categories = Category::where(function ($query) use ($admin, $userId) {

            $query->where('user_id', $userId)
                ->orWhere('user_id', $admin->id);

        })->get();

    } else {

        $categories = Category::where('user_id', $userId)
            ->get();
    }

    foreach ($scheduledTransactions as $scheduled) {

        if ($scheduled->Status == true) {

            while ($scheduled->NextDate <= date('Y-m-d')) {

                $existingTransaction = Transaction::where('user_id', $userId)
                    ->where('category_id', $scheduled->category_id)
                    ->where('Amount', $scheduled->Amount)
                    ->where('Description', $scheduled->Description)
                    ->where('Date', $scheduled->NextDate)
                    ->first();

                if (!$existingTransaction) {

                    $transaction = new Transaction();

                    $transaction->user_id = $userId;
                    $transaction->category_id = $scheduled->category_id;
                    $transaction->Amount = $scheduled->Amount;
                    $transaction->Description = $scheduled->Description;
                    $transaction->Date = $scheduled->NextDate;

                    $transaction->save();
                }

                if ($scheduled->Frequency == 'Daily') {

                    $scheduled->NextDate = date(
                        'Y-m-d',
                        strtotime($scheduled->NextDate . ' +1 day')
                    );

                } elseif ($scheduled->Frequency == 'Weekly') {

                    $scheduled->NextDate = date(
                        'Y-m-d',
                        strtotime($scheduled->NextDate . ' +1 week')
                    );

                } elseif ($scheduled->Frequency == 'Monthly') {

                    $scheduled->NextDate = date(
                        'Y-m-d',
                        strtotime($scheduled->NextDate . ' +1 month')
                    );

                } elseif ($scheduled->Frequency == 'Yearly') {

                    $scheduled->NextDate = date(
                        'Y-m-d',
                        strtotime($scheduled->NextDate . ' +1 year')
                    );
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
    $admin = User::where('userrole', 'admin')->first();

    if ($admin) {

        $categories = Category::where(function ($query) use ($admin) {

            $query->where('user_id', auth()->id())
                ->orWhere('user_id', $admin->id);

        })->get();

    } else {

        $categories = Category::where('user_id', auth()->id())
            ->get();
    }

    return view(
        'User.Addscheduledtransaction',
        compact('categories')
    );
}


public function Addscheduledtransactionlogic(Request $request)
{
    $scheduled = new Scheduledtransaction();

    $scheduled->user_id = auth()->id();
    $scheduled->category_id = $request->category_id;
    $scheduled->Amount = $request->Amount;
    $scheduled->Description = $request->Description;
    $scheduled->StartDate = $request->StartDate;
    $scheduled->Frequency = $request->Frequency;
    $scheduled->NextDate = $request->StartDate;
    $scheduled->Status = true;

    $scheduled->save();

    return redirect('/userallscheduledtransactions')
        ->with(
            'success',
            'Scheduled transaction created successfully.'
        );
}


public function Editscheduledtransaction($id)
{
    $scheduled = Scheduledtransaction::where('user_id', auth()->id())
        ->findOrFail($id);

    $admin = User::where('userrole', 'admin')->first();

    if ($admin) {

        $categories = Category::where(function ($query) use ($admin) {

            $query->where('user_id', auth()->id())
                ->orWhere('user_id', $admin->id);

        })->get();

    } else {

        $categories = Category::where('user_id', auth()->id())
            ->get();
    }

    return view(
        'User.Editscheduledtransaction',
        compact('scheduled', 'categories')
    );
}


public function Updatescheduledtransaction(Request $request, $id)
{
    $scheduled = Scheduledtransaction::where('user_id', auth()->id())
        ->findOrFail($id);

    $scheduled->category_id = $request->category_id;
    $scheduled->Amount = $request->Amount;
    $scheduled->Description = $request->Description;
    $scheduled->StartDate = $request->StartDate;
    $scheduled->Frequency = $request->Frequency;

    $scheduled->NextDate = $request->StartDate;

    $scheduled->save();

    return redirect('/userallscheduledtransactions')
        ->with(
            'success',
            'Scheduled transaction updated successfully.'
        );
}


public function Deletescheduledtransaction($id)
{
    $scheduled = Scheduledtransaction::where('user_id', auth()->id())
        ->findOrFail($id);

    $scheduled->delete();

    return redirect('/userallscheduledtransactions')
        ->with(
            'success',
            'Scheduled transaction deleted successfully.'
        );
}


public function Togglescheduledtransaction($id)
{
    $scheduled = Scheduledtransaction::where('user_id', auth()->id())
        ->findOrFail($id);

    if ($scheduled->Status == true) {

        $scheduled->Status = false;

    } else {

        $scheduled->Status = true;
    }

    $scheduled->save();

    return redirect('/userallscheduledtransactions')
        ->with(
            'success',
            'Scheduled transaction status updated.'
        );
}



}