<?php
$name=$_POST['name'];
$party=$_POST['party'];
$ename=$_POST['eid'];
$photo=$_FILES['photo']['name'];
$tmp=$_FILES['photo']['tmp_name'];
$folder='images/'.$photo;
move_uploaded_file($tmp,$folder);
$logo=$_FILES['logo']['name'];
$tmplogo=$_FILES['logo']['tmp_name'];
$folder1='images/'.$logo;
move_uploaded_file($tmp,$folder1);
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"admin");
$res=mysqli_query($con,"SELECT * FROM `election` WHERE `name`='$ename'");
$row=mysqli_fetch_assoc($res);
$eid=$row['elec_id'];
$ran=mt_rand(000000,999999);
$secretkey="EVSC".$ran;
$query="INSERT INTO `candidate` (`canid`, `name`, `party`, `eid`, `photo`, `logo`, `votes`) VALUES ('$secretkey', '$name', '$party', '$eid', '$photo', '$logo', '0')";
if(mysqli_query($con,$query))
echo "<script>window.location='addnewnominee.php?error=2';</script>";
else {
  echo "<script>window.location='addnewnominee.php?error=1';</script>";
}
?>
