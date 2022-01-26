<?php include('server.php');  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Register</title>
    <link rel="stylesheet" type="text/css" href="../CSS/style1.css"></link>
</head>
<body>
    <form method="post" action="register.php">
    <div class="login-box">
        <?php include('errors.php'); ?>
        <h1>Register</h1>
        <div class="textbox">
            <i class="fa fa-user" aria-hidden="true"></i>
            <input type="text" placeholder="Username" name="username" value="">
        </div>

        <div class="textbox" >
        <i class="fa fa-lock" aria-hidden="true"></i>
            <input type="text" placeholder="Email" name="email" value="">
        </div>

        <div class="textbox" >
        <i class="fa fa-lock" aria-hidden="true"></i>
            <input type="text" placeholder="Company Name" name="CompanyName" value="">
        </div>

        <div class="textbox" >
        <i class="fa fa-lock" aria-hidden="true"></i>
            <input type="password" placeholder="Password" name="password_1" value="">
        </div>

        <div class="textbox" >
        <i class="fa fa-lock" aria-hidden="true"></i>
            <input type="password" placeholder="Comfirm Password" name="password_2" value="">
        </div>
        <input class="btn" type="submit" name="register" value="Submit" >

        <div class="textbox" >
        <p>Already a member? <a href="login.php" class="signup">Sign in</a> </p>
        </div>

    </div>
    </form>

</body>
</html>