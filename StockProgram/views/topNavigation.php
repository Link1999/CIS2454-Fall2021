
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <a href='index.php'>Home</a>


        <?php
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION['username'])) {
            ?>
            <a href='people.php'>Manage People</a>
            <a href='stock.php'>Manage Stocks</a>
            <a href='transaction.php'>Manage Transactions</a>  
            <?php
            echo "<a href='login.php'>Welcome " . $_SESSION['username'] . " click to logout</a>";
        } else {
            echo '<a href="login.php">Login</a>';
        }
        ?>
        
