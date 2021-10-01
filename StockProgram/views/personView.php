
<h2>Add Person</h2>
<form action="people.php" method="post">
    <div>
        <label>First Name</label>
        <input type="text" name="first_name"/></br> 
        <label>Last Name</label>
        <input type="text" name="last_name"/></br> 
        <label>Balance</label>
        <input type="text" name="balance"/></br> 
    </div>
    <div>
        <input type='hidden' name='action' value='add_person'/>
        <input type='submit' value='Add Person'/></br>
    </div>
</form>

<h2>Update Person</h2>
<form action="people.php" method="post">
    <div>
        <?php include("views/personSelector.php"); ?></br>
        <label>First Name</label>
        <input type="text" name="first_name"/></br> 
        <label>Last Name</label>
        <input type="text" name="last_name"/></br> 
        <label>Balance</label>
        <input type="text" name="balance"/></br> 
    </div>
    <div>
        <input type='hidden' name='action' value='update_person'/>
        <input type='submit' value='Update Person'/></br>
    </div>
</form>


<h2>Delete Person</h2>
<form action="people.php" method="post">
    <div>
        <?php include("views/personSelector.php"); ?></br>
    </div>
    <div>
        <input type='hidden' name='action' value='delete_person'/>
        <input type='submit' value='Delete Person'/></br>
    </div>
</form>

<h2>Transfer from Person's Balance</h2>
<form action="people.php" method="post">
    <div>
        <?php include("views/personSelector.php"); ?>
        <input type="radio" name="transfer_method" value="deposit"/>Deposit
        <input type="radio" name="transfer_method" value="withdraw"/>Withdraw</br>
        <label>Amount</label>
        <input type="text" name="amount"/></br> 
    </div>
    <div>
        <input type='hidden' name='action' value='transfer'/>
        <input type='submit' value='Transfer Money'/></br>
    </div>
</form>


</body>
</html>

