<?php 
  session_start(); 
  

  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
  
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link rel="stylesheet" href="style_index.css"/>
  <style>
    * {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 500px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
    /*footer*/
.footer {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 20px 10px;
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
}
.footer a {
    background-color : blue;
    float: left;
    color: white;
    text-align: center;
    padding: 12px;
    text-decoration: none;
    font-size: 18px;
    line-height: 15px;
    border-radius: 40px;
  }
.footer a:hover {
    background-color: #ddd;
    color: black;
  }
  
  /* Style the active/current link*/
  .footer a.active {
    background-color: dodgerblue;
    color: white;
  }
  
  /* Float the link section to the right */
  .facebook {
    float : right;
    text-align: center;
  }

</style>
</head>
<body>
<div class="header">
  <a href="#default" class="logo">BOOK CENTER</a>
  <a >	<marquee height="20px">A perfect place to search books and sell</marquee></a>
  <div class="header-right">
    <a class="active" href="#home">Home</a>
    <a href="sell.php">Sell book</a>
	<a href="buy.php">Buy Books</a>
	<a href="search.php">Search people</a>
	<?php
  if(isset($_SESSION['id']) ){
    $hid=$_SESSION['id'];
	echo "<a href='about.php?varname=$hid'>About</a>";
  
echo"	<a href='index.php?logout='1'' style='color: red;'>logout</a>";} ?>
  </div>
</div>
<div class="column">
<h2>Sample slide</h2>
<p>Dream comes true</p>

<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 4</div>
  <img src="a.jpg" style="width:100%">
  <div class="text">Caption Text</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 4</div>
  <img src="b.jpg" style="width:100%">
  <div class="text">Caption Two</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 4</div>
  <img src="c.jpg" style="width:100%">
  <div class="text">Caption Three</div>
</div>
<div class="mySlides fade">
  <div class="numbertext">4/ 4</div>
  <img src="d.jpg" style="width:100%">
  <div class="text">Caption Three</div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); // Change image every 2 seconds
}
</script>
</div>
<div class="footer">
<div class ="facebook">
  <a href = #>facebook</a>
  <a href = #>youtube</a>
  <a href = #>instragramk</a>
  <a href = #>linked in</a>
  <a href = #>Privecy policy</a>
</div>
</div>

</body>
</html>