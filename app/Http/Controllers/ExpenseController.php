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
            'balance' => 'required',
        ]);

        //Declare Input Data into this method
        $MonthlyIncome = $request->get('monthly_income');
        $DailyIncome = $request->get('daily_income');
        $FixedExpenses = $request->get('fixed_expenses');
        $VariableExpenses = $request->get('variable_expenses');
        $NonNecessitiesExpenses = $request->get('non_necessities_expenses');
        $SavingPlanPercentage = $request->get('saving_plan_percentage');
        $Balance = $request->get('balance');

        $Income = $MonthlyIncome + $DailyIncome;
        $Expenses = $FixedExpenses + $VariableExpenses + $NonNecessitiesExpenses;

        //Calculte Output Data
        $Balance = $Income - $expenses;
        
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
