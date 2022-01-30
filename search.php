<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
 	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
 }
  if (isset($_GET['logout'])) {
  	session_destroy();
      unset($_SESSION['username']);
      unset($_SESSION['varname']);
  	header("location: login.php");
  }
  $db = mysqli_connect('localhost', 'root', '', 'project');
  
  $sql = "SELECT * FROM regis WHERE 1";
  $r = mysqli_query($db , $sql);

  if (isset($_POST['feed']))
  {
      $feed = mysqli_real_escape_string($db,$_POST['report']);
      $sq = "INSERT INTO report (id , text) VALUES ('$imgid', '$feed')";
      mysqli_query($db,$sq);
  }

?>
<!DOCTYPE html>
<html>
<head>
	<title>ABOUT</title>
    <link rel="stylesheet" href="style_index.css"/>
    <style type="text/css">
   #content{
   	width: 50%;
   	margin: 20px auto;
    border: 1px solid #cbcbcb;
    background: lightblue;   
   }
   </style>
	
</head>
<body>
<div class="header">
  <a href="#default" class="logo">BOOK CENTER</a>
  <a  color="red">	<marquee height="20px">A perfect place to search books and sell</marquee></a>
  <div class="header-right">
    <a href="index.php">Home</a>
    <a href="sell.php">Sell book</a>
	<a href="buy.php">Buy Books</a>
    <a class="active" href="#contact">Search people</a>
    <?php $hid=$_SESSION['id']; 
	echo"'<a  href='about.php?varname=$hid'>About</a>'"?>
	<a href="index.php?logout='1'" style="color: red;">logout</a>
  </div>
</div>
<div id = "content">
  <h4 color = "blue">PROFILE</h4>
  <br> <br>
 <?php while($result = mysqli_fetch_array($r)){

  echo "<h2>";
  echo "Name = " .$result['username'];
  echo "<br> <br>";
  echo "Email id = ".$result['email']; 
  echo "<br> <br>";
  echo "Phone number =  ".$result['phone'];
  echo "<br> <br>";
  echo "Department =  ".$result['department'];
  echo "<br>";
  echo "</h2><br> <br>";
  echo '<form method="POST" action="about.php" enctype="multipart/form-data" style ="float:left">
  <div>
    <textarea 
      id="text" 
      cols="60" 
      rows="2" 
      name="report" 
      placeholder="Give Us Feed back About This User"></textarea>
  </div>
  <div>
  		<button type="submit" name="feed" style="color:red; background-color:blue;">REPORT</button>
  	</div>
    </form>
  ';
  echo "<br> <br>";
  echo "<br> <br>";
  } ?>
  
  	
  

</div>

</body>
</html>