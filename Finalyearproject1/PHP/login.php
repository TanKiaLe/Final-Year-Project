<?php include('server.php');  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" type="text/css" href="../CSS/style1.css"></link>
</head>
<body>
    <form method="post" action="login.php" class="form1">
    <div class="login-box">
        <?php include('errors.php'); ?>
        <h1>User Login</h1>
        <div class="textbox">
            <i class="fa fa-user" aria-hidden="true"></i>
            <input type="text" placeholder="Username" name="username" value="">
        </div>

        <div class="textbox" >
        <i class="fa fa-lock" aria-hidden="true"></i>
            <input type="password" placeholder="Password" name="password" value="">
        </div>

        <input class="btn" type="submit" name="login" value="Sign in" href>

        <div class="textbox" >
        <p>Not yet a member? <a href="register.php" class="signup">Sign up</a> </p>
        </div>

    </div>
    </form>

</body>
</html>