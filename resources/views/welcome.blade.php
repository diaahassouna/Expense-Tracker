<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>
    <link rel="stylesheet" href="{{ url('/css/style.css') }}">
</head>
<body>
    <div>
        <div>
            <h1>Expense Tracker</h1>
        </div>
        <div>
            <button id="button">Get API Data</button>
        </div>
        <div class="container">
            <form action="{{ route('expense.store') }}" method="post" id="form">
                @csrf
                <label for="monthly_income">Monthly Income:</label><br>
                <input type="text"  id="monthly_income" name="monthly_income"><br>
                <label for="daily_income">Daily Income:</label><br>
                <input type="text" id="daily_income" name="daily_income"><br>
                <label for="fixed_expenses">Fixed Expenses:</label><br>
                <input type="text" id="fixed_expenses" name="fixed_expenses"><br>
                <label for="variable_expenses">Variable Expenses:</label><br>
                <input type="text" id="variable_expenses" name="variable_expenses"><br>
                <label for="non_necessities_expenses">Non Necessities:</label><br>
                <input type="text" id="non_necessities_expenses" name="non_necessities_expenses"><br>
                <label for="saving_plan_percentage">Saving Plan Percentage:</label><br>
                <input type="text" id="saving_plan_percentage" name="saving_plan_percentage"><br>
                <div class="container">
                    <button type="submit" id="submit" value="Submit">Get Your Results</button>
                </div>
            </form>
        </div>
        <div>
            <script src="{{ url('/js/ajax.js') }}"></script>
        </div>
    </div>
</body>
</html>