<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Expense;
use App\Models\Income;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function indexReport(Request $request){
        
        $user = Auth::user();
        
        if ($request->datainicialdespesas == null && $request->datafinaldespesas == null) {
            $startDateExpenses = Carbon::now()->startOfMonth()->format('Y-m-d');
            $endDateExpenses = Carbon::now()->endOfMonth()->format('Y-m-d');
        } else {
            $startDateExpenses = $request->datainicialdespesas;
            if ($request->datafinaldespesas < $startDateExpenses) {
                $endDateExpenses = Carbon::parse($startDateExpenses)->endOfMonth()->format('Y-m-d');
            } else {
                $endDateExpenses = $request->datafinaldespesas;
            }            
        }

        if ($request->datainicialreceitas == null && $request->datafinalreceitas == null) {
            $startDateIncomes = Carbon::now()->startOfMonth()->format('Y-m-d');
            $endDateIncomes = Carbon::now()->endOfMonth()->format('Y-m-d');
        } else {
            $startDateIncomes = $request->datainicialreceitas;            
            if ($request->datafinalreceitas < $startDateIncomes) {
                $endDateIncomes = Carbon::parse($startDateIncomes)->endOfMonth()->format('Y-m-d');
            } else {
                $endDateIncomes = $request->datafinalreceitas;
            }
        }

        $expense = Expense::where('user_id', $user->id)
        ->whereBetween('date', [$startDateExpenses, $endDateExpenses])
        ->orderBy('created_at', 'desc')
        ->get();
        $income = Income::where('user_id', $user->id)
        ->whereBetween('date', [$startDateIncomes, $endDateIncomes])
        ->orderBy('created_at', 'desc')
        ->get();

        $totalExpense = Expense::where('user_id', $user->id)
        ->whereBetween('date', [$startDateExpenses, $endDateExpenses])
        ->sum('value');

        $totalIncome = Income::where('user_id', $user->id)
        ->whereBetween('date', [$startDateIncomes, $endDateIncomes])
        ->sum('value');

        return view('finance.reports', compact('income', 'expense', 'totalExpense', 'totalIncome', 'startDateIncomes', 'endDateIncomes', 'startDateExpenses', 'endDateExpenses'));
    }
}
