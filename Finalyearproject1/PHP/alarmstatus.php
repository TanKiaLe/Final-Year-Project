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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Alarm Status</title>
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

<div class="container1">

<table class="table table-hover">
                <thead>
                    <tr>
                        <h1>Zone Status</h1>
                        <th>Building Name</th>
                        <th>Floor</th>
                        <th>Room</th>
                        <th>Zone Name</th>
                        <th>Zone Status</th>
                        <th>Edit Status</th>
                    </tr>
                </thead>
                <?php
                    $conn=new mysqli('localhost','root','','registration');
                    if($conn->connect_error) die("Fatal Error");
                    $user_id = $_SESSION['user_id'];
                    $query = "SELECT * FROM alarmdetails INNER JOIN zone ON alarmdetails.aid=zone.aid where user_id='$user_id'";
                    $result = $conn->query($query);
                    while($row = $result->fetch_assoc()){ 
                                $id = $row['ID'];
                                $buildingname=$row['buildingname'];
								                $floor=$row['floor1'];
							                	$room=$row['room'];
                                $zonename=$row['zonename'];
								                $zonestatus=$row['zonestatus'];
                ?> 
                   
                    <tr>
                        <td><?php echo $buildingname;?></td>
                        <td><?php echo $floor;?></td>
                        <td><?php echo $room;?></td>
                        <td><?php echo $zonename;?></td>
                        <td><?php echo $zonestatus;?></td>
                        <td>
                            <a href="editstatus.php?edit=<?php echo $id; ?>"
                               class="btn btn-success editbtn">Edit</a>
                        </td>
                        <td>
                          <?php
                            if ($zonestatus == 'BellRing'){
                          ?>
                            <a  href="tel:+60<?php echo $_SESSION['ContactNumber'] ?>">Emergency Call</a>
                            <form action="alarmstatus.php" method="POST">
                              <input type="hidden" value="<?php echo $_SESSION['username'] ?>" name="username" >
                              <input type="hidden" class="form-control" value="<?php echo $_SESSION['email'] ?>" name="email">
                              <input type="hidden" class="form-control" value="Emergancy Email" name="subject">
                              <input type="hidden" class="form-control" value="<?php echo $_SESSION['Message'] ?>" name="Message">
                              <button type="submit" name="sendemail" >Send Emergency Email</button>
                            </form>
                            <?php }?>
                          </td>
                    </tr>
                    
                <?php } ?>
                
        </table>


</div>

</body>
</html>