
<h2>Add Transaction</h2>
<form action="transaction.php" method="post">
    <div>
        <?php include("views/personSelector.php"); ?></br>
        <label>Symbol</label>
        <input type="text" name="symbol"/></br>   
        <label>Quantity</label>
        <input type="text" name="quantity"/></br> 
    </div>
    <div>
        <input type='hidden' name='action' value='add_transaction'/>
        <input type='submit' value='Add Transaction'/></br>
    </div>
</form>

<h2>Update Stock</h2>
<form action="transaction.php" method="post">
    <div>
        <label>ID</label>
        <input type="text" name="id"/></br> 
        <?php include("views/personSelector.php"); ?></br> 
        <label>Symbol</label>
        <input type="text" name="symbol"/></br>   
        <label>Quantity</label>
        <input type="text" name="quantity"/></br> 
        <label>Purchase Price</label>
        <input type="text" name="purchase_price"/></br>
        <label>datetime</label>
        <input type="text" name="datetime"/></br> 
    </div>
    <div>
        <input type='hidden' name='action' value='update_transaction'/>
        <input type='submit' value='Update Transaction'/></br>
    </div>
</form>


<h2>Delete Transaction</h2>
<form action="transaction.php" method="post">
    <div>
        <label>ID</label>
        <input type="text" name="id"/></br> 
    </div>
    <div>
        <input type='hidden' name='action' value='delete_transaction'/>
        <input type='submit' value='Delete Transaction'/></br>
    </div>
</form>


</body>
</html>