<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public $table = 't_admin';
    private $_data = array();

    function __construct()
    {
        parent::__construct();
    }
    
 
    public function validate()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
 
        $this->db->where("user_name", $username);
        $query = $this->db->get($this->table);
 
        if ($query->num_rows())
        {
            // found row by username   
            $row = $query->row_array();
 
            // now check for the password
            if ($row['password'] == ($password))
            {
                // we not need password to store in session
                unset($row['password']);
                $this->_data = $row;
                $this->_access = $row['status'];
                return "ERR_NONE";
            }
 
            // password not match
            return "ERR_INVALID_PASSWORD";
        }
        else {
            // not found
            return "ERR_INVALID_USERNAME";
        }
    }
 
    public function get_data()
    {
        return $this->_data;
    }
}