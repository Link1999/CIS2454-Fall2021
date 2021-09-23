<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="calculate.php" method="get">
            <div>
                <label>Enter your name</label>
                <input type="text" name="name"/></br> 
                <label>Total Loan Amount</label>
                <input type="text" name="total_loan_amount"/></br> 
                <label>What is the yearly interest? like 3.5</label>
                <input type="text" name="yearly_interest_rate"/></br> 
                <label>What is the monthly payment</label>
                <input type="text" name="monthly_payment"/></br> 
            </div>
            
            <div>
                <input type='submit' value='Show me how long it takes to pay this off'/></br>
            </div>
        </form>
    </body>
</html>
