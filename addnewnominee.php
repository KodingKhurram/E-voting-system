<!DOCTYPE html>
<html>
<head>
  <meta name="veiwport" content="width=device-width,initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <a href="adminpage.php" style="text-decoration:none;color:white"><div class='logout'>Home</div></a><br/>
  <?php
  error_reporting(0);
  include('slider.php');?>
  <center>
    <h1 style="color:white"> Add a new nominee for election</h1>
  <form style="margin-top:0px" class='popup-content' action="addnomineedb.php" method='post' enctype="multipart/form-data">
    <select name='eid' placeholder='Select election' required>
      <?php $con=mysqli_connect("localhost","root","");
      mysqli_select_db($con,"admin");
      $query="SELECT * FROM `election`";
      $res=mysqli_query($con,$query);
      while($row=mysqli_fetch_assoc($res))
      {
        $curid=$row['elec_id'];
        echo "<option name='$curid'>".$row['name']."</option>";
      }
       ?>
    </select>
    <input type="text" name='name' placeholder="Enter nominee name" required>
    <br/>Select nominee's image:<input type="file" name='photo' pl>
    <input type="text" name='party' placeholder="Enter Party name" required>
    <br/>Select logo of party:<input type="file" name='logo' pl>
    <input type="submit" value="Submit">
    <input type="reset" value="Reset all">
  </form>
</center>
<?php
if($_GET['error']==2)
{
  echo "<script>alert('Succcessfully added the nominee');</script>";
}
if($_GET['error']==1){
  echo "<script>alert('Error in adding the nominee');</script>";
}
include('footer.php');?>
