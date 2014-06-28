 <?php
      ob_start();
      session_start();
      if(isset($_SESSION['user']))
      {
         ?>



<!DOCTYPE html>
<html>
   <head>
      <title>Online Quiz Admin</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Bootstrap -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/bootstrap-theme.min.css" rel="stylesheet">


      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media 
         queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page 
         via file:// -->
      <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/
            html5shiv.js"></script>
         <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/
            respond.min.js"></script>
      <![endif]-->
   </head>
   <body>
   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
   <div class="navbar-header">
      <a class="navbar-brand"  href="#">
      <img style="max-width:65px; margin-top: -15px; margin-left: -15px"
             src="image/unnamed.jpg"> </a></div>
    <div>
      <p class="navbar-text"><font size=5><b>Gurgaon Police Online Quiz Module</b> </font></p>
   </div>
</nav>
<br>
<br>
<br>
<div class="btn-group">
<p align="left">
<a href="index.php" class="btn btn-primary btn-lg active" role="button">
      Add
   </a>
   <a href="edit3.php"  class="btn btn-primary btn-lg " role="button" target="_top">
      Edit
   </a>
   <a href="delete3.php" class="btn btn-primary btn-lg " role="button" target="_top">
      Delete
   </a>
   <a href="#" class="btn btn-primary btn-lg" role="button">
      Quiz Modification
   </a>
    <a href="logout.php"  class="btn btn-primary btn-lg " role="button" >
      LogOut
   </a>
 </p>
</div>
<br>
<br>
<form class="form-horizontal" role="form" method="REQUEST" action="<?php echo $_SERVER['PHP_SELF'];?>" >
   <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label"> No of Questions</label>
      <div class="col-sm-10">
         <input type="text" class="form-control" name="qnum" 
            placeholder="Enter even  no of questions">
      </div>
   </div>
    <div class="form-group">
      <label for="lastname" class="col-sm-2 control-label">Timer</label>
      <div class="col-sm-10">
         <input type="text" class="form-control" name="qtime" 
            placeholder="Enter timer">
      </div>
   </div>
    <p align="center">      <button type="submit" class="btn btn-default" name="submit" >Go</button> </p>
 </form>
</body>
  <?php
    }else
    header("location:index.php");
      ?>
 <?php
  if(isset($_REQUEST['submit']))
  {
    $x = mysql_real_escape_string($_REQUEST['qnum']);
    $z= mysql_real_escape_string($_REQUEST['qtime']);
    $request = file_get_contents("requests.txt");
    $request = "$x -  $z\n" . $request;
    file_put_contents("posts.txt", $request);
    echo $request;
 }
 ?>

 <?php
 if(isset($_REQUEST['submit']))
 {
   mysql_connect("localhost","root","") or die("error in connection" . mysql_errno());
   mysql_select_db("quizdb") or die("error in opening" . mysql_errno());
   $n=mysql_real_escape_string($_REQUEST['qnum']);
   $t=mysql_real_escape_string($_REQUEST['qtime']);
   $query="Insert into quizmgt(qnum,qtime)values('$n','$t')";
   $result=mysql_query($query) or die("execution fail" . mysql_errno());
   if($result>0)
   {
      header("location:index.php");
   }
 }
 ?>

