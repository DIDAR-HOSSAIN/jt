<?php

namespace App\Http\Controllers;

use App\Balancebd;
use App\Balancecash;
use App\Expense;
use App\Income;
use App\Incomecategory;
use App\Virtualbd;
use App\Virtualcash;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use PDF;
class ReportController extends Controller
{

    public function searchCommission()
    {
        return view('backend.reports.commissions.search');
    }

    public function commmissions(Request $request)
    {
        $fromDate = date('Y-m-d', strtotime($request->fromDate));
        $tillDate = date('Y-m-d', strtotime($request->tillDate));

        $commissions = Income::whereBetween('date', [$fromDate, $tillDate])
            ->whereIn('income_type',['Deposit Commission','ORO Commission','KYC Commission', 'Rocket Commission'])
            ->get()

            ->groupBy('income_type')->map(function ($item){
                return $item->sum('income_amount');
            });
        $total =array_sum($commissions->toArray());
        $pdf = PDF::loadView('backend.reports.commissions.pdfCommissionSummary',compact('commissions','fromDate', 'tillDate', 'total'));
        return $pdf->stream('Commission.pdf');
    }


    public function incomeExpenseStm()
    {
        return view('backend.reports.income-expenseStatements.search');
    }

    public function incomeExpenseStatement(Request $request)
    {
        $fromDate = date('Y-m-d', strtotime($request->fromDate));
        $tillDate = date('Y-m-d', strtotime($request->tillDate));
        $incomeData = Income::whereBetween('date', [$fromDate, $tillDate])->where('commission', true)->orderBy('date')->get();
        $expenseData = Expense::whereBetween('date', [$fromDate, $tillDate])->orderBy('date')->get();
        $combineData =$incomeData->concat($expenseData)->sortBy('date');
        $combineGroup = $combineData->groupBy('date');

//        return view('backend.reports.income-expenseStatements.statements', compact('combineGroup'));
        $pdf = PDF::loadView('backend.reports.income-expenseStatements.pdfIncomeExpenseStatement', compact('combineGroup','fromDate','tillDate'));
        return $pdf->stream('Income Expense Statement.pdf');

    }


    public function searchIncomeExpense()
    {
        return view('backend.reports.income-expenseSummary.search');
    }

    public function incomeExpenseSummary(Request $request)
    {
        $fromDate =$request->fromDate ? date('Y-m-d', strtotime($request->fromDate)) : null;
        $tillDate = $request->tillDate ? date('Y-m-d', strtotime($request->tillDate)) : null;

        $bankCommission = Income::whereBetween('date', [$fromDate, $tillDate])
            ->whereIn('income_type',['Deposit Commission','ORO Commission','KYC Commission'])
            ->get()
            ->sum('income_amount');

        $rocketCommission = Income::whereBetween('date', [$fromDate, $tillDate])
            ->where('income_type','Rocket Commission')->get()->sum('income_amount');

        $expenseAmount = Expense::whereBetween('date', [$fromDate, $tillDate])->sum('expense_amount');
        $profit = ($bankCommission + $rocketCommission) - $expenseAmount;

//        dd($bankCommission, $rocketCommission, $expenseAmount);
        $pdf = PDF::loadView('backend.reports.income-expenseSummary.pdfIncomeExpenseSummary',compact('bankCommission', 'rocketCommission',  'expenseAmount', 'profit', 'fromDate', 'tillDate'));
        return $pdf->stream('Income Expense Summary.pdf');
    }

    public function expenseSearch()
    {
        return view('backend.reports.expense_summary.search');
    }

    public function expenseSummary(Request $request)
    {
        $fromDate = date('Y-m-d', strtotime($request->fromDate));
        $tillDate = date('Y-m-d', strtotime($request->tillDate));
        $expenseData = Expense::whereBetween('date', [$fromDate,$tillDate])->get();
        $expenseReports = $expenseData->mapToGroups(function($item){
            return [$item['expense_type']=>$item['expense_amount']];
        })->map(function ($item){
            return $item->sum();
        });
//        dd($expenseReports);
        $total = $expenseData->sum('expense_amount');
//        $total = $expenseReports;

//        return view('backend.reports.detail_expense_summary.summary',compact('expenseData', 'total','formDate','tillDate'));
        $pdf = PDF::loadView('backend.reports.expense_summary.PdfExpensesSummary',compact('expenseReports', 'total','fromDate','tillDate'));
        return $pdf->stream('Document.pdf');
    }



    public function expSearch()
    {
        return view('backend.reports.detail_expense_summary.search');
    }

    public function expSummary(Request $request)
    {
        $fromDate = date('Y-m-d', strtotime($request->fromDate));
        $tillDate = date('Y-m-d', strtotime($request->tillDate));
        $expensesData = Expense::whereBetween('date', [$fromDate,$tillDate])->get();
//        $expenseReports = $expenseData->mapToGroups(function($item){
//            return [$item['expense_type']=>$item['expense_amount']];
//        })->map(function ($item){
//            return $item->sum();
//        });
        $total = $expensesData->sum('expense_amount');

//        return view('backend.reports.expense_summary.summary',compact('expenseData', 'total','formDate','tillDate'));
        $pdf = PDF::loadView('backend.reports.detail_expense_summary.PdfExpensesSummary',compact('expensesData', 'total','fromDate','tillDate'));
        return $pdf->stream('Document.pdf');
    }


}
