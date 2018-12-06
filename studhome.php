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
	<title>Student Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="jquery.min.js"></script>
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

<script>
  var i = 0;

$(document).ready(function(){
  var interval = setInterval(function () {
    i += 2; // speed
    $('#container').animate({ scrollTop: i }, 1);
    if (i >= $('#container').prop('scrollHeight') - $('#container').height()) {
      i = 0;
    }
  }, 100);
});
</script>

<style>
#container {
  
  color: red;
  height: 180px;
  overflow: hidden;
  padding: 5px 20px;
  width: 350px;
}
</style>

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
      
      <div class="col-usout" style="">
        <button class="btn" style=""
        onclick="window.location.href='logoutct.php'"><em><?php echo $login_session;?> </em><br> Sign Out</button>
      </div>
    </div>

    <div class="topnav" id="myTopnav">
      <a href="studhome.php" class="active">Home</a>
      <a href="shoqq1.php">Quiz</a>
      <a href="studentupload.php">Assignments</a>
      <a href="viewmat.php">Materials</a>
      <a href="aview1.php">Extra-learning</a>
      <a href="score.php">Scores</a>
      <a href="learn.php">Tutorials</a>
      <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
    </div>
  </div>
  <div class="main">
    <p>Hi, <?php echo $login_session;?> ! <br> Good to see you here.<br>This is the student home page.<br>Let's study!. </p>

   

  </div>
   <h3> Message From Faculty</h3>
    <div id="container">
 
  <p>
  <?php
$con=mysqli_connect("localhost","root","","logtable");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT Course_Id, Student_Id, Message FROM coursemessage";
$result=mysqli_query($con,$sql);
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Course_Id: " . $row["Course_Id"] . "<br>" .  " Student_Id: " . $row["Student_Id"]."<br>" .  " Message: ". $row["Message"]. "<br>" . "<br>" . "<br>" . "<br>";
    }
} else {
    echo "0 results";
}
mysqli_close($con);
?>
</p>
</div>
  
</body>
</html>