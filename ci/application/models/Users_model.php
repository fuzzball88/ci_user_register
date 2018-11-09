<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class of Register model
 * 
 * @author:Tero Pelkonen
 */
 
class Users_model extends CI_Model 
{
    /**
     * Initialise by calling parent constructor of parent class. 
     * Create database connection and load database. 
     */
    public function __construct() 
    {
        parent::__construct();
        $this->load->database('users');
    }
    
    /**Get user or users from database
     * 
     * @param   string $id User id
     * @return  array (resultset or single row)
     * */
     public function get_user($id = NULL)
     {
        if($id === NULL)
        {
            $this->db->order_by("username", "asc");
            $query = $this->db->get('user');
            return $query->result_array();
        }
        else
        {
            $query = $this->db->get_where('user', array('id' => $id));
            return $query->row_array();
        }
     }
     
     /**
      * Insert user to database
      * 
      * @param  -
      * @return boolean
      * */
      public function insert_user()
      {
        $password = $this->input->post('password1');
        $password = password_hash($password, PASSWORD_DEFAULT);
          
        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => $password
            );
        return $this->db->insert('user', $data);
      }
      
      /**
      * Get user from database by username/email and password
      * 
      * @param  array  $data Array of data
      * @return array single row or nothing
      * */
      public function check_user($data = NULL)
      {
        $this->db->where('email',$data['username']);
        $this->db->or_where('username',$data['username']);
        $query = $this->db->get('user');
        
        if($query->num_rows() !== 0)
        {
            $record = $query->row_array();
            if(password_verify($data['password'], $record['password']))
            {
                return $query->row_array();
            }
        }
        else
        {
            return null;
        }
      }
}