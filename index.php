
<?php

include("config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){

  $uname=$_POST['username'];
  $passwd=$_POST['password'];

  $sql="SELECT * FROM user_data WHERE User=(('".$uname."')) AND Pass =(('".$passwd."')) limit 0,1   ";
  //echo $sql;
  $result=mysqli_query($conn,$sql);
 $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
    
      if($count == 1) {
         #session_register("uname");
         $_SESSION['login_user'] = $uname;
        header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>




<html>
<head>
  <title>Ticket Booking</title>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

/* style the container */
.container {
  position: relative;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px 0 30px 0;
} 

/* style inputs and link buttons */
input,
.btn {
  width: 100%;
  padding: 12px;
  border: none;
  border-radius: 4px;
  margin: 5px 0;
  opacity: 0.85;
  display: inline-block;
  font-size: 17px;
  line-height: 20px;
  text-decoration: none; /* remove underline from anchors */
}

input:hover,
.btn:hover {
  opacity: 1;
}

/* add appropriate colors to fb, twitter and google buttons */
.fb {
  background-color: #3B5998;
  color: white;
}

.twitter {
  background-color: #55ACEE;
  color: white;
}

.google {
  background-color: #dd4b39;
  color: white;
}

/* style the submit button */
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

/* Two-column layout */
.col {
  float: centers;
  width: 50%;
  margin: auto;
  padding: 0 50px;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* vertical line */
.vl {
  position: absolute;
  left: 50%;
  transform: translate(-50%);
  border: 2px solid #ddd;
  height: 175px;
}

/* text inside the vertical line */
.vl-innertext {
  position: absolute;
  top: 50%;
  transform: translate(-50%, -50%);
  background-color: #f1f1f1;
  border: 1px solid #ccc;
  border-radius: 50%;
  padding: 8px 10px;
}

/* hide some text on medium and large screens */
.hide-md-lg {
  display: none;
}

/* bottom container */
.bottom-container {
  text-align: center;
  background-color: #666;
  border-radius: 0px 0px 4px 4px;
}

/* Responsive layout - when the screen is less than 650px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 650px) {
  .col {
    
    margin-top: 0;
  }
  /* hide the vertical line */
  .vl {
    display: none;
  }
  /* show the hidden text on small screens */
  .hide-md-lg {
    display: block;
    text-align: center;
  }
}
</style>
</head>
<body>

<center><h2>Ticket Booking</h2></center>

<div class="container">
  <form method = "POST" action = "#">
    <div class="row">
      <h2 style="text-align:center">Sign In</h2>
     
     
      <div class="col">
        <div class="hide-md-lg">
          <p>Or sign in manually:</p>
        </div>
        <input type="text" name="username" placeholder="Mail-Id" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
          
        </div>
       <center><div style = "font-size:11px; color:red; margin-top:10px"><?php echo $error; ?></div></center> 
    </div>
  </form>
</div>

<div class="bottom-container">
  <div class="row">
    <div class="col">
      <a href="sign.php" style="color:white" class="btn">Sign up</a>
    </div>
    <div class="col">
      <a href="forget.php" style="color:white" class="btn">Forgot password?</a>
    </div>
  </div>
</div>

</body>
</html>
