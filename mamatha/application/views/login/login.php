<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        
    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
        	
            <div class="inner-bg">
            <div id="usernameerr" style="display: none;">
	        	<div class="alert alert-info fade in">
				    This Username does not exist.
				</div>
        	</div>
        	<div id="mismatcherr" style="display: none;">
        		<div class="alert alert-warning fade in">
				    This Username and Password does not match.
				</div>
        	</div>
        	
        	<?php if(isset($msg)) { ?> <div class="alert alert-info fade in">
				   <?php echo $msg; ?>.
				</div> <?php } else { $msg = "" ; } ?>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1>Login Form</h1>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Login to our site</h3>
                            		<p>Enter your username and password to log on:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-key"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="" method="post" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Username</label>
			                        	<input type="text" name="form-username" placeholder="Username..." class="form-username form-control" id="form-username">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="form-password" placeholder="Password..." class="form-password form-control" id="form-password">
			                        </div>
			                        <button type="submit" class="btn">Sign in!</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                        	<h3>...or login with:</h3>
                        	<div class="social-login-buttons">
	                        	<a class="btn btn-link-1 btn-link-1-facebook" href="#">
	                        		<i class="fa fa-facebook"></i> Facebook
	                        	</a>
	                        	<a class="btn btn-link-1 btn-link-1-twitter" href="#">
	                        		<i class="fa fa-twitter"></i> Twitter
	                        	</a>
	                        	<a class="btn btn-link-1 btn-link-1-google-plus" href="#">
	                        		<i class="fa fa-google-plus"></i> Google Plus
	                        	</a>
                        	</div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <script>
        	function ValidateLogin(username, password)
        	{
				$.ajax({
				  method: "POST",
				  url: "login/validateuser",
				  data: { username: username, password: password }
				})
				  .done(function( msg ) {
				    //alert( "Data Saved: " + msg );
				    if(msg=="error")
				    {
				    	
						$("#mismatcherr").show();
						$("#usernameerr").hide();
					}
					else if(msg=="emailnotexist")
					{
						$("#mismatcherr").hide();
						$("#usernameerr").show();
						
					}
					else if(msg=="success")
					{
						$("#mismatcherr").hide();
						$("#usernameerr").hide();
						$(location).attr('href','homepage');
					}
				  });
			}
        </script>
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>