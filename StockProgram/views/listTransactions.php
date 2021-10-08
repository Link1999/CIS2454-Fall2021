<?php include('views/topNavigation.php'); ?>

</br>

<table>
    <tr>
        <th>ID</th>
        <th>Person ID</th>
        <th>Symbol</th>
        <th>Purchase Price</th>
        <th>Quantity</th>
        <th>Date Time</th>
    </tr>

<?php foreach ($transactions as $transaction) { ?>
    <tr>
        <td><?php echo $transaction['id'] ?></td>
        <td><?php echo $transaction['person_id'] ?></td>
        <td><?php echo $transaction['symbol'] ?></td>
        <td><?php echo $transaction['purchase_price'] ?></td>
        <td><?php echo $transaction['quantity'] ?></td>
        <td><?php echo $transaction['datetime'] ?></td>
    </tr>
<?php } ?>
</table>


<h2>Search by person id</h2>
<form action="transaction.php" method="get">
    <div> 
        <label>Person ID</label>
        <input type="text" name="person_id"/></br> 
    </div>
    <div>
        <input type='submit' value='Search People'/></br>
    </div>
</form>
