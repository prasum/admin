<?php
if(isset($_REQUEST['id']))
{
	$ID=$_REQUEST['id'];
	mysql_connect("localhost","root","") or die("error in connection" . mysql_errno());
    mysql_select_db("onlinequiz") or die("error in opening" . mysql_errno());
    $query="delete from quiz where Id = '$ID' ";
    $result=mysql_query($query);
    if($result>0)
    {
    	header("location:index.php");
    }
}
?>