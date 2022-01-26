<?php include('server.php');  


if(empty($_SESSION['username'])){
    header('location: login.php');
}

?>

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
    <div class="header">
        <h2>Home Page</h2>
    </div>

    <div class="content">
        <?php if (isset($_SESSION['success'])): ?>
            <div class = "error success">
                <h3>
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>

        <?php if (isset($_SESSION['username'])): ?>
            <p>Welcome <strong><?php echo $_SESSION['username'] ?></strong></p>
            <p><a href="index.php?logout='1" style="color: red;">Logout</a></p>
        <?php endif ?>
    </div>
 ,
</body>
</html>