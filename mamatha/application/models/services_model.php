<?php
class Services_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
  
  	function validate_user($username, $password)
  	{
		$sql1 = $this->db->query("select * from users where username='".$username."'");
		  if($sql1->row_array()>0)
		  {
			  $sql = $this->db->query("select * from users where username='".$username."' and password='".$password."'");
			  if($sql->row_array()>0)
			  {
			  	
			  	$row = $sql->row();
			  	$idd = $row->id;
			  	$_SESSION['userid'] = $idd;
			  	return "succ";
			  }
			  else{
			  	return "err";
			  }
			}
			else{
				return "err1";
			}
	}  
 }
?>