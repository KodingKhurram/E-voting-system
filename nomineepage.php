<!DOCTYPE html>
<html>
<head>
  <meta name="veiwport" content="width=device-width,initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <a href="index.php" style="text-decoration:none;color:white"><div class='logout'>Logout</div></a><br/>
<center>
  <?php include('slider.php');?>
  <h1 style="color:white">Status:</h1>
  <?php
  $cid=$_GET['cid'];
  $con=mysqli_connect("localhost","root","");
  mysqli_select_db($con,"admin");
  $query="SELECT * FROM `candidate` WHERE `canid`='$cid'";
  $res=mysqli_query($con,$query);
  $query1="SELECT * FROM `nominee` WHERE `cid`='$cid'";
  $res1=mysqli_query($con,$query1);
  $row=mysqli_fetch_assoc($res1);
  $eid=$row['ename'];
  $query2="SELECT * FROM `election` WHERE `elec_id`='$eid'";
  $res2=mysqli_query($con,$query2);
  $row1=mysqli_fetch_assoc($res2);
  $ename=$row1['name'];
  if($res->num_rows!=0)
  echo "<h1 style='color:white'>Your request for election [".$ename."] is Accepted by the admin.</h1>";
  else
  echo "<h1 style='color:white'>Your request for election [".$ename."] is Still in progress...</h1>";
  ?>
</center>
<?php include('footer.php');?>
</body>
