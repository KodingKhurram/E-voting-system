<?php
$cid=$_POST['vote'];
$phone=$_GET['phone'];
$eid=$_GET['eid'];
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'admin');
       $query="SELECT * FROM `candidate` WHERE `canid`='$cid' ";
       $res=mysqli_query($con,$query);
       $row=mysqli_fetch_assoc($res);
       $cvotes=$row['votes'];
       $cvotes=$cvotes+1;
       $query2="SELECT * FROM `registers` WHERE `phone`='$phone' ";
       $query1="UPDATE `candidate` SET `votes` = '$cvotes' WHERE `candidate`.`canid` = '$cid' ";
       $res1=mysqli_query($con,$query2);
       $row1=mysqli_fetch_assoc($res1);
      $cvid=$row1['vid'];
      echo $cvid.$row1['phone'];
  $query3="INSERT INTO `voters`(vid,phone,eid) VALUES('$cvid','$phone','$eid')";
  if(mysqli_query($con,$query3))
  {
  mysqli_query($con,$query1);
  echo "<script>window.location='voterpage.php?phone=".$phone." ';</script>";
  }
else {
  echo "error in uploading";
}
?>
