<?php
error_reporting(0);
$name=$_POST['name'];
$password=$_POST['pword'];
echo "<h1>".$name.$password."</h1>";
if($name=="admin" && $password=="election")
header('Location:http://localhost/e-voting system/adminpage.php');
else {
  header('Location:http://localhost/e-voting system/index.php?error=1');
}
?>
