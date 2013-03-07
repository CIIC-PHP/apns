<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Login</title>
    </head>
    <body>
        <form action="<?php echo site_url('admin/login'); ?>" method="post">
            <fieldset>
                <legend>Login</legend>
                <label>Account:</label><input type="text" name="account" value="" />
                <label>Password:</label><input type="password" name="password" value="" />
                <input type="submit" name="submit" value="submit" />
            </fieldset>
        </form>
    </body>
</html>
