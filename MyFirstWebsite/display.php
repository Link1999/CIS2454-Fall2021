<?php
// htmlspecialchars should be used for any text 
// that you will echo to the requester
// filter input gives defaults of null for string 0 for numerics, 
// if it's not defined or doesn't validate

$name = htmlspecialchars(filter_input(INPUT_GET, 'name'));
$major = htmlspecialchars(filter_input(INPUT_GET, 'major'));
$cost_per_credit = filter_input(INPUT_GET, 'cost_per_credit', FILTER_VALIDATE_FLOAT);
$number_of_credits = filter_input(INPUT_GET, 'number_of_credits', FILTER_VALIDATE_FLOAT);

$total_cost = $cost_per_credit * $number_of_credits;
$total_cost_formatted = "$" . number_format($total_cost, 2);
?>
<?php include('topNavigation.php'); echo "</br>"; ?>
        <!-- 
        quotes will do automatic variable substitutions 
            apostrophes will not 
        -->

        <?php
        if (empty($name) || empty($major) ||
                $cost_per_credit == 0 || $number_of_credits == 0) {
            echo "Please go back and enter values";
        } else {

            echo "Hi there $name</br>";
            echo "Your major is: $major </br>";
            echo "The cost for this semester is: $total_cost_formatted</br>";
        }
        ?>
    </body>
</html>

