<?php 

include('views/topNavigation.php');
?>
<h2>Welcome to our Stock Program site</h2>

<h2>Login</h2>
<form action="login.php" method="post">
    <div>
        <label>Username</label>
        <input type="text" name="username"/></br> 
        <label>Password</label>
        <input type="password" name="password"/></br> 
    </div>
    <div>
        <input type='hidden' name='action' value='login'/>
        <input type='submit' value='Login'/></br>
    </div>
</form>


<h2>Create Account</h2>
<form action="login.php" method="post">
    <div>
        <label>Username</label>
        <input type="text" name="username"/></br> 
        <label>First Name</label>
        <input type="text" name="first_name"/></br> 
        <label>Last Name</label>
        <input type="text" name="last_name"/></br> 
        <label>Password</label>
        <input type="password" name="password"/></br> 
    </div>
    <div>
        <input type='hidden' name='action' value='create_account'/>
        <input type='submit' value='Create Account'/></br>
    </div>
</form>