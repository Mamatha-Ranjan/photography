<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Example of Bootstrap 3 Carousel Options</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
     $(".loader").fadeOut("slow");
});
</script>
<style type="text/css">

.carousel .item img{
    margin: 0 auto; /* Align slide image horizontally center */
}

</style>
<link rel="stylesheet" href="assets/css/customstyle.css">

	<style>
		.sectionscroll { 
			display: block; 
			width: 375px; 
			height: 800px; 
			float: left; 
			/*margin-left: 20px;*/ 
			/*opacity: .6;*/ 
			border-radius: 6px; 
		}

		
	</style>
</head>
<body class="workpagecls">
<div class="loader"></div>
<?php include 'conn.php'; ?>
<div class="bs-example">

   <?php include 'include/header.php'; ?>
    
    
    </div>
    
    
    	<div id="filler"></div>
    	
    		<div id="container">

		<div class="sectionscroll ">
		<span class="readmorebtn">CANDID</span>
		<img src="assets/img/frontend/book (5).jpg"/>
		</div>
		<div class="sectionscroll ">
		<span class="readmorebtn1">WEDDING</span>
		<img src="assets/img/frontend/wed.jpg"/>
		</div>
		<div class="sectionscroll "><span class="readmorebtn2">LANDSCAPE</span><img src="assets/img/frontend/book (6).jpg"/></div>
		<div class="sectionscroll "><span class="readmorebtn3">CLUB</span><img src="assets/img/frontend/book.jpg"/></div>

		<div class="sectionscroll "><span class="readmorebtn4">OTHERS</span><img src="assets/img/frontend/book3.jpg"/></div>
		

	</div>
    

<script src="assets/js/jquery.mousewheel.min.js"></script>
	<script>
		$(document).ready(function() {

			$('html, body, *').mousewheel(function(e, delta) {
				this.scrollLeft -= (delta * 40);
				e.preventDefault();
			});

		});
	</script>
</body>
</html>                                		