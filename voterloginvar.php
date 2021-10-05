<?php
$name=$_POST['name'];
$psw=$_POST['psw'];
$secretkey=$_POST['key'];
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"admin");
$query="SELECT * FROM `registers`";
$res=mysqli_query($con,$query);
while($row=mysqli_fetch_assoc($res))
{
  if($row['name']==$name && $row['password']==$psw && $row['vid']==$secretkey)
  {
    $phone=$row['phone'];
    echo '<script>window.location="voterpage.php?name='.$name.'&phone='.$phone.' "; </script>';
    break;
  }
}
echo '<script>window.location="index.php?error=3 ";</script>';
?>
