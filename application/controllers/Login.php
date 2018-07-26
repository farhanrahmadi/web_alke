<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Login extends CI_Controller {
            public function __construct() {
                parent::__construct();
                $this->load->model('Login_model');
            }
            public function index() {
                $this->load->view('admin_login');
            }
            public function register() {
                $this->load->view('admin_register');
            }
            public function proccess_register() {
                $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|is_unique[list_admin.username]', array('required' => '%s cannot be empty', 'min_length' => '%s min 4 character or more', 'is_unique' => '%s already exist on database'));
                $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]', array('required' => '%s cannot be empty', 'min_length' => '%s min 4 character or more'));
                $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]', array('required' => '%s cannot be empty', 'matches' => '%s not matches'));
                if ($this->form_validation->run() == TRUE) {
                    $input = (object)$this->input->post();
                    $result = $this->Login_model->register_admin($input);
                    if ($result->success == TRUE) {
                        $status = array('status' => TRUE, 'message' => "You has registered. Please contact andmin",);
                        $this->output->set_content_type('application/json')->set_output(json_encode($status));
                    } else {
                        $status = array('status' => FALSE, 'message' => $result->message,);
                        $this->output->set_content_type('application/json')->set_output(json_encode($status));
                    }
                } else {
                    $status = array('status' => FALSE, 'message' => validation_errors());
                    $this->output->set_content_type('application/json')->set_output(json_encode($status));
                }
            }
            public function process_login() {
                $this->form_validation->set_rules('username', 'Username', 'trim|required', array('required' => '%s cannot be empty</div>'));
                $this->form_validation->set_rules('password', 'Password', 'trim|required', array('required' => '%s cannot be empty</div>'));
                if ($this->form_validation->run() == TRUE) {
                 $input = (object)$this->input->post();
                 $username_exist = $this->Login_model->username_exist($input->username);
                 if($username_exist->success == TRUE){
                    $result = $this->Login_model->login_check($input);
                    if ($result->success == TRUE) {
                        $admin_info = $this->Login_model->get_admin_info($this->db->escape_str($input->username));
                        $session = $admin_info->admin_id;
                        $this->session->set_userdata('login', 'login');
                        $this->session->set_userdata('id', $admin_info->admin_id);
                        $data['admin_id'] = $this->session->userdata('id');
                        $check_user_active = $this->Login_model->check_status_admin($data['admin_id']);
                        if ($check_user_active->success == TRUE) {
                            $detail = $this->Login_model->get_admin_detail($data['admin_id']);
                            $login = $this->Login_model->last_login($admin_info->admin_id);
                            $status = array('status' => TRUE, 'message' => "berhasil",);
                            $this->output->set_content_type('application/json')->set_output(json_encode($status));
                        } else {
                            $status = array('status' => FALSE, 'message' => $check_user_active->message,);
                            $this->output->set_content_type('application/json')->set_output(json_encode($status));
                        }
                    } else {
                        $status = array('status' => FALSE, 'message' => $result->message ,);
                        $this->output->set_content_type('application/json')->set_output(json_encode($status));
                    }
                } else{
                 $status = array('status' => FALSE, 'message' => $username_exist->message);
                 $this->output->set_content_type('application/json')->set_output(json_encode($status));
             }
         } else {
            $status = array('status' => FALSE, 'message' => validation_errors(),);
            $this->output->set_content_type('application/json')->set_output(json_encode($status));
        }
    }
}
/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
