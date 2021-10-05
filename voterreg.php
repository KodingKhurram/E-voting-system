<!DOCTYPE html>
<html>
<head>
  <meta name="veiwport" content="width=device-width,initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="background-image: url('http://localhost/e-voting system/slider/a.jpeg');background-size: cover;">
    <center>
      <div style="display:block" class="popup">
        <div  style="width:70%;boder:5px solid black" class="popup-content">
    <?php
    $name=$_POST['uname'];
    $psw=$_POST['psw'];
    $phone=$_POST['ph_no'];
    $mail=$_POST['mail'];
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"admin");
    $ran=mt_rand(000000,999999);
    $secretkey="EVSU".$ran;
    $query="INSERT INTO `registers` (`name`,`password`,`phone`,`mail`,`vid`) VALUES('$name','$psw','$phone','$mail','$secretkey')";
    $query1="DELETE FROM `registers` WHERE `vid`='$secretkey' ";
    echo "$query";
    if(mysqli_query($con,$query))
    {
      echo "<h1>E-voting System<br/><br/>Hii...</h1><hr color='black' size='2' width='90%'><h1 style='font-family:cooper;color:maroon'>".$name."</h1><hr color='black' size='2' width='90%'>";
      echo "<h3>$mail<br/><br/>";
      echo "You Registered Succcessfully.....<br/>Your VoterID is : </h3>";
      echo "<h2><hr color='black' size='-1' width='90%'><font color='blue'>$secretkey</font><hr color='black' size='-1' width='90%'></h2>";
      echo "<h3>Note:- Remember Your <u>VoterID</u> to login to your account <font color='red'>(WARNING: don't show to anyone)</font></h3>";
    }
    else {
      echo "<script>window.location='index.php?error=2';</script>";
    }
    ?>
    <input type="reset" id="confirmation" style="background-color:red" onclick="confirmation2()" value="Unregister">
    <input type="submit" id="confirmation" value="Continue" onclick="confirmation()"><br/><br/>
    <script type="text/javascript">
    function confirmation()
    {
      if(confirm("After clicking 'OK' you won't be able to see your SecretKey again...!"))
      {
        <?php echo 'window.location="voterpage.php?name='.$name.'&phone='.$phone.' "  ';?>
      }
    }
    function confirmation2()
    {
      if(confirm("Do you really want to Unregister!..."))
      {
        window.location="index.php?error=4";
      }
    }
    </script>
</div>
</div>
</center>
</body>
</html>
