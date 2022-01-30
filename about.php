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
  if (isset($_POST['feed']))
  {
      $_GET['varname']=$_SESSION['varname'];
      $imgid = $_GET['varname'];
      $feed = mysqli_real_escape_string($db,$_POST['report']);
      echo $feed;
      $sq = "INSERT INTO report (id , text) VALUES ($imgid, $feed)";
      mysqli_fetch_assoc (mysqli_query($db , $sq));
  }
  $imid= $_GET['varname'];
  $_SESSION['varname']= $imid;
 
    $imgid = $_SESSION['varname'];
  //$db = mysqli_connect('localhost', 'root', '', 'project');
  $sql = "SELECT * FROM regis WHERE id = $imgid";
  $result = mysqli_fetch_assoc(mysqli_query($db , $sql));

  if (isset($_POST['feed']))
  {
      $feed = mysqli_real_escape_string($db,$_POST['report']);
      $sq = "INSERT INTO report (id , text) VALUES ($imgid, $feed)";
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
    <a href="#home">Home</a>
    <a href="sell.php">Sell book</a>
	<a href="buy.php">Buy Books</a>
    <a href="search.php">Search people</a>
    <?php $hid=$_SESSION['id']; 
	echo"'<a class='active' href='about.php?varname=$hid'>About</a>'"?>
	<a href="index.php?logout='1'" style="color: red;">logout</a>
  </div>
</div>
<div id = "content">
  <h4 color = "blue">PROFILE</h4>
  <br> <br>
  <h2>
  Name = <?php echo $result['username']?>
  <br> <br>
  Email id = <?php echo $result['email']?>
  <br> <br>
  Phone number = <?php echo $result['phone']?>
  <br> <br>
  Department = <?php echo $result['department']?>
  <br> <br>
</h2>
  <form method="POST" action="about.php" enctype="multipart/form-data" style ="float:right">
  	<div>
      <textarea 
      	id="text" 
      	cols="60" 
      	rows="2" 
      	name="report" 
      	placeholder="Give Us Feed back About This User"></textarea>
  	</div>
  	<div>
  		<button type="submit" name="feed">REPORT</button>
  	</div>
  </form>

</div>

</body>
</html>