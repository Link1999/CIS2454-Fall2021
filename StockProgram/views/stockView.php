
<h2>Add Stock</h2>
<form action="stock.php" method="post">
    <div>
        <label>Symbol</label>
        <input type="text" name="symbol"/></br> 
        <label>Name</label>
        <input type="text" name="name"/></br> 
        <label>Current Price</label>
        <input type="text" name="current_price"></br> 
    </div>
    <div>
        <input type='hidden' name='action' value='add_stock'/>
        <input type='submit' value='Add Stock'/></br>
    </div>
</form>

<h2>Update Stock</h2>
<form action="stock.php" method="post">
    <div>
        <label>Symbol</label>
        <input type="text" name="symbol"/></br> 
        <label>Name</label>
        <input type="text" name="name"/></br> 
        <label>Current Price</label>
        <input type="text" name="current_price"></br> 
    </div>
    <div>
        <input type='hidden' name='action' value='update_stock'/>
        <input type='submit' value='Update Stock'/></br>
    </div>
</form>


<h2>Delete Person</h2>
<form action="stock.php" method="post">
    <div>
        <label>Symbol</label>
        <input type="text" name="symbol"/></br> 
    </div>
    <div>
        <input type='hidden' name='action' value='delete_stock'/>
        <input type='submit' value='Delete Stock'/></br>
    </div>
</form>


</body>
</html>