<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Income;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Collection;

class FinanceController extends Controller
{
    public function index(){

        $expense = Expense::orderBy('created_at', 'desc')->limit(3)->get();
        $income = Income::orderBy('created_at', 'desc')->limit(3)->get();

        return view('finance.index', compact('expense', 'income'));
    }

    public function expenseStore(Request $request)
    {   
        if ($request->repetedespesa > 1) {

            $repeat = Collection::times($request->repetedespesa, function ($index) {
                return $index; // Valor opcional a ser retornado para cada item da coleção
            });

            $expensecollection = Collection::empty();

            foreach ($repeat as $r) {
                $expenserepeat = new Expense;

                $expenserepeat->description = $request->descricaodespesa;        
                $expenserepeat->value = $request->valordespesa/$request->repetedespesa;
                $repeatoken = Uuid::uuid4()->toString();

                if ($r > 1) {
                    $expenserepeat->date = Carbon::parse($request->datadespesa)->addMonths($r-1);
                } else {
                    $expenserepeat->date = Carbon::parse($request->datadespesa);
                }
                $expenserepeat->repeatoken = $repeatoken;
                $expenserepeat->repeat = $r;
                
                $expensecollection->push($expenserepeat);
            }
            
            foreach ($expensecollection as $ec) {
                $ec->save();
            }
        } else {
            $expense = new Expense;

            $expense->description = $request->descricaodespesa;        
            $expense->value = $request->valordespesa;
            $expense->date = Carbon::parse($request->datadespesa);
            $repeatoken = Uuid::uuid4()->toString();
            $expense->repeatoken = $repeatoken;
            $expense->repeat = $request->repetedespesa;
            $expense->save();
        }        
 
        return redirect()->back();
    }

    public function incomeStore(Request $request)
    {        
        $income = new Income;
        $income->description = $request->descricaoreceita;
        $income->value = $request->valorreceita;
        $income->date = Carbon::parse($request->datareceita);
 
        $income->save();
 
        return redirect()->back();
    }
}
