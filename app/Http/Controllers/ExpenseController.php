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
        //Declare Input Data into this method
        $MonthlyIncome = Expense::find($id)->value('monthly_income');
        $DailyIncome = Expense::find($id)->value('daily_income');
        $FixedExpenses = Expense::find($id)->value('fixed_expenses');
        $VariableExpenses = Expense::find($id)->value('variable_expenses');
        $NonNecessitiesExpenses = Expense::find($id)->value('non_necessities_expenses');
        $SavingPlanPercentage = Expense::find($id)->value('saving_plan_percentage');
        $Balance = Expense::find($id)->value('balance');

        //Calculate Output Data
        $Balance = $MonthlyIncome + $DailyIncome - ($FixedExpenses + $VariableExpenses + $NonNecessitiesExpenses);

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