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
  <title>Material</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .affix {
      top:0;
      width: 100%;
      z-index: 9999 !important;
  }
  .navbar {
      margin-bottom: 0px;
  }

  .affix ~ .container-fluid {
     position: relative;
     top: 50px;
  }

  body {
      position: relative; 
  }
  #section1 {padding-top:50px;height:500px;color: #fff; background-color: #1E88E5;}
  #section2 {padding-top:50px;height:500px;color: #fff; background-color: #673ab7;}
  #section3 {padding-top:50px;height:500px;color: #fff; background-color: #ff9800;}
  
  </style>
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
  <script src="angular.min.js"></script>
</head>

<body ng-app="">
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
      <a href="studhome.php" >Home</a>
      <a href="shoqq1.php">Quiz</a>
      <a href="studentupload.php">Assignments</a>
      <a href="viewmat.php">Materials</a>
      <a href="aview1.php">Extra-learning</a>
      <a href="score.php">Scores</a>
      <a href="learn.php" class="active">Tutorials</a>
      <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
    </div>
    </div>
    <div class="main">

<form>
  Select a topic:
  <select ng-model="myVar">
    <option value="">
    <option value="CSE">CSE
    <option value="ECE">ECE
    <option value="CIVIL">CIVIL
  </select>
</form>

<div ng-switch="myVar">
  <div ng-switch-when="CSE">
     <h1>CSE</h1>
     <p>Welcome to a world of Computer Science.</p>
     <nav class="navbar navbar-inverse"  data-spy="affix" data-offset-top="197">
  <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">ComputerScience</a>
    </div>
    <div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="#section1">IWP</a></li>
          <li><a href="#section2">Stegnography</a></li>
          <li><a href="#section3">Android Dev</a></li>
          
        </ul>
      </div>
    </div>
  </div>
</nav>    

<div id="section1" class="container-fluid">
  <h1>IWP</h1>
  <p>Let's Learn Web Programming</p>
</div>
<div id="section2" class="container-fluid">
  <h1>Stegnography</h1>
  <p>Let's Learn Stegnography</p>
</div>
<div id="section3" class="container-fluid">
  <h1>Android Dev</h1>
  <p>Let's Learn Android Dev</p>
</div>

<script>
$(document).ready(function(){
  // Add scrollspy to <body>
  $('body').scrollspy({target: ".navbar", offset: 50});   

  // Add smooth scrolling on all links inside the navbar
  $("#myNavbar a").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    }  // End if
  });
});
</script>
  </div>
  <div ng-switch-when="ECE">
     <h1>ECE</h1>
     <p>Welcome to a world of Electronics and Communication.</p>
  </div>
  <div ng-switch-when="CIVIL">
     <h1>CIVIL</h1>
     <p>Welcome to a world of Construction.</p>
  </div>
</div>
</div>
</body>
</html>
