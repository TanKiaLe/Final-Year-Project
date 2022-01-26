<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/style4.css"></link> 
    <link rel="stylesheet" type="text/css" href="../CSS/style5.css"></link> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>SOS details List</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="home1.php">SOS Alarm</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            SOS Details & Profile
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="listsosdetails.php">List</a></li>
          </ul>
        </li>
      </ul>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Alarm Details
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="listalarm1.php">List</a></li>
            <li><a class="dropdown-item" href="addalarmdetails1.php">Add Alarm</a></li>
            <li><a class="dropdown-item" href="addzone2.php">Add Zone</a></li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Report
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="alarmdetailsreport.php">Alarm Details Report</a></li>
            <li><a class="dropdown-item" href="zonedetailsreport.php">Zone Details Report</a></li>
            <li><a class="dropdown-item" href="changealarmstatusreport.php">Change Alarm Status Report</a></li>
            <li><a class="dropdown-item" href="eventreport.php">Event Details Report</a></li>
          </ul>
        </li>
        </ul>
        <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Calender
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="calendar.php">Calender</a></li>
            <li><a class="dropdown-item" href="addevent.php">Add Event</a></li>
            <li><a class="dropdown-item" href="listevent.php">List Event</a></li>
          </ul>
        </li>
        </ul>
        <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Emergency
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><?php
                    $conn=new mysqli('localhost','root','','registration');
                    if($conn->connect_error) die("Fatal Error");
                    $user_id = $_SESSION['user_id'];
                    $query = "SELECT * FROM user where user_id='$user_id'";
                    $result = $conn->query($query);
                    while($row = $result->fetch_assoc()){ 
                      $user_id = $row['user_id'];
                      $username=$row['username'];
                      $email=$row['email'];
                      $emergencyemail=$row['emergencyemail'];
                      $CompanyName=$row['CompanyName'];
                      $Message=$row['Message'];
                      $Location=$row['Location'];
                      $ContactNumber=$row['ContactNumber'];
                      $DepartmentNumber=$row['DepartmentNumber'];
                      $image=$row['image'];
                    }
                ?> 

            <form action="home1.php" method="POST">
              <input type="hidden" value="<?php echo $username ; ?>" name="username" >
              <input type="hidden" value="<?php echo $emergencyemail ; ?>" name="emergencyemail" >
              <input type="hidden" class="form-control" value="<?php echo $email ; ?>" name="email">
              <input type="hidden" class="form-control" value="Emergancy Email" name="subject">
              <input type="hidden" class="form-control" value="<?php echo $Message ; ?>" name="Message">
              <button type="submit" name="sendemail" >Send Email</button>
          </form></li>
            <li><a class="dropdown-item" href="tel:+60<?php echo $_SESSION['ContactNumber'] ?>">Emergency Call</a></li>
            <li><a class="dropdown-item" href="tel:+60<?php echo $_SESSION['DepartmentNumber'] ?>">Department Call</a></li>
          </ul>
        </li>
        </ul>
        <ul><li ><a href="#"><br></a></li></ul><ul><li ><a href="#"><br></a></li></ul><ul><li ><a href="#"><br></a></li></ul><ul><li ><a href="#"><br></a></li></ul><ul><li ><a href="#"><br></a></li></ul><ul><li ><a href="#"><br></a></li></ul><ul><li ><a href="#"><br></a></li></ul><ul><li ><a href="#"><br></a></li></ul><ul><li ><a href="#"><br></a></li></ul><ul><li ><a href="#"><br></a></li></ul><ul><li ><a href="#"><br></a></li></ul><ul><li ><a href="#"><br></a></li></ul><ul><li ><a href="#"><br></a></li></ul><ul><li ><a href="#"><br></a></li></ul><ul><li ><a href="#"><br></a></li></ul><ul><li ><a href="#"><br></a></li></ul>
        
        
        <div class="upload">
              <img src="../img/<?php echo $image; ?>" width = 85 height = 75 title="<?php echo $image; ?>">
        </div>
        <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome <?php echo $_SESSION['username'] ?>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
          <li><a class="dropdown-item" href="login.php">Logout</a></li>
          </ul>
        </li>
        </ul>
    </div>
  </div>
</nav>

<?php
                    $conn=new mysqli('localhost','root','','registration');
                    if($conn->connect_error) die("Fatal Error");
                    $user_id = $_SESSION['user_id'];
                    $query = "SELECT * FROM user where user_id='$user_id'";
                    $result = $conn->query($query);                    
                    while($row = $result->fetch_assoc()){ 
                                $user_id = $row['user_id'];
                                $username=$row['username'];
							                  $email=$row['email'];
                                $emergencyemail=$row['emergencyemail'];
								                $CompanyName=$row['CompanyName'];
                                $Message=$row['Message'];
								                $Location=$row['Location'];
                                $ContactNumber=$row['ContactNumber'];
                                $DepartmentNumber=$row['DepartmentNumber'];
                                $image=$row['image'];
?> 
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
            <form class="form" id = "form" action="" enctype="multipart/form-data" method="post">
              <div class="upload">
              <img src="../img/<?php echo $image; ?>" width = 125 height = 125 title="<?php echo $image; ?>">
                <div class="round">
                    <input type="hidden" name="id" value="<?php echo $user_id; ?>">
                    <input type="hidden" name="name" value="<?php echo $username; ?>">
                    <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png">
                    <i class = "fa fa-camera" style = "color: #fff;"></i>
                </div>
              </div>
            </form>
            <script type="text/javascript">
                document.getElementById("image").onchange = function(){
                document.getElementById("form").submit();
                };
            </script>
              <span class="font-weight-bold"><?php echo $_SESSION['username'] ?></span>
              <span class="text-black-50"><?php echo $_SESSION['email'] ?></span>
              <span> </span>
            </div>  
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
            <form action="editsosdetails.php" method="POST">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">SOS Details Settings</h4>
                </div>
                <div class="row mt-2">
                    <input type="hidden" value="<?php echo $_SESSION['user_id'] ?>" name="user_id" >
                    <div class="col-md-6"><label class="labels">Name: </label><input type="text" READONLY class="form-control"  value="<?php echo $username; ?>"></div>                           
                    <div class="col-md-6"><label class="labels">Company Name: </label><input type="text" READONLY class="form-control"  value="<?php echo $CompanyName; ?>"></div>    
                  </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Company Address: </label><textarea READONLY class="form-control" name="Location"><?php echo $Location; ?></textarea></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Email: </label><input type="text" READONLY class="form-control"  value="<?php echo $email; ?>"></div>                           
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Emergency Email: </label><input type="text" READONLY class="form-control"  value="<?php echo $emergencyemail; ?>"></div>                           
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Contact Number: </label><input READONLY type="number" class="form-control" name="ContactNumber" value="<?php echo $ContactNumber; ?>"></div>
                    <div class="col-md-12"><label class="labels">SOS Department Contact Number: </label><input READONLY type="text" class="form-control" value="<?php echo $DepartmentNumber; ?>" name="DepartmentNumber"></div>
                </div>
                <div class="row mt-3">
                <div class="col-md-12"><label for="floatingTextarea">SOS Message: </label><textarea class="form-control" READONLY  name="Message"><?php echo $Message; ?></textarea></div>                    
                </div>
                <div class="mt-5 text-center"><a href="editsosdetails.php?edit=<?php echo $_SESSION['user_id'] ?>" class="btn btn-success editbtn">Edit Profile</a></div>
            </form>

            <?php } ?>
            </div>
        </div>
    </div>
</div>


</body>
</html>