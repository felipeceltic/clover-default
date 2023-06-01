<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\expenses;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function index(){

        $expense = Expense::orderBy('created_at', 'desc')->limit(3)->get();

        return view('finance.index', compact('expense'));
    }

    public function expenseStore(Request $request)
    {        
        $expense = new Expense;
        $expense->description = $request->descricaodespesa;
        $expense->value = $request->valordespesa;
        $expense->date = $request->datadespesa;
 
        $expense->save();
 
        return redirect()->back();
    }
}
