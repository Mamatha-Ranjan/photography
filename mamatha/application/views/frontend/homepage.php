<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Example of Bootstrap 3 Carousel Options</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/customstyle.css">
<link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".loader").fadeOut("slow");
     $("#myCarousel").carousel({
         interval : 6000,
         pause: false
     });
});

</script>

<style type="text/css">

/*.carousel{
    background: #2f4357;
    /*margin-top: 20px;
}*/
.carousel .item img{
    margin: 0 auto; /* Align slide image horizontally center */
}
.bs-example{
	/*margin: 20px;*/
}
</style>
</head>
<body>
<div class="loader"></div>
<?php include 'conn.php'; ?>
<div class="bs-example">
   <?php include 'include/header.php'; ?>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        
    	<!-- Carousel indicators -->
        <ol class="carousel-indicators">
        	<?php
        	$sql1 = mysqli_query($conn , "select * from home_page_slider_images");
        				$ii = 0;
						while($res1 = mysqli_fetch_array($sql1))
						{
							?>
							 <li data-target="#myCarousel" data-slide-to="<?php echo $ii; ?>" class="<?php if($ii=="0") { ?>active <?php } ?>"></li>
					<?php
						$ii++;
						}
        	?>
        </ol>   
        <!-- Wrapper for carousel items -->
        <div class="carousel-inner">
        	<?php
        	$sql = mysqli_query($conn , "select * from home_page_slider_images");
        	$i = 1;
						while($res = mysqli_fetch_array($sql))
						{
							$id = $res['id'];
							$path = $res['path'];
							?>
							 <div class="<?php if($i=="1") { ?>active <?php } ?> item">
				                <img src="homepageslider/<?php echo $path; ?>" alt="First Slide">
				         		<!--<div class="carousel-caption">
				                  <h3>First slide label</h3>
				                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				                </div>-->
				            </div>
					<?php
						$i++;
						}
        	?>
        </div>
        <!-- Carousel controls -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>
</body>
</html>                                		