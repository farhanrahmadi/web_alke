<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Xiliari_model extends CI_Model {

    public function get_admin_data($admin_id)
    {
        $sql = "SELECT * "
        .  "FROM  `list_admin` "
        .  "WHERE `admin_id` = ? ;";
        $query = $this->db->query($sql,[$admin_id]);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
        
    }
    public function get_permission($level = FALSE)
    {
     $id = $this->session->userdata('id');
     $admin = $this->get_admin_data($id);
     if ($admin->level_admin_id <= $level) {
        return TRUE;
     } else {
         return FALSE;
     }
     
    }
    public function get_list_admin($resources)
    {
        $start = ($resources->page - 1) * $resources->ipp;
        $sql = "SELECT * FROM `list_admin` la JOIN `level_admin` lad ON la.`level_admin_id` = lad.`level_admin_id` JOIN  `status` st ON la.`status_id` = st.`status_id`  WHERE la.`status_id`  IN (1,2,3,4) LIMIT $start, $resources->ipp";
        $query = $this->db->query($sql);
        if ($query) {
            return $query->result();
        } else {
            return FALSE;
        }
        
    }
    public function get_app_list()
    {
       $sql = "SELECT * FROM `list_admin` WHERE `status_id` = 5 ";
       $query = $this->db->query($sql);
       if ($query) {
           return $query->result();
       } else {
           return FALSE;
       }
       
    }
    public function accept_apps($admin_id)
    {   $response = new stdClass();
        $response->success = FALSE;
        $response->message = "Failed, Something gones wrong ";
        $sql = "UPDATE `list_admin` SET `status_id` = 1 WHERE `admin_id` = ? ;";
        $query = $this->db->query($sql,[$admin_id]);
        if ($query) {
            $token = strtoupper($this->generate_token());
            $sql2 = "INSERT INTO `admin_token` (`admin_id`, `token`) VALUES (?, ?) ;";
            $query2 = $this->db->query($sql2,[$admin_id,$token]);
            if ($query2) {
                $email = $this->get_admin_data($admin_id)->email;
                $status = "confirmation";
                $email = $this->send_email($email,$status,$token);
                if ($email) {
                    $response->success = TRUE;
                    $response->message = "Accept admin success";
                    $response->link = "view_application_list()";
                } else {
                    $response->message = "Failed sending email please repeat the step";
                }
                
            } else {
              $resnponse->message = "Failed generate token";   
            }
        } else {
            $response->message = "Failed your data seem not valid";
        }
        return $response;
        
    }
    public function generate_token()
    {
        $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $length = strlen($characters);
        $random_string = "";
        for ($i = 0; $i < 16; $i++) {
            $random_string .= $characters[rand(0, $length - 1)];
        }
        return $random_string;
    }
    public function send_email($email,$status,$token = FALSE)
    {   
        if ($status === "registration") {
           $subject = "Registrasion";
           $template = $this->load->view('email_register','', TRUE);
        } else if($status === "confirmation") {
            $subject = "Reconfirmation";
            $data['token'] = $token;
            $template = $this->load->view('email_confirmation', $data,TRUE) ;
        } else{
            $subject = " ";
        }
        // $data = "test";
        $ci = get_instance();
        $ci->load->library('email');
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "huntzrahmadi@gmail.com";
        $config['smtp_pass'] = "farhanrahmadi";
        $config['charset'] = "utf-8";
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        $ci->email->initialize($config);
        $ci->email->from('huntzrahmadi@gmail.com', 'Farhan Rahmadi');
        $list = array($email);
        $ci->email->to($list);
        $ci->email->subject($subject);
        $ci->email->message($template);
        // if ($this->email->send()) { uncomment if you want to send email
        if(TRUE){
            return TRUE;
        } else {
            return FALSE;
        }
        
    }

    public function get_admin_detail($id)
    {
        $sql = "SELECT * ".
        "FROM `list_admin` la ".
        "JOIN `level_admin` lad ".
        "ON la.`level_admin_id` = lad.`level_admin_id` ".
        "JOIN  `status` st ".
        "ON la.`status_id` = st.`status_id`  ".
        "LEFT JOIN `division` di ".
        "ON la.`division_id` = di.`division_id` ".
        "WHERE la.`admin_id` = ? ";
        $query = $this->db->query($sql,[$id]);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return $this->db->last_query();
        }
        
    }

    public function get_admin_activity($id)
    {
        $sql = "SELECT *".
        "FROM `log_activity` la ".
        "JOIN `list_activity` lia ".
        "WHERE la.`admin_id` = ? ";
        $query = $this->db->query($sql,[$id]);
        if ($query) {
            return $query->result();
        } else {
            return $this->db->last_query();
        }
        
    }

    public function get_admin_level_list()
    {
        $sql = "SELECT *".
        "FROM `level_admin` ";
        $query = $this->db->query($sql);
        if ($query) {
            return $query->result();
        } else {
            return $this->db->last_query();
        }
        
    }

    public function update_admin($input)
    {
        $response = $this->function_preparation();
        if (!empty($input->password)) {
            $password = password_hash($input->password, PASSWORD_BCRYPT);
            $sql = "UPDATE `list_admin` SET `username` = ?, `admin_name` = ?, `email` = ?, `password` = ?, `level_admin_id` = ?, `division_id` = ? WHERE `admin_id` = ? ";
            $query = $this->db->query($sql,[$input->username, $input->admin_name,$input->email,$password,$input->admin_level, $input->division,$input->admin_id]);
        } else {
            $sql = "UPDATE `list_admin` SET `username` = ?, `admin_name` = ?, `email` = ?, `level_admin_id` = ?, `division_id` = ? WHERE `admin_id` = ? ";
            $query = $this->db->query($sql,[$input->username, $input->admin_name, $input->email,$input->admin_level, $input->division,$input->admin_id]);
        }

        if ($query) {
            $response->message = "Profile success edited";
            $response->success = TRUE;
        } else {
            $response->message = "Failed edit profile something wrong with query";
            $response->query = $this->db->last_query();
        }
        return $response;
    }

    public function function_preparation()
    {
        $response = new stdClass();
        $response->message = "Unknown error";
        $response->success = FALSE;
        return $response;
    }

    public function get_division_list()
    {
        $sql = "SELECT * FROM `division` ";
        $query = $this->db->query($sql);
        if ($query) {
            return $query->result();
        } else {
            return $this->db->last_query();
        }
        
    }

    public function databases_count($table_name)
    {
        $sql = "SELECT COUNT(*) as `count` FROM $table_name ";
        $query = $this->db->query($sql);
        return $query->row()->count;
    }


    public function add_order($input)
    {
        $response = new stdClass();
        $response->success = FALSE;
        $response->message = "Unknown Error";
        $sql = "INSERT INTO `list_order` "
        ." (`cust_name`, `position`, `comp_name`, `comp_address`, `email`, `phone`, `comp_phone`, `req_detail`, `req_order`, `req_specific`, `qty`, `order_date`, `order_status`) "
        ." VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), 2 );";
        $query = $this->db->query($sql,[$input->cust_name,$input->position,$input->company,$input->comp_address,$input->email,$input->phone,$input->comp_phone,$input->detail_req,$input->order_req,$input->specific_req,$input->qty]);
        if ($query) {
            $response->success = TRUE;
            $response->message = "Your order sended";
        } else {
            $response->message = "Order Failer".$this->db->last_query();
        }
        return $response;
        
    }

    public function get_list_order($resources)
    {
        $start = ($resources->page - 1) * $resources->ipp;
        $sql = "SELECT * FROM `list_order` lo JOIN `list_order_status` los ON lo.`order_status` = los.`status_id`  LIMIT $start, $resources->ipp";
        $query = $this->db->query($sql);
        if ($query) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function get_order_detail($id)
    {
        $sql = "SELECT * ".
        "FROM `list_order` la ".
        "JOIN  `list_order_status` st ".
        "ON la.`order_status` = st.`status_id`  ".
        "WHERE la.`order_id` = ? ";
        $query = $this->db->query($sql,[$id]);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return $this->db->last_query();
        }  
    }

    public function get_list_product($resources)
    {
        $start = ($resources->page - 1) * $resources->ipp;
        $sql = "SELECT * FROM `list_product` LIMIT $start, $resources->ipp";
        $query = $this->db->query($sql);
        if ($query) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

}

/* End of file xiliari_model.php */
/* Location: ./application/models/xiliari_model.php */