<!DOCTYPE html>


<?php
include('topNavigation.php')
;
echo "</br>";
?>
<h2>I'm an index page!</h2>

<h2>Add Person</h2>
<form action="addPerson.php" method="post">
    <div>
        <label>First Name</label>
        <input type="text" name="first_name"/></br> 
        <label>Last Name</label>
        <input type="text" name="last_name"/></br> 
        <label>Balance</label>
        <input type="text" name="balance"/></br> 
    </div>
    <div>
        <input type='submit' value='Add Person'/></br>
    </div>
</form>

<h2>Update Person</h2>
<form action="updatePerson.php" method="post">
    <div>
        <label>ID</label>
        <input type="text" name="id"/></br> 
        <label>First Name</label>
        <input type="text" name="first_name"/></br> 
        <label>Last Name</label>
        <input type="text" name="last_name"/></br> 
        <label>Balance</label>
        <input type="text" name="balance"/></br> 
    </div>
    <div>
        <input type='submit' value='Add Person'/></br>
    </div>
</form>


<h2>Delete Person</h2>
<form action="deletePerson.php" method="post">
    <div>
        <label>ID</label>
        <input type="text" name="id"/></br> 
    </div>
    <div>
        <input type='submit' value='Delete Person'/></br>
    </div>
</form>


</body>
</html>
