<!DOCTYPE html>
<html>
<head>
  <meta name="veiwport" content="width=device-width,initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class='logout'><a href="adminpage.php">Home</a></div><br/>
  <?php
  error_reporting(0);
  include('slider.php');?>
  <center>
    <h1 style="color:white"> Add a new election</h1>
    <form style="margin-top:0px" class="popup-content" action="addelectiondb.php" method="post" enctype="multipart/form-data"><br>
      <input type="text" name='ename' placeholder="enter the election name" required>
    <br/>Select election image:<input type="file" name='photo' pl>
      <br/><br/>Set election date:<input name='edate' type="date" required>
      <input type="submit" value="Submit">
      <input type="reset" value="Reset all">
    </form>
  </center>
  <?php
  if($_REQUEST['error']==2)
  {
    echo "<script>alert('The election is added succesfully');</script>";
  }
  elseif ($_REQUEST['error']==1) {
    echo "<script>alert('There is a problem in adding election');</script>";
  }
  include('footer.php');
  ?>
