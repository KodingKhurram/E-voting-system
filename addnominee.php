<?php
$ename=$_REQUEST['ename'];
$party=$_REQUEST['party'];
$name=$_REQUEST['name'];
$logo=$_REQUEST['logo'];
$photo=$_REQUEST['photo'];
$ran=mt_rand(000000,999999);
$cid=$_REQUEST['cid'];
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"admin");
/*$res=mysqli_query($con,"SELECT * FROM `election` WHERE `name`='$ename'");
$row=mysqli_fetch_assoc($res);
$eid=$row['elec_id'];
echo "$eid";*/
$query="INSERT INTO `candidate` (`canid`, `name`, `party`, `eid`, `photo`, `logo`, `votes`) VALUES('$cid','$name','$party','$ename','$photo','$logo','0')";
if(mysqli_query($con,$query))
{
  echo "<script>window.location='findnominee.php?error=2';</script>";
}
else {
  echo "<script>window.location='findnominee.php?error=1';</script>";
}
?>
