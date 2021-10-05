<!DOCTYPE html>
<html>
<head>
  <meta name="veiwport" content="width=device-width,initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <a href="index.php" style="text-decoration:none;color:white"><div class='logout'>Logout</div></a><br/>
  <center>
  <?php
  error_reporting(0);
  include('slider.php');
  echo "<h1 style='color:white'>Elections for You</h1>";
  $phone=$_GET['phone'];
  $con=mysqli_connect("localhost","root","");
  mysqli_select_db($con,"admin");
  $query="SELECT * FROM `election`";
  $res=mysqli_query($con,$query);
  if($res->num_rows==0)
  echo "<h1 style='color:white'>There are no current elections for you...";
  else {
  echo "<table align='center' class='electiontable' border='2'>
   <tr color='brown'><th>Image</th>
   <th>Election name</th>
   <th>Date of election</th>
   <th></th></tr>
   <tr>";
  while($row=mysqli_fetch_assoc($res))
  {
    $e_id=$row['elec_id'];
    $curimg=$row['image'];
    $curelec=$row['name'];
    $date=$row['date'];
    if($date<date('Y-m-d')) continue;
     echo "<td><img src='images/$curimg' height='150' width='150' alt='Election image is not given'></td>
     <td>$curelec</td>";
     if($date==date('Y-m-d'))
     {
       echo "<td>Today</td>";
     }
     else
     {
     echo "<td>$date</td>";
     }
     echo '<td><a href="votepage.php?eid='.$e_id.'&uphone='.$phone.'  "><img class="votenow" src="icons/voteu.png" height="150" width="200"></a></td>';
     echo "</tr>";
  }
}
  if($_GET['error']==1)
  {
    echo "<script>alert('You have already voted for this election')</script>";
  }
  ?>
</table>
</center>
<?php include('footer.php');?>
</body>
