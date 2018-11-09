	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class of Recipe controller
 * 
 * @author: Tero Pelkonen, Larissa Sepperer
 */

class Users extends CI_Controller 
{

	/**
     * Initialise by calling parent constructor of parent class. Create
     * database connection and load models and helpers. 
     */
    public function __construct() 
    {
        parent::__construct();
        $this->load->database();
        //$this->load->model('users_model');

    }

	/**
     * Call User model in order to get users from the database to be displayed in the homepage. Loads also header and footer.
     * 
     * @param   -
     * @return  -
     */
	public function index() 
	{
		$data['title']= "User register";
		$data['users'] = $this->users_model->get_user();
		$data['logged_user'] = $this->session->userdata();
		
		$this->load->view('templates/header',$data);
		$this->load->view('users/index',$data);
		$this->load->view('templates/footer');
	}
	
	/**
     * Do form validation, call user_model in order for adding new user. After succesful register returns back to index page.
     * 
     * @param   -
     * @return  -
     */
	public function register() 
	{
		
		$data['title']= "Register a user";
		
		$this->form_validation->set_rules('username','Username','trim|required|min_length[6]|max_length[12]|is_unique[user.username]');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password1','Password','required|min_length[10]');
        $this->form_validation->set_rules('password2','Password confirmation','required|min_length[10]|matches[password1]');
        
		if ($this->form_validation->run() === FALSE)
		{
	        $this->load->view('templates/header',$data);
			$this->load->view('users/register',$data);
			$this->load->view('templates/footer');
    	}
    	else 
    	{
	    	$data['user'] = $this->users_model->insert_user();
	    	$user = $this->users_model->check_user($data);
	    	$this->session->set_userdata($user);
	    	$this->index();
			/*
			$data['title']= "Recipes Archive";
			$this->load->view('templates/header',$data);
			$this->load->view('recipes/upload_success');
	        $this->load->view('recipes/add',$data);
	        $this->load->view('templates/footer');
	        */
    	}
		
	}
	
	/**
     * Do form validation, call user_model in order for adding new user. After succesful register returns back to index page.
     * 
     * @param   -
     * @return  -
     */
	public function login() 
	{
		$data['title']= "Login as a user";
		
		$this->form_validation->set_rules('username','Username','trim|required');
        $this->form_validation->set_rules('password','Password','required|min_length[10]');

		if ($this->form_validation->run() === FALSE)
		{
	        $this->load->view('templates/header',$data);
			$this->load->view('users/login');
			$this->load->view('templates/footer');
    	}
    	else 
    	{
    		$data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
            );
	    	$user = $this->users_model->check_user($data);
	    	if(empty($user))
	    	{
	    		$data['title'] = 'Login';
	    		$this->load->view('templates/header',$data);
				$this->load->view('users/login',$data);
				$this->load->view('templates/footer');
	    	}
			else
			{
				$this->session->set_userdata($user);
				$this->index();
			}
    	}
		
	}
	
	/**
     * Logout and forward to home page.
     * 
     * @param   -
     * @return  -
     */
     public function Logout()
     {
     	$this->session->sess_destroy();
     	$this->index();
     }
	
}
