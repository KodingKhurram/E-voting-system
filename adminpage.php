<!DOCTYPE html>
<html>
<head>
  <meta name="veiwport" content="width=device-width,initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <a href="index.php" style="text-decoration:none;color:white"><div class='logout'>Logout</div></a><br/>
  <?php
  include('slider.php');?>
    <div style="background-color:#6495ed;width:100%;height:50px;">
<a id="menu" href='addelection.php'>Add election</a>
<a id="menu" href='findnominee.php'>Find nominee</a>
<a id='menu' href='addnewnominee.php'>Add nominee</a>
</div>
<center>
  <div class="popup-content" style="margin-top:20px;background-color:black;color:white;font-size:23px;">
<u><p>E-voting system</p></u>
  You are Admin you have rights to add a new election specify its date and add nominees for the perticular election.
</div>
</center>
<script type="text/javascript">
    var obj=document.querySelectorAll('#menu');
    console.log(obj);
    for (var i=0;i<obj.length;i++)
    {
        obj[i].style.display="inline-block";
      //  obj[i].style.backgroundColor="green";
        obj[i].style.width="220px";
        obj[i].style.height="40px";
        obj[i].style.position="relative";
        obj[i].style.borderRadius="20px";
      //  obj[i].style.border="5px solid black";
        obj[i].style.textAlign="center";
        obj[i].style.marginLeft = "3%";
        obj[i].style.textDecoration="none";
        obj[i].style.paddingTop="10px";
        obj[i].style.cursor="pointer";
        obj[i].style.fontSize='25px';
        obj[i].style.fontWeight='bold';
        obj[i].style.textDecoration='none';
        obj[i].style.color='white';
        obj[i].style.float='right';
        obj[i].onmouseover=function(){this.style.color='black';this.style.fontSize="30px";};
        obj[i].onmouseout=function(){this.style.color='white';this.style.fontSize="25px";};
    }
  </script>
  <?php include('footer.php');?>
