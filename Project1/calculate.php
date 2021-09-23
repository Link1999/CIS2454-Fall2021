<?php

$name = htmlspecialchars(filter_input(INPUT_GET, 'name'));
$total_loan_amount = filter_input(INPUT_GET, 'total_loan_amount', FILTER_VALIDATE_FLOAT);
$yearly_interest_rate = filter_input(INPUT_GET, 'yearly_interest_rate', FILTER_VALIDATE_FLOAT);
$monthly_payment = filter_input(INPUT_GET, 'monthly_payment', FILTER_VALIDATE_FLOAT);

$monthly_interest = $total_loan_amount * $yearly_interest_rate / 100 / 12;

if ($monthly_interest >= $monthly_payment) {
    echo $name . " that's not a large enough monthly payment,"
    . " you have to pay at least "
    . ($monthly_payment + 1);
} else {
    $current_balance = $total_loan_amount;
    $month_count = 1;
    echo $name . ", here's your payment breakdown by month</br>";
    while ($current_balance > 0) {
        $current_balance += $current_balance * $yearly_interest_rate / 100 / 12;
        $current_balance -= $monthly_payment;
        echo "Month " . $month_count . ": new balance $" . $current_balance . "</br>";
        $month_count++;
    }
}