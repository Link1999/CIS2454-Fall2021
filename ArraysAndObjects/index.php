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
        <?php
        $list_of_foods = array('Burrito', 'Lasagna', 'Ice cream', 'coke', 'baloney');
        print_r($list_of_foods)
        ?>
        </br>
        <?php
        echo "I'm hungry for {$list_of_foods[3]}";
        unset($list_of_foods[3]);

        foreach ($list_of_foods as $food) {
            echo "</br>food: {$food}";
        }

        for ($index = 0; $index < count($list_of_foods); $index++) {
            if (isset($list_of_foods[$index])) {
                echo "</br>food: {$list_of_foods[$index]}";
            }
        }

        echo "</br>";
        print_r($list_of_foods);
        $list_of_foods = array_values($list_of_foods);
        echo "</br>";
        print_r($list_of_foods);
        echo "there are " . count($list_of_foods) . " you are hungry for";

        $list_of_foods_with_prices = array(
            'Burrito' => 1.5,
            'Lasagna' => 7.5,
            'Ice cream' => 2.5,
            'coke' => 1,
            'baloney' => .5);
        
        echo "the cost of a coke is: " . $list_of_foods_with_prices['coke'];
        
        foreach ( $list_of_foods_with_prices as $food => $cost ){
            echo "</br>{$food} costs {$cost}";
        }
        
        $food = new Food("hot dog", 1.5);
        $cost = $food->getCost();
        
        ?>
    </body>
</html>
