<?php
    class Users_model extends CI_Model {
        public function __construct(){
            parent::__construct();
            $this->load->database();
        }
 
    	public function login($userid, $password){
                        $query = $this->db->get_where('users', array('userid'=>$userid, 'password'=>$password));
                        return $query->row_array();
                }
 
        }
?>