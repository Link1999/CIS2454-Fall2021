 
<?php include('views/topNavigation.php'); ?>

</br>

<table>
    <tr>
        <th>Symbol</th>
        <th>Name</th>
        <th>Current Price</th>
    </tr>

<?php foreach ($stocks as $stock) { ?>
    <tr>
        <td><?php echo $stock['symbol'] ?></td>
        <td><?php echo $stock['name'] ?></td>
        <td><?php echo $stock['current_price'] ?></td>
    </tr>
<?php } ?>
</table>
