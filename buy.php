<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
 	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
 }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>


<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "project");
  $result = mysqli_query($db, "SELECT * FROM image_upload");
?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<link rel="stylesheet" href="style_index.css"/>
<style type="text/css">
   #content{
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 300px;
   	height: 140px;
   }
</style>
</head>
<body>
<body>
<div class="header">
  <a href="#default" class="logo">BOOK CENTER</a>
 <a><marquee height="20px">A perfect place to search books and sell</marquee></a>
  <div class="header-right">
    <a  href="index.php">Home</a>
    <a  href="sell.php">Sell book</a>
	<a  class="active" href="buy.php">Buy Books</a>
	<a href="search.php">Search people</a>
	<?php $hid=$_SESSION['id']; 
	echo"'<a href='about.php?varname=$hid'>About</a>'"?>
	<a href="index.php?logout='1'" style="color: red;">logout</a>
  </div>
</div>
<div id="content">
  <?php
    while ($row = mysqli_fetch_array($result)) {
        $imgid= $row['id'];
        $sqli="SELECT username FROM regis WHERE   id = '$imgid' ";
        $name = mysqli_fetch_assoc(mysqli_query($db, $sqli));
        $n=$name['username'];
        echo"'<h2>contact with <a href='about.php?varname=$imgid'class ='button' color='blue' > ".$n."</a> for more</h2>'";
       
      echo "<div id='img_div'>";
          echo "<img src='image/".$row['image']."' >";
      	echo "<p>".$row['image_text']."</p>";
      echo "</div>";
      if(1){
    echo'<form method="POST" action="sell.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="100">
  	<div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="2" 
      	name="comments" 
      	placeholder="Comment ..."></textarea>
  	</div>
  	<div>
  		<button type="submit" name="comment">COMMENT</button>
  	</div>
  </form>';}

    }
  ?>
</div>
</body>
</html>