<?php


    $conn=new mysqli('localhost','root','','registration');
    if($conn->connect_error) die("Fatal Error");

    
    
    $errors = array();
    session_start();

    $floor1 = '';
    $room = '';
    $zonename = '';
    


    if(isset($_POST['adduser'])){

        $username = $_POST['username'];
        $email = $_POST['email'];
        $CompanyName = $_POST['CompanyName'];
        $password_1 = $_POST['password_1'];
        $password_2 = $_POST['password_2'];
       
        if(empty($username)){
            array_push($errors, "Username is required");
        }
        if(empty($email)){
            array_push($errors, "Email is required");
        }
        if(empty($password_1)){
            array_push($errors, "Password is required");
        }
        
        if($password_1 != $password_2){
            array_push($errors, "The password not match");
        }

        if(count($errors) == 0){
            $password = md5($password_1);
            $query = "INSERT INTO user (username, email, password,CompanyName)
            VALUES ('$username','$email','$password','$CompanyName')";
            $result = $conn->query($query);
            if(!$result){
                echo "Register failed<br><br>";
            }
            $_SESSION['success'] = "You are register successful";
            header('location: admin.php');
        }


    }

if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
       
        if(empty($username)){
            array_push($errors, "Username is required");
        }
        if(empty($password)){
            array_push($errors, "Password is required");
        } 
        if(count($errors) == 0){
            $password = md5($password);
            $query = "SELECT * FROM user WHERE username='$username' && password='$password'";
            $result = $conn->query($query);
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['CompanyName'] = $row['CompanyName'];
                    $_SESSION['Message'] = $row['Message'];
                    $_SESSION['Location'] = $row['Location'];
                    $_SESSION['ContactNumber'] = $row['ContactNumber'];
                    $_SESSION['DepartmentNumber'] = $row['DepartmentNumber'];
                    $_SESSION['image'] = $row['image'];
                    $_SESSION['imagename'] = $row['imagename'];
                }
                header('location: home1.php');
            }else{
                array_push($errors, "Wrong Password");
                
            }

            
            
        }
}



    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }



if(isset($_POST["addalarmdetails"])){
    $userid = $_POST['userid'];
    $buildingname = $_POST['buildingname'];
    $floor = $_POST['floor'];

    if(empty($buildingname)){
        array_push($errors, "Building Name is required");
    }
    if(empty($floor)){
        array_push($errors, "Floor is required");
    }

    if(count($errors) == 0){
        $query = "INSERT INTO alarmdetails (user_id,buildingname,floor)
        VALUES ('$userid','$buildingname','$floor')";
        $result = $conn->query($query);
        if(!$result){
            echo "Add Alarm details failed<br><br>";
        }
        header('location: listalarm1.php');
        $_SESSION['buildingname'] = $buildingname;
    }

}

if(isset($_POST['submit1']))
{
// Counting No fo skilss
$count = count($_POST["aid"]);
//Getting post values
$aid=$_POST["aid"];	
$floor=$_POST["floor"];	
$room=$_POST["room"];	
$zonename=$_POST["zonename"];
$zonestatus=$_POST["zonestatus"];
$zonetype=$_POST["zonetype"];

    for ($i=0; $i < $count; $i++){
        if(empty($floor)){
            array_push($errors, "Floor is required");
        }
        
        if(empty($room)){
            array_push($errors, "Room is required");
        }
        
        if(empty($zonename)){
            array_push($errors, "Zone Name is required");
        }
        
        if(empty($zonestatus)){
            array_push($errors, "Zone Status is required");
        }
        
        if(empty($zonetype)){
            array_push($errors, "Zone Type is required");
        }
        if(count($errors) == 0){
        $query = "INSERT INTO zone (aid, floor1, room, zonename, zonetype,zonestatus)
        VALUES ('$aid[$i]','$floor[$i]','$room[$i]','$zonename[$i]','$zonetype[$i]','$zonestatus[$i]')";
        $result = $conn->query($query);
        }
    header('location: listalarm1.php');
}


}


if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $query = "DELETE FROM zone WHERE ID=$id";
    $result = $conn->query($query);
    if(!$result){
        echo "Delete Zone details failed<br><br>";
    }
    header('location: listalarm1.php');
}

if(isset($_GET['delete1'])){



    $aid = $_GET['delete1'];

    $query1 = "DELETE FROM zone WHERE aid=$aid";
    $result1 = $conn->query($query1);

    $query = "DELETE FROM alarmdetails  WHERE aid=$aid";
    $result = $conn->query($query);
    if(!$result){
            echo "Delete Alarm details failed<br><br>";
        }
        header('location: listalarm1.php');

}

if(isset($_GET['delete2'])){
    $calendarID = $_GET['delete2'];
    $query = "DELETE FROM calendar WHERE calendarID=$calendarID";
    $result = $conn->query($query);
    if(!$result){
            echo "Delete Event details failed<br><br>";
        }
        header('location: listevent.php');

}





if(isset($_POST['editzonedetails']))
{
        $id = $_POST["id"];
        $aid= $_POST["aid"];	
        $floor=$_POST["floor"];	
        $room=$_POST["room"];	
        $zonename=$_POST["zonename"];
        $zonetype = $_POST['zonetype'];


        if(empty($floor)){
            array_push($errors, "Floor is required");
        }
        
        if(empty($room)){
            array_push($errors, "Room is required");
        }
        
        if(empty($zonename)){
            array_push($errors, "Zone Name is required");
        }
        if(empty($zonetype)){
            array_push($errors, "Zone Type is required");
        }
        if(count($errors) == 0){
        $query = "UPDATE zone SET aid='$aid', floor1='$floor', room='$room', zonename='$zonename', zonetype='$zonetype' WHERE id='$id'";
        $result = $conn->query($query);
        header('location: listalarm1.php');
        }
}



if(isset($_POST['editevent']))
{

$calendarID= $_POST["calendarID"];
$title = $_POST["title"];	
$date=$_POST["date"];	
$type=$_POST["type"];	
$description=$_POST["description"];	

if(empty($title)){
    array_push($errors, "Title is required");
}

if(empty($date)){
    array_push($errors, "Date is required");
}

if(empty($type)){
    array_push($errors, "Type is required");
}
if(empty($description)){
    array_push($errors, "Description is required");
}
if(count($errors) == 0){

$query = "UPDATE calendar SET title='$title',date='$date',type='$type',description='$description' WHERE calendarID='$calendarID'";
$result = $conn->query($query);
header('location: listevent.php');
}
}



if(isset($_POST['editalarmdetails']))
{

$aid= $_POST["aid"];
$buildingname = $_POST["buildingname"];	
$floor=$_POST["floor"];	

if(empty($buildingname)){
    array_push($errors, "Building Name is required");
}
if(empty($floor)){
    array_push($errors, "Floor is required");
}

if(count($errors) == 0){
$query = "UPDATE alarmdetails SET buildingname='$buildingname',floor='$floor' WHERE aid='$aid'";
$result = $conn->query($query);
header('location: listalarm1.php');
}
}


if(isset($_POST['editzonestatus']))
{
        $id = $_POST["id"];
        $aid= $_POST["aid"];
        $username = $_POST["username"];
        $floor=$_POST["floor"];	
        $room=$_POST["room"];	
        $zonename=$_POST["zonename"];
        $zonestatus = $_POST['zonestatus'];
        date_default_timezone_set('UTC');
        $date = new DateTime('now', new DateTimeZone('Asia/Kuala_Lumpur'));
        $date1 = $date->format('Y-m-d H:i:s')."\n"; 

$query = "UPDATE zone SET aid='$aid', floor1='$floor', room='$room', zonename='$zonename', zonestatus='$zonestatus', zonetime='$date1' WHERE id='$id'";
$result = $conn->query($query);
$query1 = "INSERT INTO alarmstatus (ID,aid, floor1, room, zonename,zonestatus,zonetime,username) VALUES ('$id','$aid','$floor','$room','$zonename','$zonestatus','$date1','$username')";
$result = $conn->query($query1);
header('location: alarmstatus.php');
}

if(isset($_POST['editsosdetails']))
{

//Getting post values
$user_id= $_POST["user_id"];
$username= $_POST["username"];
$CompanyName= $_POST["CompanyName"];
$email= $_POST["email"];
$emergencyemail= $_POST["emergencyemail"];
$Location= $_POST["Location"];	
$ContactNumber= $_POST["ContactNumber"];
$DepartmentNumber= $_POST["DepartmentNumber"];
$Message= $_POST["Message"];

if(empty($username)){
    array_push($errors, "Username is required");
}
if(empty($CompanyName)){
    array_push($errors, "Company Name is required");
}
if(empty($email)){
    array_push($errors, "Email is required");
}
if(empty($emergencyemail)){
    array_push($errors, "Emergency Email is required");
}
if(empty($Location)){
    array_push($errors, "Location is required");
}
if(empty($ContactNumber)){
    array_push($errors, "ContactNumber is required");
}
if(empty($DepartmentNumber)){
    array_push($errors, "Department Number is required");
}
if(empty($Message)){
    array_push($errors, "Message is required");
}

if(count($errors) == 0){
$query = "UPDATE user SET username='$username',email='$email',emergencyemail='$emergencyemail',CompanyName='$CompanyName',ContactNumber='$ContactNumber',Message='$Message',Location='$Location', DepartmentNumber='$DepartmentNumber' WHERE user_id='$user_id'";
$result = $conn->query($query);
header('location: listsosdetails.php');
}
}



if(isset($_POST['addevent']))
{

//Getting post values
$user_id= $_POST["user_id"];	
$date= $_POST["date"];	
$title= $_POST["title"];	
$type= $_POST["type"];
$description= $_POST["description"];

if(empty($date)){
    array_push($errors, "Date is required");
}
if(empty($title)){
    array_push($errors, "Title is required");
}
if(empty($type)){
    array_push($errors, "Type is required");
}
if(empty($description)){
    array_push($errors, "Description is required");
}
if(count($errors) == 0){
$query = "INSERT INTO calendar (user_id,date, title, type,description) VALUES ('$user_id','$date','$title','$type','$description')";
$result = $conn->query($query);
header('location: calendar.php');
}
}

if(isset($_POST['sendemail']))
{
    $username= $_POST["username"];	
    $email= $_POST["email"];	
    $subject= $_POST["subject"];	
    $message= $_POST["Message"];
    $emergencyemail= $_POST["emergencyemail"];
    $to = $emergencyemail;
    $from = $email;
    $fromName = $username;

    //Additional headers
    $headers = 'From: '.$fromName.'<'.$from.'>';

    //Send Email
    if(mail($to, $subject, $message, $headers)){ 
        echo 'Email has sent successfully.'; 
     }else{ 
        echo 'Email sending failed.'; 
     }
}

if(isset($_FILES["image"]["name"])){
        $id = $_POST["id"];
        $name = $_POST["name"];
  
        $imageName = $_FILES["image"]["name"];
        $imageSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];
  
        // Image validation
        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $imageName);
        $imageExtension = strtolower(end($imageExtension));
        if (!in_array($imageExtension, $validImageExtension)){
          echo
          "
          <script>
            alert('Invalid Image Extension');
            document.location.href = '../PHP/listsosdetails.php';
          </script>
          ";
        }
        elseif ($imageSize > 1200000){
          echo
          "
          <script>
            alert('Image Size Is Too Large');
            document.location.href = '../PHP/listsosdetails.php';
          </script>
          ";
        }
        else{
          $newImageName = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
          $newImageName .= '.' . $imageExtension;
          $query = "UPDATE user SET image = '$newImageName' WHERE user_id = $id";
          mysqli_query($conn, $query);
          move_uploaded_file($tmpName, '../img/' . $newImageName);
          echo
          "
          <script>
          document.location.href = '../PHP/listsosdetails.php';
          </script>
          ";
        }
      }

?>



