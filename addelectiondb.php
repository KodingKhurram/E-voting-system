<?php
$ename=$_POST['ename'];
$date=$_POST['edate'];
$filerror=$_FILES['photo']['error'];
$filename=basename($_FILES['photo']['name']);
$tempname=$_FILES['photo']['tmp_name'];
echo "$filename";
$folder='images/'.$filename;
move_uploaded_file($tempname,$folder);
echo "$tempname";
$ran=mt_rand(000000,999999);
$eid="EVSE".$ran;
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"admin");
$query="INSERT INTO `election` (`elec_id`, `name`, `date`, `image`) VALUES ('$eid', '$ename', '$date', '$filename') ";
if(mysqli_query($con,$query))
{
  echo "<script>window.location='addelection.php?error=2';</script>";
}
else
{
  echo "<script>window.location='addelection.php?error=1';</script>";
}
 ?>
