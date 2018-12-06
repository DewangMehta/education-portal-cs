<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title> QUIZ </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="jquery.min.js"></script>
    <script type="text/javascript">window.history.forward(1);</script>
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
    <script type="text/javascript">
    $(document).ready(function() {
        $(".disableEvent").on("contextmenu",function(){
             alert('right click disabled');
           return false;
        }); 
    });

</script>
<script type='text/javascript'>
  $(document).keydown(function(e){
    e.preventDefault();
  });
</script>
<script type='text/javascript'>
document.onkeydown = function (e) {
  var key = e.charCode || e.keyCode;
  if (key == 27) { 
    // esc key do nothing
  } else {
    e.preventDefault();
  }      
}
</script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.disableEvent').bind('cut copy paste', function (e) {
        e.preventDefault();
    });
    });
</script>
    <div class="stick">
    <div class="hd">
      <div class="col-logo">
        EPo
      </div>
      <div class="col-name">
        EduPortal
      </div>
      
      <div class="col-usout">
        <button class="btn" onclick="window.location.href='logoutct.php'" style="float: right;right: 0px;padding: 5px; margin-top: 1.5em;margin-bottom: 1.5em;margin-right: 2px;"><em><?php echo $_SESSION['login_user']; ?> </em><br> Sign Out</button>
      </div>
    </div>

     <div class="topnav" id="myTopnav">
      <a href="#" >Home</a>
      <a href="shoqq1.php" class="active">Quiz</a>
      <a href="#">Assignments</a>
      <a href="#">Materials</a>
      <a href="#">Extra-learning</a>
      <a href="#">Scores</a>
      <a href="#">Tutorials</a>
      <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
    </div> 
  </div>
</head>
<body class='disableEvent' >
    
    <!-- <div style="background-color: rgb(248, 255, 178); width: 50%; padding: 100px; margin-top:100px; left:100px; border-color: blue; border-style: solid;border-width: 1px;border-left: 6px solid red;" align="center"> --> 
      <div class="main">
        
<?php

//error_reporting(E_ALL);ini_set('display_errors', TRUE);
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'quizzes';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} 
//SELECT * FROM `quiz1` ORDER BY RAND() LIMIT 2;

echo "<center><button id='show' class='disableEvent' onclick='show(1); openFullscreen();'>SHOW QUIZ</button></center>";
echo "<form class='form-horizontal' class='disableEvent' style='order-color: blue; border: 10;border-style: solid;border-width: 1px;display:none;' role='form' id='quizform' method='post' action=''>";
$sql = 'SELECT qno, ques, a,b,c,d FROM quiz1 ORDER BY rand() LIMIT 3';
$result = $conn->query($sql);
$i=0;
//session_start();
$_SESSION["attempt"]="1";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) { ?>
        
        <?php $i=$i+1;?>
                <div id="timeleft" class="disableEvent" style="background-color:green;color:#EFD0CA;font-size:20px;text-align:center;display: none;">Time left = <span id="timer"></span></div>
                <div id='question<?php echo $i;?>' class="disableEvent" class='cont' style="display: none;">

                (<?php ; echo $i;?> ) <?php echo $row['ques'];?> ?<br>
        
                    <input class="disableEvent" type='radio' value='1' id='radio1_<?php echo ''.$row['qno'];?>' name='<?php echo ''.$row['qno'];?>'/><?php echo ''.$row['a'];?>
                   <br/>
                    <input class="disableEvent" type='radio' value='2' id='radio1_<?php echo ''.$row['qno'];?>' name='<?php echo ''.$row['qno'];?>'/><?php echo ''.$row['b'];?>
                    <br/>
                    <input class="disableEvent" type='radio' value='3' id='radio1_<?php echo ''.$row['qno'];?>' name='<?php echo ''.$row['qno'];?>'/><?php echo ''.$row['c'];?>
                    <br/>
                    <input class="disableEvent" type='radio' value='4' id='radio1_<?php echo ''.$row['qno'];?>' name='<?php echo ''.$row['qno'];?>'/><?php echo ''.$row['d'];?>
                    <br/>
                    <input class="disableEvent" type='radio' checked='checked' style='display:none' value='5' id='radio1_<?php echo ''.$row['qno'];?>' name='<?php echo ''.$row['qno'];?>'/>                                                                      
                    <br/>
                    <button id='next<?php echo ''.$i;?>' class='next' onclick="gonext(<?php  echo $i;?>)" type='button'>Next</button>
                    <br>
                    <span id="ppp"></span>
                </div>

        <?php }
} else {
    echo '0 results';
}

$conn->close();
?> 
<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{ 
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'quizzes';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    } 
       $keys=array_keys($_POST);
       $order=join(",",$keys);
       //echo "".$order;
       //$query="select * from questions id IN($order) ORDER BY FIELD(id,$order)";
      // echo $query;exit;
       $sql = "SELECT qno, ques, a,b,c,d,answer FROM quiz1 WHERE qno IN ($order) ORDER BY qno ASC LIMIT 3";
        $response = $conn->query($sql);

       
       $right_answer=0;
       $wrong_answer=0;
       $unanswered=0;
       //echo "bum".$response->num_rows;
       if ($response->num_rows > 0) 
       {
        // output data of each row
            while($result = $response->fetch_assoc())
           
           {
                //echo " qnoqr-".$result['qno']."  qansqr".$result['answer']." qnsuser-".$_POST[$result['qno']]."<br>";
               if($result['answer']==$_POST[$result['qno']]){
                        //echo "qno".$result['qno'].";
                       $right_answer++;
                   }else if($_POST[$result['qno']]==5){
                       $unanswered++;
                   }
                   else{
                       $wrong_answer++;
                   }

                }
            }
            else {
            echo 'XXX';
        }
            $_SESSION["rt"] = "".$right_answer;
            $_SESSION["wr"] = "".$wrong_answer;
            $_SESSION["un"] = "".$unanswered;
            echo "<script type='text/javascript'>window.location.href='result.php';</script>";
            // ob_start();
            // header("Location: result.php");
            //echo "<script type='text/javascript'>window.location.href = 'result.php';</script>"
        
            //exit();

           //echo "Correct answers : ". $right_answer."<br>";
           //echo "Wrong answers: ". $wrong_answer."<br>";
           //echo "Unanswered : ". $unanswered."<br>";
           //echo "<br>SCORE = ".$right_answer."<br>";
}
?>
<div id="subtext" style="padding: 10px;display: none;"> Click Submit<br> to see your score...</div>
<input type = "submit" id="sub" value = " Submit " class=".btn-primary" style="display: none;" />
<br>
</form>





<script>
       

         function show(qn)
         {
            document.getElementById('quizform').style.display="block";
            document.getElementById("question1").style.display="block";
            document.getElementById("show").style.display="none";
            document.getElementById("timeleft").style.display="block";
            document.getElementById('timer').innerHTML =  00 + ":" + 15;


            startTimer();
         }
        
         function startTimer() {
          var presentTime = document.getElementById('timer').innerHTML;
          var timeArray = presentTime.split(/[:]+/);
          var m = timeArray[0];
          var s = checkSecond((timeArray[1] - 1));
          if(s==59){m=m-1}
          if(m<0)
            {
                //document.getElementById("timeleft").style.backgroundColor = "red";
                //setTimeout('window.alert(\'Hello!\')', 2000)
                alert("Time's up ");
                document.getElementById("quizform").submit();

            }
            else if (m<1 && s<5)
            {
                document.getElementById("timeleft").style.backgroundColor = "red";
            }
          
          document.getElementById('timer').innerHTML =
            m + ":" + s;
          setTimeout(startTimer, 1000);
        }

        function checkSecond(sec) {
          if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
          if (sec < 0) {sec = "59"};
          return sec;
        }
         function gonext(qn)
         {
            var qqn=Number(qn);
            
            document.getElementById("question"+qn).style.display="none";
            //var newqn = qn.replace(/(\d+)\./,function(j,a){return a- -1 +".";});
            if(qqn<3){
                var nqn=Number(qn)+1; 
                document.getElementById("question"+nqn).style.display="block";
            }
            else{
                document.getElementById("timeleft").style.display="none";
                document.getElementById("sub").style.display="block";
                document.getElementById("subtext").style.display="block";
            }

         }
var elem = document.documentElement;
function openFullscreen() {
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.mozRequestFullScreen) { /* Firefox */
    elem.mozRequestFullScreen();
  } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
    elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) { /* IE/Edge */
    elem.msRequestFullscreen();
  }
}

function closeFullscreen() {
  if (document.exitFullscreen) {
    document.exitFullscreen();
  } else if (document.mozCancelFullScreen) {
    document.mozCancelFullScreen();
  } else if (document.webkitExitFullscreen) {
    document.webkitExitFullscreen();
  } else if (document.msExitFullscreen) {
    document.msExitFullscreen();
  }
}
</script>
    </div>
</body>
</html>