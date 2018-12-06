<!DOCTYPE html>
<html>
<head>
    <?php session_start();?>
    <link rel="stylesheet" type="text/css" href="first.css">
    <script>
        function validate(){
            var cid=document.getElementById("cid").value;
        if (cid==""){
        return false;}
        return true;
        }
    </script>
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
<body>
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
        onclick="window.location.href='logoutct.php'"><em><?php echo $_SESSION['login_user'];?> </em><br> Sign Out</button>
      </div>
    </div>

    <div class="topnav" id="myTopnav">
      <a href="facultyhome.php">Home</a>
      <a href="qmake.php">Quiz</a>
      <a href="assignmentquestion.php">Assignments</a>
      <a href="evaluateassignment.php">Evaluate</a>
      <a href="studymaterialupload.php" class="active">Materials</a>
      <a href="extralearning.php">Extra-learning</a>
      <a href="filter.php">My Students</a>
       <a href="studentmsg.php">Student Message</a>
      <a href="parentchat.php">Parent Message</a>

  </div>
   </div>
    <div class="main">
        <div class='content'>
    <table >
    
    <tr><th>Sl.No.</th><th>Course ID</th><th>Course Name</th><th>Faculty ID</th><th>Faculty Name</th><th>Study Material</th><th>Upload</th></tr>   
    <?php

    include 'dbconnection.php';
    $conn=openconn();
    $sql="select * from (enrollment join course on enrollment.cid=course.courseid) join faculty on faculty.facid=course.facid";
    $result=$conn->query($sql) or die($conn->error);
   // print_r($row);
    $sno=0;
    while($row=$result->fetch_assoc()){
        $sno+=1;
        echo "<form method='post' enctype='multipart/form-data' action='anyuploadsm.php' onsubmit='return validate()'>
        <tr><td>".$sno."</td><td name='cid'><input type='radio' name='cid' value=".$row['cid'].">".$row['cid']."</td><td>".$row["coursename"]."</td><td>".$row['facid']."</td><td>".$row['fname']."</td><td><input type='file' name='myFile' id='myFile' value='".$row['cid']."'></td><td><input type='submit' name='submit' value='Upload'></td><td id='err'></td></tr>
        </form>";
    }
    closeconn($conn);
?>

    </table></div>
    </div>
</body>
</html>

