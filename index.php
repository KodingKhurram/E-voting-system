<html>
<head>
  <title>Home</title>
  <meta name="veiwport" content="width=device-width,initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <?php include('slider.php');?>
    <fieldset>
    <legend><h1 style="color:white">E-voting System</h1></legend>
        <a id="menu" onclick="document.getElementById('logpopup1').style.display='block'"><img src="icons/admin.png" height="200" width="200">Admin</a>
        <div id="logpopup1" class="popup">
          <center>
          <form class="popup-content" action="adminlogvar.php" method="post"><br>
              <img src="icons/admin.png" width="200" height="200" class="avatar">
              <span onclick="document.getElementById('logpopup1').style.display='none';window.location='index.php'" class="close" title="Close PopUp">&times;</span>
              <h1 style="text-align: center">Admin's Login</h1>
              <input type="text" placeholder="Enter Adminname" name="name" required>
              <input type="password" placeholder="Enter Password" name="pword" required>
              <input type="submit" value="Login">
                <input type="reset" value="Reset">
                <?php
                error_reporting(0);
                $error=$_GET['error'];
                if($error==1)
                echo "<script>var showerror=document.getElementById('logpopup1');
                showerror.style.display='block';</script><h3 style='color: red'>Unable to login<br/> check your password and try again...</h3>";
                ?>
          </form>
        </center>
        </div>
        <a id="menu" onclick="document.getElementById('logpopup2').style.display='block'"><img src="icons/voter.png" height="200" width="200">Voter</a>
        <div id="logpopup2" class="popup">
          <center>
          <form class="popup-content" action="voterreg.php" method="post"><br>
              <img src="icons/voter2.png" width="200" height="200" class="avatar">
              <span onclick="document.getElementById('logpopup2').style.display='none';window.location='index.php'" class="close" title="Close PopUp">&times;</span>
              <h1 style="text-align:center">Voter's Register</h1>
              <input type="text" placeholder="Enter Username" name="uname" required>
              <input type="password" placeholder="Enter Password" name="psw" required>
              <input type="password" placeholder="Re-Enter Password" name="re_psw" required>
              <input type="text" placeholder="Enter your phone number" name="ph_no" required>
              <input type="email" placeholder="Enter your E-mail ID" name="mail" required>
              <input type="submit" value="Register">
              <input type="reset" value="Reset">
              <hr size="-1" width="70%" color="black"/>
              <u style="color: darkviolet">Already registered?Login here</u>
              <input style="background-color: blue" type="submit" value="Login" onclick="voterlogin()">
              <?php
              error_reporting(0);
              $error=$_GET['error'];
              if($error==2)
              echo "<script>var showerror=document.getElementById('logpopup2');
              showerror.style.display='block';</script><h3 style='color: red'>Unable to login<br/> check your Phone number, E-mail and try again...</h3>";
              ?>
              <?php
              error_reporting(0);
              $error=$_GET['error'];
              if($error==4)
              echo "<script>var showerror=document.getElementById('logpopup2');
              showerror.style.display='block';</script><h3 style='color: blue'>You are Unregistered from E-voting system</h3>";
              ?>
            </form>
        </center>
        </div>
        <div id="logpopup3" class="popup">
          <center>
          <form class="popup-content" action="voterloginvar.php" method="post"><br>
              <img src="icons/voter2.png" width="200" height="200" class="avatar">
              <span onclick="document.getElementById('logpopup3').style.display='none';window.location='index.php'" class="close" title="Close PopUp">&times;</span>
              <h1 style="text-align:center">Voter's Login</h1>
              <input type="text" placeholder="Enter Username" name="name" required>
              <input type="password" placeholder="Enter Password" name="psw" required>
              <input type="password" placeholder="Enter VoteID" name="key" required>
              <input type="submit" value="Login">
              <input type="reset" value="Reset">
              <?php
              error_reporting(0);
              $error=$_GET['error'];
              if($error==3)
              echo "<script>var showerror=document.getElementById('logpopup3');
              showerror.style.display='block';</script><h3 style='color: red'>Unable to login<br/> check your Password, Secret key and try again...</h3>";
              ?>
            </form>
        </center>
        </div>
        <a id="menu" onclick="document.getElementById('logpopup4').style.display='block'"><img src="icons/candidate.png" height="200" width="200">Candidate</a>
        <div id="logpopup4" class="popup">
          <center>
          <form class="popup-content" action="candidatelogver.php" method="post"><br>
              <img src="icons/candidate.png" width="200" height="200" class="avatar">
              <span onclick="document.getElementById('logpopup4').style.display='none';window.location='index.php'" class="close" title="Close PopUp">&times;</span>
              <h1 style="text-align:center">Candidates Login</h1>
              <input type="text" placeholder="Enter Username" name="uname" required>
              <input type="password" placeholder="Enter Password" name="psw" required>
              <input type="password" placeholder="Enter the NomineeID" name="key" required>
              <input type="submit" value="Login">
              <input type="reset" value="Reset">
              <hr size="-1" width="70%" color="black"/>
              <input style="background-color: purple" type="submit" value="Be a Nominee for Election" onclick="candidatereg()">
              <?php
              error_reporting(0);
              $error=$_GET['error'];
              if($error==5)
              echo "<script>var showerror=document.getElementById('logpopup4');
              showerror.style.display='block';</script><h3 style='color: red'>You doesn't seem to be a candidate<br/> check your Password, NomineeID and try again...</h3>";
              ?>
          </form>
        </center>
        </div>
    </fieldset>
    <script type="text/javascript">
        var obj=document.querySelectorAll('#menu');
        console.log(obj);
        for (var i=0;i<obj.length;i++)
        {
            obj[i].style.display="inline-block";
            obj[i].style.backgroundColor="white";
            obj[i].style.width="220px";
            obj[i].style.height="230px";
            obj[i].style.position="relative";
            obj[i].style.borderRadius="20px";
            obj[i].style.border="5px solid black";
            obj[i].style.textAlign="center";
            obj[i].style.marginLeft = "10%";
            obj[i].style.marginTop = "1%";
            obj[i].style.textDecoration="none";
            obj[i].style.paddingTop="10px";
            obj[i].style.cursor="pointer";

        }
        function voterlogin()
        {
          document.getElementById('logpopup2').style.display='none';
          document.getElementById('logpopup3').style.display='block';
        }
        function candidatereg()
        {
          window.location="nominee.php"
        }
    </script>
    <?php   include('footer.php');?>
</body>
</html>
