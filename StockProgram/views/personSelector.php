<label>Person</label>
<select name="id">
    <?php foreach ($people as $person) { ?>
        <option value=<?php echo $person['id']; ?> > <?php echo $person['first_name'] . " " . $person['last_name']; ?></option>
    <?php } ?>
</select>
