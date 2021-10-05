<!DOCTYPE html>
<html>
<head>
  <meta name="veiwport" content="width=device-width,initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <a href="index.php" style="text-decoration:none;color:white"><div class='logout'>Home</div></a><br/>
<center>
  <?php
  include('slider.php');?>
  <h1 style="color:white">Be a nominee</h1>
  <form style="margin-top:0px" class='popup-content' method='post' action="beanominee.php" enctype="multipart/form-data">
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
    <input type="text" name='name' placeholder="Enter Your name" required>
    <input type="password" name='password' placeholder="Enter a password">
    <input type='text' name='phone' placeholder="Enter your phone number">
    <input type='email' name='email' placeholder="Enter your email ID">
    <br/>Select nominee's image:<input type="file" name='photo' pl>
    <input type="text" name='party' placeholder="Enter Party name" required>
    <br/>Select logo of party:<input type="file" name='logo' pl>
    <input type="submit" value="Submit">
    <input type="reset" value="Reset all">
  </form>
</center>
<?php include('footer.php');?>
