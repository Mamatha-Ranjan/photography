<?php
class Homepage extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                // Your own constructor code
                
                
        }
        
        //function to load dashboard
        function index()
        {
			$this->load->view("admin/homepage");
		}
		
		//function to show add images page in admin dashboard
		function addhomeimages()
		{
			$this->load->view("admin/homepageimage");
		}
		
		//function to upload home page slider images
		function upload()
		{
			include 'conn.php';
			$pushar = array();
			$user_session_id=1; // Unique id refers user profile
			foreach ($_FILES["file"]["error"] as $key => $error){
			    if ($error == UPLOAD_ERR_OK){
				    $time=time();  // time on creation
				    $curtime = date("Y-m-d h:i:s");
					$random_num=rand(00,99);  // random number
			        $name = $time.$random_num.$_FILES["file"]["name"][$key]; // avoid same file name collision
			        $name1 = str_replace('-', '', $name);
			        if(move_uploaded_file( $_FILES["file"]["tmp_name"][$key], "homepageslider/" . $name1))
					{
					mysqli_query($conn ,"INSERT INTO home_page_slider_images (path, uploadtime) VALUES('$name1','$curtime')");
				
					}
					else
					{
					echo "0";
					//exit;
			    }
			    
				}
				}
				$sql = mysqli_query($conn , "select * from home_page_slider_images");
						while($res = mysqli_fetch_array($sql))
						{
							$idandpath = $res['id']."-".$res['path'];
							array_push($pushar , $idandpath);
						}
					//	var_dump($pushar);
					echo	json_encode($pushar);
		}
		
		//function to upload multiple images for candid photography
		function upload_candid_images()
		{
			include 'conn.php';
			$pushar = array();
			$user_session_id=1; // Unique id refers user profile
			foreach ($_FILES["file"]["error"] as $key => $error){
			    if ($error == UPLOAD_ERR_OK){
				    $time=time();  // time on creation
				    $curtime = date("Y-m-d h:i:s");
					$random_num=rand(00,99);  // random number
			        $name = $time.$random_num.$_FILES["file"]["name"][$key]; // avoid same file name collision
			        $name1 = str_replace('-', '', $name);
			        if(move_uploaded_file( $_FILES["file"]["tmp_name"][$key], "candid/" . $name1))
					{
					mysqli_query($conn ,"INSERT INTO candid_images (image_name, uploadtime) VALUES('$name1','$curtime')");
						
					}
					else
					{
					echo "0";
					//exit;
			    }
			    
				}
				}
				
		}
		
		//delete perticular image after uploading
		function deleteimg()
		{
			include 'conn.php';
			$idd = $this->input->post('id');
			$sql = mysqli_query($conn , "DELETE FROM home_page_slider_images WHERE id = '".$idd."'");
			if($sql)
			{
				echo "succ";
			}
			else{
				echo "err";
			}
		}

		//function to load candid photography page
		function candidphoto()
		{
			$this->load->view("admin/candidphotograpy");
		}
		
		//function to add candid photography portraits
		function add_portrait()
		{
			include 'conn.php';
			$name = $this->input->post('name');
			$desc = $this->input->post('desc');
			//$imgname = $this->input->post('imgname');
			$imgname = $_FILES['imgname']['name'];
			$imgname1[] = $_FILES['files']['name'];
			
			for ($i = 0; $i < count($_FILES['files']['name']); $i++) {
				$filesname = $_FILES['files']['name'][$i];
				var_dump($filesname);
				$time=time();  // time on creation
				$random_num=rand(00,99);  // random number
				$filename = $time.$random_num.$imgname; // avoid same file name collision
				$name1 = str_replace('-', '', $filename);
				if (move_uploaded_file($_FILES["files"]["tmp_name"][$i], "candid/". $name1)) {
						echo "succ";
					} else {
				   echo $_FILES["files"]["error"];
				}
				}
			
			exit;
			if($imgname!="")
			{
				$time=time();  // time on creation
				$random_num=rand(00,99);  // random number
				$filename = $time.$random_num.$imgname; // avoid same file name collision
				$name1 = str_replace('-', '', $filename);
				if (move_uploaded_file($_FILES["imgname"]["tmp_name"], "candid/". $name1)) {
				    //echo "Uploaded";
				    mysqli_query($conn ,"INSERT INTO candid_photography (name, description, background_image) VALUES('$name','$desc', '$name1')");
				    echo "succ";
				} else {
				   echo $_FILES["imgname"]["error"];
				}
			}
			else{
				mysqli_query($conn ,"INSERT INTO candid_photography (name, description, background_image) VALUES('$name','$desc', '')");
				echo "succ";
			}
		}
}
?>