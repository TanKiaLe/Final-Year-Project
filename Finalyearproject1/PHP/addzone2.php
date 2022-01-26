<?php include('server.php'); ?>
<?php
   $conn=new mysqli('localhost','root','','registration');
   if($conn->connect_error) die("Fatal Error");
   $user_id = $_SESSION['user_id'];
   $query = "SELECT aid, buildingname FROM alarmdetails where user_id='$user_id'";
   $result = $conn->query($query);
?>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <title>Add Zone</title>
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

<div class="container">
	<div class="form-group">
  <form name="add_name" id="add_name" method="post">
    <table class="table table-hover" id="dynamic_field">
        <tr>
          <h1>Zone Details</h1>
          <th>Building Name</th>
          <th>Floor</th>
          <th>Room</th>
          <th>Zone Name</th>
          <th>Zone Status</th>
          <th>Zone Type</th>
          <th>Add / Remove</th>
        </tr>
        <tr><?php include('errors.php'); ?></tr>
        <tr>
            <td><select name="aid[]">
                <?php
                 $conn=new mysqli('localhost','root','','registration');
                 if($conn->connect_error) die("Fatal Error");
                 $user_id = $_SESSION['user_id'];
                 $query = "SELECT aid, buildingname FROM alarmdetails where user_id='$user_id'";
                 $result = $conn->query($query);
                  while($rows = $result->fetch_assoc()){
                      $aid = $rows['aid'];
                      $buildingname = $rows['buildingname'];
                      echo"<option value='$aid'>$buildingname</option>";
                  }
                ?>
            </select></td>
            <td><input type="text" name="floor[]" placeholder="Floor" class="form-control name_list" /></td>
            <td><input type="text" name="room[]" placeholder="Room" class="form-control name_list" /></td>
            <td><input type="text" name="zonename[]" placeholder="Zone name" class="form-control name_list" /></td>
            <td>
            <select name="zonestatus[]" >
              <option value="Normal">Normal</option>;
              <option value="BellSilence">Bell Silence</option>;
              <option value="BuzzerSilence">Buzzer Silence</option>;
              <option value="ZoneIsolate">Zone Isolate</option>;
            </select>
          </td>
            <td>
            <select name="zonetype[]" >
              <option value="Breakglass">Breakglass</option>;
              <option value="Smoke_detector">Smoke Detector</option>;
              <option value="Heat_detector">Heat Detector</option>;
              <option value="Breakglass,Smoke_detector">Breakglass & Smoke Detector</option>;
              <option value="Breakglass,Heat_detector">Breakglass & Heat Detector</option>;
              <option value="Heat_detector,Smoke_detector">Heat Detector & Smoke Detector</option>;
              <option value="Breakglass,Smoke_detector,Heat_detector">Breakglass & Smoke Detector & Heat Detector</option>;
            </select>
            </td>
            <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
        </tr>
      </table>
      <input type="submit" name="submit1" id="submit" class="btn btn-info" value="Submit" />
	  </form>
	</div>
	</div>

	</body>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
   
<script>

$(document).ready(function(){
	var i=0;
	$('#add').click(function(){
    
	i++;

  <?php
  $conn=new mysqli('localhost','root','','registration');
  if($conn->connect_error) die("Fatal Error");
  $user_id = $_SESSION['user_id'];
  $query = "SELECT aid, buildingname FROM alarmdetails where user_id='$user_id'";
  $result = $conn->query($query);
  ?>
  
	$('#dynamic_field').append('<tr id="row'+i+'"><td><select name="aid[]"><?php while($row1 = mysqli_fetch_array($result)):; ?><option value = "<?php echo $row1[0]?>"><?php echo $row1[1];?></option><?php endwhile;?></select></td><td><input type="text" name="floor[]" placeholder="Floor" class="form-control name_list" /></td><td><input type="text" name="room[]" placeholder="Room" class="form-control name_list" /></td><td><input type="text" name="zonename[]" placeholder="Zone name" class="form-control name_list" /></td><td><select name="zonestatus[]" ><option value="Normal">Normal</option>;<option value="BellSilence">Bell Silence</option>;<option value="BuzzerSilence">Buzzer Silence</option>;<option value="ZoneIsolate">Zone Isolate</option>;</select></td><td><select name="zonetype[]" ><option value="Breakglass">Breakglass</option>;<option value="Smoke_detector">Smoke Detector</option>;<option value="Heat_detector">Heat Detector</option>;<option value="Breakglass,Smoke_detector">Breakglass & Smoke Detector</option>;<option value="Breakglass,Heat_detector">Breakglass & Heat Detector</option>;<option value="Heat_detector,Smoke_detector">Heat Detector & Smoke Detector</option>;<option value="Breakglass,Smoke_detector,Heat_detector">Breakglass & Smoke Detector & Heat Detector</option>;</select></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	
});
	
$(document).on('click', '.btn_remove', function(){
var button_id = $(this).attr("id"); 
$('#row'+button_id+'').remove();
	});
  
});

</script>


</body>
</html>