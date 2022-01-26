<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Datepicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.css" />



    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/style4.css"></link> 
    <link rel="stylesheet" type="text/css" href="../CSS/style5.css"></link> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Alarm Report</title>
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
        <div class="row">
            <div class="col-md-12 mt-5">
                <h1 class="text-center">Alarm Details Report</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-info text-white" id="basic-addon1"><i
                                        class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" id="start_date" placeholder="Start Date" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-info text-white" id="basic-addon1"><i
                                        class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" id="end_date" placeholder="End Date" readonly>
                        </div>
                    </div>
                </div>
                <div>
                    <button id="filter" class="btn btn-outline-info btn-sm">Filter</button>
                    <button id="reset" class="btn btn-outline-warning btn-sm">Reset</button>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-borderless display nowrap" id="records" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Building Name</th>
                                        <th>Floor</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <!-- Datepicker -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Datatables -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js">
    </script>
    <!-- Momentjs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

    <script>
    $(function() {
        $("#start_date").datepicker({
            "dateFormat": "yy-mm-dd"
        });
        $("#end_date").datepicker({
            "dateFormat": "yy-mm-dd"
        });
    });
    </script>

    <script>
    // Fetch records

    function fetch1(start_date, end_date) {
        $.ajax({
            url: "records1.php",
            type: "POST",
            data: {
                start_date: start_date,
                end_date: end_date
            },
            dataType: "json",
            success: function(data) {
                // Datatables
                var i = "1";

                $('#records').DataTable({
                    "data": data,
                    // buttons
                    "dom": "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    "buttons": [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ],
                    // responsive
                    "responsive": true,
                    "columns": [
                        {
                            "data": "buildingname",
                        },
                        {
                            "data": "floor",
                        }
                    ]
                });
            }
        });
    }
    fetch1();

    // Filter

    $(document).on("click", "#filter", function(e) {
        e.preventDefault();

        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();

        if (start_date == "" || end_date == "") {
            alert("both date required");
        } else {
            $('#records').DataTable().destroy();
            fetch(start_date, end_date);
        }
    });

    // Reset

    $(document).on("click", "#reset", function(e) {
        e.preventDefault();

        $("#start_date").val(''); // empty value
        $("#end_date").val('');

        $('#records').DataTable().destroy();
        fetch();
    });
    </script>

</body>
</html>