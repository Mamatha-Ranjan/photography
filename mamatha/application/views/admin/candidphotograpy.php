<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Candid Photography</title>

    <!-- Bootstrap Core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>
<style>
	input[type="file"] {
 
 display:block;
}
.thumbnail {
 max-height: 75px;
 border: 2px solid;
 margin: 10px 10px 0 0;
 padding: 1px;
 }
</style>
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
                            Candid Photography
                           <!-- <small>Subheading</small>-->
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Candid Photography
                            </li>
                        </ol>
                        <div class="jumbotron">
                    		
							 <form id="uploadForm" action="<?php echo base_url();?>homepage/add_portrait" method="post" enctype="multipart/form-data">
									  <div class="form-group">
									    <label for="exampleInputEmail1">Portrait Title</label>
									    <input type="text" class="form-control" id="name" name="name" placeholder="Title">
									  </div>
									  <div class="form-group">
									    <label for="exampleInputPassword1">Description</label>
									    <textarea class="form-control" rows="3" name="desc" id="desc"></textarea>
									  </div>
									  <div class="form-group">
									    <label for="backimg">Background Image</label>
									   	<input type='file' id="imgInp" name="imgname" />
									   	<input type='hidden' id="imgname"/>
									   	 <span id="imgtag" style="display: none;"><img id="blah" height="200" width="200" src="#" alt="your image" /></span>
									  </div>
									  
									  <div class="form-group">
									    <label for="backimg">Images</label>
									   	<input class="but" type="file" id="files" multiple="multiple" name="files[]"/>
									   	<output id="result" />
									   	<input type='hidden' id="imgnamemul"/>
									   	<div id="info"></div>
									   	 <div id="preview"></div>
									  </div>
									  
									  <button type="submit" class="btn btn-default">Submit</button>
									</form>
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
    <!--<script type="text/javascript" src="../assets/js/upload.js"></script>-->
    <!--<script type="text/javascript" src="../assets/js/upload_multiple.js"></script>-->

	<script>
		function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
            	$("#imgtag").show();
                $('#blah').attr('src', e.target.result);
                $("#imgname").val($('#imgInp').val());
               //data-toggle="pill"
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    
    $("#imgInp").change(function(){
        readURL(this);
    });
     
    
    
    
    
	$(document).ready(function (e){
			$("#uploadForm").on('submit',(function(e){
				
				name = $("#name").val();
				desc = $("#desc").val();
				
				e.preventDefault();
				$.ajax({
					url: "<?php echo base_url();?>homepage/add_portrait",
					type: "POST",
					data:  new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success: function(data){
						console.log( "Data Saved: " + data );
						/*$("#addcandimg").removeClass("disabled");
						$("#home").removeClass("in active");
						 $("#imganchor").attr("data-toggle","pill"); 
						 $("#addcandimg").addClass('active');
						 $("#menu1").addClass('in active');*/
						 
					},
				error: function(){} 	        
				});
				}));
		});
	</script>
	<script type="text/javascript">
/*$(document).ready(function() {
 
 if(window.File && window.FileList && window.FileReader) {
 $("#files").on("change",function(e) {
 var files = e.target.files ,
 filesLength = files.length ;
 for (var i = 0; i < filesLength ; i++) {
 var f = files[i]
 var fileReader = new FileReader();
 fileReader.onload = (function(e) {
 var file = e.target;
 $("<img></img>",{
 class : "thumbnail",
 src : e.target.result,
 title : file.name
 }).insertAfter("#files");
 });
 fileReader.readAsDataURL(f);
 }
});
 } else { alert("Your browser doesn't support to File API") }
});*/
 
 window.onload = function(){
        
    //Check File API support
    if(window.File && window.FileList && window.FileReader)
    {
        var filesInput = document.getElementById("files");
        
        filesInput.addEventListener("change", function(event){
            
            var files = event.target.files; //FileList object
            var output = document.getElementById("result");
            
            for(var i = 0; i< files.length; i++)
            {
                var file = files[i];
                
                //Only pics
                if(!file.type.match('image'))
                  continue;
                
                var picReader = new FileReader();
                
                picReader.addEventListener("load",function(event){
                    
                    var picFile = event.target;
                    
                    var div = document.createElement("div");
                    
                    div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
                            "title='" + picFile.name + "'/> <a href='#' class='remove_pict'>X</a>";
                    
                    output.insertBefore(div,null);   
                    div.children[1].addEventListener("click", function(event){
                       div.parentNode.removeChild(div);
                       removeLine(this);
                    });         
                
                });
                
                 //Read the image
                picReader.readAsDataURL(file);
            }                               
           
        });
    }
    else
    {
        console.log("Your browser does not support File API");
    }
}

function removeLine(obj)
{
  inputFile.val('');
  var jqObj = $(obj);
  var container = jqObj.closest('div');
  var index = container.attr("id").split('_')[1];
  container.remove(); 

  delete finalFiles[index];
  //console.log(finalFiles);
}
    
 
</script>
</body>

</html>
