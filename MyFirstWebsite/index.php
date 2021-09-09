<?php include('topNavigation.php'); echo "</br>"; ?>

        <form action="display.php" method="get">
            <div>
                <label>Enter your name</label>
                <input type="text" name="name"/></br> 
                <label>Enter your major</label>
                <input type="text" name="major"/></br> 
                <label>How much does 1 credit cost?</label>
                <input type="text" name="cost_per_credit"/></br> 
                <label>Enter the number of credits you are taking</label>
                <input type="text" name="number_of_credits"/></br> 
            </div>
            
            <div>
                <input type='submit' value='Click me!'/></br>
            </div>
        </form>
    </body>
</html>
