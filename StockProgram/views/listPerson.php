 
<?php include('views/topNavigation.php'); ?>

</br>


<table>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Balance</th>
    </tr>

<?php foreach ($people as $person) { ?>
    <tr>
        <td><?php echo $person->getId() ?></td>
        <td><?php echo $person->getFirstName() ?></td>
        <td><?php echo $person->getLastName() ?></td>
        <td><?php echo $person->getBalance() ?></td>
    </tr>
<?php } ?>
</table>

<h2>Search by last name</h2>
<form action="people.php" method="get">
    <div> 
        <label>Last Name</label>
        <input type="text" name="last_name"/></br> 
    </div>
    <div>
        <input type='submit' value='Search People'/></br>
    </div>
</form>
