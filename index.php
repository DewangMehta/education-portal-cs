<!DOCTYPE html>
<html ng-app="formExample">
    <head>
        <title>contact form using angularJS and PHP</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" />
        <script src="angular.js" ></script>
        <script src="form.js"></script>
        <script src="angular.min.js"></script>
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
      </div>
    </div>
    <div class="topnav" id="myTopnav">
        <p style="color:white; text-align:center;" > Feedback Form</p>>
    </div>

        <div class="container">
            <div ng-controller="formCtrl">
                <h2 class="text-center text-primary" style="color:white;">Hi, let us know your query? </h2>
                <hr>
                <form name="userForm" class="form-horizontal well form-search">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Your Name</label>
                        <div class="col-sm-10">
                            <input type="name" ng-model="name" class="form-control" id="name" placeholder="Your Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" ng-model="email" class="form-control" id="email" placeholder="Your Email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Message" class="col-sm-2 control-label">Message</label>
                        <div class="col-sm-10">
                            <textarea ng-model="message" id="Message" class="form-control" rows="3" placeholder="Your Message" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" ng-click="formsubmit(userForm.$valid)"  ng-disabled="userForm.$invalid" class="btn btn-primary" style="color:black;" >Submit</button>
                        </div>
                    </div>
                </form>
 
                <pre ng-model="result">
                    {{result}}
                </pre>
            </div>
        </div>
    </body>
</html>