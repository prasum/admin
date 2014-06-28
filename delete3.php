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
             src="image/b.bmp"> </a></div>
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
   <a href="#" class="btn btn-primary btn-lg " role="button" target="_top">
      Delete
   </a>
   <a href="qmod.php" class="btn btn-primary btn-lg" role="button">
      Quiz Modification
   </a>
    <a href="logout.php"  class="btn btn-primary btn-lg " role="button" >
      LogOut
   </a>
 </p>
</div>
<br>
<br>
      <h3 align="center"> Delete </h3>
      <form class="form-horizontal" role="form" method="REQUEST" action="<?php echo $_SERVER['PHP_SELF'];?>">
         <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
         <div class="radio">
   <label>
      <input type="radio" name="Category" id="email" 
         value="Email Security" > Email Security
   </label>
</div>

<div class="radio">
   <label>
      <input type="radio" name="Category" id="browser" 
         value="Browser Security">
         Browser Security
   </label>
</div>
<div class="radio">
   <label>
      <input type="radio" name="Category" id="virus" 
         value="Viruses">
         Viruses
   </label>
</div>
<div class="radio">
   <label>
      <input type="radio" name="Category" id="ecom" 
         value="E-commerce">
         E-commerce
   </label>
</div>
<div class="radio">
   <label>
      <input type="radio" name="Category" id="credit" 
         value="Credit/Debit Card Usage">
         Credit/Debit Card Usage
   </label>
</div>
<div class="radio">
   <label>
      <input type="radio" name="Category" id="social" 
         value="Social Networking Sites">
         Social Networking Sites
   </label>
</div>
<div class="radio">
   <label>
      <input type="radio" name="Category" id="games" 
         value="Computer Games">
         Computer Games
   </label>
</div>
<div class="radio">
   <label>
      <input type="radio" name="Category" id="internet" 
         value="Internet Basics">
         Internet Basics
   </label>
</div>
<div class="radio">
   <label>
      <input type="radio" name="Category" id="mobile" 
         value="Mobile Apps">
         Mobile Apps
   </label>
</div>
<div class="radio">
   <label>
      <input type="radio" name="Category" id="onlineshop" 
         value="Online Shopping">
         Online Shopping
   </label>
</div>
<div class="radio">
   <label>
      <input type="radio" name="Category" id="safesurf" 
         value="Safe surfing/Downloading">
         Safe surfing/Downloading
   </label>
</div>
</div>
</div>
<p align="center">      <button type="submit" class="btn btn-default" name="submit" >Show Table</button> </p>
</form>
<br>
<br>
</body>
  <?php
    }else
    header("location:index.php");
      ?>
<?php
if(isset($_REQUEST['submit']))
{
   mysql_connect("localhost","root","") or die("error in connection" . mysql_errno());
    mysql_select_db("onlinequiz") or die("error in opening" . mysql_errno());
    $category=mysql_real_escape_string($_REQUEST['Category']);
    $result=mysql_query("select * from quiz where Category ='$category' ");

    echo "<b><center>Quiz </center></b>";
    echo "</br>";
    echo "<table border='1' cellpadding='5' width='500' align='center'> <tr> <th> Id </th> <th> FirstName </th>  <th> Category </th> <th> A </th> <th> B </th> <th> C </th> <th> D </th> <th> CorrectOption </th> </tr>";
    while($row=mysql_fetch_array($result))
    {
    echo "<tr> <td align='center' >$row[Id]</td> <td> $row[FirstName] </td>  <td> $row[Category] </td> <td> $row[A] </td> <td> $row[B] </td> <td> $row[C] </td> <td> $row[D] </td> <td> $row[CorrectOption] </td> <td><a href='delete2.php?id=$row[Id]'>Delete</a></td></tr>";
    }
   echo "</table>";
}
   ?>
