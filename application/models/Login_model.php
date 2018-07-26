<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Xiliari_model');
    }
    public function register_admin($input) {
        $response = new stdClass();
        $response->success = FALSE;
        $password = password_hash($input->password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO `list_admin` (`username`, `email`, `password`, `level_admin_id`, `status_id`) " . "VALUES (?, ?, ?, ?, ?) ;";
        $query = $this->db->query($sql, array($input->username, $input->email, $password, 3, 5));
        if ($query) {
            $addres = $input->email;
            $send = "registration";
            $email =  $this->Xiliari_model->send_email($addres, $send);
            if ($email == TRUE) {
                $response->success = TRUE;
                $response->message = "Success please call admin for next step";
            } else {
                $response->message = "Register sucess. But email failed send";
            }
            
        } else {
            $response->message = "Failed not enough data";
        }
        return $response;
    }
    public function login_check($input) {
        $response = new stdClass();
        $response->success = FALSE;
        $response->message = "Failed Login ";
        $username = $input->username;
        $password = $input->password;
        $check = $this->auth($username, $password);
        if ($check == TRUE) {
            $admin_login = $this->admin_login_check($username);
            if ($admin_login) {
                    $admin_info = $this->get_admin_info($input->username);
                if ($admin_info) {
                    $response->success = TRUE;
                    $response->message = " ";
                } else {
                    $response->message = "Query failed please input again";
                }
            } else {
                    $response->message = "Failed login";
            }
            
        } else {
            $response->message = "Password not regonize";
        }
        return $response;
    }
    public function auth($username, $password) {
        $hash = $this->get_hash($username);
        $authentication = password_verify($password, $hash);
        if ($authentication == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
	}
	public function username_exist($username)
	{
		$response = new stdclass();
		$response->success = FALSE;
		$response->message = "Failed get data from server";
		$sql = "SELECT `username` "
			. "FROM `list_admin` "
			. "WHERE `username` = ? ;";
		$query = $this->db->query($sql,$username);
		if ($query->num_rows() > 0 ) {
			$response->success = TRUE;
			$response->message = " ";
		} else {
			$response->message = "Your username is not exist";
		}
		return $response;
	}
    public function last_login($id) {
        $sql = "UPDATE `list_admin` SET `last_login` = NOW() " . "WHERE `admin_id` = ? ;";
        $query = $this->db->query($sql, [$id]);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function get_admin_info($username) {
        $sql = "SELECT * " . "FROM `list_admin` la " . "JOIN `level_admin` la2 " . "ON la.`level_admin_id` = la2.`level_admin_id` " . "WHERE `username` = ? ";
        $query = $this->db->query($sql, $username);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    public function get_hash($selector) {
        $sql = "SELECT `password` " . "FROM `list_admin` " . "WHERE `username` = ? ;";
        $query = $this->db->query($sql, [$selector]);
        if ($query->num_rows() > 0) {
            return $query->row()->password;
        } else {
            return FALSE;
        }
    }
    public function check_status_admin($id) {
        $response = new stdClass();
        $response->success = FALSE;
        $response->message = "Login failed bug founded please contact adminstrator ";
        $sql = "SELECT `status_id` " . "FROM `list_admin` " . "WHERE `admin_id` = ? ;";
        $query = $this->db->query($sql, [$id]);
        if ($query->row()->status_id == 1) {
            $response->success = TRUE;
            $response->message = "";
        } else if ($query->row()->status_id == 2) {
            $response->success = FALSE;
            $response->message = "Your account is inactive please contac admin ";
        } elseif ($query->row()->status_id == 3) {
            $response->success = FALSE;
            $response->message = "Your account is suspended please contac admin ";
        } elseif ($query->row()->status_id == 4) {
            $response->success = FALSE;
            $response->message = "Your account is waiting corfirmation please contac admin ";
        } elseif ($query->row()->status_id == 5) {
            $response->success = FALSE;
            $response->message = "Your account is waiting email confirmation please check your email ";
        }
        return $response;
    }
    public function get_admin_detail($id) {
        $sql = "SELECT * " . "FROM `list_admin` " . "WHERE `admin_id` = ? ;";
        $query = $this->db->query($sql, [$id]);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    public function admin_login_check($username)
    {
        $sql2 = "UPDATE `list_admin` SET `last_login` = NOW() WHERE `list_admin`.`username` = ?";
        $query2 = $this->db->query($sql2,[$username]);
        if ($query2) {
            return TRUE;
        } else {
            return FALSE;
        }
        
    }
    
}
/* End of file xiliari_model.php */
/* Location: ./application/models/xiliari_model.php */
