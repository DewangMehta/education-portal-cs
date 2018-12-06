<?php
   include('session.php');
   if (!(isset($_SESSION['login_user'])))
{
    header("location: loginreal.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>ParentChat</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="struct2.css">
  <script type="text/javascript">
    
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
  </script>
</head>
<body >

  <div class="stick">
    <div class="hd">
      <div class="col-logo">
        EPo
      </div>
      <div class="col-name">
        EduPortal
      </div>
      
      <div class="col-usout">
        <button class="btn" 
        onclick="window.location.href='logoutct.php'"><em><?php echo $login_session;?> </em><br> Sign Out</button>
      </div>
    </div>

    <div class="topnav" id="myTopnav">
      <a href="facultyhome.php" >Home</a>
      <a href="qmake.php">Quiz</a>
      <a href="assignmentquestion.php">Assignments</a>
      <a href="evaluateassignment.php">Evaluate</a>
      <a href="studymaterialupload.php">Materials</a>
      <a href="extralearning.php">Extra-learning</a>
      <a href="filter.php">My Students</a>
       <a href="studentmsg.php" class="active"s>Student Message</a>
      <a href="parentchat.php" >Parent Message</a>
      
      <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
    </div>
  </div>
  <div class="main">
    <h1>Send Message to Students</h1>

<form action="studentmsg.php" method="$_POST">

Course_Id: <input type="text" name="Course_Id"  required /><br><br>

Student_Id: <input type="text" name="Student_Id"  required /><br><br>

Message: <input type="text" name="Message"  required /><br><br>


<input type="submit" name="submit"/>

</form>

    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logtable";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO coursemessage (Course_Id, Student_Id, Message) VALUES ('$_POST[Course_Id]', '$_POST[Student_Id]','$_POST[Message]')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


</body>
</html>
</div>
  
</body>
</html>