<?php
class Works extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                // Your own constructor code
                
                
        }
        
        //function to load dashboard
        function index()
        {
			$this->load->view("frontend/workpage");
		}
}		
?>