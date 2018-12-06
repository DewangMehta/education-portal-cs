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
<script src="jquery.min.js"></script>
<script src="jquery.dataTables.min.js"></script>
<script src="jquery.dataTables.min.css"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
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
      <a href="studymaterialupload.php">Materials</a>
      <a href="extralearning.php">Extra-learning</a>
      <a href="filter.php" class="active">My Students</a>
       <a href="studentmsg.php">Student Message</a>
      <a href="parentchat.php">Parent Message</a>
    </div>
  </div>
    <div class="main">
        <div class='content'>
<h2>Filterable Table for Searching Students </h2>
<input id="myInput" type="text" placeholder="Search..">
<br><br>
    <table>
  <thead>
    <tr>
      <th>Reg No.</th>
      <th>Name</th>
      <th>Email</th>
      <th>Subject</th>
    </tr>
  </thead>
  <tbody id="myTable">
    <tr>
      <td>16BCI0156</td>
      <td>Dewang Mehta</td>
      <td>dewang@gmail.com</td>
      <td>IWP</td>
    </tr>
     <tr>
      <td>16BCI0154</td>
      <td>Falgun Mehta</td>
      <td>falgun@gmail.com</td>
      <td>Python</td>
    </tr>
    <tr>
      <td>16BCI0153</td>
      <td>Dewang Kumar</td>
      <td>dewangk@gmail.com</td>
      <td>Python</td>
    </tr>
     <tr>
      <td>16BCE2134</td>
      <td>Shikar Kumar</td>
      <td>skumar@yahoo.com</td>
      <td>IWP</td>
    </tr>
     <tr>
      <td>16BCI00098</td>
      <td>Sourav Datta</td>
      <td>sou@gmail.com</td>
      <td>Python</td>
    </tr>
    <tr>
      <td>16BCI0151/td>
      <td>Ritajit Roy</td>
      <td>royrito@gmail.com</td>
      <td>Python</td>
    </tr>
  </tbody>
</table>
</body>
</html>
