<?php
    // htmlspecialchars should be used for any text 
    // that you will echo to the requester
    $name = htmlspecialchars($_GET['name']);
    $major = htmlspecialchars($_GET['major']);
    $cost_per_credit = $_GET['cost_per_credit'];
    $number_of_credits = $_GET['number_of_credits'];
    
    $total_cost = $cost_per_credit * $number_of_credits;
    $total_cost_formatted = "$" . number_format($total_cost, 2);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        Hi there <?php echo $name; ?> </br>
        Your major is: <?php echo $major; ?></br>
        The cost for this semester is: <?php echo $total_cost_formatted; ?></br>
    </body>
</html>

