<!DOCTYPE html>
<html>
<head>
  <meta name="veiwport" content="width=device-width,initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <?php
  $eid=$_GET['eid'];
  $phone=$_GET['uphone'];
  echo '<a href="voterpage.php?phone='.$phone.'" style="text-decoration:none;color:white">';?><div class='logout'>Home</div></a><br/>
<center>
  <?php
  include('slider.php');
  $con=mysqli_connect('localhost','root','');
  mysqli_select_db($con,'admin');
  $query="SELECT * FROM `election` WHERE `elec_id`='$eid' ";
  $res=mysqli_query($con,$query);
  $row=mysqli_fetch_assoc($res);
  echo "<h1 style='color:white'>".$row['name']."</h1>";
  $query1="SELECT * FROM `voters`";
  $res1=mysqli_query($con,$query1);
  while($row1=mysqli_fetch_assoc($res1))
  {
    $ceid=$row1['eid'];
    $cphone=$row1['phone'];
    if($ceid==$eid && $cphone==$phone)
    {
      echo '<script>window.location="voterpage.php?phone='.$phone.'&error=1 ";</script>';
    }
  }
  ?>
  <div id='today' style="background-color:green;visibility:hidden;color:white">
    <h1>Time remaining</h1>
    <hr color='white' size='3' width='40%'>
    <h3 id='todaytime'></h3>
</div>
<div id='comingsoon' style="visibility:hidden;background-color:black;color:white;width:30%;border:2px solid white;border-radius:10px">
<h1>Coming soon</h1>
<hr color='white' size='3' width='90%'>
<h3 id='comingtime'></h3>
</div>
<?php
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'admin');
$query="SELECT * FROM `election` WHERE `elec_id`='$eid' ";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($res);
  $date=$row['date'];
  $chunk=preg_split('/\-/',$date);
  switch($chunk[1])
  {
    case 1:$month="Jan";break;
    case 2:$month="Feb";break;
    case 3:$month="Mar";break;
    case 4:$month="Apr";break;
    case 5:$month="May";break;
    case 6:$month="Jun";break;
    case 7:$month="Jul";break;
    case 8:$month="Aug";break;
    case 9:$month="Sep";break;
    case 10:$month="Oct";break;
    case 11:$month="Nov";break;
    case 12:$month="Dec";break;
  }
  $day=$chunk[2];
  $year=$chunk[0];
  if($day==date('d') && $month==date('M'))
  {
    ?><script>
      document.getElementById('today').style.visibility='visible';
    var countDownDate = <?php echo "new Date('$month $day,$year 18:00:00').getTime(); ";?>
    var x = setInterval(function() {

      var now = new Date().getTime();
      var distance = countDownDate - now;

      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
      if (seconds<=0 && minutes<=0 && hours<=0) {
        alert('voting time Expired');
        <?php echo "window.location='voterpage.php?phone=$phone' ";?>;
        clearInterval(x);
      }
      else {
        document.getElementById('todaytime').innerHTML =hours + 'h: ' + minutes + 'm: ' + seconds + 's ';
      }
      if(hours<1)
      {
        document.getElementById('today').style.backgroundColor='red';
      }
    }, 1000);
  </script>
    <?php
    mysqli_select_db($con,'admin');
    $query1="SELECT * FROM `candidate` WHERE `eid`='$eid'";
    $res=mysqli_query($con,$query1);
    $i=1;
    if($res->num_rows==0)
    echo "<h1 style='color:white'>There are no nominees for this election...</h1>";
    else
    {
    echo '<form class="sub" style="width:auto;margin-top:-100px" action="votecount.php?phone='.$phone.'&eid='.$eid.' " method="post">
    <table align="center" border="5" class="electiontable">
    <tr>
      <th>Sl no</th>
      <th>Name</th>
      <th>Photo</th>
      <th>Party</th>
      <th>Symbol</th>
      <th></th>
    </tr>';
    while ($row=mysqli_fetch_assoc($res))
    {
      $curphoto=$row['photo'];
      $curparty=$row['party'];
      $curlogo=$row['logo'];
      $candid=$row['canid'];
      $curcan=$row['name'];?>
      <tr>
      <?php
      echo "<td>$i</td>
      <td>$curcan</td>
      <td><img src='images/$curphoto' height=100 width=100></td>
      <td>$curparty</td>
      <td><img src='images/$curlogo' height=100 width=100></td>
      <td><label for='$candid' class='votes' ><input type='radio' name='vote' value='$candid' id='$candid' unchecked>"?><img src='icons/votetick.png' height='100' width='100'></label></td>
      <?php
      $i++;
    }
    echo "</table><input type='submit' value='Submit'></form>";
  }
}
else {
  ?>
  <script>
var elem=document.getElementById('comingsoon');
elem.style.visibility='visible';
var countDownDate = <?php echo "new Date('$month $day,$year 5:00:00').getTime();";?>
var x = setInterval(function() {

  var now = new Date().getTime();
  var distance = countDownDate - now;

  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  if(distance < 0)
  {
    clearInterval(x);
    alert("You are free to vote");
    <?php echo "window.location='voterpage.php?phone=$phone' ";?>;
  }
else
  document.getElementById('comingtime').innerHTML =days + 'd: ' + hours + 'h: ' + minutes + 'm: ' + seconds + 's ';
}, 1000);<?php }
?>
</script>
</center>
<?php include('footer.php');?>
</body>
</html>
