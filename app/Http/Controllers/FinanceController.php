<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Income;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class FinanceController extends Controller
{
    public function index(){

        $user = Auth::user();

        $expense = Expense::where('user_id', $user->id)
        ->orderBy('created_at', 'desc')
        ->limit(3)
        ->get();
        $income = Income::where('user_id', $user->id)
        ->orderBy('created_at', 'desc')
        ->limit(3)
        ->get();

        return view('finance.index', compact('expense', 'income'));
    }

    public function expenseStore(Request $request)
    {   
        $user = Auth::user();

        if ($request->repetedespesa > 1) {

            $repeat = Collection::times($request->repetedespesa, function ($index) {
                return $index; // Valor opcional a ser retornado para cada item da coleção
            });

            $expensecollection = Collection::empty();

            foreach ($repeat as $r) {
                $expenserepeat = new Expense;

                $expenserepeat->user_id = $user->id;
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

            $expense->user_id = $user->id;
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
        $user = Auth::user();

        $income = new Income;

        $income->user_id = $user->id;
        $income->description = $request->descricaoreceita;
        $income->value = $request->valorreceita;
        $income->date = Carbon::parse($request->datareceita);
 
        $income->save();
 
        return redirect()->back();
    }
}
