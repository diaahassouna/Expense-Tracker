<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Expense::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'monthly_income' => 'required',
            'daily_income' => 'required',
            'fixed_expenses' => 'required',
            'variable_expenses' => 'required',
            'non_necessities_expenses' => 'required',
            'saving_plan_percentage' => 'required',
        ]);

        return Expense::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Expense::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        getBalance($request, $id);
        return Expense::find($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Expense::destroy($id);
    }
}

/**
     * Update the balance field in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function getBalance(Request $request, $id)
    {
        //Fetch from stored data [store method]
        
        
        //Declare Input Data into this method
        $MonthlyIncome = $request->get('monthly_income', 5000);
        $DailyIncome = $request->get('daily_income', 100);
        $FixedExpenses = $request->get('fixed_expenses', 2500);
        $VariableExpenses = $request->get('variable_expenses', 150);
        $NonNecessitiesExpenses = $request->get('non_necessities_expenses', 100);
        $SavingPlanPercentage = $request->get('saving_plan_percentage', 20);
        $Balance = $request->get('balance');

        $Income = $MonthlyIncome + $DailyIncome;
        $Expenses = $FixedExpenses + $VariableExpenses + $NonNecessitiesExpenses;

        //Calculate Output Data
        $Balance = $Income - $Expenses;

        //Create updated data as array
        $data = Expense::find($id)->update([
            'monthly_income' => $MonthlyIncome,
            'daily_income' => $DailyIncome,
            'fixed_expenses' => $FixedExpenses,
            'variable_expenses' => $VariableExpenses,
            'non_necessities_expenses' => $NonNecessitiesExpenses,
            'saving_plan_percentage' => $SavingPlanPercentage,
            'balance' => $Balance
        ]);

        return $data;
    }