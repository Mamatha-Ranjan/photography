<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.../assets/js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <?php //include './includes/header.php';?>
        <?php include '/./../includes/header.php';?>
      

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add Images
                           <!-- <small>Subheading</small>-->
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Add Images
                            </li>
                        </ol>
                        <div class="jumbotron">
                    	<div id="uploaded"></div>
<div  id="upload_progress"></div>
<form enctype="multipart/form-data" method="POST">
<input class="but" type="file" id="file" multiple="multiple" name="file"/>
</form>
<div id="info"></div>

<br/><br/>
<div id="preview">
	<?php $sql = mysqli_query($conn , "select * from home_page_slider_images");
						while($res = mysqli_fetch_array($sql))
						{
							$id = $res['id'];
							$path = $res['path'];
							?>
							<span id="<?php echo $id; ?>">
							<img src="../homepageslider/<?php echo $path; ?>" alt="imagename" />
							<span style="cursor: pointer;" onclick="deleteimg(<?php echo $id; ?>)">X</span></span>
							<?php
						}
						
						?>
</div>
</div>

                </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../assets/js/bootstrap.min.js"></script>
    
    <!--upload multiple images-->
    <script type="text/javascript" src="../assets/js/upload.js"></script>

	<script>
		function deleteimg(str)
		{
			$.ajax({
			  method: "POST",
			  url: "deleteimg",
			  data: { id: str }
			})
			  .done(function( msg ) {
			    //alert( "Data Saved: " + msg );
			    $("#"+str).remove();
			  });
		}
	</script>
</body>

</html>
