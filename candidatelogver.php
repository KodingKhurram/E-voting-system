<?php
$name=$_POST['uname'];
$psw=$_POST['psw'];
$secretkey=$_POST['key'];
if(!preg_match('/EVSC/',$secretkey))
echo "<script>window.location='index.php?error=5';</script>";
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"admin");
$query="SELECT * FROM `nominee`";
$res=mysqli_query($con,$query);
while($row=mysqli_fetch_assoc($res))
{
  if($row['name']==$name && $row['password']==$psw && $row['cid']==$secretkey)
  {
    $cid=$row['cid'];
    echo '<script>window.location="nomineepage.php?name='.$name.'&cid='.$cid.' "; </script>';
    break;
  }
}
echo '<script>window.location="index.php?error=5 ";</script>';
?>
