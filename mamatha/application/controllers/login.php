<?php
class Login extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                // Your own constructor code
                $this->load->model('services_model');
        }
        
        function index()
        {
			$this->load->view("login/login");
		}
		
		function validateuser()
		{
			$username = $this->input->post("username");
			$password = $this->input->post("password");
			
			$data['info'] = $this->services_model->validate_user($username, $password);
			if($data['info']=="succ")
			{
				echo "success";
			}
			else if($data['info']=="err1")
			{
				echo "emailnotexist";
			}
			else{
				echo "error";
			}
		}
}
?>