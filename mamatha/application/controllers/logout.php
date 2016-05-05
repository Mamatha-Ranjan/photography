<?php

class Logout extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }
        
        function index()
        {
        	$data["msg"] = "Successfully logged out!!!";
        	unset($_SESSION['userid']);
			//redirect('homepage', 'refresh');
			$this->load->view("login/login",$data);
		}
}
?>