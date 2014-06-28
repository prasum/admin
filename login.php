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
<br>
<br>
<br>

<div class="container" id="content">
   <div class="row">
      <h3 align="center">Log In Form</h3>
      </div></div>
   </div>
      <div class="col-md-6 col-md-push-3">
   <div class="jumbotron">
                <form class="form-horizontal" role="form" method="REQUEST" action="<?php echo $_SERVER['PHP_SELF'];?>">
   <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">UserName:</label>
      <div class="col-sm-10">
         <input type="text" class="form-control" id="firstname" name="username"
            placeholder="Enter Username">
      </div>
   </div>
   <div class="form-group">
      <label for="lastname" class="col-sm-2 control-label">Password:</label>
      <div class="col-sm-10">
         <input type="password" class="form-control" id="lastname"  name="password"
            placeholder="Enter Password">
      </div>
   </div>
   <br>
    <div class="form-group">
      <div class="col-sm-offset-5 col-sm-12">
         <button type="submit" class="btn btn-default" name="submit">Sign in</button>
      </div>
   </div>
</form>
<style>
    #content {
       z-index: 500;
       opacity: 0.6;
   }
   #content <.row {
       min-height: 0px;
       background: #cccccc;
   }
   .jumbotron{
      background: #cccccc;
   }
</style>
<?php
ob_start();
session_start();
if(isset($_REQUEST['submit']))
{
   $u=mysql_real_escape_string($_REQUEST['username']);
   $p=mysql_real_escape_string($_REQUEST['password']);
   mysql_connect("localhost","root","") or die("error in connection" . mysql_errno());
   mysql_select_db("admin") or die("error in opening" . mysql_errno());
   $query="select * from admina where username = '$u' and password = '$p' ";
    $result=mysql_query($query);
   $num=mysql_num_rows($result);
   if($num>0)
    {
   $rows=mysql_fetch_array($result);
   
    $_SESSION['user']=$rows['username'];
    header("location:index.php");  
   } 
    else
    {
      header("location:login.php");
      echo "Username/Password dont match";
    }
  }
?>
</body>